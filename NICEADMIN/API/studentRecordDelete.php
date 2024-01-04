<?php
include("./connection.php");

$id = $_GET['id'];

$query = "DELETE FROM register WHERE id='$id'";
$data = mysqli_query($conn, $query);

if ($data) {
    // echo "Record deleted successfully.";
} else {
    // echo "Failed to delete record.";
}
?>
