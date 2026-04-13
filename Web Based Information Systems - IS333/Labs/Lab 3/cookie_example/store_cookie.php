<?php
$cookie_name = "user";
$cookie_value = $_POST["name"];
// A question how to make the cookie expire upon closing the browser ?? search for it
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // store the cookie and set expiration to  86400 = 1 day
?>
<html>

<body>
    <?php
    //check if the cookie exist or not
    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!<br/>";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br/>";
        //getting the cookie value
        echo "Value is: " . $_COOKIE[$cookie_name] . "<br/>";
    }
    ?>

    <a href="index.php">Go Back Home</a><br />
    <a href="check_cookie.php">Go to check cookie value</a> <br />
    <a href="delete_cookie.php">Go to delete cookie</a>

</body>

</html>