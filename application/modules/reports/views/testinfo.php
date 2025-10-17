<style>
 .input_form_bg{
     linear-gradient(121deg, rgba(162, 76, 0, 0.2), rgb(91 255 247 / 50%)) ;
 }
     </style>
<div class="container-fluid">
     <div class="row  ">
          <div class="col-12 bg_grey">
               <div class="content bg_grey px-0">

                    <div class="row ">
                         <div class="col-md-4">
                              <form action="<?php echo base_url() ?>reports/transactionReport/search" method="post"
                                   target="_blank" class="input_form">
                                   <div class="col-auto">
                                        <h3>Transaction Reports</h3>
                                   </div>
                                   <hr>
                                   <div class="row">


                                        <div class=" col-md-12 mb-3">
                                             <label for="from_date">From Date</label>
                                             <input type="text" id="from_date" class="form-control " name="from_date"
                                                  value="<?php echo set_value('from_date'); ?>">
                                             <span class="text-red small">
                                                  <?php echo form_error('from_date'); ?>
                                             </span>
                                        </div>
                                        <div class="col-md-12  mb-3">
                                             <label for="to_date">To Date</label>
                                             <input type="text" id="to_date" class="form-control " name="to_date"
                                                  value="<?php echo set_value('to_date'); ?>">
                                        </div>

                                        <div class="row">
                                             <div class="col-12">
                                                  <button type="submit" class="btn btn_bg">Search</button>
                                             </div>
                                        </div>
			       </div>
                              </form>
                         </div>


		 <!--- Start -->
 		 <div class="col-md-4">
                              <form action="<?php echo base_url() ?>reports/transactionReport/duereportssearch" method="post"
                                   target="_blank" class="input_form input_form_bg">
                                   <div class="col-auto">
                                        <h3>Due Transaction Report</h3>
                                   </div>
                                   <hr>
                                   <div class="row">


                                        <div class=" col-md-12 mb-3">
                                             <label for="due_from_date">From Date</label>
                                             <input type="text" id="due_from_date" class="form-control " name="due_from_date"
                                                  value="<?php echo set_value('due_from_date'); ?>">
                                             <span class="text-red small">
                                                  <?php echo form_error('due_from_date'); ?>
                                             </span>
                                        </div>
                                        <div class="col-md-12  mb-3">
                                             <label for="due_to_date">To Date</label>
                                             <input type="text" id="due_to_date" class="form-control " name="due_to_date"
                                                  value="<?php echo set_value('due_to_date'); ?>">
                                        </div>

                                        <div class="row">
                                             <div class="col-12">
                                                  <button type="submit" class="btn btn_bg">Search</button>
                                             </div>
                                        </div>

			       </div>
                              </form>
                         </div>
		 <!--- End -->

		  <!--- Start -->
 		 <div class="col-md-4">
                              <form action="<?php echo base_url() ?>reports/testinfo/search" method="post"
                                   target="_blank" class="input_form">
                                   <div class="col-auto">
                                        <h3>Test Reports</h3>
                                   </div>
                                   <hr>
                                   <div class="row">


                                        <div class=" col-md-12 mb-3">
                                             <label for="test_from_date">From Date</label>
                                             <input type="text" id="test_from_date" class="form-control " name="test_from_date"
                                                  value="<?php echo set_value('test_from_date'); ?>">
                                             <span class="text-red small">
                                                  <?php echo form_error('test_from_date'); ?>
                                             </span>
                                        </div>
                                        <div class="col-md-12  mb-3">
                                             <label for="test_to_date">To Date</label>
                                             <input type="text" id="test_to_date" class="form-control " name="test_to_date"
                                                  value="<?php echo set_value('test_to_date'); ?>">
                                        </div>

                                        <div class="row">
                                             <div class="col-12">
                                                  <button type="submit" class="btn btn_bg">Search</button>
                                             </div>
                                        </div>

			       </div>
                              </form>
                         </div>
		 <!--- End -->
    <!--- Start Operation Reports -->
 		 <div class="col-md-4 mt-3">
                              <form action="<?php echo base_url() ?>reports/testinfo/operationsearch" method="post"
                                   target="_blank" class="input_form">
                                   <div class="col-auto">
                                        <h3>Operation Reports</h3>
                                   </div>
                                   <hr>
                                   <div class="row">


                                        <div class=" col-md-12 mb-3">
                                             <label for="operation_from_date">From Date</label>
                                             <input type="text" id="operation_from_date" class="form-control from_date" name="operation_from_date"
                                                  value="<?php echo set_value('operation_from_date'); ?>">
                                             <span class="text-red small">
                                                  <?php echo form_error('operation_from_date'); ?>
                                             </span>
                                        </div>
                                        <div class="col-md-12  mb-3">
                                             <label for="operation_to_date">To Date</label>
                                             <input type="text" id="operation_to_date" class="form-control to_date" name="operation_to_date"
                                                  value="<?php echo set_value('operation_to_date'); ?>">
                                        </div>

                                               <div class="col-md-12  mb-3">
                                 <label for="surgery_dr_id">Surgery Doctor  Name</label>
                                 <select type="text" id="surgery_dr_id" class="form-control" name="surgery_dr_id"  >
                                     <option value="0">Select Doctor</option>
                                    <?php
                                        foreach ($allDoctors as $doct){
                                      echo "<option value='{$doct->id}'>{$doct->name} - {$doct->mobile}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('surgery_dr_id'); ?></span>
                              </div>
                                        

                                        <div class="row">
                                             <div class="col-12">
                                                  <button type="submit" class="btn btn_bg">Search</button>
                                             </div>
                                        </div>

			       </div>
                              </form>
                         </div>
		 <!--- End Operation Reports -->

             <!--- Start Operation Reports -->
 		 <div class="col-md-4 mt-3">
                              <form action="<?php echo base_url() ?>reports/testinfo/patientregistrationsearch" method="post"
                                   target="_blank" class="input_form">
                                   <div class="col-auto">
                                        <h4>Patient Registration Reports</h3>
                                   </div>
                                   <hr>
                                   <div class="row">


                                        <div class=" col-md-12 mb-3">
                                             <label for="patient_from_date">From Date</label>
                                             <input type="text" id="patient_from_date" class="form-control from_date" name="patient_from_date"
                                                  value="<?php echo set_value('patient_from_date'); ?>">
                                             <span class="text-red small">
                                                  <?php echo form_error('patient_from_date'); ?>
                                             </span>
                                        </div>
                                        <div class="col-md-12  mb-3">
                                             <label for="patient_to_date">To Date</label>
                                             <input type="text" id="patient_to_date" class="form-control to_date" name="patient_to_date"
                                                  value="<?php echo set_value('patient_to_date'); ?>">
                                        </div>

                                               <div class="col-md-12  mb-3">
                                 <label for="patient_id">Patient  Name</label>
                                 <select type="text" id="patient_id" class="form-control" name="patient_id"  >
                                     <option value="0">Select </option>
                                    <?php
                                        foreach ($allPas as $pat){
                                      echo "<option value='{$pat->id}'>{$pat->name} - {$pat->mobile_no}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('patient_id'); ?></span>
                              </div>
                                        

                                        <div class="row">
                                             <div class="col-12">
                                                  <button type="submit" class="btn btn_bg">Search</button>
                                             </div>
                                        </div>

			       </div>
                              </form>
                         </div>
		 <!--- End Operation Reports -->


              <!--- Start Collection Reports -->
 		 <div class="col-md-4 mt-3">
                              <form action="<?php echo base_url() ?>reports/testinfo/collectionsearch" method="post"
                                   target="_blank" class="input_form">
                                   <div class="col-auto">
                                        <h4>Collection Reports</h3>
                                   </div>
                                   <hr>
                                   <div class="row">


                                        <div class=" col-md-12 mb-3">
                                             <label for="collection_from_date">From Date</label>
                                             <input type="text" id="collection_from_date" class="form-control from_date" name="collection_from_date"
                                                  value="<?php echo set_value('collection_from_date'); ?>">
                                             <span class="text-red small">
                                                  <?php echo form_error('collection_from_date'); ?>
                                             </span>
                                        </div>
                                        <div class="col-md-12  mb-3">
                                             <label for="collection_to_date">To Date</label>
                                             <input type="text" id="collection_to_date" class="form-control to_date" name="collection_to_date"
                                                  value="<?php echo set_value('collection_to_date'); ?>">
                                        </div>

                                                

                                        <div class="row">
                                             <div class="col-12">
                                                  <button type="submit" class="btn btn_bg">Search</button>
                                             </div>
                                        </div>

			       </div>
                              </form>
                         </div>
		 <!--- End Collection Reports -->
                 
               </div>
          </div>
     </div>
</div>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

<script>
     $(document).ready(function () {


          $("#from_date,#to_date, #due_from_date , #due_to_date,#test_from_date,#test_to_date, .from_date, .to_date").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               yearRange: "1900:2100",
          });

          // Set a default date (e.g., today's date)
          var today = $.datepicker.formatDate("dd-mm-yy", new Date());
          $("#from_date,#to_date, #due_from_date, #due_to_date ,#test_from_date,#test_to_date, .from_date, .to_date").val(today);

     });




</script>