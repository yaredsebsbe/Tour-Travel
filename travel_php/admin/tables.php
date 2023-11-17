<?php
include('../components/conn.php');
if(isset($_POST['btnSearch'])){
    $key=$_POST['search'];
    if(strlen($key) > 0){
    $list=$con->prepare("SELECT * FROM addis_abeba_tour.t_accounts where u_fname=? or u_id=?");
    $list->execute([$key,$key]);
    if($list->rowCount()>0){
        while ($row=$list->fetch(PDO::FETCH_ASSOC))
        {
        ?>
        <tr>
        <td><?php echo $row['u_id'];?></td>
        <td><?php echo $row['u_fname'];?></td>
        <td><?php echo $row['u_lname'];?></td>
        <td><?php echo $row['u_email'];?></td>
        <td><a href="delete.php?del=<?=$row['u_id'];?>" class="btn2">Delete Tourist</a></td>
        </tr>
        <?php
        }
    }
    else{
        echo "<font color='red'>No user Found</font>";
        }
}
else{
    echo "<font color='red'>please enter user name or id</font>";
    }


}
else{
$list=$con->prepare("SELECT * FROM addis_abeba_tour.t_accounts");
    $list->execute();
    if($list->rowCount()>0){
        while ($row=$list->fetch(PDO::FETCH_ASSOC))
        {
        ?>
        <tr>
        <td><?php echo $row['u_id'];?></td>
        <td><?php echo $row['u_fname'];?></td>
        <td><?php echo $row['u_lname'];?></td>
        <td><?php echo $row['u_email'];?></td>
        <td><a href="delete.php?del=<?=$row['u_id'];?>" class="btn2">Delete Guide</a></td>
        </tr>
        <?php
        }
    }
    else{
        echo "<font color='red'>No Data Found</font>";
    } 
}
    ?> 