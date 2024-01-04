    <?php
    include("connection.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $recordId = $_POST["record_id"];
    $resourceMessage = $_POST["resource_message"];

    $query = "UPDATE resource SET resource_message = '$resourceMessage' WHERE id = '$recordId'";

    if (mysqli_query($conn, $query)) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
    }

    mysqli_close($conn);
    ?>
