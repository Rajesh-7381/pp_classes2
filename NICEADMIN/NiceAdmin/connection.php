
<?php
$hostname = 'localhost';
$username = 'root';
$password = 1234;
$database = 'pp_classes';
$port = 3307; 
$conn = new mysqli($hostname, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo 'Connected successfully';
?>
