<?php
session_start();

if(isset($_SESSION['aid'])){
$gcount;
$tcount;
$pcount;
function num_user($tab_name){
    include('../components/conn.php');
    $list=$con->prepare("SELECT * FROM addis_abeba_tour.$tab_name");
    $list->execute();
    if($list->rowCount()>0){
        while ($row=$list->fetch(PDO::FETCH_ASSOC))
        {
            global $gcount;
            global $tcount;
            global $pcount;
            if($tab_name=='t_accounts'){
                $tcount++;
            }
            elseif($tab_name=='guides'){
                $gcount++;
            }
            elseif($tab_name=='packages'){
                $pcount++;
            }      
        }
        if($tab_name=='t_accounts'){
            echo $tcount;
        }
        elseif($tab_name=='guides'){
            echo $gcount;
        }
        elseif($tab_name=='packages'){
            echo $pcount;
        }
    }
}

if(isset($_POST['guideList'])){
    Header('Location: g_list.php');
}
elseif(isset($_POST['tList'])){
    Header('Location: t_list.php');
}
elseif(isset($_POST['pList'])){
    Header('Location: pack_list.php');
}
elseif(isset($_POST['g_unapproved'])){
    Header('Location: g_unappr.php');
}
}
else{
    Header('Location:admin_log.php');
}