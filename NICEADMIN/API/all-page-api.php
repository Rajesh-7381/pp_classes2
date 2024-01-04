<?php
require_once "./connection.php";
$query121 = "SELECT * FROM All_pages";
$data121 = mysqli_query($conn, $query121);
$registerdata = array(); 

if (mysqli_num_rows($data121) > 0) {
    while ($row121 = mysqli_fetch_assoc($data121)) {
        $registerdata[] = array(
            "id" => $row121['id'],
            "regular" => $row121['regular'],
            "shortterm" => $row121['shortterm'],           
            "crash" => $row121['crash'],
            
            "contact" => $row121['contact'],
            "contactus_description" => $row121['contactus_description'],
          
            
        );
    }
}

header('Content-Type: application/json');
echo json_encode($registerdata);
