<?php session_start()?>


<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Guide Registration Form </title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../assets/css/reg2.css" />
  </head>
  <body>
    
    <section class="container">
   
      <header><p> Addis <strong>Tour</strong></p>Book Form</header>
      <form action="" class="form" method="post">
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
          <label>Phone Number</label>
          <input type="number" name="pass" />
        </div>
        <div class="column">
          <div class="input-box">
            <label>Arrival Date</label>
            <input type="date" name="dob"/>
          </div>

        
          <div class="input-box">
            <label>Package Name</label>
            <select>
              <option selected disabled>select package</option>
              
              <?php include('p_lists.php') ?>

            </select>
          </div>
         
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" checked />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" />
              <label for="check-female">Female</label>
            </div>
            
          </div>
        </div>
        <div class="input-box address">
          <label>Guide Name</label>
          <input type="text" name="qual1" value="<?php echo $_SESSION['g_name']; ?>" />
          <label>Qualification 2</label>
          <input type="text" name="qual2"/>
          <label>Nationality</label>
          <input type="text"  name="nat"/>
         
        </div>
        <button type="submit" name="register">Register</button>
      </form>
    </section>
  </body>
</html>

