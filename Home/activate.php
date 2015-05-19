<?php
		include("dbcon.php");
		$con=connect();
	if(isset($_GET['u']) && isset($_GET['e']))
		{
			$query="SELECT * FROM user_login WHERE User_name='$u' AND Email_Id='$e'";
			$sql_query=mysqli_query($con,$query);
			$rows=mysqli_num_rows($sql_query);
			
			if($rows==1)
				{
					$q="UPDATE user_login SET activated='1' WHERE User_name='$u' AND Email_Id='$e' LIMIT 1 ";
					mysqli_query($con,$q);
					header('Location:signin.php');
				}
			else
				{
					header("Location:error.php?msg=Your credentials do not match anything in our system");
					exit();
				}
		}
	else	
		{
		header("Location:error.php?msg=Message Corrupted!!!");
		exit();
		}
?>