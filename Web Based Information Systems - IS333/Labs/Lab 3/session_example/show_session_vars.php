<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Page to show stored session values</title>
</head>

<body>

    <?php
    if (isset($_SESSION["favcolor"]) && isset($_SESSION["favanimal"])) {
        // Echo session variables that were set on previous page
        echo "Favorite color is " . $_SESSION["favcolor"] . ".<br/>";
        echo "Favorite animal is " . $_SESSION["favanimal"];
    } else  echo "session variables are not set";
    ?>
    <!-- links -->
    <br />
    <a href="index.php">Go back home</a>
    <br />
    <a href="destroy_session.php">Delete session</a>
    <!-- end links -->
</body>

</html>