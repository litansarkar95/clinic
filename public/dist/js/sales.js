$(document).ready(function () {
  let serialNumber = 1; // Start serial number at 1
  var baseUrl = $("#baseURL").val();

  // Initialize Datepicker
  $(document).on("focus", ".expire_date", function () {
    $(this).datepicker({
      dateFormat: "d-m-yy", // Format d-m-Y
      changeMonth: true,
      changeYear: true,
      minDate: 0, // Prevent past dates
    });
  });

  $("#batch_number_s").autocomplete({
    source: function (request, response) {
      // If neither a valid customer is selected nor "Guest" is selected
      let customer_id = $("#customer_id").val();
      if (!customer_id) {
        toastr.warning("Please select a customer first!");
        return;
      }
      $.ajax({
        url: baseUrl + "sales/item_search",
        method: "POST",
        data: { query: request.term }, // Send query term
        dataType: "json",
        success: function (data) {
          response(
            $.map(data, function (item) {
              return {
                label: item.productName + " (" + item.barcode + ")",
                value: item.productName,
                id: item.id,
                product_id: item.product_id,
                productCode: item.productCode,
                unit_name: item.unit_name,
                barcode: item.barcode,
                productPurchasePrice: item.productPurchasePrice,
                dealerPrice: item.productDealerPrice,
                salePrice: item.productSalePrice,
                wholeSalePrice: item.productWholeSalePrice,
                expire_date: item.expire_date_formatted,
                image: item.productPicture,
                quantities: item.quantities,
              };
            })
          );
        },
      });
    },
    select: function (event, ui) {
      let itemId = ui.item.id;
      let productId = ui.item.product_id;
      let itemName = ui.item.value;
      let itemCode = ui.item.productCode;
      let itemUnit = ui.item.unit_name;
      let barcode = ui.item.barcode;
      let purchasePrice = ui.item.productPurchasePrice;
      let dealerPrice = ui.item.dealerPrice;
      let salePrice = ui.item.salePrice;
      let wholeSalePrice = ui.item.wholeSalePrice;
      let expire_date = ui.item.expire_date;
      let itemImage = ui.item.image;
      let quantities = ui.item.quantities;

      // Check if item already exists in the table by ID
      if ($("#selectedItemsTable tr[data-id='" + itemId + "']").length > 0) {
        // alert("This item is already added!");
        toastr.warning("This item is already added!");
        return;
        $("#batch_number_s").val(""); // Clear input field if already exists
        return false; // Prevent further action
      }

      // Append selected item to the table
      let newRow = `<tr data-id="${itemId}">
            <td>${serialNumber}
                <input type="hidden" class="form-control id-input" name="id" value="${itemId}" />
                <input type="hidden" class="form-control product-input" name="product" value="${productId}" />
                <input type="hidden" class="form-control dealerPrice-input" name="dealerPrice" value="${dealerPrice}" />
             
                <input type="hidden" class="form-control wholeSalePrice-input" name="wholeSalePrice" value="${wholeSalePrice}" />
            </td>
            <td><img src="${baseUrl}/public/images/products/${itemImage}" alt="Item Image" width="50" height="50"></td> <!-- Image -->
            <td>${itemName}</td>
            <td>${itemCode}</td>
            <td>${itemUnit}</td>
           <td><input type="text" class="form-control quantities" name="quantities" value="${quantities}" readonly/></td>
            <td>   <input type="hidden" width="200px" class="form-control purchasePrice-input" name="purchasePrice" value="${purchasePrice}" />
            <input type="text" class="form-control price-input" name="challan_no" value="${salePrice}" /></td>
            <td><input type="text" min="1" class="form-control qty-input" name="challan_no" value="1" /></td>
            <td>
            <input type="hidden" class="form-control pur_subtotal" name="pur_subtotal" value="${purchasePrice}" />
            <input type="text" class="form-control subtotal" name="subtotal" value="${salePrice}" /></td>
            <td><input type="text" class="form-control barcode-input" name="barcode" value="${barcode}" /></td>
            <td><input type="text" class="form-control expire_date expire_date-input" name="expire_date" value="${expire_date}" placeholder="Select Date" /></td>
            <td><button class="remove-item"><i class="fa fa-trash"></i></button></td>
        </tr>`;

      $("#selectedItemsBody").append(newRow);

      // Initialize datepicker on new row
      setTimeout(function () {
        $(".expire_date").datepicker({
          dateFormat: "d-m-yy", // Format d-m-Y
          changeMonth: true,
          changeYear: true,
          minDate: 0,
        });
      }, 200);

      serialNumber++; // Increment serial number for next row
      $("#batch_number_s").val(""); // Clear input fields
      $("#search_product_id").val(itemId);

      updateTotals();
      return false;
    },
  });

  // Update totals when any of the fields are updated
  $(document).on(
    "input change",
    ".qty-input, .barcode-input, .expire_date, .price-input",
    function () {
      let qty = $(this).closest("tr").find(".qty-input").val();
      let price = $(this).closest("tr").find(".price-input").val();
      let pur_price = $(this).closest("tr").find(".purchasePrice-input").val();
      let subtotal = qty * price;
      $(this).closest("tr").find(".subtotal").val(subtotal.toFixed(2));

      // pur
      let pur_subtotal = qty * pur_price;
      $(this).closest("tr").find(".pur_subtotal").val(pur_subtotal.toFixed(2));
      updateTotals();
    }
  );

  // Remove item from the table
  $(document).on("click", ".remove-item", function () {
    $(this).closest("tr").remove();

    // Recalculate and reset serial numbers after removal
    serialNumber = 1;
    $("#selectedItemsTable tbody tr").each(function (index) {
      $(this).find("td:first").text(serialNumber);
      serialNumber++;
    });
    updateTotals();
  });

  // Recalculate totals on shipping amount or payment amount change
  $("#shippingAmount, #paymentAmount").on("input", function () {
    updateTotals();
  });

  // Recalculate totals when discount or discount type changes
  $("#discount_amount, #form-ware").on("input change", function () {
    updateTotals();
  });

  // Update total calculations (quantity, price, and subtotal)
  function updateTotals() {
    let totalQty = 0;
    let totalAmount = 0;
    let dis_totalAmount = 0;
    let totalpur_subtotal = 0;
    let items = [];

    $("#selectedItemsTable tbody tr").each(function () {
      let itemId = $(this).attr("data-id");
      let productId = parseFloat($(this).find(".product-input").val()) || 0;
      let qty = parseFloat($(this).find(".qty-input").val()) || 0;
      let price = parseFloat($(this).find(".price-input").val()) || 0;
      let purchasePrice =
        parseFloat($(this).find(".purchasePrice-input").val()) || 0;
      let subtotal = parseFloat($(this).find(".subtotal").val()) || 0;
      let pur_subtotal = parseFloat($(this).find(".pur_subtotal").val()) || 0;

      totalQty += qty;
      totalAmount += subtotal;
      totalpur_subtotal += pur_subtotal;

      items.push({
        item_id: itemId,
        productId: productId,
        qty: qty,
        purchasePrice: purchasePrice,
        price: price,
        subtotal: subtotal,
        pur_subtotal: pur_subtotal,
      });
    });

    let shippingAmount = parseFloat($("#shippingAmount").val()) || 0;
    let discountAmount = parseFloat($("#discount_amount").val()) || 0;
    let discountType = $("#form-ware").val(); // Flat or Percent
    let withShipping = totalAmount;
    // Apply discount based on type
    if (discountType === "percent") {
      dis_totalAmount = withShipping - withShipping * (discountAmount / 100);
    } else if (discountType === "flat") {
      dis_totalAmount = withShipping - discountAmount;
    }

    let grandTotal = dis_totalAmount + shippingAmount;
    totalAmount = totalAmount + shippingAmount;

    let paymentAmount = parseFloat($("#paymentAmount").val()) || 0;
    let dueAmount = grandTotal - paymentAmount;

    $("#totalQty").text(totalQty);
    //  $("#totalAmount").text(totalAmount.toFixed(2));
    $("#totalAmount").text(withShipping.toFixed(2));
    $("#grandTotal").val(totalAmount.toFixed(2));
    $("#dis_grandTotal").val(grandTotal.toFixed(2));
    $("#pgrandTotal").val(totalpur_subtotal.toFixed(2));
    $("#dueAmount").val(dueAmount.toFixed(2));

    $("#orderData").val(JSON.stringify(items));
  }

  $(".select2").select2();
});
