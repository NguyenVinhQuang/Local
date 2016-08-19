<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style_login.css">
<div class="column column-alpha">
	<form action="" method="post" id="login-form">
		<div class="alert">
			<?php 
				if ( ( $this->session->flashdata('login_error') ) ){
					echo 'Bạn đã nhập sai username hoặc password';
				}
				else{
			 		echo validation_errors() ;
			 	}
			 ?>
		</div>
		<h2>Log In</h2>
		<p>Please enter your Account and Password to log in.</p>
		<p>
			<label for="">Account</label>
			<input type="text" name="txtAccount" autofocus id="txtAccount" value="<?php echo set_value('txtAccount'); ?>">
		</p>
		<p>
			<label for="">Password</label>
			<input type="password" name="txtPass" id="txtPass">
		</p>
		<p class="alignright">
			<button class="ybtn ybtn-secondary ybtn-small" type="submit"> 
				<span>Log In</span>
			</button>
		</p>
	</form>
</div>
<div class="column column-beta">
	<div id="login-to-signup">
		<h2>No Account Yet?</h2>
		<p>That's okay, we still love you.</p>
		<a href="<?php echo base_url(); ?>index.php/signup" id="sign-up" class="ybtn ybtn-primary ybtn-large">Sign Up</a>
		<p>
			Yelp is the fun and easy way to find, review and talk about what's great - and not so great - in your local area. It's about real people giving their honest and personal opinions on everything from restaurants and spas to coffee shops and bars.
		</p>
	</div>
</div>