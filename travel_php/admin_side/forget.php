<?php
if (isset($_POST['confirm'])){
    $fname=ucfirst($_POST['fname']);
    $lname=ucfirst($_POST['lname']);
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $message='';

    if(strlen($fname)<1||strlen($lname)<1||strlen($username)<1||strlen($password)<1||strlen($cpassword)<1){
        $message="Please enter full information";
    }
    
    else{
        include("../components/conn.php");
        $chk_em=$con->prepare("SELECT * FROM addis_abeba_tour.admin WHERE username=?");
        $chk_em->execute([$username]);
        if($chk_em->rowCount()>0){
            $row=$chk_em->fetch(PDO::FETCH_ASSOC);
            $fn=$row['first_name'];
            $ln=$row['last_name'];
            if($fn!=$fname){
                $message="first name is invalid. please enter a valid name";
            }
           else if($ln!=$lname){
                $message="last name is invalid. please enter a valid name";
            }
            else if(strlen($password)<8){
                $message="Password character must be at least 8 characters";
            }
            elseif($password!=$cpassword){
                $message="Password doesn't match";
            }
            else{
                $pass_hash=password_hash($password,PASSWORD_DEFAULT);
                $ch_pass=$con->prepare("SELECT password FROM addis_abeba_tour.admin where password=?");
                $ch_pass->execute([$pass_hash]);
                if($ch_pass->rowCount()>0){
                    $message="Password is taken";
                }//if entered password is taken or not
                else{
                $upd=$con->prepare("UPDATE addis_abeba_tour.admin SET 
                password=? Where username=?");
                $upd->execute([$pass_hash,$username]);
                if($upd){
                    Header("Location: login.php");

                }
            }
        }
    }
        else{
            $message="There is no user in this username!";
        }


    }
}
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="#" method="post">
    <div class="log-cont">
        <div class="head">
            <h2>Forgot Password</h2>
        </div>
        <div class="row">
            <div class="inputs">
                <div class="warn">
                    <p>
                      <?php if(strlen($message)>0){
                        echo "<style>.warn p{
                          display: block;
                        }</style>";
                        echo $message;
                    }
                        ?></p>
                </div>
                <div class="pass">
                    <input type="text" placeholder="First Name" name="fname">
                </div>
                <div class="pass">
                    <input type="text" placeholder="Last Name" name="lname">
                </div>
                <div class="pass">
                    <input type="text" placeholder="Username" name="username">
                </div>

                <div class="pass">
                    <input type="password" placeholder="New Password" id="pass_area" name="password">
                    <img src="eye.png" alt="" id="password" onclick="pass()">
                </div>
                <div class="pass">
                    <input type="password" placeholder="Confirm Password" id="pass_area2" name="cpassword">
                    <img src="eye.png" alt="" id="password2" onclick="conf()">
                </div>
                <div class="link">
                <a href="login.php">Login</a>
                </div>
                <button type="submit" name="confirm">Confirm</button>
            </div>
        </div>

    </div>
</form>
</body>
<script>
    var a,b;
    function pass(){
    if(a==1){
        document.getElementById('pass_area').type='password';
        document.getElementById('password').src='eye.png';


        a=0;
    }
    else{
        document.getElementById('pass_area').type='text';
        document.getElementById('password').src='hide.png';
        a=1;
    }
}
    function conf(){
    if(b==1){
        document.getElementById('pass_area2').type='password';
        document.getElementById('password2').src='eye.png';
        b=0;
    }
    else{
        document.getElementById('pass_area2').type='text';
        document.getElementById('password2').src='hide.png';
        b=1;
    }
}
</script>
</html>
