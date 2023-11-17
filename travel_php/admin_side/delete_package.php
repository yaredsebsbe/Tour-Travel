<?php
if(isset($_GET['key'])){

$key=$_GET['key'];
$dec_iv='1234567891011121';
$dec_key="AddisTour";
$ciphering = "AES-128-CTR";
$option=0;
$decryption=openssl_decrypt($key,$ciphering,$dec_key,$option,$dec_iv);
include('../components/conn.php');
$del=$con->prepare("DELETE FROM addis_abeba_tour.packages WHERE pack_id=?");
$del->execute([$decryption]);
if($del){
    Header('Location: package_table.php');
}
}
elseif(isset($_GET['pack_id'])){
    
$key=$_GET['pack_id'];
$dec_iv='1234567891011121';
$dec_key="AddisTour";
$ciphering = "AES-128-CTR";
$option=0;
$decryption=openssl_decrypt($key,$ciphering,$dec_key,$option,$dec_iv);
include('../components/conn.php');

$del=$con->prepare("DELETE FROM addis_abeba_tour.packages WHERE pack_id=?");
$del->execute([$decryption]);

$get_id=$con->prepare("SELECT g_id from addis_abeba_tour.packages where pack_id=?");
$get_id->execute([$decryption]);
$row = $get_id->fetch(PDO::FETCH_ASSOC);
$g_id = $row['g_id'];
$message="Your package full addis ababa trip is denied.try again with some modification.please be sure that your package is in the region of addis ababa.";

$mess=$con->prepare("UPDATE addis_abeba_tour.guides SET g_message=? WHERE g_id=?");
$mess->execute([$message,$g_id]);
if($del){
    Header('Location: p_approve.php');  
}
}
