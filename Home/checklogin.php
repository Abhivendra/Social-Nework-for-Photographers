		<?php
			session_start();
			include_once("dbcon.php");
			$con=connect();
				if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass']) && isset($_SESSION['u_id'])) 
					{
						header("Location:/Profile/index.php?u=".$_SESSION['u_name']);
					}
				else if(isset($_COOKIE['username']) && isset($_COOKIE['userid']) && isset($_COOKIE['password']))
					{
						$username=$_COOKIE['username'];
						$_SESSION['u_name']=$_COOKIE['username'];
						$_SESSION['u_pass']=$_COOKIE['password'];
						$_SESSION['u_id']=$_COOKIE['userid'];
						include('Location:/HomeN/ip.php');
							$ip=getip();
							$lastlogin=date("Y-m-d h:i:s",time());
						$query="UPDATE user_login SET ip='$ip',last_login='$lastlogin' WHERE User_name='$username' LIMIT 1"	;
						mysqli_query($con,$query);
						header("Location:/Profile/index.php?u=".$_SESSION['u_name']);
					}
		?>