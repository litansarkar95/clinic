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
													<h3>Facials</h3>
												</div>

                                                		
												<div class="col-auto ms-auto">
                                        
                                               	<a href="<?php echo base_url(); ?>facials"  class="btn btn_bg">Facials List</a>
                                            
                                        </div>

											</div>
								 <form  action="<?php echo base_url(); ?>facials/create" method="post" class="input_form" enctype="multipart/form-data">
                                          
									      				<div class="row mb-3">

                                           

                                                  <div class="form-group col-md-4">
                                                    <label for="Code">Code</label>
                                                    <input type="text" id="Code" class="form-control" name="Code"  value="<?php echo set_value('Code'); ?>" >
                                                    <span class="text-red small"><?php echo form_error('Code'); ?></span>
                                                </div> 
                                                 <div class="form-group col-md-4">
                                                    <label for="name">Name</label>
                                                    <input type="text" id="name" class="form-control" name="name"  value="<?php echo set_value('name'); ?>" required>
                                                    <span class="text-red small"><?php echo form_error('name'); ?></span>
                                                </div> 

                                                 <div class="form-group col-md-4">
                                                    <label for="regular_price">Regular Price</label>
                                                    <input type="text" id="regular_price" class="form-control" name="regular_price"  value="<?php echo set_value('regular_price'); ?>" required>
                                                    <span class="text-red small"><?php echo form_error('regular_price'); ?></span>
                                                </div> 
                                                    <div class="form-group col-md-4">
                                                    <label>Discount Type</label>
                                                    <select id="discount_type" name="discount_type" class="form-control">
                                                        <option value="Percentage">Percentage</option>
                                                        <option value="Fixed">Fixed Amount</option>
                                                    </select>
                                                </div> 

                                                 <div class="form-group col-md-4" id="discount_percentage_show">
                                                    <label for="discount_percentage">Discount Percentage</label>
                                                    <input type="text" id="discount_percentage" class="form-control" name="discount_percentage"  value="<?php echo set_value('discount_percentage'); ?>" >
                                                    <span class="text-red small"><?php echo form_error('discount_percentage'); ?></span>
                                                </div> 


                                                 <div class="form-group col-md-4"  id="discount_amount_show">
                                                    <label for="discount_amount">Discount Amount</label>
                                                    <input type="text" id="discount_amount" class="form-control" name="discount_amount"  value="<?php echo set_value('discount_amount'); ?>" >
                                                    <span class="text-red small"><?php echo form_error('discount_amount'); ?></span>
                                                </div> 
                                             
                                                 <div class="form-group col-md-4">
                                                    <label for="offer_price">Offer Price</label>
                                                    <input type="text" id="offer_price" class="form-control" name="offer_price"  value="<?php echo set_value('offer_price'); ?>" readonly>
                                                    <span class="text-red small"><?php echo form_error('offer_price'); ?></span>
                                                </div> 

                                                    <div class="form-group col-md-4">
                                                    <label for="offer_start_date">Offer Start Date</label>
                                                    <input type="date" id="offer_start_date" class="form-control" name="offer_start_date"  value="<?php echo set_value('offer_start_date'); ?>" >
                                                    <span class="text-red small"><?php echo form_error('offer_start_date'); ?></span>
                                                </div> 


                                                    <div class="form-group col-md-4">
                                                    <label for="offer_end_date">Offer End Date</label>
                                                    <input type="date" id="offer_end_date" class="form-control" name="offer_end_date"  value="<?php echo set_value('offer_end_date'); ?>" >
                                                    <span class="text-red small"><?php echo form_error('offer_end_date'); ?></span>
                                                </div> 

                                                   
                              
                             
									      		            <div class="form-group col-md-3 mb-3">
                                                                           <label for="adult_child"></label>
									      					        <div class="reset-button left">
									      						<button type="submit" class="btn btn_bg">Save </button>
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
   <script>
        $(document).ready(function() {
            // Function to update the visibility of Discount Percentage and Discount Amount based on the Discount Type
            function toggleDiscountFields() {
                var discountType = $('#discount_type').val();
                
                if (discountType == 'Percentage') {
                    // Show Percentage field, hide Amount field
                    $('#discount_percentage_show').prop('disabled', false).show();
                    $('#discount_amount_show').prop('disabled', true).hide();
                } else if (discountType == 'Fixed') {
                    // Show Amount field, hide Percentage field
                    $('#discount_amount_show').prop('disabled', false).show();
                    $('#discount_percentage_show').prop('disabled', true).hide();
                }
            }

            // Call the function to update fields visibility on page load
            toggleDiscountFields();

            // When Discount Type changes, toggle fields
            $('#discount_type').change(function() {
                toggleDiscountFields();
                calculateOfferPrice();  // Recalculate offer price when discount type changes
            });

            // When the regular_price, discount_percentage, or discount_amount changes, calculate the offer price
            function calculateOfferPrice() {
                var regularPrice = parseFloat($('#regular_price').val()) || 0;
                var discountType = $('#discount_type').val();
                var discountPercentage = parseFloat($('#discount_percentage').val()) || 0;
                var discountAmount = parseFloat($('#discount_amount').val()) || 0;

                var offerPrice = 0;

                // Check discount type
                if (discountType == 'Percentage') {
                    // Calculate discount based on percentage
                    offerPrice = regularPrice - (regularPrice * discountPercentage / 100);
                } else if (discountType == 'Fixed') {
                    // Calculate discount based on fixed amount
                    offerPrice = regularPrice - discountAmount;
                }

                // Set the offer price to the input field
                $('#offer_price').val(offerPrice.toFixed(2));
            }

            // Bind change events to inputs
            $('#regular_price, #discount_percentage, #discount_amount').on('input change', function() {
                calculateOfferPrice();
            });
        });
    </script>