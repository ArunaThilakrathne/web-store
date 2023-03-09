<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>hoodieprice</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
  </head>
  <body background="images/448001.jpg">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.3.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>
	  <nav class="navbar-fixed-top" style="background-image: url(images/448001.jpg);border: solid 1px #6A6A6A">
	  
		
			 
		  <a href="home.php" class="navbar-brand" style="font-family: 'Brain Flower';font-size: 50px;font-weight: 1000;color: white;">RadiKult</a>
			 
		  <a href="shoeprice.php" class="nav-link" style="font-size: 20px;font-weight: 200;color: white;font-family: impact;;padding: 10px;float:left;">Footware details</a>
		  <a href="shirtprice.php" class="nav-link active" style="font-size: 20px;font-weight: 200;color: white;font-family: impact;padding: 10px;float:left;">Tshirt details</a>
		  <a href="hoodieprice.php" class="nav-link " style="font-size: 20px;font-weight: 200;color: white;font-family: impact;padding: 10px;float:left;">Hoodie deatils</a>
		  
		 
		 <a href="logout.php" class="nav-link " style="font-size: 20px;font-weight: 200;color: white;font-family: impact;float: right;display: flex;padding: 10px;">LOGOUT</a>
		 
		 <a href="adduser.php" class="nav-link " style="font-size: 20px;font-weight: 200;color: white;font-family: impact;float: right;display: flex;padding: 10px;">Account Settings</a>
			
	  </nav>
	
	  
	  
	  
	
	  <?php require_once 'processforshirt.php';?>
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
	  
	  
	  
	  <?php
	if(!isset($_SESSION['username'])){
			
	
		
	
		header("Location:login.php");
	  
	} 
	  if(!isset($_POST['search'])){
	  $mysqli = new mysqli('localhost','aruna','123456','destination') or die(mysqli_error($mysqli));
	  
	  $result = $mysqli->query("SELECT * FROM shirt") or die($mysqli->error);
	}
	  
	  else {
		 $src = $_POST['srct'];
	  $mysqli = new mysqli('localhost','aruna','123456','destination') or die(mysqli_error($mysqli));
	  
	  $result = $mysqli->query("SELECT * FROM shirt WHERE titlegallery LIKE '$src%'") or die($mysqli->error);
	  }
	?>
	  
	  <div><center>
	  <table class="table" style="width: 75%; margin-top: 140px;">
		  
		  <thead>
		  <tr>
			  
			  <th style="color: aliceblue">Name</th>
			  <th style="color: aliceblue">Price</th>
			  
			  
			  </tr>
		  
		  
		  </thead>
		  
		  <?php
		  while($row = $result->fetch_assoc()):  
		  ?>
		  
		  <tr>
			 
		  <td style="color: aliceblue"><?php echo $row['titlegallery'];?></td>
			  <td style="color: aliceblue"><?php echo $row['descgallery'];?></td>
			  <td>
			  <a href="shirtprice.php?edit=<?php echo $row['idgallery']?>" class="btn btn-info">Edit</a>
				  
				  <a href="processforshirt.php?delete=<?php echo $row['idgallery'];?>" class="btn btn-danger">Delete</a>
			  
			  </td>
		  
		  </tr>
		 <?php endwhile; ?>
		  </table>
	   </center>
	  </div>
	  
	  
	  
	  
	  
	  
	  
	   <center>
	  <form action="processforshirt.php" method="POST">
		
		  <input type="hidden" name="id" value="<?php echo $idd; ?>"
		  
		  <div class="form-group">
		  <input type="text" name="name" placeholder="Name" class="form-control" value="<?php echo $name ?>" style="width: 500px;">
			  </div>
		  <div class="form-group">
		  <input type="text" name="price" placeholder="Price"class="form-control" value="<?php echo $prc?>" style="width: 500px;">
			  </div>
		  <div class="form-group">
		  <button type="submit" name="update" class="btn btn-primary">Update</button>
		  </div>
		  
	  </form>
	  
	   <form method="POST">
	  <input type="text" placeholder="Search" name="srct"><button type="submit" name="search">Search</button>
		  
	  </form>
	  </center>
  </body>
</html>