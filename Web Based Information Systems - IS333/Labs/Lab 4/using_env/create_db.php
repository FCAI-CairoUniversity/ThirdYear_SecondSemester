<?php require_once 'config.php'; ?>
<?php
$config = getDbConfig();
$conn = mysqli_connect($config['host'], $config['user'], $config['pass']);

if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "CREATE DATABASE IF NOT EXISTS {$config['dbname']}";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully.<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}
mysqli_close($conn);
?>
