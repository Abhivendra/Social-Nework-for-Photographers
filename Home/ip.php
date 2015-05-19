<?php
	function getip()
		{
		$ip;
	$http_client_ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : '';//for shared network
	$http_x_forwarded_for = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : ''; //for proxy
 
	/*$http_client_ip =$_SERVER['HTTP_CLIENT_IP'];//for a shared netwrk ip
	$http_x_forward=$_SERVER['HTTP_X_FORWARDED_FOR'];//for proxy
	*/
	
	$remote_addr=$_SERVER['REMOTE_ADDR'] ;//normal way
	
		if(!empty($http_client_ip))
		$ip=$http_client_ip;
		else if(!empty($http_x_forward_for))
		$ip=$http_x_forward_for;
		else
		$ip=$remote_addr;
		
		return $ip;	
		}
			
		
?>		