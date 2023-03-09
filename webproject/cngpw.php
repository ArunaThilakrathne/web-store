<?php

session_start();


$mysqli = new mysqli('localhost','aruna','123456','destination') or die($mysqli_error($mysqli));

$name="";
$prc="";
$idd = 0;

if(isset($_POST['update'])){
	
	
	
	$idd = $_POST['id'];
	$pass = $_POST['pass'];
	$newpass = $_POST['newpass'];
	
	if(empty($pass)||empty($newpass)){
		
		$_SESSION['message'] = "Fill all the fields";
		$_SESSION['msg_type'] = "warning";
		header("Location:profileS.php");
	}
	
	elseif($pass != $_SESSION['pass']){
		$_SESSION['message'] = "Wrong password!";
		$_SESSION['msg_type'] = "warning";
		header("Location:profileS.php");
		
	}
	else{
	$mysqli->query("UPDATE  users SET usersPwd='$newpass' WHERE usersPwd='$pass'") or die($mysqli->error);
	$_SESSION['pass'] = $_POST['newpass'];
	$_SESSION['message'] = "Updated!";
	$_SESSION['msg_type'] = "warning";
	header("Location:profileS.php");
	
	}
}





