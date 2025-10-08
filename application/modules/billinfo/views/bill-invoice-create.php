<style>
/* Fix for calendar z-index issues */
.ui-datepicker {
    z-index: 9999 !important; /* Ensures calendar appears above everything */
    width: 280px; /* Standard calendar width */
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    padding: 10px;
}

   </style>
<body>

    
    <section class="content">
        <div class="row">
        <?php echo form_open_multipart('billinfo/insertorder',array('class' => 'form-vertical', 'id' => 'insert_purchase','name' => 'insert_purchase'))?>
                      
            <div class="col-md-12">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                   
                    <div class="btn-group panel-defalut-two" >
                     
                     <h4>Bill Information </h4>

          
                     <button type="submit"   class="btn btn-labeled btn-success m-b-5" >
       <span class="btn-label"><i class="glyphicon "></i></span>Save
          </button>
              
                
               </div>
                    </div>
                    <div class="panel-body">
                


      <!-- Row -->
       <div class="col-md-6">
       <input type="hidden" name="purID" value="">
       <div class="form-group col-md-6">
                                <label for="invoice_no">Invoice No</label>
                                <input type="text" id="invoice_no" class="form-control" name="invoice_no" value="INV-000001" readonly>
                                <span class="text-red small"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="invoice_date">Bill Date</label>
                                <input type="text" id="invoice_date" class="form-control today " style="z-index:9999" name="invoice_date" value="">
                                <span class="text-red small"></span>
                            </div>

                            <!-- Pasander  -->
                            <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" id="dr_search" class="form-control" placeholder="Search Doctor by Name or Mobile No or ID (F2)">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" id="create_doctor"  data-toggle="modal" data-target="#add_new_doctor" type="button"><i class="fa fa-plus"></i> New Doctor</button>
                            </span>
                        </div>
                    </div>
                </div><!-- Serach -->
                <div class="form-group col-md-6">
              
                       
                                <input type="hidden" readonly class="form-control" id="dr_id" name="dr_id" value="">
                                <input type="hidden"  class="form-control" id="doct_reg_id" name="doct_reg_id" value="">
                                <label class="control-label " for="dr_name">Doctor Name</label>
                                <input type="text"    required 
  autofocus  class="form-control" readonly requird id="dr_name" name="dr_name" value="">
                         
                     
                    </div>  <!-- .col-md-6-->
                    <div class="form-group col-md-6">
                            <label class="control-label " for="dr_degree">Doctor Degree</label>
                         
                                <input type="text"  class="form-control" id="dr_degree" readonly  name="dr_degree" value="">
                         
                       
                    </div>
                    <!-- .col-md-6-->

                    
                            <!-- End Pasander -->
       </div><!-- .col-md-6 -->

       <div class="col-md-6">

       <div class="form-group col-md-12">
                        <div class="input-group">
                            <input type="text" id="pat_search" class="form-control" placeholder="Search Patient by Name or Mobile No or ID (F2)">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" id="create_patient"  data-toggle="modal" data-target="#add_new_categories" type="button"><i class="fa fa-plus"></i> New Patient</button>
                            </span>
                        </div>
                   
                </div><!-- .col-9 -->
                <div class="form-group col-md-6">
                           
                       
                                <input type="hidden" readonly class="form-control" id="pat_id" name="pat_id" value="">
                                <input type="hidden"  class="form-control" id="reg_id" name="reg_id" value="">
                                <label class="control-label " for="pat_name">Name</label>
                                <input type="text" autofocus class="form-control" required  id="pat_name" name="pat_name" value="">
                       
                    </div><!-- .col-md-6 -->
                    <div class="form-group col-md-6">
                            <label class="control-label " for="pat_address">Address</label>
                       
                                <input type="text" autofocus required class="form-control" id="pat_address" name="pat_address" value="">
                      
                    </div><!-- .col-md-6 -->
                    <div class="form-group col-md-6">
                            <label class="control-label " for="pat_mobile">Mobile No</label>
                   
                                <input type="text" autofocus required  class="form-control" id="pat_mobile" name="pat_mobile" value="">
                      
                    </div><!-- .col-md-6 -->
                    <div class="form-group col-md-6">
                            <label class="control-label" for="pat_sex">Sex</label>
                         
                                <div class="form-control" style="height: auto; padding: 5px;">
                                    <label style="display: inline-block; margin-right: 15px;">
                                        <input type="radio" required id="pt_male" name="pat_sex" checked value="Male"> Male
                                    </label>
                                    <label style="display: inline-block;">
                                        <input type="radio" id="pt_female" name="pat_sex"  value="Female"> Female
                                    </label>
                                
                    
                    </div>
                </div>
                    <!-- .col-md-6 -->
                
                    <div class="form-group col-md-6">
                            <label class="control-label " for="pat_age">Age</label>
                           
                                <input type="number" autofocus required class="form-control" id="pat_age" name="pat_age" value="">
                         
                    </div>
                     <!-- .col-md-6 -->


       </div><!-- .col-md-6 -->
</div>
      <!-- End Row -->

      <div class="row">
      <div class="col-md-6">

      <div class="col-md-12">
                                                      

                                                      <input type="text" class="form-control" name="batch_number_s" id="batch_number_s" placeholder="Search Test By Name here..">
                                                      <span class="text-danger"></span>
                                                      <input type="hidden" id="search_product_id" class="form-control"/>
                                                      <input type="hidden" value="0" id="ganak">
                                                
                                                           </div><!-- .col-md-6 -->



                                                           <div class="col-md-12">
                                            <div class="table-responsive">
                                            <table id="selectedItemsTable" class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr class="info">
                                                        <th width="60px">S.L</th>
                                                        <th>Test Name</th>
                                                        <th width="150px">Test Fee</th>
                                                        <th>Comments</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="selectedItemsBody">
                                                    <!-- Selected items will appear here -->
                                                </tbody>
                                                <!-- <tfoot>
                                                    <tr>
                                                        <td colspan="2"><strong>Total</strong></td>
                                                        <td id="totalQty">0</td>
                                                        <td></td>
                                                    </tr>
                                                </tfoot> -->
                                            </table>
                                            
                                         
                                        </div>
                                          
                                            </div>  <!-- col-md-6 -->
      </div><!-- .col-md-6 -->
      <div class="col-md-6">
      <div class="col-md-12">
                                            <p hidden id="pay-amount"></p>
                                            <p hidden id="change-amount"></p>
                                            
                                            <div class="panel-body ">
                                           
                                           
                                        
                                          
                                                <table class="table table-bordered table-striped table-hover">
                                                    <tr>
                                                        <th>Total Amount</th>
                                                        <td>
                                                            <span class="text-red small"></span>
                                                            <input type="number" name="gtotal_amount" id="grandTotal" class="form-control grandTotal text-right"  value="0"  required 
  min="1" 
  step="1"" tabindex="7"  
>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Discount 
                                                            <select name="discount_type" class="form-select discount_type form-control" id="form-ware" aria-invalid="false">
                                                                <option value="flat">Flat (৳)</option>
                                                                <option value="percent">Percent (%)</option>
                                                            </select>
                                                        </th>
                                                        <td>
                                                            <input type="number" step="any" name="discountAmount" id="discount_amount" min="0" class="form-control right-start-input" placeholder="0">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Total Amount</th>
                                                        <td>
                                                            <span class="text-red small"></span>
                                                            <input type="number" name="dis_grandTotal"  id="dis_grandTotal" class="form-control dis_grandTotal text-right" value="0"  required 
  min="6"  tabindex="7">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Payment Amount</th>
                                                        <td>
                                                            <input type="text" name="payment_amount" id="paymentAmount" class="form-control payment_amount text-right" placeholder="0.00" value="0" min="0" tabindex="7">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Due Amount</th>
                                                        <td>
                                                            <input type="text" name="due_amount" id="dueAmount"  class="form-control due_amount text-right" placeholder="0.00" value="0"  min="0" tabindex="7">
                                                        </td>
                                                    </tr>
                                                </table>
                                                
                                                <input type="hidden" id="orderData" name="order_data">
                                                <div class="form-group col-sm-12">
                                                    <div class="reset-button left">
                                                        <button type="reset" class="btn btn-warning">Reset</button>
                                                        <button type="submit"  class="btn btn-success">Save</button>
                                                    </div>
                                                </div>
                                            </div>

                                            </div>
      </div><!-- .col-md-6 -->
      </div>

                            
                            
                            
                                                  
                          
                    
                    </form>
            </div>
        </div>
    </section>
 <!--- Start new -->  

 <div class="modal fade" id="add_new_categories" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                           <form action="<?php echo base_url(); ?>patient/savegromdialog" class="form-horizontal" id="patient_form" method="post" accept-charset="utf-8">

                               
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class=" text-start">Create New Patient</h4>
                              </div>
                              <div class="modal-body">
                                 <fieldset>
                                       <!-- Text input-->
                                     
                                        <div class="col-md-12 form-group">
                                          <label class="control-label" for="pat_name">Name</label>
                                          <input type="text"   name="pat_name" value="<?php echo set_value('pat_name'); ?>" id="pat_name" class="form-control" >
                                          <span class="text-red small"><?php echo form_error('pat_name'); ?></span>
                                       </div>
                                       <div class="col-md-12 form-group">
                            <label for="pat_address">Address</label>
                            <input type="text" name="pat_address" id="pat_address" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pat_mobile">Mobile No</label>
                            <input type="text" required name="pat_mobile" id="pat_mobile" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pat_sex">Sex</label>
                            <span class="form-control">
                            <label style="float:left;" for="pat_sexOut">
                                <input type="radio" checked name="pat_sex" id="pat_sexOut" value="Male" class="flat"> Male
                            </label>
                            <label style="float:left;" for="pat_sexIn">
                                <input type="radio" name="pat_sex" id="pat_sexIn" value="Female" class="flat"> Female
                            </label>
                            </span>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pat_age">Age</label>
                            <input type="text" required name="pat_age" id="pat_age" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pat_age_type">Age Type</label>
                            <select id="pat_age_type" name="pat_age_type" class="form-control">
                                <option>Year(s)</option>
                                <option>Month(s)</option>
                                <option>Week(s)</option>
                                <option>Day(s)</option>
                            </select>
                        </div>
                                       
                                       
                                       
                                    
                                     
                                      
                                    </fieldset>
                              
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-add bt-lg"><?php echo display('save'); ?></button>
                              </div>
                              </form>
                           </div>
                           <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                     </div>
            <!-- End new -->

      <!--- Start new -->  

      <div class="modal fade" id="add_new_doctor" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                           <form action="<?php echo base_url(); ?>patient/drsave" class="form-horizontal" id="dr_form" method="post" accept-charset="utf-8">

                               
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class=" text-start">Create New Doctor</h4>
                              </div>
                              <div class="modal-body">
                                 <fieldset>
                                       <!-- Text input-->
                                     
                                        <div class="col-md-12 form-group">
                                          <label class="control-label" for="dr_name">Name</label>
                                          <input type="text"   name="dr_name" value="<?php echo set_value('dr_name'); ?>" id="dr_name" class="form-control" >
                                          <span class="text-red small"><?php echo form_error('dr_name'); ?></span>
                                       </div>
                                       <div class="col-md-12 form-group">
                                                <label for="dr_degree">Doctor Degree</label>
                                                <input type="text" name="dr_degree" id="dr_degree" class="form-control">
                                            </div>
  
                                       
                                       
                                       
                                    
                                     
                                      
                                    </fieldset>
                              
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-add bt-lg"><?php echo display('save'); ?></button>
                              </div>
                              </form>
                           </div>
                           <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                     </div>
            <!-- End new -->

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            // Set today's date
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            $('#sales_date').val(yyyy + '-' + mm + '-' + dd);
            
            // Initialize autocomplete for patient search
            $("#pat_search").autocomplete({
                source: function(request, response) {
                    // AJAX call to search patients
                    // Replace with your actual endpoint
                    $.ajax({
                        url: "<?php echo base_url(); ?>patient/searchPatients",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.value + " (" + item.pat_mobile + ")",
                                    value: item.value,
                                    id: item.pat_id ,
                                    address: item.address,
                                    mobile: item.pat_mobile,
                                    sex: item.sex,
                                    age: item.age
                                };
                            }));
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    $("#pat_id").val(ui.item.id);
                    $("#reg_id").val(ui.item.id);
                    $("#pat_name").val(ui.item.value);
                    $("#pat_address").val(ui.item.address);
                    $("#pat_mobile").val(ui.item.mobile);
                    $("#pat_age").val(ui.item.age);
                    
                    if (ui.item.sex === "Male") {
                        $("#pt_male").prop("checked", true);
                    } else {
                        $("#pt_female").prop("checked", true);
                    }
                    
                    return false;
                }
            });


              // Initialize autocomplete for patient search
              $("#dr_search").autocomplete({
                source: function(request, response) {
                    // AJAX call to search Doctor
                    // Replace with your actual endpoint
                    $.ajax({
                        url: "<?php echo base_url(); ?>patient/searchDoctor",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.value + " (" + item.degree + ")",
                                    value: item.value,
                                    degree: item.degree,
                                    id: item.id ,
                                   
                                };
                            }));
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    $("#dr_id").val(ui.item.id);
                    $("#doct_reg_id").val(ui.item.id);
                    $("#dr_name").val(ui.item.value);
                    $("#dr_degree").val(ui.item.degree);
                    
                  
                    return false;
                }
            });
            
            // Initialize autocomplete for item search
            $("#batch_number_s").autocomplete({
                source: function(request, response) {
                    // AJAX call to search items
                    // Replace with your actual endpoint
                    $.ajax({
                        url: "<?php echo base_url(); ?>billinfo/api/items_search",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name + " (" + item.testFee + ")",
                                    value: item.name,
                                    id: item.id,
                                    price: item.testFee
                                };
                            }));
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    addItemToTable(ui.item);
                    $("#batch_number_s").val("");
                    return false;
                }
            });
            
            // Function to add item to the table
            function addItemToTable(item) {
                var rowCount = $('#selectedItemsTable tbody tr').length + 1;
                var newRow = '<tr>' +
                    '<td>' + rowCount + '</td>' +
                    '<td>' + item.value + '<input type="hidden" required name="product_id[]" value="' + item.id + '"></td>' +
                    '<td>' + 
                        '<input type="text" class="form-control price" name="price[]" value="' + item.price + '" onchange="calculateTotal()">' +
                    '</td>' +
                    '<td><input type="text" class="form-control" name="comments[]"></td>' +
                    '<td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>' +
                '</tr>';
                
                $('#selectedItemsBody').append(newRow);
                calculateTotal();
            }
            
            // Remove row button click event
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                calculateTotal();
            });
            
            // Calculate total amount
            window.calculateTotal = function() {
                var total = 0;
                $('.price').each(function() {
                    var price = parseFloat($(this).val()) || 0;
                    total += price;
                });
                
                $('#grandTotal').val(total.toFixed(2));
                $('#dis_grandTotal').val(total.toFixed(2));
                calculateDueAmount();
            }
            
            // Calculate due amount when payment amount changes
            $('#paymentAmount, #discount_amount').on('input', function() {
                calculateDueAmount();
            });
            
            // Discount type change
            $('.discount_type').change(function() {
                calculateDueAmount();
            });
            
            // Function to calculate due amount
            function calculateDueAmount() {
                var grandTotal = parseFloat($('#grandTotal').val()) || 0;
                var discountAmount = parseFloat($('#discount_amount').val()) || 0;
                var discountType = $('.discount_type').val();
                var paymentAmount = parseFloat($('#paymentAmount').val()) || 0;
                
                // Calculate discounted total
                if (discountType === 'percent') {
                    var discountValue = grandTotal * (discountAmount / 100);
                    var discountedTotal = grandTotal - discountValue;
                } else {
                    var discountedTotal = grandTotal - discountAmount;
                }
                
                $('#dis_grandTotal').val(discountedTotal.toFixed(2));
                
                // Calculate due amount
                var dueAmount = discountedTotal - paymentAmount;
                $('#dueAmount').val(dueAmount.toFixed(2));
            }
            
          
        });
    </script>



<script>
$(document).ready(function() {

  // Patient Form Submission
  $("#patient_form").on("submit", function(event) {
    event.preventDefault();
    
    var me = $(this);

    $.ajax({
      url: me.attr('action'),
      type: 'POST',
      data: me.serialize(),
      success: function(response) {
           // Close the modal
           $('#add_new_categories').modal('hide')
        try {
          var datas = JSON.parse(response);

          $('#pat_id').val(datas.pat_id);
          $("#reg_id").val(datas.pat_id);
          $('#pat_name').val(datas.pat_name);
          $('#pat_address').val(datas.pat_address);
          $('#pat_mobile').val(datas.pat_mobile);
          $('#pat_sex').val(datas.pat_sex);
          $('#pat_age').val(datas.pat_age + " " + datas.pat_age_type);

          if (typeof dialog !== "undefined") {
            dialog.dialog('close');
          }

        } catch (e) {
          console.error("Invalid JSON:", e);
          alert("Error in response format");
        }
      },
      error: function(xhr, status, error) {
        console.error("AJAX Error:", status, error);
        alert("Something went wrong while saving patient.");
      }
    });
  });

  // Doctor Form Submission
  $("#dr_form").on("submit", function(event) {
    event.preventDefault();
    
    var me = $(this);

    $.ajax({
      url: me.attr('action'),
      type: 'POST',
      data: me.serialize(),
      success: function(response) {
        $('#add_new_doctor').modal('hide')
        try {
          var datas = JSON.parse(response);
          $('#dr_id').val(datas.dr_id);
          $('#doct_reg_id').val(datas.dr_id);
          $('#dr_name').val(datas.name);
          $('#dr_degree').val(datas.degree);

          if (typeof dialogdr !== "undefined") {
            dialogdr.dialog('close');
          }

        } catch (e) {
          console.error("Invalid JSON:", e);
          alert("Error in response format");
        }
      },
      error: function(xhr, status, error) {
        console.error("AJAX Error:", status, error);
        alert("Something went wrong while saving doctor.");
      }
    });
  });

});
</script>

<script>
  document.getElementById("insert_purchase").addEventListener("submit", function(event) {
    const drName = document.getElementById("dr_name").value.trim();

    if (drName === "") {
      event.preventDefault(); // Stop form from submitting

      // Show SweetAlert2 popup
      Swal.fire({
        icon: 'warning',
        title: 'Doctor Required',
        text: 'Please select a doctor before submitting the form.',
        confirmButtonText: 'OK'
      });
    }
  });
</script>

