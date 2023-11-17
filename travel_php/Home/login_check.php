<?php 
function log_chk($tab_name,$em,$pasw,$ids,$fname,$lname) { 

    include("../components/conn.php");
    $_SESSION['message']='';
    if(isset($_POST['submit'])){
        $uem=$_POST['email'];
        $upas=$_POST['password'];
        if(empty($uem)||empty($upas)){//if email and password are empty
            $_SESSION['message']="please enter email and password";
              $_SESSION[$ids]='';
              $login_success='false';
               //if user enter nothing
            }
            else{
    $check_em=$con->prepare("SELECT * FROM addis_abeba_tour.$tab_name where $em=?");//check if this email is already exists
    $check_em->execute([$uem]);
    if($check_em->rowCount()>0){
    $fetch_accounts = $check_em->fetch(PDO::FETCH_ASSOC);
    $pas=$fetch_accounts[$pasw];
    $eml=$fetch_accounts[$em];
    
    if($upas==$pas){
      $id=$fetch_accounts[$ids];
      $fnme=$fetch_accounts[$fname];
      $lnme=$fetch_accounts[$lname];
      $full_name=$fnme." ".$lnme;
      $_SESSION[$ids]=$id;
      $_SESSION[$fname]=$full_name;
      $_SESSION[$em]=$eml;
      echo $_SESSION[$fname];
      $login_success='true';
    //   <!-- if(isset($_POST['remember'])){
    //     setcookie($ids,$pasw,time()+60,"/");//cookie for 1 minute
    //     echo "cookie setted";
    //   } -->
    
    }
    else{   //if password is invalid
      $_SESSION['message']="Invalid password, try again";
      $_SESSION[$ids]='';
    }
    }
    else{
        $_SESSION['message']= "Invalid email address";
    }//end of email checking
    
  }
  while($login_success=='false'){
    ?>
  <script>
        open.addEventListener('click',()=>{
        modal.showModal();
    });
  </script>
    <?php
  }
}
}

  //end of login check function
  