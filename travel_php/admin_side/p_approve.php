<?php
session_start();
if(isset($_SESSION['aid'])){
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
            <div class="logo">
                <p>AddisTour</p>
                <span>Admin</span>
            </div>
            <ul>
                <li><a href="#" class="setting" id="setting">Setting</a></li>
                <li><a href="#">Report</a></li>
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
                    <a href="ad_logout.php" class="logout" name="logout">Logout</a>                    
                    <a href="#" class="close"><img src="back.png"></a>
                </div>
            </dialog>
        </div>
        <div class="sub-head">
            <h2>Package Approval</h2>
        </div>
        <div class="pack-list">
            <div class="pack-row">
                <?php 
                include('../components/conn.php');
                $list = $con->prepare("SELECT * FROM addis_abeba_tour.packages where pack_status='waiting'");
                $list->execute();
                if ($list->rowCount() > 0) {
                    while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
                        $pack_id = $row['pack_id'];
                        $pack_name = $row['pack_name'];
                        $pack_location = $row['pack_location'];
                        $pack_feature = $row['pack_feature'];
                        $pack_price = $row['pack_price']; 
                        $pack_creator = $row['pack_creator'];     
                        $pack_description = $row['pack_description'];
                        $pack_img= $row['pack_img'];     
                        
                        $ciphering="AES-128-CTR";
                        $iv_length=openssl_cipher_iv_length($ciphering);
                        $option=0;
                        $enc_iv='1234567891011121';
                        $enc_key="AddisTour";
                        $encryption=openssl_encrypt($pack_id,$ciphering,$enc_key,$option,$enc_iv);
                ?>
                <div class="package">
                    <img src="../test/Package-Pic/<?php echo $pack_img?>">
                    <div class="pack-data"><label>Package Name:</label><p><?php echo $pack_name; ?></p></div>
                    <div class="pack-data"><label>Package Location:</label><p><?php echo $pack_location; ?></p></div>
                    <div class="pack-data"><label>Package Feature:</label><p><?php echo $pack_feature; ?></p></div>
                    <div class="pack-data"><label>Package Price:</label><p><?php echo $pack_price; ?></p></div>
                    <div class="pack-data"><label>Package Description:</label><p><?php echo $pack_description; ?></p></div>
                    <div class="pack-data"><label>Package Creator:</label><p><?php echo $pack_creator; ?></p></div>
                    <a href="approve_operation.php?pack_id=<?=$encryption?>" class="approve" onclick="return check()">Approve</a>
                    <a href="delete_package.php?pack_id=<?=$encryption?>" class="delete" onclick="return checkDelete()">Deny</a>
                </div>  
                <?php
                    }
                }
                else {
                   echo "<h2>There is no unapproved package yet!<h2>";
                }
                ?>
            </div>
        </div>
    </div>
    
    <script>
        const modal=document.querySelector('.modal');
        const open=document.querySelector('.setting');
        const close=document.querySelector('.close');
        const logout=document.querySelector('.logout');
    
    logout.addEventListener('click',()=>{
            modal.close();
        });

        open.addEventListener('click',()=>{
            modal.showModal();
        });
        close.addEventListener('click',()=>{
            modal.close();
        });

        function check() {
            return confirm("Do you want to approve this package?");
        }
        function checkDelete() {
            return confirm("Are you sure you want to deny this package?");
        }
    </script>
</body>
</html>
<?php
}
else{
    Header('Location: login.php');
}
?>
