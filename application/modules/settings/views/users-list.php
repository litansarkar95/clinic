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
            <h3>Users  List</h3>
          </div>
          <div class="col-auto ms-auto">
            <!-- Button trigger modal -->
            <a type="button" class="btn btn_bg" href="<?php echo base_url(); ?>settings/users/create">
              <i class="fas fa-plus"></i> Add New Users
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
                        <th>Branch</th>
                      <th>Name</th>
                    <th>Mobile No</th>
                    <th>Role</th>
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
                      <?php echo $pdt->first_name;?>
                    </td>
                    <td>
                      <?php echo $pdt->contact_no;?>
                    </td>
                    <td>
                      <?php echo $pdt->role;?>
                    </td>
                  
                    <td>
                      <?php echo date('d-m-Y',$pdt->create_date); ?>
                    </td>
                    <td>
                    
                   
                                        <?php
                                     $role_id = $this->session->userdata('loggedin_role_id');
                                     if($role_id == 1){
                                        ?>
                                          <a href="<?php echo base_url()."settings/users/edit/$pdt->id"; ?>"  class="btn btn_bg print-btn" >
                        <i class="fas fa-pen"></i>
                                        </a>
                                          <a href="<?php echo base_url()."settings/users/delete/$pdt->id"; ?>" 

                              class="btn btn-danger print-btn" 
                              onclick="return confirm('Are you sure you want to delete this users?');">
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















