<?php require_once 'config.php'; ?>
<?php
$config = getDbConfig();
$conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['dbname']);

if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "DELETE FROM myguests WHERE id = 3";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully.<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}
mysqli_close($conn);
?>
