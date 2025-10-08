<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/static/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/static/css/dataTables.bootstrap5.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/static/css/dataTables.dataTables.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/static/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/static/css/responsive.css">
	<title>Admin Panel</title>
</head>
<body>
	<div class="wrapper_container">
		<section id="header_part">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="header_container">
							<div class="header_left">
								<div class="logo_part">
									<a href="<?php echo base_url(); ?>dashboard" class="my_logo">MyLogo</a>
								</div>

								<!-- sidebar toggle button -->
								<!-- <a href="#" class="sidebar_collapse_btn"><i class="fas fa-bars"></i></a> -->
								<!-- sidebar toggle button -->


							</div>
							<div class="nav_part">
								<div class="nav_bar_container">
									<div class="nav_left">
										

										<!-- top menu start -->
									 <?php include('top_menu.php'); ?>
										<!-- top menu end -->


									</div>
									<nav class="navbar nav py_5">
										<ul class="navbar-nav header_nav">
											<li class="nav-item dropdown header_nav_li">
												<a href="#" class="nav-link " data-bs-toggle="dropdown">
													<i class="fas fa-bell"></i>
												</a>
												<ul class="dropdown-menu nav_dropdown_ul shadow_user">
													<li class="dropdown-item">
														<a href="#">
															<div class="usr_note">
																<i class="fas fa-server"></i> 
															</div>
															<div class="note_details">
																<p>Server Restarted <br> <span class="nav_drpdwn_time">10 min ago</span></p>
																<i class="fas fa-xmark icn_close"></i>
															</div>
														</a>
													</li>
													<li class="dropdown-item">
														<a href="#">
															<div class="usr_note">
																<i class="fas fa-heart"></i> 
															</div>
															<div class="note_details">
																<p>Michael React <br> <span class="nav_drpdwn_time">15 min ago</span></p>
																<i class="fas fa-xmark icn_close"></i>
															</div>
														</a>
													</li>
													<li class="dropdown-item">
														<a href="#">
															<div class="usr_note">
																<i class="fas fa-file"></i> 
															</div>
															<div class="note_details">
																<p>Danny Sent a file <br> <span class="nav_drpdwn_time">20 min ago</span></p>
																<i class="fas fa-xmark icn_close"></i>
															</div>
														</a>
													</li>
													<li class="dropdown-item">
														<a href="#">
															<div class="usr_note">
																<i class="fas fa-warning text-danger"></i> 
															</div>
															<div class="note_details">
																<p>Server error <br> <span class="nav_drpdwn_time">30 min ago</span></p>
																<i class="fas fa-xmark icn_close"></i>
															</div>
														</a>
													</li>
												</ul>
											</li>
											<li class="nav-item dropdown header_nav_li">
												<a href="#" class="nav-link " data-bs-toggle="dropdown">
													<i class="fas fa-envelope"></i>
												</a>
												<ul class="dropdown-menu nav_dropdown_ul shadow_user">
													<li class="dropdown-item">
														<a href="#">
															<div class="usr_note">
																<img src="imgs/user-1.png" alt="" class="msg_user">
															</div>
															<div class="note_details">
																<p>David <br> <span class="nav_drpdwn_time">10 min ago</span></p>
															</div>
														</a>
													</li>
													<li class="dropdown-item">
														<a href="#">
															<div class="usr_note">
																<img src="imgs/user-2.png" alt="" class="msg_user">
															</div>
															<div class="note_details">
																<p>Michael <br> <span class="nav_drpdwn_time">15 min ago</span></p>
															</div>
														</a>
													</li>
													<li class="dropdown-item">
														<a href="#">
															<div class="usr_note">
																<img src="imgs/user-3.png" alt="" class="msg_user">
															</div>
															<div class="note_details">
																<p>Danny<br> <span class="nav_drpdwn_time">20 min ago</span></p>
															</div>
														</a>
													</li>
													<li class="dropdown-item">
														<a href="#">
															<div class="usr_note">
																<img src="imgs/user-4.png" alt="" class="msg_user">
															</div>
															<div class="note_details">
																<p>Roxy J<br> <span class="nav_drpdwn_time">30 min ago</span></p>
															</div>
														</a>
													</li>
												</ul>
											</li>
											<li class="nav-item dropdown header_nav_li">
												<a href="#" class="nav-link " data-bs-toggle="dropdown">
													<i class="fas fa-user"></i>
												</a>
												<ul class="dropdown-menu use_drpDown_ul shadow_user">
													<li class="dropdown-item">
														<div class="use_drpDown">
															<span><i class="fas fa-user"></i></span>
															<p class="usr_title">Monir Hossain</p>
															<p class="usr_email">abcd@gmail.com</p>
														</div>
													</li>
													<li class="dropdown-item">
														<a href="#">
															<div class="usr_note">
																<i class="fas fa-cog"></i> 
															</div>
															<div class="note_details">
																<p>Edit Profile</p>
															</div>
														</a>
													</li>
													<li class="dropdown-item">
														<a href="login.html">
															<div class="usr_note">
																<i class="fa-solid fa-share-from-square "></i> 
															</div>
															<div class="note_details">
																<p>Logout</p>
															</div>
														</a>
													</li>
												</ul>
											</li>
											<li class="nav-item dropdown header_nav_li">
												<a href="#" class="nav-link " data-bs-toggle="dropdown">
													<i class="fas fa-cog"></i>
												</a>
												<ul class="dropdown-menu nav_dropdown_ul shadow_user">
													<li class="dropdown-item">
														<a href="#">
															<div class="usr_note setting_icn">
																<i class="fas fa-users"></i> 
															</div>
															<div class="note_details">
																<p>Admins <br> </p>
															</div>
														</a>
													</li>
													<li class="dropdown-item">
														<a href="#">
															<div class="usr_note setting_icn">
																<i class="fas fa-font"></i> 
															</div>
															<div class="note_details">
																<p>Language</p>
															</div>
														</a>
													</li>
													<li class="dropdown-item">
														<a href="#">
															<div class="usr_note setting_icn">
																<i class="fas fa-palette"></i> 
															</div>
															<div class="note_details">
																<p>Colors</p>
															</div>
														</a>
													</li>
												</ul>
											</li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="body_part" class="height_100p">
			<div class="container-fluid height_100p">
				<div class="row height_100p">
					<div class="body_part_content">
						
						<div class="body_content">
						    <?php
							if(isset($content)){
							echo $content;
							}
							
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script src="<?php echo base_url(); ?>assets/static/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/static/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/static/js/dataTables.js"></script>
	<script src="<?php echo base_url(); ?>assets/static/js/main.js"></script>
</body>
</html>