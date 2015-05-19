	<?php
		
	
        include("browser.php");	
		include("ip.php");
	
			//variables
		$username="";
		$password="";
		$email="";
		$name="";
		$mobile="";
		$sques="";
		$sans="";
		$image="";
			//error variables
		$usernameErr="";
		$passwordErr="";
		$emailErr="";
		$nameErr="";
		$dbErr="";
		$mobileErr="";
		$imgErr="";
		$squesErr="";
		$sansErr="";
		
		include("dbcon.php");
		$con=connect();
	
	if(isset($_POST['submit']))
		{
			//echo'submit';
			if(empty($_POST['name']))
				{
					$nameErr="Enter Your Name";
				}
			else
				{
					$name=$_POST['name'];
					
					if (!preg_match("/^[a-zA-Z ]*$/",$name))
					$nameErr = "Only letters and white space allowed";
				}
		
			if(empty($_POST['username']))
				{
					$usernameErr="Enter User Name";
				}
			else
				{
					$username=$_POST['username'];
					$query = mysqli_query($con,"SELECT User_name FROM user_login WHERE User_name='$username'");
					if (mysqli_num_rows($query) != 0)
					$usernameErr = "user name already exists";
				}
		
			if(empty($_POST['email']))
				{
					$emailErr="Enter email address";
				}
			else
				{
					$email=$_POST['email'];
					
					if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
							$emailErr = "Enter valid email address";
					else
						{
							$query=mysqli_query($con,"SELECT Email_Id FROM user_login WHERE Email_Id='$email'");
							if(mysqli_num_rows($query)!=0)
							$emailErr="Email already exists";
						}
				}
		
			if(empty($_POST['password']))
				{
					$passwordErr="Enter password";
				}
			else
				{
					$password=$_POST['password'];
				}
				
				
				if(empty($_POST['mobile']))
				{
					$mobileErr="Enter Mobile No";
				}
			else
				{
					$mobile=$_POST['mobile'];
					if(strlen($mobile)>10)
					$mobileErr="Enter valid mobile no.";
				}
				
				// code for uploading image
				
					$allowedExts = array("jpg", "jpeg", "gif", "png");
					$temporary = explode(".", $_FILES["image"]["name"]);
					$extension = end($temporary);
			if ((($_FILES["image"]["type"] == "image/gif")
			|| ($_FILES["image"]["type"] == "image/jpeg")
			|| ($_FILES["image"]["type"] == "image/png")
			|| ($_FILES["image"]["type"] == "image/jpeg"))
			&& ($_FILES["image"]["size"] < 2000000000000000)			//size of input "image" on bytes
			&& in_array($extension, $allowedExts))
					{
						if ($_FILES["image"]["error"] > 0)
						{
						$imgErr=$_FILES["image"]["error"] ;
						}
						else
						{
								/*echo "Success";
								echo "Upload: " . $_FILES["image"]["name"] . "<br />";
								echo "Type: " . $_FILES["image"]["type"] . "<br />";
								echo "Size: " . ($_FILES["image"]["size"] /1024) . " Kb<br />";
								echo "Temp image:" . $_FILES["image"]["tmp_name"] . "<br />";*/

									$time=time(); //adding timestamp to make images unique
									$image="upload/" .$time.$_FILES["image"]["name"];
									move_uploaded_file($_FILES["image"]["tmp_name"],$image);//moving to upload folder and storing the url
			
								  //echo "Stored in: " .$image;
								  /*$_SESSION['image']=$name;
								  $id=$_SESSION['id'];
								  mysql_query("UPDATE 'users' SET 'image' = '$name' WHERE 'id' = '$id'");		//updating the url in the database*/

						}
			}
				else
				  {
					$imgErr="Invalid Image";
				  }
		//security question		  
			if(empty($_POST['sques']))
				{
					$squesErr="Please Select a Security Question";	
				}
			else
				{
					$sques=$_POST['sques'];
						//echo $sques;
						if(empty($_POST['sans']))
							$sansErr="Please Enter the Security Answer";
						else
							$sans=$_POST['sans'];
					//echo $sans;
				}
				
				// error free to be entered into database;
				
				if($dbErr=="" && $nameErr=="" && $usernameErr=="" && $passwordErr=="" && $emailErr==""&&$squesErr=="" && $sansErr=="" && $imgErr=="")
				{
					
				// getting ip;	
					$ip=getip();
					if($ip="::1")
						$ip="127.0.0.1";
						
				// getting browser
				$ua=getBrowser();
				$browser=$ua['name'] ;
				
				//signup date
				$time=time();
				$signup=date("Y-m-d h:i:s",$time);	
				$act=0;// accounts are dectivated initiallly
				$u_level=0;// access level 
				$query="INSERT INTO user_login(User_name, Email_Id, mobil_no, password, notes_check, d_pic, ip, browser, signup_date, last_login, s_ques, s_ans, activated, user_level) VALUES ('$username','$email','$mobile','$password','$signup','$image','$ip','$browser','$signup','$signup','$sques','$sans','$act','$u_level')";
				$res=mysqli_query($con,$query);
				$u_id=mysqli_insert_id($con);
				$query2="INSERT INTO user_basic_info(user_name,full_name) VALUES ('$username','$name')";
				mysqli_query($con,$query2);
				mysqli_insert_id($con);
				$dir="users/".$username;
					if(!file_exists($dir))
						mkdir($dir,0777,true);	
				/*echo'PLease visit your email id for activating your account';
					
					//EMAIL activation
					
				$to=$email;
				$from="xyz@photographica.com";	
				link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."/HomeN/activate.php?u=".$username."&e=".$email;
				$message='<!DOCTYPE html>
<html>
<!--#########################################################################################################################-->
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PhotoGraphica</title>
		<!-- Style sheets --->
		<link rel="stylesheet" href="css/sitey.css">
		<link href="css/css.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/fontello.css">
		<link rel="stylesheet" href="css/main.css">
		<!-- Scripts --->
		<script src="a.htm" async></script>
		<script src="js/modernizr.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/my_file.js"></script>
<!--#########################################################################################################################-->
<body class="page-home">
	<header class="main-header">
		<div class="row text-center">
			<div class="columns small-12">
				<a href="#"><img src="images/logo-b.png"></a>
			</div>
		</div>
	</header>
<div class="main-form">
  <div class="row">
    <div class="columns small-12 medium-5 medium-centered">
      <div class="action-form text-center">
	  <a href='"$link"'>ACTIVATE YOUR ACCOUNT</a>
	  </div>
  </div>
</div>
	  ';
	  $header="From:$from\n";
	  $subject="EMAIL ACTIVATION LINK";
	  mail($to,$subject,$message,$header);*/
				
					header('Location:signin.php');// redirecting it	
			/*if($res)
				echo "true";
			else
				echo"false";//checking errors*/
				}	
		}
	?>





<!DOCTYPE html>
<html>

<!--#########################################################################################################################-->

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PhotoGraphica</title>
		<!-- Style sheets --->
		<link rel="stylesheet" href="css/sitey.css">
		<link href="css/css.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/fontello.css">
		<link rel="stylesheet" href="css/main.css">
		
		
		<!-- Scripts --->
		<script src="a.htm" async></script>
		<script src="js/modernizr.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/my_file.js"></script>
			<style>
				.err
					{
						color:red;
						font-size:12px;
						margin-bottom:-6px;
					}
			
			</style>
<!--#########################################################################################################################-->

<body class="page-home">


	<header class="main-header">
		<div class="row text-center">
			<div class="columns small-12">
				<a href="#"><img src="images/logo-b.png"></a>
			</div>
		</div>
	</header>
<div class="main-form">
  <div class="row">
    <div class="columns small-12 medium-5 medium-centered">
      <div class="action-form text-center">
        <h1 class="show-for-medium-up">Create your website today        </h1>
        <h2 class="show-for-medium-up">Sign up below to get started        </h2>
        <form novalidate="novalidate" action="signup.php" method="post" data-abide="" enctype="multipart/form-data" >
          <fieldset class="input-container text-center">
            <div class="input-wrapper">
			 <p class ="err"><?php
				if($nameErr!="")
				echo $nameErr;
			  ?></p>
              <input id="name" name="name" placeholder="Full Name" type="text">              
            </div>
				<div class="input-wrapper">
				 <p class ="err"><?php
				if($usernameErr!="")
				echo $usernameErr;
			  ?></p>
              <input id="username" name="username" placeholder="User Name" type="text">             
            </div>
				<div class="input-wrapper">
				 <p class ="err"><?php
				if($emailErr!="")
				echo $emailErr;
			  ?></p>
              <input id="email"  name="email" placeholder="Email Address" type="text">              
			 
            </div>
            	<div class="input-wrapper">
				 <p class ="err"><?php
				if($mobileErr!="")
				echo $mobileErr;
			  ?></p>
              <input id="mobile" name="mobile" placeholder="Mobile No" type="text">              
            </div>
			
            <div class="input-wrapper">
			 <p class ="err"><?php
				if($passwordErr!="")
				echo $passwordErr;
			  ?></p>
  
              <input id="password" name="password" placeholder="Choose a Password" type="password">

			<div>
				<p class ="err"><?php
				if($imgErr!="")
				echo$imgErr;
				?></p>
					Upload your image:
					<input type="file" name="image" style="width:230px;height:24px;margin-top:5px;">
           </div>
		   <p class ="err"><?php
					if($squesErr!="")
						echo $squesErr;
				?></p>
				Choose a Security Question: 
		   <select name="sques" style="margin-top:10px;">
				<option value="1">What time of the day were you born?(hh:mm)</option>
				<option value="2">What is your pet’s name?</option>
				<option value="3">In what year was your father born?</option>
				<option value="4">What was your first Birthday Present? </option>
				<option value="5">What is your favourite color?</option>
			</select>
			<div class="input-wrapper">
			<p class ="err"><?php
					if($sansErr!="")
					echo $sansErr;
			  ?></p>
              <input id="name" name="sans" placeholder="Security Answer" type="text">              
			 
            </div>
          </fieldset>
          <input value="Get Started" class="button medium round" type="submit" name="submit">
        </form>
        <p class="notice show-for-medium-up"> By creating an account you agree to our 
			<a href="#" target="_blank"> Terms </a> and<a href="#" target="_blank"> Privacy </a> Policies        
		</p>
      </div>
      <div class="form-links text-center">
        <p class="left show-for-medium-up"><a href="#">Already have an account? Login</a></p>

        <p class="show-for-small-only"><a href="#">Login <span>›</span> </a></p>
      </div>
    </div>
  </div>
</div>
<!-- Popup Div Ends Here -->
</body>
</html>