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
            <h2>Guide Approval</h2>
        </div>
        <div class="pack-list">
            <div class="pack-row">

<?php 
            include('../components/conn.php');
                $list = $con->prepare("SELECT * FROM addis_abeba_tour.guides where g_status='waiting'");
                $list->execute();
                if ($list->rowCount() > 0) {
                    while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
                        $g_id = $row['g_id'];
                        $g_fname = $row['g_fname'];
                        $g_lname = $row['g_lname'];
                        $g_qualification = $row['g_qualification'];
                        $g_language = $row['g_languages']; 
                        $g_age = $row['g_age'];     
                        $g_nationality = $row['g_nationality'];  
                        
                        $g_name=$g_fname." ".$g_lname;
                        
                        $ciphering="AES-128-CTR";
                        $iv_length=openssl_cipher_iv_length($ciphering);
                        $option=0;
                        $enc_iv='1234567891011121';
                        $enc_key="guide_approve";
                        $encryption=openssl_encrypt($g_id,$ciphering,$enc_key,$option,$enc_iv);
?>
                <div class="package">
                    <div class="pack-data"><label>Guide Name:</label><p><?php echo $g_name; ?></p></div>
                    <div class="pack-data"><label>Guide age:</label><p><?php echo $g_age; ?></p></div>
                    <div class="pack-data"><label>Guide nationality:</label><p><?php echo $g_nationality; ?></p></div>
                    <div class="pack-data"><label>Guide language:</label><p><?php echo $g_language; ?></p></div>
                    <div class="pack-data"><label>Guide qualification:</label><p><?php echo $g_qualification; ?></p></div>
                    <a href="approve_operation.php?g_id=<?=$encryption?>" class="approve" onclick="return check()">Approve</a>
                    <a href="delete_operation.php?g_id=<?=$encryption?>" class="delete" onclick="return del()" class="delete">Remove</a>
                </div>  
                <?php
                    }
                }
                else{
                   echo "<h2>There is no unapproved Guide yet!<h2>";
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
        function del() {
        return confirm("Are you sure yow want to delete this package?");
        }
    </script>
</html>
<?php
}
else{
    Header('Location: login.php');
}
?>
