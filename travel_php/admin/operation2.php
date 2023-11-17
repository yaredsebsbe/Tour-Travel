<?php
$btn_name1="";
$btn_name2="";
$id;

function g_list(){
    
    include('../components/conn.php');
    $list=$con->prepare("SELECT * FROM addis_abeba_tour.guides where g_approved=?");
    $list->execute(["approved"]);
    if($list->rowCount()>0){
        while($row= $list->fetch(PDO::FETCH_ASSOC)){
            
            $id=$row['g_id'];
            $fn=$row['g_fname'];
            $ln=$row['g_lname'];
            $reg=$row['g_registered_date'];
            $gender=$row['g_gender'];
            $email=$row['g_email'];
            $phone=$row['g_phone_num'];

            $full=$fn." ".$ln;
            

            ?>
             <div class="row">        
            <p><span class="sp">Full Name:</span><?php echo " ".$full;?> </p>
            <p><span class="sp">Regestered Date:</span><?php echo " ".$reg;?> </p>
            <p><span class="sp">Gender: </span><?php echo " ".$gender;?></p>
            <p><span class="sp">Email: <?php echo " ".$email;?> </p>
            <p><span class="sp">Phone no:</span> <?php echo " ".$phone;?> </p>
            <a href="delete.php?gdel=<?=$id;?>" class="link1">Delete Guide</a>
            <a href="pack_list.php?g_id=<?=$id?>" class="link2">See Package</a>  
            
        </div>
        
            <?php       
    }          
}
else{
    echo("<p> No Guide is available</p>");
} 

} 

function unap_g_list(){
    
    include('../components/conn.php');
    $list=$con->prepare("SELECT * FROM addis_abeba_tour.guides where g_status=?");
    $list->execute(["waiting"]);
    if($list->rowCount()>0){
        while($row= $list->fetch(PDO::FETCH_ASSOC)){
            
            $id=$row['g_id'];
            $fn=$row['g_fname'];
            $ln=$row['g_lname'];
            $reg=$row['g_registered_date'];
            $gender=$row['g_gender'];
            $email=$row['g_email'];
            $phone=$row['g_phone_num'];
            $date=date('Y-m-d');


            $full=$fn." ".$ln;
            

            ?>
             <div class="row">        
            <p><span class="sp">Full Name:</span><?php echo " ".$full;?> </p>
            <p><span class="sp">Regestered Date:</span><?php echo " ".$reg;?> </p>
            <p><span class="sp">Gender: </span><?php echo " ".$gender;?></p>
            <p><span class="sp">Email: <?php echo " ".$email;?> </p>
            <p><span class="sp">Phone no:</span> <?php echo " ".$phone;?> </p>
            <a href="delete.php?gdel=<?=$id;?>" class="link1">Decline</a>
            <a href="approval.php?g_id=<?=$id?>" class="link2">Approve</a>  
            
        </div>
        
            <?php       
    }          
}
else{
    echo("<p> No Guide is available</p>");
} 

} 

function t_list(){
    
    include('../components/conn.php');
    $list=$con->prepare("SELECT * FROM addis_abeba_tour.t_accounts LIMIT 6 ");
    $list->execute();
    if($list->rowCount()>0){
        while($row= $list->fetch(PDO::FETCH_ASSOC)){
            
            $id=$row['u_id'];
            $fn=$row['u_fname'];
            $ln=$row['u_lname'];
            $email=$row['u_email'];

            $full=$fn." ".$ln;           

            ?>
             <div class="row">        
            <p class="p">Full Name:<?php echo " ".$full;?> </p>
            <p class="p">Email: <?php echo " ".$email;?> </p>            
            <form action="delete.php" method="post">
            <button type="submit" class="btn1" name="submit">See Package</button>  
            <a href="t_list.php?del=<?=$id;?>" class="btn2">Delete Guide</button>
            </form>
        </div>
        
            <?php       
    }          
}
else{
    echo("<p> No Guide is available</p>");
} 

} 

function package_list() { 
    include('../components/conn.php');
    if(isset($_GET['g_id'])){ //if guides want the one guide's package list
        $g_id=$_GET['g_id'];

    $list=$con->prepare("SELECT * FROM addis_abeba_tour.packages where g_id=? ");
    $list->execute([$g_id]);
    if($list->rowCount()>0){
        while($row= $list->fetch(PDO::FETCH_ASSOC)){
            
            $id=$row['pack_id'];
            $name=$row['pack_name'];
            $description=$row['pack_description'];
            $price=$row['pack_cost'];
            $owner=$row['g_name'];
            ?>
             <div class="row">        
            <p><span class="sp">Package id:</span><?php echo " ".$id;?> </p>
            <p><span class="sp">Package Name: </span><?php echo " ".$name;?> </p> 
            <p><span class="sp">Package description:</span> <?php echo " ".$description;?> </p> 
            <p><span class="sp">Package price:</span> <?php echo " ".$price."$ per person";?> </p>
            <p><span class="sp">Package owner:</span> <?php echo " ".$owner;?> </p>             
            <a href="delete.php?pdel=<?=$row['pack_id'];?>" class="btn2">Delete Guide</a>
        
        </div>
        <?php       
    }          
}
else{     //if guides want package list
    echo("<p> No Pckage is created by this guide</p>");
} 
    }

    else{
    $list=$con->prepare("SELECT * FROM addis_abeba_tour.packages LIMIT 6 ");
    $list->execute();
    if($list->rowCount()>0){
        while($row= $list->fetch(PDO::FETCH_ASSOC)){
            
            $id=$row['pack_id'];
            $name=$row['pack_name'];
            $description=$row['pack_description'];
            $price=$row['pack_cost'];
            $owner=$row['g_name'];        
            ?>
             <div class="row">        
            <p><span class="sp">Package id:</span><?php echo " ".$id;?> </p>
            <p><span class="sp">Package Name: </span><?php echo " ".$name;?> </p> 
            <p><span class="sp">Package description:</span> <?php echo " ".$description;?> </p> 
            <p><span class="sp">Package price:</span> <?php echo " ".$price."$ per person";?> </p>
            <p><span class="sp">Package owner:</span> <?php echo " ".$owner;?> </p>             
            <a href="delete.php?pdel=<?=$row['pack_id'];?>" class="pack_del">Delete Package</a>
        
        </div>
        
            <?php       
    }          
}
else{
    echo("<p> No Guide is available</p>");
} 
    
    }

}

 ?>