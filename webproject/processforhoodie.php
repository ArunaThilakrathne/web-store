<?php

session_start();


$mysqli = new mysqli('localhost','aruna','123456','destination') or die($mysqli_error($mysqli));

$name="";
$prc="";
$idd = 0;

if(isset($_POST['save'])){
	$title = $_POST['name'];
	$prc = $_POST['price'];
	
	


}

if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM hoodie WHERE idgallery=$id") or die($mysqli->error);
	
	$_SESSION['message'] = "Record Has Been Deleted!";
	$_SESSION['msg_type'] = "danger";
	header("Location:hoodieprice.php");
	
	 
}

if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$result = $mysqli->query("SELECT * FROM hoodie WHERE idgallery=$id") or die($mysqli->error);
	if(count($result)==1){
		$row = $result->fetch_array();
		$idd = $row['idgallery'];
		$name = $row['titlegallery'];
		$prc = $row['descgallery'];
		
		
	}
	
	
}

if(isset($_POST['update'])){
	$idd = $_POST['id'];
	$name = $_POST['name'];
	$prc = $_POST['price'];
	
	$mysqli->query("UPDATE  hoodie SET titlegallery='$name',descgallery ='$prc' WHERE idgallery=$idd") or die($mysqli->error);
	
	$_SESSION['message'] = "Record Has Been Updated!";
	$_SESSION['msg_type'] = "warning";
	header("Location:hoodieprice.php");
	
}
