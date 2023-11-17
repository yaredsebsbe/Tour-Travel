<?php
include('../components/conn.php');
if(isset($_GET['del'])){ //this delete code is from allTour.php
                $del_id=$_GET['del'];
                $del=$con->prepare("delete from addis_abeba_tour.t_accounts where u_id=?");
    $del->execute([$del_id]);
    echo "deleted";
    $_GET['del']="";
    Header("Location:allTour.php");

            }

if(isset($_GET['pdel'])){  //this delete code is from pack_list.php
    $del_id=$_GET['pdel'];
    $del=$con->prepare("delete from addis_abeba_tour.packages where pack_id=?");
    $del->execute([$del_id]);
    echo "deleted";
    $_GET['pdel']="";
    Header("Location:pack_list.php");
            }
if(isset($_GET['gdel'])){  //this delete code is from pack_list.php
    $del_id=$_GET['gdel'];
    $del=$con->prepare("delete from addis_abeba_tour.guides where g_id=?");
    $del->execute([$del_id]);
    echo "deleted";
    $_GET['gdel']="";
    Header("Location:g_list.php");
            }
        ?>