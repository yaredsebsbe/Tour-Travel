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
	
	<link rel="stylesheet" href="css/bootstrap.css">

	

	<link rel="stylesheet" href="css/flexslider.css">

	

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="book-style.css">

	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/respond.min.js"></script>

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
								<li class="active"><a href="index.php">Home</a></li>
								<li ><a href="packages.php">Packge</a></li>
								<li>
									<a href="tours.php">Tour Areas</a>				
								</li>
								<li><a href="guides.php">Guides</a></li>
								
									<li>
									<a href="Book.php">Booked Info</a>				
								</li>
								<li>
									<a href="logout.php">Logout</a>				
								</li>
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
	<div class="book-container">
		<div class="book-head">
			<h1>Book Information</h1>
		</div>
		<?php
		if(isset($_SESSION['u_id'])>0 || isset($_COOKIE['tcookie'])){

			$session_id='';
			if(isset($_SESSION['u_id'])){
				$session_id=$_SESSION['u_id'];
			}
			else if(isset($_COOKIE['tcookie'])){
				$session_id=$_COOKIE['tcookie'];
			}
		include("../../components/conn.php");
		$info_out=$con->prepare("SELECT * FROM addis_abeba_tour.book WHERE u_id=? order by bk_id desc limit 1");
        $info_out->execute([$session_id]);
		if($info_out->rowCount() > 0){
        $fetch = $info_out->fetch(PDO::FETCH_ASSOC);
		$bid=$fetch['bk_id'];
        $pname=$fetch['bk_package'];
		$Adate=$fetch['bk_arrival_date'];
		$gid=$fetch['g_id'];
        
		$info_out2=$con->prepare("SELECT * FROM addis_abeba_tour.guides WHERE g_id=?");
        $info_out2->execute([$gid]);
		
        $fetch2 = $info_out2->fetch(PDO::FETCH_ASSOC);
		$gfname=$fetch2['g_fname'];
		$glname=$fetch2['g_lname'];
		$gemail=$fetch2['g_email'];
		$gphone=$fetch2['g_phone_num'];

		$full_nam=$gfname." ". $glname;
        
	
		?>
		<div class="book-data">
			<div class="book-data1"><h2>Booked Package: <?php echo $pname ?></h2></div>
			<div class="book-data1"><h4>Guide Name: <?php echo $full_nam?></h4></div>
			<div class="book-data1"><h4>Guide Email: <?php echo $gemail?></h4></div>
			<div class="book-data1"><h4>Guide Phone number: <?php echo $gphone?></h4></div>
			<div class="book-data1"><h4>Arrival Date: <?php echo $Adate?></h4></div>
			<a href="cancel.php?bk_id=<?=$bid?>" onclick="return checkDelete()">Cancel Booking</a>
		</div>
		<?php
			}else{
				echo "<h2>There is No Booked Package Yet</h2>";
			}
		}
		?>
	</div>
</body>
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
	<script>
		function checkDelete() {
        return confirm('Are you sure you want to delete this Guide');
    }
</script>
	</script>
</html>