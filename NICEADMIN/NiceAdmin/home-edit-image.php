<?php
include('./connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $targetDirectory = "../slider-image/";

    if (isset($_FILES["slider_image"]) && $_FILES["slider_image"]["error"] === 0) {

        $fileName = basename($_FILES["slider_image"]["name"]);
        $targetPath = $targetDirectory . $fileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["slider_image"]["tmp_name"], $targetPath)) {

            $sliderImage = $targetPath;
            $sliderImageHeading = $_POST["slider_image_heading"];
            $sliderImageDescription = $_POST["slider_image_description"];

            $insertSql = "INSERT INTO ImageChange (slider_image, slider_image_heading, slider_image_description) VALUES (?, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("sss", $sliderImage, $sliderImageHeading, $sliderImageDescription);

            if ($insertStmt->execute()) {
                // echo "Data inserted successfully.";
                header("Location: home.php");
                exit();
            } else {
                echo "Error inserting data: " . $insertStmt->error;
            }

            $insertStmt->close();
            $conn->close();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file uploaded or an error occurred.";
    }
}
?>
