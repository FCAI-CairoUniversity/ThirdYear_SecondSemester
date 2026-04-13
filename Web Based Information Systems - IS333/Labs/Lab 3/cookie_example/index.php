<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A form to be processed and content stored as a cookie</title>
</head>

<body>
    <form action="store_cookie.php" method="post">
        <input type="text" name="name" id="name" placeholder="Write Your Name" />
        <br /><br />
        <input type="submit" value="Go to Store Cookie">
    </form>
    <!--links-->
    <br />
    <a href="check_cookie_enabled.php">Check if cookies are enabled</a>
    <br />
    <a href="store_cookie.php">Go to check cookie value</a>
    <br />
    <a href="delete_cookie.php">Go to delete cookie</a>
</body>

</html>