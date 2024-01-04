<?php
include("./connection.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Define the upload directory
    $uploadDirectory = '../profile/';

    // Retrieve data from the form
    $profileimage = $uploadDirectory . $_FILES['profileimage']['name'];
    $fullName = $_POST['fullName'];
    $about = $_POST['about'];
    $company = $_POST['company'];
    $job = $_POST['job'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email_id = $_POST['email_id'];

    // Move the uploaded image to the storage directory
    $uploadedFilePath = $uploadDirectory . $_FILES['profileimage']['name'];

    if (move_uploaded_file($_FILES['profileimage']['tmp_name'], $uploadedFilePath)) {
        // Check if data exists in the admin table
        $checkQuery = "SELECT COUNT(*) as count FROM admin";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult) {
            $row = $checkResult->fetch_assoc();
            $rowCount = $row['count'];

            if ($rowCount > 0) {
                // Data exists, update it
                $sql = "UPDATE admin SET profileimage=?, fullname=?, about=?, company=?, job=?, address=?, phone=?, email_id=?";
            } else {
                // Data doesn't exist, insert it
                $sql = "INSERT INTO admin (profileimage, fullname, about, company, job, address, phone, email_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            }

            // Prepare and execute the SQL query
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind the parameters
                $stmt->bind_param("ssssssss", $profileimage, $fullName, $about, $company, $job, $address, $phone, $email_id);

                // Execute the query
                if ($stmt->execute()) {
                    // Data inserted or updated successfully.
                    header("location: users-profile.php");
                } else {
                    echo "Error inserting/updating data: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            } else {
                echo "Error preparing the statement: " . $conn->error;
            }
        } else {
            echo "Error checking data in the database: " . $conn->error;
        }
    } else {
        // echo "Error uploading file.";
        header("location: users-profile.php");
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
