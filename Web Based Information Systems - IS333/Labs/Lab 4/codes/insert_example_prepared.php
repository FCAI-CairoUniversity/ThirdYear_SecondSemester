<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement
$sql = "INSERT INTO myguests (firstname, lastname, email) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// Each "s" stands for string.
// The number of "s" corresponds to the number of parameters being passed.
// Since we are binding three parameters ($firstname, $lastname, $email), we use three "s".
// Data Type Mapping:
// "s" → string
// "i" → integer
// "d" → double (float)
// "b" → blob (binary data)
if ($stmt) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $email);

    // Set parameters and execute
    $firstname = "John";
    $lastname = "Doe";
    $email = "john@example.com";
    mysqli_stmt_execute($stmt);

    $firstname = "Mary";
    $lastname = "Moe";
    $email = "mary@example.com";
    mysqli_stmt_execute($stmt);

    $firstname = "Julie";
    $lastname = "Dooley";
    $email = "julie@example.com";
    mysqli_stmt_execute($stmt);

    echo "New records created successfully";

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing statement: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
