<?php
session_start();
if(isset($_COOKIE['gcookie'])|| isset($_SESSION['g_id'])){
    $session_id='';
    $mess_err="";
    if(isset($_SESSION['g_id'])){
        $session_id=$_SESSION['g_id'];
    }
    else if(isset($_COOKIE['gcookie'])){
        $session_id=$_COOKIE['gcookie'];
    }
    
    include('../components/conn.php');
        $message=$con->prepare("SELECT g_message FROM addis_abeba_tour.guides where g_id=?");
        $message->execute([$session_id]);

        if($message->rowCount()>0){
            $row= $message->fetch(PDO::FETCH_ASSOC);
            $messages=$row['g_message'];
            if(strlen($messages)<1){
                $messages="No message available";
            }
        }
        else{
            $mess_err="No message available";
        }
    if(isset($_POST['remove'])){
        $delete_mess=$con->prepare("UPDATE `addis_abeba_tour`.`guides` set g_message=? where g_id=?");
        $delete_mess->execute([$mess,$session_id]);
        Header('Location: pack_list.php');
    }
    include('side-header.php');
?>

        <form method="post">
            <div class="contents">
                <h3>Notifications</h3>
                <div class="message">
                    <h2>Message</h2>
                    <p><?php echo $messages;?> </p>
                    <p><?php echo $mess_err; ?></p>
                    <button type="submit" name="remove">Remove</button>
                </div>
            </div>
</form>
            </div>
        </div>
    </form>
    </body>
</html>
<?php
}
else{
    Header("Location: ../forms/g_login.php");
}