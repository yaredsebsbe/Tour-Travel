<?php 
            include('../components/conn.php');
            if(isset($_POST['submit'])&&strlen($_POST['search'])>0){
                $key=$_POST['search'];
                $list = $con->prepare("SELECT * FROM addis_abeba_tour.guides where g_id=? or g_fname=? and g_status='approved'");
                $list->execute([$key,$key]);
            if ($list->rowCount() > 0) {
              ?>
              <tr>
                <th>Id</th>
                <th>Name</th>               
                <th>Sex</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Country</th>
                <th>city</th>
                <th>Sub-cty</th>
                <th>Language</th>
                <th>Packages</th>
                <th>Remove</th>
            </tr>
            <?php
              while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['g_id'];
                $fname = $row['g_fname'];
                $lname = $row['g_lname'];
                $gender = $row['g_gender'];
                $email = $row['g_email'];                
                $phone_no = $row['g_phone_num'];
                $nationality = $row['g_nationality'];
                $city = $row['g_city'];
                $sub_city = $row['g_subcity'];
                $Language = $row['g_languages'];
                $name=$fname." ". $lname;

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
                <td><?php echo $gender ?></td>
                <td><?php echo $email ?>.com</td>
                <td><?php echo $phone_no ?></td>
                <td><?php echo $nationality ?></td>
                <td><?php echo $city ?></td>
                <td><?php echo $sub_city ?></td>
                <td><?php echo $Language ?></td>
                <td><a href="package_list.php?key=<?=$encryption; ?>" class="packages">Packages</a></td>
                <td><a href="delete_guide.php?key=<?=$encryption; ?>" class="delete" onclick="return checkDelete()">Delete</a></td>
                
            <tr>
                <?php
                
              }
            }
            else{
              echo "<h2>No Guide in this Id or Name<h2>";
            }
          }
            else{         
            
            $list = $con->prepare("SELECT * FROM addis_abeba_tour.guides where g_status='approved' ");
            $list->execute();
            if ($list->rowCount() > 0) {
              ?>
              <tr>
                <th>Id</th>
                <th>Name</th>               
                <th>Sex</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Country</th>
                <th>city</th>
                <th>Sub-cty</th>
                <th>Language</th>
                <th>Packages</th>
                <th>Remove</th>
            </tr>
            <?php
              while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['g_id'];
                $fname = $row['g_fname'];
                $lname = $row['g_lname'];
                $gender = $row['g_gender'];
                $email = $row['g_email'];                
                $phone_no = $row['g_phone_num'];
                $nationality = $row['g_nationality'];
                $city = $row['g_city'];
                $sub_city = $row['g_subcity'];
                $Language = $row['g_languages'];
                $name=$fname." ". $lname;

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
                <td><?php echo $gender ?></td>
                <td><?php echo $email ?>.com</td>
                <td><?php echo $phone_no ?></td>
                <td><?php echo $nationality ?></td>
                <td><?php echo $city ?></td>
                <td><?php echo $sub_city ?></td>
                <td><?php echo $Language ?></td>
                <td><a href="package_list.php?key=<?=$encryption; ?>" class="packages">Packages</a></td>
                <td><a href="delete_guide.php?key=<?=$encryption; ?>" class="delete" onclick=" return checkDelete()">Delete</a></td>
                
            <tr>
                <?php
              }
                
              }
            }
                ?>