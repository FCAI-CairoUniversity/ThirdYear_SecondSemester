<?php
//try to save a test cookie
setcookie("test_cookie", "test", time() + 3600, '/');
?>
<html>
<head>
    <title>Page to check if cookies are enabled</title>
</head>
<body>

    <?php
    //checking if there are saved cookies or not
    if (count($_COOKIE) > 0) {
        echo "Cookies are enabled.";
    } else {
        echo "Cookies are disabled.";
    }
    ?>
    <!--links-->
    <br />
    <a href="index.php">Go Back Home</a><br />
    <!-- links end -->
</body>

</html>