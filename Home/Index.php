	<?php	
	 include("checklogin.php");
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
		<link href="css/css.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/fontello.css">
		<link rel="stylesheet" href="css/main.css">
		<style type="text/css">
        </style>
		
		
		<!-- Scripts --->
		<script src="a.htm" async></script>
		<script src="js/modernizr.js"></script>
		<script src="js/jquery.js"></script>
		<script type="text/javascript">
				var newwindow=null;
			function popitup(url,name) {
			  newwindow=window.open(url,name,'height=900,width=900');
			if (window.focus) {newwindow.focus()}
			return false;
			}
        </script>
</head>
<!--#########################################################################################################################-->

<body class="page-home theme-music">
		<div class="off-canvas-wrap" data-offcanvas="">
		  <div class="inner-wrap">
				<aside class="right-off-canvas-menu">
					<ul class="wz-sidenav">
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact Us</a></li>
					</ul>
				</aside>
				<header class="main-header">
					<div class="row">
						<div class="columns small-4 medium-3">
						  <a href="#"><img src="images/logo-b.png"></a>
						</div>
						<div class="columns small-8 clearfix">
							<nav class="main-nav right  show-for-large-up">
								<ul>
										<li><a href="#">Home</a></li>
										<li><a href="#">About</a></li>
										<li><a href="#">Contact Us</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</header>
		</div>
	</div>
<!--------------------------------------------------------------------------------------------------------------------------------->  

 <!--------------------------------------------------------------------------------------------------------------------------->
<div class="intro-banner">
  <div class="row">
    <div class="columns small-12 intro-banner-content">
        <h1>Welcome To <br> PhotoGraphica</h1>
        <h2>View and Hire Best Photographers around You</h2>
		<a href="#" class="button large round outline" onClick="return popitup('signin.php','SIGN IN')">Sign In</a>
		<a href="#" class="button large round outline" onClick="return popitup('signup.php','REGISTER')">Register</a>
		
		<div class="theme-image show-for-medium-up">
			<img style="opacity: 1;" class="music" src="images/photographer4.png">
			<img style="opacity: 0;" class="restaurant" src="images/photographer3.png">
			<img style="opacity: 0;" class="wedding" src="images/photographer1.png">
			<img style="opacity: 0;" class="fitness" src="images/photographer2.png">
			<img style="opacity: 0;" class="photographer" src="images/photographer5.png">
		</div>

    </div>
  </div>
</div>

<!--#######################################################################################################################-->

<div class="main-content">
				<div class="sub-content">
					<div class="row collapse">
						<form class="tpl-search" action="/templates" method="get" id="searchform">
							<div class="columns large-4 show-for-large-up">
								<div class="row collapse">
									<div class="columns small-4">
										<label for="tpl-search-category">Genre</label>
									</div>
									<div class="columns small-8">
										<select id="category" name="category">
											<option selected="selected" value="0">All Genre</option>
											<option value="28">Architecture & Real Estate</option>
											<option value="29">Beauty & Fashion</option>
											<option value="30">Blank Templates</option>
											<option value="42">Blog & Portfolio</option>
											<option value="31">Business & Consultant</option>
											<option value="33">Computers & Technology</option>
											<option value="52">Construction & Trade</option>
											<option value="34">Design & Creative</option>
											<option value="36">Hotels & Travel</option>
											<option value="37">Lifestyle</option>
											<option value="38">Music & Entertainment</option>
											<option value="39">Night Life</option>
											<option value="40">One Pagers</option>
											<option value="53">Pets & Animals</option>
											<option value="41">Photography & Art</option>
											<option value="51">Professional Services</option>
											<option value="35">Restaurants & Eateries</option>
											<option value="44">Sport & Leisure</option>
											<option value="43">Wedding</option>
										</select>
									</div>
								</div>
							</div>
							<div class="columns large-8 small-12 text-center">
								<input type="text" id="tpl-search-input" name="q" class="search-input round outline" placeholder="Enter Location" />
							</div>
						</form>
					</div>
				</div>
</div>
<!--------------------------------------------------------------------------------------------------------------------------->

<script type="text/javascript">

  var viewPortWidth = $(window).width();
  var themeNow = 0;

  // Set the order of the change
  var themeArray = [
    "music",
    "restaurant",
    "photographer",
    "fitness",
    "wedding"
  ];

  $(function (){
    if (viewPortWidth >= 641) {
      var themeInt = self.setInterval(
        changeTheme, 5000
      );
    }

    function changeTheme(){
      $('.theme-image img.' + themeArray[themeNow]).css('opacity', 0);
      $('body').removeClass('theme-' + themeArray[themeNow]);

      themeNow = (themeNow + 1) % themeArray.length;

      $('body').addClass('theme-' + themeArray[themeNow]);
      $('.theme-image img.' + themeArray[themeNow]).css('opacity', 1);
    }


    // Promoted Features Slider
    var owl = $("#promoted-features").owlCarousel({
      navigation: false,
      slideSpeed: 500,
      pagination: false,
      singleItem: true
    });

    // Promoted Features, Custom Navigation Events
    $("#promoted-features-next").click(function(){
      owl.trigger('owl.next');
    })
    $("#promoted-features-prev").click(function(){
      owl.trigger('owl.prev');
    })

    // Mobile templates slider
    var owlMobile = $("#mobile-templates").owlCarousel({
      navigation: false,
      slideSpeed: 500,
      pagination: false,
      singleItem: true
    });

  });

</script>
    
<footer class="main-footer">
  <div class="row">
    <div class="columns large-2 medium-3 show-for-medium-up">
      <nav class="footer-nav ">
        <div class="footer-title">
          Getting Started        </div>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About Us</a></li>
                      <li><a href="#" rel="nofollow" onClick="MM_openBrWindow('signup.php','','width=1000,height=1000')">Sign Up</a></li>
        </ul>
      </nav>
    </div>
    <div class="columns large-2 medium-3 show-for-medium-up">
      <nav class="footer-nav">
        <div class="footer-title">Learn More</div>
        <ul>
          <li><a rel="me" href="http://help.sitey.com/">Support</a></li>
          <li><a href="https://www.sitey.com/compare">Compare</a></li>
                      <li><a href="#" rel="nofollow" onClick="MM_openBrWindow('signin.html','','width=400,height=600')">Login</a></li>
        </ul>
      </nav>
    </div>
    <div class="columns large-2 medium-3 show-for-medium-up">
      <nav class="footer-nav">
        <div class="footer-title">Company</div>
        <ul>
          <li><a href="#">Affiliates</a></li>
          <li><a href="#">Terms of Service</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </nav>
    </div>
    <div class="columns large-2 show-for-large-up">

    </div>
  </div>
  <div class="row"></div>
</footer>
<script>
/**
 * Override desination for signup, used on templates for signup flow
 */
$(document).ready(function (){
  var $signupFormAction;

  $('.signupAction').click(function () {

    $signupFormAction = $(this).data('signup-action');

    $('#signupModelForm').attr('target', '_blank');
  });

  $('#signupModelForm').submit(function (event){
    if ($signupFormAction){
      $(this).attr('action', $signupFormAction);
      setTimeout(function (){
          document.location = '/templates';
      }, 1500);
    }
  });
});
</script>
<!--[if lt IE 9]>
<script src="/theme/bower_components/REM-unit-polyfill/js/rem.min.js"></script>

<![endif]-->

<script src="images/main.js"></script>

  <script>
    (function (i, s, o, g, r, a, m)
    {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function ()
      {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(
      window, document, 'script', '//www.google-analytics.com/analytics.js',
      'ga'
    );
    ga('create', 'UA-53253096-3', 'auto');
    ga('require', 'linkid', 'linkid.js');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
  </script>
<div id="signupModal" class="reveal-modal signup" data-reveal="">

  <div class="row">
    <div class="columns small-12 text-center">
      <h2>
        Build your FREE website today      </h2>

      <h3>
        Sign up below to get started      </h3>

      <form novalidate id="signupModelForm" action="https://signup.sitey.com/?destination=https%3A%2F%2Fmy.sitey.com%2Ftemplates" method="post" data-abide="">
        <div class="input-wrapper">
          <label for="name">Full Name</label>
          <input id="name" name="name" placeholder="Full Name" type="text">
          <small class="error triangle-border">
            Name required.          </small>
        </div>
        <div class="input-wrapper">
          <label for="email">Email Address</label>
          <input id="email" name="email" placeholder="Email Address" type="text">
          <small class="error triangle-border">
            Valid email address required.          </small>
        </div>
        <div class="input-wrapper">
          <label for="password">Choose a Password</label>
          <input id="password" name="password" placeholder="Choose a Password" type="password">
          <small class="error triangle-border">
            Password required.          </small>
        </div>
        <input value="Sign Up Free" class="button large round" type="submit">
      </form>

      
      <p class="notice">
        By creating an account you agree to our <a href="https://www.sitey.com/terms" target="_blank"> Terms </a> and
        <a href="https://www.sitey.com/privacy" target="_blank"> Privacy </a> Policies      </p>
    </div>
  </div>
  <a href="#" class="close-reveal-modal">×</a>
</div>
<!-- Begin TNT Tracking -->
<script src="images/tntprint.js" type="text/javascript"></script><canvas style="display: none;" height="35" width="35"></canvas>
  <!-- End TNT Tracking -->


<iframe style="display: none; width: 0px; height: 0px;" scrolling="no" class="igtranslator-iframe" src="images/a.htm" frameborder="0"></iframe>
<div title="Click to Show Translation" style="background-image: url(&quot;resource://jid1-dgnibwqga0sibw-at-jetpack/igtranslator/data/content_script/icon.png&quot;); display: none;" class="igtranslator-activator-icon">
</div>
</body>
</html>