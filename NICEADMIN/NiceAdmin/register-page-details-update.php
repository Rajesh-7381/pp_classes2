<?php
include('./connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the uploaded file is an image
    $fileExtension = strtolower(pathinfo($_FILES['tut-image']['name'], PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png'];

    if (!in_array($fileExtension, $allowedExtensions)) {
        $response = [
            'status' => 'error',
            'message' => 'Invalid file format. Only JPG, JPEG, and PNG are allowed.'
        ];
    } else {
        // Sanitize and validate other input fields
        $our_tutorialHead = htmlspecialchars($_POST['our_tutorialHead']);
        $our_tutorial = htmlspecialchars($_POST['our_tutorial']);
        $our_missionhead = htmlspecialchars($_POST['our_missionhead']);
        $our_mission = htmlspecialchars($_POST['our_mission']);
        $our_vissionhead = htmlspecialchars($_POST['our_vissionhead']);
        $our_vission = htmlspecialchars($_POST['our_vission']);
        $studentregistration = htmlspecialchars($_POST['studentregistration']);

        // Directory to store uploaded images
        $uploadDirectory = '../Register/';
        $uploadedFileName = $_FILES['tut-image']['name'];
        $uploadedFilePath = $uploadDirectory . $uploadedFileName;

        // Check if data already exists in the database
        $countQuery = "SELECT COUNT(*) as count FROM RegisterPage";
        $countResult = mysqli_query($conn, $countQuery);

        if ($countResult) {
            $rowCount = mysqli_fetch_assoc($countResult)['count'];

            if ($rowCount > 0) {
                // Data exists, perform an UPDATE operation
                $query = "UPDATE RegisterPage SET our_tutorialHead=?,our_tutorial=?,our_missionhead=?, our_mission=?,our_vissionhead=?, our_vission=?,studentregistration=?, our_tutorial_image=? WHERE id=1";
            } else {
                // No data exists, perform an INSERT operation
                $query = "INSERT INTO RegisterPage (id,our_tutorialHead, our_tutorial,our_missionhead, our_mission,our_vissionhead, our_vission,studentregistration, our_tutorial_image) VALUES (1, ?, ?, ?, ?, ?, ?, ?, ?)";
            }

            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                // Bind parameters to the prepared statement
                mysqli_stmt_bind_param($stmt, 'ssssssss', $our_tutorialHead, $our_tutorial, $our_missionhead, $our_mission, $our_vissionhead, $our_vission, $studentregistration, $uploadedFileName);

                $response = [];

                // Execute the SQL statement
                if (mysqli_stmt_execute($stmt)) {
                    $response['status'] = 'success';
                    header("location:register-page-details.php");
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Error updating/inserting data: ' . mysqli_stmt_error($stmt);
                }

                // Close the prepared statement
                mysqli_stmt_close($stmt);
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Error preparing the statement: ' . mysqli_error($conn);
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error counting rows: ' . mysqli_error($conn);
        }
    }

    // Set the JSON response header and output
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>
