<?php
require_once "./connection.php";
$query121 = "SELECT * FROM admin";
$data121 = mysqli_query($conn, $query121);
$registerdata = array(); 

if (mysqli_num_rows($data121) > 0) {
    while ($row121 = mysqli_fetch_assoc($data121)) {
        $registerdata[] = array(
            "id" => $row121['id'],
            "fullname" => $row121['fullname'],
            "phone" => $row121['phone'],           
                
            "about" => $row121['about'],
            "company" => $row121['company'],
            "job" => $row121['job'],
            "address" => $row121['address'],
            "phone" => $row121['phone'],
            "email_id" => $row121['email_id'],
            "profileimage" => $row121['profileimage'],
          
            
        );
    }
}

header('Content-Type: application/json');
echo json_encode($registerdata);
