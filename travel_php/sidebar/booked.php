<?php
session_start();

if(isset($_COOKIE['gcookie'])|| isset($_SESSION['g_id'])){
    $session_id='';
    if(isset($_SESSION['g_id'])){
        $session_id=$_SESSION['g_id'];
    }
    else if(isset($_COOKIE['gcookie'])){
        $session_id=$_COOKIE['gcookie'];
    }
    
    include('side-header.php');
?> 

        <div class="contents">
            <h3>Booked Users</h3>
            
                <?php

                    include('../components/conn.php');

                    $list=$con->prepare("SELECT * FROM addis_abeba_tour.book where g_id=? ");
                    $list->execute([$session_id]);
                    if($list->rowCount()>0){
                        while($row= $list->fetch(PDO::FETCH_ASSOC)){

                        $Adate=$row['bk_arrival_date'];
                        $date=date("d-m-y h:i:s");
                            
                    $tfname=$row['bk_fname'];
                    $tlname=$row['bk_lname'];
                    $tpackage=$row['bk_package'];
                    $tcountry=$row['bk_country'];
                    $tphone_no=$row['bk_phone_no'];
                    $tcity=$row['bk_city'];
                    $tno_travller=$row['bk_no_travller'];
                    $tbooked_date=$row['bk_booked_date'];
                    $tarrival_date=$row['bk_arrival_date'];

                    $name=$tfname." ".$tlname;
                    
                    ?>  
                <div class="booked-row">
                <div class="book-box">
                    <div class="booked-data">
                        <label for="name">Tourist Name</label>
                        <p><?php echo $name; ?></p>
                    </div>
                    <div class="booked-data">
                        <label for="name">Booked Package</label>
                        <p><?php echo $tpackage; ?></p>
                    </div>
                    <div class="booked-data">
                        <label for="name">Tourist Phone Number</label>
                        <p><?php echo $tphone_no; ?></p>
                    </div>
                    <div class="booked-data">
                        <label for="name">Country</label>
                        <p><?php echo $tcountry; ?></p>
                    </div>
                    <div class="booked-data">
                        <label for="name">City</label>
                        <p><?php echo $tcity; ?></p>
                    </div>
                    <div class="booked-data">
                        <label for="name">Guest</label>
                        <p><?php echo $tno_travller; ?></p>
                    </div>
                    <div class="booked-data">
                        <label for="payment">Arrival Date</label>
                        <p><?php echo $tarrival_date; ?></p>
                    </div>                    
                </div>
            </div>
            </div>
        <?php
}
}
else{
    echo "<h2>No Booked User!</h2>";
    
}
}

else{
    Header("Location: ../forms/g_login.php");
}