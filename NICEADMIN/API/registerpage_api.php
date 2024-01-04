<?php
require_once "./connection.php";
$query121 = "SELECT * FROM RegisterPage";
$data121 = mysqli_query($conn, $query121);
$RegisterPage = array(); 

if (mysqli_num_rows($data121) > 0) {
    while ($row121 = mysqli_fetch_assoc($data121)) {
        $RegisterPage[] = array(
            "id" => $row121['id'],
            "studentregistration" => $row121['studentregistration'],
            "our_tutorialHead" => $row121['our_tutorialHead'],
            "our_tutorial" => $row121['our_tutorial'],
            "our_tutorial_image" => $row121['our_tutorial_image'],           
            "our_missionhead" => $row121['our_missionhead'],
            "our_mission" => $row121['our_mission'],
            "our_vissionhead" => $row121['our_vissionhead'],
            "our_vission" => $row121['our_vission'],
         
        );
    }
}

header('Content-Type: application/json');
echo json_encode($RegisterPage);
