<?php
session_start();
if (isset($_POST['log'])){
    $oun=$_POST['o_username'];
    $nun=$_POST['n_username'];
    $ps=$_POST['password'];
    $cps=$_POST['c_password'];

    if(strlen($oun)<1||strlen($nun)<1||strlen($ps)<1||strlen($cps)<1){
        echo "Please enter all the form fields";
    }
    elseif(strlen($ps)<8){
        $message="password must be atleast 8 character";
      }
    elseif($pass!=$cps){
        $message="password not matched";
      }
    else{
        include("../components/conn.php");
        $chk_us=$con->prepare("SELECT username,password FROM addis_abeba_tour.admin WHERE username=?");
        $chk_us->execute([$oun]);
        if($chk_us->rowCount()<1){
            // $mess="Invalid Username";
            echo "no username";
        }
        
        else{
        $chk_ps=$con->prepare("SELECT password FROM addis_abeba_tour.admin where password = ?");
        $chk_ps->execute([$ps]);
        if($chk_ps->rowCount()<1){
                $chk_upd=$con->prepare("Update addis_abeba_tour.admin set username=? , password=? WHERE username=?");
                $update=$chk_upd->execute([$nun,$ps,$oun]); 
                if($update)     {
                    echo "sucessfully updated";
                }
            }
            else{
                echo "this password is taken";
            }      
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
    <title>Document</title>
    <link rel="stylesheet" href="adm.css">
</head>
<body>
<form method="post" action="ad_update.php">
    <div class="container">
        <p>Updating Account</p>
        <div class="row">
            <input type="text" placeholder="Username" name="o_username"/>
            <input type="text" placeholder="New Username" name="n_username"/>
            <input type="password" placeholder="New Password" name="password"/>
            <input type="password" placeholder="Confirm Password" name="c_password"/>
            <button type="submit" name="log">Login</button>
        </div>
    </div>
    </form>
</body>
</html>