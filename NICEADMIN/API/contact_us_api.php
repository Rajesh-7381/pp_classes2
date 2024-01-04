<?php
require_once "./connection.php";
$query121 = "SELECT * FROM contact ORDER BY id DESC";
$data121 = mysqli_query($conn, $query121);
$registerdata = array(); 

if (mysqli_num_rows($data121) > 0) {
    while ($row121 = mysqli_fetch_assoc($data121)) {
        $registerdata[] = array(
            "id" => $row121['id'],
            "name" => $row121['name'],
            "phone" => $row121['phone'],
            "altphone" => $row121['altphone'],
            "email" => $row121['email'],
            "message" => $row121['message']
            
            
        );
    }
}

header('Content-Type: application/json');
echo json_encode($registerdata);
?>