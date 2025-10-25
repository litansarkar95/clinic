	<nav class="navbar navbar-expand-lg my_header_nav">
										  <div class="container-fluid">
										    <button class="navbar-toggler top_nav_toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										      <i class="fas fa-bars"></i>
										    </button>
										    <div class="collapse navbar-collapse" id="navbarSupportedContent">
										      <ul class="navbar-nav me-auto mb-2 mb-lg-0 header_menu">
										        <li class="nav-item">
										          <a class="nav-link <?php if($active == 'dashboard'  ){ echo 'active';} ?>"  aria-current="page" href="<?php echo base_url(); ?>dashboard">Dashboard</a>
										        </li>

										             <?php
                                     $role_id = $this->session->userdata('loggedin_role_id');
                                     if($role_id == 1){
                                        ?>
										        <li class="nav-item">
										          <a class="nav-link" href="#">Base <i class="fas fa-caret-down"></i></a>
										          <ul class="nav_sub_menu">
										            <li><a href="<?php echo base_url(); ?>facials">Facials</a></li>
										          	<!-- <li><a href="<?php echo base_url(); ?>billinfo/categories">Categories</a></li> -->
										          	<!-- <li><a href="<?php echo base_url(); ?>patient/districts">District</a></li>
										          	<li><a href="<?php echo base_url(); ?>patient/upazila">Upazila</a></li>
										          	<li><a href="<?php echo base_url(); ?>patient/occupation">Occupation</a></li> -->
										          </ul>
										        </li>
													<?php
									 }
                                        ?>

										          <!-- <li class="nav-item">
										          <a class="nav-link" href="#">Test Information <i class="fas fa-caret-down"></i></a>
										          <ul class="nav_sub_menu">
										          	<li><a href="<?php echo base_url(); ?>testinfo">Test Information</a></li>
										          </ul>
										        </li> -->
											<li class="nav-item">
										          <a class="nav-link" href="#">Billing <i class="fas fa-caret-down"></i></a>
										          <ul class="nav_sub_menu"> 	
													<li><a href="<?php echo base_url(); ?>billinfo/create">Create  Billing </a></li>
										          	<li><a href="<?php echo base_url(); ?>billinfo/list"> Invoice List</a></li>
										          	<li><a href="<?php echo base_url(); ?>customer">Customer List</a></li>
										         
										          </ul>
										        </li>


											

												 <li class="nav-item">
										          <a class="nav-link" href="#">Reports <i class="fas fa-caret-down"></i></a>
										          <ul class="nav_sub_menu">
										          	<li><a href="<?php echo base_url(); ?>reports/testinfo"> All  Reports</a></li>
										          
										          </ul>
										        </li>
                                                    <?php
                                     $role_id = $this->session->userdata('loggedin_role_id');
                                     if($role_id == 1){
                                        ?>
												<li class="nav-item">
										          <a class="nav-link" href="#">Settings <i class="fas fa-caret-down"></i></a>
										          <ul class="nav_sub_menu">
										          	<li><a href="<?php echo base_url()."settings/branch"; ?>">  Branch </a></li>
										          	<li><a href="<?php echo base_url()."settings/users"; ?>">  Users </a></li>
										          
										          </ul>
										        </li>
  												<?php
									 }
                                        ?>
										       
										      </ul>
										    </div>
										  </div>
										</nav>