<?php
session_start();
if(isset($_SESSION['g_id'])&& strlen($_SESSION['g_id'])>0){
include('../test/pack-test.php');

?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="../assets/css/pack.css">
</head>
<body>

    <form method="post" action="create_packages.php" enctype="multipart/form-data">
    <div class="container">
    <p><a href="../index.php">Addis<strong>Tour</strong></a></p>
    <div class="sub-container">
        <h1>Package Creation</h1>
        <div class="inputs">
        <p>Package Name</p>
        <input type="text" name="pname">
</div>
<div class="inputs2">
<p>Image 1</p>
        <input type="file" name='im1'>
</div>
<div class="inputs">
<p>Image 2</p>
        <input type="file" name="im2">
</div>
<div class="inputs">
<p>Image 3</p>
        <input type="file" name="im3">
</div>
        <div class="inputs">
        <p>Package cost</p>
        <input type="number" name="price">
        </div>
        <div class="inputs">
        <p>Package description</p>
        <textarea name="desc" type="text" placeholder="package description" ></textarea>
        </div>
        <div class="inputs">
        <button type="submit" name="sub">Add</button>
</div>
</div>
</div>
</form>
</form>
</div>
</body>
</html>
<?php
}
else{
Header('Location:g_login.php');
}
?>