<?php
// Your PHP code to delete the image record goes here
session_start();
include('./connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID of the record to delete from the POST data
    $id = $_POST["id"];
     
    $stmt = $conn->prepare("DELETE FROM ImageChange WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo " deleted successfully.";
       
    } else {
        echo "Error deleting image: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
