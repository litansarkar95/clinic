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

.input_form_new{
  margin-top:10px;
  padding: 30px;
    background: linear-gradient(121deg, rgba(102, 222, 96, 0.2), rgba(1, 194, 49, 0.5));
    border-radius: 15px;
    transition: all 
linear 0.3s;
    box-shadow: 1px 1px 1px #777;
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
   <div class="container-fluid">
								<div class="row px-3 ">
									<div class="col-12 bg_grey">
								
											
											<div class="row justify-content-center pb-5">
												<div class="col-md-12">
                                                <div class="row pb-3">
												<div class="col-auto">
													<h3>Create Billing</h3>
												</div>
                                                	<div class="col-auto ms-auto" style="width:600px">
												
                                                    <div class="search_bar">
                                                
                                                                <input type="text" class="form-control" id="search_input" placeholder="Search Name or Mobile No or Registration No" aria-label="Recipient’s username" aria-describedby="basic-addon2">
                                                  
                                                  
                                                </div>
                                                       <div id="search_results"></div>
												</div>
                                                
												<div class="col-auto ms-auto">
													<a href="<?php echo base_url(); ?>billing"  class="btn btn_bg">Billing List</a>
												</div>
											</div>


                     

              

<!-- The search result container will appear here -->


 <?php echo form_open_multipart('billinfo',array('class' => 'form-vertical', 'id' => 'insert_purchase','name' => 'insert_purchase'))?>
     
	<div class="input_form" >
													
     
                                         
									      				<div class="row mb-3">
                            <input type="hidden" id="patient_id" class="form-control " name="patient_id"  value="<?php echo set_value('patient_id'); ?>" >
                                   <div class="form-group col-md-2 mb-3">
                                 <label for="registration_id">Invoice ID</label>
                                 <input type="text" id="registration_id" class="form-control" name="registration_id"  value="<?php echo $registration_no; ?>" readonly>
                                 <span class="text-red small"><?php echo form_error('registration_id'); ?></span>
                              </div> 
                           <div class="form-group col-md-2 mb-3">
                                 <label for="registration_date">Invoice Date</label>
                                 <input type="text" id="registration_date" class="form-control " name="registration_date"  value="<?php echo set_value('registration_date'); ?>" >
                                 <span class="text-red small"><?php echo form_error('registration_date'); ?></span>
                              </div>
                              <div class="form-group col-md-3 mb-3">
                                 <label for="patient_name">Patient Name</label>
                                  <input type="text" id="patient_name" class="form-control " name="patient_name"  value="<?php echo set_value('patient_name'); ?>" >
                                 <span class="text-red small"><?php echo form_error('patient_name'); ?></span>
                              </div>
                                <div class="form-group col-md-3 mb-3">
                                 <label for="father_husband_name">Father/Husband Name </label>
                                 <input type="text" id="father_husband_name" class="form-control" name="father_husband_name" value="<?php echo set_value('father_husband_name'); ?>" >
                                 <span class="text-red small"><?php echo form_error('father_husband_name'); ?></span>
                              </div>
                              <div class="form-group col-md-2 mb-3">
                                 <label for="mobile_no">Mobile No</label>
                                 <input type="text" id="mobile_no" class="form-control" name="mobile_no"  value="<?php echo set_value('mobile_no'); ?>" >
                                 <span class="text-red small"><?php echo form_error('mobile_no'); ?></span>
                              </div>
                               <div class="form-group col-md-3 mb-3" style="display:none;">
                                 <label for="gender">Gender</label>
                                <input type="text" id="gender" class="form-control" name="gender"  value="<?php echo set_value('gender'); ?>" >
                                 
                                 <span class="text-red small"><?php echo form_error(''); ?></span>
                              </div>

                              <div class="form-group col-md-3 mb-3" style="display:none;">
                                 <label for="age">Age</label>
                                 <input type="text" id="age" class="form-control" name="age"  value="<?php echo set_value('age'); ?>" >
                                 <span class="text-red small"><?php echo form_error('age'); ?></span>
                              </div>
                            
                            

                           
                                 <div class="form-group col-md-3 mb-3" style="display:none;">
                                 <label for="ref_name">Ref. Name</label>
                                  <input type="text" id="ref_name" class="form-control" name="ref_name"  value="<?php echo set_value('ref_name'); ?>" >
                                 <span class="text-red small"><?php echo form_error('ref_name'); ?></span>
                              </div>

                             
                                <div class="form-group col-md-3 mb-3" style="display:none;">
                                 <label for="adult_child">Adult / Child</label>
                              
                                 <input type="text" id="adult_child" class="form-control" name="adult_child"  value="<?php echo set_value('adult_child'); ?>" >
                                 <span class="text-red small"><?php echo form_error('adult_child'); ?></span>
                              </div>


                              	  <div class="row">
  <div class="col-12 mb-3">
    <div class="switcher-pricing text-left lh-1">
      <div class="frm_toggle_container">
        <input type="checkbox" name="is_surgery" id="Issurgery" class="pricing-toggle frm_toggle_deselect deselect_toggle_container" value="1">
      
        <label for="myInput">Does this patient need surgery?</label>
      </div>
    </div>
  </div>
</div>

<!-- The div you want to show/hide -->
<div id="surgerySection" style="display: none; ">
 <div class="row">
   <div class="form-group col-md-3 mb-3">
                                 <label for="surgery_date">Surgery Date</label>
                                 <input type="text" id="surgery_date" class="form-control " name="surgery_date"  value="<?php echo set_value('surgery_date'); ?>" >
                                 <span class="text-red small"><?php echo form_error('surgery_date'); ?></span>
                              </div>
                              <div class="form-group col-md-3 mb-3">
                                 <label for="serial">Surgery Serial</label>
                                  <input type="text" id="serial" class="form-control " name="serial"  value="<?php echo set_value('serial'); ?>" >
                                 <span class="text-red small"><?php echo form_error('serial'); ?></span>
                              </div>
                              
                                <div class="form-group col-md-3">
                                 <label for="surgery_dr_name">Surgery Doctor  Name</label>
                                 <select type="text" id="surgery_dr_name" class="form-control" name="surgery_dr_name"  >
                                     <option value="0">Select Doctor</option>
                                    <?php
                                        foreach ($allDoctors as $doct){
                                      echo "<option value='{$doct->id}'>{$doct->name} - {$doct->mobile}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('surgery_dr_name'); ?></span>
                              </div>
                                </div>
                                </div>
			
									          		</div>	
									      				
                                	</div>
									  



                                      <div class="input_form input_form_new" >
									      				<div class="row mb-3">
                                  <div class="col-md-8">

                                  <div class="col-md-12">
                                                      

                                                      <input type="text" class="form-control" name="batch_number_s" id="batch_number_s" placeholder="Search Test By Name here..">
                                                      <span class="text-danger"></span>
                                                      <input type="hidden" id="search_product_id" class="form-control"/>
                                                      <input type="hidden" value="0" id="ganak">

                                                       </div><br>

                                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                            <table id="selectedItemsTable" class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr class="info">
                                                        <th width="60px">S.L</th>
                                                        <th>Test Name</th>
                                                        <th width="150px">Test Fee</th>
                                                        <th>Comments</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                              <tbody id="selectedItemsBody">
            <!-- এখানে JavaScript দিয়ে row যোগ হবে -->
          </tbody>
                                            </table>
                                            </div>
                                               </div>



                                    </div> 
                                    <div class="col-md-4">
                  <table class="table table-bordered table-striped table-hover">
                                                    <tbody><tr>
                                                        <th>Total Amount</th>
                                                        <td>
                                                            <span class="text-red small"></span>
                                                            <input type="number" name="gtotal_amount" id="grandTotal" class="form-control grandTotal text-right" value="0" required="" min="1" step="1" "="" tabindex="7">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Discount 
                                                            <select name="discount_type" class="form-select discount_type form-control" id="form-ware" aria-invalid="false">
                                                                <option value="flat">Flat (৳)</option>
                                                                <option value="percent">Percent (%)</option>
                                                            </select>
                                                        </th>
                                                        <td>
                                                            <input type="number" step="any" name="discountAmount" id="discount_amount" min="0" class="form-control right-start-input" placeholder="0">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Total Amount</th>
                                                        <td>
                                                            <span class="text-red small"></span>
                                                            <input type="number" name="dis_grandTotal" id="dis_grandTotal" class="form-control dis_grandTotal text-right" value="0" required="" min="6" tabindex="7">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Payment Amount</th>
                                                        <td>
                                                            <input type="text" name="payment_amount" id="paymentAmount" class="form-control payment_amount text-right" placeholder="0.00" value="0" min="0" tabindex="7">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Due Amount</th>
                                                        <td>
                                                            <input type="text" name="due_amount" id="dueAmount" class="form-control due_amount text-right" placeholder="0.00" value="0" min="0" tabindex="7">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                              </table>


                                    </div> 

                                            
                              
									      					
									          		</div>	
                                      <div class="row">
                                        <div class="col-12 text-end">
                                          <button type="submit"   class="btn btn_bg"> Save Bill</button>
                                        </div>
                                      </div>

                                	</div>
									      	
												</div>
											</div>
										</div>
                    	</form>
									</div>
								</div>
							</div>



                       <script>
                       
      $(document).ready(function(){
    
    $('#search_input').keyup(function() {
        var searchQuery = $(this).val().trim();

        if (searchQuery.length >= 2) {
            $.ajax({
                url: '<?php echo site_url('billinfo/searchPatient'); ?>',
                method: 'POST',
                data: {search_query: searchQuery},
                dataType: 'json',
                success: function(response) {
                    var html = '';
                    if(response.status == 'success' && response.data.length > 0) {
                        // Loop through the results
                        $.each(response.data, function(index, patient) {
                            html += '<div class="patient-result-card" data-id="' + patient.id + '" data-name="' + patient.name + '" data-adult_child="'  + patient.adult_child + '" data-reference="'  + patient.doctor + '" data-mobile="' + patient.mobile_no +  '" data-gender="' + patient.gender +  '" data-father="' + patient.father_husband_name + '" data-age="' + patient.age + '" data-reg-no="' + patient.registration_no + '">';
                           html += '<div class="patient-result-card-header">' + patient.name + ' ' + patient.mobile_no + '</div>';

                          
                            html += '</div>';
                        });
                    } else {
                        html = '<p>No results found.</p>';
                    }
                    $('#search_results').html(html);
                },
                error: function() {
                    alert('Error occurred while fetching data.');
                }
            });
        } else {
            $('#search_results').html('');  // Clear results if input is less than 2 characters
        }
    });

    // Handle the click event on the patient result card
    $(document).on('click', '.patient-result-card', function() {
        var patientId = $(this).data('id');
        var patientName = $(this).data('name');
        var patientMobile = $(this).data('mobile');
        var patientRegNo = $(this).data('reg-no');
        var patientGender = $(this).data('gender');
        var patientage = $(this).data('age');
        var patientFather = $(this).data('father');
        var patientref_name = $(this).data('reference');
        var padult_child = $(this).data('adult_child');
        
        // Set the selected patient's data into the input fields
        $('#patient_name').val(patientName);
        $('#mobile_no').val(patientMobile);
        $('#registration_no').val(patientRegNo);
        $('#patient_id').val(patientId);
        $('#gender').val(patientGender);
        $('#age').val(patientage);
        $('#father_husband_name').val(patientFather);
        $('#ref_name').val(patientref_name);
        $('#adult_child').val(padult_child);
        
        // Optionally clear the results after selection
        $('#search_results').html('');
    });
});


    </script>





  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            // Set today's date
      
            
            // Initialize autocomplete for item search
            $("#batch_number_s").autocomplete({
                source: function(request, response) {
                    // AJAX call to search items
                    // Replace with your actual endpoint
                    $.ajax({
                        url: "<?php echo base_url(); ?>billinfo/api/items_search",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name + " (" + item.testFee + ")",
                                    value: item.name,
                                    id: item.id,
                                    price: item.testFee
                                };
                            }));
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    addItemToTable(ui.item);
                    $("#batch_number_s").val("");
                    return false;
                }
                
            });
            
            // Function to add item to the table
         function addItemToTable(item) {
    var rowCount = $('#selectedItemsTable tbody tr').length + 1;
    var newRow = `
        <tr>
            <td>${rowCount}</td>
            <td>${item.value}
                <input type="hidden" name="product_id[]" value="${item.id}">
            </td>
            <td>
                <input type="text" class="form-control price" name="price[]" value="${item.price}" onchange="calculateTotal()">
            </td>
            <td>
                <input type="text" class="form-control" name="comments[]">
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
            </td>
        </tr>`;
    
    $('#selectedItemsBody').append(newRow);
    calculateTotal();
}

            
            // Remove row button click event
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                calculateTotal();
            });
            
            // Calculate total amount
            window.calculateTotal = function() {
                var total = 0;
                $('.price').each(function() {
                    var price = parseFloat($(this).val()) || 0;
                    total += price;
                });
                
                $('#grandTotal').val(total.toFixed(2));
                $('#dis_grandTotal').val(total.toFixed(2));
                calculateDueAmount();
            }
            
            // Calculate due amount when payment amount changes
            $('#paymentAmount, #discount_amount').on('input', function() {
                calculateDueAmount();
            });
            
            // Discount type change
            $('.discount_type').change(function() {
                calculateDueAmount();
            });
            
            // Function to calculate due amount
            function calculateDueAmount() {
                var grandTotal = parseFloat($('#grandTotal').val()) || 0;
                var discountAmount = parseFloat($('#discount_amount').val()) || 0;
                var discountType = $('.discount_type').val();
                var paymentAmount = parseFloat($('#paymentAmount').val()) || 0;
                
                // Calculate discounted total
                if (discountType === 'percent') {
                    var discountValue = grandTotal * (discountAmount / 100);
                    var discountedTotal = grandTotal - discountValue;
                } else {
                    var discountedTotal = grandTotal - discountAmount;
                }
                
                $('#dis_grandTotal').val(discountedTotal.toFixed(2));
                
                // Calculate due amount
                var dueAmount = discountedTotal - paymentAmount;
                $('#dueAmount').val(dueAmount.toFixed(2));
            }
            



        });
    </script>



<script>
document.getElementById("Issurgery").addEventListener("change", function() {
  var surgeryDiv = document.getElementById("surgerySection");
  if (this.checked && this.value === "1") {
    surgeryDiv.style.display = "block";
  } else {
    surgeryDiv.style.display = "none";
  }
});
</script>


    	
<script>
function fetchSerial(selectedDate) {
  fetch("<?= base_url('billinfo/get_next_serial'); ?>", {
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: "date=" + encodeURIComponent(selectedDate)
  })
  .then(response => response.json())
  .then(data => {
    $("#serial").val(data.next_serial);
  })
  .catch(error => {
    console.error("Error:", error);
  });
}

</script>

