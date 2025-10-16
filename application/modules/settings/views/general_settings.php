<div class="container-fluid">
								<div class="row px-3 ">
									<div class="col-12 bg_grey">
										<div class="content bg_grey px-0">
											
											<div class="row justify-content-center pb-5">
                                    <div class="input_form">
												<div class="col-md-12">
                                       <div class="col-auto">
													<h3>Settings</h3><hr>
												</div>
												 <form  action="<?php echo base_url(); ?>settings/general_update" method="post" enctype="multipart/form-data">
                           <?php
                            if(isset($allPdt)){
                                foreach($allPdt as $pdt){
                                   
                                
                            
                            ?>
									      				<div class="row">
									      					<div class="col-md-6  mb-3">
									      						<label for="fname">Title</label>
									      					  <input type="text" id="title" class="form-control" name="title" value="<?php echo $pdt->title; ?>" >
									      					</div>

                                                <div class="col-md-6">
                                 <label for="name"><?php echo display('name'); ?></label>
                                 <input type="text" id="title" class="form-control" name="name" value="<?php echo $pdt->name; ?>" >
                                 <span class="text-red small"><?php echo form_error('name'); ?></span>
                              </div>
                               <div class="col-md-6">
                                 <label for="email"><?php echo display('email'); ?></label>
                                 <input type="text" id="title" class="form-control" name="email" value="<?php echo $pdt->email; ?>" >
                                 <span class="text-red small"><?php echo form_error('email'); ?></span>
                              </div>
                              <div class="col-md-6">
                                 <label for="phone"><?php echo display('contact_no'); ?></label>
                                 <input type="text" id="title" class="form-control" name="phone" value="<?php echo $pdt->phone; ?>" >
                                 <span class="text-red small"><?php echo form_error('phone'); ?></span>
                              </div>
                           
                           
                          
                              <div class="col-md-6">
                                 <label for="language"><?php echo display('language'); ?></label>
                                 <select type="text" id="language" class="form-control" name="language"  >
                                    <option value=""><?php echo display('select'); ?></option>
                                    <option value="english" <?php if($pdt->language == 'english') echo 'selected'; ?>>English</option>
                                    <option value="bangla" <?php if($pdt->language == 'bangla') echo 'selected'; ?>>Bangla</option>
                                    <option value="arbic" <?php if($pdt->language == 'arbic') echo 'selected'; ?>>Arbic</option>
                                
                                    </select>
                                 <span class="text-red small"><?php echo form_error('language'); ?></span>
                              </div>
                           
                             
                           
                              <div class="col-md-6">
                                 <label for="facebook"><?php echo display('facebook'); ?></label>
                                 <input type="text" id="facebook" class="form-control" name="facebook"  value="<?php echo $pdt->facebook; ?>"  >
                                 <span class="text-red small"><?php echo form_error('facebook'); ?></span>
                              </div>
                              <div class="col-md-6">
                                 <label for="twitter"><?php echo display('twitter'); ?></label>
                                 <input type="text" id="twitter" class="form-control" name="twitter"  value="<?php echo $pdt->twitter; ?>"  >
                                 <span class="text-red small"><?php echo form_error('twitter'); ?></span>
                              </div>
                              <div class="col-md-6">
                                 <label for="linkedin"><?php echo display('linkedin'); ?></label>
                                 <input type="text" id="linkedin" class="form-control" name="linkedin"  value="<?php echo $pdt->linkedin; ?>"  >
                                 <span class="text-red small"><?php echo form_error('linkedin'); ?></span>
                              </div>
                              <div class="col-md-6">
                                 <label for="instagram"><?php echo display('instagram'); ?></label>
                                 <input type="text" id="instagram" class="form-control" name="instagram"  value="<?php echo $pdt->instagram; ?>"  >
                                 <span class="text-red small"><?php echo form_error('instagram'); ?></span>
                              </div>
                              <div class="col-md-6">
                                 <label for="youtube"><?php echo display('youtube'); ?></label>
                                 <input type="text" id="youtube" class="form-control" name="youtube"  value="<?php echo $pdt->youtube; ?>"  >
                                 <span class="text-red small"><?php echo form_error('youtube'); ?></span>
                              </div>
                                 

                              <div class="col-md-6">
                                 <label for="short_description"><?php echo display('short_description'); ?></label>
                                 <textarea type="text" id="short_description" class="form-control" name="short_description" ><?php echo $pdt->short_description; ?></textarea>
                                 <span class="text-red small"><?php echo form_error('short_description'); ?></span>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label for="address"><?php echo display('address'); ?></label>
                                 <textarea type="text" id="address" class="form-control" name="address" ><?php echo $pdt->address; ?></textarea>
                                 <span class="text-red small"><?php echo form_error('address'); ?></span>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label for="icons">Left Side Picture</label>
                                 <input type="file" id="icons" class="form-control" name="favicon"  value="<?php echo set_value('icons'); ?>" >
                                 <span class="text-red small"><?php echo form_error('icons'); ?></span>
                              </div>
                              <div class="col-md-6">
                              <img src="<?php echo base_url()."assets/images/{$pdt->favicon}"; ?>"  width="60px">
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label for="pic">Right Side Picture</label>
                                 <input type="file" id="pic" class="form-control" name="pic"  value="<?php echo set_value('pic'); ?>" >
                                 <span class="text-red small"><?php echo form_error('pic'); ?></span>
                              </div>
                              <div class="col-md-6 mb-3">
                              <img src="<?php echo base_url()."assets/images/{$pdt->logo}"; ?>"  width="60px">
                              </div>
                           </div>
                          
									      				<div class="row">
									      					<div class="col-12 mb-3">
									      						<button type="submit"  class="btn btn_bg">Update</buttona>
									      					</div>
									      				</div>
                                              <?php
                                    }
                                }
                            
                           ?>
									      			</form>
                                          </div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>