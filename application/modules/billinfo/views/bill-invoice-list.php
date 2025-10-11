<style>
.payment-badge {
  
    color: white;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2px 6px;
    border-radius: 4px;
}
.paid-badge{
   background-color: #34c759;
}
.unpaid-badge {
    background-color: #dc3545;
}


.partial-badge {
    background-color: #ff9500;

}
</style>
        
        <!-- Content Header (Page header) -->
            <section class="content-header">
            
               <div >
               <h4>Bill Invoice List</h4>
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
                     
                                 <h4>Bill Invoice List </h4>
         
                      
                          
                            
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
                                       <th><?php echo display('invoice_no'); ?></th>
                                       <th>Patient Name</th>
                                       <th><?php echo display('total'); ?></th>
                                       <th><?php echo display('paid'); ?></th>
                                       <th><?php echo display('due'); ?></th>
                                       <!-- <th><?php echo display('payment'); ?></th> -->
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
                                    <td><?php echo date("d F, Y",$pdt->invoice_date); ?></td>
                                    <td><?php echo $pdt->invoiceNumber; ?></td>
                                    <td> <a ><?php echo $pdt->pat_name." ".$pdt->pat_mobile; ?></a></td>
                              
                                    <td><?php echo $pdt->totalAmount; ?></td>
                                    <td><?php echo $pdt->paidAmount; ?></td>
                                    <td><?php echo $pdt->dueAmount; ?></td>
                
                      <!-- <td><?php echo $pdt->paymentType; ?></td> -->
                      <td>
                     
                      <div class="payment-badge  <?php if($pdt->isPaid == 'Paid') { echo "paid-badge";}else if($pdt->isPaid == 'Due') { echo "unpaid-badge";} else if($pdt->isPaid == 'Partially') { echo "partial-badge";}?>  ">
                      <?php echo $pdt->isPaid; ?>
            </div>

           
                     </td>
                   
                      
                     <td class="print-d-none">
    <div class="dropdown table-action">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-ellipsis-v"></i>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="<?php  echo base_url()."billinfo/invoice/$pdt->id" ?>"   target="_blank" >
                    <i class="fa fa-file-pdf-o"></i> Invoice
                </a>
            </li>
                <li>
            <a type="button" href="#" title="Delete" data-toggle="modal" data-target="#edit_liveStock<?php echo $pdt->id;?>" class="confirm-action " data-method="DELETE">
                    <i class="fa fa-dollar "></i> Due Pament
                </a>
                
            </li>
            <!-- <li>
                <a href="<?php  echo base_url()."billinfo/edit/$pdt->id" ?>">
                    <i class="fa fa-edit"></i> Edit
                </a>
            </li>
            <li>
            <a type="button" href="#" title="Delete" onclick="confirmDelete(<?php echo $pdt->id; ?>)" class="confirm-action " data-method="DELETE">
                    <i class="fa fa-trash "></i> Delete
                </a>
                
            </li> -->
        </ul>
    </div>
</td>
                                    </tr>



 <!-- Edit  -->
                 <div class="modal fade" id="edit_liveStock<?php echo $pdt->id;?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-edit m-r-5"></i>Due Payment</h3>

                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal" action="<?php echo base_url(); ?>billinfo/payment" method="post" enctype="multipart/form-data">
                                    <fieldset>
                                       <!-- Text input-->
                                     
                                       <input type="hidden"   name="id" value="<?php echo $pdt->id;?>" id="id" class="form-control" required>
                                        <div class="col-md-12 form-group">
                                          <label class="control-label" for="ename">Due Amount</label>
                                          <input type="text"   name="ename" value="<?php echo $pdt->dueAmount; ?>" id="ename" readonly class="form-control" >
                                       </div>
                                       <div class="col-md-12 form-group">
                                          <label class="control-label" for="payment">Amount</label>
                                          <input type="text"   name="payment" value="" required id="payment" class="form-control" >
                                       </div>
                                     
                                      
                                       <div class="form-group col-md-12">
                                <label for="invoice_date">Bill Date</label>
                                <input type="text" id="invoice_date" class="form-control today " style="z-index:9999" name="invoice_date" value="">
                                <span class="text-red small"></span>
                            </div>
                                    
                                     
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-left">
                                             <button type="submit" class="btn btn-add btn-sm"><?php echo display('save'); ?></button>
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
                                    <!-- Bootstrap Modal -->


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
    window.location.href = "<?php echo base_url();?>sales/delete/"+userId;
  }
}); 

}
   </script>
<script>
$(document).ready(function() {
  // When the button is clicked, create a modal dynamically
  $('#createModalBtn').click(function() {
    const id = $(this).data("id");

    // Create dynamic modal HTML
    const modalHtml = `
      <div class="modal fade" id="exampleModal${id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo base_url(); ?>sales/assign" method="POST">
         
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="exampleModalLabel">Select Delivery Person </h4>
            </div>
            <div class="modal-body">
            
             <input value="${id}" name="id" type="hidden" />
                <div class="form-group ">
              <label for="shipping_method_${id}">Sales Person:</label><br>
              <select id="shipping_method_${id}" name="shipping_method" style="width:100%" class="form-control select2">
                     <option value="1">Select</option>
              <?php
              foreach($allDel as $del){
                echo "<option value='{$del->id}'>{$del->first_name} - {$del->contact_no}</option>";
              }
              ?>
         
             
             
              </select>
            </div>
             <div class="form-group ">
              <label for="status${id}">Status:</label><br>
              <select id="status${id}" name="status_id" style="width:100%" class="form-control ">
                     <option value="1">Select</option>
              <?php
              foreach($allStatus as $status){
                echo "<option value='{$status->id}'>{$status->name}</option>";
              }
              ?>
         
             
             
              </select>
            </div>
              <div class="form-group ">
              <label for="remarks${id}">Remarks:</label><br>
              <input  id="remarks${id}" name="remarks" style="width:100%" class="form-control ">
                
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save </button>
            </div>
          </div>
           </form>
        </div>
      </div>
    `;

    // Append the modal HTML to the body
    $('body').append(modalHtml);

    // Initialize Select2 on the select element inside the modal with the correct id
    $(`#shipping_method_${id}`).select2();

    // Show the modal after appending it to the DOM
    $(`#exampleModal${id}`).modal('show');

    // Destroy Select2 when the modal is hidden
    $(`#exampleModal${id}`).on('hidden.bs.modal', function () {
      $(`#shipping_method_${id}`).select2('destroy');
    });
  });
});
</script>