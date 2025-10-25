	  <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
 <style>
/* Patient result card style */
.patient-result-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 15px;
    margin-bottom: 10px;
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

/* Card hover effect */
.patient-result-card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Card header styling (name) */
.patient-result-card-header {
    font-size: 18px;
    font-weight: bold;
    color: #007bff;
    margin-bottom: 10px;
}

/* Card body styling */
.patient-result-card-body {
    font-size: 14px;
    color: #333;
}

.patient-result-card-body p {
    margin: 5px 0;
}

/* Ensure search results have some margin */
#search_results {
    margin-top: 5px;
}

/* No results message style */
#search_results p {
    font-size: 16px;
    color: #888;
}
.input_form{
  border-radius:0px !important;
}

.input_form_new3{
  margin-top:10px;
  padding: 30px;
    background: linear-gradient(121deg, rgba(102, 222, 96, 0.2), rgba(1, 194, 49, 0.5));
    border-radius: 15px;
    transition: all 
    linear 0.3s;
    box-shadow: 1px 1px 1px #777;
}

.ui-widget-content
 {
    border: 1px solid #dddddd;
    background: #0e9f2bff;
    color: #f1f4f3ff;
}

                        </style>
     <script>
    $(document).ready(function() {
   

   $("#registration_date").datepicker({
  dateFormat: "dd-mm-yy",
  changeMonth: true,
  changeYear: true,
  yearRange: "1900:2100",
});
$("#surgery_date").datepicker({
  dateFormat: "yy-mm-dd",
  changeMonth: true,
  changeYear: true,
  yearRange: "1900:2100",
  onSelect: function(dateText) {
    fetchSerial(dateText);
  }
});

// Set a default date (e.g., today's date)
var today = $.datepicker.formatDate("dd-mm-yy", new Date());
$("#registration_date,.to_date").val(today);

  });



     
    </script>

    <style>
.product-card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  display: inline-block;
  width: 220px;
  margin: 10px;
}

.product-card:hover {
  transform: scale(1.05);
  box-shadow: 0 6px 12px rgba(0,0,0,0.2);
}

.product-img {
  border-radius: 8px;
}

.product-title {
  font-weight: 600;
  color: #333;
}

.price-section {
  font-size: 16px;
}

.original-price {
  text-decoration: line-through;
  color: #888;
}

.discount-price {
  color: #28a745;
  font-weight: bold;
}

.add-now-btn {
  background-color: #28a745;
  border: none;
  transition: 0.3s;
}

.add-now-btn:hover {
  background-color: #218838;
}
.discount-badge {
  display: inline-block;
  background: #ff4d4d;
  color: #fff;
  font-weight: bold;
  font-size: 13px;
  border-radius: 5px;
  padding: 3px 8px;
}

.discount-badge span {
  display: inline-block;
}

.product-card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  display: inline-block;
  width: 220px;
  margin: 10px;
}

.product-card:hover {
  transform: scale(1.05);
  box-shadow: 0 6px 12px rgba(0,0,0,0.2);
}

.product-img {
  border-radius: 8px;
}

.product-title {
  font-weight: 600;
  color: #333;
}

.price-section {
  font-size: 16px;
}

.original-price {
  text-decoration: line-through;
  color: #888;
}

.discount-price {
  color: #28a745;
  font-weight: bold;
}

.add-now-btn {
  background-color: #28a745;
  border: none;
  transition: 0.3s;
}

.add-now-btn:hover {
  background-color: #218838;
}
.toast-msg {
  position: fixed;
  top: 20px;
  right: 20px;
  background: linear-gradient(135deg, #28a745, #218838);
  color: #fff;
  padding: 12px 20px;
  border-radius: 6px;
  font-weight: 500;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  opacity: 0;
  transform: translateY(-20px);
  transition: all 0.4s ease;
  z-index: 9999;
}

.toast-msg.show {
  opacity: 1;
  transform: translateY(0);
}

#search_results {
  max-height: 200px;
  overflow-y: auto;
  border: 1px solid #ddd;
  border-top: none;
  display: none;
}

#search_results .list-group-item {
  cursor: pointer;
}

#search_results .list-group-item:hover {
  background-color: #e9f7ef;
}
.customer-item , .list-group-item{
            width: 300px !important;
}
            </style>
<style>
/* ✅ Billing section responsive fix */
@media (max-width: 768px) {
  .input_form .form-group {
    margin-bottom: 10px;
  }

  .product-card {
    width: 48%;
    margin: 1%;
  }

  .table-responsive {
    overflow-x: auto;
  }

  table {
    font-size: 14px;
  }

  .toast-msg {
    top: 10px;
    right: 10px;
    padding: 10px 15px;
    font-size: 14px;
  }
}

/* ছোট স্ক্রিনে বোতাম ফুল প্রস্থে */
@media (max-width: 576px) {
  .btn_bg, .btn {
    width: 100%;
    margin-bottom: 5px;
  }
}
</style>
<!-- ✅ Payment Section -->
<style>
.payment-box {
  background: linear-gradient(145deg, #e9f7ef, #c8e6c9);
  border-radius: 12px;
  padding: 18px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  margin-top: 25px;
  transition: 0.3s ease;
}


.payment-title {
  font-weight: bold;
  color: #2e7d32;
  margin-bottom: 15px;
  font-size: 18px;
}

.payment-row {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.08);
  padding: 12px;
  margin-bottom: 10px;
}

.payment-row select, 
.payment-row input {
  border-radius: 8px;
  border: 1px solid #ccc;
}

.remove-payment {
  background: linear-gradient(135deg, #ff4d4d, #c62828);
  border: none;
  color: #fff;
  font-weight: 600;
}
.remove-payment:hover {
  background: linear-gradient(135deg, #ff3333, #b71c1c);
}

#add-payment {
  background: linear-gradient(135deg, #4caf50, #2e7d32);
  border: none;
  color: #fff;
  font-weight: 600;
}
#add-payment:hover {
  background: linear-gradient(135deg, #43a047, #1b5e20);
}

.payment-summary {
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  padding: 12px;
  text-align: center;
  margin-top: 15px;
}
.payment-summary h6 { margin: 6px 0; }
#total-paid { color: #2e7d32; font-weight: bold; }
#due-amount { color: #d32f2f; font-weight: bold; }

/* ✅ Toast Style */
.toast-msg {
  position: fixed;
  top: 20px;
  right: 20px;
  background: linear-gradient(135deg, #28a745, #218838);
  color: #fff;
  padding: 12px 20px;
  border-radius: 6px;
  font-weight: 500;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  opacity: 0;
  transform: translateY(-20px);
  transition: all 0.4s ease;
  z-index: 9999;
}
.toast-msg.show {
  opacity: 1;
  transform: translateY(0);
}

/* ✅ Responsive Mobile View */
@media (max-width: 768px) {
  .payment-row {
    display: block !important;
  }
  .payment-row > div {
    width: 100% !important;
    margin-bottom: 10px;
  }
  .payment-summary h6 { font-size: 15px; }
  #add-payment, .remove-payment {
    width: 100%;
  }
  .payment-box {
    padding: 15px;
  }
}
</style>

   <div class="container-fluid">
            <div id="toast-msg" class="toast-msg"></div>

								<div class="row px-3 ">
									<div class="col-12 ">
								
											
											<div class="row justify-content-center pb-5">
												<div class="col-md-12">
                                                <div class="row pb-3">
												<div class="col-auto">
													<h3>Create Billing</h3>
												</div>
                                                
                                                
												<div class="col-auto ms-auto">
                                                       <form action="<?php echo base_url(); ?>billinfo/list" method="POST">
                                                <!-- Add hidden inputs to send data -->
                                                <input type="hidden" name="from_date" value="<?php echo date("d-m-Y"); ?>">
                                                <input type="hidden" name="to_date" value="<?php echo  date("d-m-Y"); ?>">
                                                <button type="submit" class="btn btn_bg">Billing List</button>
                                            </form>
													
												</div>
											</div>


              

<!-- The search result container will appear here -->


 <form id="billingForm" method="POST" action="<?php echo base_url('billinfo/save_bill'); ?>">
	<div class="" >
													
     
                                         
							<div class="row mb-3">
                            <input type="hidden" id="patient_id" class="form-control " name="patient_id"  value="<?php echo set_value('patient_id'); ?>" >
                                   <div class="form-group col-md-2 mb-3">
                                 <label for="registration_id">Invoice ID</label>
                                 <input type="text" id="registration_id" class="form-control" name="registration_id"  value="<?php echo $registration_no; ?>" >
                                 <span class="text-red small"><?php echo form_error('registration_id'); ?></span>
                              </div> 
                           <div class="form-group col-md-2 mb-3">
                                 <label for="registration_date">Invoice Date</label>
                                 <input type="text" id="registration_date" class="form-control " name="registration_date"  value="<?php echo set_value('registration_date'); ?>" >
                                 <span class="text-red small"><?php echo form_error('registration_date'); ?></span>
                              </div>
                             <div class="form-group col-md-3 mb-3">
                                                <label for="customer_name">Name</label>
                                                <input type="text" id="customer_name" class="form-control" name="customer_name" placeholder="Search by name or mobile..." autocomplete="off" required>
                                                <div id="search_results" class="list-group position-absolute w-100" style="z-index:1000;"></div>
                                                </div>

                                                <div class="form-group col-md-2 mb-3">
                                                <label for="mobile_no">Mobile No</label>
                                                <input type="text" id="mobile_no" class="form-control" name="mobile_no" placeholder="Search...." autocomplete="off" required>
                                                </div>

                                                 <div class="form-group col-md-2 mb-3">
                                 <label for="reference_id">Reference</label>
                                 <select type="text" id="reference_id" class="form-control" name="reference_id" required >
                                     <option value="0">Select Reference</option>
                                    <?php
                                        foreach ($allRef as $ref){
                                      echo "<option value='{$ref->id}'>{$ref->first_name} - {$ref->contact_no}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('reference_id'); ?></span>
                              </div>

                            

         


			
									          		</div>	
									      				
                                	</div>
									  



                                      <div class="" >
									      				<div class="row mb-3">
                                  <div class="col-md-12">

 
                                         <?php if (!empty($cart_items)) { ?>
                                    <?php 
$original_total = 0; 
$discount_total = 0; 
$grand_total = 0;

foreach ($cart_items as $item) { 
    $original_total += $item['original_price'] * $item['qty'];
    $grand_total += $item['price'] * $item['qty'];
    $discount_total += ($item['original_price'] - $item['price']) * $item['qty'];
}
?>

<table class="table table-bordered text-center align-middle">
<thead>
<tr>
<th>#</th>
<th>Product Name</th>
<th>Price (৳)</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($cart_items as $item) { ?>
<tr id="row-<?php echo $item['id']; ?>">
<td><?php echo $i++; ?></td>
<td><?php echo $item['name']; ?></td>
<td>
    ৳<?php echo $item['price']; ?> 
    <?php if($item['price'] < $item['regular_price']) { ?>
        <small class="text-muted"><s>৳<?php echo $item['regular_price']; ?></s></small>
    <?php } ?>
</td>
<td>
    <button class="btn btn-danger btn-sm remove-item" data-id="<?php echo $item['id']; ?>">
       <i class="fas fa-trash"></i>
    </button>
</td>
</tr>
<?php } ?>
</tbody>
<tfoot>
<tr>
    <td colspan="2" class="text-end fw-bold">Original Price</td>
    <td colspan="2" class="fw-bold ">৳<?php echo number_format($original_total,2); ?></td>
</tr>


<tr>
    <td colspan="2" class="text-end fw-bold">Discount</td>
    <td colspan="2" class="fw-bold discount-amount">৳<?php echo number_format($discount_total,2); ?></td>
</tr>
<tr>
       <td colspan="2" class="text-end fw-bold">Total (After Offer)</td>
    <td colspan="2" class="fw-bold subtotal">৳<?php echo $grand_total; ?></td>
</tr>

<tr>
    <td colspan="2" class="text-end fw-bold">Adjustment (+/-)</td>
    <td colspan="2">
        <input type="number" step="0.01" name="adjustment" id="adjustment" class="form-control d-inline-block w-50" value="0">
    </td>

    <tr>
    <td colspan="2" class="text-end fw-bold">Total </td>
    <td colspan="2" class="fw-bold total-amount">৳<?php echo number_format($grand_total,2); ?></td>
</tr>
</tr>
</tfoot>
</table>



                                                <?php } else { ?>
                                                <p>No products added yet!</p>
                                                <?php } ?> 



                                    </div> 
                      



<div class="payment-box">
  <h5 class="payment-title"><i class="fas fa-money-bill-wave"></i> Payment Details</h5>
<?php
// ধরো $payment_methods = $this->db->get('payment_methods')->result();
$default_method = isset($payment_methods[0]) ? $payment_methods[0] : null;
?>
  <div id="payment-section">
    <div class="row g-2 payment-row align-items-center">
      <div class="col-md-4 col-12">
     <label for="payment_method">Payment Method</label>
<select name="payment_method[]" id="payment_method" class="form-control">
    <?php foreach($payment_methods as $method): ?>
        <option value="<?= $method->id ?>" 
            <?= ($default_method && $method->id == $default_method->id) ? 'selected' : '' ?>>
            <?= $method->method_name ?>
        </option>
    <?php endforeach; ?>
</select>

      </div>

      <div class="col-md-4 col-12">
        <label>Amount (৳)</label>
<input type="number" step="0.01" name="payment_amount[]" id="payment_amount" class="form-control payment-amount "
       value="<?= $grand_total ?>">
      </div>

      <div class="col-md-4 col-12 d-flex align-items-end">
        <button type="button" class="btn remove-payment w-100">
          <i class="fas fa-trash"></i> Remove
        </button>
      </div>
    </div>
  </div>

  <button type="button" id="add-payment" class="btn btn-success btn">
     <i class="fas fa-add"></i> Add Another Payment
  </button>

  <div class="payment-summary mt-3">
    <h6> Total Paid: <span id="total-paid">৳0.00</span></h6>
    <h6> Due: <span id="due-amount">৳0.00</span></h6>
  </div>
</div>

<div id="toast-msg" class="toast-msg"></div>


                              
									      					
									          		</div>	
                                      <div class="row">
                                        <div class="col-12 text-end">
                                   <button type="submit" class="btn btn_bg">Confirm</button>

                                        </div>
                                      </div>
</form>
                                	</div>
									      	
												</div>
											</div>
										</div>
                    
									</div>
								</div>
							</div>
<script>
$(document).ready(function() {

  function searchCustomer(query) {
    $.ajax({
      url: '<?php echo base_url("billinfo/search_customer"); ?>',
      type: 'POST',
      data: { query: query },
      dataType: 'json',
      success: function(res) {
        let html = '';
        if (res.length > 0) {
          res.forEach(function(cust) {
            html += `
              <a href="#" class="list-group-item list-group-item-action customer-item"
                 data-id="${cust.id}"
                 data-name="${cust.name}"
                 data-mobile="${cust.mobile_no}">
                 <strong>${cust.name}</strong> - ${cust.mobile_no}
              </a>`;
          });
        } else {
          html = '<div class="list-group-item text-muted">No results found</div>';
        }
        $('#search_results').html(html).show();
      },
      error: function(err) {
        console.log(err);
        $('#search_results').html('<div class="list-group-item text-danger">Error fetching data</div>').show();
      }
    });
  }

  $('#customer_name, #mobile_no').on('keyup', function() {
    let query = $(this).val().trim();
    if (query.length >= 2) {
      searchCustomer(query);
    } else {
      $('#search_results').hide();
    }
  });

  $(document).on('click', '.customer-item', function(e) {
    e.preventDefault();
    $('#patient_id').val($(this).data('id'));
    $('#customer_name').val($(this).data('name'));
    $('#mobile_no').val($(this).data('mobile'));
    $('#search_results').hide();
  });

  $(document).click(function(e) {
    if (!$(e.target).closest('#search_results, #customer_name, #mobile_no').length) {
      $('#search_results').hide();
    }
  });

});
</script>


<script>
$(document).ready(function() {

  function calculateTotal() {
    let subtotal = parseFloat($('.subtotal').text().replace('৳', '')) || 0;
    let adjustment = parseFloat($('#adjustment').val()) || 0;
    let total = subtotal + adjustment;

    $('.total-amount').text('৳' + total.toFixed(2));
    $('.payment-amount').val(total.toFixed(2));

    if (typeof updateTotals === 'function') {
      updateTotals();
    }
  }


  $(document).on('input', '#adjustment', function() {
    calculateTotal();
  });


  $(document).on('click', '.remove-item', function(e) {
    e.preventDefault(); 

    let id = $(this).data('id');
    let row = $('#row-' + id);

    if (!confirm('Are you sure you want to remove this item?')) return;

    $.ajax({
      url: '<?php echo base_url("billinfo/remove_from_session"); ?>',
      type: 'POST',
      data: { id: id },
      dataType: 'json',
      success: function(res) {
        if (res.status === 'success') {
          row.fadeOut(300, function() {
            $(this).remove();
            // ✅ সাবটোটাল আপডেট করো
            $('.subtotal').text('৳' + parseFloat(res.cart_total).toFixed(2));
            calculateTotal(); // 🧮 Adjustment সহ টোটাল আপডেট
            checkIfEmpty();
            showToast('🗑️ Item removed successfully!');
          });
        } else {
          showToast('❌ ' + (res.message || 'Failed to remove item'), true);
        }
      },
      error: function() {
        showToast('⚠️ Error removing item.', true);
      }
    });
  });

  // ⚙️ যদি টেবিল খালি হয়ে যায়
  function checkIfEmpty() {
    if ($('tbody tr').length === 0) {
      $('table').fadeOut(300, function() {
        $(this).replaceWith('<p class="text-center text-muted mt-3">🛒 No products added yet!</p>');
      });
    }
  }

  // ✅ সুন্দর Toast মেসেজ
  function showToast(message, isError = false) {
    let toast = $('#toast-msg');
    toast.text(message);
    toast.css('background', isError 
      ? 'linear-gradient(135deg, #dc3545, #b02a37)' 
      : 'linear-gradient(135deg, #28a745, #218838)');
    toast.addClass('show');
    setTimeout(() => toast.removeClass('show'), 2500);
  }

  // 🌟 পেজ লোড হলে প্রাথমিক টোটাল হিসাব করো
  calculateTotal();

});
</script>


<script>
$(document).ready(function() {

  // ফাংশন: Payment Methods লোড
  function loadPaymentMethods(callback) {
    $.ajax({
      url: '<?php echo base_url("billinfo/get_payment_methods"); ?>',
      type: 'GET',
      dataType: 'json',
      success: function(res) {
        let options = '<option value="">-- Select --</option>';
        res.forEach(function(method) {
          options += `<option value="${method.id}">${method.method_name}</option>`;
        });
        if (callback) callback(options);
      },
      error: function() {
        alert('Payment methods load করতে সমস্যা হয়েছে!');
      }
    });
  }

  // ➕ নতুন পেমেন্ট যোগ
  $('#add-payment').on('click', function() {
    loadPaymentMethods(function(optionsHtml) {
      let newRow = `
        <div class="row g-2 payment-row align-items-center">
          <div class="col-md-4 col-12">
            <select name="payment_method[]" class="form-control payment-method" required>
              ${optionsHtml}
            </select>
          </div>
          <div class="col-md-4 col-12">
            <input type="number" step="0.01" name="payment_amount[]" class="form-control payment-amount" value="0" required>
          </div>
          <div class="col-md-4 col-12 d-flex align-items-end">
            <button type="button" class="btn remove-payment w-100">
              <i class="fas fa-trash"></i> Remove
            </button>
          </div>
        </div>
      `;
      $('#payment-section').append(newRow);
    });
  });

  // 🗑️ পেমেন্ট রিমুভ
  $(document).on('click', '.remove-payment', function() {
    $(this).closest('.payment-row').remove();
    updateTotals();
  });

  // ইনপুট পরিবর্তন হলে হিসাব আপডেট
  $(document).on('input', '.payment-amount', updateTotals);
  $(document).on('input', '#adjustment', updateTotals);

  // 🧮 Update total paid & due dynamically
  function updateTotals() {
    let totalBill = parseFloat($('.total-amount').text().replace('৳', '').trim()) || 0;
    let totalPaid = 0;

    $('.payment-amount').each(function() {
      let val = parseFloat($(this).val()) || 0;
      totalPaid += val;
    });

    if (totalPaid > totalBill) {
      showToast("⚠️ আপনি মোট বিলের চাইতে বেশি টাকা দিতে পারবেন না!", true);

      let lastInput = $('.payment-amount').last();
      let allowed = totalBill - (totalPaid - parseFloat(lastInput.val()));
      lastInput.val(allowed.toFixed(2));
      totalPaid = totalBill;
    }

    let due = totalBill - totalPaid;
    if (due < 0) due = 0;

    $('#total-paid').text('৳' + totalPaid.toFixed(2));
    $('#due-amount').text('৳' + due.toFixed(2));
  }

});

// ✅ সুন্দর টোস্ট মেসেজ
function showToast(message, isError = false) {
  let toast = $('#toast-msg');
  toast.text(message);
  toast.css('background', isError 
    ? 'linear-gradient(135deg, #dc3545, #b02a37)' 
    : 'linear-gradient(135deg, #28a745, #218838)');
  toast.addClass('show');
  setTimeout(() => toast.removeClass('show'), 2500);
}

</script>