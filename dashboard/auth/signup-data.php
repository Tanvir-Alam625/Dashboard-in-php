<?php
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$Cpassword = $_POST['confirm-password'];

$flag = false;
if($name){
	$whitespace_slice = str_replace(" ", "", $name);
if(ctype_alpha($whitespace_slice)){
	echo $name;
}else{
	$flag= true;
	$_SESSION['name_error'] = 'name must be String!';
}	

}else{
	$flag= true;
	$_SESSION['name_error'] = 'name field required!';
	
}
if($flag){
	header('location:./signup.php');
}
?>
