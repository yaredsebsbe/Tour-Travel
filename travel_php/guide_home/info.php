<?php
$id=$_SESSION['g_id'];
include('../components/conn.php');
$infos=$con->prepare("SELECT * FROM addis_abeba_tour.guides WHERE g_id=?");
$infos->execute([$id]);
if ($infos->rowCount()>0){
    $row=$infos->fetch(PDO::FETCH_ASSOC);
    $fname=$row['g_fname'];
    $lname=$row['g_lname'];
    $email=$row['g_email'];
    $qual=$row['g_qualification'];
    $phno=$row['g_phone_num'];

    $name=$fname." ".$lname;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/g_home2.css">
</head>
<body>
    <h2>Guide Information</h2>
    <div class="infos">
        <div class="inputs"> Name <input type="text" class="info" name="first_name" value="<?php echo $name ?>"></div>
        <div class="inputs"> Email <input type="text" class="info" name="first_name" value="<?php echo $email ?>"></div>
        <div class="inputs"> Qualification <input type="text" class="info" name="first_name" value="<?php echo $qual ?>"></div>
        <div class="inputs"> Phone Number <input type="text" class="info" name="first_name" value="<?php echo $phno ?>"></div>
        <div class="inputs"> First Name <input type="text" class="info" name="first_name" value=""></div>
        <div class="inputs"> First Name <input type="text" class="info" name="first_name" value=""></div>
        <button type="submit" name="update">Update</button>
    </div>
</body>
</html>