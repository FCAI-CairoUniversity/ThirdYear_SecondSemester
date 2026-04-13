<!-- This scenario show a simple form that passes data to another page after submission -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page</title>
</head>

<body>
    <!-- try testing method="get" and try removing the method attribute entirely -->
    <form action="show.php" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="" required /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id="" required /></td>
            </tr>
            <tr>
                <td>Birthdate</td>
                <td><input type="date" name="birth_date" id="" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Show the details"></td>

            </tr>
        </table>
    </form>

</body>

</html>