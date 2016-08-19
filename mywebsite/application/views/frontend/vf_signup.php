
<div class="signup-wrapper">
    <div class="flow-start">
        <div class="embossed-box">
            <div class="error-alert">
                <?php echo validation_errors(); ?>    
            </div>
            <div class="signup-form-container">
                <div class="header">
                    <h2>
                        Sign up
                    </h2>

                    <p class="subheading">
                        Connect with great local businesses
                    </p>
                </div>

                <form action="" class="frmSignUp" method="post">
                    <label class="placeholder-sub">Account</label>
                    <input id="account" name="txtAccount" autofocus placeholder="Account"  type="text" value="<?php echo set_value('txtAccount'); ?>">
                    <label class="placeholder-sub">Password</label>
                    <input id="password" name="txtPass" placeholder="Password"  type="password" value="">
                    <label class="placeholder-sub">Confirm Password</label>
                    <input id="cf_pass" name="cf_pass" placeholder="Confirm Password"  type="password" value="">

                    <button id="signup-button" type="submit" value="Sign Up">
                        <span>Sign Up</span>
                    </button>
                </form>
            </div>
            <div class="sub-text-box">
                <p>Already Have An Account? <a class="login-link" href="<?php echo base_url(); ?>index.php/login">Log in</a></p>
            </div>
        </div>
    </div>
</div> <!-- end signup -->

<div class="picture-container">
    <img src="https://s3-media4.ak.yelpcdn.com/assets/2/www/img/1e82406ff345/signup/signup_illustration.png">
</div>