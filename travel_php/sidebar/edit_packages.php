<?php
    session_start();
    $_SESSION['pack_error']='';
    if(isset($_COOKIE['gcookie'])|| isset($_SESSION['g_id'])){
        $session_id='';
        if(isset($_SESSION['g_id'])){
            $session_id=$_SESSION['g_id'];
        }
        else if(isset($_COOKIE['gcookie'])){
            $session_id=$_COOKIE['gcookie'];
        }
        
        if(isset($_GET['pack_id'])){
        include('../components/conn.php');
            $key=$_GET['pack_id'];
            $dec_iv='1234567891011121';
            $dec_key="guide";
            $ciphering = "AES-128-CTR";
            $option=0;
            $decryption=openssl_decrypt($key,$ciphering,$dec_key,$option,$dec_iv);

        $packages=$con->prepare("SELECT * FROM addis_abeba_tour.packages where pack_id=?");
        $packages->execute([$decryption]);

        if($packages->rowCount()>0){
            $row= $packages->fetch(PDO::FETCH_ASSOC);
            
            $package_name=$row['pack_name'];
            $package_price=$row['pack_price'];
            $package_desc=$row['pack_description'];
            $package_location=$row['pack_location'];
            $package_type=$row['pack_type'];
            $package_feature=$row['pack_feature'];
            $package_img=$row['pack_img'];
        }

    if(isset($_POST['submit'])){
        $pack_name=$_POST['pack-name'];
        $pack_price=$_POST['pack-price'];
        $pack_desc=$_POST['pack-desc'];
        $pack_location=$_POST['pack-location'];
        $pack_type=$_POST['pack-type'];
        $pack_feature=$_POST['pack-feature'];

        $img=$_FILES['img'];
        $pack_img_name=$img['name'];
        $pack_img_path=$img['full_path'];
        $pack_img_tmp_name=$img['tmp_name'];
        $pack_img_size=$img['size'];
        $pack_img_error=$img['error'];
        $pack_img_ext=explode(".",$pack_img_name);
        $pack_img_ext_check=strtolower(end($pack_img_ext));
        //image  information

        $im_allowed=array("jpg","jpeg","png");

        if (strlen($pack_name)>1 && strlen($pack_price)>1 && strlen($pack_desc)>1
            && strlen($pack_location)>1 && strlen($pack_type)>1 && strlen($pack_feature)>1){

            if($pack_img_error!=4){

                if(in_array($pack_img_ext_check,$im_allowed)){
                    if($pack_img_size < 3000000){
                        $img_new_name=uniqid("P-",true).".".$pack_img_ext_check;
                        $new_img_path="../test/Package-Pic/".$img_new_name;
                        move_uploaded_file($pack_img_tmp_name,$new_img_path);
                        //setting new name to image 1 and storing in Package-Pic folder

                        $pack_update=$con->prepare("UPDATE `addis_abeba_tour`.`packages` set 
                                        pack_name=?, pack_type=?, pack_location=?, pack_price=?,pack_feature=?,pack_description=?,pack_img=?
                                                where pack_id=?");
                        $confirm=$pack_update->execute([$pack_name,$pack_type,$pack_location,$pack_price,$pack_feature,$pack_desc,$img_new_name,$decryption]);
                        Header('Location: pack_list.php');
                    }
                    else{
                        $_SESSION['pack_error']="the file is too big";
                        }
                }
                else{
                    $_SESSION['pack_error']="please enter valid picture";
                }
            }//checking the extension of the three images
            else{
                $pack_update=$con->prepare("UPDATE `addis_abeba_tour`.`packages` set 
                pack_name=?, pack_type=?, pack_location=?, pack_price=?,pack_feature=?,pack_description=?
                        where pack_id=?");
$confirm=$pack_update->execute([$pack_name,$pack_type,$pack_location,$pack_price,$pack_feature,$pack_desc,$decryption]);
Header('Location: pack_list.php');
            }
        }
    else{
        $_SESSION['pack_error']="you need to enter full information to save";
    }

    }


    include('side-header.php');

?>
            <div class="contents">
                <h3>Package Detail</h3>
                <form method="post" action="#" enctype="multipart/form-data">
                    <div class="datas">
                        <label for="name">Package Name</label>
                        <input type="text" id="name" name="pack-name" value="<?php echo $package_name; ?>">
                    </div>
                    <div class="datas">
                        <label for="type">Package Type</label>
                        <input type="text" id="type" name="pack-type" value="<?php echo $package_type; ?>">
                    </div>
                    <div class="datas">
                        <label for="location">Package Location</label>
                        <input type="text" id="location" name="pack-location" value="<?php echo $package_location; ?>">
                    </div>
                    <div class="datas" >
                        <label for="price">Package Price</label>
                        <input type="text" id="price" name="pack-price" value="<?php echo $package_price; ?>">
                    </div>
                    <div class="datas">
                        <label for="feature">Package Features</label>
                        <input type="text" id="feature" name="pack-feature" value="<?php echo $package_feature; ?>">
                    </div>
                    <div class="datas" >
                        <label for="detail">Package Detail</label>
                        <textarea  id="detail"name="pack-desc"><?php echo $package_desc; ?></textarea>
                    </div>
                    <div class="datas">
                        <label for="img">Image</label>
                        <img src="../test/Package-Pic/<?php echo $package_img;?>">
                        <input  id="img"type="file" name="img">
                    </div>
                    <div class="datas">
                        <button type="submit" name="submit">Update</button>
                    </div>                   
            </form>
            </div>
        </div>
    </div> 
</body>
</html>
<?php
}
else{
    Header('Location: pack_list.php');
}
}
else{
        Header('Location: ../forms/g_login.php');
}
