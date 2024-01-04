<?php

include('./connection.php');
$sql = "SELECT * FROM Home";
$details = mysqli_query($conn, $sql);
$homedata=array();
if(mysqli_num_rows($details)>0){
    while ($row = mysqli_fetch_assoc($details)) {
        $homedata[]=array(
            "id"=>$row['id'],
            "our_learners"=>$row['our_learners'],
            "time_management"=>$row['time_management'],
            "for_learners"=>$row['for_learners'],
            "introduction"=>$row['introduction'],
            "achievement"=>$row['achievement']

        );
       
    }
}


header('Content-Type:application/json');
echo json_encode($homedata);
