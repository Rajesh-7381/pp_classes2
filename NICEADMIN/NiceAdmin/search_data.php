<?php
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    
    // Connect to the database and perform the search query
    include("connection.php");

    $sql = "SELECT * FROM register WHERE fullname LIKE '%$searchTerm%' OR standard LIKE '%$searchTerm%' OR Board LIKE '%$searchTerm%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $output = '';

        while ($row = $result->fetch_assoc()) {
            $output .= '<tr>';
            $output .= '<td>' . $row['id'] . '</td>';
            $output .= '<td>' . $row['fullname'] . '</td>';
            $output .= '<td>' . $row['email'] . '</td>';
            $output .= '<td>' . $row['standard'] . '</td>';
            $output .= '<td>' . $row['Board'] . '</td>';
            $output .= '<td>' . $row['gender'] . '</td>';
            $output .= '<td>' . $row['submission_time'] . '</td>';
            $output .= '<td>';
            $output .= '<button type="button" class="btn btn-dark btn-block m-1 viewbtn" data-bs-toggle="modal" data-toggle="tooltip" data-placement="top" title="View Student Details" data-bs-target="#studentModal" value="' . $row["id"] . '"><i class="bi-eye"></i></button>';
            $output .= '<a style="text-decoration:none" href="admin_update.php?id=' . $row['id'] . '" class="btn btn-success btn-block m-1"><i class="bi bi-pencil-fill" title="Update Student Record"></i></a>';
            $output .= '<a style="text-decoration:none" href="admin_reg_delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-block m-1"><i class="bi bi-trash-fill" title="Delete Student Record"></i></a>';
            $output .= '</td>'; 
            $output .= '</tr>';
        }
        
        echo $output;   
    } else {
        echo '<tr><td colspan="8">No results found.</td></tr>';
    }

    $conn->close();
}
?>
