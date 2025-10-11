	  <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

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
													<h3>Create Billing</h3>
												</div>
												<div class="col-auto ms-auto">
													<a href="<?php echo base_url(); ?>billing"  class="btn btn_bg">Billing List</a>
												</div>
											</div>
													
                                            <form  class="input_form" action="<?php echo base_url(); ?>patient/billing/create" method="post" enctype="multipart/form-data">
									      				<div class="row mb-3">

                                              <div class="form-group col-md-3">
                                 <label for="registration_id">Invoice ID</label>
                                 <input type="text" id="registration_id" class="form-control" name="registration_id"  value="<?php echo $registration_no; ?>" readonly>
                                 <span class="text-red small"><?php echo form_error('registration_id'); ?></span>
                              </div> 
                           <div class="form-group col-md-3">
                                 <label for="registration_date">Invoice Date</label>
                                 <input type="text" id="registration_date" class="form-control " name="registration_date"  value="<?php echo set_value('registration_date'); ?>" >
                                 <span class="text-red small"><?php echo form_error('registration_date'); ?></span>
                              </div>
                              <div class="form-group col-md-3">
                                 <label for="patient_id">Patient Name</label>
                               <select type="text" id="patient_id" class="form-control" name="patient_id"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <?php
                                        foreach ($allDst as $dis){
                                      echo "<option value='{$dis->id}'>{$dis->name}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('patient_id'); ?></span>
                              </div>
                                <div class="form-group col-md-3">
                                 <label for="father_husband_name">Father/Husband Name </label>
                                 <input type="text" id="father_husband_name" class="form-control" name="father_husband_name" value="<?php echo set_value('father_husband_name'); ?>" >
                                 <span class="text-red small"><?php echo form_error('father_husband_name'); ?></span>
                              </div>
                              <div class="form-group col-md-3">
                                 <label for="mobile_no">Mobile No</label>
                                 <input type="text" id="mobile_no" class="form-control" name="mobile_no"  value="<?php echo set_value('mobile_no'); ?>" >
                                 <span class="text-red small"><?php echo form_error('mobile_no'); ?></span>
                              </div>
                               <div class="form-group col-md-3">
                                 <label for="gender">Gender</label>
                              
                                 <select type="text" id="gender" class="form-control frm_select" name="gender"  >
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('gender'); ?></span>
                              </div>

                              <div class="form-group col-md-3">
                                 <label for="age">Age</label>
                                 <input type="text" id="age" class="form-control" name="age"  value="<?php echo set_value('age'); ?>" >
                                 <span class="text-red small"><?php echo form_error('age'); ?></span>
                              </div>
                               <div class="form-group col-md-3">
                                 <label for="district_id">District</label>
                                 <select type="text" id="district_id" class="form-control" name="district_id"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <?php
                                        foreach ($allDst as $dis){
                                      echo "<option value='{$dis->id}'>{$dis->name}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('district_id'); ?></span>
                              </div>
                                <div class="form-group col-md-3">
                                 <label for="upazilla_id">Upazilla</label>
                                 <select type="text" id="upazilla_id" class="form-control" name="upazilla_id"  >
                                    <option value="">Select District</option>
                                  
                                    </select>
                                 <span class="text-red small"><?php echo form_error('upazilla_id'); ?></span>
                              </div>
                                <div class="form-group col-md-3">
                                 <label for="village">Village</label>
                                 <input type="text" id="village" class="form-control" name="village"  value="<?php echo set_value('village'); ?>" >
                                 <span class="text-red small"><?php echo form_error('village'); ?></span>
                              </div>

                                <div class="form-group col-md-3">
                                 <label for="occupation_id">Balance</label>
                               <select type="text" id="occupation_id" class="form-control" name="occupation_id"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <?php
                                        foreach ($allOccu as $occu){
                                      echo "<option value='{$occu->id}'>{$occu->name}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('occupation_id'); ?></span>
                              </div>
                              <div class="form-group col-md-3">
                                 <label for="religion">Religion</label>
                                 <select type="text" id="religion" class="form-control" name="religion"  >
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Christianity">Christianity</option>
                                    <option value="Buddhism">Buddhism</option>
                                    <option value="Other">Other</option>
                                    
                                    </select>
                                 <span class="text-red small"><?php echo form_error('religion'); ?></span>
                              </div>
                              <div class="form-group col-md-3">
                                 <label for="nationality">Nationality</label>
                                 <select type="text" id="nationality" class="form-control" name="nationality"  >
                             
                                    <?php
                                        foreach ($allCountry as $contry){
                                      echo "<option value='{$contry->id}'>{$contry->name}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('nationality'); ?></span>
                              </div>
                                 <div class="form-group col-md-3">
                                 <label for="ref_name">Ref. Name</label>
                                 <select type="text" id="ref_name" class="form-control" name="ref_name"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <?php
                                        foreach ($allDoctors as $doct){
                                      echo "<option value='{$doct->id}'>{$doct->name} - {$doct->mobile}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('ref_name'); ?></span>
                              </div>

                             
                                <div class="form-group col-md-3">
                                 <label for="adult_child">Adult / Child</label>
                              
                                 <select type="text" id="adult_child" class="form-control" name="adult_child"  >
                                    <option value="Adult">Adult</option>
                                    <option value="Child">Child</option>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('adult_child'); ?></span>
                              </div>
                              
									      					
									      		</div>	
									      				<div class="row">
									      					<div class="col-12">
									      						<button type="submit" href="Articles.html"  class="btn btn_bg">Save</button>
									      					</div>
									      				</div>
									      			</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>



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

  $(document).ready(function() {
 
    $('#ref_name').change(function() {
        var ref_name_id = $(this).val();  

        if(ref_name_id != '') {
            $.ajax({
                url: '<?php echo site_url('patient/get_doctor_id_by_ref_name'); ?>',  
                type: 'POST',
                dataType: 'json',
                data: { ref_name_id: ref_name_id },
                success: function(response) {
                    if(response) {
                        $('#doctor_id').val(response.id_no); 
                    } else {
                        $('#doctor_id').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error: ' + status + ' - ' + error);
                    $('#doctor_id').val('');
                }
            });
        } else {
            $('#doctor_id').val('');
        }
    });
});



    </script>