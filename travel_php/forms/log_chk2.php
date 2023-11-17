<?php
$message='';
$confirm;
$owner;

$tab_name="";
$em="";
$pasw="";
$ids="";
$names="";
$uem;
$upas;
    session_start();
    // include("../components/conn.php");

if(isset($_POST['submit'])){
  $uem=$_POST['email'];
  $upas=$_POST['password'];
if(empty($uem)||empty($upas)){
    global $message;
    $message="please fill all the form";
    $_SESSION[$ids]='';
     //if user enter nothing
  }
else{
  op();
}
}
function op(){
    include("../components/conn.php");
   global $tab_name;
   global $em;
   global $pasw;
   global $ids;
   global $names;
   global $uem;
   global $upas;
    
    $check_em=$con->prepare("SELECT * FROM addis_abeba_tour.$tab_name where $em=?");//check if this email is already exists
  $check_em->execute([$uem]);
  if($check_em->rowCount()>0){
  $check_pas=$con->prepare("SELECT $pasw,$ids,$names FROM addis_abeba_tour.$tab_name where $em=?");//selecting the password
  $check_pas->execute([$uem]);
  $fetch_accounts = $check_pas->fetch(PDO::FETCH_ASSOC);
  $pas=$fetch_accounts[$pasw];
  
  if($upas==$pas){
    global $confirm;
    global $message;
    $confirm='sucess';
    $id=$fetch_accounts[$ids];
    $nme=$fetch_accounts[$names];
    $_SESSION[$ids]=$id;
    $_SESSION[$names]=$nme;
    global $owner;
    $owner=$_SESSION[$names];
    // $message=$_SESSION[$names];
    
    
  }
  else{
    global $message;
    $message="wrong password";
    $_SESSION[$ids]='';
  }
  }
  else{
    global $message;
    $message="login failed, email not found";
    $_SESSION[$ids]='';
  }
}


function forgotPassword($tab_name,$uname,$ema,$pasw){
  include("../components/conn.php");
 
  if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    if(empty($fname)||empty($email)||empty($pass)||empty($cpass)){
      global $message;
      $message="please fill all the form"; //if user enter nothing
    }
    elseif(strlen($pass)<8){
      global $message;
      $message="password must be atleast 8 character";
    }
    elseif($pass!=$cpass){
      global $message;
      $message="password not matched";
    }
    else{
      $chkName=$con->prepare("select $uname from addis_abeba_tour.$tab_name where $uname=?");
      $chkName->execute([$fname]);
      if($chkName->rowCount()>0){
      $chkEmail=$con->prepare("select $ema from addis_abeba_tour.$tab_name where $uname=?");
      $chkEmail->execute([$fname]);
      $fetch_accounts = $chkEmail->fetch(PDO::FETCH_ASSOC);
      $em=$fetch_accounts[$ema];
        if($email==$em){
      $chkPas=$con->prepare("select $pasw from addis_abeba_tour.$tab_name where $pasw=?");
      $chkPas->execute([$pass]);
      if($chkPas->rowCount()>0){
        global $message;
        $message="password taken";
      }
      else{
        global $confirm;
        $confirm='sucess';
        $upd=$con->prepare("update addis_abeba_tour.$tab_name set $pasw=? where $ema=?");
        $upd->execute([$pass,$email]);
        }
      }
      else{
        global $message;
        $message="wrong email";
      }
    }
    
    else{
      global $message;
      $message="There is no guide available in this name!";
    }

}
  }
}

  ?>