<?php
session_start();
include("./connection.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $course_id = $_GET['id'];

    $sql = "UPDATE courses SET status = 0 WHERE course_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $course_id);

        if (mysqli_stmt_execute($stmt)) {
            // Get the course type of the updated course
            $course_type_query = "SELECT course_type FROM courses WHERE course_id = ?";
            $course_type_stmt = mysqli_prepare($conn, $course_type_query);

            if ($course_type_stmt) {
                mysqli_stmt_bind_param($course_type_stmt, "i", $course_id);

                if (mysqli_stmt_execute($course_type_stmt)) {
                    mysqli_stmt_bind_result($course_type_stmt, $course_type);
                    mysqli_stmt_fetch($course_type_stmt);

                    // Close the course type statement
                    mysqli_stmt_close($course_type_stmt);

                    // Determine the redirection URL based on course type
                    $redirect_url = "";
                    switch ($course_type) {
                        case 'regular':
                            $redirect_url = 'ex_regular_course.php';
                            break;
                        case 'shortterm':
                            $redirect_url = 'explore-shortterm_course.php';
                            break;
                        case 'crash course':
                            $redirect_url = 'explore_crashcourse.php';
                            break;
                        default:
                            // Handle unknown course type
                            echo "Unknown course type";
                            exit;
                    }

                    // Status updated successfully, redirect to the determined URL
                    header('Location: ' . $redirect_url);
                    exit;
                } else {
                    echo "Error fetching course type: " . mysqli_error($conn);
                }
            } else {
                echo "Error preparing course type statement: " . mysqli_error($conn);
            }
        } else {
            echo "Error updating status: " . mysqli_error($conn);
        }

        // Close the main statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request";
}
?>
