<?php
require_once "./connection.php";
$query121 = "SELECT * FROM register ORDER BY id DESC";
$data121 = mysqli_query($conn, $query121);
$registerdata = array(); 

if (mysqli_num_rows($data121) > 0) {
    while ($row121 = mysqli_fetch_assoc($data121)) {
        $registerdata[] = array(
            "id" => $row121['id'],
            "fullname" => $row121['fullname'],
            "phone" => $row121['phone'],
            "fatherName" => $row121['fatherName'],
            "fathernumber" => $row121['fathernumber'],
            "email" => $row121['email'],
            "address" => $row121['address'],
            "standard" => $row121['standard'],
            "schoolname" => $row121['schoolname'],
            "Board" => $row121['Board'],
            "gender" => $row121['gender'],
            "submission_time" => $row121['submission_time']
        );
    }
}

header('Content-Type: application/json');
echo json_encode($registerdata);
?>