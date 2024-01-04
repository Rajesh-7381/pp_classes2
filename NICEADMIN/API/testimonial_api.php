<?php

include("connection.php");


$query = "SELECT * FROM testimonial ORDER BY id DESC";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    $json_data = json_encode($data);

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *'); 

    echo $json_data;
} else {
   
    echo json_encode(array('message' => 'No data found.'));
}

mysqli_close($conn);
?>
