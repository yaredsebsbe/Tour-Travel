<?php
$message='';
if(isset($_POST['register'])){

  $message="";
  $G_fname=$_POST['fname'];
  $G_lname=$_POST['lname'];
  $G_email=$_POST['email'];
  $G_pass=$_POST['pass'];
  $g_age=$_POST['age'];
  $G_phone=$_POST['phone'];
  $G_regDate=date("Y-m-d");
  $G_qual1=$_POST['qual1'];
  $G_qual2=$_POST['language'];
  $G_nation=$_POST['nat'];
  $G_city=$_POST['city'];
  $G_subcity=$_POST['subcity'];
  $G_approval="waiting";
  
  



  $G_gender=$_POST['gender'];//don't forget to modify
  if($G_gender=='male'){
    $sex="male";
  }
  if($G_gender=='female'){
    $sex="female";
  }

  if(
    strlen($G_fname)<1||strlen($G_lname)<1||strlen($G_email)<1||
    strlen($G_pass)<1||strlen($g_age)<1||strlen($G_phone)<1||
    strlen($G_regDate)<1||strlen($G_qual1)<1||
    strlen($G_qual2)<1||strlen($G_nation)<1){
      $message="please enter full information to register";
    }
    elseif(!preg_match("/^[a-zA-Z]+$/",$G_fname)||!preg_match("/^[a-zA-Z]+$/",$G_lname)){
      $message="name must be a letter";
    }
    elseif(!filter_var($G_email,FILTER_VALIDATE_EMAIL)){
      $message="invalid email address";
    }
    elseif(strlen($G_pass)<8){
      $message="password must be at least 8 character";
    }
    elseif(!preg_match("/^[0-9]*$/",$G_phone)){
      $message="phone number must be a number";
    }
    elseif($g_age<18){
      $message="age must be greater than 18";
    }
    else{
      include("../components/conn.php");
      $out=$con->prepare("SELECT * FROM `addis_abeba_tour`.`guides` where g_email=? or g_password=?");
    $out->execute([$G_email,$G_pass]);
    $row=$out->fetch(PDO::FETCH_ASSOC);
      if($out->rowCount()>0){
    $message=" There is user in this email or password";
      }
      else{  
        $img_name="user.png";
        $hashed_pass=password_hash($G_pass, PASSWORD_DEFAULT);     
        $insert=$con->prepare("INSERT INTO `addis_abeba_tour`.`guides` (`g_fname`, `g_lname`, `g_email`, `g_password`, `g_age`, `g_nationality`,`g_city`,`g_subcity`, `g_phone_num`, `g_registered_date`,`g_profile_image`, `g_gender`,`g_qualification`,`g_languages`,`g_status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
        $insert->execute(array($G_fname, $G_lname, $G_email,$hashed_pass,$g_age, $G_nation,$G_city,$G_subcity, $G_phone,$G_regDate,$img_name,$sex,$G_qual1,$G_qual2,$G_approval));
        Header("Location: g_login.php");
    }  
}
}
?>