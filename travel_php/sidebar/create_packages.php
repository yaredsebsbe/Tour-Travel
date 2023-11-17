<?php
session_start();
$warning='';
if(isset($_COOKIE['gcookie'])|| isset($_SESSION['g_id'])){
    $session_id='';
    if(isset($_SESSION['g_id'])){
        $session_id=$_SESSION['g_id'];
    }
    else if(isset($_COOKIE['gcookie'])){
        $session_id=$_COOKIE['gcookie'];
    }
    
include('../components/conn.php');
if(isset($_POST['submit'])){
    
    $pack_name=$_POST['pack-name'];
    $pack_price=$_POST['pack-price'];
    $pack_desc=$_POST['pack-desc'];
    $pack_location=$_POST['pack-location'];
    $pack_type=$_POST['pack-type'];
    $pack_feature=$_POST['pack-feature'];
    $pack_created_date=date("Y-m-d");
    $pack_stat='waiting';


        $pack_img=$_FILES['img'];
        $pack_img_name=$pack_img['name'];
        $pack_img_path=$pack_img['full_path'];
        $pack_img_tmp_name=$pack_img['tmp_name'];
        $pack_img_size=$pack_img['size'];
        $pack_img_error=$pack_img['error'];
        $pack_img_ext=explode(".",$pack_img_name);
        $pack_img_ext_check=strtolower(end($pack_img_ext));
            //image  information


        $im_allowed=array("jpg","jpeg","png");

            if (strlen($pack_name)>1 && strlen($pack_price)>1 && strlen($pack_desc)>1
                && strlen($pack_location)>1 && strlen($pack_type)>1 && strlen($pack_feature)>1) {

                if($pack_img_error!=4){

                    if(in_array($pack_img_ext_check,$im_allowed)){
                        if($pack_img_size < 3000000){
                            $new_img_path="../test/Package-Pic/".$pack_img_name;
                            move_uploaded_file($pack_img_tmp_name,$new_img_path);
                            //setting new name to image 1 and storing in Package-Pic folder

                            $p_insert=$con->prepare("INSERT INTO `addis_abeba_tour`.`packages` (`pack_name`, `pack_img`, `pack_type`, `pack_feature`, `pack_description`, `pack_price`,`pack_location`,`pack_created_date`, `pack_creator`,`pack_status`, `g_id`)
                                                    VALUES (?, ?, ?, ?, ?, ?,?,?,?,?,?);");
                            $confirm=$p_insert->execute([$pack_name,$pack_img_name,$pack_type,$pack_feature,$pack_desc,$pack_price,$pack_location,$pack_created_date,$_SESSION['g_fname'],$pack_stat,$_SESSION['g_id']]);
                            if($confirm){
                            // echo("saved sucessfully. Good Job :)");
                            }
                        }
                        else{
                            $warning="the file is too big";
                            }
                    }//checking the extension of the three images
                    else{
                        $warning="please enter valid picture";
                    }
                }
                else{
                    $warning="Please select a picture of the place";
                }
            }
        else{
            $warning="you need to enter full information to save";
        }
        
}

include('side-header.php');
?>

            <div class="contents">
                <h3>Create Package</h3>
                <form method="post" action="#" enctype="multipart/form-data">
                <div class="datas">
                    <p class="warn"> <?php echo $warning; ?></p>
                </div>
                    <div class="datas">
                        <label for="name">Package Name</label>
                        <input type="text" id="name" name="pack-name" placeholder="Package Name">
                    </div>
                    <div class="datas">
                        <label for="type">Package Type</label>
                        <input type="text" id="type" name="pack-type" placeholder="Package Type">
                    </div>
                    <div class="datas">
                        <label for="location">Package Location</label>
                        <input type="text" id="location" name="pack-location" placeholder="Package Location">
                    </div>
                    <div class="datas" >
                        <label for="price">Package Price</label>
                        <input type="text" id="price" name="pack-price" placeholder="Package Price">
                    </div>
                    <div class="datas">
                        <label for="feature">Package Features</label>
                        <input type="text" id="feature" name="pack-feature" placeholder="Package Features Eg-Food,Events">
                    </div>
                    <div class="datas" >
                        <label for="detail">Package Detail</label>
                        <textarea  id="detail"name="pack-desc" placeholder="Package Description"></textarea>
                    </div>
                    <div class="datas">
                        <label for="img">Image</label>
                        <input  id="img"type="file" name="img">
                    </div>
                    <div class="datas">
                        <button type="submit" name="submit">Create</button>
                    </div>
                    <p><?php echo  $warning; ?>
                    
                    
            </form>
            </div>
        </div>
    </div> 
</body>
</html>
<?php
}
else{
    Header('Location: ../forms/g_login.php');
}
?>