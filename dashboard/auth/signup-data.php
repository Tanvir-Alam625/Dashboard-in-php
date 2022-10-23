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
	if(ctype_alpha($whitespace_slice)){
		if(str_word_count($name) < 4){
			echo $name;
		}else{
			$_SESSION['name_value'] = $name;
			$flag= true;
			$_SESSION['name_error'] = 'Please enter the short name!';
		}
	}else{
		$_SESSION['name_value'] = $name;
		$flag= true;
		$_SESSION['name_error'] = 'Name must be String!';		
	}
}else{
	$flag= true;
	$_SESSION['name_error'] = 'Name field required!';
}



// email field validation logic 
if($email){
	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo $email;
	}else{
		$_SESSION['email_value'] = $email;
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
	if(preg_match($pattern, $password)) {
		echo "ok";
	}else{
		$flag= true;
		$_SESSION['password_error'] = 'Password must be minimum 8 characters length. At list one decimal number, lower case, upper case, charecter, number!';
	}
}else{
	$flag= true;
	$_SESSION['password_error'] = 'Password field required!';
}

// confirm password 
if($password !== $Cpassword){
	$flag= true;
	$_SESSION['Cpassword_error'] = 'Your password not match!';
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
}
?>
