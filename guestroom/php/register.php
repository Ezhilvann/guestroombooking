<?php
include("db.php");
if (isset($_POST['save_reg'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $addres = mysqli_real_escape_string($conn, $_POST['addres']);
    $pasw = mysqli_real_escape_string($conn, $_POST['pasw']);


    if (!(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])  && isset($_POST['addres']) && isset($_POST['pasw']) )){
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    if (strlen($pasw) < 8) {
        $res = [
            'status' => 422,
            'message' => 'Password must be at least 8 characters'
        ];
        echo json_encode($res);
        return;
    }

    // $filename = $_FILES["photo"]["name"];
    // $tempname = $_FILES["photo"]["tmp_name"];
    // $folder = "uploads/" . $filename;
    // if($filename!=NULL)
    // {  
    //     move_uploaded_file($tempname, $folder);
    // }

    $query = "INSERT INTO userlogin (username, email, phone,addres, pasw) VALUES ('$name', '$email', '$phone', '$addres', '$pasw')";
    $query_run = mysqli_query($conn, $query);


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