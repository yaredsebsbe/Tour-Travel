<?php
session_start();

?>


<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tour Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

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
							<div id="colorlib-logo"><a href="index.php">Addis Tour</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="active"><a href="index.php">Home</a></li>
								<li ><a href="packages.php">Packge</a></li>
								<li>
									<a href="tours.php">Tour Areas</a>				
								</li>
								<li><a href="guides.php">Guides</a></li>
								<?php
								
									if(isset($_SESSION['u_id'])>0){

										$session_id='';
										if(isset($_SESSION['u_id'])){
											$session_id=$_SESSION['u_id'];
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
			   	<li style="background-image: url(images2/aa5.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Addis Tour</h2>
				   					<h1>The Destination matters</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images2/aa4.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Capture the best memory ever</h2>
				   					<h1>Addis Ababa</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images2/aa6.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluids">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Explore our most tavel agency</h2>
				   					<h1>Invest on your self</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images2/redTerror.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Experience the</h2>
				   					<h1>Best Trip Ever</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div id="colorlib-reservation">

		</div>

		<div id="colorlib-services">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-3 animate-box text-center aside-stretch">
						<div class="services">
							<span class="icon">
								<i class="flaticon-around"></i>
							</span>
							<h3>Our Beautiful City</h3>
							<p>Addis Ababa, Ethiopia’s sprawling capital in the highlands bordering the Great Rift Valley, is the country’s commercial and cultural hub. </p>
						</div>
					</div>
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<i class="flaticon-boat"></i>
							</span>
							<h3>Tourists</h3>
							<p>Immerse yourself in the rich history and captivating stories of Addis Ababa. Explore ancient ruins that whisper tales of civilizations past, or stroll through charming cobblestone streets lined with architectural marvels.</p>
						</div>
					</div>
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<i class="flaticon-car"></i>
							</span>
							<h3>Guides</h3>
							<p>Calling all passionate and knowledgeable tour guides! Join our dynamic team and embark on a rewarding journey showcasing the wonders of Addis Ababa.</p>
						</div>
					</div>
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<i class="flaticon-postcard"></i>
							</span>
							<h3>Nice Support</h3>
							<p>It IS Never To Late To Be What You Might Have Been</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="colorlib-tour colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Popular Destination</h2>
						<p>I can't change the direcion of the wind, but I can adjust my sails to always reach my destination.</p>
					</div>
				</div>
			</div>
			<div class="tour-wrap">
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images2/afeworkTekle.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 105 Reviews</p>
						<h2>Afework Tekle House</h2>
						<span class="price"></span>
						
						<span class="city">Addis Ababa, Ethiopia</span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images2/dergMonument.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 244 Reviews</p>
						<h2>Derg Monument</h2>
						
						<span class="price"></span>
						<span class="city">Addis Ababa, Ethiopia</span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images2/ethnologicalMuseum2.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 1243 Reviews</p>
						<h2>Ethnological Museum</h2>
						
						<span class="price"></span>
						<span class="city">Addis Ababa, Ethiopia</span>

					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images2/holytrinity2.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 711 Reviews</p>
						<h2>Holy Trinity Cathedra</h2>
						
						<span class="price"></span>
						<span class="city">Addis Ababa, Ethiopia</span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images2/merkato1.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 2027 Reviews</p>
						<h2>Merkato Gebya</h2>
						<span class="city">Addis Ababa, Ethiopia</span>
						
						<span class="price"></span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images2/nationalMuseum2.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 1545 Reviews</p>
						<h2>National Museum</h2>
						
						<span class="price"></span>
						<span class="city">Addis Ababa, Ethiopia</span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images2/redTerror.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 901 Reviews</p>
						<h2>Red terror martyrs memories</h2>
						<span class="price"></span>
						
						<span class="city">Addis Ababa, Ethiopia</span>
					</span>
				</a>
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(images2/scGeorge.jpg);">
					</div>
					<span class="desc">
						<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 149 Reviews</p>
						<h2>Sc George</h2>
						<span class="price"></span>
						<span class="city">Addis Ababa, Ethiopia</span>
					</span>
				</a>
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
