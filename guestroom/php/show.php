<?php
include("db.php");

// Fetch data from the database
$hname = mysqli_real_escape_string($conn, $_GET['name']);
$query = "SELECT * FROM property where hname='$hname'";
$result = mysqli_query($conn, $query);
if ($result) {
    $rooms = mysqli_fetch_assoc($result);
} else {
  $rooms = array(); // Empty array if no data is fetched
}
?>