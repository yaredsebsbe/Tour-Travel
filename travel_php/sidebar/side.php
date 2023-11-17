<?php
session_start();
if(isset($_COOKIE['gcookie'])|| isset($_SESSION['g_id'])){
    $session_id='';
    if(isset($_SESSION['g_id'])){
        $session_id=$_SESSION['g_id'];
    }
    else if(isset($_COOKIE['gcookie'])){
        $session_id=$_COOKIE['gcookie'];
    }
    
include('side-header.php');

$data1=$con->prepare("SELECT * FROM addis_abeba_tour.packages WHERE g_id=?");
$data1->execute([$session_id]);
$P_row=$data1->rowCount();

$status1="waiting";
$data2=$con->prepare("SELECT * FROM addis_abeba_tour.packages WHERE g_id=? and pack_status=?");
$data2->execute([$session_id,$status1]);
$Pw_row=$data2->rowCount();

$data3=$con->prepare("SELECT * FROM addis_abeba_tour.book WHERE g_id=?");
$data3->execute([$session_id]);
$B_row=$data3->rowCount();

$status2="Approved";
$data4=$con->prepare("SELECT * FROM addis_abeba_tour.packages WHERE g_id=? and pack_status=?");
$data4->execute([$session_id,$status2]);
$Pa_row=$data4->rowCount();
?>

        <div class="row">
            <div class="box">
                <img src="images/package.png" class="dash-image">
                <h3>Created Package</h3>
                <p><?php echo $P_row ?></p>
            </div>
            <div class="box">
                <img src="images/package.png" class="dash-image">
                <h3>Booked Times</h3>
                <p><?php echo $B_row ?></p>
            </div>
            <div class="box">
                <img src="images/booked.png" class="dash-image">
                <h3>Waiting Packages</h3>
                <p><?php echo $Pw_row ?></p>
            </div>
            <div class="box">
                <img src="images/package.png" class="dash-image">
                <h3>Approed Package</h3>
                <p><?php echo $Pa_row ?></p>
            </div>
        </div>
    </div> 
</body>
</html>
<?php
}
else{
    Header("Location: ../forms/g_login.php");
}