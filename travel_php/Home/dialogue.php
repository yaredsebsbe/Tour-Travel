<?php
session_start();

include("login_check.php");
 log_chk('t_accounts','u_email','u_password','u_id','u_fname','u_lname');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <button class="open">Login</button>
    <dialog class="modal">
        <form method="post">
            <div class="log-container">
            <h1>Login</h1>
            <div class="inputs">
                <input type="text" placeholder="Email" name="email"><br>
                <input type="Password" placeholder="Password" name="password">
                <p class="warn"><?php echo $_SESSION['message'];?></p>
            </div>
            <div class="links">
                <button class="button" type="submit" name="submit">Login</button>
                <a href="#" class="open">forget password</a>
            </div>
            <a href="#" class="back">back to home</a>
            </div>
        </form>
    </dialog>
</body>
<script>
    const modal=document.querySelector('.modal');
    const open=document.querySelector('.open');
    const close=document.querySelector('.button');

    open.addEventListener('click',()=>{
        modal.showModal();
    });
    
</script>
</html>