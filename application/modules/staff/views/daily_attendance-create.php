
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> 
    <style>

.panel-control-icon {
    display: none;
}</style>
<script>
$(document).ready(function() {
    // Initialize the datepicker with year selection
    $("#date, #date_of_joining, #date_of_leaving").datepicker({
        dateFormat: 'yy-mm-dd',
        changeYear: true,      // Enable year selection
        yearRange: "1900:2100" // Set the range of years available
    });

    // Set a default date (e.g., today's date)
   
});


    </script>

    <style>
  .radio-info {
            display: flex !important;
            flex-direction: column !important; /* Stack vertically */
        }
        .radio-info label {
            margin: 5px 0 !important; /* Add some space between radio buttons */
        }
        </style>

  <!-- Content Header (Page header) -->
            <section class="content-header">
            
               <div >
               <h4><?php echo display('daily_attendance'); ?></h4>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                        <div class="btn-group panel-defalut-two" >
                     
                     <h4><?php echo display('create')." ".display('daily_attendance');  ?> </h4>

          
                     <a type="button" class="btn btn-labeled btn-success m-b-5" href="<?php echo base_url(); ?>staff/attenance/">
               <span class="btn-label"><i class="glyphicon glyphicon-list"></i></span><?php echo display('daily_attendance')." ".display('list'); ?>
               </a>
              
                
               </div>
                        </div>
                        <div class="panel-body">
                           <form  action="<?php echo base_url(); ?>staff/attenance/create" method="post" enctype="multipart/form-data">
                             
                            
                              <div class="form-group col-sm-8">
                                 <label for="date"><?php echo display('date'); ?></label>
                                 <input type="text" id="date" class="form-control" name="date"  value="<?php  if($date) {echo $date; } else{ echo date("Y-m-d"); } ?>" >
                                 <span class="text-red small"><?php echo form_error('date'); ?></span>
                              </div>
                            
                        
   

                              <div class="form-group col-sm-8">
                                 <label for="description"><?php echo display('description'); ?></label>
                                 <textarea type="text" id="description" class="form-control" name="description"><?php echo set_value('description'); ?></textarea>
                                 <span class="text-red small"><?php echo form_error('description'); ?></span>
                              </div>
                         
                              <div class="form-group col-sm-12">
                              <div class="table-responsive">         
                              <table class="table table-bordered table-striped table-hover  " style="width:100%">
                                 <thead>
                                    <tr class="info">
                                       <th><?php echo display('sl'); ?></th>
                                       <th><?php echo display('designation'); ?></th>
                                       <th><?php echo display('name'); ?></th>
                                       <th><?php echo display('picture'); ?></th>
                                       <th width="300px"><?php echo display('attendance_type'); ?></th>
                                       <th><?php echo display('in_time'); ?></th>
                                       <th><?php echo display('out_time'); ?></th>
                                       <th><?php echo display('note'); ?></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                        $i=1;
                                        if(isset($allPdt)){
                                        foreach ($allPdt as $pdt){
                                          
                                        ?>
                                    <tr>
                               
                                    <td>
                                    <input type="hidden" name="staff_id[]" value="<?php echo $pdt['id']; ?>">
                                    <?php  echo $i; $i++;?></td>
                                    <td><?php  echo $pdt['date']; //echo $date ."".$pdt['designation']; ?></td>
                                   <td><?php echo $pdt['first_name']." ".$pdt['last_name'];?></td>
                              
                   
                                       <td><img src="<?php echo base_url()."public/images/staff/{$pdt['picture']}"; ?>" width="80px" height="80px" alt="" class="img-circle"></td>
                                       <td width="300px">
                                       

                                       <?php
                                       $c = 1;
                                       $count = 0;
                                       foreach ($attendencetypeslist as $key => $type) {
                                         //  if ($type['key_value'] != "H") {
                                           // $att_type = str_replace(" ", "_", strtolower($type['type']));
                                           $att_type = $type['type'];
                                               if ($value['date'] != "xxx") {
                                                   ?>
                                                   <div class="radio radio-info ">
                                                       <input <?php if ($pdt['attendence_id'] == $type['id']) echo "checked"; ?> type="radio" id="attendencetype<?php echo $pdt['id']. "-" . $count; ?>" value="<?php echo $type['id'] ?>" name="attendencetype<?php echo $pdt['id']; ?>" >

                                                       <label for="attendencetype<?php echo $pdt['id'] . "-" . $count; ?>">
                                                            <?php echo  $att_type; ?> 
                                                       </label>

                                                   </div>
                                                
                                                   <?php
                                               }else {
                                                   ?>
                                                   <div class="radio radio-info radio-inline">
                                                     
                                                           <input <?php if ($c == 1) echo "checked"; ?> type="radio" id="attendencetype<?php echo $pdt['attendence_id'] . "-" . $count; ?>" value="<?php echo $type['id'] ?>" name="attendencetype<?php echo $pdt['attendence_id']; ?>" >
                                                         


                                                       <label for="attendencetype<?php echo $pdt['attendence_id'] . "-" . $count; ?>"> 
                                                        <?php echo $att_type; ?> 
                                                       </label>
                                                   </div>
                                                   <?php
                                               }
                                               $c++;
                                               $count++;
                                          // }
                                       }
                                       ?>

                                   </td>
                                       <td> 
                                       <?php if ($date == 'xxx') { ?>  
                                       <input type="time" id="in_time" name="in_time[]" >

                                       <?php } else { ?>
                                        <input type="time" class="noteinput" name="in_time[]" value="<?php echo $pdt["in_time"]; ?>" >
                                        <?php } ?>
                                    
                                    </td>
                                       <td> 
                                        
                                       <?php if ($date == 'xxx') { ?>  
                                       <input type="time" id="out_time" name="out_time[]" >
                                       <?php } else { ?>
                                        <input type="time" class="noteinput" name="out_time[]" value="<?php echo $pdt["out_time"]; ?>" >
                                        <?php } ?>
                                    
                                    </td>
                                       <?php if ($date == 'xxx') { ?> 
                                                                <td ><input type="text" class="noteinput" name="remark[]" ></td>
                                                             <?php } else { ?>

                                                                <td ><input type="text" class="noteinput" name="remark[]" value="<?php echo $pdt["remark"]; ?>" ></td>
                                                        <?php } ?>
                                    </tr>




                                    <?php
                                        }
                                       }
                                        ?>
                                  
                                 </tbody>
                              </table>
                           </div>
                              </div>
                              <div class="form-group col-sm-12">
                              <div class="reset-button left">
                                 <button   type="reset" class="btn btn-warning"><?php echo display('reset'); ?></button>
                                 <button type="submit" class="btn btn-success" name="search" value="saveattendence"><?php echo display('save'); ?></button>
                              </div></div>
                           </form>
                        </div>
                     </div>
                  </div>



 
               
                      
               </div>
            </section>
            <!-- /.content -->

          