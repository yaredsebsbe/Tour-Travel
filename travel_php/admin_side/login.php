<?php
session_start();
if (isset($_POST['log'])){
    $un=$_POST['username'];
    $ps=$_POST['password'];
    $message='';

    if(strlen($un)<1||strlen($ps)<1){
        $message="Please enter Username and Password";
    }
    else{
        include("../components/conn.php");
        $chk_us=$con->prepare("SELECT * FROM addis_abeba_tour.admin WHERE username=?");
        $r=$chk_us->execute([$un]);
        if($chk_us->rowCount()<1){
            // $mess="Invalid Username";
            $message= "Invalid Username";
        }
        else{
            $row = $chk_us->fetch(PDO::FETCH_ASSOC);
            $chPas=$row['password'];
            $verify= password_verify($ps,$chPas);

            if(!$verify){
                $message= "Invalid Password";
            }
            else{
                $_SESSION['aid']=$row['id'];
                $_SESSION['uname']=$row['username'];
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
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="#" method="post">
    <div class="log-cont">
        <div class="head">
            <h2>Login</h2>
        </div>
        <div class="row">
            <div class="inputs">
                <div class="warn">
                    <p>
                        <?php if(strlen($message)>0){
                        echo "<style>.warn p{
                        display: block;
                        }</style>";
                        echo $message;}
                        ?>
                    </p>
                </div>
                <div class="pass">
                <input type="text" placeholder="Username" name="username">
                </div>
                <div class="pass">
                    <input type="password" placeholder="Password" id="pass_area" name="password">
                    <img src="eye.png" alt="" id="password" onclick="pass()">
                </div>
                <div class="link">
                <a href="forget.php">forgot password?</a>
                </div>
                <button type="submit" name="log">Login</button>
            </div>
        </div>

    </div>
</form>
</body>
<script>
    var a;
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
</script>
</html>
