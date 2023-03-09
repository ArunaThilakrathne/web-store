<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>shirt</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	  <link href="hold.css" type="text/css" rel="stylesheet">
	  <link href="main.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
  </head>
  <body background="images/s-l1600.jpg" style="background-attachment: fixed">
	  
	  <nav class="navbar-fixed-top" style="background-image: url(images/s-l1600.jpg);border: solid 1px #6A6A6A">
	  
		  <a href="#" class="navbar-brand" style="font-family: 'Brain Flower';font-size: 50px;font-weight: 1000;color: white;">RadiKult</a>
		  <a href="home.php" class="nav-link active" style="font-size: 20px;font-weight: 200;color: white;font-family: impact;;padding: 10px;float:left;">FOOTWARE</a>
		  <a href="shirt.php" class="nav-link " style="font-size: 20px;font-weight: 200;color: white;font-family: impact;padding: 10px;float:left;">T SHIRTS</a>
		  <a href="hoodie.php" class="nav-link " style="font-size: 20px;font-weight: 200;color: white;font-family: impact;padding: 10px;float:left;">HOODIES</a>
		  <?php
		  //$_SESSION["username"] = "admin";
		  if(isset($_SESSION['username'])){
		 echo' 
		 <a href="logout.php" class="nav-link " style="font-size: 20px;font-weight: 200;color: white;font-family: impact;float: right;display: flex;padding: 10px;">LOGOUT</a>
		 <a href="shoeprice.php" class="nav-link " style="font-size: 20px;font-weight: 200;color: white;font-family: impact;float: right;display: flex;padding: 10px;">SETTINGS</a>';
		  }
			  ?>
	  
	  </nav>
	  
	  
	  
	  
	  
	  <main>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.3.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>

	
	<section class="home-links" style="background-image: url(images/s-l1600.jpg)">
		<div class="wrapper">
		<hr>
		<div class="home-container">
		<?php	
			
		 // <div class="gallery" style="background-image: url(images/gallery'.$row["imgfullnamegallery"].');">
		  
		  
			//$_SESSION["username"] = "admin";
			include_once'dbh.php';
			
			$sql = "SELECT * FROM shirt ORDER BY ordergallery DESC";
			
			$stmt = mysqli_stmt_init($con);
			
			if(!mysqli_stmt_prepare($stmt,$sql)){
				echo"Database connection failed";
				
			}else{
				
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				
				while($row = mysqli_fetch_assoc($result)){
					
					$_SESSION["name"] = $row["imgfullnamegallery"];
					$modifieddsc = $row["descgallery"];
					$newdsc = substr($modifieddsc,0,30);
					
					echo '
					<a href="#">
			
		<div style="background-image: url(images/gallery'.$row["imgfullnamegallery"].');"></div>
		
			
		
		<h3>'.$row["titlegallery"].'</h3>
			<p>'.$newdsc.'</p></a>';
					
				
					
					
					
					
				}
			}
			
			
			?>
			
			
		</div>
	 </div>
</section>	  	  
				
			
		
		
		
	
	
		
		
		<?php
		if(isset($_SESSION['username'])){
			
			
			
		
			echo'<div class="jumbotron" style="background-color: #111">
			<form action="uploadsh.php"  method="POST" enctype="multipart/form-data" >
				
			<center><input type="text" name="filename" placeholder="File name"></center>
				<center><input type="text" name="filetitile" placeholder="File title"></center>
				<center><input type="text" name="filedsc" placeholder="File description"></center>
				<center><input type="file" name="file"></center>
					<center><button type="submit" name="submit">Upload</button></center>';
			
		}
	?>
		
				
				
			
			</form>
	  
	  </div>
	 
	  
	  
	</main>  

	  
  </body>
</html>