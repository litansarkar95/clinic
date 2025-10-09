<style>
  /* Category menu - hidden by default */
  .category-menu {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 60px;
      background: white;
      z-index: 90;
      overflow-y: auto;
      transform: translateY(-100%);
      opacity: 0;
      transition: all 0.3s ease;
      pointer-events: none;
  }
  
  .category-menu.active {
      transform: translateY(0);
      opacity: 1;
      pointer-events: auto;
  }
  
  .menu-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
      background: #6c5ce7;
      color: white;
      position: sticky;
      top: 0;
      z-index: 1;
  }
  
  .close-menu {
      background: none;
      border: none;
      color: white;
      font-size: 20px;
      cursor: pointer;
  }
  
  .category-item {
      background: white;
      border-bottom: 1px solid #eee;
  }
  
  .category-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 20px;
      font-weight: 500;
      color: #333;
      cursor: pointer;
  }
  
  .category-header i:first-child {
      margin-right: 10px;
      color: #6c5ce7;
  }
  
  .category-header i:last-child {
      transition: transform 0.3s;
  }
  
  .category-item.active .category-header i:last-child {
      transform: rotate(90deg);
  }
  
  .submenu {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease-out;
      background: #f9f9f9;
  }
  
  .category-item.active .submenu {
      max-height: 500px;
  }
  
  .submenu-item {
      padding: 14px 20px 14px 50px;
      border-top: 1px solid #f0f0f0;
      color: #555;
      display: block;
      text-decoration: none;
  }
  
  /* Bottom Navigation */
  .mobile-menu {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: white;
      display: flex;
      justify-content: space-around;
      padding: 12px 0;
      box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
      z-index: 100;
  }
  
  .menu-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-decoration: none;
      color: #666;
      font-size: 12px;
      position: relative;
      flex: 1;
  }
  
  .menu-item.active {
      color: #6c5ce7;
  }
  
  .menu-icon {
      font-size: 22px;
      margin-bottom: 4px;
  }
  
  /* Camera Button Styles */
  .camera-button {
      position: absolute;
      top: -25px;
      left: 50%;
      transform: translateX(-50%);
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: linear-gradient(135deg, #6c5ce7, #a29bfe);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 10px rgba(108, 92, 231, 0.3);
      color: white;
      font-size: 24px;
      z-index: 101;
     /* Add space below the button */
     margin-bottom: 10px; /* Adjust this value as needed */
  }
  
  .camera-container {
      position: relative;
      width: 60px;
      display: flex;
      justify-content: center;
      margin-bottom: 20px; 
  }
  
  /* Main content */
  .main-content {
      padding-bottom: 80px; /* Add padding to prevent content from being hidden behind the menu */
  }
</style>

<section class="content-header" style="margin-bottom:-12px;">
  <div class="header-icon">
      <i class="fa fa-heartbeat"></i>
  </div>
  <div class="header-title">
      <h1><?php  $ci =& get_instance();
          $ci->load->database();  $setting = $ci->db->get("setting")->row();
           echo $setting->name;
          ?></h1>
  </div>
</section>

<!-- Main Content -->
<div class="main-content" id="mainContent">
<?php
       if(isset($content)){
         echo $content;
       }
       ?>
</div>

<!-- Category Menu (hidden by default) -->
<div class="category-menu" id="categoryMenu">
  <div class="menu-header">
      <h3>All Categories</h3>
      <button class="close-menu" id="closeMenu">
          <i class="fa fa-times"></i>
      </button>
  </div>
  
  <!-- Category Items -->
  <div class="category-item">
      <div class="category-header">
          <span><i class="fa fa-codepen"></i> orders</span>
          <i class="fa fa-chevron-right"></i>
      </div>
      <div class="submenu">
          <a href="<?php echo base_url(); ?>customer/order/create" class="submenu-item"><?php echo display('new_order'); ?></a>
          <a href="<?php echo base_url(); ?>customer/order" class="submenu-item"><?php echo display('order_list'); ?></a>
          <a href="<?php echo base_url(); ?>customer/order/myorder" class="submenu-item"><?php echo display('my_order'); ?></a>
      </div>
  </div>
  
  <div class="category-item">
      <div class="category-header">
          <span><i class="fa fa-user"></i> <?php echo display('profile'); ?></span>
          <i class="fa fa-chevron-right"></i>
      </div>
      <div class="submenu">
          <a href="#" class="submenu-item"><?php echo display('profile'); ?></a>
          <a href="#" class="submenu-item"><?php echo display('change_password'); ?></a>
      </div>
  </div>
</div>

<!-- Bottom Navigation -->
<div class="mobile-menu">
  <a href="<?php echo base_url(); ?>dashboard" class="menu-item">
      <i class="fa fa-home menu-icon"></i>
      <span>Dashboard</span>
  </a>
  
  <a href="#" class="menu-item" id="categoryBtn">
      <i class="fa fa-th-large menu-icon"></i>
      <span>Category</span>
  </a>
  
  <div class="camera-container">
      <a href="<?php echo base_url(); ?>customer/order/create" class="camera-button" id="cameraBtn">
          <i class="fa fa-camera"></i>
      </a>
  </div>
  
  <a href="#" class="menu-item">
      <i class="fa fa-user menu-icon"></i>
      <span>Profile</span>
  </a>
  
  <a href="<?php echo base_url(); ?>logout" class="menu-item">
      <i class="fa fa-sign-out menu-icon"></i>
      <span>Logout</span>
  </a>
</div>

<script>
  // DOM Elements
  const categoryBtn = document.getElementById('categoryBtn');
  const cameraBtn = document.getElementById('cameraBtn');
  const categoryMenu = document.getElementById('categoryMenu');
  const closeMenu = document.getElementById('closeMenu');
  const mainContent = document.getElementById('mainContent');
  
  // Toggle category menu
  function toggleCategoryMenu() {
      categoryMenu.classList.toggle('active');
      mainContent.classList.toggle('blur');
      document.body.style.overflow = categoryMenu.classList.contains('active') ? 'hidden' : '';
  }
  
  // Event listeners
  categoryBtn.addEventListener('click', function(e) {
      e.preventDefault();
      toggleCategoryMenu();
  });
  
 
  
  closeMenu.addEventListener('click', toggleCategoryMenu);
  
  // Close menu when clicking outside
  categoryMenu.addEventListener('click', function(e) {
      if (e.target === categoryMenu) {
          toggleCategoryMenu();
      }
  });
  
  // Toggle submenus
  document.querySelectorAll('.category-header').forEach(header => {
      header.addEventListener('click', function() {
          this.parentElement.classList.toggle('active');
      });
  });
  
  // Bottom menu active state
  document.querySelectorAll('.mobile-menu .menu-item').forEach(item => {
      item.addEventListener('click', function() {
          document.querySelectorAll('.mobile-menu .menu-item').forEach(i => {
              i.classList.remove('active');
          });
          this.classList.add('active');
      });
  });
</script>