<?php
session_start();
	$_SESSION=array();//empty the seesion variables
	//deleting cookier variables
if(isset($_COOKIE['username'])||isset($_COOKIE['userid'])|| isset($_COOKIE['password']))	
	{
		setcookie('username','',strtotime('-5days'),'/');
		setcookie('password','',strtotime('-5days'),'/');
		setcookie('userid','',strtotime('-5days'),'/');
	}
	session_destroy();
	
//double check session destruction;
	if(isset($_SESSION['u_name'])|| isset($_SESSION['u_id'])|| isset($_SESSION['u_pass']))
		echo'Failed to logout';
	else
		header("Location:/HomeN/Index.php");
?>