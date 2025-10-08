<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

        <?php foreach ($css as $css_file): ?>
            <link rel="stylesheet" href="<?php echo $css_file; ?>" type="text/css" />
        <?php endforeach; ?>

</head>
<style>



  </style>
<body>

    <div class="registration-container">
        <div class="registration-box">
            <!-- <img src="<?php echo base_url(); ?>static/assets/images/logo.png" alt="Rodasi IT Logo" class="logo"> -->
            <h4 class="text-reg"><a href="<?php echo base_url(); ?>" >Create an Account</a></h4>
            <form id="registrationForm" method="POST">
            <?php  $error =  $this->session->userdata('error'); 
              if($error){
              
              ?>
                <h4 class="login-box-msg" ><p >  <?php echo $this->session->userdata('error'); ?></p></h4>
          
                <?php
              $this->session->unset_userdata('error'); 
                                    
              }
                ?>
                 <div id="successMessage" class="success-message" style="display:none;">
              <span id="successText"></span>
                    </div>
     

       <div class="input-field">
                    <label for="name"><?php echo display('name') ?></label>
                    <input type="text" required=""  id="name" name="name" placeholder="<?php echo display('name') ?>" value="<?php echo set_value('name'); ?>" >
                    <span class="help-block small"><?php echo form_error('name'); ?></span>
                  </div>
                <div class="input-field">
                      
                    <label for="username"><?php echo display('mobile_no') ?> <span class="common"> *</span> (<?php echo display('username') ?>)</label>
                    <!-- Custom error message box -->
                    <div id="errorMessage" class="error-message" style="display:none;">
                  <span id="errorText"></span>
              </div>
             
                    <input type="text" required=""  id="username" name="username" placeholder="<?php echo display('mobile_no') ?>" value="<?php echo set_value('username'); ?>" >
                    <span class="help-block small"><?php echo form_error('username'); ?></span>
                  </div>
              
                
                  <div class="input-field">
                    <label for="email"><?php echo display('email') ?></label>
                    <input type="email"   id="email" name="email" placeholder="<?php echo display('email') ?>" value="<?php echo set_value('email'); ?>" >
                    <span class="help-block small"><?php echo form_error('email'); ?></span>
                  </div>
                <div class="input-field">
                    <label for="password"><?php echo display('password') ?><span class="common"> *</span></label>
                    <input type="password" required="" name="password" id="password" placeholder="****" class="form-control">
                    <span class="help-block small"><?php echo form_error('password'); ?></span>
                </div>
                <div class="input-field" id="otp_show" style="display:none;">
                    <label for="otp">OTP </label>
                    <input type="text"   id="otp" name="otp" placeholder="<?php echo display('otp') ?>" value="<?php echo set_value('otp'); ?>" >
                    <span class="help-block small"><?php echo form_error('otp'); ?></span>
                  </div>

                   <!-- Countdown display section -->
                <div id="otpCountdown" style="display:none; margin-top: 10px;">
                    <p>Resend OTP in <span id="countdownTimer">5:00</span></p>
                </div>
                <div class="options">
                    <!-- <label><input type="checkbox" name="remember"> Remember</label> -->
                    <a href="<?php echo base_url(); ?>login">Already have an Account ?</a>
                </div>
             
                 
                 <button type="button" id="sendOtpBtn" class="send-otp-btn">Send OTP</button>
             
                <button type="submit" id="submitBtn" style="display:none;" class="login-btn">Register</button>
            </form>
            <footer>
            <p>Software by: <span><a href="https://www.labibait.com" target="_blank">» Master IT</a></span></p>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

    <script>
        var otpTimer; // Variable to hold the timer
        var otpTimeout = 5 * 60 * 1000; // 5 minutes in milliseconds

        $("#sendOtpBtn").click(function(e) {
            e.preventDefault();
            
            var phone = $("#username").val();

            if (phone == '') {
                showErrorMessage("Please enter a phone number.");
                return;
            }

            var phoneRegex = /^(?:\+880|880|0)(1[3-9])\d{8}$/;

            if (!phoneRegex.test(phone)) {
                showErrorMessage("Please enter a valid Bangladeshi mobile number.");
                return;
            }

            $("#errorMessage").fadeOut();  

            $.ajax({
                url: '<?php echo base_url('authentication/registration/send_otp'); ?>',
                method: 'POST',
                data: { phone: phone },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        showSuccessMessage("OTP has been sent successfully!");
                        $("#submitBtn").show(); 
                        $("#otp_show").show(); 
                        $("#sendOtpBtn").hide();
                        startOtpTimer();  // Start the OTP timer
                    } else {
                        alert('Error sending OTP');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        });

        // Function to start the OTP timer and update the countdown on the page
        function startOtpTimer() {
            var countdownTime = otpTimeout / 1000; // Convert milliseconds to seconds
            var countdownInterval = setInterval(function() {
                countdownTime--;
                var minutes = Math.floor(countdownTime / 60);
                var seconds = countdownTime % 60;
                var formattedTime = minutes + ":" + (seconds < 10 ? "0" : "") + seconds;

                // Display the remaining time on the page
                $("#countdownTimer").text(formattedTime);
                $("#otpCountdown").show(); // Show the countdown section

                // If time is up, enable the resend button
                if (countdownTime <= 0) {
                    clearInterval(countdownInterval);  // Stop the countdown
                    $("#sendOtpBtn").text("Send OTP");
                    $("#sendOtpBtn").show();  // Show the button again
                    $("#otpCountdown").hide(); // Hide the countdown section
                    $("#submitBtn").hide(); 
                }
            }, 1000);  // Update the countdown every second
        }

        function showErrorMessage(message) {
            $("#errorText").text(message);  
            $("#errorMessage").fadeIn();  
        }

        function showSuccessMessage(message) {
            $("#successText").text(message); 
            $("#successMessage").fadeIn(); 
        }
    </script>