<?php
session_start();
?>


<!doctype html>



<html>
<head>
<meta charset="utf-8">
<title>adduser</title>
	<link href="login.css" type="text/css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
	<div>
	<nav class="navbar-fixed-top" style="background-image: url(images/s-l1600.jpg);border: solid 1px #6A6A6A">
	  
		  
		  
		  <?php
		  //$_SESSION["username"] = "admin";
		  if(!isset($_SESSION['username'])){
			 header("Location:login.php");
		  }
		
		 ?>
	
		
	
		
		
		
		
		
		  <a href="home.php"  style="font-size: 20px;font-weight: 200;color: white;font-family: impact;;padding: 10px;float:left;">Home</a>
		  <a href="adduser.php" class="nav-link active" style="font-size: 20px;font-weight: 200;color: white;font-family: impact;padding: 10px;float:left;">Add User</a>
		  <a href="profileS.php" class="nav-link " style="font-size: 20px;font-weight: 200;color: white;font-family: impact;padding: 10px;float:left;">Profile settings</a>
		 <a href="logout.php" class="nav-link " style="font-size: 20px;font-weight: 200;color: white;font-family: impact;float: right;display: flex;padding: 10px;">LOGOUT</a>
		 	</div>
		  
	
		  
	  </div>
			
		   
	  <center>
	  <form action="cngpw.php" method="POST" style="padding-top: 250px">
		
		  <input type="hidden" name="id">
		  
		  <div class="form-group">
		  <input type="password" name="pass" placeholder="Current password" class="form-control"  style="width: 500px;">
			  </div>
		  <div class="form-group">
		  <input type="password" name="newpass" placeholder="New password" class="form-control"  style="width: 500px;">
			  </div>
		  <div class="form-group">
		  <button type="submit" name="update" class="btn btn-primary" style="font-family: 'Brain Flower'">Update</button>
		  </div>
		  
		  <?php
		 
		  
		  
		  
	if(isset($_GET["error"])){
		if($_GET["error"] == "emptyinput"){
			echo"<P style='color: aliceblue'>Fill in all fields</p>";
		}
		elseif($_GET["error"] == "invaliduid"){
			echo"<P style='color: aliceblue'>Please enter valid username</p>";
		}
		elseif($_GET["error"] == "invalidemail"){
			echo"<P style='color: aliceblue'>Please enter valid Email</p>";
		}
		elseif($_GET["error"] == "didintmatch"){
			echo"<P style='color: aliceblue'>Passwords didn't match try again</p>";
		}
		
		elseif($_GET["error"] == "Username taken"){
			echo"<P style='color: aliceblue'>The username allready exists</p>";
		}
		elseif($_GET["error"] == "none"){
			echo"<P style='color: aliceblue'>User added! </p>";
		}
	}
			
		?>	
				  <?php
	
	if(isset($_SESSION['message'])):
	?>
	  <div class="alert alert-<?$_SESSION['msg_type']?>"> 
		  
		  <?php
		  echo $_SESSION['message'];
	  		unset($_SESSION['message']);
	  
		  ?>
	  </div>
	  <?php endif ?>  
	  </form>
	
</body>
</html>