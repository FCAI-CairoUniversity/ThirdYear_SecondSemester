<?php require_once 'config.php'; ?>
<?php
$config = getDbConfig();
$conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['dbname']);

if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "INSERT INTO myguests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully.<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}
mysqli_close($conn);
?>
