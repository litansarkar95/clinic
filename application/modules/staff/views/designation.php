
            <!-- Content Header (Page header) -->
            <section class="content-header">
            
               <div >
               <h4><?php echo display('designation'); ?></h4>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">

               <?php
               if(isset($_GET['edit'])){

                  foreach ($allPdt as $val){
                     if($val->id == $_GET['edit']){
               
               ?>
                  <!-- Form controls -->
                  <div class="col-sm-5">
                     <div class="panel panel-bd ">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                            
                              <i class="fa fa-list"></i>  <?php echo display('designation')." ".display('edit'); ?>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-12" action="<?php echo base_url(); ?>staff/designation/update" method="post" enctype="multipart/form">
                           <input type="hidden" id="id" class="form-control" name="id"  value="<?php echo $val->id; ?>" >
                           <div class="form-group">
                                 <label for="ename"><?php echo display('designation')." ".display('name'); ?></label>
                                 <input type="text" id="ename" class="form-control" name="ename"  value="<?php echo $val->name; ?>" >
                                 <span class="text-red small"><?php echo form_error('ename'); ?></span>
                              </div>
                         
                        <div class="form-group ">
                                 <label for="is_active"><?php echo display('is_active'); ?></label>
                                 <select type="text" id="is_active" class="form-control select2" name="is_active"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <option value="1" <?php if($val->is_active == 1) { echo "selected"; } ?>><?php echo display('active'); ?></option>
                                    <option value="0" <?php if($val->is_active == 0) { echo "selected"; } ?>><?php echo display('inactive'); ?></option>
                                
                                    </select>
                                 <span class="text-red small"><?php echo form_error('is_active'); ?></span>
                              </div>
                            
                          
                           
                              <div class="reset-button">
                                 <button   type="reset" class="btn btn-warning"><?php echo display('reset'); ?></button>
                                 <button type="submit" class="btn btn-success"><?php echo display('update'); ?></button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>

<?php
                     }
                  }
               }else{
?>

 <!-- Form controls -->
 <div class="col-sm-5">
                     <div class="panel panel-bd ">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                            
                              <i class="fa fa-list"></i>  <?php echo display('designation'); ?>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-12" action="<?php echo base_url(); ?>staff/designation" method="post" enctype="multipart/form">
                              <div class="form-group">
                                 <label for="name"><?php echo display('designation')." ".display('name'); ?></label>
                                 <input type="text" id="name" class="form-control" name="name"  value="<?php echo set_value('name'); ?>" >
                                 <span class="text-red small"><?php echo form_error('name'); ?></span>
                              </div>
                             
                           
                            
                          
                           
                              <div class="reset-button">
                                 <button   type="reset" class="btn btn-warning"><?php echo display('reset'); ?></button>
                                 <button type="submit" class="btn btn-success"><?php echo display('save'); ?></button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
<?php
               }
?>

  <!-- .col-sm-7 -->
                  <div class="col-sm-7">
                     <div class="panel panel-bd ">
                        <div class="panel-heading">
                           <div class="btn-group" >
                              <a href="#">
                                 <h4><?php echo display('designation')." ".display('list'); ?> </h4>
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
                                       <a  class="btn btn-add btn-sm"  href="<?php echo base_url()."staff/designation?edit={$pdt->id}";?>"><i class="fa fa-pencil"></i></a>
                                          <button type="button" class="btn btn-danger btn-sm"  title="Delete" onclick="confirmDelete(<?php echo $pdt->id; ?>)"><i class="fa fa-trash-o"></i> </button>
                                       
                                       </td>
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
    window.location.href = "<?php echo base_url();?>staff/designation/delete/"+userId;
  }
}); 

}
   </script>