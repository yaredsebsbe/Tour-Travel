<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/log2.css">
</head>
<body>
    <form method="post">
    <p>Addis<strong>Tour</strong></p>
    <div class="form">
        <input type="text" placeholder="Email" name="email" class="input">
        <input type="password" placeholder="Password" name="password" class="input" id="pass_area">
        <h3><?php echo ($message);?></h3>
        
        <div class="remember"> 
        <button type="submit" name="submit">Login</button>
        <div class="rem"> <input type="checkbox" name="remember" class="chk">  Remember me </div>
