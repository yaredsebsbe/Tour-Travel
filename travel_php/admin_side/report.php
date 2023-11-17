 <?php
session_start();
if($_SESSION['aid']){
    include("../components/conn.php");

    
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
            <h2>Reports</h2>
        </div>
        <form method="post">
        <div class="rep-list">
            <?php
        $rep_out=$con->prepare("SELECT * FROM addis_abeba_tour.reports ORDER  by rep_id DESC LIMIT 5");
        $rep_out->execute();
        if($rep_out->rowCount()>0){
            while($rows=$rep_out->fetch(PDO::FETCH_ASSOC)){
                $rid=$rows['rep_id'];
                $no_pack=$rows['rep_no_pack'];
                $no_guide=$rows['rep_no_guide'];
                $no_bk=$rows['rep_no_bk'];
                $rep_last_date=$rows['rep_date'];
                $dates=date("Y-m-d");
                ?>
                <div class="rep-content">
                <div class="rep-head">
                    <h3><?php echo "Report $rid from $rep_last_date to $dates"?></h3>
                </div>
                <div class="rep-data">
                    <p><?php echo "Packages: $no_pack" ?></p>
                </div>
                <div class="rep-data">
                    <p><?php echo "Guides: $no_guide" ?></p>
                </div>
                <div class="rep-data">
                    <p><?php echo "Booked times: $no_bk" ?></p>
                </div>
            </div>
                
                <?php
            }
        }


        if(isset($_POST['generate'])){
            $get_date=$con->prepare("SELECT rep_date FROM addis_abeba_tour.report ORDER by rep_id DESC LIMIT 1");
            $get_date->execute();
            if($get_date->rowCount()>0){
            $row=$get_date->fetch(PDO::FETCH_ASSOC);
            
            $last_date=$row['rep_date'];
            $date=date("y-m-d");
    
            $pack_out=$con->prepare("SELECT * FROM addis_abeba_tour.packages WHERE pack_created_date BETWEEN ? AND ?");
            $pack_out->execute([$last_date,$date]);
            $no_pack_date=$pack_out->rowCount();
    
            $g_out=$con->prepare("SELECT * FROM addis_abeba_tour.guides WHERE g_registered_date BETWEEN ? AND ?");
            $g_out->execute([$last_date,$date]);
            $no_g_date=$g_out->rowCount();
    
            $bk_out=$con->prepare("SELECT * FROM addis_abeba_tour.book WHERE bk_booked_date BETWEEN ? AND ?");
            $bk_out->execute([$last_date,$date]);
            $no_bk_date=$bk_out->rowCount();
    
            $insert_message1="Packages: $no_pack_date<br> Guides: $no_g_date<br> Booked times: $no_bk_date<br>";
            $insert=$con->prepare("INSERT INTO addis_abeba_tour.report (rep_description, rep_date) VALUES (?,?)");
            $insert->execute([$insert_message1,$date]);
    
            $insert=$con->prepare("INSERT INTO addis_abeba_tour.reports (rep_no_pack, rep_no_guide,rep_no_bk,rep_date) VALUES (?,?,?,?)");
            $insert->execute([$no_pack_date,$no_g_date,$no_bk_date,$date]);
    
            
        }
        else{
            echo "No Data";
        }
        
        }
    ?>
            <button type="submit" name="generate">Generate</button>
        </div>
</form>
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
        function checkDelete() {
            return confirm("Are you sure you want to deny this package?");
        }
    </script>
</html>
<?php
}
else{
    Header("Location: login.php");
}