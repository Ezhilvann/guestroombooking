<?php
include("db.php");
if (isset($_POST['save_reg'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $maxCount = mysqli_real_escape_string($conn, $_POST['maxCount']);
    $ciDate = mysqli_real_escape_string($conn, $_POST['ciDate']);
    $coDate = mysqli_real_escape_string($conn, $_POST['coDate']);


    if (!(isset($_POST['name']) && isset($_POST['maxCount']) && isset($_POST['ciDate'])  && isset($_POST['coDate']) )){
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO booknow (maxCount,name, ciDate,coDate) VALUES ('$maxCount','$name', '$ciDate', '$coDate')";
    $query_run = mysqli_query($conn, $query);


    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Booked Successfully'
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