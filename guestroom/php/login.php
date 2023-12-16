<?php
include("db.php");
if (isset($_POST['save_reg'])) {
    // username and password sent from form 
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pasw']);

    $sql = "SELECT * FROM userlogin WHERE email = '$email' and pasw = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        $user_name = $row['username'];
        $res = [
            'status' => 200,
            'message' => 'Login Successfully',
            'user_name' => $user_name,
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Login UnSuccessful, Try again . . .'
        ];
        echo json_encode($res);
        return;
    }
}
?>