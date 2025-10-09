	<div class="container-fluid">
								<div class="row px-3 ">
									<div class="col-12 bg_grey">
										<div class="">
											
											<div class="row justify-content-center pb-5">
												<div class="col-md-12">
                                       <div class="row pb-3">
												<div class="col-auto">
													<h3>Create Patient</h3>
												</div>
												<div class="col-auto ms-auto">
													<a href="<?php echo base_url(); ?>patient"  class="btn btn_bg">Patient List</a>
												</div>
											</div>
													<form action="" class="input_form">
									      				<div class="row mb-3">

                                              <div class="form-group col-md-3">
                                 <label for="registration_id">Registration ID</label>
                                 <input type="text" id="registration_id" class="form-control" name="registration_id"  value="<?php echo rand("10000",999999); ?>" >
                                 <span class="text-red small"><?php echo form_error('registration_id'); ?></span>
                              </div> 
                           <div class="form-group col-md-3">
                                 <label for="registration_date">Registration Date</label>
                                 <input type="text" id="registration_date" class="form-control" name="registration_date"  value="<?php echo set_value('registration_date'); ?>" >
                                 <span class="text-red small"><?php echo form_error('registration_date'); ?></span>
                              </div>
                              <div class="form-group col-md-3">
                                 <label for="patient_name">Patient Name</label>
                                 <input type="text" id="patient_name" class="form-control" name="patient_name"  value="<?php echo set_value('patient_name'); ?>" >
                                 <span class="text-red small"><?php echo form_error('patient_name'); ?></span>
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
                              
                                 <select type="text" id="gender" class="form-control" name="gender"  >
                                    <option value="">Select</option>
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
                                 <label for="occupation_id">Occupation</label>
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
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Christianity">Christianity</option>
                                    <option value="Buddhism">Buddhism</option>
                                    <option value="Other">Other</option>
                                    
                                    </select>
                                 <span class="text-red small"><?php echo form_error('religion'); ?></span>
                              </div>
                              <div class="form-group col-md-3">
                                 <label for="nationality">Nationality</label>
                                 <select type="text" id="nationality" class="form-control" name="nationality"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <?php
                                        foreach ($allRole as $role){
                                      echo "<option value='{$role->id}'>{$role->name}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('nationality'); ?></span>
                              </div>
                                 <div class="form-group col-md-3">
                                 <label for="nationality">Ref. Name</label>
                                 <select type="text" id="nationality" class="form-control" name="nationality"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <?php
                                        foreach ($allRole as $role){
                                      echo "<option value='{$role->id}'>{$role->name}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('nationality'); ?></span>
                              </div>

                                 <div class="form-group col-md-3">
                                 <label for="doctor_id">Doctor ID</label>
                                 <select type="text" id="doctor_id" class="form-control" name="doctor_id"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <?php
                                        foreach ($allRole as $role){
                                      echo "<option value='{$role->id}'>{$role->name}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('doctor_id'); ?></span>
                              </div>
                                <div class="form-group col-md-3">
                                 <label for="adult_child">Adult / Child</label>
                              
                                 <select type="text" id="adult_child" class="form-control" name="adult_child"  >
                                    <option value="Adult">Adult</option>
                                    <option value="Child">Child</option>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('adult_child'); ?></span>
                              </div>
                               <div class="form-group col-md-3">
                                 <label for="bed_type">Bed Type</label>
                                 <select type="text" id="bed_type" class="form-control" name="bed_type"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <?php
                                        foreach ($allRole as $role){
                                      echo "<option value='{$role->id}'>{$role->name}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('bed_type'); ?></span>
                              </div>
                                <div class="form-group col-md-3">
                                 <label for="bed">Bed</label>
                                 <input type="text" id="bed" class="form-control" name="bed"  value="<?php echo set_value('bed'); ?>" >
                                 <span class="text-red small"><?php echo form_error('bed'); ?></span>
                              </div>
									      					
									      		</div>	
									      				<div class="row">
									      					<div class="col-12">
									      						<a href="Articles.html"  class="btn btn_bg">Save</a>
									      					</div>
									      				</div>
									      			</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>