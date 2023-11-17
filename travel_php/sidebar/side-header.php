<?php
include('../components/conn.php');
$prof=$con->prepare("SELECT * FROM addis_abeba_tour.guides WHERE g_id=?");
$prof->execute([$session_id]);
if($prof->rowCount()>0){
    $rows=$prof->fetch(PDO::FETCH_ASSOC);
    $head_fname=$rows['g_fname'];
    $head_lname=$rows['g_lname'];
    $head_email=$rows['g_email'];
    $head_img=$rows['g_profile_image'];
    $full_name=$head_fname." ".$head_lname;    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="last_guide_css.css">
</head>
<body>
    <div class="header">
        <div class="side-nav">
            <div class="user">
                <img src="../test/profiles/<?php echo $head_img;?>" class="user-img"> 
            <div>
                <h2><?php echo $full_name;?></h2>
                <p><?php echo $head_email;?></p>
            </div>
            <img src="images/star.png" class="star-img">
        </div>
        <ul>
            <li><img src="images/dashboard.png"><a href="side.php">Dashboard</a></li>
            <li><img src="images/package.png"><a href="pack_list.php">Packages</a></li>
            <li><img src="images/history.png"><a href="create_packages.php">Create Package</a></li>
            <li><img src="images/booked.png"><a href="booked.php">Booked User</a></li>
            <li><img src="images/personal_info.png"><a href="personal_info.php">Personal Info</a></li>

            <li><img src="images/Messages.png"><a href="message.php">Message</a></li>
        </ul>
        <ul>
            <li><img src="images/Logout.png"><a href="logout.php">Logout</a></li>
        </ul>
    </div>  
    <div class="main">
        <div class="head">
            <h2>Addis Tour Guide Home</h2>
        </div>