<?php

if(isset($_GET['pack_id'])){  //from package approval admin page
    $key=$_GET['pack_id'];
    $dec_iv='1234567891011121';
    $dec_key="AddisTour";
    $ciphering = "AES-128-CTR";
    $option=0;
    $decryption=openssl_decrypt($key,$ciphering,$dec_key,$option,$dec_iv);
    include('../components/conn.php');
    $upd=$con->prepare("UPDATE addis_abeba_tour.packages SET pack_status='approved' WHERE pack_id=?");
    $upd->execute([$decryption]);

    $get_id=$con->prepare("SELECT g_id from addis_abeba_tour.packages where pack_id=?");
    $get_id->execute([$decryption]);
    $row = $get_id->fetch(PDO::FETCH_ASSOC);
    $g_id = $row['g_id'];
    $message="Your package is Approved.It will be visible to tourists. Good Luck!";

    $mess=$con->prepare("UPDATE addis_abeba_tour.guides SET g_message=? WHERE g_id=?");
    $mess->execute([$message,$g_id]);
    if($upd){
        Header('location: p_approve.php');
    }
}
else if(isset($_GET['g_id'])){
    $key=$_GET['g_id'];
    $dec_iv='1234567891011121';
    $dec_key="guide_approve";
    $ciphering = "AES-128-CTR";
    $option=0;
    $decryption=openssl_decrypt($key,$ciphering,$dec_key,$option,$dec_iv);
    include('../components/conn.php');
    $upd=$con->prepare("UPDATE addis_abeba_tour.guides SET g_status='approved' WHERE g_id=?");
    $upd->execute([$decryption]);

    if($upd){
        Header('location: g_approve.php');
    }
}