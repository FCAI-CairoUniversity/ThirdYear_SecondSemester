<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details Listing</title>
</head>

<body>
    <?php
    //simple sanitization to remove possible problematic charcters
    function sanitize($input)
    {
        return htmlspecialchars(trim($input));
    }

    // Using either functions will do the same effect
    function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    // Using Regular Expersession (Consider this if your validation doesn't fit any exisiting filter)
    function validateEmailRegex($email)
    {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        return preg_match($pattern, $email);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = sanitize($_POST['name'] ?? '');
        $email = sanitize($_POST['email'] ?? '');
        $birth_date = sanitize($_POST['birth_date'] ?? '');

        $errors = [];
        if (empty($name)) $errors[] = "Name required";
        if (empty($email) || !validateEmailRegex($email)) $errors[] = "Valid email required";
        if (empty($birth_date)) $errors[] = "Valid birthdate required";
        if (empty($errors)) {

    ?>
            <h1>Here are the user details:</h1>

            <table>
                <tr>
                    <td>Name</td>
                    <td> <? echo $name; ?> </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td> <? echo $email; ?> </td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                    <td> <? echo $birth_date; ?> </td>
                </tr>
            </table>
    <?
        } else {
            echo "<h2>Errors:</h2><ul>";
            foreach ($errors as $error) echo "<li>$error</li>";
            echo "</ul>";
        }
    } else echo "<h1>No user details available</h1>";
    echo "<p><a href='index.php'>Go back</a></p>";
    ?>
</body>

</html>