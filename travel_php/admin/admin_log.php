<?php
session_start();
if (isset($_POST['log'])){
    $un=$_POST['username'];
    $ps=$_POST['password'];

    if(strlen($un)<1||strlen($ps)<1){
        $mess="Please enter Username and Password";
    }
    else{
        include("../components/conn.php");
        $chk_us=$con->prepare("SELECT * FROM addis_abeba_tour.admin WHERE username=?");
        $r=$chk_us->execute([$un]);
        if($chk_us->rowCount()<1){
            // $mess="Invalid Username";
            echo "Invalid Username";
        }
        else{
            $row = $chk_us->fetch(PDO::FETCH_ASSOC);
            $chPas=$row['password'];
            if($ps!=$chPas){
                echo "Invalid Password";
            }
            else{
                $_SESSION['aid']=$chPas;
                $_SESSION['uname']=$row['username'];
                echo "sucessfully logged in";
                Header("Location: dashboard.php");
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
<form method="post" action="admin_log.php">
    <div class="container">
        <p>Welcome Back</p>
        <div class="row">
            <input type="text" placeholder="Username" name="username"/>
            <input type="password" placeholder="Password" name="password"/>
            <button type="submit" name="log">Login</button>
        </div>
    </div>
    </form>
</body>
</html>