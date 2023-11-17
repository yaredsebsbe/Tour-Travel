<?php
session_start();
if($_SESSION['aid']){
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
                
                <li><a href="#" class="setting">Setting</a></li>
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
            <h2>Booked Tourists</h2>
        </div>
        <form method="post">
        <div class="table-main">
           <div class="search">
            <input type="search" name="search" placeholder="Enter Id Or First Name">
            <button type="submit" name="submit"><img src="search.png" alt=""></button>
        </div>
        
        <table>
            
            <?php
            include('t_tables.php');
            ?>
        </table>
    </div>
    </form>
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

    function checkDelete() {
        return confirm("Are you sure you want to delete this booked information?");
    }
</script>
</html>
<?php
}
else{
    Header('Location: login.php');
}