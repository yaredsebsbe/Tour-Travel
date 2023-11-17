<?php
session_start();
if(isset($_COOKIE['tcookie'])|| isset($_SESSION['u_id'])){

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
    <link rel="stylesheet" href="home-style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>AddisTour</h2>
            <ul>
                <a href="#"><li>Home</li>
                <a href="#"><li>Packages</li>
                <a href="#"><li>Guides</li>
                <a href="#"><li>Booked Package</li>
                <a href="#"><li>About</li>
                <a href="#" class="logout"><li>Logout</li></a>
            </ul>
        </div>
        <section class="p-list">
            <h2>Packages</h2>

            <?php 
include('../components/conn.php');
$list=$con->prepare("SELECT * FROM addis_abeba_tour.packages");
$list->execute();
if($list->rowCount()>0){
    while($row= $list->fetch(PDO::FETCH_ASSOC)){
        
        $img=$row['pack_img'];
        $id=$row['pack_id'];
        $name=$row['pack_name'];
        $description=$row['pack_description'];
        $price=$row['pack_price'];
        $owner=$row['g_name'];
        ?>


                    <div class="packages">
                <img src="../test/Package-Pic/<?php echo $img; ?>">
                <div class="description">
                    <h3>Package Name: <?php echo $name; ?> </h3>
                    <h4>Guide Name: A<?php echo $owner; ?></h4>
                    <p>Description:<?php echo $description; ?></p>
                    <a href="#" class="detail">Detail</a>
                </div>
                <div class="detail"><a href="#" >Book</a></div>
            </div>
            <?php   
                }
            }
            ?>
            
        </section>
    </div>
</body>
</html>
<?php
}
else{
    echo "hello world";
}