
	
	<?php
				$username="";
				if(isset($_GET['u']))
				$username=$_GET['u'];
				else if(!isset($_GET['u']))
						{
			include_once("../HomeN/checklogin.php");
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
<title>Photographica || Home</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/new.php" rel="stylesheet" type="text/css" media="all"/>

<!--web-fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<!--js-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.form.js"></script>
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
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		</script>
		
	
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
		  	    	   <div class="logo">
		  	                        <a href="index.php"><img src="images/logo-b.png"></a>
		  	           </div>
		  	           <span class="menu"><img src="images/icon.png"> </span> 
		  	           <div class="clear"> </div>
		  	           <div class="header-right">  	         	
		 	          	            <ul class="res">
		  	             	         	<li><a class="active" href="index.php">Home</a></li>
		  	             	         	<li><a href="work.php">Work</a></li>
		  	             	         	<li><a href="contact.php">Contact</a></li>
										<li><a href="#">Messages</a></li>
										<li><a href="#">Notifications</a></li>
										<li><a href="#">Settings</a></li>
										<li><a href="logout.php">LogOut</a></li>
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
		  	          	     <h1>Welcome To Portfolio of <br><?php
								if($username!="")
									echo "Mr.".$username;
								else
									echo "Mr.XYZ";
							 ?>, ABClife Photographer</h1>
                             <span class="a" id="pic"> </span>
							 <form id="coverpic" method="post" enctype="multipart/form-data" action="changecover.php">
							 
							  <div id="status" style='display:none;float:right'><img src="images/loader.gif" alt="Uploading...."/></div>
							  
								<div class="fileUpload btn btn-primary" id="cpic">
								<span>CHOOSE COVER</span>
								<input type="file" class="upload" name="image" id="photoimg" />
								</div>		
							</form>	
							
				<script> 
				//for uploading the image through ajax
					$(document).ready(function() 
							{ 

							$('body').on('change','#photoimg', function()
							 {
							var A=$("#status");
							var B=$("#cpic");

							$("#coverpic").ajaxForm({target: '#home', 
							beforeSubmit:function(){
							A.show();
							B.hide();
							}, 
							success:function(response){
							location.reload();
							}, 
							error:function(){
							A.hide();
							B.show();
							} }).submit();
							});

							}); 
				
				
				</script>			
						
	   </div>    
 </div>
 <!---pop-up-box---->
					  <script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
					<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
					<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
			<!---//pop-up-box---->

<!--work start here-->
<!--<form enctype="multipart/form-data" action="upload.php" method="post">
    <input name="file[]" type="file" />
    <button class="add_more">Add More Files</button>
    <input type="button" value="Upload File" id="upload"/>
</form>-->
	<?php
		include("../Home/dbcon.php");
		$con=connect();
		$query="SELECT gallery,filename FROM photos WHERE user='$username' ORDER BY uploaddate DESC";
		$row=mysqli_query($con,$query);
	?>
<div class="work">
	<div class="container">
	
		<div class="row work-row">
			<div class="col-md-4 work-column">
			<a href="#small-dialog" class="thickbox play-icon popup-with-zoom-anim"><div class="col-md-8 work-column">
			<?php
				if(!is_null($row[0]))
					{
						$img=
					}
			?>
				<img src="images/D.jpg" alt="" class="img-cap">
				<div class="caption">
					  <div class="text">
					        <h3>UPLOAD YOUR ALBUM</h3>
					        <p>SHARE AND UPLOAD YOUR PIC COLLECTION.GET STARTED.</p>
					  </div>
				</div>
				
				</div>
			</a>	
			<form enctype="multipart/form-data" action="upload.php" method="post">
				<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" class="btn fileup"/>
				<input type="text" value="enter album name" name="album">
				<input type="submit" value="Upload!" class="btn btn-primary filemult"/>
				</form>
			</div>
			<div id="small-dialog" class="mfp-hide">
				<div class="image-top">
					<img src="images/D.jpg"/>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
			</div>
			<div class="col-md-8 work-column">
			<a href="#small-dialog1" class="thickbox play-icon popup-with-zoom-anim"><div class="col-md-8 work-column">
				<img src="images/sea.jpg" alt="" class="img-width">
				<div class="caption capt">
					<div class="text sma">
					        <h3>torquentper</h3>
					        <p>Class aptent taciti sociosqu ad litora torquentper conubia<br>nostra, per inceptos himenaeo</p>
					  </div>
				</div>
			</div>
		</a>
		<form enctype="multipart/form-data" action="upload.php" method="post">
				<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" class="btn fileup"/>
				<input type="submit" value="Upload!" class="btn btn-primary filemult"/>
				</form>
		</div>
		<div id="small-dialog1" class="mfp-hide">
				<div class="image-top">
					<img src="images/sea.jpg"/>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
			</div>
			<div class="clearfix"> </div> 
		</div>
		<div class="row work-row1">
		<div class="col-md-4 work-column">
			<a href="#small-dialog2" class="thickbox play-icon popup-with-zoom-anim"><div class="col-md-4 work-column">
				<img src="images/work.jpg" alt="" class="img-cap">
				<div class="caption">
					<div class="text">
					        <h3>torquentper</h3>
					        <p>Class aptent taciti sociosqu ad litora torquentper conubia<br>nostra, per inceptos himenaeo</p>
					  </div>
				</div>
			</div>
		</a>
		<form enctype="multipart/form-data" action="upload.php" method="post">
				<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" class="btn fileup"/>
				<input type="submit" value="Upload!" class="btn btn-primary filemult"/>
				</form>
		</div>
		<div id="small-dialog2" class="mfp-hide">
				<div class="image-top">
					<img src="images/work.jpg"/>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
			</div>
			<div class="col-md-4 work-column">
			<a href="#small-dialog3" class="thickbox play-icon popup-with-zoom-anim"><div class="col-md-4 work-column">
				<img src="images/card.jpg" alt="" class="img-cap">
				<div class="caption">
					<div class="text">
					        <h3>torquentper</h3>
					        <p>Class aptent taciti sociosqu ad litora torquentper conubia<br>nostra, per inceptos himenaeo</p>
					  </div>
				</div>
			</div>
		</a>
		<form enctype="multipart/form-data" action="upload.php" method="post">
				<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" class="btn fileup"/>
				<input type="submit" value="Upload!" class="btn btn-primary filemult"/>
				</form>
		</div>
		<div id="small-dialog3" class="mfp-hide">
				<div class="image-top">
					<img src="images/card.jpg"/>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
			</div>
			<div class="col-md-4 work-column">
			<a href="#small-dialog4" class="thickbox play-icon popup-with-zoom-anim"><div class="col-md-4 work-column">
				<img src="images/face.jpg" alt="" class="img-cap">
				<div class="caption">
					<div class="text">
					        <h3>torquentper</h3>
					        <p>Class aptent taciti sociosqu ad litora torquentper conubia<br>nostra, per inceptos himenaeo</p>
					  </div>
				</div>
			</div>
		</a>
		<form enctype="multipart/form-data" action="upload.php" method="post">
				<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" class="btn fileup"/>
				<input type="submit" value="Upload!" class="btn btn-primary filemult"/>
				</form>
		</div>
		<div id="small-dialog4" class="mfp-hide">
				<div class="image-top">
					<img src="images/face.jpg"/>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
			</div>
		</div>
		<div class="row work-row1">
			<a href="#small-dialog5" class="thickbox play-icon popup-with-zoom-anim"><div class="col-md-4 work-column">
				<img src="images/car.jpg" alt="" class="img-height">
				<div class="caption car">
					<div class="text big">
					        <h3>torquentper</h3>
					        <p>Class aptent taciti sociosqu ad litora torquentper conubia<br>nostra, per inceptos himenaeo</p>
					  </div>
				</div>
			</div>
		</a>
		<div id="small-dialog5" class="mfp-hide">
				<div class="image-top">
					<img src="images/car.jpg"/>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
			</div>
			<div class="col-md-8" >
				<div class="row">
					<a href="#small-dialog6" class="thickbox play-icon popup-with-zoom-anim"><div class="col-md-6 work-column">
						<img src="images/gl.jpg" alt="" class="img-cap">
						<div class="caption">
							<div class="text">
					        <h3>torquentper</h3>
					        <p>Class aptent taciti sociosqu ad litora torquentper conubia<br>nostra, per inceptos himenaeo</p>
					  </div>
						</div>
					</div>
				</a>
				<div id="small-dialog6" class="mfp-hide">
				<div class="image-top">
					<img src="images/gl.jpg"/>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
			</div>
					<a href="#small-dialog7" class="thickbox play-icon popup-with-zoom-anim"><div class="col-md-6 work-column">
						<img src="images/oldman.jpg" alt="" class="img-cap">
						<div class="caption">
							<div class="text">
					        <h3>torquentper</h3>
					        <p>Class aptent taciti sociosqu ad litora torquentper conubia<br>nostra, per inceptos himenaeo</p>
					  </div>
						</div>
					</div>
				</a>
				<div id="small-dialog7" class="mfp-hide">
				<div class="image-top">
					<img src="images/oldman.jpg"/>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
			</div>
					<div class="clearfix"> </div>
					<a href="#small-dialog8" class="thickbox play-icon popup-with-zoom-anim"><div class="cat-row work-column">
						<img src="images/cat.jpg" alt="" class="img-width">
						<div class="caption cat">
							<div class="text sma">
					        <h3>torquentper</h3>
					        <p>Class aptent taciti sociosqu ad litora torquentper conubia<br>nostra, per inceptos himenaeo</p>
					  </div>
						</div>
					</div>
				</a>
				
				<div id="small-dialog8" class="mfp-hide">
				<div class="image-top">
					<img src="images/cat.jpg"/>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
			</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
<!--contact start here-->
 <div class="contact">
 	   <div class="container">
 	   	         <div class="contact-main">
 	   	         	               <h3>Get in touch</h3>
 	   	         	              <div class="row contact-top">
 	   	         	              	       <div class="col-md-4 contact-left">
 	   	         	              	       	           <h3>Contact Address</h3>
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
 	   	         	              	       	          <h5>SAY HELLO TO ME</h5>
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
 <!--footer start here-->
 <div class="footer">
 	       <div class="container">
 	           	 <div class="footer-main">
 	           	 	       <p> 2015 &copy  <a href="http://ankarp.co.in"> AnkArp IT Solutions Private Limited</a></p>
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