
<?php

$serverName = "localhost";
$dbUsername = "ezhilvannan";
$dbPassword = "ezhilvannan";
$dbName = "guestroom";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>