<?php require_once 'config.php'; ?>
<?php
$config = getDbConfig();
$conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['dbname']);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully.<br>";
}
mysqli_close($conn);
?>
