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
   <div class="container-fluid">
            <div id="toast-msg" class="toast-msg"></div>

								<div class="row px-3 ">
									<div class="col-12 bg_grey">
								
											
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
	<div class="input_form" >
													
     
                                         
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

                            

         


			
									          		</div>	
									      				
                                	</div>
									  



                                      <div class="input_form input_form_new" >
									      				<div class="row mb-3">
                                  <div class="col-md-12">

 
                                         <?php if (!empty($cart_items)) { ?>
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
                                                <?php $i=1; $total=0; foreach ($cart_items as $item) { ?>
                                                <tr id="row-<?php echo $item['id']; ?>">
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $item['name']; ?></td>
                                                <td>৳<?php echo $item['price']; ?></td>
                                                <td>
                                                <button class="btn btn-danger btn-sm remove-item" data-id="<?php echo $item['id']; ?>">
                                                            Remove
                                                </button>
                                                </td>
                                                </tr>
                                                <?php $total += $item['price']; } ?>
                                                </tbody>
                                               <tfoot>
                                                <tr>
                                                <td colspan="2" class="text-end fw-bold">Subtotal</td>
                                                <td colspan="2" class="fw-bold subtotal">৳<?php echo $total; ?></td>
                                                </tr>
                                                <tr>
                                                <td colspan="2" class="text-end fw-bold">Adjustment (+/-)</td>
                                                <td colspan="2">
                                                <input type="number" step="0.01" name="adjustment" id="adjustment" class="form-control d-inline-block w-50" value="0">
                                                </td>
                                                </tr>
                                                <tr>
                                                <td colspan="2" class="text-end fw-bold">Total</td>
                                                <td colspan="2" class="fw-bold total-amount">৳<?php echo $total; ?></td>
                                                </tr>
                                                </tfoot>

                                                </table>

                                                <?php } else { ?>
                                                <p>No products added yet!</p>
                                                <?php } ?> 



                                    </div> 
                      

                                            
                              
									      					
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
  function updateTotal() {
    let subtotal = parseFloat($('.subtotal').text().replace('৳', '')) || 0;
    let adjustment = parseFloat($('#adjustment').val()) || 0;
    let total = subtotal + adjustment;
    $('.total-amount').text('৳' + total.toFixed(2));
  }

  // যখন Adjustment ইনপুট পরিবর্তন হবে
  $(document).on('input', '#adjustment', function() {
    updateTotal();
  });
});
</script>

<script>
$(document).on('click', '.remove-item', function() {
    let id = $(this).data('id');
    let row = $('#row-' + id);

    if (confirm('Are you sure you want to remove this item?')) {
        $.ajax({
            url: '<?php echo base_url("billinfo/remove_from_session"); ?>',
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function(res) {
                if (res.status === 'success') {
                    row.fadeOut(300, function() {
                        $(this).remove();
                        updateTotal();   // 🧮 টোটাল আপডেট
                        checkIfEmpty();  // ⚙️ টেবিল খালি কিনা চেক করো
                        showToast('🗑️ Item removed successfully!');
                    });
                } else {
                    showToast('❌ ' + res.message, true);
                }
            },
            error: function() {
                showToast('⚠️ Error removing item.', true);
            }
        });
    }
});

// 🧮 Total আপডেট ফাংশন
function updateTotal() {
    let total = 0;
    $('tbody tr').each(function() {
        let priceText = $(this).find('td:nth-child(3)').text().replace('৳', '').trim();
        let price = parseFloat(priceText);
        if (!isNaN(price)) {
            total += price;
        }
    });
    $('tfoot .total-amount').text('৳' + total);
}

// ⚙️ সব আইটেম রিমুভ হয়ে গেলে মেসেজ দেখাও
function checkIfEmpty() {
    if ($('tbody tr').length === 0) {
        $('table').fadeOut(300, function() {
            $(this).replaceWith('<p>No products added yet!</p>');
        });
    }
}

// ✅ Toast function
function showToast(message, isError = false) {
    let toast = $('#toast-msg');
    toast.text(message);

    if (isError) {
        toast.css('background', 'linear-gradient(135deg, #dc3545, #b02a37)'); // লাল
    } else {
        toast.css('background', 'linear-gradient(135deg, #28a745, #218838)'); // সবুজ
    }

    toast.addClass('show');

    // ৩ সেকেন্ড পরে হাইড হবে
    setTimeout(function() {
        toast.removeClass('show');
    }, 3000);
}
</script>


<script>
$(document).ready(function() {
  // যখন নাম বা মোবাইল টাইপ করা হবে
  $('#customer_name, #mobile_no').on('keyup', function() {
    let query = $(this).val().trim();
    if (query.length >= 2) {
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
        }
      });
    } else {
      $('#search_results').hide();
    }
  });

  // ক্লিক করলে ডেটা ইনপুটে বসানো হবে
  $(document).on('click', '.customer-item', function(e) {
    e.preventDefault();
    let id = $(this).data('id');
    let name = $(this).data('name');
    let mobile = $(this).data('mobile');

    $('#patient_id').val(id);
    $('#customer_name').val(name);
    $('#mobile_no').val(mobile);
    $('#search_results').hide();
  });

  // বাইরে ক্লিক করলে লিস্ট লুকাও
  $(document).click(function(e) {
    if (!$(e.target).closest('#search_results, #customer_name, #mobile_no').length) {
      $('#search_results').hide();
    }
  });
});
</script>
