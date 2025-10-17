<style>
.print-btn{
 
  
    padding:10px !important;
}
  </style>
<div class="container-fluid">

  <div class="row px-3">
    <form method="post" action="<?= base_url()."billinfo/list" ?>">
      <div class="filter-row bg-light p-3 rounded-3 shadow-sm mb-3">


        <div class="row">
          <div class="col-md-2 mb-3">
            <label for="invoice_id">Invoice ID</label>
            <input type="text" class="form-control" placeholder="" name="invoice_id" id="invoice_id">
          </div>
          <div class="col-md-2 mb-3">
            <label for="office_name">From Date</label>
            <input type="text" id="from_date" class="form-control from_date" name="from_date"
              value="<?php echo set_value('from_date'); ?>">
          </div>

          <div class="col-md-2 mb-3">
            <label for="office_name">To Date</label>
            <input type="text" id="to_date" class="form-control to_date" name="to_date"
              value="<?php echo set_value('to_date'); ?>">
          </div>

          <div class="col-md-2 mb-3">
            <label for="status_id">Status</label>
            <div class="select_optino">
              <select name="status_id" id="status_id" class="form-control frm_select">
                <option value="">Select </option>
                <option value="Paid">Paid</option>
                <option value="Due">Due</option>
                <option value="Partially">Partially</option>
              </select>
              <i class="fas fa-caret-down"></i>
            </div>
          </div>

          <div class="col-auto mt-4">
            <button type="submit" class="btn btn_bg px-4">
              <i class="fas fa-search"></i> Search
            </button>
          </div>





        </div>


      </div>


    </form>
  </div>



  <div class="row px-3">
    <div class="col-12">
      <div class="content">
        <div class="row">
          <div class="col-auto">
            <h3>Patient Billing List</h3>
          </div>
          <div class="col-auto ms-auto">
            <!-- Button trigger modal -->
            <a type="button" class="btn btn_bg" href="<?php echo base_url(); ?>billinfo">
              <i class="fas fa-plus"></i> Add New Billing
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
                    <th>Registration No</th>
                    <th>
                      <?php echo display('name'); ?>
                    </th>
                    <th>Mobile No</th>
                    <th>Total Amount</th>
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
                      <?php echo $pdt->invoiceNumber;?>
                    </td>
                    <td>
                      <?php echo $pdt->name;?>
                    </td>
                    <td>
                      <?php echo $pdt->mobile_no;?>
                    </td>
                    <td>
                      <?php echo $pdt->totalAmount;?>
                    </td>
                    <td>
                      <?php echo $pdt->isPaid ;
                                       ?>
                    </td>
                    <td>
                      <?php echo date('d-m-Y',$pdt->created_at); ?>
                    </td>
                    <td>
                      <button type="button" class="btn btn_bg" data-bs-toggle="modal"
                        data-bs-target="#exampleModal<?php echo $pdt->id; ?>">
                        <i class="fas fa-dollar"></i>
                      </button>
                       <a href="<?php echo base_url()."billinfo/invoice/$pdt->id"; ?>" target="_blank" class="btn btn_bg print-btn" >
                        <i class="fas fa-print"></i>
                                        </a>
                 
                    </td>
                  </tr>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal<?php echo $pdt->id; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5 text-bold" id="exampleModalLabel"> Due Amount -
                            <?php echo $pdt->name;?>
                          </h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo base_url(); ?>billinfo/account" method="post" class="">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $pdt->id; ?>" />
                            <div class="row mb-3">
                              <div class="col-12">
                                <label for="name">Due Amount </label>
                                <input type="text" class="form-control" value="<?php echo $pdt->dueAmount; ?>"
                                  readonly />
                              </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col-12">
                                <label for="totalamount">Total Amount </label>
                                <input type="text" class="form-control" name="totalamount" id="totalamount" />
                              </div>
                            </div>


                            <div class="row mb-3">
                              <div class="col-12">
                                <label for="estatus_id">Status</label>
                                <div class="select_optino">
                                  <select name="estatus_id" id="estatus_id" class="form-control frm_select">
                                    <option value="">Select </option>
                                    <option value="Paid">Paid</option>
                                    <option value="Due">Due</option>
                                    <option value="Partially">Partially</option>
                                  </select>
                                  <i class="fas fa-caret-down"></i>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                Cancel
                              </button>
                              <button type="submit" class="btn btn_bg">
                                Save
                              </button>
                            </div>
                          </form>
                        </div>

                      </div>
                    </div>
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





<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

<script>
  $(document).ready(function () {


    $(" .from_date, .to_date").datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
      yearRange: "1900:2100",
    });

    // Set a default date (e.g., today's date)
    var today = $.datepicker.formatDate("dd-mm-yy", new Date());
    //  $(" .from_date, .to_date").val(today);

  });




</script>