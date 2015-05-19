	
	<?php
		function connect()
			{
	$host="localhost";
		$admin="root";
		$pass="";
		$db="photographica";
	
	//connecting to database
		$con=mysqli_connect($host,$admin,$pass,$db);
		if($con)
			{
				//echo'connected';
				return $con;
			}
		else	
			{
				$dbErr="sqlError";
				die($dbErr);
				return null;
			}
			
		}	
			
		?>	