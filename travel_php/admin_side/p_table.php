<?php 
            include('../components/conn.php');
            if(isset($_POST['submit'])&& strlen($_POST['search'])>0){
              $key=$_POST['search'];
              $list = $con->prepare("SELECT * FROM addis_abeba_tour.packages where pack_id = ? or pack_name=?");
              $list->execute([$key,$key]);
              if ($list->rowCount() > 0) {
                ?>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Location</th>
                <th>Feature</th>
                <th>Price</th>
                <th>Status</th>
                <th>Created By</th>
                <th>Remove</th>
            </tr>
            <?php
                while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
                    $id = $row['pack_id'];
                    $name = $row['pack_name'];
                    $location = $row['pack_location'];
                    $feature = $row['pack_feature'];
                    $price = $row['pack_price'];
                    $stat = $row['pack_status'];
                    $owner = $row['pack_creator']; 
                    
                    $ciphering="AES-128-CTR";
                    $iv_length=openssl_cipher_iv_length($ciphering);
                    $option=0;
                    $enc_iv='1234567891011121';
                    $enc_key="AddisTour";
                    $encryption=openssl_encrypt($id,$ciphering,$enc_key,$option,$enc_iv);
                    
                ?>
              <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $location ?></td>
                    <td><?php echo $feature ?></td>
                    <td><?php echo $price ?></td>
                    <td><?php echo $stat ?></td>
                    <td><?php echo $owner ?></td>
                    <td><a href="delete_guide.php?key=<?=$encryption?>" class="delete" onclick=" return checkDelete()">Delete</a></td>
              </tr>
                <?php
                
              }
            }
            else{
            echo  "<h2>No user in this ID or Name</h2>";
            }
          }
        else{         
            
            $list = $con->prepare("SELECT * FROM addis_abeba_tour.packages");
            $list->execute();
            if ($list->rowCount() > 0) {
            ?>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Location</th>
                <th>Feature</th>
                <th>Price</th>
                <th>Status</th>
                <th>Created By</th>
                <th>Remove</th>
            </tr>
            <?php
                while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
                    $id = $row['pack_id'];
                    $name = $row['pack_name'];
                    $location = $row['pack_location'];
                    $feature = $row['pack_feature'];
                    $price = $row['pack_price'];
                    $stat = $row['pack_status'];
                    $owner = $row['pack_creator']; 
                    
                    $ciphering="AES-128-CTR";
                    $iv_length=openssl_cipher_iv_length($ciphering);
                    $option=0;
                    $enc_iv='1234567891011121';
                    $enc_key="AddisTour";
                    $encryption=openssl_encrypt($id,$ciphering,$enc_key,$option,$enc_iv);
                ?>
              <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $location ?></td>
                    <td><?php echo $feature ?></td>
                    <td><?php echo $price ?></td>
                    <td><?php echo $stat ?></td>
                    <td><?php echo $owner ?></td>
                    <td><a href="delete_package.php?key=<?=$encryption?>" class="delete" onclick="return checkDelete()">Delete</a></td>
              </tr>
                <?php
                
              }
            }
            }
                ?>