<?php
session_start();
$message='';
$success='';
$owner;

// function login_check($tab_name,$em,$pasw,$ids,$fname,$lname) { 
    
//   include("../components/conn.php");

// if(isset($_POST['submit'])){
//   $uem=$_POST['email'];
//   $upas=$_POST['password'];
// if(empty($uem)||empty($upas)){//if email and password are empty
//   global $message;
//     $message="please fill all the form";
//     $_SESSION[$ids]='';
//      //if user enter nothing
//   }
// else{
//   $check_em="";
//   if($tab_name=="guides"){
//     $g_status="approved";
//     $check_em=$con->prepare("SELECT * FROM addis_abeba_tour.$tab_name where $em=? and g_status=?");//check if this email is already exists
//     $check_em->execute([$uem,$g_status]);
//   }
//   else{
//     $check_em=$con->prepare("SELECT * FROM addis_abeba_tour.$tab_name where $em=?");//check if this email is already exists
//     $check_em->execute([$uem]);
//   }
  
  
//   if($check_em->rowCount()>0){
//   $fetch_accounts = $check_em->fetch(PDO::FETCH_ASSOC);
//   $pas=$fetch_accounts[$pasw];
//   $eml=$fetch_accounts[$em];
  
//   // $password_verify=password_verify($upas,$pas);
//   if($pas==$upas){
//     global $confirm;
//     $confirm='sucess';
//     $id=$fetch_accounts[$ids];
//     $fnme=$fetch_accounts[$fname];
//     $lnme=$fetch_accounts[$lname];
//     $full_name=$fnme." ".$lnme;

//     $_SESSION[$ids]=$id;
//     $_SESSION[$fname]=$full_name;
//     $_SESSION[$em]=$eml;
//     $time=15*24*3600;   //15 days in second 1,296,000
//     if(isset($_POST['remember'])){
//       if($tab_name=='guides'){
//         setcookie('gcookie',$id,time()+$time,"/");//cookie for 15 days
//       }
//       else{
//         setcookie('tcookie',$id,time()+$time,"/");//cookie for 15 days
//       }  
//     }
//     if($tab_name=='guides'){
//       Header("Location: ../sidebar/side.php");
//     }
//     else{
//       if(isset($_SESSION['booking'])){
//         Header('Location:../session.php');
//       }
//       else{
//         Header('Location:../home/packages.php');
//       }
//     }
//   }
//   else{   //if password is invalid
//     global $message;
//     $message="wrong password";
//     $_SESSION[$ids]='';
//   }
//   }
//   else{
//     global $message;
//     $message="login failed, email not found";
//     $_SESSION[$ids]='';
//   }
// }
// }
// }
//end of login check function


function forgotPassword($tab_name,$uname,$ema,$pasw,$link){
  include("../components/conn.php");
 
  if(isset($_POST['submit'])){
    $fname=ucfirst($_POST['fname']);
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    if(empty($fname)||empty($email)||empty($pass)||empty($cpass)){
      global $message;
      $message="please fill all the form!"; //if user enter nothing
    }
    
    else{
      $chkName=$con->prepare("select $uname,$ema from addis_abeba_tour.$tab_name where $ema=?");
      $chkName->execute([$email]);
      if($chkName->rowCount()>0){
      $fetch_accounts = $chkName->fetch(PDO::FETCH_ASSOC);
      $em=$fetch_accounts[$ema];
      $fn=$fetch_accounts[$uname];
        if($email==$em){
          if($fname==$fn){
      $chkPas=$con->prepare("select $pasw from addis_abeba_tour.$tab_name where $pasw=?");
      $chkPas->execute([$pass]);
      if($chkPas->rowCount()>0){
          global $message;
        $message="password taken!";
      }
      elseif(strlen($pass)<8){
        global $message;
        $message="password must be atleast 8 character!";
      }
      elseif($pass!=$cpass){
        global $message;
        $message="password not matched!";
      }
      else{
          $upd_pass=password_hash($pass, PASSWORD_DEFAULT);
        $upd=$con->prepare("update addis_abeba_tour.$tab_name set $pasw=? where $ema=?");
        $upd->execute([$upd_pass,$email]);
        if($upd){
          session_destroy();
          Header("Location: $link");
          // setcookie('tcookie', time() - 3600);
          
          // if($tab_name=='t_accounts'){
          //   setcookie('tcookie', time() - 3600);
          //   Header('Location: t_login.php');
          // }
          // else{
          //   setcookie('gcookie', time() - 3600);
          //   Header('Location: g_login.php');
          // }
          
        }
        else{
          global $message;
          $message="someting wrong, try again later.";
        }
        
        }
      }
      else{
        global $message;
        $message="name is invalid, please enter valid name!";
      }
      }
      else{
          global $message;
        $message="wrong email";
      }
    }
    
    else{
      global $message;
      $message="There is no guide available in this email!";
    }

}
  }
}

//end of forgotten password function
  ?>