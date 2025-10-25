<div class="container-fluid">
    <div class="row px-3">
        <div class="col-12">
            <div class="content">
                <div class="row">
                    <div class="col-auto">
                        <h3>Facials List</h3>
                    </div>
                    <div class="col-auto ms-auto">
                        <a href="<?php echo base_url(); ?>facials/create" class="btn btn_bg">Create New Facials</a>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="order_list_container table-responsive">
                            <table id="order_list_table_list" class="table table-striped table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th><?php echo display('sl'); ?></th>
                                        <th><?php echo display('name'); ?></th>
                                        <th>Regular Price</th>
                                        <th>Offer Price</th>
                                        <th>Discount Type</th>
                                        <th>Offer Start</th>
                                        <th>Offer End</th>
                                        <th><?php echo display('status'); ?></th>
                                        <th><?php echo display('create_date'); ?></th>
                                        <th><?php echo display('action'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 1;
                                    if (isset($allPdt)) {
                                        foreach ($allPdt as $pdt) {
                                    ?>
                                   <tr>
                                   <td><?php echo $i++; ?></td>
                                   <td><?php echo $pdt->name; ?></td>
                                   <td>৳<?php echo number_format($pdt->regular_price, 2); ?></td>
                                   <td>৳<?php echo number_format($pdt->offer_price, 2); ?></td>
                                   <td><?php echo !empty($pdt->discount_type) ? $pdt->discount_type : ''; ?></td>

                                   <td>
                                        <?php 
                                             if (!empty($pdt->offer_start_date) && $pdt->offer_start_date != '0000-00-00') {
                                                  echo date('d-m-Y', strtotime($pdt->offer_start_date));
                                             } else {
                                                  echo '';
                                             }
                                        ?>
                                   </td>

                                   <td>
                                        <?php 
                                             if (!empty($pdt->offer_end_date) && $pdt->offer_end_date != '0000-00-00') {
                                                  echo date('d-m-Y', strtotime($pdt->offer_end_date));
                                             } else {
                                                  echo '';
                                             }
                                        ?>
                                   </td>

                                   <td>
                                        <?php if ($pdt->is_active == 1) {
                                             echo '<span class="badge bg-success">Active</span>';
                                        } else {
                                             echo '<span class="badge bg-danger">Inactive</span>';
                                        } ?>
                                   </td>

                                   <td><?php echo date('d-m-Y', strtotime($pdt->created_at)); ?></td>

                                   <td>
                                        <a href="<?php echo base_url("facials/edit/" . $pdt->id); ?>" class="btn btn-sm btn_bg">
                                             <i class="fas fa-pen"></i> Edit
                                        </a>
                                        <a href="#" onclick="confirmDelete(<?php echo $pdt->id; ?>)" class="btn btn-sm btn-danger">
                                             <i class="fas fa-trash"></i> Delete
                                        </a>
                                   </td>
                                   </tr>

                                    <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="10" class="text-center text-danger">No Facials Found!</td></tr>';
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

<!-- SweetAlert Delete Confirmation -->
<script>
function confirmDelete(id) {
    Swal.fire({
        title: "Confirm Delete",
        text: "Are you sure you want to delete this facial?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?php echo base_url(); ?>facials/delete/" + id;
        }
    });
}
</script>
