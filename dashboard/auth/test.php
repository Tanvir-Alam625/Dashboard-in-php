<?php 
session_start();
$name = htmlspecialchars($_POST['name']);
$flag= false;
// words count validation first 
if($name){
	// words count validation, 1
	if(str_word_count($name) > 3){
		$flag = true;
		$_SESSION['name_error'] = 'Please enter the short name!';
	}


	// words capitalize validation, 2
	elseif ($name !== ucwords($name, " ")) {
		$flag = true;
		$_SESSION['name_error'] = 'Please enter the capitalize words!';
	}


	// first letter capital, 3 
	elseif ($name!== ucfirst($name)) {
		$flag = true;
		$_SESSION['name_error'] = 'Please enter the first letter capital!';
	}

	// all upper or  case validation   strtoupper, strtolower
	elseif($name !== strtoupper($name)){
			$flag = true;
		$_SESSION['name_error'] = 'Please enter the first letter capital!';
	}
} 
// redirect previous page 
if($flag){
	header('location: ./signup.php');
}



?>
