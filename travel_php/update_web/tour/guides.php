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
							<div id="colorlib-logo"><a href="index.html">Adiss Tour</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li ><a href="packages.php">Packge</a></li>

								<li>
									<a href="tours.php">Tour Areas</a>				
								</li>							

								<li class="active"><a href="guides.php">Guides</a></li>
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
			   	<li style="background-image: url(images2/buna1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
			
				   					<h1>Guides</h1>
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
						<div class="row">
							<div class="col-md-12">
								<div class="wrap-division">
									<div class="col-md-12 col-md-offset-0 heading2 animate-box">
										<h2>Tour Guides</h2>
									</div>
									<form method="post">
									<div class="search_box">
										<input type="search" name="search" placeholder="enter guide's first name">
										<button type="submit" name="search_btn"><img src="images/search.png" alt=""></button>
									</div>
									</form>
									<div class="row">

<?php
include("../../components/conn.php");

if(isset($_POST['search_btn'])&& strlen($_POST['search'])>0){
	$key=$_POST['search'];
	$g_out = $con->prepare("SELECT * FROM addis_abeba_tour.guides where g_fname = ? and g_status='approved'");
	$g_out->execute([$key]);
	if ($g_out->rowCount() > 0) {

	  while ($row = $g_out->fetch(PDO::FETCH_ASSOC)) {
		$id = $row['g_id'];
		$fname = $row['g_fname'];
		$lname = $row['g_lname'];
		$email = $row['g_email'];
		$qualification = $row['g_qualification'];
		$language = $row['g_languages'];
		$img=$row['g_profile_image'];
		$name=$fname." ".$lname;
		  		  
	  ?>
	<div class="col-md-12 animate-box">
											<div class="room-wrap">
												<div class="row">
													<div class="col-md-6 col-sm-6">
														<div class="room-img" style="background-image: url(../../test/profiles/<?php echo $img;
														 ?>);"></div>
													</div>
													<div class="col-md-6 col-sm-6">
														<div class="desc">
															<h2><?php echo $name; ?></h2>	
															<p>Qualification: <?php echo $qualification; ?></p>
															<p>Email:<?php echo $email; ?></p>
															<p>Language:<?php echo $language; ?></p>
															<p><a href="packages.php?g_id=<?=$id?>" class="btn btn-primary">Packages</a></p>
														</div>
													</div>
												</div>
											</div>
	</div>

	  <?php
	  
	}
  }
  else{
  echo  "<h2>No user in this Name</h2>";
  }
}
else{         
	$g_out = $con->prepare("SELECT * FROM addis_abeba_tour.guides where g_status='approved'");
	$g_out->execute();
	if ($g_out->rowCount() > 0) {

	  while ($row = $g_out->fetch(PDO::FETCH_ASSOC)) {
		$id = $row['g_id'];
		$fname = $row['g_fname'];
		$lname = $row['g_lname'];
		$email = $row['g_email'];
		$qualification = $row['g_qualification'];
		$language = $row['g_languages'];
		$img=$row['g_profile_image'];
		$name=$fname." ".$lname;
		  		  
	  ?>
	<div class="col-md-12 animate-box">
											<div class="room-wrap">
												<div class="row">
													<div class="col-md-6 col-sm-6">
														<div class="room-img" style="background-image: url(../../test/profiles/<?php echo $img;
														 ?>);"></div>
													</div>
													<div class="col-md-6 col-sm-6">
														<div class="desc">
															<h2><?php echo $name; ?></h2>	
															<p>Qualification: <?php echo $qualification; ?></p>
															<p>Email:<?php echo $email; ?></p>
															<p>Language:<?php echo $language; ?></p>
															<p><a href="packages.php?g_id=<?=$id?>" class="btn btn-primary">Packages</a></p>
														</div>
													</div>
												</div>
											</div>
	</div>

	  <?php
	  
	}
  }
  else{
  echo  "<h2>No user in this Name</h2>";
  }

  }
?>
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
