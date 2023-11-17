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
  <h3>Packages list</h3>
  <div class="pack_rows">
    <?php
    include('../components/conn.php');
    $list = $con->prepare("SELECT * FROM addis_abeba_tour.packages where g_id=? ");
    $list->execute([$session_id]);
    if ($list->rowCount() > 0) {
      while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['pack_id'];
        $name = $row['pack_name'];
        $status = $row['pack_status'];
        $img = $row['pack_img'];

                        $ciphering="AES-128-CTR";
                        $iv_length=openssl_cipher_iv_length($ciphering);
                        $option=0;
                        $enc_iv='1234567891011121';
                        $enc_key="guide";
                        $encryption=openssl_encrypt($id,$ciphering,$enc_key,$option,$enc_iv);
    ?>
        <div class="pack_box">
          <img src="../test/Package-Pic/<?php echo $img; ?>">
          <p><strong>Package Name: </strong> <?php echo $name; ?></p>
          <p><strong>Package Status: </strong> <?php echo $status; ?></p>
          <div class="links">
            <a href="edit_packages.php?pack_id=<?= $encryption; ?>" class="edt">Edit</a>
            
            <a href="delete_packages.php?pack_id=<?= $encryption?>" class="del" onclick="return checkDelete()">Delete</a>
          </div>
        </div> <!-- end of div pack box -->
    <?php
      }
    }
    else{
      echo "<h3 class='no-pack'>You have no package.</h3>";
    }
    ?>
  </div>
</div>

 <script>
		function checkDelete() {
        return confirm('Are you sure you want to delete this Guide');
    }
</script>
</body>
</html>

<?php
} else {
  Header("Location: ../forms/g_login.php");
}
?>
