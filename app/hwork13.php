<?php
session_start();
?>

<?php

    $taskNumber = $_GET['task'] ?? 0;
    if (!is_numeric($taskNumber)) {
        $taskNumber = 0;
    } else {
        $taskNumber = intval($taskNumber);
    }

    $body = "practice/task.$taskNumber.php";

    if(!file_exists($body)) {
        $body = "practice/task.0.php";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="container mx-auto my-7 px-4">
    <div>
        <h1 class="text-blue-600 text-lg">
            Welcome, <?= $_SESSION['name'] ?? 'Guest' ?>
        </h1>
        <header>
            <?php include 'header.php';?>
        </header>
    <div>
    <div class="text-blue-600 text-lg my-11">
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam, odio eget molestie lacinia, leo tellus efficitur diam, auctor luctus urna leo ut libero. Quisque at efficitur purus, nec dictum augue. Morbi id massa rutrum, lobortis ipsum nec, lacinia nisl. Cras convallis sapien iaculis tortor sollicitudin hendrerit. In diam mi, semper sit amet nulla at, pellentesque tempus quam. Cras turpis velit, finibus eu pharetra sit amet, facilisis a lorem. Morbi vitae diam vel mi blandit feugiat mattis sit amet est. Integer convallis euismod rhoncus. Quisque a ultrices nulla. Vivamus ac nibh et nibh interdum tincidunt. Curabitur nunc felis, elementum id est ut, porttitor elementum dolor. Suspendisse et augue ut velit varius posuere. Sed mollis leo ut enim faucibus, sed semper quam ultricies. Donec in nibh justo. Ut enim neque, pharetra et nisi ac, pellentesque faucibus ligula. Sed lobortis turpis risus, et lobortis leo ultricies sit amet.

        Curabitur vestibulum efficitur velit nec sollicitudin. Nam elementum hendrerit mauris ac tempus. Donec volutpat, mi feugiat lacinia mattis, quam sapien iaculis est, ac luctus ex turpis ut libero. Quisque nisl tellus, blandit non condimentum at, vestibulum ac velit. Vivamus magna lorem, ornare nec pretium sed, lobortis at nibh. Fusce vitae elit tristique, tincidunt ipsum in, elementum massa. Aenean vulputate aliquet arcu, eget viverra ipsum luctus et.

        Ut ullamcorper nibh ante, pharetra convallis purus suscipit sed. Sed ac neque rutrum enim suscipit lobortis. Curabitur elit nunc, vulputate et purus non, interdum convallis quam. Nullam accumsan ex non dui suscipit efficitur. Vivamus lobortis a erat vel dignissim. Aliquam sed tortor at urna pretium posuere a ut ligula. Fusce vel justo eu velit efficitur finibus. Proin dapibus, purus eu bibendum iaculis, augue augue bibendum eros, quis bibendum nibh quam gravida augue. Etiam eget justo pulvinar, imperdiet sapien at, molestie velit. Sed quis sollicitudin est. Morbi congue, odio eget pellentesque eleifend, nulla quam maximus neque, sed maximus neque erat quis magna. Ut ultrices ornare nibh, a vestibulum nisi vulputate ac. Aliquam bibendum erat lectus, sit amet ornare nunc blandit in. Sed ut tortor convallis lectus malesuada malesuada.

        Donec sapien magna, luctus nec elit id, tempus convallis lorem. Aliquam vitae odio sollicitudin, cursus purus et, mollis mi. Sed et aliquam ante, et ullamcorper diam. Nullam libero diam, sollicitudin egestas fringilla in, pretium a purus. Vestibulum fringilla, diam nec malesuada sagittis, tortor diam feugiat ante, sollicitudin aliquet lacus nisl quis purus. Quisque eu neque sagittis, egestas sem in, facilisis justo. Duis vehicula justo ut orci dignissim faucibus. Praesent eu lacus massa.

        Nam vitae tortor nec lorem rhoncus volutpat. Vivamus semper nisl ac felis viverra, sit amet dictum arcu vestibulum. Maecenas ante nisl, tincidunt eget felis eu, laoreet dignissim tellus. Vivamus erat arcu, sodales eu vulputate vitae, mattis ac diam. Praesent eu neque erat. Cras lobortis urna vitae odio facilisis sodales at at elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras elementum lacus lacinia, maximus turpis a, congue est. Integer mattis tellus ante, at malesuada libero facilisis in.
        </p>
    </div>  
    </div>
        <footer>
            <?php include 'footer.php';?>
        </footer>
    </div>
</body>
</html>