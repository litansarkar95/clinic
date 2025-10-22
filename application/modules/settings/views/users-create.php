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
													<h3>Users</h3>
												</div>

                                                		
												<div class="col-auto ms-auto">
                                        
                                               	<a href="<?php echo base_url(); ?>settings/users"  class="btn btn_bg">Users List</a>
                                            
                                        </div>

											</div>
										 <?php echo form_open_multipart('settings/users/create',array('class' => 'form-vertical input_form', 'id' => 'insert_purchase','name' => 'insert_purchase'))?>
                                          
									      				<div class="row mb-3">

                                            
                                                  <div class="form-group col-md-6">
                                        <label for="branch_id">Branch Name</label>
                                 <select type="text" id="branch_id" class="form-control" name="branch_id"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                        <?php
                                        foreach ($allBranch as $barnch){
                                      echo "<option value='{$barnch->id}'>{$barnch->name}</option>";
                                        }
                                    ?>
                                  
                                
                                    </select>
                                 <span class="text-red small"><?php echo form_error('branch_id'); ?></span>
                              </div> 

                                  <div class="form-group col-md-6">
                                                    <label for="name">Name</label>
                                                    <input type="text" id="name" class="form-control" name="name"  value="<?php echo set_value('name'); ?>" required>
                                                    <span class="text-red small"><?php echo form_error('name'); ?></span>
                                                </div> 
                               <div class="form-group col-md-6">
                                 <label for="mobile_no">Mobile No  (Username )</label>
                                 <input type="text" id="mobile_no" class="form-control " name="mobile_no"  value="<?php echo set_value('mobile_no'); ?>"  >
                                 <span class="text-red small"><?php echo form_error('mobile_no'); ?></span>
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="email">Email</label>
                                 <input type="text" id="email" class="form-control" name="email"  value="<?php echo set_value('email'); ?>" >
                                 <span class="text-red small"><?php echo form_error('email'); ?></span>
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="password">Password</label>
                                 <input type="text" id="password" class="form-control" name="password"  value="<?php echo set_value('password'); ?>" >
                                 <span class="text-red small"><?php echo form_error('password'); ?></span>
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
 