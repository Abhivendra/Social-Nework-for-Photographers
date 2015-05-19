	
		<?php
		session_start();
														function session()
																{
														if(isset($_SESSION['u_id']) && isset($_SESSION['u_name']) && isset($_SESSION['u_pass']))
															{	
														$profname=$_SESSION['u_name'];
														echo"<script>
													window.opener.location.href='/Profile/index.php?u=$profname'
													 window.close();
													</script>";	  
															}
														else
															{
																echo"Failed";
																exit();
															}
																}	
		?>




	<?php
			
			// form data
			$username="";
			$password="";
			$check="";
			$id="";
			// form error variables
			$emailErr="";
			$passwordErr="";
			$loginErr="";
			if(isset($_POST['login']))
				{
					include("dbcon.php");
					$con=connect();
						$email=$_POST['email'];
						$password=$_POST['password'];
						$check=$_POST['remember'];
					if($email=="" || $password=="")
						$loginErr="Please Enter Your Email and Password";	
					else
						{
							$query="SELECT Email_ID,User_name,password FROM user_login WHERE Email_Id='$email' AND activated='1'";
							$res=mysqli_query($con,$query);
							$rows=mysqli_fetch_row($res);
								if($rows==NULL)
									{
									$emailErr="Please Enter Correct Email Address or activate your account";
									}
								else
									{
										$id=$rows[0];
										$username=$rows[1];
										$pass=$rows[2];
											if($password!=$pass)
												$passwordErr="Invalid Password";
											else
												{
													//echo "Success".'\n';
														// setting session variables;
													$_SESSION['u_id']=$id;
													$_SESSION['u_name']=$username;
													$_SESSION['u_pass']=$pass;
													//echo $_SESSION['u_id']." ".$_SESSION['u_name']." ".$_SESSION['d_pic'].'\n';
												if($check=="yes") // creating cookies
													{
														//echo"cookie creating";
														$u_cookie="username";
														$uid_cookie="userid";
														$upass_cookie="password";
														
														$u_cookie_val=$username;
														$uid_cookie_val=$id;
														$upass_cookie_val=$pass;
														
														setcookie($u_cookie,$u_cookie_val,time()+86400*30,"/","","",TRUE);
													    setcookie($uid_cookie,$uid_cookie_val,time()+86400*30,"/","","",TRUE);
														setcookie($upass_cookie,$upass_cookie_val,time()+86400*30,"/","","",TRUE);
													
													}
													include("browser.php");
													include("ip.php");
													$brow=getbrowser();
													$browser=$brow['name'];
													$ip=getip();
													if($ip=="::1")
														$ip="127.0.0.1";
													$lastlogin=date("Y-m-d h:i:s",time());
													$q="UPDATE user_login SET ip='$ip',browser='$browser',last_login='$lastlogin' WHERE User_name='$username' LIMIT 1";
																	mysqli_query($con,$q); 
													session();		//calling the function to create session	
													
												}
												
									}
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
		<style>
				.err
					{
						color:red;
						font-size:12px;
						margin-bottom:-6px;
					}
			
			</style>
		
		<!-- Scripts --->
		<!--
			FOR GOOGLE PLUS LOGIN
		<script src="https://apis.google.com/js/client:platform.js"  async defer></script>
		<script>function signinCallback(authResult) {
  if (authResult['status']['signed_in']) {
    // Update the app to reflect a signed in user
    // Hide the sign-in button now that the user is authorized, for example:
    document.getElementById('signinButton').setAttribute('style', 'display: none');
  } else {
    // Update the app to reflect a signed out user
    // Possible error values:
    //   "user_signed_out" - User is signed-out
    //   "access_denied" - User denied access to your app
    //   "immediate_failed" - Could not automatically log in the user
    console.log('Sign-in state: ' + authResult['error']);
  }
}</script>-->
		<script src="a.htm" async></script>
		<script src="js/modernizr.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/my_file.js"></script>
<!--#########################################################################################################################-->

<body class="page-home">
<!--<div id="fb-root"></div>-->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
			<h1 class="show-for-medium-up">Welcome back!</h1>
			<h2 class="show-for-medium-up">Login to your account below </h2>
			<p class="err">
				<?php
					if($loginErr!="")
					echo $loginErr;
				
				?>
			
			</p>
			<form novalidate="" action="signin.php" method="post" data-abide="">
				<fieldset class="input-container text-center">
					<div class="input-wrapper">
							<p class="err">
								<?php
									if($emailErr!="")
									echo $emailErr;
								?>
							</p>	
						<input id="email" name="email" placeholder="Email Address" type="text">
					</div>
					<div class="input-wrapper">
						<p class="err">
							<?php
								if($passwordErr!="")
								echo $passwordErr;
							?>
						</p>
						<input id="password" name="password" placeholder="Password" type="password">
					</div>
				</fieldset>
				<input id="remember" name="remember" value="yes" checked="checked" type="checkbox">Remember me</label>
				<input id="csrf" name="csrf" value="e8ecfc302b8a10c74bc218744d06eeaf" type="hidden">
				<input value="Login" class="button medium round" type="submit" name="login">
			</form>
			<div class="provider-signup">
				<div class="divider">
					<div class="word">OR</div>
				</div>
				<div class="row">
					<div class="columns small-6">
					  <span id="signinButton">
  <span
    class="g-signin"
    data-callback="signinCallback"
    data-clientid="841484227118-a6jf7ero5r8abfjbge6dt5nf5u2dr42p.apps.googleusercontent.com"
    data-cookiepolicy="single_host_origin"
    data-requestvisibleactions="http://schema.org/AddAction"
    data-scope="https://www.googleapis.com/auth/plus.login">
  </span>
</span>
					</div>
					<div class="columns small-6">
		<div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false"></div>
					</div>
				</div>
            </div>
        </div>
		<div class="form-links text-center">
					<p class="forgotten-password"><a href="#">Forgotten password?</a></p>
					<p class="create-account"><a href="signup.php">Create an Account<span>›</span></a></p>
		</div>
    </div>
  </div>
</div>

<!-- Popup Div Ends Here -->
</body>
</html>