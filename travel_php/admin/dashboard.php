<?php
include('operation1.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="dash.css">
<body>
    <div class="container">
    <h1>DASHBOARD</h1>
    <form method="post">
        <div class="row">
            <p class="wel">Welcome!</p>
            <p class="p"><?php echo $_SESSION['uname'] ?></p>
            <button type="submit" class="btn" name="submit">Update Profile</button>
        </div>
        <div class="row">
            <p class="wel"><?php num_user("guides");?></p>
            <p class="p">number of guide</p>
            <button type="submit"  name="guideList">Guide List</button>
        </div>
        <div class="row">
            <p class="wel"><?php num_user("t_accounts");?></p>
            <p class="p">number of Tourists</p>
            <button type="submit" class="btn" name="tList">Tourists List</button>
        </div>
        <div class="row">
            <p class="wel">320</p>
            <p class="p">All tourist</p>
            <button type="submit" class="btn" name="submit">List All Tourists</button>
        </div>
        <div class="row">
            <p class="wel"><?php num_user("packages");?></p>
            <p class="p">Number of Packages</p>
            <button type="submit" class="btn" name="pList">Package</button>
        </div>
        <div class="row">
            <p class="wel">4</p>
            <p class="p">Booked Lists</p>
            <button type="submit" class="btn" name="submit">Package List</button>
        </div>
        <div class="row">
            <p class="wel">3</p>
            <p class="p">UnApproved Guides</p>
            <button type="submit" class="btn" name="g_unapproved">Update Profile</button>
        </div>
        <div class="row">
            <p class="wel">Welcome!</p>
            <p class="p">admin</p>
            <button type="submit" class="btn" name="submit">Update Profile</button>
        </div>
        <div class="row">
            <p class="wel">Welcome!</p>
            <p class="p">admin</p>
            <button type="submit" class="btn" name="submit">Update Profile</button>
        </div>
        </form>
    </div>
</body>
</html>