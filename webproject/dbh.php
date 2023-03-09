<?php

$servername = "localhost";
$ussername = "aruna";
$password = "123456";
$dbname = "destination";

$con = mysqli_connect($servername,$ussername,$password,$dbname);

if(!$con){
	die("connection failed:" .mysqli_connect_error());
}