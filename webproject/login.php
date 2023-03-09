<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login</title>
	<link href="login.css" type="text/css" rel="stylesheet">
</head>

<body>
	<section>
		<div class="f">
	<form action="loginlg.php" method="POST" >
		<input type="text" name="name" placeholder="Username/Email" class="form-control"><br>
			
			<input type="password" name="pwd" placeholder="Password" class="form-control"><br><br>
			
			<center><button type="submit" name="submit" style="font-family: 'Brain Flower';">LOGIN</button></center>
		</div>
	<center><div class="p"><?php	
			if(isset($_GET["error"])){
		if($_GET["error"] == "emptyinput"){
			echo"<p style='font-family: 'Brain Flower';'>Please fill all the required fields!</p>";
		}
		elseif($_GET["error"] == "wrong"){
			echo"<p>Incorrect User name or password</p>";
		}
		elseif($_GET["error"] == "wrongpassword"){
			echo"<p>Invalid password!</p>";
		}
		elseif($_GET["error"] == "didintmatch"){
			echo"<p>Passwords didn't match try again</p>";
		}
		
		elseif($_GET["error"] == "Username taken"){
			echo"<p>The username allready exists</p>";
		}
		elseif($_GET["error"] == "none"){
			echo"<p>User added! </p>";
		}
			}
		?>
		</div>
	</center>
		
		</section>
</body>
</html>