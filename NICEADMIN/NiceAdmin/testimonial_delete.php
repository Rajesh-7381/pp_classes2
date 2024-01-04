<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
</head>
<body>
    <?php
   include("./connection.php");
    $id = $_GET['id'];
    $query = "DELETE FROM testimonial WHERE id='$id'";
    $data = mysqli_query($conn, $query);
    if($data){
        ?>
        <script>
               alert("Record deleted successfully!");
               window.location.href = 'testimonials.php';
        
        </script>
        <?php
    } else {
        echo "Failed to delete record";
    }
    ?>
</body>
</html>
