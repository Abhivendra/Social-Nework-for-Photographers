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
 <div class="header">
<div id ="home">
	
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
		  	             	         	<li><a class="active" href="work.php">Work</a></li>
		  	             	         	<li><a href="contact.php">Contact</a></li>
										<li><a href="logout.php">Logout</a></li>
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
 </div>
<!--header end here-->
<!--work us start here-->
<div class="work-us">
	<div class="container">
		<div class="work-us-main">
			<div class="col-md-6 work-us-left">
				<h3>Evolving Personalities</h3>
				<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
			  <span class="ver-line"> </span>
			</div>
			<div class="col-md-6 work-up-right">
				<span class="box"> </span>
				<h4>BACK TO WORK</h4>
				
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--work us end here-->
<!--workus grid start here-->
<div class="about">
	<div class="container">
		<div class="about-main">
			<div class="col-md-4 about-top">
				<h3>Malorum</h3>
				<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div class="col-md-4 about-top">
				<h3>Finibus Bonorum</h3>
				<p>"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
			</div>
			<div class="col-md-4 about-top">
				<h3>Hampden-Sydney</h3>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some.</p>
			</div>
		 <div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--work us grid end here-->
<!--work contact start here-->
  <div class="contact">
 	   <div class="container">
 	   	         <div class="contact-main">
 	   	         	               <h3>Get in touch</h3>
 	   	         	              <div class="row contact-top">
 	   	         	              	       <div class="col-md-4 contact-left">
 	   	         	              	       	           <h3> Office</h3>
 	   	         	              	       	           <p> Richard McClintock</p>
 	   	         	              	       	           <p> alteration in some form</p>
 	   	         	              	       	           <p> cites of the word</p>
 	   	         	              	       	           <p>T / + 0000000000</p>
 	   	         	              	       	           <p>email : <a href="mailto:example@mail.com" >example34@yaoo.com</a></p>
 	   	         	              	       </div>
 	   	         	              	       <div class="col-md-4 contact-left">
 	   	         	              	       	          <h4>Social</h4>
 	   	         	              	       	       <ul> 
 	   	         	              	       	           <li><a href="#"> Facebook</a></li>
 	   	         	              	       	           <li><a href="#">Twitter </a></li>
 	   	         	              	       	           <li><a href="#">Linkedin</a></li>
 	   	         	              	       	           <li><a href="#"> Behance</a></li>
 	   	         	              	       	      </ul>
 	   	         	              	       </div>
 	   	         	              	        <div class="col-md-4 contact-left">
 	   	         	              	       	          <h5>SAY HELLO TO US</h5>
 	   	         	              	       	         <form>
 	   	         	              	       	         	  <input type="text" class="textbox" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}"/><br>
 	   	         	              	       	         	  <textarea value="Message"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'message';}"/> Message </textarea><br>
 	   	         	              	       	         	  <input type="submit" value="submit">
 	   	         	              	       	         </form>
 	   	         	              	       </div>
 	   	         	              </div>
 	   	         </div>
 	   </div>
 </div>
<!--work coontact end here-->
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