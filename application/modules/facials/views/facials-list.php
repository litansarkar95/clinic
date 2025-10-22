<div class="container-fluid">

     <div class="row px-3">
          <div class="col-12">
               <div class="content">
                    <div class="row">
                         <div class="col-auto">
                              <h3>Facials List</h3>
                         </div>
                         <div class="col-auto ms-auto">
                              <!-- Button trigger modal -->
                             	<a href="<?php echo base_url(); ?>facials/create"  class="btn btn_bg">Create New Facials </a>


                         </div>
                    </div>
                    <div class="row">
                         <div class="col-12">
                              <div class="order_list_container table-responsive">
                                   <table id="order_list_table_list" class="table table-striped table-responsive"
                                        data-page-length='10'>
                                        <thead>
                                             <tr>
                                                  <th>
                                                       <?php echo display('sl'); ?>
                                                  </th>

                                                  <th>
                                                       <?php echo display('name'); ?>
                                                  </th>
                                                  <th>Regular Price</th>
                                                  <th>Offer Price</th>
                                                  <th>
                                                       <?php echo display('status'); ?>
                                                  </th>
                                                  <th>
                                                       <?php echo display('create_date'); ?>
                                                  </th>
                                                  <th>
                                                       <?php echo display('action'); ?>
                                                  </th>
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
                                                       <?php  echo $i; $i++;?>
                                                  </td>

                                                  <td>
                                                       <?php echo $pdt->name;?>
                                                  </td>
                                                  <td>
                                                       <?php echo $pdt->regular_price;?>
                                                  </td>
                                                  <td>
                                                       <?php echo $pdt->offer_price;?>
                                                  </td>
                                                  <td>
                                                       <?php if($pdt->is_active == 1){
                                           echo '<span  class="btn btn_bg">Active</span>';
                                      }else{
                                       echo '<span  class="btn btn-danger">Inactive</span>';
                                      }
                                       ?>
                                                  </td>
                                                  <td>
                                                       <?php echo date('d-m-Y',$pdt->create_date); ?>
                                                  </td>
                                                  <td>
                                                       <a href="<?php echo base_url()."facials/edit/".$pdt->id; ?>" class="btn btn_bg"><i
                                                                 class="fas fa-pen"></i> Edit</a>
                                                       <a href="#" onclick="confirmDelete(<?php echo $pdt->id; ?>)"
                                                            class="btn btn-danger"><i class="fas fa-close"></i>
                                                            Delete</a>
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


     function confirmDelete(userId) {
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
                    window.location.href = "<?php echo base_url();?>facials/delete/" + userId;
               }
          });

     }
</script>