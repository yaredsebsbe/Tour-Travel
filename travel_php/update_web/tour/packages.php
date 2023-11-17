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

	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/flexslider.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="css/style.css">

	<script src="js/modernizr-2.6.2.min.js"></script>
	

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
								<li><a href="index.php">Home</a></li>
								<li class="active"><a href="packages.php">Packge</a></li>

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
			   	<li style="background-image: url(images2/ethiopia.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Package</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		
	<form method="post">
		<div class="pack_search_box">
			<input type="search" name="search" placeholder="enter Place name">
			<button type="submit" name="search_btn"><img src="images/search.png" alt=""></button>
		</div>
</form>

		<div class="colorlib-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="wrap-division">

							<?php

include("../../components/conn.php");

if(isset($_GET['g_id'])){
	$gid=$_GET['g_id'];
	if(isset($_POST['search_btn'])&& strlen($_POST['search'])>0){
		$key=$_POST['search'];
		$p_out = $con->prepare("SELECT * FROM addis_abeba_tour.packages where pack_name = ? , g_id=? , pack_status='approved'");
		$p_out->execute([$key,$gid]);
		if ($p_out->rowCount() > 0) {
	
		  while ($row = $p_out->fetch(PDO::FETCH_ASSOC)) {
			$id = $row['pack_id'];
			$name = $row['pack_name'];
			$type = $row['pack_type'];
			$feature = $row['pack_feature'];
			$location = $row['pack_location'];
			$description = $row['pack_description'];
			$price = $row['pack_price'];
			$img = $row['pack_img'];
			$pack_creator = $row['pack_creator'];
			
				
		  ?>
		<div class="col-md-6 col-sm-6 animate-box">
										<div class="hotel-entry">
											<a href="hotel-room.html" class="hotel-img" style="background-image: url(../../test/Package-Pic/<?php echo $img; ?>);">
												<p class="price"><span><?php echo $price ?></span><small>/person</small></p>
											</a>
											<div class="desc">
												<h3><?php echo $name; ?></h3>
												<p class="place">Location: <?php echo $location ?></p>
												<p>Type: <?php echo $type ?></p>
												<p>Features: <?php echo $feature ?></p>
												<p>Description: <?php echo $description ?></p>
												<p><a href="bookForm.php?pack_id=<?=$id;?>" class="book">Book</a></p>
											</div>
										</div>
									</div>
	
	
		  <?php
		  
		}
	  }
	  else{
	  echo  "<h2>No Package is created in this place</h2>";
	  }
	}

	else{         
		$p_out = $con->prepare("SELECT * FROM addis_abeba_tour.packages where pack_status='approved'and g_id=?");
		$p_out->execute([$gid]);
		if ($p_out->rowCount() > 0) {
	
		  while ($row = $p_out->fetch(PDO::FETCH_ASSOC)) {
	
			$id = $row['pack_id'];
			$name = $row['pack_name'];
			$type = $row['pack_type'];
			$feature = $row['pack_feature'];
			$location = $row['pack_location'];
			$description = $row['pack_description'];
			$price = $row['pack_price'];	
			$img = $row['pack_img'];
									
		  ?>
		<div class="col-md-6 col-sm-6 animate-box">
										<div class="hotel-entry">
											<a href="hotel-room.html" class="hotel-img" style="background-image: url(../../test/Package-Pic/<?php echo $img; ?>);">
												<p class="price"><span><?php echo $price; ?></span><small>/ /person</small></p>
											</a>
											<div class="desc">
												<h3><?php echo $name; ?></h3>
												<p class="place">Location: <?php echo $location ?></p>
												<p>Type: <?php echo $type ?></p>
												<p>Features: <?php echo $feature ?></p>
												<p>Description: <?php echo $description ?></p>
												<p><a href="bookForm.php?pack_id=<?=$id;?>" class="book">Book</a></p>
											</div>
										</div>
									</div>
	
	<?php
		  
		}
	  }
	  else{
	  echo  "<h2>No Package is created by this Guide</h2>";
	  }
	
	  }
}

else{

if(isset($_POST['search_btn'])&& strlen($_POST['search'])>0){
	$key=$_POST['search'];
	$p_out = $con->prepare("SELECT * FROM addis_abeba_tour.packages where pack_name = ? and pack_status='approved'");
	$p_out->execute([$key]);
	if ($p_out->rowCount() > 0) {

	  while ($row = $p_out->fetch(PDO::FETCH_ASSOC)) {
		$id = $row['pack_id'];
		$name = $row['pack_name'];
		$type = $row['pack_type'];
		$feature = $row['pack_feature'];
		$location = $row['pack_location'];
		$description = $row['pack_description'];
		$price = $row['pack_price'];
		$img = $row['pack_img'];
		$pack_creator = $row['pack_creator'];
		
		
		  		  
	  ?>
	<div class="col-md-6 col-sm-6 animate-box">
									<div class="hotel-entry">
										<a href="hotel-room.html" class="hotel-img" style="background-image: url(../../test/Package-Pic/<?php echo $img; ?>);">
											<p class="price"><span><?php echo $price ?></span><small>/person</small></p>
										</a>
										<div class="desc">
											<h3><?php echo $name; ?></h3>
											<p class="place">Location: <?php echo $location ?></p>
											<p>Type: <?php echo $type ?></p>
											<p>Features: <?php echo $feature ?></p>
											<p>Description: <?php echo $description ?></p>
											<p class="place">Guide: <?php echo $pack_creator ?></p>
											<p><a href="bookForm.php?pack_id=<?=$id;?>" class="book">Book</a></p>
										</div>
									</div>
								</div>


	  <?php
	  
	}
  }
  else{
  echo  "<h2>No Package is created by this guide</h2>";
  }
}
else{         
	$p_out = $con->prepare("SELECT * FROM addis_abeba_tour.packages where pack_status='approved'");
	$p_out->execute();
	if ($p_out->rowCount() > 0) {

	  while ($row = $p_out->fetch(PDO::FETCH_ASSOC)) {

		$id = $row['pack_id'];
		$name = $row['pack_name'];
		$type = $row['pack_type'];
		$feature = $row['pack_feature'];
		$location = $row['pack_location'];
		$description = $row['pack_description'];
		$price = $row['pack_price'];	
		$img = $row['pack_img'];
		$pack_creator = $row['pack_creator'];
		$g_id=$row['g_id'];

		

		  		  
	  ?>
	<div class="col-md-6 col-sm-6 animate-box">
									<div class="hotel-entry">
										<a href="hotel-room.html" class="hotel-img" style="background-image: url(../../test/Package-Pic/<?php echo $img; ?>);">
											<p class="price"><span><?php echo $price; ?></span><small> /person</small></p>
										</a>
										<div class="desc">
											<h3><?php echo $name; ?></h3>
											<p class="place">Location: <?php echo $location ?></p>
											<p>Type: <?php echo $type ?></p>
											<p>Features: <?php echo $feature ?></p>
											<p>Description: <?php echo $description ?></p>
											<p class="place">Guide: <?php echo $pack_creator ?></p>
											<p><a href="bookForm.php?pack_id=<?=$id;?>" class="book">Book</a></p>
										</div>
									</div>
								</div>


	  <?php
	  
	}
  }
  else{
  echo  "<h2>No Package is created by this guide</h2>";
  }

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
