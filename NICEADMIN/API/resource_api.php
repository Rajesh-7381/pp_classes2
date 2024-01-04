
<?php
require_once "./connection.php";
$query121 = "SELECT * FROM resource_gallery_img where image_type='resource'";
$data121 = mysqli_query($conn, $query121);
$homepagedata = array(); 

if (mysqli_num_rows($data121) > 0) {
    while ($row121 = mysqli_fetch_assoc($data121)) {
        $homepagedata[] = array(
            "id" => $row121['id'],
            "image_source" => $row121['image_source'],
            "description" => $row121['description'],           
           
           
        );
    }
}

header('Content-Type: application/json');
echo json_encode($homepagedata);



