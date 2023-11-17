<?php
session_start();

    include('../components/conn.php');
  
    if(isset($_GET['pack_id'])){

            $key=$_GET['pack_id'];
            $dec_iv='1234567891011121';
            $dec_key="guide";
            $ciphering = "AES-128-CTR";
            $option=0;
            $decryption=openssl_decrypt($key,$ciphering,$dec_key,$option,$dec_iv);

    $del=$con->prepare("delete from addis_abeba_tour.packages where pack_id=?");
    $del->execute([$decryption]);
    header('Location: pack_list.php');
    
            }
            else{
                echo "failed";
            }
