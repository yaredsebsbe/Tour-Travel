<?php
session_start();
if(isset($_SESSION['g_id'])){
include('../components/conn.php');
	$g_id=$_SESSION['g_id'];
	$img=$con->prepare("select * from addis_abeba_tour.profile where pr_gid=?");
	$img->execute([$g_id]);
	$url= $img->fetch(PDO::FETCH_ASSOC);
	$pic=$url['pr_photo'];
	$name=$url['pr_gname'];
	$language=$url['pr_language'];
	$qualification=$url['pr_qualification'];
	

if(isset($_POST['sub'])){
    $img_name=$pic;

    $lang=$_POST['language'];
	$qual=$_POST['qualification'];
    if(isset($_FILES['img1'])){

        $im=$_FILES['img1'];
        $im_name=$im['name'];
        $im_path=$im['full_path'];
        $im_tmp_name=$im['tmp_name'];
        $im_size=$im['size'];
        $im_error=$im['error'];
        $im_ext=explode(".",$im_name);
        $im_ext_check=strtolower(end($im_ext));
		
        $im_allowed=array("jpg","jpeg","png");
		if (strlen($lang)>1&&strlen($qual)>1) {

			if($im_error!=4){
  
			if(in_array($im_ext_check,$im_allowed)){
			  if($im_size < 3000000){
				$im_new_name=uniqid("Pr-",true).".".$im_ext_check;
				$new_im_path="../test/Profiles/".$im_new_name;
				move_uploaded_file($im_tmp_name,$new_im_path);
				//setting new name to image 1 and storing in Package-Pic folder
                
            //   if($del){
                $prof_insert=$con->prepare("UPDATE addis_abeba_tour.guides,addis_abeba_tour.profile
											set g_languages=?,g_qualification=?,pr_photo=?,pr_language=?,
                                            pr_qualification=? where (g_id=?)");
				$exe=$prof_insert->execute([$lang,$qual,$im_new_name,$lang,$qual,$g_id]);
            //   }
              
    }
    else{
        echo "image size is high";
    }

            }
            else{
                echo "image will be jpg,jpeg, png extension";
            }
        }
        else{ //if the image is not setted yet
                $prof_insert=$con->prepare("UPDATE addis_abeba_tour.guides,addis_abeba_tour.profile
                                                  set g_languages=?,g_qualification=?,pr_language=?,
                                                pr_qualification=? where (g_id=?)");
                    $exe=$prof_insert->execute([$lang,$qual,$lang,$qual,$g_id]);
                  if($exe){
                    if(isset($_SESSION['ref']) && $_SESSION['ref']==true){
						echo "not refreshed";
					}
					else{
					echo("<script>location.reload();</script>"); // Add this line to automatically refresh the page
					$_SESSION['ref'] = true;
					
					}
                  }
                  else{
                    echo ("something wrong");
                  }
            }
        }
    }
    else{
        echo "please insert the right information";
    }
    }
   

?>


<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/g_home.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">Addis'<script src=""></script> <b>Tour</b>
			<label for="checkbox">
			</label>
		</h2>
		
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="..\test\profiles\<?php echo $pic; ?>" id="img">
				<h4><?php echo $name; ?></h4>
			</div>
			<ul>
				<li>
					<a href="mtf.php ?point=dash">
						<span>Dashboard</span>
					</a>
				</li>
				<li>
					<a href="mtf.php ?point=mess">
						<span>Message</span>
					</a>
				</li>
				<li>
					<a href="../forms/create_packages.php ?point=pack">
						<span>Package</span>
					</a>
				</li>
				<li>
					<a href="mtf.php ?point=prof">
						<span>Change Profile</span>
					</a>
				</li>
				<li>
					<a href="mtf.php ?point=info">
						<span>Personal Information</span>
					</a>
				</li>
				<li>
					<a href="mtf.php ?point=logo">
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1" id="sec1">
		<?php
		if(isset($_GET['point'])){
				if($_GET['point']=="dash"){
					include('dash.php');
				}
				
				else if($_GET['point']=="mess"){
					echo "<h1>Message</h1>
					<p>#CodingWithElias</p>";
					// $_GET['point']=="";
				}
				else if($_GET['point']=="pack"){
					echo "<h1>Package</h1>
					<p>#CodingWithElias</p>";
					// $_GET['point']=="";
				}
				
				else if($_GET['point']=="prof"){
					?>
					<form method='post' action='mtf.php ?point=prof' enctype="multipart/form-data" id="forms">
						<div class="prof">
							<div class="row">
								<img src="..\test\profiles\<?php echo $pic; ?>" class="img" id="img">
								<input type="file" name="img1">
								<input type="text" name="language" placeholder="Languages" value="<?php echo $language; ?>">
								<input type="text" name="qualification" placeholder="Qualification" value="<?php echo $qualification; ?>">
								<button type="submit "name="sub">save</button>
							</div>
						</div>
					</form>
					
					<?php
				}
				else if($_GET['point']=="info"){
					include('info.php');
				}
				else if($_GET['point']=="logo"){
					session_destroy();
					Header('Location: ../forms/g_login.php');
				}
			}
			?>
			
		</section>
		
	</div>


</body>


</html>
<?php
}
else{
	Header('Location: ../forms/g_login.php');
}
