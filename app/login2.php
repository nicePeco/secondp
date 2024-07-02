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

if (isset($_POST['type']) && $_POST['type'] === 'newArticle') {
    $title = isset($_POST['title']) ? cleanup($_POST['title']) : '';
    $image = isset($_POST['image_url']) ? cleanup($_POST['image_url']) : '';
    $body = isset($_POST['body']) ? cleanup($_POST['body']) : '';

    mysqli_query($db, "INSERT INTO `articles` (`title`, `image_url`, `body`) VALUES ('$title', '$image', '$body')");
}

$name = isset($_POST['name']) ? cleanup($_POST['name']) : NULL;
$password = isset($_POST['password']) ? cleanup($_POST['password']) : NULL;

if (!is_null($name)) {
    $query = "SELECT * FROM `login` WHERE `login`='$name' AND `password`='$password'";
    $login = mysqli_query($db, $query);
    
    if(mysqli_num_rows($login) > 0){
        $_SESSION['name'] = $name;
    } else {
        $login_error = "Invalid login";
    }
}

if (isset($_POST['type']) && $_POST['type'] === 'editArticle') {
    $id = cleanup($_POST['id']);
    $title = isset($_POST['title']) ? cleanup($_POST['title']) : '';
    $image = isset($_POST['image_url']) ? cleanup($_POST['image_url']) : '';
    $body = isset($_POST['body']) ? cleanup($_POST['body']) : '';

    mysqli_query($db, "UPDATE `articles` SET `title` = '$title', `image_url` = '$image', `body` = '$body' WHERE `id`= $id");
}

if (isset($_GET['delete'])) {
    $id = cleanup($_GET['delete']);

    mysqli_query($db, "DELETE FROM `articles` WHERE `id`= $id");
}

$editableArticle = [];

if (!empty($_GET['edit'])) {
    $id = cleanup($_GET['edit']);
    $editResult = mysqli_query($db, "SELECT * FROM `login` WHERE `id` = $id");

    if (mysqli_num_rows($editResult) > 0) {
        $editableArticle = mysqli_fetch_assoc($editResult);
    }

}

$result = mysqli_query($db, 'SELECT * FROM `articles`');

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ./login2.php");
    exit();
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
            <?php if(empty($_SESSION['name'])) { ?>
                <form action="./login2.php" method="post">
                    <input type="text" name="name" required>
                    <input type="password" name="password" required>
                    <input type="submit" value="log in">
                </form>
                <?php if (!empty($login_error)) { ?>
                    <p><?= $login_error ?></p>
                <?php } ?>
            <?php } else { ?>
                <p>logged in! Welcome <?= $_SESSION['name'] ?></p>
                <form action="./login2.php" method="post">
                    <input type="hidden" name="logout" value="true">
                    <input type="submit" value="logout">
                </form>
            <?php } ?>
        </div>
        <div>
            <div>
                <?php if(!empty($_SESSION['name'])) { ?>
                    <h3>Submit form</h3>
                    <form action="./login2.php" method="post">
                        <input type="hidden" name="type" value="newArticle">
                        <input type="text" name="title" required>
                        <input type="text" name="image_url" required>
                        <textarea name="body" required></textarea>
                        <input type="submit" value="Store">
                    </form>
                    <?php 
                        
                    ?>
                    <h3>Edit</h3>
                    <form action="./login2.php" method="post">
                    <input type="hidden" name="type" value="editArticle">
                        <input type="text" name="id" value="<?= $editableArticle['id'] ?? '' ?>">
                        <input type="text" name="title" value="<?= $editableArticle['title'] ?? '' ?>">
                        <input type="text" name="image_url" value="<?= $editableArticle['image_url'] ?? '' ?>">
                        <textarea name="body" value="<?= $editableArticle['body'] ?? '' ?>"></textarea>
                        <input type="submit" value="Update">
                    </form>
                <?php } else { ?>
                    <div>
                        <p>Log in to submit article.</p>
                    </div>
                <?php } ?>
            </div>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div>
                    <tr>
                        <td><?= $row['id']?></td>
                        <td><?= $row['title']?></td>
                        <td><?= $row['image_url']?></td>
                        <td><?= $row['body']?></td>
                        <?php if(!empty($_SESSION['name'])) { ?>
                        <td><a href="?edit=<?= $row['id']?>"><button>Edit</button></a></td>
                        <td><a href="?delete=<?= $row['id']?>"><button>Delete</button></a></td>
                        <?php } ?>
                    </tr>
                </div>
            <?php } ?>
        </div>
    </section>
</body>
</html>