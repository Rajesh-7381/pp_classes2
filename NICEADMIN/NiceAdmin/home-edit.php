<?php
include('./connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define the allowed file extensions
    $allowedExtensions = ['jpg', 'jpeg', 'png'];

    $uploadDirectory = '../re/';

    // Handle image upload
    $uploadedFileName = $_FILES['image']['name'];
    $uploadedFilePath = $uploadDirectory . $uploadedFileName;
    $fileExtension = strtolower(pathinfo($uploadedFileName, PATHINFO_EXTENSION));

    if (in_array($fileExtension, $allowedExtensions)) {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFilePath)) {
            // Get form data
            $our_learnershead = $_POST['our_learnershead'];
            $our_learners = $_POST['our_learners'];

            $time_managementhead = $_POST['time_managementhead'];
            $time_management = $_POST['time_management'];

            $for_learnershead = $_POST['for_learnershead'];
            $for_learners = $_POST['for_learners'];

            $introductionhead = $_POST['introductionhead'];
            $introduction = $_POST['introduction'];

            $achievementhead = $_POST['achievementhead'];
            $achievement = $_POST['achievement'];

            // Check if data exists in the database
            $countQuery = "SELECT COUNT(*) as count FROM Home WHERE id=1";
            $countResult = $conn->query($countQuery);

            if ($countResult) {
                $rowCount = $countResult->fetch_assoc()["count"];

                if ($rowCount > 0) {
                    // Data exists, perform an UPDATE operation
                    $query = "UPDATE Home SET our_learnershead=?, our_learners=?,time_managementhead=?, time_management=?,for_learnershead=?, for_learners=?,introductionhead=?, introduction=?,achievementhead=?, achievement=?, image=? WHERE id=1";
                } else {
                    // No data exists, perform an INSERT operation
                    $query = "INSERT INTO Home (our_learnershead, our_learners, time_managementhead, time_management, for_learnershead, for_learners, introductionhead, introduction, achievementhead, achievement, image) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
                    ";
                }

                $stmt = $conn->prepare($query);

                if ($stmt) {
                    $stmt->bind_param('sssssssssss', $our_learnershead, $our_learners, $time_managementhead, $time_management, $for_learnershead, $for_learners, $introductionhead, $introduction, $achievementhead, $achievement, $uploadedFilePath);

                    if ($stmt->execute()) {
                        // Database operation successful
                        $stmt->close();

                        // Redirect to the home page after successful insert/update
                        header("Location: home.php");
                        exit;
                    } else {
                        // Database operation failed
                        $response['status'] = 'error';
                        $response['message'] = 'Error updating/inserting data: ' . $stmt->error;
                    }
                } else {
                    // Error preparing the statement
                    $response['status'] = 'error';
                    $response['message'] = 'Error preparing the statement: ' . $conn->error;
                }
            } else {
                // Error counting rows
                $response['status'] = 'error';
                $response['message'] = 'Error counting rows: ' . $conn->error;
            }
        } else {
            // Error uploading the image
            $response['status'] = 'error';
            $response['message'] = 'Error uploading the image.';
        }
    } else {
        // Invalid file format
        // $response['status'] = 'error';
        // $response['message'] = 'Invalid file format. Only JPG, JPEG, and PNG are allowed.';
    }

    // If there's an error, you can handle it accordingly, e.g., display an error message.
    // Here, I'm just using JSON response as an example.
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>
