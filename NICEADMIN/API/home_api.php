<?php
require_once "./connection.php";
$query121 = "SELECT * FROM Home";
$data121 = mysqli_query($conn, $query121);
$homepagedata = array(); 

if (mysqli_num_rows($data121) > 0) {
    while ($row121 = mysqli_fetch_assoc($data121)) {
        $homepagedata[] = array(
            "id" => $row121['id'],
            "our_learnershead" => $row121['our_learnershead'],
            "our_learners" => $row121['our_learners'],
            "time_managementhead" => $row121['time_managementhead'],           
            "time_management" => $row121['time_management'],           
            "for_learnershead" => $row121['for_learnershead'],
            "for_learners" => $row121['for_learners'],
            "introductionhead" => $row121['introductionhead'],
            "introduction" => $row121['introduction'],
            "achievementhead" => $row121['achievementhead'],
            "achievement" => $row121['achievement'],
            "image" => $row121['image'],
            
          
            
        );
    }
}

header('Content-Type: application/json');
echo json_encode($homepagedata);
