<?php
session_start();
if(isset($_SESSION['g_id'])){

    include('../components/conn.php');
        $guides=$con->prepare("SELECT * FROM addis_abeba_tour.guides where g_id=?");
        $guides->execute([$_SESSION['g_id']]);

        if($guides->rowCount()>0){
            $row= $guides->fetch(PDO::FETCH_ASSOC);
            
            $fname=$row['g_fname'];
            $lname=$row['g_lname'];
            $email=$row['g_email'];
            $phone_num=$row['g_phone_num'];
            $language=$row['g_languages'];
            $qualification=$row['g_qualification'];
            $nationality=$row['g_nationality'];
            $city=$row['g_city'];
            $subcity=$row['g_subcity'];
        }

        if(isset($_POST['submit'])){
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $email=$_POST['email'];
            $phone_num=$_POST['pnum'];
            $language=$_POST['lang'];
            $qualification=$_POST['qual'];
            $nationality=$_POST['nation'];
            $city=$_POST['city'];
            $subcity=$_POST['subcity'];

            $img=$_FILES['img'];
            $g_prof_name=$img['name'];
            $g_prof_path=$img['full_path'];
            $g_prof_tmp_name=$img['tmp_name'];
            $g_prof_size=$img['size'];
            $g_prof_error=$img['error'];
            $g_prof_ext=explode(".",$g_prof_name);
            $g_prof_ext_check=strtolower(end($g_prof_ext));
            //image  information

            $im_allowed=array("jpg","jpeg","png");

            if (strlen($fname)>1 && strlen($lname)>1 && strlen($email)>1
                && strlen($phone_num)>1 && strlen($language)>1 && strlen($qualification)>1
                && strlen($nationality)>1 && strlen($city)>1 && strlen($subcity)>1) {

                if($g_prof_error!=4){

                    if(in_array($g_prof_ext_check,$im_allowed)){
                        if($g_prof_size < 3000000){
                            $img_new_name=uniqid("P-",true).".".$g_prof_ext_check;
                            $new_img_path="../test/profiles/".$img_new_name;
                            move_uploaded_file($g_prof_tmp_name,$new_img_path);
                            //setting new name to image 1 and storing in Package-Pic folder

                            $g_update=$con->prepare("UPDATE `addis_abeba_tour`.`guides` set 
                                            g_fname=?, g_lname=?, g_email=?, g_nationality=?,g_city=?,g_subcity=?, g_phone_num=?, g_qualification=?, g_languages=?,g_profile_image=?
                                                    where g_id=?");
                            $confirm=$g_update->execute([$fname,$lname,$email,$nationality,$city,$subcity,$phone_num,$qualification,$language,$img_new_name,$_SESSION['g_id']]);
                            Header('Location: pack_list.php');
                        }
                        else{
                            $_SESSION['pack_error']="the file is too big";
                            }
                    }
                    else{
                        $_SESSION['pack_error']="please enter valid picture";
                    }
                }//checking the extension of the images
                else{
                    $g_update=$con->prepare("UPDATE `addis_abeba_tour`.`guides` set 
                                            g_fname=?, g_lname=?, g_email=?, g_nationality=?,g_city=?,g_subcity=?, g_phone_num=?, g_qualification=?, g_languages=?
                                                    where g_id=?");
                            $confirm=$g_update->execute([$fname,$lname,$email,$nationality,$city,$subcity,$phone_num,$qualification,$language,$_SESSION['g_id']]);
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
            <h3>Personal Information</h3>
            <form method="post" action="#" enctype="multipart/form-data">
                <div class="datas">
                    <label for="name">First Name</label>
                    <input type="text" id="name" name="fname" placeholder="First Name" value="<?php echo $fname; ?>">
                </div>
                <div class="datas">
                    <label for="type">Last Name</label>
                    <input type="text" id="type" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>">
                </div>
                <div class="datas">
                    <label for="location">Email</label>
                    <input type="text" id="location" name="email" placeholder="Email" value="<?php echo $email; ?>">
                </div>
                <div class="datas" >
                    <label for="price">Phone Number</label>
                    <input type="text" id="price" name="pnum" placeholder="Phone Number" value="<?php echo $phone_num; ?>">
                </div>
                <div class="datas">
                    <label for="feature">Language</label>
                    <input type="text" id="feature" name="lang" placeholder="Language" value="<?php echo $language; ?>">
                </div>
                <div class="datas">
                    <label for="feature">Qualifcation</label>
                    <input type="text" id="feature" name="qual" placeholder="Qualifications" value="<?php echo $qualification; ?>">
                </div>
                <div class="datas" >
                    <label for="nation">Nationality</label>
                    <input type="text" id="nation" name="nation" placeholder="Nationality" value="<?php echo $nationality; ?>">
                </div>
                <div class="datas">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" placeholder="City" value="<?php echo $city; ?>">
                </div>
                <div class="datas">
                    <label for="feature">Subcity</label>
                    <input type="text" id="feature" name="subcity" placeholder="Subcity" value="<?php echo $subcity; ?>">
                </div>
                <div class="datas">
                    <label for="img">Profile Image</label>
                    <input  id="img"type="file" name="img">
                </div>
                <P></P>
                
                <button type="submit" name="submit">Save</button>
        </form>
        </div>
    </div>
</div> 
</body>
</html>
<?php
}
else{
    Header("Location: ../forms/g_login.php");
  }
