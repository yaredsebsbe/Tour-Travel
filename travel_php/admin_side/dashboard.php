<?php
session_start();
if(isset($_SESSION['aid'])){
    include('../components/conn.php');

    $data1=$con->prepare("SELECT * FROM addis_abeba_tour.t_accounts");
    $data1->execute();
    $Ac_row=$data1->rowCount();

    $data2=$con->prepare("SELECT * FROM addis_abeba_tour.guides");
    $data2->execute();
    $G_row=$data2->rowCount();

    $data3=$con->prepare("SELECT * FROM addis_abeba_tour.packages");
    $data3->execute();
    $P_row=$data3->rowCount();

    $data4=$con->prepare("SELECT * FROM addis_abeba_tour.book");
    $data4->execute();
    $BK_row=$data4->rowCount();

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
            <h2>Dashboard</h2>
        </div>
        <div class="main">
            
            <div class="operations">
                <div class="row">
                    <img src="account.png">
                    <h1>Created Account</h1>
                    <p><?php echo $Ac_row; ?></p>
                    
                </div>
                <div class="row">
                    <img src="Guide.png">
                    <h1>Guide List</h1>
                    <p><?php echo $G_row; ?></p>
                </div>
                <div class="row">
                    <img src="package.png">
                    <h1>Package List</h1>
                    <p><?php echo $P_row; ?></p>
                </div>
                <div class="row">
                    <img src="book.png">
                    <h1>Booked User</h1>
                    <p><?php echo $BK_row; ?></p>
                </div>
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
    
</script>
</html>
<?php
}
else{
    Header('Location: login.php');
}
?>