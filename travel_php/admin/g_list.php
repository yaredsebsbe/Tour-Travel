<?php
include('operation2.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/list_upd.css">
</head>
<body>
    <form method="post" action="g_list.php">
    <div class="container">
        <h1>Guides</h1>
        <div class="sub-container">
        <?php
        g_list("approved");
        ?>
       </div> 
</div>
</form>
</body>
</html>