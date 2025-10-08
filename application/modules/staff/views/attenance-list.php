
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
  <!-- .col-sm-7 -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd ">
      
                        <div class="panel-heading">
                           <div class="btn-group panel-defalut-two" >
                     
                                 <h4><?php echo display('daily_attendance')." ".display('list'); ?> </h4>
         
                      
                                 <a type="button" class="btn btn-labeled btn-success m-b-5" href="<?php echo base_url(); ?>staff/attenance/create">
                           <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span><?php echo display('create')." ".display('daily_attendance'); ?>
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
                                       <th><?php echo display('date'); ?></th>
                                       <th>Total Emp</th>
                                       <th>Total Present</th>
                                       <th>Total Absent</th>
                                       <th>Total Levae</th>
                                       <th><?php echo display('description'); ?></th> 
                                       <th><?php echo display('action'); ?></th>
                                       <th></th>
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
                                    <td><?php echo $pdt->date; ?></td>
                      <td><?php echo $pdt->total_staff; ?></td>
                      <td><?php echo $pdt->total_present; ?></td>
                      <td><?php echo $pdt->total_absent; ?></td>
                      <td><?php echo $pdt->total_leave; ?></td>
                      <td><?php echo $pdt->description; ?></td>
                                    
                                       <td>
                                       <form  action="<?php echo base_url()."staff/attenance/create"; ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="date" value="<?php echo $pdt->date; ?>" >
                                       <button type="submit" class="btn btn-success" name="search" value="saveattendence"><i class="fa fa-edit"></i> </button>
                                        </form><br>
                                         <button type="button" class="btn btn-danger btn-sm"  title="Delete" onclick="confirmDelete(<?php echo $pdt->id; ?>)"><i class="fa fa-trash-o"></i> </button>
                                       
                                       
                                       </td>
                                       <td></td>
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
    window.location.href = "<?php echo base_url();?>admin/staff/staff/delete/"+userId;
  }
}); 

}
   </script>