<?php
session_start();
if(!isset($_COOKIE['u_id'])){
$tab_name='guides';
$em='g_email';
$pasw='g_password';
$ids='g_id';
$fname='g_fname';
$lname='g_lname';

$message='';
$owner;

include("../components/conn.php");

    if(isset($_POST['submit'])){
    $uem=$_POST['email'];
    $upas=$_POST['password'];
    if(empty($uem)||empty($upas)){//if email and password are empty
    global $message;
        $message="please fill all the form";
        $_SESSION[$ids]='';
        //if user enter nothing
    }
    else{
        $check_em=$con->prepare("SELECT * FROM addis_abeba_tour.$tab_name where $em=?");//check if this email is already exists
        $check_em->execute([$uem]);

        if($check_em->rowCount()>0){
        $fetch_accounts = $check_em->fetch(PDO::FETCH_ASSOC);
        $pas=$fetch_accounts[$pasw];
        $eml=$fetch_accounts[$em];
        $status=$fetch_accounts['g_status'];
    
    $dehash_pas=$password_verify=password_verify($upas,$pas);
    if($dehash_pas){
        global $confirm;
        $confirm='sucess';
        $id=$fetch_accounts[$ids];
        $fnme=$fetch_accounts[$fname];
        $lnme=$fetch_accounts[$lname];
        $full_name=$fnme." ".$lnme;
    
        $_SESSION[$ids]=$id;
        $_SESSION[$fname]=$full_name;
        $_SESSION[$em]=$eml;
        $time=15*24*3600;   //15 days in second 1,296,000
        if(isset($_POST['remember'])){
        if($tab_name=='guides'){
            setcookie('gcookie',$id,time()+$time,"/");//cookie for 15 days
        }
        else{
            setcookie('tcookie',$id,time()+$time,"/");//cookie for 15 days
        }  
        }
        if($status=="approved"){
            Header("Location: ../sidebar/side.php");
        }
        else{
            Header("Location: ../sidebar/waiting_stage.php");
        }
        
        
    }
    else{   //if password is invalid
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
}









 include("user_login.php");

?>
        <div class="rem txt">
            <a href="register.php">Sign Up</a>
            <a href="g_forget.php">Forget Password</a>
        </div>
    </div>
</div>
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
<?php
}
else{
    Header('Location:../admin/dashboard.php');
}
