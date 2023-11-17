<?php
session_start();
if($_GET['bk_id']){
    $bid=$_GET['bk_id'];

    include('../../components/conn.php');
    $del=$con->prepare("DELETE FROM addis_abeba_tour.book WHERE bk_id=?");
    $del->execute([$bid]);
    if($del){
        Header('Location: book.php');
    }
    else{
        echo "some error occured please try again.";
    }
}
else{
    Header('Location: book.php');
}