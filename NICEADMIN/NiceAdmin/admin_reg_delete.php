<?php
include("./connection.php");
$id = $_GET['id'];

$query = "SELECT * FROM register WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "Record not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <!-- Include SweetAlert CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
       
        swal({
            title: "Are you sure?",
            text: "Delete This Record",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "http://localhost/pp_classes/NiceAdmin/API/studentRecordDelete.php?id=<?php echo $id; ?>", true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        swal("Poof! The record has been deleted!", {
                            icon: "success",
                        }).then(() => {
                            window.location.href = "admin_register.php";
                        });
                    }
                };
                xhr.send();
            } else {
                // If user cancels, navigate back
                history.back();
            }
        });
    </script>
</body>
</html>
