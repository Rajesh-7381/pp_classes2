<?php
require_once "./connection.php";
$query121 = "SELECT * FROM ImageChange";
$data121 = mysqli_query($conn, $query121);
$homepagedata = array(); 

if (mysqli_num_rows($data121) > 0) {
    while ($row121 = mysqli_fetch_assoc($data121)) {
        $homepagedata[] = array(
            "id" => $row121['id'],
            "slider_image" => $row121['slider_image'],
            "slider_image_heading" => $row121['slider_image_heading'],           
            "slider_image_description" => $row121['slider_image_description'],
           
        );
    }
}

header('Content-Type: application/json');
echo json_encode($homepagedata);
