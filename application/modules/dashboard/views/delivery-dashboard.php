<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Links</title>

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
</head>
<body>
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-rocket"></i>
        </div>
        <div class="header-title">
            <h1>Quick Links</h1>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="quick-links-container">
                    

                    <div class="quick-link theme-2">
                        <a href="<?php echo base_url(); ?>sales/delivery/pending">
                            <div class="icon">
                                <i class="fa fa-list-ul"></i>
                            </div>
                            <p>Pending Delivery List</p>
                        </a>
                    </div>

                    <div class="quick-link theme-3">
                        <a href="<?php echo base_url(); ?>sales/delivery">
                            <div class="icon">
                                <i class="fa fa-list"></i>
                            </div>
                            <p>All List</p>
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
</body>
</html>