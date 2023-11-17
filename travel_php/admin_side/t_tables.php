<?php 
            include('../components/conn.php');
            if(isset($_POST['submit'])&& strlen($_POST['search'])>0){
              $key=$_POST['search'];
              $list = $con->prepare("SELECT * FROM addis_abeba_tour.book where bk_id = ? or bk_fname=?");
              $list->execute([$key,$key]);
              if ($list->rowCount() > 0) {
                ?>
                  <tr>
                  <th>Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Phone No</th>
                  <th>Country</th>
                  <th>Booked Package</th>
                  <th>Travllers</th>
                  <th>Booked Date</th>
                  <th>Arrival Date</th>
                  <th>Remove</th>
                </tr>
            <?php
                while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
                  $id = $row['bk_id'];
                  $fname = $row['bk_fname'];
                  $lname = $row['bk_lname'];
                  $phone = $row['bk_phone_no'];
                  $country = $row['bk_country'];
                  $package = $row['bk_package'];                
                  $travller = $row['bk_no_travller'];
                  $bk_date = $row['bk_booked_date'];
                  $arr_date = $row['bk_arrival_date'];             
                  
                    $ciphering="AES-128-CTR";
                    $iv_length=openssl_cipher_iv_length($ciphering);
                    $option=0;
                    $enc_iv='1234567891011121';
                    $enc_key="AddisTour";
                    $encryption=openssl_encrypt($id,$ciphering,$enc_key,$option,$enc_iv);
                
              ?>
              <tr>
                  <td><?php echo $id ?></td>
                  <td><?php echo $fname ?></td>
                  <td><?php echo $lname ?></td>
                  <td><?php echo $phone ?></td>
                  <td><?php echo $country ?></td>
                  <td><?php echo $package ?></td>
                  <td><?php echo $travller ?></td>
                  <td><?php echo $bk_date ?></td>
                  <td><?php echo $arr_date ?></td>
                  <td><a href="delete_tourist.php?key=<?=$encryption?>" class="delete" onclick=" return checkDelete()">Delete</a></td>
              </tr>
                <?php
                
              }
            }
            else{
             echo  "<h2>No user in this ID or Name</h2>";
            }
          }
            else{         
            
            $list = $con->prepare("SELECT * FROM addis_abeba_tour.book");
            $list->execute();
            if ($list->rowCount() > 0) {
              ?>
              <tr>
                  <th>Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Phone No</th>
                  <th>Country</th>
                  <th>Booked Package</th>
                  <th>Travllers</th>
                  <th>Booked Date</th>
                  <th>Arrival Date</th>
                  <th>Remove</th>
                </tr>
                <?php
              while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['bk_id'];
                $fname = $row['bk_fname'];
                $lname = $row['bk_lname'];
                $phone = $row['bk_phone_no'];
                $country = $row['bk_country'];
                $package = $row['bk_package'];                
                $travller = $row['bk_no_travller'];
                $bk_date = $row['bk_booked_date'];
                $arr_date = $row['bk_arrival_date']; 
                
                    $ciphering="AES-128-CTR";
                    $iv_length=openssl_cipher_iv_length($ciphering);
                    $option=0;
                    $enc_iv='1234567891011121';
                    $enc_key="AddisTour";
                    $encryption=openssl_encrypt($id,$ciphering,$enc_key,$option,$enc_iv);
                
            ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $fname ?></td>
                <td><?php echo $lname ?></td>
                <td><?php echo $phone ?></td>
                <td><?php echo $country ?></td>
                <td><?php echo $package ?></td>
                <td><?php echo $travller ?></td>
                <td><?php echo $bk_date ?></td>
                <td><?php echo $arr_date ?></td>
                <td><a href="delete_tourist.php?key=<?=$encryption?>" class="delete" onclick=" return checkDelete()">Delete</a></td>
            </tr>
                <?php
              }
                
              }
              else{
                echo "<h2>There is No Booked Tourist</h2>";
              }
            }
                ?>