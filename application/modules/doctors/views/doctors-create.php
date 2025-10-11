	<div class="container-fluid">
								<div class="row px-3 ">
								
										<div class="">
											
											<div class="row justify-content-center pb-5">
												<div class="col-md-7">
                                       <div class="row pb-3">
												<div class="col-auto">
													<h3>Create Doctor</h3>
												</div>
												<div class="col-auto ms-auto">
													<a href="<?php echo base_url(); ?>doctors"  class="btn btn_bg">Doctor List</a>
												</div>
											</div>
													<form action="<?php echo base_url(); ?>doctors/create" method="post" class="input_form">
									      				<div class="row mb-3">

                                <div class="form-group col-md-8">
                                 <label for="doctor_id">Doctor ID</label>
                                 <input type="text" id="doctor_id" class="form-control" name="doctor_id"  value="<?php echo set_value('doctor_id'); ?>" >
                                 <span class="text-red small"><?php echo form_error('doctor_id'); ?></span>
                                 </div> 
                               <div class="form-group col-md-8">
                                 <label for="name">Name</label>
                                 <input type="text" id="name" class="form-control" name="name"  value="<?php echo set_value('name'); ?>" >
                                 <span class="text-red small"><?php echo form_error('name'); ?></span>
                              </div>
                              <div class="form-group col-md-8 ">
                                 <label for="mobile_no">Mobile No</label>
                                 <input type="text" id="mobile_no" class="form-control" name="mobile_no"  value="<?php echo set_value('mobile_no'); ?>" >
                                 <span class="text-red small"><?php echo form_error('mobile_no'); ?></span>
                              </div>
                                <div class="form-group col-md-8">
                                 <label for="degree">Degree </label>
                                 <input type="text" id="degree" class="form-control" name="degree" value="<?php echo set_value('degree'); ?>" >
                                 <span class="text-red small"><?php echo form_error('degree'); ?></span>
                              </div>
                              
									      					
									      		</div>	
									      				<div class="row">
									      					<div class="col-12">
									      						<button type="submit" class="btn btn_bg">Save</button>
									      					</div>
									      				</div>
									      			</form>
												</div>
											</div>
										</div>
									</div>
								</div>
					



                       <script>
        $(document).ready(function() {
            $('#district_id').change(function() {
                var district_id = $(this).val();

                if (district_id) {
                    $.ajax({
                        url: '<?= base_url('patient/fetch_upazilla') ?>',
                        type: 'POST',
                        data: { district_id: district_id },
                        dataType: 'json',
                        success: function(data) {
                            $('#upazilla_id').empty().append('<option value="">Select Upazilla</option>');
                            
                            $.each(data, function(index, subcategory) {
                                $('#upazilla_id').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#upazilla_id').empty().append('<option value="">Select Upazilla</option>');
                }
            });
        });
    </script>