<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $cookie_name = "user";
    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!<br/>";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br/>";
        echo "Value is: " . $_COOKIE[$cookie_name] . "<br/>";
    }
    ?>
    <a href="index.php">Go Back Home</a><br />
</body>

</html>