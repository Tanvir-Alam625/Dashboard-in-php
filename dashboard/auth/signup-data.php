<?php
session_start();
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$Cpassword = htmlspecialchars($_POST['confirm-password']);

$flag = false;

// name field validation logic 
if($name){
	$whitespace_slice = str_replace(" ", "", $name);
	if(!ctype_alpha($whitespace_slice)){
		$_SESSION['name_value'] = $name;
		$flag= true;
		$_SESSION['name_error'] = 'Name must be String!';
	}else{
		echo $name;
	}
}else{
	$flag= true;
	$_SESSION['name_error'] = 'Name field required!';
}



// email field validation logic 
if($email){
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$_SESSION['email_value'] = $email;
		$flag= true;
		$_SESSION['email_error'] = 'Invalid email!';
	}else{
	echo $email;
	}

}else{
	$flag= true;
	$_SESSION['email_error'] = 'Email field required!';
}



if($flag){
	header('location:./signup.php');
	if($name){
		$_SESSION['name_value'] = $name;
	}
	if($email){
	$_SESSION['email_value'] = $email;	
	}
}
?>
