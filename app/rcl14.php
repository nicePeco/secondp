<?php
session_start();

$db = mysqli_connect('db', 'user', 'secret', 'secondp-db');

function cleanup($value): string 
    {
        global $db;
        if (!isset($value))
        return '';

        $value = strip_tags($value);
        $value = mysqli_real_escape_string($db, $value);

        return $value;
    }

    if (mysqli_connect_errno()) {
        $error = mysqli_connect_error();
    }

    $result = mysqli_query($db, 'SELECT * FROM `articles`');

    // mysqli_query($db, "INSERT INTO `articles` (`title`, `image_url`, `body`) VALUES('Generated article', '', '')")

    if (isset($_POST['type']) && $_POST['type'] === 'newArticle') {
        $title = cleanup($_POST['title']);
        $image = cleanup($_POST['image_url']);
        $body = cleanup($_POST['body']);

        mysqli_query($db, "INSERT INTO `articles` (`title`, `image_url`, `body`) VALUES ('$title', '$image', '$body')");
    }

    $name = !empty($_POST['name']) ? $_POST['name'] : NULL;
    $password = !empty($_POST['password']) ? $_POST['password'] : NULL;

    if (isset($_POST['name'])){
        global $db;
        $login = mysqli_query($db, "SELECT * FROM `login` WHERE `login`='$name' AND `password`='$password'");
        
        if(mysqli_num_rows($login) > 0){
            $_SESSION['name'] = $name;
        }
    }

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
            <?php if(empty($_POST['name'])) { ?>
                <form action="./rcl14.php" method="post">
                <input type="text" name="name">
                <input type="password" name="password">
                <input type="submit" value="log in">
            <?php
            } if(isset($login) && mysqli_num_rows($login) == 0) { ?>
                <form action="./rcl14.php" method="post">
                <input type="text" name="name">
                <input type="password" name="password">
                <input type="submit" value="log in">
                <p>Invalid login</p>
            <?php } 
                if(isset($login) && mysqli_num_rows($login) > 0) { ?>
                <p>logged in! Welcome <?= $_POST['name'] ?></p>
                <form action="./rcl14.php" method="post">
                <input type="hidden" name="logout" id="true">
                <input type="submit" value="logout">

            <?php }
            
            ?>
            </form>
        </div>
        <div>
            <div>
                <?php if(isset($_SESSION['name'])) { 
                    // isset($login) && mysqli_num_rows($login) > 0 ?>
                <h3>Submit form</h3>
                <form action="./rcl14.php" method="post">
                    <input type="hidden" name="type" value="newArticle">
                    <input type="text" name="title">
                    <input type="text" name="image_url">
                    <textarea name="body" id=""></textarea>
                    <input type="submit" value="store">
                </form>
            </div>

            <?php } else if(empty($_SESSION['name'])) { ?>
            
                <div>
                    <p>Log in to submit article.</p>
                </div>
            
            <?php }
            
            while($row = mysqli_fetch_assoc($result)) { ?>
            <div>
             <?= $row['id']?>
             <?= $row['title']?>
             <?= $row['image_url']?>
             <?= $row['body']?>
             </div>
        
        
        <?php } 
        ?>
        </div>
    </section>
</body>
</html>