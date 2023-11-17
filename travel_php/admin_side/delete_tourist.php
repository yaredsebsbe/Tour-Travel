<?php
$key=$_GET['key'];
$dec_iv='1234567891011121';
$dec_key="AddisTour";
$ciphering = "AES-128-CTR";
$option=0;
$decryption=openssl_decrypt($key,$ciphering,$dec_key,$option,$dec_iv);
include('../components/conn.php');
$del=$con->prepare("DELETE FROM addis_abeba_tour.book WHERE bk_id=?");
$del->execute([$decryption]);
if($del){
    echo("<script>alert ('Deleted Succesfully')");
    Header('Location: tourist_list.php');
}
