
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
  <!-- .col-sm-7 -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
      
                        <div class="panel-heading">
                           <div class="btn-group panel-defalut-two" >
                     
                                 <h4><?php echo display('staff')." ".display('list'); ?> </h4>
         
                                 <a type="button" class="btn btn-labeled btn-success m-b-5" href="<?php echo base_url(); ?>staff/create">
                           <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span><?php echo display('create')." ".display('staff'); ?>
                           </a>
                   
                            
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
                                       <th><?php echo display('email'); ?></th>
                                       <th><?php echo display('role'); ?></th>
                                       <th><?php echo display('emergency_contact_no'); ?></th>
                                       <th><?php echo display('gender'); ?></th>
                                       <th><?php echo display('local_address'); ?></th>
                                       <th><?php echo display('date_of_joining'); ?></th> 
                                       <th><?php echo display('picture'); ?></th>
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
                      <td><?php echo $pdt->first_name." ".$pdt->last_name;?></td>
                      <td><?php echo $pdt->email; ?></td>
                      <td><?php echo $pdt->role; ?></td>
                      <td><?php echo $pdt->emergency_contact_no; ?></td>
                      <td><?php echo $pdt->gender; ?></td>
                      <td><?php echo $pdt->local_address; ?></td>
                                       <td><?php echo date('d-m-Y',$pdt->date_of_joining); ?></td>
                                       <td><img src="<?php echo base_url()."public/images/staff/$pdt->picture"; ?>" width="80px" height="80px" alt="" class="img-circle"></td>
                                       <td>
                                       <?php
                                                if($pdt->is_active == 1){

                                                
                                                ?>
                                                  <span class="label-custom label label-default">Active</span></td>
                                                <?php
                                                }else{
                            ?>
                          <span class="label-danger label label-default">Inctive</span></td>
                           <?php
                                                                           }
                                                      ?>
                           </td>
                                       <td>
                                          <a  class="btn btn-add btn-sm"  href="<?php echo base_url()."staff/edit/{$pdt->id}";?>"><i class="fa fa-pencil"></i></a>
                                          <button type="button" class="btn btn-primary btn-sm"   data-toggle="modal" data-target="#change_password<?php echo $pdt->id;?>" ><i class="fa fa-lock"></i> </button>
                                          <button type="button" class="btn btn-danger btn-sm"  title="Delete" onclick="confirmDelete(<?php echo $pdt->id; ?>)"><i class="fa fa-trash-o"></i> </button>
                                       
                                       </td>
                                    </tr>




   <!-- Edit  -->
   <div class="modal fade" id="change_password<?php echo $pdt->id;?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-edit m-r-5"></i><?php echo display('change'); ?> <?php echo display('password'); ?></h3>

                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal" action="<?php echo base_url(); ?>staff/change" method="post" enctype="multipart/form">
                                    <fieldset>
                                       <!-- Text input-->
                                     
                                       <input type="hidden"   name="id" value="<?php echo $pdt->id;?>" id="id" class="form-control" required>
                                        <div class="col-md-12 form-group">
                                          <label class="control-label" for="password"><?php echo display('password'); ?></label>
                                          <input type="text"   name="password"  id="password" class="form-control" >
                                       </div>
                                 
                                
                                    
                                     
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-left">
                                             <button type="submit" class="btn btn-add btn-sm"><?php echo display('change'); ?></button>
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
    window.location.href = "<?php echo base_url();?>staff/delete/"+userId;
  }
}); 

}
   </script>