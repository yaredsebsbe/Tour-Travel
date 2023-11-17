<?php

include("signCheck.php")
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َSign Up Page</title>
    <link rel="stylesheet" href="../assets/css/log2.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon.png">
  </head>
  <body>

  <form method="post" action="signup.php">
    <p class="title">Addis<strong>Tour</strong></p>
    <div class="form sign">
  <input type="text" name="fname" placeholder="First Name" class="input">
  <input type="text" name="lname" placeholder="Last Name" class="input">
  <input type="text" name="email" placeholder="Email" class="input">
  <input type="password" name="pass" placeholder="Password" class="input">
  <input type="password" name="pass2" placeholder="Confirm Password" class="input">
  <h3><?php echo ($message);?></h3>
  <button type="submit" name="sign">Sign Up</button>
        <span>
            <!-- <a href="t_login.php">login</a> -->
        </span>
        </form>
    </div>
</div>
</body>
</html>
