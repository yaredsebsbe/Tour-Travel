              <?php
// include("regChk.php");

include('../components/conn.php');


$check_name=$con->prepare("select * from addis_abeba_tour.packages");//this code is to get package name from database
$check_name->execute();
if($check_name->rowCount()>0){
  $gname="test";
  while ($fetch_accounts = $check_name->fetch(PDO::FETCH_ASSOC))
  {
    $option=$fetch_accounts['pack_name'];
    $gname=$fetch_accounts['g_name'];
    ?>

    <option value="<?php echo $gname; ?>"><?php echo $option; ?></option>
    <?php
    echo "package";
  }
  $_SESSION['g_name']=$gname;
}
else{
  echo "hello";

}


?>