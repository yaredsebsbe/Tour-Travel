<?php

?>

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
            <h2>Guides</h2>
        </div>

        <div class="table-main">
            <form method="post">
           <div class="search">
            <input type="search" placeholder="Enter Id Or First Name">
            <a href="#" name="search"><img src="search.png"></a>
        </div>
        </form>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>               
                <th>Sex</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Country</th>
                <th>city</th>
                <th>Sub-cty</th>
                <th>Woreda</th>
                <th>Packages</th>
                <th>Remove</th>
            </tr>
            
            <?php 
            include('../components/conn.php');
            $list = $con->prepare("SELECT * FROM addis_abeba_tour.guides");
            $list->execute();
            if ($list->rowCount() > 0) {
              while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['g_id'];
                $fname = $row['g_fname'];
                $lname = $row['g_lname'];
                $gender = $row['g_gender'];
                $email = $row['g_email'];                
                $phone_no = $row['g_phone_num'];
                $nationality = $row['g_nationality'];
                $city = $row['g_city'];
                $sub_city = $row['g_subcity'];
                $Language = $row['g_languages'];
                $name=$fname." ". $lname;
                
            ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>                
                <td><?php echo $gender ?></td>
                <td><?php echo $email ?>.com</td>
                <td><?php echo $phone_no ?></td>
                <td><?php echo $nationality ?></td>
                <td><?php echo $city ?></td>
                <td><?php echo $sub_city ?></td>
                <td><?php echo $Language ?></td>
                <td><a href="" class="packages">Packages</a></td>
                <td><a href="" class="delete">Delete</a></td>
                
            <tr>
                <?php
                }
                
            }
            ?>

        </table>
    </div>
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
</script>
</html>