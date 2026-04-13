<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Page to delete the session</title>
</head>

<body>

    <?php
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    echo "The session has been destroyed";
    ?>
    <!-- links -->
    <br />
    <a href="index.php">Go back home</a>
    <br />
    <a href="show_session_vars.php">Show the stored values in the session</a>
    <!-- end links -->
</body>

</html>