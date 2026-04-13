<?php
// set the expiration date to one hour ago (removing the cookie)
setcookie("user", "", time() - 3600, "/");
?>
<html>

<body>

    <?php
    echo "Cookie 'user' is deleted. <br/>";
    ?>
    <a href="index.php">Go Back Home</a><br />
    <a href="check_cookie.php">Go to check cookie value</a> <br />
    <a href="delete_cookie.php">Go to delete cookie</a> 
</body>

</html>