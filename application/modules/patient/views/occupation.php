
            <!-- Content Header (Page header) -->
            <section class="content-header">
            
               <div >
               <h4>Occupation</h4>
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
                     
                        <h4>Occupation List</h4>

          
                     <button type="button"  data-toggle="modal" data-target="#add_new_categories" class="btn btn-labeled btn-success m-b-5" >
                   <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Add New Occupation
                      </button>
              
                
               </div>
                        </div>
                        <div class="panel-body">
                 
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">         
                              <table id="tableData" class="table table-bordered table-striped table-hover display " style="width:100%">
                                 <thead>
                                    <tr class="info">
                                       <th><?php echo display('sl'); ?></th>
                                       <th><?php echo display('name'); ?></th>
                                       <th><?php echo display('create_date'); ?></th> 
                                       <th><?php echo display('status'); ?></th>
                                       <th><?php echo display('action'); ?></th>
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
                                  
                      <td><?php echo $pdt->name;?></td>
                                       <td><?php echo date('d-m-Y',$pdt->create_date); ?></td>
                                      
                                       <td class="text-center">
                                 <label class="switch">
                                    <input type="checkbox" <?php if($pdt->is_active == 1) { echo "checked"; }?> class="status" data-url="">
                                    <span class="slider round"></span>
                                 </label>
                              </td>

                           <td class="print-d-none">
    <div class="dropdown table-action">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-ellipsis-v"></i>
        </button>
        <ul class="dropdown-menu">
         
            <li>
                <a  href="#" data-toggle="modal" data-target="#edit_liveStock<?php echo $pdt->id;?>">
                    <i class="fa fa-edit"></i> Edit
                </a>
            </li>
            <li>
            <a type="button" href="#" title="Delete" onclick="confirmDelete(<?php echo $pdt->id; ?>)" class="confirm-action " data-method="DELETE">
                    <i class="fa fa-trash "></i> Delete
                </a>
            </li>
        </ul>
    </div>
</td>

                                    </tr>







                 <!-- Edit  -->
                 <div class="modal fade" id="edit_liveStock<?php echo $pdt->id;?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-edit m-r-5"></i>Edit Occupation</h3>

                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal" action="<?php echo base_url(); ?>patient/occupation/update" method="post" enctype="multipart/form-data">
                                    <fieldset>
                                       <!-- Text input-->
                                     
                                       <input type="hidden"   name="eid" value="<?php echo $pdt->id;?>" id="eid" class="form-control" required>
                                        <div class="col-md-12 form-group">
                                          <label class="control-label" for="ename"><?php echo display('name'); ?></label>
                                          <input type="text"   name="ename" value="<?php echo $pdt->name;?>" id="ename" class="form-control" >
                                       </div>
                                     
                                      
                                       <div class="col-md-12 form-group">
                                          <label class="control-label" for="is_active"><?php echo display('status'); ?></label>
                                          <select type="text"  name="is_active" id="is_active" class="form-control" >
                                          <option value="">Choose</option>
                                    <option value="1" <?php if($pdt->is_active==1) echo 'selected'; ?>>Active</option>
                                    <option value="0" <?php if($pdt->is_active==0) echo 'selected'; ?>>Inactive</option>
                                             </select>
                                       </div>
                                    
                                     
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-left">
                                             <button type="submit" class="btn btn-add btn-sm"><?php echo display('update'); ?></button>
                                          </div>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><?php echo display('cancel'); ?></button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>



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



            <!--- Start new -->  

            <div class="modal fade" id="add_new_categories" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                           <form class="form-horizontal" action="<?php echo base_url(); ?>patient/occupation/create" method="post" enctype="multipart/form-data">
                               
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class=" text-start">Add New  Occupation</h4>
                              </div>
                              <div class="modal-body">
                                 <fieldset>
                                       <!-- Text input-->
                                     
                                        <div class="col-md-12 form-group">
                                          <label class="control-label" for="name"><?php echo display('name'); ?></label>
                                          <input type="text"   name="name" value="<?php echo set_value('name'); ?>" id="name" class="form-control" >
                                          <span class="text-red small"><?php echo form_error('name'); ?></span>
                                       </div>
                                    
                                       
                                       
                                    
                                     
                                      
                                    </fieldset>
                              
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-add bt-lg"><?php echo display('save'); ?></button>
                              </div>
                              </form>
                           </div>
                           <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                     </div>
            <!-- End new -->
            <!-- Delete Confirmation Modal -->
            <script>


         function confirmDelete(userId){
            Swal.fire({
         title: "Confirm Delete",
         text: "Are you sure want to delete this Data ?",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "Yes, delete it!"
         }).then((result) => {
         if (result.value) {
            window.location.href = "<?php echo base_url();?>patient/occupation/delete/"+userId;
         }
         }); 

         }
   </script>

