	<div class="container-fluid">
							
								<div class="row px-3">
									<div class="col-12">
										<div class="content">
											<div class="row">
												<div class="col-auto">
													<h3>Upazila List</h3>
												</div>
												<div class="col-auto ms-auto">
													<!-- Button trigger modal -->
													<button type="button" class="btn btn_bg" data-bs-toggle="modal" data-bs-target="#exampleModal">
													  	<i class="fas fa-plus"></i> Add New Upazila
													</button>

											
												</div>
											</div>
											<div class="row">
												<div class="col-12">
													<div class="order_list_container table-responsive">
														<table id="order_list_table_list" class="table table-striped table-responsive" data-page-length='10'>
													        <thead>
													            <tr>
													                <th><?php echo display('sl'); ?></th>
                                       <th>District</th>
                                       <th><?php echo display('name'); ?></th>
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
                                  
                                     <td><?php echo $pdt->districts;?></td>
                                     <td><?php echo $pdt->name;?></td>
                                      <td><?php if($pdt->is_active == 1){
                                           echo '<span  class="btn btn_bg">Active</span>';
                                      }else{
                                       echo '<span  class="btn btn-danger">Inactive</span>';
                                      }
                                       ?></td>
                                       <td><?php echo date('d-m-Y',$pdt->create_date); ?></td>
													                <td>
                                                         <a href="#" class="btn btn_bg" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $pdt->id; ?>"><i class="fas fa-pen"></i> Edit</a> 
                                                       <a href="#" onclick="confirmDelete(<?php echo $pdt->id; ?>)" class="btn btn-danger"><i class="fas fa-close"></i> Delete</a> 
                                                      </td>
													            </tr>



                                                   	<!-- Modal -->
													<div class="modal fade" id="editModal<?php echo $pdt->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													  	<div class="modal-dialog">
													    	<div class="modal-content">
														      	<div class="modal-header">
														        	<h1 class="modal-title fs-5 text-bold" id="exampleModalLabel">Edit Upazila</h1>
														        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      	</div>
													      		<div class="modal-body">
													      		   <form action="<?php echo base_url(); ?>patient/upazila/update" method="post" enctype="multipart/form-data">
													      				   <input type="hidden"   name="eid" value="<?php echo $pdt->id;?>" id="eid" class="form-control" required>
                                                      <div class="row mb-3">
													      					<div class="col-12">
													      						<label for="ename">Name</label>
													      					   <input type="text"   name="ename" value="<?php echo $pdt->name;?>" id="ename" class="form-control" >
                                                                 <span class="text-red small"><?php echo form_error('ename'); ?></span>
													      					</div>

                                                            <div class="col-12">
													      						  <label for="edistricts_id">Districts</label>
                                                                     <select class="form-control" name="edistricts_id" id="edistricts_id">
                                                                        <option value=""><?php echo display('select'); ?></option>
                                                                        <?php
                                                                                    foreach ($allClass as $cat){
                                                                                       if($cat->id == $pdt->district_id){
                                                                                          echo "<option value='{$cat->id}' selected>{$cat->name}</option>";
                                                                                       }else{
                                                                                          echo "<option value='{$cat->id}'>{$cat->name}</option>";
                                                                                       }
                                                                           
                                                                                    }
                                                                                 ?>
                                                                     
                                                                     </select>
                                                                 <span class="text-red small"><?php echo form_error('edistricts_id'); ?></span>
													      					</div>

                                                            <div class="col-12">
													      						    <label class="control-label" for="is_active"><?php echo display('status'); ?></label>
                                                               <select type="text"  name="is_active" id="is_active" class="form-control" >
                                                               <option value="">Select</option>
                                                               <option value="1" <?php if($pdt->is_active==1) echo 'selected'; ?>>Active</option>
                                                               <option value="0" <?php if($pdt->is_active==0) echo 'selected'; ?>>Inactive</option>
                                                                  </select>
                                                                 <span class="text-red small"><?php echo form_error('is_active'); ?></span>
													      					</div>
													      				</div>
													      				
													      			
													      	
													      		</div>
														      	<div class="modal-footer">
														        	<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
														        	<button type="submit" class="btn btn_bg">Update</button>
														      	</div>
                                                   		</form>
													    	</div>
													  	</div>
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
								</div>
							</div>






                     		<!-- Modal -->
													<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													  	<div class="modal-dialog">
													    	<div class="modal-content">
														      	<div class="modal-header">
														        	<h1 class="modal-title fs-5 text-bold" id="exampleModalLabel">Add New Upazila</h1>
														        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														      	</div>
													      		<div class="modal-body">
													      		   <form action="<?php echo base_url(); ?>patient/upazila/create" method="post" enctype="multipart/form-data">
													      				<div class="row mb-3">
													      					<div class="col-12">
													      						<label for="name">Name</label>
													      						 <input type="text"   name="name" value="<?php echo set_value('name'); ?>" id="name" class="form-control" >
                                                                 <span class="text-red small"><?php echo form_error('name'); ?></span>
													      					</div>


                                                            	<div class="col-12">
													      						<label for="name">District</label>
													      						 <select class="form-control" name="districts_id" id="districts_id">
                                                                  <option value=""><?php echo display('select'); ?></option>
                                                                  <?php
                                                                              foreach ($allClass as $class){
                                                                           echo "<option value='{$class->id}'>{$class->name}</option>";
                                                                              }
                                                                           ?>
                                                               
                                                               </select>
                                                                 <span class="text-red small"><?php echo form_error('districts_id'); ?></span>
													      					</div>


													      				</div>

                                      				
													      			
													      	
													      		</div>
														      	<div class="modal-footer">
														        	<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
														        	<button type="submit" class="btn btn_bg">Save</button>
														      	</div>
                                                   		</form>
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
            window.location.href = "<?php echo base_url();?>patient/upazila/delete/"+userId;
         }
         }); 

         }
   </script>
