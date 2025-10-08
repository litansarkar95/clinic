
  
  <style>
 .select2-container .select2-selection--single {
    height: 34px; 
    line-height: 34px;  
}
    </style><!-- Content Header (Page header) -->
  <section class="content-header">
            
            <div >
            <h4>Transaction Reports</h4>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="row">
               <!-- Form controls -->
               <div class="col-md-7 col-md-offset-3">
                  <div class="panel panel-bd ">
                     <div class="panel-heading">
                     <div class="btn-group panel-defalut-two" >
                  
                  <h4>Transaction Reports </h4>

       
         
             
            </div>
                     </div>
                     <div class="panel-body">
                        <form  action="<?php echo base_url(); ?>reports/transactionReport/duereportssearch"target="_blank" method="post" enctype="multipart/form-data">
                    
                       
                        
                      
                           <div class="form-group col-md-12">
                           <label for="from_date">From Date</label>
                                 <input type="text" id="from_date" class="form-control" name="from_date"  value="<?php echo set_value('from_date'); ?>" >
                                 <span class="text-red mdall"><?php echo form_error('from_date'); ?></span>
                           </div>
                          
                           <div class="form-group col-md-12">
                           <label for="to_date">To Date</label>
                                 <input type="text" id="to_date" class="form-control" name="to_date"  value="<?php echo set_value('to_date'); ?>" >
                                 <span class="text-red mdall"><?php echo form_error('to_date'); ?></span>
                           </div>
                           <!-- <div class="form-group col-md-12">
                                 <label for="customer_id"><?php echo display('customer'); ?></label>
                                 <select type="text" id="customer_id" class="form-control select2" name="customer_id"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <?php
                                        foreach ($allSup as $sup){
                                      echo "<option value='{$sup->id}'>{$sup->name} - {$sup->contact_no}</option>";
                                        }
                                    ?>
                                    </select>
                                 <span class="text-red small"><?php echo form_error('customer_id'); ?></span>
                              </div> -->
                        
                          
                          
                           <div class="form-group col-md-12">
                           <div class="reset-button left">
                              <button   type="reset" class="btn btn-warning"><?php echo display('reset'); ?></button>
                              <button type="submit" class="btn btn-success">Search</button>
                           </div></div>
                        </form>
                     </div>
                  </div>
               </div>
                   
            </div>
         </section>
         <script>


$(document).ready(function() {
    $('.select2').select2();
});
</script>