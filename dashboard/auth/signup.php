<?php
require_once('./includes/header.php');
session_start();
?>

<div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
<div class="app-auth-background">

</div>
<div class="app-auth-container">
<div class="logo">
<a href="index.html">Neptune</a>
</div>
<p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="signin.php">Sign In</a></p>

<form action="./signup-data.php" method="post" autocomplete="on">
	<div class="auth-credentials m-b-xxl">
		<label for="signUpUsername" class="form-label">Name</label>
		<input name="name" type="text" 
		<?php 
		if(isset($_SESSION['name_value'])){
			?>
			value="<?=$_SESSION['name_value']?> "
			<?php
		}
		unset($_SESSION['name_value']);
		 ?>
		class="form-control m-b-md <?=isset($_SESSION['name_error']) ? 'is-invalid': ''?>"
		 id="signUpUsername" aria-describedby="signUpUsername" placeholder="Enter Name">
		<!-- name error Message  -->
		<?php
		if(isset($_SESSION['name_error'])){
			?>
			<p class="text-danger"><?= $_SESSION['name_error']?></p>
			<?php
		}
		unset($_SESSION['name_error']);

		?>
		<label for="signUpEmail" class="form-label">Email address</label>
		<input type="text"
		<?php 
		if(isset($_SESSION['email_value'])){
			?>
			value="<?=$_SESSION['email_value']?> "
			<?php
		}
		unset($_SESSION['email_value']);
		 ?>
		 name="email"
		 class="form-control m-b-md <?=isset($_SESSION['email_error']) ? 'is-invalid': ''?>"
		  id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com">
		  <!-- email error message  -->
		 <?php
		if(isset($_SESSION['email_error'])){
			?>
			<p class="text-danger"><?= $_SESSION['email_error']?></p>
			<?php
		}
		unset($_SESSION['email_error']);

		?>
		<label for="signUpPassword"  class="form-label">Password</label>
		<input type="password" name="password"
		autoco
		onclick="getShowPassword()" onblur="getHidePassword()"
		show-hide="password"
		id="signUpPassword" class="form-control m-b-md <?=isset($_SESSION['password_error']) ? 'is-invalid': ''?>"
		  aria-describedby="signUpPassword" >
		<!-- password error message  -->
		 <?php
		if(isset($_SESSION['password_error'])){
			?>
			<p class="text-danger"><?= $_SESSION['password_error']?></p>
			<?php
		}
		unset($_SESSION['password_error']);

		?>

		<label for="signUpPassword" class="form-label">Confirm Password</label>
		<input type="password" name="confirm-password"
		show-hide="password"
		onclick="getShowPassword()" onblur="getHidePassword()"
		 class="form-control m-b-md <?=isset($_SESSION['Cpassword_error']) ? 'is-invalid': ''?>"

		 id="signUpPassword" aria-describedby="signUpPassword" >
		<?php
		if(isset($_SESSION['Cpassword_error'])){
			?>
			<p class="text-danger"><?= $_SESSION['Cpassword_error']?></p>
			<?php
		}
		unset($_SESSION['Cpassword_error']);

		?>
</div>

<div class="auth-submit">
<button type="submit" class="btn btn-primary">Sign Up</button>
</div>
</form>
<!-- this is script tags -->
<script>
	const passcode = document.querySelectorAll('[show-hide="password"]');
	function getHidePassword(){
		passcode[0].type= 'password';
		passcode[1].type= 'password';
	}
	function getShowPassword(){
		passcode[0].type= 'text';
		passcode[1].type= 'text';
	}
</script>
<div class="divider"></div>
</div>
</div>
<?php
require_once('./includes/footer.php');
?>
