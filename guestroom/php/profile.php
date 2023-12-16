<?php
// if ($query_run) {
//     $res = [
//         'status' => 200,
//         'message' => 'Registered Successfully',
//         'username' => $name
//     ];
//     echo json_encode($res);
//     return;
// }


include("db.php");

// Fetch data from the database
$query = "SELECT * FROM property";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $rooms = array(); // Empty array if no data is fetched
}


?>