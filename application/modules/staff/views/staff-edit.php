
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> 
    
<script>
$(document).ready(function() {
    // Initialize the datepicker with year selection
    $("#dob, #date_of_joining, #date_of_leaving").datepicker({
        dateFormat: 'dd-mm-yy',
        changeYear: true,      // Enable year selection
        yearRange: "1900:2100" // Set the range of years available
    });

    // Set a default date (e.g., today's date)
    var today = $.datepicker.formatDate('dd-mm-yy', new Date());
    $("#dob, #date_of_joining, #date_of_leaving").val();
});


    </script>
  <!-- Content Header (Page header) -->
            <section class="content-header">
            
               <div >
               <h4><?php echo display('staff'); ?></h4>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-md-9 col-md-offset-1">
                     <div class="panel panel-bd ">
                        <div class="panel-heading">
                        <div class="btn-group panel-defalut-two" >
                     
                     <h4><?php echo display('edit')." ".display('staff');  ?> </h4>

          
                     <a type="button" class="btn btn-labeled btn-success m-b-5" href="<?php echo base_url(); ?>staff">
               <span class="btn-label"><i class="glyphicon glyphicon-list"></i></span><?php echo display('staff')." ".display('list'); ?>
               </a>
              
                
               </div>
                        </div>
                        <div class="panel-body">
                            <?php
                            if(isset($allPdt)){
                                foreach($allPdt as $pdt){
                                   
                                
                            
                            ?>
                           <form  action="<?php echo base_url(); ?>staff/update" method="post" enctype="multipart/form-data">
                           <input type="hidden" id="id" class="form-control" name="id" value="<?php echo $pdt->id; ?>" >
                           <input type="hidden" id="login_id" class="form-control" name="login_id" value="<?php echo $pdt->login_id; ?>" >  

                              <div class="form-group col-md-12">
                                 <label for="first_name"><?php echo display('first_name'); ?></label>
                                 <input type="text" id="first_name" class="form-control" name="first_name"  value="<?php echo $pdt->first_name; ?>" >
                                 <span class="text-red small"><?php echo form_error('first_name'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="last_name"><?php echo display('last_name'); ?></label>
                                 <input type="text" id="last_name" class="form-control" name="last_name" placeholder="<?php echo display('enter')." ".display('last_name'); ?>" value="<?php echo $pdt->last_name; ?>" >
                                 <span class="text-red small"><?php echo form_error('last_name'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="email"><?php echo display('email'); ?></label>
                                 <input type="email" id="email" class="form-control" name="email" placeholder="<?php echo display('enter')." ".display('email'); ?>" value="<?php echo $pdt->email; ?>" >
                                 <span class="text-red small"><?php echo form_error('email'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="staff_type"><?php echo display('staff_type'); ?></label>
                              
                                 <select type="text" id="staff_type" class="form-control" name="staff_type"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <option value="1" <?php if($pdt->staff_type == 1){ echo "selected"; } ?>>Administrator</option>
                                    <option value="2" <?php if($pdt->staff_type == 2){ echo "selected"; } ?>>Not Staff Member</option>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('staff_type'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="basic_salary"><?php echo display('basic_salary'); ?></label>
                                 <input type="text" id="basic_salary" class="form-control" name="basic_salary" placeholder="<?php echo display('enter')." ".display('basic_salary'); ?>" value="<?php  echo $pdt->basic_salary; ?>" >
                                 <span class="text-red small"><?php echo form_error('basic_salary'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="hourly_rate"><?php echo display('hourly_rate'); ?></label>
                                 <input type="text" id="hourly_rate" class="form-control" name="hourly_rate"  value="<?php echo $pdt->hourly_rate; ?>" >
                                 <span class="text-red small"><?php echo form_error('hourly_rate'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="role"><?php echo display('role'); ?></label>
                                 <select type="text" id="role" class="form-control" name="role"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <?php
                                        foreach ($allRole as $role){
                                            if($role->name == $pdt->role){
                                      echo "<option value='{$role->id}' selected>{$role->name}</option>";
                                        }else{
                                            echo "<option value='{$role->id}'>{$role->name}</option>";
                                        }
                                    }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('role'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="father_name"><?php echo display('father_name'); ?></label>
                                 <input type="text" id="father_name" class="form-control" name="father_name" placeholder="<?php echo display('enter')." ".display('father_name'); ?>" value="<?php echo $pdt->father_name; ?>" >
                                 <span class="text-red small"><?php echo form_error('father_name'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="mother_name"><?php echo display('mother_name'); ?></label>
                                 <input type="text" id="mother_name" class="form-control" name="mother_name" placeholder="<?php echo display('enter')." ".display('mother_name'); ?>" value="<?php echo $pdt->mother_name; ?>" >
                                 <span class="text-red small"><?php echo form_error('mother_name'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="contact_no"><?php echo display('contact_no'); ?></label>
                                 <input type="text" id="contact_no" class="form-control" name="contact_no" placeholder="<?php echo display('enter')." ".display('contact_no'); ?>" value="<?php echo $pdt->contact_no; ?>" >
                                 <span class="text-red small"><?php echo form_error('contact_no'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="emergency_contact_no"><?php echo display('emergency_contact_no'); ?></label>
                                 <input type="text" id="emergency_contact_no" class="form-control" name="emergency_contact_no" placeholder="<?php echo display('enter')." ".display('emergency_contact_no'); ?>" value="<?php echo $pdt->emergency_contact_no; ?>" >
                                 <span class="text-red small"><?php echo form_error('emergency_contact_no'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="dob"><?php echo display('dob'); ?></label>
                                 <input type="text" id="dob" class="form-control Date" name="dob"  value="<?php echo date("d-m-Y",$pdt->dob); ?>" >
                                 <span class="text-red small"><?php echo form_error('dob'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="marital_status"><?php echo display('marital_status'); ?></label>
                                 <select type="text" id="marital_status" class="form-control" name="marital_status"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <option value="Single" <?php if($pdt->marital_status == 'Single') echo 'selected'; ?>>Single</option>
                                    <option value="Married" <?php if($pdt->marital_status == 'Married') echo 'selected'; ?>>Married</option>
                                    <option value="Widowed" <?php if($pdt->marital_status == 'Widowed') echo 'selected'; ?>>Widowed</option>
                                    <option value="Separated" <?php if($pdt->marital_status == 'Separated') echo 'selected'; ?>>Separated</option>
                                    <option value="Not Specified" <?php if($pdt->marital_status == 'Not Specified') echo 'selected'; ?>>Not Specified</option>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('marital_status'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="date_of_joining"><?php echo display('date_of_joining'); ?></label>
                                 <input type="text" id="date_of_joining" class="form-control" name="date_of_joining"  value="<?php echo date("d-m-Y",$pdt->date_of_joining); ?>" >
                                 <span class="text-red small"><?php echo form_error('date_of_joining'); ?></span>
                              </div>
                              <!-- <div class="form-group col-md-12">
                                 <label for="date_of_leaving"><?php echo display('date_of_leaving'); ?></label>
                                 <input type="text" id="date_of_leaving" class="form-control" name="date_of_leaving"  value="<?php echo date("d-m-Y",$pdt->date_of_leaving); ?>" >
                                 <span class="text-red small"><?php echo form_error('date_of_leaving'); ?></span>
                              </div> -->
                              <div class="form-group col-md-12">
                                 <label for="gender"><?php echo display('gender'); ?></label>
                              
                                 <select type="text" id="gender" class="form-control" name="gender"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <option value="Male" <?php if($pdt->gender == 'Male') echo 'selected'; ?>>Male</option>
                                    <option value="Female"  <?php if($pdt->gender == 'Female') echo 'selected'; ?>>Female</option>
                                    <option value="Others"  <?php if($pdt->gender == 'Others') echo 'selected'; ?>>Others</option>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('gender'); ?></span>
                              </div>

                              <div class="form-group col-md-12">
                                 <label for="is_active"><?php echo display('status'); ?></label>
                              
                                 <select type="text" id="is_active" class="form-control" name="is_active"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <option value="1" <?php if($pdt->is_active == '1') echo 'selected'; ?>><?php echo display('active'); ?></option>
                                    <option value="0"  <?php if($pdt->is_active == '0') echo 'selected'; ?>><?php echo display('inactive'); ?></option>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('is_active'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="employee_id"><?php echo display('employee_id'); ?></label>
                                 <input type="text" id="employee_id" class="form-control" name="employee_id"  value="<?php echo $pdt->employee_id; ?>" >
                                 <span class="text-red small"><?php echo form_error('employee_id'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="designationdesignation"><?php echo display('designation'); ?></label>
                                 <select type="text" id="designation" class="form-control" name="designation"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <?php
                                        foreach ($allDesign as $design){
                                          if($design->id == $pdt->designation_id){
                                             echo "<option value='{$design->id}' selected>{$design->name}</option>";
                                          }else{
                                             echo "<option value='{$design->id}'>{$design->name}</option>";
                                          }
                                  
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('designation'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="facebook"><?php echo display('facebook'); ?></label>
                                 <input type="text" id="facebook" class="form-control" name="facebook"  value="<?php echo $pdt->facebook; ?>" >
                                 <span class="text-red small"><?php echo form_error('facebook'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="twitter"><?php echo display('twitter'); ?></label>
                                 <input type="text" id="twitter" class="form-control" name="twitter"  value="<?php echo $pdt->twitter; ?>" >
                                 <span class="text-red small"><?php echo form_error('twitter'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="linkedin"><?php echo display('linkedin'); ?></label>
                                 <input type="text" id="linkedin" class="form-control" name="linkedin"  value="<?php echo $pdt->linkedin; ?>" >
                                 <span class="text-red small"><?php echo form_error('linkedin'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="instagram"><?php echo display('instagram'); ?></label>
                                 <input type="text" id="instagram" class="form-control" name="instagram"  value="<?php echo $pdt->instagram; ?>" >
                                 <span class="text-red small"><?php echo form_error('instagram'); ?></span>
                              </div>
   
                              <div class="form-group col-md-12">
                                 <label for="qualification"><?php echo display('qualification'); ?></label>
                                 <textarea type="text" id="qualification" class="form-control" name="qualification"><?php echo $pdt->qualification; ?></textarea>
                                 <span class="text-red small"><?php echo form_error('qualification'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="work_exp"><?php echo display('work_exp'); ?></label>
                                 <textarea type="text" id="work_exp" class="form-control" name="work_exp"><?php echo $pdt->work_exp; ?></textarea>
                                 <span class="text-red small"><?php echo form_error('work_exp'); ?></span>
                              </div>

                              <div class="form-group col-md-12">
                                 <label for="local_address"><?php echo display('local_address'); ?></label>
                                 <textarea type="text" id="local_address" class="form-control" name="local_address"><?php echo $pdt->local_address; ?></textarea>
                                 <span class="text-red small"><?php echo form_error('local_address'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="permanent_address"><?php echo display('permanent_address'); ?></label>
                                 <textarea type="text" id="permanent_address" class="form-control" name="permanent_address" ><?php echo $pdt->permanent_address; ?></textarea>
                                 <span class="text-red small"><?php echo form_error('permanent_address'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
    <label><?php echo display('member_departments'); ?></label><br>
    <?php
    if (isset($allDept)) {
        foreach ($allDept as $dept) {
            // Check if the department is in the staff department array
            $isChecked = false;
            foreach ($allSaffDept as $staffdept) {
                if ($staffdept->departmentid == $dept->id) {
                    $isChecked = true;
                    break;  // Once we find a match, no need to check further
                }
            }
            ?>
            <label class="radio-inline">
                <input name="dept[]" value="<?php echo $dept->id; ?>" type="checkbox" <?php echo $isChecked ? 'checked' : ''; ?>>
                <?php echo $dept->name; ?>
            </label><br>
            <?php
        }
    }
    ?>
</div>

                              <div class="form-group col-md-12">
                                 <label for="resume"><?php echo display('resume'); ?></label>
                                 <input type="file" id="resume" class="form-control" name="resume"  value="<?php echo set_value('resume'); ?>" >
                                 <span class="text-red small"><?php echo form_error('resume'); ?></span>
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="pic"><?php echo display('picture'); ?></label>
                                 <input type="file" id="pic" class="form-control" name="pic"  >
                                 <span class="text-red small"><?php echo form_error('pic'); ?></span>
                              </div>
                          
                           
                              <div class="form-group col-sm-12">
                              <div class="reset-button left">
                                 <button   type="reset" class="btn btn-warning"><?php echo display('reset'); ?></button>
                                 <button type="submit" class="btn btn-success"><?php echo display('update'); ?></button>
                              </div></div>
                           </form>

                           <?php
                                    }
                                }
                            
                           ?>
                        </div>
                     </div>
                  </div>



 
               
                      
               </div>
            </section>
            <!-- /.content -->

          