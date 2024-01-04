<?php
$pageTitle = "Regular-Course-page";
session_start();
if (!$_SESSION['auth']) {
  echo "<script>window.location.href='admin_login.php'</script>";
}
include("./connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $board = $_POST["board"];
  $grade = $_POST["grade"];
  $program = $_POST["program"];
  $duration = $_POST["duration"];
  $course_type = "regular";

  if (empty($board) || empty($grade) || empty($program) || empty($duration)) {
    $updateStatus = "Please fill in all the fields.";
  } else {

    // Check if course_type is 'regular' before inserting
    if ($course_type === 'regular') {
      $query = "INSERT INTO courses (board, grade, program, duration, course_type)
                      VALUES ('$board', '$grade', '$program', '$duration', '$course_type')";

      if (mysqli_query($conn, $query)) {

        header("Location: " . $_SERVER["PHP_SELF"]); // Redirect to the same page after insertion
        exit();
      } else {
        $updateStatus = "Error inserting data: " . mysqli_error($conn);
      }
    } else {
      $updateStatus = "Course type is not 'regular'. Data not inserted.";
    }
  }
}

include("./header.php");

?>
<link rel="stylesheet" href="./assets/css/toggle.css">
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Regular Course</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./admin_register.php">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Regular Course</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <?php


      $query112 = "SELECT * FROM courses where course_type='regular'";
      $data1112 = mysqli_query($conn, $query112);
      $total1234 = mysqli_num_rows($data1112);

      ?>
      <div class="col-lg-12">
        <div class="row">
          <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">

              </div>
            </nav>
          </header>

          <div class="container">
            <button id="addButton" type="button" class="btn btn-block btn-primary" data-toggle="tooltip" data-placement="top" title="Add New Course"><i class="bi bi-plus"></i>Add</button>
            <div class="table-responsive col-md-12" id="tableData" style="margin-left: 2px;margin-top: 20px;">
              <?php
              $regular_course_api_url = "http://localhost/pp_classes/NiceAdmin/API/ex_course_api.php";
              $regular_course_api_url_data = file_get_contents($regular_course_api_url);
              $data = json_decode($regular_course_api_url_data, true);
              $serialNumber = 1;

              if (!empty($data)) {
                echo "<table class='table table-bordered' style='width:100%;' >
                <thead>
                    <tr>
                        <th style='text-align: center; background:black; color:white'>Sl No.</th>
                        <th style='text-align: center; background:black; color:white'>Board</th>
                        <th style='text-align: center; background:black; color:white'>Grade</th>
                        <th style='text-align: center; background:black; color:white'>Program</th>
                        <th style='text-align: center; background:black; color:white'>Duration</th>
                        <th style='text-align: center; background:black; color:white'>Actions</th>
                    </tr>
                </thead>
                <tbody>";

                foreach ($data as $result) {
                  echo '<tr>
                    <td>' . $serialNumber++ . '</td>
                    <td>' . $result["board"] . '</td>
                    <td>' . $result["grade"] . '</td>
                    <td>' . $result["program"] . '</td>
                    <td>' . $result["duration"] . '</td>
                    <td style="text-align: center;">
                        <a style="text-decoration:none;" class="btn btn-success btn-block btn-sm"  href="explore_course_update.php?id=' . $result["course_id"] . '"><i class="bi bi-pencil" ></i></a> 
                        <a style="text-decoration:none; " href="delete.php?id=' . $result["course_id"] . '">
                            <button type="submit" class="btn btn-danger btn-block btn-sm"  data-toggle="tooltip" data-placement="top" title="Delete Program"><i class="bi bi-trash" ></i></button>
                        </a>';


                  if ($result["status"] == 1) {
                    echo '<a class="btn btn-info btn-block btn-sm" href="toggle1.php?id=' . $result["course_id"] . '">Active</a>';
                  } else {
                    echo '<a class="btn btn-danger btn-block btn-sm" href="toggle2.php?id=' . $result["course_id"] . '">Inactive</a>';
                  }

                  echo '</td></tr>';
                }

                echo '</tbody></table>';
              } else {
                echo 'No data available.';
              }
              ?>
            </div>
          </div>



        </div>
        <!-- <button  type="submit" class="btn btn-success btn-block"><i class="bi bi-pencil" title="Update Program"></i></button> -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">New Regular Course Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="addForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" onclick="return regularcourse()">
                  <div class="mb-3">
                    <label for="board"> Board </label>
                    <select class="form-control" id="board" name="board" tabindex="9">
                      <option value="">--Select--</option>
                      <option value="CBSE">CBSE</option>
                      <option value="ICSE">ICSE</option>
                    </select>

                    <label for="grade">Grade</label>
                    <select class="form-control" id="grade" name="grade" tabindex="10">
                      <option value="">--Select--</option>
                      <option value="8th">8th</option>
                      <option value="9th">9th</option>
                      <option value="10th">10th</option>
                      <option value="11th">11th</option>
                      <option value="12th">12th</option>
                    </select>

                    <label for="program" class="form-label">Program</label>
                    <textarea class="form-control" id="program" name="program" rows="3"></textarea>

                    <label for="duration" class="form-label">duration</label>
                    <input class="form-control" id="duration" name="duration">

                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="addForm">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</main><!-- End #main -->

<?php
include("./footer.php");
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./assets/js/modal.js"></script>

<script src="./assets/js/toggle-min.js"></script>
<script>
$(document).ready(function(){
  var gradeselect = $('#grade');
  var gradeoptions = gradeselect.html();

  $('#board').change(function(e){
    e.preventDefault();
    var selectedBoard = $(this).val();
    gradeselect.html('');

    if (selectedBoard === '') {
      gradeselect.prop('disabled', true);
    } else {
      gradeselect.prop('disabled', false);
      
      if (selectedBoard === 'CBSE') {
        gradeselect.append(gradeoptions);
      } else if (selectedBoard === 'ICSE') {
        // Add specific options for ICSE
        gradeselect.append('<option value="8th">8th</option>');
        gradeselect.append('<option value="9th">9th</option>');
        gradeselect.append('<option value="10th">10th</option>');
      }
    }
  });
});

</script>
