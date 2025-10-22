<style>
.print-btn{
 
  
    padding:10px !important;
}
  </style>
<div class="container-fluid">

 



  <div class="row px-3">
    <div class="col-12">
      <div class="content">
        <div class="row">
          <div class="col-auto">
            <h3>Branch  List</h3>
          </div>
          <div class="col-auto ms-auto">
            <!-- Button trigger modal -->
            <a type="button" class="btn btn_bg" href="<?php echo base_url(); ?>settings/branch/create">
              <i class="fas fa-plus"></i> Add New Branch
            </a>


          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="order_list_container table-responsive">
              <table id="order_list_table_list" class="table table-striped table-responsive" data-page-length='10'>
                <thead>
                  <tr>
                    <th>
                      <?php echo display('sl'); ?>
                    </th>
                    <th>
                      <?php echo display('name'); ?>
                    </th>
                    <th>Mobile No</th>
                    <th>Address</th>
                    <th>Date</th>
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
                      <?php echo $pdt->mobile_no;?>
                    </td>
                    <td>
                      <?php echo $pdt->address;?>
                    </td>
                  
                    <td>
                      <?php echo date('d-m-Y',$pdt->create_date); ?>
                    </td>
                    <td>
                    
                   
                                        <?php
                                     $role_id = $this->session->userdata('loggedin_role_id');
                                     if($role_id == 1){
                                        ?>
                                          <a href="<?php echo base_url()."settings/branch/edit/$pdt->id"; ?>"  class="btn btn_bg print-btn" >
                        <i class="fas fa-pen"></i>
                                        </a>
                                          <a href="<?php echo base_url()."settings/branch/delete/$pdt->id"; ?>" 

                              class="btn btn-danger print-btn" 
                              onclick="return confirm('Are you sure you want to delete this branch?');">
                                <i class="fas fa-trash"></i>
                            </a>

                                        <?php
                                     }
                                        ?>
                 
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
        window.location.href = "<?php echo base_url();?>patient/delete/" + userId;
      }
    });

  }
</script>





