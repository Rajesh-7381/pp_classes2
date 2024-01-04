<?php
$pageTitle = "Student-Details-page";
session_start();
if(!$_SESSION['auth']){
    echo "<script>window.location.href='admin_login.php'</script>";
}
include("./header.php");
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Registered Student Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <?php
                    include("connection.php");
                    ?>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <!-- <span class="navbar-toggler-icon"></span> -->
                            </button>
                            <form class="d-flex col-sm-12" method="GET">
                                <!-- <form class="d-flex col-sm-12"> -->

                                <input type="search" id="search" class="form-control me-2" aria-label="Search" placeholder="Student name/Grade/Board" />
                                <div id="search-results"></div>

                            </form>
                        </div>
                    </nav>

                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; background:black; color:white;">Sl No.</th>
                                        <th style="text-align: center; background:black; color:white">Student's Name</th>
                                        <!-- <th style="text-align: center; background:black; color:white">Student's Phone no.</th> -->

                                        <th style="text-align: center; background:black; color:white">Email Id</th>

                                        <th style="text-align: center; background:black; color:white">Grade</th>

                                        <th style="text-align: center; background:black; color:white">Board</th>
                                        
                                        <th style="text-align: center; background:black; color:white">Time</th>
                                        <th style="text-align: center; background:black; color:white">Operations</th>
                                    </tr>
                                </thead>
                                <tbody id="tableData">
                                    <?php

                                    $api_url = 'http://localhost/pp_classes/NiceAdmin/API/register_api.php';
                                    $json_data = file_get_contents($api_url);
                                    $data = json_decode($json_data, true);


                                    $rowsPerPage = 10;
                                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; //if page not set default 1.
                                    // echo $currentPage;
                                    $startIndex = ($currentPage - 1) * $rowsPerPage;
                                    // echo $startIndex;->0
                                    $endIndex = $startIndex + $rowsPerPage - 1;
                                    // echo $endIndex;->9

                                    $currentData = array_slice($data, $startIndex, $rowsPerPage);
                                    // print_r($currentData);
                                    $totalPages = ceil(count($data) / $rowsPerPage);
                                    // echo $totalPages;    
                                    $serialNumber = $startIndex + 1;

                                    foreach ($currentData as $student) {
                                        $studentId = $student['id']; ///change
                                        echo '<tr>';

                                        echo '<td>' . $serialNumber++ . '</td>';
                                        echo '<td>' . $student['fullname'] . '</td>';
                                        // echo '<td>' . $student['phone'] . '</td>';

                                        echo '<td>' . $student['email'] . '</td>';

                                        echo '<td>' . $student['standard'] . '</td>';

                                        echo '<td>' . $student['Board'] . '</td>';
                                        
                                        echo '<td>' . $student['submission_time'] . '</td>';
                                        echo '<td>';

                                        echo '<button type="button" class="btn btn-dark btn-block btn-sm m-1 viewbtn"data-bs-toggle="modal"  data-toggle="tooltip" data-placement="top" title="View Student Details" data-bs-target="#studentModal" value="' . $student["id"] . '"><i class="bi-eye" ></i></button>';

                                        echo '<a style="text-decoration:none" href="admin_update.php?id=' . $student['id'] . '" class="btn btn-success btn-block btn-sm m-1"><i class="bi bi-pencil-fill" title="Update Student Record"></i></a>';
                                        echo '<a style="text-decoration:none" href="admin_reg_delete.php?id=' . $student['id'] . '" class="btn btn-danger btn-block btn-sm m-1"><i class="bi bi-trash-fill" title="Delete Student Record"></i></a>';

                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                    <!-- onclick="studentData(' . $student['id'] . ')" -->
                                </tbody>
                            </table>
                            <button id="printbtn" class="btn btn-primary"> print</button>
                        </div>
                        <!-- data-bs-toggle="modal" data-bs-target="#studentModal" -->
                        <!-- href="view_student.php?id=' . $student['id'] . '" -->

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mt-3">
                                <?php if ($currentPage > 1) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>" tabindex="-1">Previous</a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                    <li class="page-item <?php if ($i === $currentPage) echo 'active'; ?>">
                                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($currentPage < $totalPages) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">Next</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            
                        </nav>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    
    <script>
        const printbutton=document.getElementById("printbtn")
        printbutton.addEventListener("click",()=>{
            printbutton.disabled=true;
            window.print();
            setTimeout(()=>{
                printbutton.disabled=false;
            },1000);
        })
    </script>


</main><!-- End #main -->
<!-- view Modal -->
<div class="modal fade" id="studentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header row" style="display: flex; align-items: center; text-align: center;">
                <span class="modal-title text-primary col-md-8 col-12"> Student Details</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>

            <div class="row">
                <div class="col-12">
                    
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div>
                                <table class="table table-bordered">
                                    <tbody>
                                        
                                        <tr>
                                            <th>Student Name</th>
                                            <td id="fullname"></td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td id="phone"></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td id="email"></td>
                                        </tr>

                                        <tr>
                                            <th>Father's Name</th>
                                            <td id="fatherName"></td>
                                        </tr>
                                        <tr>
                                            <th>Father's Phone No.</th>
                                            <td id="fatherphone"></td>
                                        </tr>
                                        <tr>
                                            <th>School Name</th>
                                            <td id="schoolName"></td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td id="address"></td>
                                        </tr>

                                        <tr>
                                            <th>Board</th>
                                            <td id="Board"></td>
                                        </tr>
                                        <tr>
                                            <th>Grade</th>
                                            <td id="grade"></td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td id="gender"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-12">
                                    <a id="editURL">Edit</a>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ======= Footer ======= -->
<!-- update modal -->
<?php
include("./footer.php");
?>

<script src="./assets/js/home.js"></script>
</body>

</html>


<div>
    <h1>register data shown for single student details.</h1>
    
</div>