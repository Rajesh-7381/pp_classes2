<?php
include("./connection.php");

if (isset($_GET['id'])) {
    $studentid = mysqli_real_escape_string($conn, $_GET['id']);
    $sql454 = "SELECT * FROM register WHERE id='$studentid'";
    $data454 = mysqli_query($conn, $sql454);

    if (mysqli_num_rows($data454) === 1) {
        $student = mysqli_fetch_array($data454);
        $res = [
            'status' => 200,
            'message' => 'ID found successfully',
            'data' => $student
        ];
        echo json_encode($res);
        return false;
    } else {
        $student = null;
        $res = [
            'status' => 404,
            'message' => 'ID not found',
            'data' => $student
        ];
        echo json_encode($res);
        return false;
    }
}else{
    echo json_encode("nothing");
}
?>
