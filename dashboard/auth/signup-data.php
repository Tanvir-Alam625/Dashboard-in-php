<?php
session_start();
require_once('../db_connect/db_connect.php');
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$Cpassword = htmlspecialchars($_POST['confirm-password']);
$hashed_password = sha1($password);
$flag = false;
$db_query_check = "SELECT COUNT(*) as 'result' FROM users WHERE Email='$email';";
$db_object_convert= mysqli_query($db_connect, $db_query_check);
$db_result = mysqli_fetch_assoc($db_object_convert);
// name field validation logic 
if($name){
	$whitespace_slice = str_replace(" ", "", $name);
	if(ctype_alpha($whitespace_slice)){
		if(str_word_count($name) > 3){
			$flag = true;
			$_SESSION['name_error'] = 'Please enter the short name!';
		}
	}else{
		$flag= true;
		$_SESSION['name_error'] = 'Name muste be String!';		
	}
}else{
	$flag= true;
	$_SESSION['name_error'] = 'Name field required!';
}

// email field validation logic
if($email){
	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		if($db_result['result']){
			$flag= true;
		    $_SESSION['email_error'] = 'Email Already Exists!';		
		}else{
			header('location: ./signin.php');
		}
	}else{
		$flag= true;
		$_SESSION['email_error'] = 'Invalid email!';
	}
}else{
	$flag= true;
	$_SESSION['email_error'] = 'Email field required!';
}

// password validation logic 
if($password){
	$pattern = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
	if(!preg_match($pattern, $password)) {
		$flag= true;
		$_SESSION['password_error'] = 'Password must be minimum 8 characters length. At list one decimal number, lower case, upper case, charecter, number!';
	}	
}else{
	$flag= true;
	$_SESSION['password_error'] = 'Password field required!';
}

// confirm password 
if($Cpassword){
	if($password !== $Cpassword){
		$flag= true;
		$_SESSION['Cpassword_error'] = 'Your password not match!';
	}
}else {
	$flag= true;
	$_SESSION['Cpassword_error'] = 'Confirm password field required!';
}
// redirect logic
if($flag){
	header('location:./signup.php');
	if($name){
		$_SESSION['name_value'] = $name;
	}
	if($email){
	$_SESSION['email_value'] = $email;	
	}
}else{

// DBS connection 
	$db_connect = mysqli_connect('localhost','root','','kufa');
	$db_query = "INSERT INTO `users` (Name, Email, Password) VALUES ('$name', '$email', '$hashed_password')";
	echo mysqli_query($db_connect, $db_query);
}
?>
