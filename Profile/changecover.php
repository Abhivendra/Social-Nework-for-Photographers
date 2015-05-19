<?php
header("Content-Type: application/json");
	session_start();
	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
		if(isset($_POST) && $_SERVER['REQUEST_METHOD']=="POST")
			{
				$temporary = explode(".", $_FILES["image"]["name"]);
				$extension = end($temporary);
					if(in_array($extension,$valid_formats) && $_FILES["image"]["size"]<2000000000000000)
						{
							if($_FILES["image"]["error"]>0)
								{
								$error=$_FILES["image"]["error"];
								echo"<script>
									alert('$errror')
								</script>";
								}
							else
								{
								$username=$_SESSION['u_name'];
									/*echo "Success";
						echo "Upload: " . $_FILES["image"]["name"] . "<br />";
						echo "Type: " . $_FILES["image"]["type"] . "<br />";
						echo "Size: " . ($_FILES["image"]["size"] /1024) . " Kb<br />";
						echo "Temp image:" . $_FILES["image"]["tmp_name"] . "<br />";*/
								
						$dir="../HomeN/users/".$username."/coverpic";
							if(!file_exists($dir))
								mkdir($dir,0777,true);
						$coverpic=$dir."/".$_FILES["image"]["name"];		
						move_uploaded_file($_FILES["image"]["tmp_name"],$coverpic);
						include("../HomeN/dbcon.php");
						$con=connect();
						$q="Update user_basic_info SET cover='$coverpic' WHERE user_name='$username' LIMIT 1";
						mysqli_query($con,$q);
						if(mysqli_query($con,$q))
							{
								echo json_encode(array("cpic"=>$coverpic));
							}
								}
						}
					else
						{
					echo"<script>
							alert('INVALID IMAGE UPLOAD!!!!!!!');
								</script>";
						}
			
			
			}
		else
			{
				echo"<script>
					alert('PLEASE TRY AGAIN LATER !!!!');
				</script>";
			
			}

?>