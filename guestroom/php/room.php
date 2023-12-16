<?php
include("db.php");

if (isset($_POST['save_reg'])) {
    // Sanitize and escape input
    $hname = mysqli_real_escape_string($conn, $_POST['hname']);
    $maxCount = mysqli_real_escape_string($conn, $_POST['maxCount']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $cart = mysqli_real_escape_string($conn, $_POST['cart']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $nrom = mysqli_real_escape_string($conn, $_POST['nrom']);

    // Check if all required fields are set
    if (empty($hname) || empty($maxCount) || empty($price) || empty($cart) || empty($state) || empty($district) || empty($address) || !isset($_FILES['photo']) || empty($nrom)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $filename = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];
    $folder = "../uploads/" . $filename;

    // Perform file upload
    if ($filename != NULL) {
        move_uploaded_file($tempname, $folder);
    }

    // Perform database insertion
    $query = "INSERT INTO property (hname, maxCount, price, cart, loc, district, addres, photo, nrom) VALUES ('$hname','$maxCount', '$price', '$cart', '$state', '$district', '$address','$filename','$nrom')";
    $query_run = mysqli_query($conn, $query);

    // Handle database insertion result
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Registered Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}
?>
