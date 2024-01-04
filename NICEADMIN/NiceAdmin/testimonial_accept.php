<?php

include("connection.php");

// $email = $_GET['email'];
$id = $_GET['id'];

$update = "UPDATE testimonial SET status = 1 WHERE id = '$id'";
// $update = "UPDATE testimonial SET status = 1 WHERE email = '$email'";

if ($conn->query($update) === TRUE) {
    echo '<script>alert("Status updated successfully")</script>';
    header("location:testimonials.php");
} else {
  echo '<script>alert("Status not updated successfully")</script>' . $conn->error;
}

$conn->close();
?>
