<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (($this->session->userdata('loggedin'))) {
	if ($this->session->userdata('user_type') === 'user') {
		redirect("profile");
		exit;
	} elseif ($this->session->userdata('user_type') === 'admin') {
		redirect("adminprofile");
		exit;
	}
} ?>
<!DOCTYPE html>
<html>

<head>
	<title>Marking</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/brand/favicon.png" type="image/png" />
</head>

<body>
	<img class="wave" src="<?php echo base_url(); ?>assets/login/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="<?php echo base_url(); ?>assets/login/img/bg.svg">
		</div>
		<div class="login-content">
			<?php echo form_open('Login/userLogin'); ?>
			<img src="<?php echo base_url(); ?>assets/login/img/avatar.svg">
			<h2 class="title">Welcome</h2>
			<div class="input-div one">
				<div class="i">
					<i class="fas fa-user"></i>
				</div>
				<div class="div">
					<h5>Username</h5>
					<input type="text" class="input" name='uname'>
				</div>
			</div>
			<div class="input-div pass">
				<div class="i">
					<i class="fas fa-lock"></i>
				</div>
				<div class="div">
					<h5>Password</h5>
					<input type="password" class="input" name='pwd'>
				</div>
			</div>
			<a href="#">Forgot Password?</a>
			<input type="submit" class="btn" value="Login">
			<br>
			<?php if ($this->session->flashdata('msg')) {
				echo "<span style='font-family: Coronetscript, cursive; color:red;'>" . $this->session->flashdata('msg') . "</span>";
			} ?>
			<span style="font-family: Coronetscript, cursive; color:red;"><?php echo validation_errors(); ?></span>
			<h1>Dummy Accounts</h1>
			<h3>Admin</h3>
			<h5>UN:tharuka, PW:Password@123</h5>
			<h3>User</h3>
			<h5>UN:2111001, PW:2111001</h5>
			<?php echo form_close(); ?>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/login/js/main.js"></script>
	<script src="https://kit.fontawesome.com/6d41dc11d3.js" crossorigin="anonymous"></script>
</body>

</html>