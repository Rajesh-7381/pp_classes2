<?php
include('./footer.php');
session_start();
include('./connection.php');

if (isset($_GET['id'])) {
    $deleteId = $_GET['id'];


    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['confirm'])) {
        
        $deleteQuery = "DELETE FROM courses WHERE course_id = '$deleteId' AND course_type='regular'";
        $deleteResult = mysqli_query($conn, $deleteQuery);
        if ($deleteResult) {
            // Success message with SweetAlert
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Record deleted successfully.',
                    showConfirmButton: false,
                    timer: 1500 // Close the alert after 1.5 seconds
                }).then(function() {
                    window.location.href = 'ex_regular_course.php';
                });
            </script>";
        } else {
            // Error message with SweetAlert
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error deleting record.',
                    showConfirmButton: false,
                    timer: 1500 // Close the alert after 1.5 seconds
                });
            </script>";
        }
    } else {
        // Display a confirmation dialog to the user
        echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'Confirmation',
                text: 'Are you sure you want to delete this record?',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel'
            }).then(function(result) {
                if (result.isConfirmed) {
                    // User clicked 'Yes, delete it', submit the form
                    var form = document.createElement('form');
                    form.method = 'post';
                    form.action = window.location.href;
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'confirm';
                    input.value = '1';
                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                } else {
                    // User clicked 'Cancel', do nothing
                    window.location.href = 'ex_regular_course.php'; // Redirect to the same page
                }
            });
        </script>";
    }
}
?>
