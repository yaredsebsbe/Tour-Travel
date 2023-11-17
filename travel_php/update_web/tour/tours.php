<?php
session_start();

?>


<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tour Template</title>
	


	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
	<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.html">ADDIS TOUR</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li ><a href="packages.php">Packge</a></li>

								<li class="active">
									<a href="tours.php">Tour Areas</a>				
								</li>
								<li><a href="guides.php">Guides</a></li>
								<?php
								
									if(isset($_SESSION['u_id'])>0){

										$session_id='';
										if(isset($_SESSION['u_id'])){
											$session_id=$_SESSION['u_id'];
										}
										else if(isset($_COOKIE['tcookie'])){
											$session_id=$_COOKIE['tcookie'];
										}
									?>
									<li>
									<a href="Book.php">Booked Info</a>				
								</li>
								<li>
									<a href="logout.php">Logout</a>				
								</li>
								<?php
								}else{?>
								<li class="has-dropdown active">
									<a href="#">login</a>
									<ul class="dropdown">
										<li><a href="../../forms/t_login.php">Login for Tourist</a></li>
										<li><a href="../../forms/g_login.php">Login for guide</a></li>
									</ul></li>
									<li class="has-dropdown active">
										<a href="#">signup</a>
										<ul class="dropdown">
											<li><a href="../../forms/signup.php">Signup for Tourist</a></li>
											<li><a href="../../forms/register.php">Signup for guide</a></li>
										</ul></li>
								<?php 
							}
							?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images2/holytrinity2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Addis Tour</h2>
				   					<h1>Destination matters</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="rows">
							<div class="wrap-division">
								<div class="col-md-6 col-sm-6 animate-box">
									<div class="tour">
										<a href="tour-place.html" class="tour-img" style="background-image: url(images/meskel2.jpg);">

										</a>
										<span class="desc">

											<h2><a href="tour-place.html">Meskel Adebabay</a></h2>
											<span class="city">Addis Ababa, Ethiopia</span>
										</span>

									</div>
								</div>

								<div class="col-md-6 col-sm-6 animate-box">
									<div class="tour">
										<a href="tour-place.html" class="tour-img" style="background-image: url(images2/aa4.jpg);">

										</a>
										<span class="desc">

											<h2><a href="tour-place.html">Africa Union</a></h2>
											<span class="city">Addis Ababa, Ethiopia</span>
										</span>
									</div>
								</div>





								<div class="col-md-6 col-sm-6 animate-box">
									<div class="tour">
										<a href="tour-place.html" class="tour-img" style="background-image: url(images2/aa5.jpg);">

										</a>
										<span class="desc">

											<h2><a href="tour-place.html">Entoto park</a></h2>
											<span class="city">Addis Ababa, Ethiopia</span>
										</span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 animate-box">
									<div class="tour">
										<a href="tour-place.html" class="tour-img" style="background-image: url(images2/yekatit12.jpg);">

										</a>
										<span class="desc">

											<h2><a href="tour-place.html">Yekatit 12</a></h2>
											<span class="city">Addis Ababa, Ethiopia</span>
										</span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 animate-box">
									<div class="tour">
										<a href="tour-place.html" class="tour-img" style="background-image: url(images2/redTerror2.jpg);">

										</a>
										<span class="desc">

											<h2><a href="tour-place.html">RED TEROOR</a></h2>
											<span class="city">Addis Ababa, Ethiopia</span>
										</span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 animate-box">
									<div class="tour">
										<a href="tour-place.html" class="tour-img" style="background-image: url(images2/sm2.jfif);">

										</a>
										<span class="desc">

											<h2><a href="tour-place.html">SCIENCE  MUSEUM</a></h2>
											<span class="city">Addis Ababa, Ethiopia</span>
										</span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 animate-box">
									<div class="tour">
										<a href="tour-place.html" class="tour-img" style="background-image: url(images2/nationalMuseum2.jpg);">

										</a>
										<span class="desc">

											<h2><a href="tour-place.html">NATIONAL MUSEUM</a></h2>
											<span class="city">Addis Ababa, Ethiopia</span>
										</span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 animate-box">
									<div class="tour">
										<a href="tour-place.html" class="tour-img" style="background-image: url(images2/shromeda.jfif);">

										</a>
										<span class="desc">
											
											<h2><a href="tour-place.html">SHERO MEDA</a></h2>
											<span class="city">Addis Ababa, Ethiopia</span>
										</span>

									</div>

								</div>

							</div>
						</div>

					</div>

					<!-- SIDEBAR-->


				</div>
			</div>
		</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>Addis Ababa Tour</h4>
						<p>The jorney of thousnad miles begins with a single step.</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Book Now</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="bookForm.php">Tour</a></li>
		
							</ul>
						</p>
					</div>
					<div class="col-md-2">
						<h4>Register</h4>
						<ul class="colorlib-footer-links">
							<li><a href="../../forms/register.php">Tourist Registe</a></li>
							<li><a href="../../forms/register.php">Guide Registe</a></li>
						</ul>
					</div>

					<div class="col-md-3 col-md-push-1">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>Addis Ababa, Gurji <br>Around Unity Uiversity</li>
							<li><a href="tel://00000000">0989823321</a></li>
							<li><a href="mailto:yaredyh11@gmail.com">yaredyh11@gmail.com</a></li>

						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">

					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<!-- jQuery -->
<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
