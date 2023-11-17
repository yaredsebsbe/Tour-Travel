<?php session_start();
include("../../components/conn.php");
if(isset($_SESSION['u_id'])){

    $fname="";
    $lname="";
    $email="";

    $full_name="";

    $session_id='';
    if(isset($_SESSION['u_id'])){
        $session_id=$_SESSION['u_id'];
        $full_name=$_SESSION['u_fname'];
        $email=$_SESSION['u_email'];
    }
    else if(isset($_COOKIE['tcookie'])){
        $session_id=$_COOKIE['tcookie'];
        $info_out=$con->prepare("SELECT * FROM addis_abeba_tour.t_accounts WHERE u_id=?");
        $info_out->execute([$session_id]);
        $fetch = $info_out->fetch(PDO::FETCH_ASSOC);
        $fname=$fetch['u_fname'];
        $lname=$fetch['u_lname'];
        $email=$fetch['u_email'];

        $full_name=$fname." ". $lname;

    }
	
	if(isset($_GET['pack_id'])){ 
        $warn="";
		$pack_id=$_GET['pack_id'];
		$check_pack=$con->prepare("SELECT * FROM addis_abeba_tour.packages where pack_id=?");//check if this email is already exists
 		$check_pack->execute([$pack_id]);
  		$fetch_accounts = $check_pack->fetch(PDO::FETCH_ASSOC);

  		$g_name=$fetch_accounts['pack_creator'];
		$gid=$fetch_accounts['g_id'];
		$p_name=$fetch_accounts['pack_name'];
		$p_price=$fetch_accounts['pack_price'];

		$out=$con->prepare("SELECT * FROM `addis_abeba_tour`.`t_accounts` where u_id=?");
		$out->execute([$session_id]);
		$row=$out->fetch(PDO::FETCH_ASSOC);
		$fname=$row['u_fname'];
		$lname=$row['u_lname'];
		$uid=$row['u_id'];
		
		$bdate=date("Y-m-d");
		

		if(isset($_POST['book'])){
            $phone=$_POST['phone'];
			$country=$_POST['country'];
			$city=$_POST['city'];
			$scity=$_POST['scity'];
			$guests=$_POST['guests'];
			$tdate=$_POST['tdate'];

            $chk_date=strtotime(date("m-d-y"));
            $chk_arr=strtotime($tdate);
            if(
                strlen($phone)<1||strlen($country)<1||strlen($city)<1||
                strlen($scity)<1||strlen($guests)<1||strlen($tdate)<1){
                    $warn="please enter full information";
                }
                
                else if($chk_date>=$chk_arr){
                    $warn="please enter valid date";
                }
			
                else{
			$book=$con->prepare("INSERT INTO addis_abeba_tour.book(`bk_fname`, `bk_lname`,`bk_phone_no`,`bk_country`, `bk_city`, `bk_subcity`, `bk_package`, `bk_no_travller`, `g_id`, `bk_booked_date`, `bk_arrival_date`, `u_id`) values (?,?,?,?,?,?,?,?,?,?,?,?)");
			$check_book=$book->execute([$fname,$lname,$phone,$country,$city,$scity,$p_name,$guests,$gid,$bdate,$tdate,$uid]);
			if($check_book){
				$msg="One customer Book Your Package on ". date("d-m-y") . "Check it out.";
				$send_msg=$con->prepare("Update addis_abeba_tour.guides set g_message=? where g_id=?");
				$send_msg->execute([$msg,$gid]);
				if($send_msg){
					Header("Location: book.php");
				}
			}
        
			else{
				$warn= "something wrong";
			}

		}
    }
        ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Guide Registration Form </title>
    
    <link rel="stylesheet" href="../../forms/register.css" />
  </head>
  <body>
    
    <section class="container">
   
      <header><p> Addis <strong>Tour</strong></p>Guide Registration Form</header>
      <form action="" class="form" method="post">
      <div class="warn">
          <p><?php echo $warn; ?></p>
        </div>
        <div class="input-box">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $full_name; ?>" disabled>
        </div>

        <div class="input-box">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email;?>" disabled>
        </div>
        <div class="input-box">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone">
        </div>
         <div class="input-box">
            <label for="date">Arrival Date:</label>
            <input type="date" id="date" name="tdate">
        </div>
        <div class="input-box">
            <label for="guests">Country:</label>
            <input type="text" id="guests" name="country">
        </div>

        <div class="input-box">
            <label for="guests">City:</label>
            <input type="text" id="city" name="city">
        </div>
         <div class="input-box">
            <label for="guests">Sub City:</label>
            <input type="text" id="scity" name="scity">
        </div>
        <div class="input-box">
            <label for="guests">Number of Guests:</label>
            <input type="number" id="guests" name="guests">
        </div>
        <div class="input-box">
            <label for="g_name">Guide:</label>
            <input type="text" id="g_name" name="g_name" value="<?php echo $g_name;?>" disabled>
        </div>
         <div class="input-box">
            <label for="p_name">Package:</label>
            <input type="text" id="p_name" name="p_name" value="<?php echo $p_name;?>" disabled>
        </div>
        <div class="input-box">
            <label for="p_name">Price:</label>
            <input type="text" id="p_name" name="p_price" value="<?php echo $p_price;?> per person" disabled>
        </div>
        <button type="submit" name="book">Book</button>
</form>
</section>
</body>
</html>
<?php
    }
    else
Header('Location:packages.php');
}
else
Header('Location:../../forms/t_login.php');