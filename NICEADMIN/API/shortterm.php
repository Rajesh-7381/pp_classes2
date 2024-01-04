<?php

include("connection.php");


$query = "SELECT * FROM courses where course_type='shortterm' and status=1";
$result = mysqli_query($conn, $query);
$data = array();

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array(
            "course_id"=>$row['course_id'],
            "board"=>$row['board'],
            "grade"=>$row['grade'],
            "program"=>$row['program'],
            "duration"=>$row['duration'],
            "status"=>$row['status'],

        );
    }

    $json_data = json_encode($data);

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *'); 

    echo $json_data;
} else {
   
    // echo json_encode(array('message' => 'No data found.'));
}

mysqli_close($conn);
?>
