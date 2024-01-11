<?php
require_once('vendor/autoload.php'); // Include the Composer autoloader for JWT

use Firebase\JWT\JWT;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Replace this with your own user authentication logic
    if (authenticateUser($data['email'], $data['password'])) {
        // Replace 'your-secret-key' with your own secret key for JWT
        $secretKey = 'AMIRPET';
        $issuedAt = time();
        $expirationTime = $issuedAt + 3600; // 1 hour
        $payload = array(
            'email' => $data['email'],
            'iat' => $issuedAt,
            'exp' => $expirationTime
        );
        $token = JWT::encode($payload, $secretKey, 'HS256');

        // Store the token in a cookie or session if needed
        setcookie('token', $token, time() + 3600, '/'); // Example: setting a cookie for 1 hour

        // Redirect to a new page after successful login
        header('Content-Type: application/json'); // Set content type to JSON
        echo json_encode(array('token' => $token));
        exit();
    } else {
        http_response_code(401);
        header('Content-Type: application/json'); // Set content type to JSON
        echo json_encode(array('error' => 'Invalid credentials'));
        exit();
    }
}


function authenticateUser($email, $password)
{
    // Replace these credentials with your actual database credentials
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'test';

    // Create a connection to the database
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);

    // Execute the query
    $stmt->execute();

    // Fetch the result
    $result = $stmt->get_result();

    // Check if a user with the provided credentials exists
    if ($result->num_rows > 0) {
        // User is authenticated
        $stmt->close();
        $conn->close();
        return true;
    } else {
        // User is not authenticated
        $stmt->close();
        $conn->close();
        return false;
    }
}
?>