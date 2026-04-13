<?php
// servername can be "localhost" or "127.0.0.1" or "your_server_ip"
// default username--> "root" & password --> ""
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
