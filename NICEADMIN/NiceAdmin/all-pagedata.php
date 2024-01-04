<?php
include("./connection.php");

if (isset($_POST['submit'])) {

    $regular = $_POST['regular'];
    $shortterm = $_POST['shortterm'];
    $crash = $_POST['crash'];
   
    $contact = $_POST['contact'];
    $contactus_description = $_POST['contactus_description'];
    $response = [];

    $countQuery = "SELECT COUNT(*) AS count FROM All_Pages";
    $CountResult = $conn->query($countQuery);

    if ($CountResult) {
        $rowCount = $CountResult->fetch_assoc()['count'];

        if ($rowCount > 0) {
            $Query = "UPDATE All_Pages SET regular=?, shortterm=?, crash=?, contact=?,contactus_description=? WHERE id=1";
        } else {
            $Query = "INSERT INTO All_Pages (regular, shortterm,crash, contact,contactus_description) VALUES (?, ?, ?, ?, ?)";
        }

        $stmt = $conn->prepare($Query);
        if ($stmt) {
            $stmt->bind_param('sssss', $regular, $shortterm, $crash, $contact,$contactus_description);

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
