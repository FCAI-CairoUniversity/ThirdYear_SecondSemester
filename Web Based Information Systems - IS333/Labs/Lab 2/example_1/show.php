<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details Listing</title>
</head>

<body>
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $birth_date = $_POST["birth_date"];
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
    } 
    else echo "<h1>No user details available</h1>";
    echo "<p><a href='index.php'>Go back</a></p>";
    ?>
</body>

</html>