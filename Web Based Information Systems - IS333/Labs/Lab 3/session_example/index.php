<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Test Page to store session</title>
</head>
<body>

    <?php
    // Set session variables
    $_SESSION["favcolor"] = "green";
    $_SESSION["favanimal"] = "cat";
    echo "Session variables are set.";
    ?>
    <!-- links -->
    <br />
    <a href="show_session_vars.php">Show the stored values in the session</a>
    <br />
    <a href="destroy_session.php">Delete session</a>
    <!-- end links -->
</body>

</html>