<?php
$message='';
if(isset($_POST['sign'])){
  $ufn=$_POST['fname'];
  $uln=$_POST['lname'];
  $uem=$_POST['email'];
  $upas=$_POST['pass'];
  $upas2=$_POST['pass2'];

  $hashP=password_hash($upas,PASSWORD_DEFAULT);

  
  if(strlen($upas)<1 || strlen($ufn)<1 || strlen($uln)<1|| strlen($uem)<1){
    global $message;
    $message="please fill all required fields";
  }
  elseif(strlen($upas)<8){
    global $message;
    $message="password must be at least 8 character";
  }
  elseif($upas!=$upas2){
    global $message;
    $message="password must be matched";
  }
  elseif(!preg_match("/^[a-zA-Z]+$/",$ufn)||!preg_match("/^[a-zA-Z]+$/",$uln)){
    global $message;
    $message="name must be a letter";
  }
  elseif(!filter_var($uem,FILTER_VALIDATE_EMAIL)){
    global $message;
    $message="invalid email address";
  }

  elseif(!preg_match("/^[0-9A-Za-z]*$/",$upas)){
    global $message;
    $message="password number must be a combination of letter and number";
  }
  
  else{
    include("../components/conn.php");
    $out=$con->prepare("SELECT * FROM `addis_abeba_tour`.`t_accounts` where u_email=? or u_password=?");
    $out->execute([$uem,$upas]);
    $row=$out->fetch(PDO::FETCH_ASSOC);

      if($out->rowCount()>0){
        global $message;
        $message="there is user in this email or password";
      }
      else{
    $insert = $con->prepare("INSERT INTO `addis_abeba_tour`.`t_accounts` (`u_fname`, `u_lname`, `u_email`, `u_password`)  VALUES(?,?,?,?)");
    $insert_test=$insert->execute([$ufn,$uln,$uem,$hashP]);
    $mess='inserted :)';
    if($insert_test){
      Header("Location:t_login.php");
    }
    else{
      echo "oh! noo :(";
    }
  }
}
}