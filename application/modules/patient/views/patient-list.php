	<div class="container-fluid">
							
								<div class="row px-3">
									<div class="col-12">
										<div class="content">
											<div class="row">
												<div class="col-auto">
													<h3>Patient List</h3>
												</div>
												<div class="col-auto ms-auto">
													<!-- Button trigger modal -->
													<a type="button" class="btn btn_bg" href="<?php echo base_url(); ?>patient/create">
													  	<i class="fas fa-plus"></i> Add New Patient
</a>

											
												</div>
											</div>
											<div class="row">
												<div class="col-12">
													<div class="order_list_container table-responsive">
														<table id="order_list_table_list" class="table table-striped table-responsive" data-page-length='10'>
													        <thead>
													            <tr>
													                <th><?php echo display('sl'); ?></th>
                                                       <th>Registration No</th>
                                       <th><?php echo display('name'); ?></th>
                                       <th>Mobile No</th>
                                       <th><?php echo display('status'); ?></th>
                                       <th><?php echo display('create_date'); ?></th> 
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
                                  
                                     <td><?php echo $pdt->registration_no;?></td>
                                     <td><?php echo $pdt->name;?></td>
                                     <td><?php echo $pdt->mobile_no;?></td>
                                      <td><?php if($pdt->is_active == 1){
                                           echo '<span  class="btn btn_bg">Active</span>';
                                      }else{
                                       echo '<span  class="btn btn-danger">Inactive</span>';
                                      }
                                       ?></td>
                                       <td><?php echo date('d-m-Y',$pdt->create_date); ?></td>
													                <td>
                                                         <a href="#" class="btn btn_bg" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $pdt->id; ?>"><i class="fas fa-pen"></i> </a> 
                                                       <a href="#" onclick="confirmDelete(<?php echo $pdt->id; ?>)" class="btn btn-danger"><i class="fas fa-trash"></i> </a> 
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
								</div>
							</div>






                     	




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
            window.location.href = "<?php echo base_url();?>patient/delete/"+userId;
         }
         }); 

         }
   </script>
