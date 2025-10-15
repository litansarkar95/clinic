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
                                   target="_blank" class="input_form">
                                   <div class="col-auto">
                                        <h3>Due Transaction Report</h3>
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
		 <!--- End -->
                 
               </div>
          </div>
     </div>
</div>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

<script>
     $(document).ready(function () {


          $("#from_date,#to_date").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               yearRange: "1900:2100",
          });

          // Set a default date (e.g., today's date)
          var today = $.datepicker.formatDate("dd-mm-yy", new Date());
          $("#from_date,#to_date").val(today);

     });




</script>