<?php
session_start();
if($_SESSION['aid']){
    ?>

<?php
    include('../components/conn.php');
    if(isset($_GET['key'])){
        $key=$_GET['key'];
        $dec_iv='1234567891011121';
        $dec_key="AddisTour";
        $ciphering = "AES-128-CTR";
        $option=0;
        $decryption=openssl_decrypt($key,$ciphering,$dec_key,$option,$dec_iv);
        $list = $con->prepare("SELECT * FROM addis_abeba_tour.guides where g_id=?");
        $list->execute([$decryption]);
        $row = $list->fetch(PDO::FETCH_ASSOC);
        $gname=$row['g_fname'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ad_style_last.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo"><p>AddisTour</p><span>Admin</span></div>
            <ul>
                
                <li><a href="#" class="setting" id="setting">Setting</a></li>
                <li><a href="report.php">Report</a></li>
                <li><a href="g_approve.php">Guide Approval</a></li>
                <li><a href="p_approve.php">Package Approval</a></li>
                <li><a href="guide_list.php">Approved Guides</a></li>
                <li><a href="tourist_list.php">Booked Tourist</a></li>
                <li><a href="package_table.php">Package List</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                
            </ul>
            <dialog class="modal">
                <h2>Settings</h2>
                <div class="setting-link">
                    <a href="ad_logout.php" class="logout">Logout</a>                    
                    <a href="#" class="close"><img src="back.png"></a>
            </div>
            </dialog>
        </div>
        <div class="sub-head">
            <h2><?php echo $gname ?>'s Packages</h2>
        </div>
        <div class="pack-list">
            <div class="pack-row">

            <?php
            $pack = $con->prepare("SELECT * FROM addis_abeba_tour.packages where g_id=?");
            $pack->execute([$decryption]);
                if ($pack->rowCount() > 0) {
                    while ($row = $pack->fetch(PDO::FETCH_ASSOC)) {
                        $name = $row['pack_name'];
                        $location = $row['pack_location'];
                        $feature = $row['pack_feature'];
                        $price = $row['pack_price'];
                        $description = $row['pack_description'];                     
                        $img = $row['pack_img'];  
                    ?>
                    <tr>
                <div class="package">
                    <img src="../test/Package-Pic/<?php echo $img ?>">
                    <div class="pack-data"><label>Package Name:</label><p><?php echo $name ?></p></div>
                    <div class="pack-data"><label>Package Location:</label><p><?php echo $location ?></p></div>
                    <div class="pack-data"><label>Package Feature:</label><p><?php echo $feature ?></p></div>
                    <div class="pack-data"><label>Package Price:</label><p><?php echo $price ?></p></div>
                    <div class="pack-data"><label>Package Description:</label><p><?php echo $description ?></p></div>
                    <a href="delete_package.php?key=<?=$key?>" class="delete" onclick=" return checkDelete()">Delete</a>
                </div>  
                <?php
                    }
                }
                else{
                    ?>
                    <div class="package">
                        <h2>No Package is created</h2>
                    </div>
                    <?php
                }
                ?>
            </div>
         </div>
        </div>
    </body>
    <script>
        const modal=document.querySelector('.modal');
        const open=document.querySelector('.setting');
        const close=document.querySelector('.close');
        const logout=document.querySelector('.logout');
    
        open.addEventListener('click',()=>{
            modal.showModal();
        });
        close.addEventListener('click',()=>{
            modal.close();
        });
        logout.addEventListener('click',()=>{
            modal.close();
        });

        function checkDelete() {
        return confirm("Are you sure you want to delete this package?");
    }
    </script>
</html>
<?php
}
else{
    Header('Location: guide_list.php');
}
}
else{
    Header('Location: login.php');
}