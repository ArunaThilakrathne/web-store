<?php


if(isset($_POST['button'])){
	header("Location:more.php");
}



//checking the user actually press the submit button
if(isset($_POST['submit'])){
	
	
	$_newfilename = $_POST['filename'];
	
	//checking if the file name is empty then assigning a name
	if(empty($_newfilename)){
		
		$_newfilename = "img";
	}
	
	else{
		
		//making file name into lowercase and replacing spaces with dashes
		
		$_newfilename = strtolower(str_replace("","-",$_newfilename));
		
	}
	$_imgtitlee = $_POST['filetitile'];
	$_imgdesc = $_POST['filedsc'];
	
	$file = $_FILES['file'];
	
	//grabbing file details
	
	$fileName = $file["name"];
	$fileType = $file["type"];
	$fileTempName = $file["tmp_name"];
	$fileError = $file["error"];
	$fileSize = $file["size"];
	
	//getting file extension
	$fileExt = explode(".",$fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	//setting allowed file types
	$allowed = array("jpg","jpeg","png");
	
	//error handeling and image uploading
	if(in_array($fileActualExt,$allowed)){
		if($fileError === 0){
			if($fileSize < 200000 ){
				$imgFullName = $_newfilename . ".". uniqid("", true)."." .$fileActualExt;
				$fileDestination  = "images/gallery".$imgFullName;
				
				include_once "dbh.php";
				
				if(empty($_imgtitlee)|| empty($_imgdesc)){
					header("Location:home.php?upload=empty");
					exit();
					
				}
				else{
					$sql = "SELECT * FROM gallery;";
					$stmt = mysqli_stmt_init($con);
					
					//checking errors in sql statement
					if(!mysqli_stmt_prepare($stmt,$sql)){
						echo"Database connection failed!";
					}
					else{
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$rowcount = mysqli_num_rows($result);
						$setimgorder = $rowcount + 1; 
						
						$sql = "INSERT INTO gallery ( titlegallery, descgallery, imgfullnamegallery, ordergallery) VALUES (?,?,?,?);";
						
						if(!mysqli_stmt_prepare($stmt,$sql)){
							echo"Database connection error!";
						}else{
							
							mysqli_stmt_bind_param($stmt, "ssss",$_imgtitlee,$_imgdesc,$imgFullName,$setimgorder);
							
							mysqli_stmt_execute($stmt);
							
							move_uploaded_file($fileTempName,$fileDestination);
							
							header("Location:home.php?upload=success");
						}
						
						
						
					}
				}
			}
			else{
				
				echo"File size is too big";
			}
			
		}
		
		else{
			echo"An error occured!";
			
		}
	}
	else{
		echo"only jpg,pngs allowed!";
		exit();
			
	}
	
	
 	
	
		
}

