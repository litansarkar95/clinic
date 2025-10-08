
            <!-- Content Header (Page header) -->
            <section class="content-header">
            
               <div >
               <h4><?php echo display('supplier'); ?></h4>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
  <!-- .col-sm-7 -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd ">
      
                        <div class="panel-heading">
                           <div class="btn-group panel-defalut-two" >
                     
                                 <h4>Supplier Due </h4>
         
                      
                              
                            
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                      
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">         
                              <table id="tableData" class="table table-bordered table-striped table-hover display " style="width:100%">
                                 <thead>
                                    <tr class="info">
                                       <th><?php echo display('sl'); ?></th>
                                       <th><?php echo display('name'); ?></th>
                                       <th><?php echo display('mobile_no'); ?></th>
                                       <th><?php echo display('email'); ?></th>
                                       <th><?php echo display('due'); ?></th> 
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                        $i=1;
                                        if(isset($allPdt)){
                                        foreach ($allPdt as $pdt){
                                        ?>
                                    <tr>
                               
                                    <td><?php  echo $i; $i++;?></td>
                                  
                                    <td> <?php echo $pdt->name; ?></td>
                                  
                                    <td><?php echo $pdt->contact_no; ?></td>
                      <td><?php echo $pdt->email;?></td>
                
                      <td><?php echo number_format($pdt->total_due, 3); ?></td>
                  
                  
                                      
                                     
                                         
                                    </tr>






                                    <?php
                                        }
                                       }
                                        ?>
                                  
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->

      