<?php
include('log_chk.php');
forgotPassword($ftab,$fname,$femail,$fpassw);
if(isset($confirm)){
    Header($loc);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <form method="post">
    <p>Addis<strong>Tour</strong></p>
    <div class="form">
        <input type="text" placeholder="First Name" name="fname">
        <input type="text" placeholder="Email" name="email">
        <input type="password" placeholder="New Password" name="pass">
        <input type="password" placeholder="Confirm Password" name="cpass">
        <h3><?php echo ($message);?></h3>
        <p class="success"><?php echo ($success);?></p>
        <button type="submit" name="submit">Reset</button>
        <span>
            <a href=<?php echo $link; ?>>login</a>
        </span>
    </div>
</div>
</body>
</html>
        