<?php
require_once('../includes/header.php');
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

<form action="./signup-data.php" method="post">
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
		if(isset($_SESSION['name_value'])){
			?>
			<p class="text-danger"><?= $_SESSION['name_value']?></p>
			<?php
		}
		unset($_SESSION['name_value']);

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
		<input type="password" name="password" class="form-control" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
		<div id="emailHelp" class="form-text m-b-md">Password must be minimum 8 characters length*</div>

		<label for="signUpPassword" class="form-label">Confirm Password</label>
		<input type="password" name="confirm-password" class="form-control" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
</div>

<div class="auth-submit">
<button type="submit" class="btn btn-primary">Sign Up</button>
</div>
</form>
<div class="divider"></div>
</div>
</div>
<?php
require_once('../includes/footer.php');
?>
