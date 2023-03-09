<?php

 function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){
	$result;
	 if(empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdRepeat)){
		 
		 $result = true;
	 }
	else{
		$result = false;
	}
	 return $result;
}

 function invalidUid($username){
	$result;
	 if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
		 
		 $result = true;
	 }
	else{
		$result = false;
	}
	 return $result;
}

function invalidEmail($email){
	$result;
	 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		 
		 $result = true;
	 }
	else{
		$result = false;
	}
	 return $result;
}

function pwdMatch($pwd,$pwdRepeat){
	$result;
	 if($pwd !== $pwdRepeat){
		 
		 $result = true;
	 }
	else{
		$result = false;
	}
	 return $result;
}

function uidExists($con,$username,$email){
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($con);
	
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location:adduser.php?error=sqlerror");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt,"ss",$username,$email);
	
	mysqli_stmt_execute($stmt);
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if($row = mysqli_fetch_assoc($resultData)){
		return $row;
		
	}
	else{
		$result=false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
	
}


function createUser($con,$name,$email,$username,$pwd){
	$sql = "INSERT INTO users (usersName,usersEmail,usersUid,usersPwd) VALUES (?,?,?,?);";
	$stmt = mysqli_stmt_init($con);
	
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location:adduser.php?error=sqlerror");
		exit();
	}
	
	
	
	mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$pwd);
	print_r($username);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("Location:adduser.php?error=none");
	exit();
	
}

function emptyInputLogin($username,$pwd){
	$result;
	 if(empty($username)||empty($pwd)){
		 
		 $result = true;
	 }
	else{
		$result = false;
	}
	 return $result;
}

function loginUser($con,$username,$pwd){
	$uifExists =  uidExists($con,$username,$username);
	
	if($uifExists  === false){
		header("Location:login.php?error=wrong");
		exit();
	}
	
	$ppwd = $uifExists['usersPwd'];
	//$chesckPwd = password_verify($pwd,$ppwd);
	
	if($ppwd != $pwd){
		header("Location:login.php?error=wrongpassword");
		exit();
	}
	else{
		session_start();
		$_SESSION['username'] = $_POST['name'];
		$_SESSION['pass'] = $_POST['pwd'];
		header("Location:index.php");
	}
}
	



