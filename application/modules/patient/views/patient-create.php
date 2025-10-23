	  <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<style>
    button {
  padding: 10px 20px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  outline: none;
  transition: all 0.3s ease;
}
.custom-button {
  background-color: #4CAF50; /* Green background */
  color: white; /* White text */
  border-radius: 8px; /* Rounded corners */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.custom-button:hover {
  background-color: #509c37ff; /* Darker green on hover */
  color: white !important; 
}

.custom-button:active {
  transform: scale(0.98); /* Slight shrink effect when clicked */
}

.custom-button:focus {
  border: 2px solid #2196F3; /* Focus effect with blue border */
}
    </style>
     <script>
    $(document).ready(function() {
   

   $("#registration_date,to_date").datepicker({
  dateFormat: "dd-mm-yy",
  changeMonth: true,
  changeYear: true,
  yearRange: "1900:2100",
});

// Set a default date (e.g., today's date)
var today = $.datepicker.formatDate("dd-mm-yy", new Date());
$("#registration_date,.to_date").val(today);

  });



     
    </script>
   <div class="container-fluid">
								<div class="row px-3 ">
									<div class="col-12 bg_grey">
										<div class="">
											
											<div class="row justify-content-center pb-5">
												<div class="col-md-12">
                                                  <div class="row pb-3">
												<div class="col-auto">
													<h3>Cusomer Registration</h3>
												</div>

                                                		<div class="col-auto ms-auto">
													<a href="<?php echo base_url(); ?>billinfo"  class="btn custom-button">Create Cusomer Billing</a>
												</div>
												<div class="col-auto ms-auto">
                                            <form action="<?php echo base_url(); ?>patient" method="POST">
                                                <!-- Add hidden inputs to send data -->
                                                <input type="hidden" name="from_date" value="<?php echo date("d-m-Y"); ?>">
                                                <input type="hidden" name="to_date" value="<?php echo  date("d-m-Y"); ?>">
                                                <button type="submit" class="btn btn_bg">Cusomer List</button>
                                            </form>
                                        </div>

											</div>
										 <?php echo form_open_multipart('patient/create',array('class' => 'form-vertical input_form', 'id' => 'insert_purchase','name' => 'insert_purchase'))?>
                                          
									      				<div class="row mb-3">

                                              <div class="form-group col-md-3">
                                 <label for="registration_id">Registration ID</label>
                                 <input type="text" id="registration_id" class="form-control" name="registration_id"  value="<?php echo $registration_no; ?>" readonly>
                                 <span class="text-red small"><?php echo form_error('registration_id'); ?></span>
                              </div> 
                               <div class="form-group col-md-3">
                                 <label for="registration_date">Registration Date</label>
                                 <input type="text" id="registration_date" class="form-control " name="registration_date"  value="<?php echo set_value('registration_date'); ?>"  required>
                                 <span class="text-red small"><?php echo form_error('registration_date'); ?></span>
                              </div>
                              <div class="form-group col-md-3">
                                 <label for="patient_name">Cusomer Name</label>
                                 <input type="text" id="patient_name" class="form-control" name="patient_name"  value="<?php echo set_value('patient_name'); ?>" required>
                                 <span class="text-red small"><?php echo form_error('patient_name'); ?></span>
                              </div>
                               
                              <div class="form-group col-md-3">
                                 <label for="mobile_no">Mobile No</label>
                                 <input type="text" id="mobile_no" class="form-control" name="mobile_no"  value="<?php echo set_value('mobile_no'); ?>" required>
                                 <span class="text-red small"><?php echo form_error('mobile_no'); ?></span>
                              </div>
                              

                              <div class="form-group col-md-3">
                                 <label for="age">Age</label>
                                 <input type="text" id="age" class="form-control" name="age"  value="<?php echo set_value('age'); ?>" required>
                                 <span class="text-red small"><?php echo form_error('age'); ?></span>
                              </div>
                           
                              
                                  

                             
									      		            <div class="form-group col-md-3 mb-3">
                                                                           <label for="adult_child"></label>
									      					        <div class="reset-button left">
									      						<button type="submit" class="btn btn_bg">Save Registration</button>
									      					</div>
									      				</div>			
									      		</div>	
									      			
									      			
										
										
                                     


                                                  
</div>
														</div>		     
					                                    									     

										</div>
									</div>
								</div>
							</div>


                                                 




                    
                    </form>
            </div>
        </div>
    </section>
 <!--- Start new --> 


                       <script>
        $(document).ready(function() {
            $('#district_id').change(function() {
                var district_id = $(this).val();

                if (district_id) {
                    $.ajax({
                        url: '<?= base_url('patient/fetch_upazilla') ?>',
                        type: 'POST',
                        data: { district_id: district_id },
                        dataType: 'json',
                        success: function(data) {
                            $('#upazilla_id').empty().append('<option value="">Select Upazilla</option>');
                            
                            $.each(data, function(index, subcategory) {
                                $('#upazilla_id').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#upazilla_id').empty().append('<option value="">Select Upazilla</option>');
                }
            });
        });



 
    </script>




  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            // Set today's date
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            $('#sales_date').val(yyyy + '-' + mm + '-' + dd);
            
            // Initialize autocomplete for patient search
            $("#pat_search").autocomplete({
                source: function(request, response) {
                    // AJAX call to search patients
                    // Replace with your actual endpoint
                    $.ajax({
                        url: "<?php echo base_url(); ?>patient/searchPatients",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.value + " (" + item.pat_mobile + ")",
                                    value: item.value,
                                    id: item.pat_id ,
                                    address: item.address,
                                    mobile: item.pat_mobile,
                                    sex: item.sex,
                                    age: item.age
                                };
                            }));
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    $("#pat_id").val(ui.item.id);
                    $("#reg_id").val(ui.item.id);
                    $("#pat_name").val(ui.item.value);
                    $("#pat_address").val(ui.item.address);
                    $("#pat_mobile").val(ui.item.mobile);
                    $("#pat_age").val(ui.item.age);
                    
                    if (ui.item.sex === "Male") {
                        $("#pt_male").prop("checked", true);
                    } else {
                        $("#pt_female").prop("checked", true);
                    }
                    
                    return false;
                }
            });


              // Initialize autocomplete for patient search
              $("#dr_search").autocomplete({
                source: function(request, response) {
                    // AJAX call to search Doctor
                    // Replace with your actual endpoint
                    $.ajax({
                        url: "<?php echo base_url(); ?>patient/searchDoctor",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.value + " (" + item.degree + ")",
                                    value: item.value,
                                    degree: item.degree,
                                    id: item.id ,
                                   
                                };
                            }));
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    $("#dr_id").val(ui.item.id);
                    $("#doct_reg_id").val(ui.item.id);
                    $("#dr_name").val(ui.item.value);
                    $("#dr_degree").val(ui.item.degree);
                    
                  
                    return false;
                }
            });
            
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
                var newRow = '<tr>' +
                    '<td>' + rowCount + '</td>' +
                    '<td>' + item.value + '<input type="hidden" required name="product_id[]" value="' + item.id + '"></td>' +
                    '<td>' + 
                        '<input type="text" class="form-control price" name="price[]" value="' + item.price + '" onchange="calculateTotal()">' +
                    '</td>' +
                    '<td><input type="text" class="form-control" name="comments[]"></td>' +
                    '<td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>' +
                '</tr>';
                
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