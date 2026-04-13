<?php require_once 'config.php'; ?>
<?php
$config = getDbConfig();
$conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['dbname']);

if (!$conn) die("Connection failed: " . mysqli_connect_error());

$sql = "UPDATE myguests SET lastname = 'Doe' WHERE id = 2";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully.<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}
mysqli_close($conn);
?>
