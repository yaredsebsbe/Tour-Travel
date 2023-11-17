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
</head>
<link rel="stylesheet" href="../assets/css/lists2.css">
<body>
    <form method="post" action="g_list.php">
    <div class="containers">
        <h1>Tourist Account</h1>
        <?php
        t_list();
        
        ?>
        <a href="allTour.php">All Records</a>
        </form>
</div>
</body>
</html>