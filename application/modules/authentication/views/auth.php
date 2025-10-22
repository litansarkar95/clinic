<!DOCTYPE html>
<html lang="en" class="bg_login">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/static/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/static/css/dataTables.bootstrap5.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/static/css/dataTables.dataTables.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/static/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/static/css/responsive.css">
		<title>Login</title>
	</head>
	<style>
.text-red{
	color:red;
}
		</style>
	<body class="bg_login">
		<div class="wrapper_login">
			<div class="container ">
				<div class="row justify-content-center align-items-center ">
					<div class="col-md-7">
						<div class="login_form_wrapper">
							<div class="container">
								<div class="row justify-content-center align-items-center">
									<div class="col-md-6 text-center login_image_container">
										<div class="login_image">
											<img src="<?php echo base_url(); ?>assets/static/imgs/login_image.png" alt="">
										</div>
									</div>
									<div class="col-md-6 w_full">
										<div class="form_container">
											<form action="<?php echo base_url(); ?>authentication" method="post" >
												<div class="row">
													<div class="col">
														<div class="login_title">
														
															<h4>Sign in</h4>
														</div>
													</div>
												</div>
                                                 <?php  $error =  $this->session->userdata('error'); 
                                                    if($error){
                                                    
                                                    ?>
                                                   <p class="text-black">  <?php echo $this->session->userdata('error'); ?></p>
                                                
                                                    <?php
                                                    $this->session->unset_userdata('error'); 
                                                                        
                                                    }
                                            ?>
                                                    <div class="row mb-3 mt-4">
													<div class="col-12">
														<label for="username">Email</label>
														<input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" class="form-control" required>
                                                         <span class="text-red small"><?php echo form_error('username'); ?></span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-12">
														<div class="pass_label">
															<label for="user">Password</label><a href="" class="forget_link">Forget Password</a>
														</div>
														<span class="pass">
															<input type="password" name="password" class="form-control mb-2" id="viewPw" required>
															<button class="eye_btn" type="button" id="showPw">
																<i class="fas fa-eye eye_icn"></i>
															</button>
														</span>
                                                         <span class="text-red small"><?php echo form_error('password'); ?></span>
														<input type="checkbox" value="remember"> Remember Me
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-12 text-center">
														<button type="submit" class="btn btn_bg login_btn"><i class="fas fa-key"></i> Login</button>
													</div>
												</div>
												
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<script src="<?php echo base_url(); ?>assets/static/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/static/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/static/js/dataTables.js"></script>
	<script src="<?php echo base_url(); ?>assets/static/js/main.js"></script>
	</body>
</html>