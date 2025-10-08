<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Administrator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    :root {
        --primary: #6c5ce7;
        --secondary: #00b894;
        --accent: #fd79a8;
        --dark: #2d3436;
        --light: #f5f6fa;
        --gradient-1: hsl(45, 99%, 61%);
        --gradient-2: hsl(225, 99%, 61%);
        --error: #d63031;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        -webkit-tap-highlight-color: transparent;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        background: linear-gradient(45deg, var(--gradient-1), var(--gradient-2));
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
        position: fixed;
        width: 100%;
        height: 100%;
        overflow: hidden;
        touch-action: manipulation;
    }

    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1;
    }

    .login-container {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 100%;
        animation: fadeIn 0.8s ease-out;
        padding: 0 20px;
    }

    .login-box {
        background-color: rgba(34, 34, 34, 0.95);
        padding: 30px 25px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        width: 100%;
        text-align: center;
        color: #fff;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.1);
        max-width: 400px;
        margin: 0 auto;
    }

    .logo {
        width: 70px;
        height: 70px;
        margin-bottom: 15px;
        object-fit: contain;
    }

    h1.text-content {
        margin: 15px 0 25px;
        font-size: 1.8rem;
    }

    .text-content a {
        background: linear-gradient(45deg, var(--gradient-1), var(--gradient-2));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 1.8rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
    }

    .input-field {
        margin-bottom: 15px;
        text-align: left;
        position: relative;
    }

    .input-field label {
        display: block;
        margin-bottom: 8px;
        color: #fff;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .input-field input {
        width: 100%;
        padding: 14px 15px;
        border: 2px solid rgba(255,255,255,0.1);
        border-radius: 10px;
        background-color: rgba(51, 51, 51, 0.8);
        color: #fff;
        font-size: 1rem;
        transition: all 0.2s;
        -webkit-appearance: none;
    }

    .input-field input:focus {
        border-color: var(--gradient-2);
        background-color: rgba(51, 51, 51, 1);
        outline: none;
    }

    .input-field i {
        position: absolute;
        right: 15px;
        top: 42px;
        color: #999;
        font-size: 0.9rem;
    }

    .options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }

    .options label {
        display: flex;
        align-items: center;
        color: #ccc;
        cursor: pointer;
    }

    .options input[type="checkbox"] {
        margin-right: 8px;
        width: 16px;
        height: 16px;
    }

    .options a {
        color: var(--gradient-2);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.2s;
    }

    .login-btn {
        width: 100%;
        padding: 15px;
        background: linear-gradient(45deg, var(--gradient-1), var(--gradient-2));
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .login-btn:active {
        transform: scale(0.98);
    }

    footer {
        margin-top: 25px;
        font-size: 0.85rem;
        color: #ccc;
    }

    footer a {
        color: var(--gradient-2);
        text-decoration: none;
        font-weight: 500;
    }

    #errorText {
        color: var(--error);
        margin-bottom: 15px;
        font-weight: 500;
        font-size: 0.9rem;
        display: none;
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Particles for mobile */
    .particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .particle {
        position: absolute;
        background: rgba(255,255,255,0.4);
        border-radius: 50%;
        animation: float 6s infinite ease-in-out;
    }

    /* Mobile-specific adjustments */
    @media (max-width: 480px) {
        .login-box {
            padding: 25px 20px;
            border-radius: 14px;
        }
        
        .input-field input {
            padding: 12px 15px;
            font-size: 0.95rem;
        }
        
        .login-btn {
            padding: 14px;
        }
        
        .options {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
    }

    /* iOS input zoom fix */
    @media screen and (-webkit-min-device-pixel-ratio:0) {
        input,
        textarea {
            font-size: 16px !important;
        }
    }
    </style>
</head>
<body>
    <div class="particles" id="particles"></div>

    <div class="login-container">
        <div class="login-box">
        
            
            <h1 class="text-content">Welcome Back</h1>
            
            <div id="errorText"></div>
            <?php  $error =  $this->session->userdata('error'); 
            if($error){
            
            ?>
            <h4 class="login-box-msg" ><p >  <?php echo $this->session->userdata('error'); ?></p></h4>
        
            <?php
            $this->session->unset_userdata('error'); 
                                
            }
      ?>

        <?php  $success =  $this->session->userdata('success'); 
            if($success){
            
            ?>
            <h4 class="login-box-msg" ><p >  <?php echo $this->session->userdata('success'); ?></p></h4>
        
            <?php
            $this->session->unset_userdata('success'); 
                                
            }
      ?>
            <form action="<?php echo base_url(); ?>authentication" method="post" id="loginForm">
                <div class="input-field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" autocapitalize="none" required autocomplete="username">
                    <i class="fas fa-user"></i>
                </div>
                
                <div class="input-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="current-password" required>
                    <i class="fas fa-lock"></i>
                </div>
                
                <div class="options">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    <a href="#" id="forgotPassword">Forgot password?</a>
                </div>
                
                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </form>
            
            <!-- <div class="social-login">
                <p style="color: #ccc; margin-bottom: 15px;">Or login with</p>
                <div style="display: flex; justify-content: center; gap: 15px;">
                    <button style="background: #4267B2; border: none; width: 40px; height: 40px; border-radius: 50%; color: white; font-size: 1.1rem;">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button style="background: #DB4437; border: none; width: 40px; height: 40px; border-radius: 50%; color: white; font-size: 1.1rem;">
                        <i class="fab fa-google"></i>
                    </button>
                    <button style="background: #000; border: none; width: 40px; height: 40px; border-radius: 50%; color: white; font-size: 1.1rem;">
                        <i class="fab fa-apple"></i>
                    </button>
                </div>
            </div> -->
            
            <footer>
                <p>Don't have an account? <a href="<?php echo base_url(); ?>registration" id="signUp">Sign up</a></p>
            </footer>
        </div>
    </div>

    <script>
    // Mobile-friendly particles
    function createParticles() {
        const container = document.getElementById('particles');
        const count = Math.min(15, Math.floor(window.innerWidth / 20));
        
        for (let i = 0; i < count; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            
            const size = Math.random() * 4 + 2;
            const posX = Math.random() * 100;
            const posY = Math.random() * 100;
            const delay = Math.random() * 5;
            const duration = Math.random() * 3 + 3;
            const opacity = Math.random() * 0.4 + 0.1;
            
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${posX}%`;
            particle.style.top = `${posY}%`;
            particle.style.animationDelay = `${delay}s`;
            particle.style.animationDuration = `${duration}s`;
            particle.style.opacity = opacity;
            
            container.appendChild(particle);
        }
    }
    
    // Form validation with better mobile UX

    
    // Simulate login with loading state
    function simulateLogin(username, password) {
        const btn = document.querySelector('.login-btn');
        const originalText = btn.innerHTML;
        
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Logging in...';
        
        // Simulate API call delay
        setTimeout(() => {
            // This is just a demo - replace with actual login logic
            if (username === 'demo' && password === 'demo') {
                // Successful login
                btn.innerHTML = '<i class="fas fa-check"></i> Success!';
                setTimeout(() => {
                    // Redirect to app
                    window.location.href = 'dashboard.html';
                }, 800);
            } else {
                // Failed login
                btn.disabled = false;
                btn.innerHTML = originalText;
                document.getElementById('errorText').textContent = 'Invalid username or password';
                document.getElementById('errorText').style.display = 'block';
            }
        }, 1500);
    }
    
    // Initialize on load
    window.addEventListener('load', function() {
        createParticles();
        
        // Prevent zoom on input focus on mobile
        document.addEventListener('touchstart', function(e) {
            if (e.target.tagName === 'INPUT') {
                window.scrollTo(0, 0);
                document.body.style.zoom = "1";
            }
        }, false);
    });
    
    // Handle viewport resize
    window.addEventListener('resize', function() {
        const particles = document.getElementById('particles');
        particles.innerHTML = '';
        createParticles();
    });
    </script>
</body>
</html>