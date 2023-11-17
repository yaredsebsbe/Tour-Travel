<?php
$key=$_GET['g_id'];
$dec_iv='1234567891011121';
$dec_key="guide_approve";
$ciphering = "AES-128-CTR";
$option=0;
$decryption=openssl_decrypt($key,$ciphering,$dec_key,$option,$dec_iv);
include('../components/conn.php');
$del=$con->prepare("DELETE FROM addis_abeba_tour.guides WHERE g_id=?");
$del->execute([$decryption]);
if($del){
    echo("<script>alert ('Deleted Succesfully')");
    Header('Location: guide_list.php');
}