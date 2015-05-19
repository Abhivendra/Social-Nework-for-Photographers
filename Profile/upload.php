<?php 
//uploading MULTILPLE FILES
session_start();
$valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","PNG","JPEG","GIF","BMP");
$max_file_size = 1024*25*1024; //25 Mb
$count = 0;
$path="";
$username=$_SESSION['u_name'];
$album="MYALBUM".time();
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	if(isset($_POST['album']) && $_POST['album']!="")
			{
				$album=$_POST['album'];
				$path="../HomeN/users/".$username."/albums/".$album."/";
				echo $path;
				if(!file_exists($path))
				mkdir($path,0777,true);
			}
			
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files
				$name=$album.$count.".".pathinfo($name, PATHINFO_EXTENSION);
				$gallery=$path.$name;
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f],$gallery ))
	            $count++; // Number of successfully uploaded file
				
	        }
	    }
	}          include("../HomeN/dbcon.php");
				$con=connect();
				$time=time();
				$update=date("Y-m-d h:i:s",$time);
				$query="INSERT INTO photos(user,gallery,filename,description,uploaddate) VALUES('$username','$path','$album','$album','$update')";
				if(mysqli_query($con,$query))
				mysqli_insert_id($con);
}
?>