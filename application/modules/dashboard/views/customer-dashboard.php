

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    :root {
        --primary: #6c5ce7;
        --secondary: #00b894;
        --accent: #fd79a8;
        --dark: #2d3436;
        --light: #f5f6fa;
    }

  

    .content-header {
        background: white;
        padding: 20px;
        margin-bottom: 25px;
      
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      
        align-items: center;
    }

    .header-icon {
        font-size: 28px;
        color: var(--primary);
        margin-right: 15px;
    }

    .header-title h1 {
        margin: 0;
        font-size: 2.5rem;
        color: var(--dark);
        font-weight: 600;
    }

    .content {
        padding: 0 15px;
    }

    .quick-links-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        padding: 10px;
    }

    .quick-link {
        background-color: #fff;
        border-radius: 12px;
        padding: 25px 15px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .quick-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, var(--color1), var(--color2));
    }

    .quick-link .icon {
        margin-bottom: 15px;
        font-size: 2.5rem;
        transition: transform 0.3s;
    }

    .quick-link .icon i {
        color: var(--icon-color);
    }

    .quick-link p {
        font-size: 2.1rem;
        color: var(--dark);
        font-weight: 500;
        margin: 0;
        transition: color 0.3s;
    }

    .quick-link a {
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        height: 100%;
        color: inherit;
    }

    .quick-link:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    }

    .quick-link:hover .icon {
        transform: scale(1.1);
    }

    /* Color Themes */
    .quick-link.theme-1 {
        --color1: #0049B7;
        --color2: #00DDFF;
        --icon-color: #0049B7;
    }

    .quick-link.theme-2 {
        --color1: #ff1d58;
        --color2: #f75990;
        --icon-color: #ff1d58;
    }

    .quick-link.theme-3 {
        --color1: #9C4A70;
        --color2: #c86b98;
        --icon-color: #9C4A70;
    }

    .quick-link.theme-4 {
        --color1: #FF9800;
        --color2: #ffb74d;
        --icon-color: #FF9800;
    }

    .quick-link.theme-5 {
        --color1: #073045;
        --color2: #0d4d6b;
        --icon-color: #073045;
    }

    .quick-link.theme-6 {
        --color1: #FF7F50;
        --color2: #ff9e7d;
        --icon-color: #FF7F50;
    }

    .quick-link.theme-7 {
        --color1: #DE3163;
        --color2: #e86c8b;
        --icon-color: #DE3163;
    }

    .quick-link.theme-8 {
        --color1: #07a45d;
        --color2: #3dd88f;
        --icon-color: #07a45d;
    }

    .quick-link.theme-9 {
        --color1: #068392;
        --color2: #3db8c9;
        --icon-color: #068392;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .quick-links-container {
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .quick-links-container {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }
        
        .quick-link {
            padding: 20px 10px;
        }
        
        .quick-link .icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .quick-link p {
            font-size: 1.9rem;
        }
    }

    @media (max-width: 576px) {
        .quick-links-container {
            grid-template-columns: 1fr 1fr;
        }
        
        .content-header {
           
        }
        
        .header-icon {
            font-size: 24px;
        }
        
        .header-title h1 {
            font-size: 2.3rem;
        }
    }

    @media (max-width: 400px) {
        .quick-links-container {
            grid-template-columns: 1fr;
        }
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .quick-link {
        animation: fadeInUp 0.5s ease forwards;
        opacity: 0;
    }

    .quick-link:nth-child(1) { animation-delay: 0.1s; }
    .quick-link:nth-child(2) { animation-delay: 0.2s; }
    .quick-link:nth-child(3) { animation-delay: 0.3s; }
    .quick-link:nth-child(4) { animation-delay: 0.4s; }
    .quick-link:nth-child(5) { animation-delay: 0.5s; }
    .quick-link:nth-child(6) { animation-delay: 0.6s; }
    </style>


<style>
 /* ===== COLOR-PERFECT STYLES ===== */
.breaking-news {
  --primary-bg: #121212;         /* Deep base color */
  --gradient-start: #4f46e5;     /* Vibrant purple-blue */
  --gradient-mid: #db2777;       /* Energetic pink */
  --gradient-end: #f59e0b;       /* Warm amber */
  --text-color: rgba(255,255,255,0.95);
  --bullet-color: rgba(255,255,255,0.6);
  
  background: var(--primary-bg);
  padding: 0;
  font-family: 'Inter', -apple-system, sans-serif;
}

.ticker-wrap {
  width: 100%;
  overflow: hidden;
  background: linear-gradient(
    90deg,
    var(--gradient-start),
    var(--gradient-mid),
    var(--gradient-end)
  );
  color: var(--text-color);
  position: relative;
  box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
}

.ticker {
  display: inline-block;
  white-space: nowrap;
  padding: 14px 0;
  animation: ticker-scroll 25s linear infinite;
  will-change: transform;
}

.ticker-item {
  display: inline-flex;
  align-items: center;
  padding: 0 36px;
  color: var(--text-color) !important;
  text-decoration: none;
  font-weight: 600;
  font-size: 15px;
  letter-spacing: 0.25px;
  transition: opacity 0.2s ease;
}

.ticker-item:hover { opacity: 0.85; }

/* Modern bullet separator */
.ticker-item:not(:last-child)::after {
  content: "â€¢";
  margin-left: 36px;
  color: var(--bullet-color);
  font-weight: 300;
}

/* ===== ANIMATION ===== */
@keyframes ticker-scroll {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

/* ===== RESPONSIVE TWEAKS ===== */
@media (max-width: 768px) {
  .ticker-item { 
    padding: 0 24px;
    font-size: 14px;
  }
  .ticker-item:not(:last-child)::after { 
    margin-left: 24px; 
  }
}


/* Base Styles (Mobile) */
/* Base Styles */
.user-session-panel {
    background: #ffffff;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(0, 0, 0, 0.05);
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    max-width: 380px;
    margin: 0 auto;
    position: relative;
    overflow: hidden;
}

.user-session-panel::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(to bottom, #6366f1, #8b5cf6);
}

.welcome-message {
    color: #4b5563;
    font-size: 14px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.session-profile {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 20px;
}

.avatar i {
    font-size: 42px;
    color: #6366f1;
    background: #eef2ff;
    border-radius: 50%;
    padding: 5px;
    box-shadow: 0 2px 8px rgba(99, 102, 241, 0.15);
}

.user-details {
    flex: 1;
}

.user-name {
    font-weight: 600;
    color: #111827;
    font-size: 17px;
    margin-bottom: 3px;
    letter-spacing: 0.2px;
}

.user-phone {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #6b7280;
    font-size: 14px;
}

.user-phone i {
    color: #9ca3af;
    font-size: 12px;
}




/* Responsive Adjustments */
@media (max-width: 480px) {
    .user-session-panel {
        padding: 16px;
        border-radius: 12px;
    }
    
    .avatar i {
        font-size: 38px;
    }
    
    .user-name {
        font-size: 16px;
    }
    
  
}


</style>


<section class="breaking-news">
  <div class="ticker-wrap">
    <div class="ticker">
        <?php
        if(isset($allBreaking)){
            foreach($allBreaking as $breaking){

         
        ?>
 
      <a href="<?php echo $breaking->link; ?>" class="ticker-item">ðŸ“¢ <?php echo $breaking->title; ?></a>
      <?php
         }
        }
      ?>
 
    </div>
  </div>
</section>
    <section class="content">
        <div class="row">

        <div class="user-session-panel">
    <div class="welcome-message">Welcome back! ðŸ‘‹</div>
    
    <div class="session-profile">
        <div class="avatar">
            <i class="fa fa-user-circle"></i>
        </div>
        <div class="user-details">
            <div class="user-name"><?php echo $this->session->userdata('name'); ?></div>
            <div class="user-phone">
                <i class="fa fa-phone"></i>
                <?php echo $this->session->userdata('logger_contact'); ?>
            </div>
        </div>
    </div>
    
  
</div>


   











            <div class="col-sm-12">
                <div class="quick-links-container">
                    
                    
                    <div class="quick-link theme-2">
                        <a href="<?php echo base_url(); ?>customer/order/create?v=2">
                            <div class="icon">
                                <i class="fa fa-paw "></i>
                            </div>
                            <p>Veterinary   </p>
                        </a>
                    </div>
                    <div class="quick-link theme-3">
                        <a href="<?php echo base_url(); ?>customer/order/create?v=1">
                            <div class="icon">
                                <i class="fa fa-male"></i>
                            </div>
                            <p>Human </p>
                        </a>
                    </div>


                    <div class="quick-link theme-1">
                        <a href="<?php echo base_url(); ?>customer/order/create?v=3">
                            <div class="icon">
                                <i class="fa fa-pagelines"></i>
                            </div>
                            <p>Organic </p>
                        </a>
                    </div>
                    <div class="quick-link theme-1">
                        <a href="<?php echo base_url(); ?>customer/order/create?v=4">
                            <div class="icon">
                                <i class="fa fa-ticket"></i>
                            </div>
                            <p>Others </p>
                        </a>
                    </div>
                    <div class="quick-link theme-1">
                        <a href="<?php echo base_url(); ?>customer/order/create">
                            <div class="icon">
                                <i class="fa fa-plus-circle"></i>
                            </div>
                            <p>New Order</p>
                        </a>
                    </div>
                    <div class="quick-link theme-2">
                        <a href="<?php echo base_url(); ?>customer/order">
                            <div class="icon">
                                <i class="fa fa-list-ul"></i>
                            </div>
                            <p>Order List</p>
                        </a>
                    </div>

                    <div class="quick-link theme-3">
                        <a href="<?php echo base_url(); ?>customer/order/myorder">
                            <div class="icon">
                                <i class="fa fa-list"></i>
                            </div>
                            <p>My Orders</p>
                        </a>
                    </div>

                    <div class="quick-link theme-4">
                        <a href="<?php echo base_url(); ?>customer/profile/changepassword">
                            <div class="icon">
                                <i class="fa fa-key"></i>
                            </div>
                            <p>Change Password</p>
                        </a>
                    </div>

                    <!-- Additional quick links can be added here -->
                    <div class="quick-link theme-5">
                        <a href="#">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <p>Profile</p>
                        </a>
                    </div>

                    <div class="quick-link theme-6">
                        <a href="#">
                            <div class="icon">
                                <i class="fa fa-cog"></i>
                            </div>
                            <p>Settings</p>
                        </a>
                    </div>

                    <div class="quick-link theme-7">
                        <a href="#">
                            <div class="icon">
                                <i class="fa fa-question-circle"></i>
                            </div>
                            <p>Help</p>
                        </a>
                    </div>

                    <div class="quick-link theme-8">
                        <a href="<?php echo base_url(); ?>logout">
                            <div class="icon">
                                <i class="fa fa-sign-out"></i>
                            </div>
                            <p>Logout</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Add click effect to quick links
        document.querySelectorAll('.quick-link').forEach(link => {
            link.addEventListener('click', function() {
                this.style.transform = 'translateY(-2px) scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    </script>


