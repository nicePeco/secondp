<?php

$db = mysqli_connect('db', 'user', 'secret', 'secondp-db');

if (mysqli_connect_errno()) {
    $error = mysqli_connect_error();
}

$result = mysqli_query($db, 'SELECT * FROM `articles`');


mysqli_close($db);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (!empty($error)) {?>
        <h1>nop <?= $error ?></h1>
    <?php } ?>

    <section>
        <div>
            <?php 
            
            while($row = mysqli_fetch_assoc($result)) { ?>
            <div> <?= $row['id']?></div>
            <div> <?= $row['title']?></div>
            <div> <?= $row['image_url']?></div>
            <div> <?= $row['body']?></div>
        
        
        <?php } ?>
            
            ?>
        </div>
    </section>
</body>
</html>