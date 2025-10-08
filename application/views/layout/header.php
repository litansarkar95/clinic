<header class="main-header">
               <a href="<?php echo base_url(); ?>dashboard" class="logo">
               <!-- Logo -->
               <span class="logo-mini">
               <p style="color:#fff;font-size:22px;text-transform: uppercase;"><?php  $ci =& get_instance();
                $ci->load->database();  $setting = $ci->db->get("setting")->row();
                 echo $setting->name;
                ?></p>
               </span>
               <span class="logo-lg">
               <p style="color:#fff;font-size:22px;text-transform: uppercase;"><?php echo $setting->name;
                  ?></p>
               </span>
                   </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <!-- Sidebar toggle button-->
                  <span class="sr-only">Toggle navigation</span>
                  <span class="pe-7s-angle-left-circle"></span>
               </a>
               <!-- searchbar-->
              
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- language -->
                   
                     <li class="dropdown dropdown-user">
                     <?php   $language = $this->session->userdata('site_lang');
                
                     if($language=="english"){  ?>  
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><img src="<?php echo base_url(); ?>public/assets/icon/uk.png" alt="" width="45" height="45"> <span><?php echo display('english'); ?></span></a>
                       <?php
                     } else if($language=="bangla"){ 
                       ?>
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><img src="<?php echo base_url(); ?>public/assets/icon/bd.png" alt="" width="45" height="45"> <span><?php echo display('bangla'); ?></span></a>
                      
                       <?php
                     }
                       ?>
                       
                        <ul class="dropdown-menu" >
                           <li>
                           <a href="#" class="connection-item" onclick="languagesChange('english');"><img src="<?php echo base_url(); ?>public/assets/icon/uk.png" alt="" width="45" height="45" > <span><?php echo display('english'); ?></span></a>
                           </li>
                           <li>
                           <a href="#" class="connection-item" onclick="languagesChange('bangla');"><img src="<?php echo base_url(); ?>public/assets/icon/bd.png" alt=""  width="45" height="45"> <span><?php echo display('bangla'); ?></span></a>
                        
                        </li>
                       
                        </ul>
                     </li>
                 <!-- Clock -->
                 <li class="dropdown notifications-menu">
                     <div class="nav-clock">
                    <div class="time">
               
                <span class="time-hours"></span>
                <span class="time-min"></span>
                <span class="time-sec"></span>
           
                
                     </div>
               </div><!-- nav-clock -->
               </li>
                    
                 
               
                
                     <!-- user -->
                     <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>public/images/staff/0.png" class="img-circle" width="45" height="45" alt="user"></a>
                        <ul class="dropdown-menu" >
                            <li>
                              <a href="<?php echo base_url(); ?>customer/profile">
                              <i class="fa fa-user"></i> User Profile</a>
                           </li>
                           <li><a href="<?php echo base_url(); ?>customer/profile/changepassword"><i class="fa fa-lock"></i> Change Password</a></li>
                           <li><a href="<?php echo base_url(); ?>logout">
                              <i class="fa fa-sign-out"></i> Logout</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>



