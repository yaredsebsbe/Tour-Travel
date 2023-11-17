<?php
if(isset($_GET['g_id'])){ //getting the guide id to approve from operation2.php
    $g_id= $_GET['g_id'];
    
    include('../components/conn.php');
    $list=$con->prepare("UPDATE addis_abeba_tour.guides set g_status=? where (g_id=?)");
    $list->execute(["approved",$g_id]);

    $activ=$con->prepare("select * from addis_abeba_tour.guides where g_id=?");
    $activ->execute([$g_id]);
    $row= $activ->fetch(PDO::FETCH_ASSOC);        
        $id=$row['g_id'];
        $fn=$row['g_fname'];
        $ln=$row['g_lname'];
        $full_name=$fn." ".$ln;
        $email=$row['g_email'];
        $qual=$row['g_qualification'];
        $lang=$row['g_languages'];
        $img_name="u1.png";

        $act_date=date('Y-m-d H:i:s');
        $act_type="Admin";
        $act_operation="Approval of Guide";
        $act_state="Displaying";
    $act_insert=$con->prepare("INSERT INTO `addis_abeba_tour`.`activity_log` (`act_type`, `act_operation`, `act_date`, `act_personId`, `act_personName`, `act_personEmail`, `act_state`) VALUES (?, ?, ?, ?, ?, ?, ?);");
    $act_insert->execute([$act_type,$act_operation,$act_date,$id,$full_name,$email,$act_state]);

    $prof=$con->prepare("INSERT INTO `addis_abeba_tour`.`profile` (`pr_gid`, `pr_gname`, `pr_photo`, `pr_language`, `pr_qualification`, `pr_email`) VALUES (?,?,?,?,?,?);");
    $prof->execute([$id,$full_name,$img_name,$lang,$qual,$email]);

    Header("Location:g_unappr.php");
}

