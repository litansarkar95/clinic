
            <!-- Content Header (Page header) -->
            <section class="content-header">
            
               <div >
               <h4><?php echo display('departments'); ?></h4>
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
                            
                              <i class="fa fa-list"></i>  <?php echo display('departments')." ".display('edit'); ?>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-12" action="<?php echo base_url(); ?>staff/departments/update" method="post" enctype="multipart/form">
                           <input type="hidden" id="id" class="form-control" name="id"  value="<?php echo $val->id; ?>" >
                           <div class="form-group">
                                 <label for="ename"><?php echo display('departments')." ".display('name'); ?></label>
                                 <input type="text" id="ename" class="form-control" name="ename"  value="<?php echo $val->name; ?>" >
                                 <span class="text-red small"><?php echo form_error('ename'); ?></span>
                              </div>
                              <!-- <div class="form-group">
                                 <label for="ecommission"><?php echo display('commission'); ?></label>
                                 <input type="text" id="ecommission" class="form-control" name="ecommission"  value="<?php echo $val->commission; ?>" >
                                 <span class="text-red small"><?php echo form_error('ecommission'); ?></span>
                              </div> -->
                              <div class="checkbox checkbox-primary">
                            <input type="checkbox" name="ehidefromclient" id="ehidefromclient" value="1" <?php if($val->hidefromclient == 1){ echo "checked"; }?> >
                            <label for="ehidefromclient">Department Hide From Client</label>
                        </div>
                        <hr />
                              <div class="form-group">
                                 <label for="eemail"><?php echo display('departments')." ".display('email'); ?></label>
                                 <input type="text" id="eemail" class="form-control" name="eemail" value="<?php echo $val->email; ?>" >
                                 <span class="text-red small"><?php echo form_error('eemail'); ?></span>
                              </div>
                              <h5>Email to ticket configuration</h5>
                              <div class="form-group">
                                 <label for="eimap_username"> <i class="fa-regular fa-circle-question pull-left tw-mt-0.5 tw-mr-1" data-toggle="tooltip"
                                 data-title="<?php echo display('department_username_help'); ?>"></i>IMAP Username</label>
                                 <input type="text" id="eimap_username" class="form-control" name="eimap_username"  value="<?php echo $val->imap_username; ?>" >
                                 <span class="text-red small"><?php echo form_error('eimap_username'); ?></span>
                              </div>
                              <div class="form-group">
                                 <label for="ehost">IMAP Host</label>
                                 <input type="text" id="ehost" class="form-control" name="ehost"  value="<?php echo $val->host; ?>" >
                                 <span class="text-red small"><?php echo form_error('ehost'); ?></span>
                              </div>
                              <div class="form-group">
                                 <label for="epassword">Password</label>
                                 <input type="text" id="epassword" class="form-control" name="epassword" value="<?php echo $val->password; ?>" >
                                 <span class="text-red small"><?php echo form_error('epassword'); ?></span>
                              </div>
                              <div class="form-group">
                            <label for="encryption">Encryption</label><br />
                            <div class="radio radio-primary radio-inline">
                                <input type="radio" name="eencryption" value="tls" id="tls" <?php if($val->encryption == "tls"){ echo "checked"; }?>>
                                <label for="tls">TLS</label>
                            </div>
                            <div class="radio radio-primary radio-inline">
                                <input type="radio" name="eencryption" value="ssl" id="ssl" <?php if($val->encryption == "ssl"){ echo "checked"; }?>>
                                <label for="ssl">SSL</label>
                            </div>
                            <div class="radio radio-primary radio-inline">
                                <input type="radio" name="eencryption" value="eno_enc" id="eno_enc" <?php if($val->encryption == "eno_enc"){ echo "checked"; }?>>
                                <label for="no_enc">Dept Email No Encryption</label>
                            </div>
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
                            
                              <i class="fa fa-list"></i>  <?php echo display('departments'); ?>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-12" action="<?php echo base_url(); ?>staff/departments" method="post" enctype="multipart/form">
                              <div class="form-group">
                                 <label for="name"><?php echo display('departments')." ".display('name'); ?></label>
                                 <input type="text" id="name" class="form-control" name="name"  value="<?php echo set_value('name'); ?>" >
                                 <span class="text-red small"><?php echo form_error('name'); ?></span>
                              </div>
                              <!-- <div class="form-group">
                                 <label for="commission"><?php echo display('commission'); ?></label>
                                 <input type="text" id="commission" class="form-control" name="commission"  value="<?php echo set_value('commission'); ?>" >
                                 <span class="text-red small"><?php echo form_error('commission'); ?></span>
                              </div> -->
                              <div class="checkbox checkbox-primary">
                            <input type="checkbox" name="hidefromclient" value="1" id="hidefromclient">
                            <label for="hidefromclient">Department Hide From Client</label>
                        </div>
                        <hr />
                              <div class="form-group">
                                 <label for="email"><?php echo display('departments')." ".display('email'); ?></label>
                                 <input type="text" id="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" >
                                 <span class="text-red small"><?php echo form_error('email'); ?></span>
                              </div>
                              <h5>Email to ticket configuration</h5>
                              <div class="form-group">
                                 <label for="name"> <i class="fa-regular fa-circle-question pull-left tw-mt-0.5 tw-mr-1" data-toggle="tooltip"
                                 data-title="<?php echo display('department_username_help'); ?>"></i>IMAP Username</label>
                                 <input type="text" id="imap_username" class="form-control" name="imap_username"  value="<?php echo set_value('imap_username'); ?>" >
                                 <span class="text-red small"><?php echo form_error('imap_username'); ?></span>
                              </div>
                              <div class="form-group">
                                 <label for="host">IMAP Host</label>
                                 <input type="text" id="host" class="form-control" name="host"  value="<?php echo set_value('host'); ?>" >
                                 <span class="text-red small"><?php echo form_error('host'); ?></span>
                              </div>
                              <div class="form-group">
                                 <label for="password">Password</label>
                                 <input type="text" id="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" >
                                 <span class="text-red small"><?php echo form_error('password'); ?></span>
                              </div>
                              <div class="form-group">
                            <label for="encryption">Encryption</label><br />
                            <div class="radio radio-primary radio-inline">
                                <input type="radio" name="encryption" value="tls" id="tls">
                                <label for="tls">TLS</label>
                            </div>
                            <div class="radio radio-primary radio-inline">
                                <input type="radio" name="encryption" value="ssl" id="ssl">
                                <label for="ssl">SSL</label>
                            </div>
                            <div class="radio radio-primary radio-inline">
                                <input type="radio" name="encryption" value="" id="no_enc" checked>
                                <label for="no_enc">Dept Email No Encryption</label>
                            </div>
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
                                 <h4><?php echo display('departments')." ".display('list'); ?> </h4>
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
                                       <th><?php echo display('commission'); ?></th>
                                       <th><?php echo display('email'); ?></th>
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
                      <td><?php echo $pdt->commission;?></td>
                      <td><?php echo $pdt->email; ?></td>
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
                                       <a  class="btn btn-add btn-sm"  href="<?php echo base_url()."staff/departments?edit={$pdt->id}";?>"><i class="fa fa-pencil"></i></a>
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
    window.location.href = "<?php echo base_url();?>staff/departments/delete/"+userId;
  }
}); 

}
   </script>