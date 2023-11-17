<?php
include("regChk.php");

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Guide Registration Form </title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="register.css" />
  </head>
  <body>
    
    <section class="container">
   
      <header><p> Addis <strong>Tour</strong></p>Guide Registration Form</header>
      <form action="" class="form" method="post">
      <div class="warn">
          <p><?php echo $message;?></p>
        </div>
        <div class="input-box">
          <label for="fname">First Name</label>
          <input type="text" name="fname"/>
        </div>
        <div class="input-box">
          <label>Last Name</label>
          <input type="text" name="lname" />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text"  name="email"/>
        </div>
         <div class="input-box">
          <label>Password</label>
          <input type="password" name="pass" />
        </div>
        <div class="column">
          <div class="input-box">
            <label>Age</label>
            <input type="number" name="age"/>
          </div>

        
          <div class="input-box">
            <label>Phone Number</label>
            <input type="text" name="phone"/>
          </div>
         
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" value="male" checked />
              <label for="check-male" value="male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="female"/>
              <label for="check-female" value="female">Female</label>
            </div>
            
          </div>
        </div>
        <div class="input-box address">
          <label>Qualifications</label>
          <input type="text" name="qual1"/>
          <label>Language</label>
          <input type="text" name="language"/>
          <label>Nationality</label>
          <input type="text"  name="nat"/>
          <label>City</label>
          <input type="text"  name="city"/>
          <label>Subcity</label>
          <input type="text"  name="subcity"/>
         
        </div>
        <button type="submit" name="register">Register</button>
      </form>
    </section>
  </body>
</html>

