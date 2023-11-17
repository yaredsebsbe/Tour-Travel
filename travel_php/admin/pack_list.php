<?php
include('operation2.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide List</title>
</head>
<link rel="stylesheet" href="../assets/css/list_last.css">
<body>
    <form method="post" action="g_list.php">
    <div class="container">
        <h1>Packages</h1>
        <div class="sub-container">
        <?php
        package_list();
        ?>
    </div>
        </form>
</div>
</body>
</html>