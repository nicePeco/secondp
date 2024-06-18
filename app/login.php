<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <body class="container mx-auto my-7 mx-7">
        <div>
            <header>
                <?php include 'header.php';?>
            </header>
        <div>
        <?php 

            $parole = 'parole';
            
            if(isset($_POST['password']) && isset($_POST['name'])) {
                if($parole === $_POST['password']) {
                    $_SESSION['name'] = $_POST['name'];
                }
            }

            if(isset($_POST['logout'])) {
                session_unset();
            }

        ?>
            <h1 class="text-blue-600 text-lg text-center">Welcome, <?= $_SESSION['name'] ?? 'Guest' ?></h1>

            <?php if(empty($_SESSION['name'])) { ?>
            <form action="./login.php" method="post" class="flex flex-col w-3/12 mx-auto my-3 ">
                <input type="text" name="name" class="border-2 border-solid border-blue-600 my-3">
                <input type="password" name="password" class="border-2 border-solid border-blue-600 my-3">
                <input type="submit" value="log in" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 my-3">
            </form>
            <?php } ?>
            <footer>
                <?php include 'footer.php';?>
            </footer>
    </body>
</html>