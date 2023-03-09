<?php



if(isset($_POST["submit"])){
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];
	
	require_once'dbh.php';
	require_once'functions.php';
	
	
	if(emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat) !== false){
		header("Location:adduser.php?error=emptyinput");
		exit();
	}
	
	if(invalidUid($username) !== false){
		header("Location:adduser.php?error=invaliduid");
		exit();
	}
	if(invalidEmail($email) !== false){
		header("Location:adduser.php?error=invalidemail");
		exit();
	}
	if(pwdMatch($pwd,$pwdRepeat) !== false){
		header("Location:adduser.php?error=didintmatch");
		exit();
	}
	if(uidExists($con,$username,$email) !== false){
		header("Location:adduser.php?error=Username taken");
		exit();
	}
	
	createUser($con,$name,$email,$username,$pwd);
	
}

else{
	header("Location:adduser.php");
	exit();
}


