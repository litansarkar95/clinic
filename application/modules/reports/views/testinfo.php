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
                                        <h3>Invoice Reports</h3>
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
                              <form action="<?php echo base_url() ?>reports/transactionReport/paymentsearch" method="post"
                                   target="_blank" class="input_form input_form_bg">
                                   <div class="col-auto">
                                        <h3>Payment  Report</h3>
                                   </div>
                                   <hr>
                                   <div class="row">


                                        <div class=" col-md-12 mb-3">
                                             <label for="payment_from_date">From Date</label>
                                             <input type="text" id="payment_from_date" class="form-control from_date" name="payment_from_date"
                                                  value="<?php echo set_value('payment_from_date'); ?>">
                                             <span class="text-red small">
                                                  <?php echo form_error('payment_from_date'); ?>
                                             </span>
                                        </div>
                                        <div class="col-md-12  mb-3">
                                             <label for="payment_to_date">To Date</label>
                                             <input type="text" id="payment_to_date" class="form-control to_date" name="payment_to_date"
                                                  value="<?php echo set_value('payment_to_date'); ?>">
                                        </div>

                                         <div class="col-md-12  mb-3">
                                               <label for="payment_method_id">Payment Method</label>
                                 <select type="text" id="payment_method_id" class="form-control" name="payment_method_id"  >
                                     <option value="0">Select Payment Method</option>
                                    <?php
                                        foreach ($payment_methods as $method){
                                      echo "<option value='{$method->id}'>{$method->method_name} </option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('payment_method_id'); ?></span>
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
                              <form action="<?php echo base_url() ?>reports/transactionReport/referencesearch" method="post"
                                   target="_blank" class="input_form input_form_bg">
                                   <div class="col-auto">
                                        <h3>Reference  Report</h3>
                                   </div>
                                   <hr>
                                   <div class="row">


                                        <div class=" col-md-12 mb-3">
                                             <label for="due_from_date">From Date</label>
                                             <input type="text" id="due_from_date" class="form-control from_date" name="due_from_date"
                                                  value="<?php echo set_value('due_from_date'); ?>">
                                             <span class="text-red small">
                                                  <?php echo form_error('due_from_date'); ?>
                                             </span>
                                        </div>
                                        <div class="col-md-12  mb-3">
                                             <label for="due_to_date">To Date</label>
                                             <input type="text" id="due_to_date" class="form-control to_date" name="due_to_date"
                                                  value="<?php echo set_value('due_to_date'); ?>">
                                        </div>

                                         <div class="col-md-12  mb-3">
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

                                        <div class="row">
                                             <div class="col-12">
                                                  <button type="submit" class="btn btn_bg">Search</button>
                                             </div>
                                        </div>

			       </div>
                              </form>
                         </div>
		 <!--- End -->
                 
               </div>
          </div>
     </div>
</div>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

<script>
     $(document).ready(function () {


          $("#from_date,#to_date, #due_from_date , #due_to_date,#test_from_date,#test_to_date, .from_date, .to_date").datepicker({
               dateFormat: "yy-mm-dd",
               changeMonth: true,
               changeYear: true,
               yearRange: "1900:2100",
          });

          // Set a default date (e.g., today's date)
          var today = $.datepicker.formatDate("yy-mm-dd", new Date());
          $("#from_date,#to_date, #due_from_date, #due_to_date ,#test_from_date,#test_to_date, .from_date, .to_date").val(today);

     });




</script>