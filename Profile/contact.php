<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/-->
	<?php
			session_start();
			include_once("../HomeN/dbcon.php");
			$con=connect();
				if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass']) && isset($_SESSION['u_id'])) 
					{
					}
				else if(isset($_COOKIE['username']) && isset($_COOKIE['userid']) && isset($_COOKIE['password']))
					{
						$username=$_COOKIE['username'];
						$_SESSION['u_name']=$_COOKIE['username'];
						$_SESSION['u_pass']=$_COOKIE['password'];
						$_SESSION['u_id']=$_COOKIE['userid'];
					}
				else	
					{
						header("Location:../HomeN/Index.php");
					}
		?>
		
		<?php
// php code to extract the cover pic url		
		$coverpic="";
		$host="localhost";
		$admin="root";
		$pass="";
		$db="photographica";
		$con=mysqli_connect($host,$admin,$pass,$db);
		if($con)
			{
				$username=$_SESSION['u_name'];
				$query="SELECT cover FROM user_basic_info WHERE user_name='$username' LIMIT 1";
				$exe=mysqli_query($con,$query);
				$row=mysqli_fetch_row($exe);
				
				if(count($row)==1 && !is_null($row[0]))
						{
						$coverpic=$row[0];
						}
					else
						{
						$coverpic="images/3face.jpg";
						}
			}			
		else
			{
				echo"Connection to database denied";
			}
	?>	

<!DOCTYPE html>
<html>
<head>
<title> Photographica-Final Bootstrap Website Template| Home :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--web-fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<!--js-->
<script src="js/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smoth-scrolling -->
</head>
<body>
<!--header start here-->
<div id="home">
<script>
 // javascript for loading dynamic background
			var cp='<?php echo $coverpic;?>';
				$(document).ready(function(){
				$('#home').css({
				"background":"url("+cp+")no-repeat",
				"min-height":"590px",
				"background-size":"cover",
				"-webkit-background-size":"cover",
				"-moz-background-size":"cover",
				"-o-background-size":"cover",
				"-ms-background-size":"cover"
								});
				});
		
		</script>
       <div class="container">
		  	   <div class="header-main">
		  	    	   <div class="logo-w">
		  	                        <a href="index.php"><img src="images/logo-b.png"></a>
		  	           </div>
		  	           <span class="menu"><img src="images/icon.png"> </span> 
		  	           <div class="clear"> </div>
		  	           <div class="header-right">  	         	
		 	          	            <ul class="res">
		  	             	         	<li><a href="index.php">Home</a></li>
		  	             	         	<li><a href="work.php">Work</a></li>
		  	             	         	<li><a class="active" href="contact.php">Contact
										</a></li>
										<li><a href="logout.php">LogOut
										</a></li>
		  	             	         </ul> 
		  	             	          <script>
			                                                      $( "span.menu").click(function() {
			                                                                                        $(  "ul.res" ).slideToggle("slow", function() {
			                                                                                         // Animation complete.
			                                                                                         });
			                                                                                         });
		                                                     </script>
		                                                                   
		  	          </div>
		  	      <div class="clearfix"> </div>
		  	  </div>
	   </div>  
	 </div>  
<!--header end here-->
<!--contactus start here-->
<div class="contact-us">
	<div class="container">
		<div class="contact-us-main">
			<div class="contact-us-top">
				<h3>CONTACT US</h3>
				<p>Get in Touch</p>
			</div>
			<div class="col-md-8 contact-us-left">
				<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}"/>
				<input type="text" value="E-mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"/>
				<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}"/>Message </textarea>
				<input type="submit" value="Send" >
			</div>
			<div class="col-md-4 contact-us-right">
				<h3>Our Company</h3>
				<p>the landing in</p>
				<p>1234 city Road ,City Name</p>
				<p>+1534 432 123</p>
				<p>contact@companyname.lo</p>
				<div class="image-sprit"> 
				<span class="fa"> </span>
				<span class="tw"> </span>
				<span class="dri"> </span>
				<span class="be"> </span>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--map start here-->
<div class="map">
	<div class="container">
		 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387144.007583421!2d-73.97800349999999!3d40.7056308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1415253431785"  frameborder="0" style="border:0"></iframe>
	</div>
</div>
<!--map start here-->
<!--contact us end here-->
 <!--footer start here-->
 <div class="footer">
 	       <div class="container">
 	           	 <div class="footer-main">
 	           	 	       <p> 2014 &copy  Template by <a href="http://w3layouts.com/">W3layouts </a></p>
 	           	 </div> 
 	       </div>
 	       <script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
					<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
 </div>
	</body>
</html>