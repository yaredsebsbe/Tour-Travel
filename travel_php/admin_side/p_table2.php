<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo"><p>AddisTour</p><span>Admin</span></div>
            <h2>Dashboard</h2>
            <ul>
                
                <li><a href="#" class="setting">Setting</a></li>
                <li><a href="#">Report</a></li>
                <li><a href="#">Guide Approval</a></li>
                <li><a href="#">Package Approval</a></li>
                <li><a href="#">Home</a></li>
                
            </ul>
            <dialog class="modal">
                <h2>Settings</h2>
                <div class="setting-link">
                    <a href="#" class="logout">Logout</a>
                    <a href="#" class="password">Change Password</a>
                    <a href="#" class="close"><img src="back.png"></a>
            </div>
            </dialog>
        </div>
        <div class="sub-head">
            <h2>Packages</h2>
        </div>
        <form method="post">
        <div class="table-main">
        <div class="search">
            <input type="search" name="search" placeholder="Id or package name">
            <button type="submit" name="submit"><img src="search.png" alt=""></button>
        </div>
        <table>
            <?php
                include('p_table.php');
            ?>
        </table>
    </div>
</form>
</body>
<script>
    const modal=document.querySelector('.modal');
    const open=document.querySelector('.setting');
    const close=document.querySelector('.close');

    open.addEventListener('click',()=>{
        modal.showModal();
    });
    close.addEventListener('click',()=>{
        modal.close();
    });

    function checkDelete() {
        return confirm("Are you sure you want to delete this package?");
    }
</script>
</html>
















<?php 
            include('../components/conn.php');
            if(isset($_POST['submit'])&& strlen($_POST['search'])>0){
              $key=$_POST['search'];
              $list = $con->prepare("SELECT * FROM addis_abeba_tour.packages where pack_id = ? or pack_name=?");
              $list->execute([$key,$key]);
              if ($list->rowCount() > 0) {
                ?>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Location</th>
                <th>Feature</th>
                <th>Price</th>
                <th>Created By</th>
                <th>Remove</th>
            </tr>
            <?php
                while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
                    $id = $row['pack_id'];
                    $name = $row['pack_name'];
                    $location = $row['pack_location'];
                    $feature = $row['pack_feature'];
                    $price = $row['pack_price'];
                    $owner = $row['g_name'];                                
                ?>
              <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $location ?></td>
                    <td><?php echo $feature ?></td>
                    <td><?php echo $price ?></td>
                    <td><?php echo $owner ?></td>
                    <td><a href="delete_guide.php?key=<?=$id?>" class="delete" onclick=" return checkDelete()">Delete</a></td>
              </tr>
                <?php
                
              }
            }
            else{
             echo  "<h2>No user in this ID or Name</h2>";
            }
          }
        else{         
            
            $list = $con->prepare("SELECT * FROM addis_abeba_tour.packages");
            $list->execute();
            if ($list->rowCount() > 0) {
            ?>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Location</th>
                <th>Feature</th>
                <th>Price</th>
                <th>Created By</th>
                <th>Remove</th>
            </tr>
            <?php
                while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
                    $id = $row['pack_id'];
                    $name = $row['pack_name'];
                    $location = $row['pack_location'];
                    $feature = $row['pack_feature'];
                    $price = $row['pack_price'];
                    $owner = $row['g_name'];                                
                ?>
              <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $location ?></td>
                    <td><?php echo $feature ?></td>
                    <td><?php echo $price ?></td>
                    <td><?php echo $owner ?></td>
                    <td><a href="delete_guide.php?key=<?=$id?>" class="delete" onclick="return checkDelete()">Delete</a></td>
              </tr>
                <?php
                
              }
            }
            }
                ?>