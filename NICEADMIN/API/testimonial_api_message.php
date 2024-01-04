<?php

require_once "./connection.php";


$query54 = "SELECT * FROM testimonial WHERE status=1 ORDER BY id DESC";
$result23 = mysqli_query($conn, $query54);

if (mysqli_num_rows($result23) > 0) {
  $data = array();
  while ($row = mysqli_fetch_assoc($result23)) {
    $data[] = array(
      'event' => htmlspecialchars($row["memoryableEVENT"]),
      'name' => htmlspecialchars($row["name"]),
    );
  }

  header('Content-Type: application/json');
  echo json_encode($data);
} else {
  echo json_encode(array('message' => 'No results found'));
}
?>

