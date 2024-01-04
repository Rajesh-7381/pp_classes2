<!-- update_profile.php -->

<?php
session_start();
include('./connection.php');

if (isset($_POST['submit'])) {
  $fullname = $_POST['fullName'];
  $about = $_POST['about'];
  $company = $_POST['company'];
  $job = $_POST['job'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email_id = $_POST['email_id'];

  $query = "UPDATE admin SET fullname='$fullname', about='$about', company='$company', job='$job', address='$address', phone='$phone', email_id='$email_id' WHERE id=1";

  if (mysqli_query($conn, $query)) {
    echo "Profile updated successfully";
  } else {
    echo "Error updating profile: " . mysqli_error($conn);
  }
}
?>
