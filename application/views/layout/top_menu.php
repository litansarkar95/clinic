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
										    
										        <li class="nav-item">
										          <a class="nav-link" href="#">Base <i class="fas fa-caret-down"></i></a>
										          <ul class="nav_sub_menu">
										          	<li><a href="<?php echo base_url(); ?>billinfo/categories">Categories</a></li>
										          	<li><a href="<?php echo base_url(); ?>patient/districts">District</a></li>
										          	<li><a href="<?php echo base_url(); ?>patient/upazila">Upazila</a></li>
										          	<li><a href="<?php echo base_url(); ?>patient/occupation">Occupation</a></li>
										          </ul>
										        </li>

										          <li class="nav-item">
										          <a class="nav-link" href="#">Test Information <i class="fas fa-caret-down"></i></a>
										          <ul class="nav_sub_menu">
										          	<li><a href="<?php echo base_url(); ?>testinfo">Test Information</a></li>
										          </ul>
										        </li>
											<li class="nav-item">
										          <a class="nav-link" href="#">Patient <i class="fas fa-caret-down"></i></a>
										          <ul class="nav_sub_menu">
										          	<li><a href="<?php echo base_url(); ?>patient/create">Patient Registration</a></li>
										          	<li><a href="<?php echo base_url(); ?>patient">Patient List</a></li>
										          	<li><a href="<?php echo base_url(); ?>billinfo">Create Patient Billing </a></li>
										          	<li><a href="<?php echo base_url(); ?>patient/billing">Patient Billing</a></li>
										          </ul>
										        </li>


												 <li class="nav-item">
										          <a class="nav-link" href="#">Doctors <i class="fas fa-caret-down"></i></a>
										          <ul class="nav_sub_menu">
										          	<li><a href="<?php echo base_url(); ?>doctors/create"> Create Doctor</a></li>
										          	<li><a href="<?php echo base_url(); ?>doctors">Doctors List</a></li>
										          </ul>
										        </li>

										       
										      </ul>
										    </div>
										  </div>
										</nav>