<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/tables_upd.css">
</head>
<body>
    <form method="post">
    <div class="container">
        <input type="text" name="search" id="search" placeholder="Type Id or Name...">
        <button type="submit" name="btnSearch" class="btnSearch">Search</button>
    <table>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Operation</th>
        </tr>
        <tr>
            <?php 
            include("tables.php");           
                ?>
        </tr>
    </table>
</div>
</form>
</body>
</html>