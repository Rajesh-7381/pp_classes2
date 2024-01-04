<?php
require_once "./connection.php";
$query121 = "SELECT * FROM Header_Footer";
$data121 = mysqli_query($conn, $query121);
$registerdata = array();

if (mysqli_num_rows($data121) > 0) {
    while ($row121 = mysqli_fetch_assoc($data121)) {
        $registerdata[] = array(
            "id" => $row121['id'],
            "home" => $row121['home'],
            "register" => $row121['register'],
            "explore" => $row121['explore'],
            "regular" => $row121['regular'],
            "crash" => $row121['crash'],
            "shortterm" => $row121['shortterm'],
            "resource" => $row121['resource'],
            "galleryname" => $row121['galleryname'],
            "contactus" => $row121['contactus'],
            "aboutus_Head" => $row121['aboutus_Head'],
            "Alumni_Speaks" => $row121['Alumni_Speaks'],
            "Company_Header" => $row121['Company_Header'],
            "Service_Header" => $row121['Service_Header'],
            "Reach_Us_At" => $row121['Reach_Us_At'],
            "copyright" => $row121['copyright'],
            "Address" => $row121['Address'],
            "Phone" => $row121['Phone'],
            "Email" => $row121['Email']
        );
    }
}

header('Content-Type: application/json');
echo json_encode($registerdata);
?>
