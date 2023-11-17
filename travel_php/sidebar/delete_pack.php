<?php
if(isset($_GET['pack_id'])){

$key=$_GET['pack_id'];
$dec_iv='1234567891011121';
$dec_key="guide";
$ciphering = "AES-128-CTR";
$option=0;
$decryption=openssl_decrypt($key,$ciphering,$dec_key,$option,$dec_iv);
include('../components/conn.php');
$del=$con->prepare("DELETE FROM addis_abeba_tour.packages WHERE pack_id=?");
$del->execute([$decryption]);
    if($del){
        Header('Location: pack_list.php');
    }
    else{
        echo "some error occured please try again.";
    }
}