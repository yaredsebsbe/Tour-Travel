<?php
$key=$_GET['key'];
$dec_iv='1234567891011121';
$dec_key="AddisTour";
$ciphering = "AES-128-CTR";
$option=0;
$decryption=openssl_decrypt($key,$ciphering,$dec_key,$option,$dec_iv);
include('../components/conn.php');
$del_g=$con->prepare("DELETE FROM addis_abeba_tour.guides WHERE g_id=?");
$del_g->execute([$decryption]);
$del_p=$con->prepare("DELETE FROM addis_abeba_tour.packages WHERE g_id=?");
$del_p->execute([$decryption]);
if($del_g){
    echo("<script>alert ('Deleted Succesfully')");
    Header('Location: guide_list.php');
}
