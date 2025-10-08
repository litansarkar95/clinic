function formatNumber(value) {
  return value % 1 === 0 ? value.toFixed(0) : value.toFixed(2);
}

$(".product-view").on("click", function () {
  $("#product_name").text($(this).data("name"));
  $("#product_code").text($(this).data("code"));
  $("#product_brand").text($(this).data("brand"));
  $("#product_category").text($(this).data("category"));
  $("#product_unit").text($(this).data("unit"));
  $("#product_purchase_price").text($(this).data("purchase-price"));
  $("#product_sale_price").text($(this).data("sale-price"));
  $("#product_wholesale_price").text($(this).data("wholesale-price"));
  $("#product_dealer_price").text($(this).data("dealer-price"));
  $("#product_stock").text($(this).data("stock"));
  $("#product_low_stock").text($(this).data("low-stock"));
  $("#expire_date").text($(this).data("expire-date"));

  const product_image = $(this).data("image");
  $("#product_image").attr("src", product_image);
});

//vat calculation
function updatePrices() {
  let vatRate =
    parseFloat($("#vat_id").find(":selected").data("vat_rate")) || 0;
  let exclusivePrice = parseFloat($("#exclusive_price").val()) || 0;
  let profitMargin = parseFloat($("#profit_margin").val()) || 0;
  let vatType = $("#vat_type").val();

  // inclusive price (Always includes vat)
  let inclusivePrice = exclusivePrice + (exclusivePrice * vatRate) / 100;

  // Calculate mrp based on vat type
  let mrp = exclusivePrice;
  if (vatType === "inclusive") {
    mrp += (exclusivePrice * vatRate) / 100;
  }

  mrp += (mrp * profitMargin) / 100;

  $("#inclusive_price").val(formatNumber(inclusivePrice));
  $("#mrp_price").val(formatNumber(mrp));
}

$("#vat_id, #vat_type, #exclusive_price, #profit_margin").on(
  "change input",
  updatePrices
);

$("#mrp_price").on("input", function () {
  let vatType = $("#vat_type").val();
  let vatRate =
    parseFloat($("#vat_id").find(":selected").data("vat_rate")) || 0;
  let exclusivePrice = parseFloat($("#exclusive_price").val()) || 0;
  let mrp = parseFloat($("#mrp_price").val()) || 0;

  if (exclusivePrice > 0 && mrp > 0) {
    let basePrice = exclusivePrice;

    if (vatType === "inclusive") {
      basePrice *= 1 + vatRate / 100;
    }

    let profitMargin = (mrp / basePrice - 1) * 100;
    $("#profit_margin").val(formatNumber(profitMargin));
  }
});

$("#inclusive_price").on("input", function () {
  let vatRate =
    parseFloat($("#vat_id").find(":selected").data("vat_rate")) || 0;
  let inclusivePrice = parseFloat($(this).val()) || 0;

  let exclusivePrice = inclusivePrice / (1 + vatRate / 100);

  $("#exclusive_price").val(formatNumber(exclusivePrice));

  // Delay user to finish input
  inclusivePriceTimer = setTimeout(() => {
    updatePrices();
  }, 900);
});

/** Product End */
