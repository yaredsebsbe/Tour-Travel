<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $name=$_POST['name'];
    do{
        ?>
        <button class="open">Login</button>
        <dialog class="modal>
        <form method="post">
        <input type="text" name="name" placehold="name">
        <button type="submit" name="sub">
    </form>
        </dialog>
        <script>
    const modal=document.querySelector('.modal');
    const open=document.querySelector('.open');

    open.addEventListener('click',()=>{
        modal.showModal();
    });
    
</script>
        <?php
    }while($name=='Yared');

    ?>
</body>
</html>