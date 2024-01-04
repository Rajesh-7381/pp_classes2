<?php
include("./connection.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM register WHERE id='$id'";
  $data = mysqli_query($conn, $sql);
  $result = mysqli_fetch_assoc($data);


  echo json_encode($result);
} else {
  echo json_encode(['error' => 'ID not provided']);
}
?>
