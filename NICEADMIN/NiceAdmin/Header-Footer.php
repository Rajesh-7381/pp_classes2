<?php
include("./connection.php");

if (isset($_POST['submit'])) {

    $home = $_POST['home'];
    $register = $_POST['register'];
    $explore = $_POST['explore'];
    $regular = $_POST['regular'];
    $shortterm = $_POST['shortterm'];
    $crash = $_POST['crash'];
    $resource = $_POST['resource'];
    $galleryname = $_POST['galleryname'];
    $contactus = $_POST['contactus'];
    
    $aboutus_Head = $_POST['aboutus_Head'];
    $Alumni_Speaks = $_POST['Alumni_Speaks']; 
    $Company_Header = $_POST['Company_Header'];
    $Service_Header = $_POST['Service_Header'];
    $Reach_Us_At = $_POST['Reach_Us_At'];
    $copyright = $_POST['copyright'];
    $Address = $_POST['Address'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $response = [];

    $countQuery = "SELECT COUNT(*) AS count FROM Header_Footer";
    $CountResult = $conn->query($countQuery);

    if ($CountResult) {
        $rowCount = $CountResult->fetch_assoc()['count'];

        if ($rowCount > 0) {
            $Query = "UPDATE Header_Footer SET home=?, register=?, explore=?,regular=?,shortterm=?,crash=?, resource=?, galleryname=?, contactus=?, aboutus_Head=?, Alumni_Speaks=?, Company_Header=?, Service_Header=?, Reach_Us_At=?,copyright=?,Address=?,Phone=?,Email=? WHERE id=1"; // Updated column names
        } else {
            $Query = "INSERT INTO Header_Footer (home, register, explore,regular,shortterm,crash, resource, galleryname, contactus, aboutus_Head, Alumni_Speaks, Company_Header, Service_Header, Reach_Us_At,copyright,Address,Phone,Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?)";
        }

        $stmt = $conn->prepare($Query);
        if ($stmt) {
            $stmt->bind_param('ssssssssssssssssss', $home, $register, $explore,$regular,$shortterm,$crash, $resource, $galleryname, $contactus, $aboutus_Head, $Alumni_Speaks, $Company_Header, $Service_Header, $Reach_Us_At,$copyright,$Address,$Phone,$Email);

            if ($stmt->execute()) {
                $response['status'] = 'success';
                $response['message'] = 'Data inserted/updated successfully.';
                
                // Redirect to all-page.php after successful submission
                header("Location: all-page.php");
                exit; // Make sure to exit after redirection
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Error updating/inserting data: ' . $stmt->error;
            }

            $stmt->close();
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error preparing statement: ' . $conn->error;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error executing count query: ' . $conn->error;
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

header("Content-Type: application/json");
echo json_encode($response);
?>
