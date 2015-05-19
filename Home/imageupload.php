<?php
		
		function upload()
			{
			
			
			$allowedExts = array("jpg", "jpeg", "gif", "png");
				$temporary = explode(".", $_FILES["image"]["name"]);
			$extension = end($temporary);
			if ((($_FILES["image"]["type"] == "image/gif")
			|| ($_FILES["image"]["type"] == "image/jpeg")
			|| ($_FILES["image"]["type"] == "image/png")
			|| ($_FILES["image"]["type"] == "image/pjpeg"))
			&& ($_FILES["image"]["size"] < 2000000000000000)			//size of input "image" on bytes
			&& in_array($extension, $allowedExts))
					{
						if ($_FILES["image"]["error"] > 0)
						{
						//echo "Return Code: " . $_FILES["image"]["error"] . "<br />";
						}
						else
						{
						echo "Success";
						/*echo "Upload: " . $_FILES["image"]["name"] . "<br />";
						echo "Type: " . $_FILES["image"]["type"] . "<br />";
						echo "Size: " . ($_FILES["image"]["size"] /1024) . " Kb<br />";
						echo "Temp "image": " . $_FILES["image"]["tmp_name"] . "<br />";

							$time=time();										//adding timestamp to make images unique
							$name="upload/" .$time.$_FILES["image"]["name"];
						  move_uploaded_file($_FILES["image"]["tmp_name"],				//moving to upload folder and storing the url
						  $name);
						  echo "Stored in: " .$name;
						  $_SESSION['image']=$name;
						  $id=$_SESSION['id'];
						  mysql_query("UPDATE `users` SET `image` = '$name' WHERE `id` = '$id'");		//updating the url in the database*/

						}
			}
else
  {
	$imgErr="Invalid Image";
  }
}
?>