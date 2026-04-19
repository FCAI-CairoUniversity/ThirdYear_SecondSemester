<?php require_once 'config.php'; ?>
<?php include 'navbar.php'; ?>
<?php
$config = getDbConfig();
$conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['dbname']);

if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "INSERT INTO myguests (firstname, lastname, email) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $email);

$firstname = "John"; $lastname = "Doe"; $email = "john@example.com"; mysqli_stmt_execute($stmt);
$firstname = "Mary"; $lastname = "Moe"; $email = "mary@example.com"; mysqli_stmt_execute($stmt);
$firstname = "Julie"; $lastname = "Dooley"; $email = "julie@example.com"; mysqli_stmt_execute($stmt);

echo "New records created successfully.<br>";
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
