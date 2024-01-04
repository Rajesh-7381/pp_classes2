<?php
session_start();
if(!$_SESSION['auth']){
  echo "<script>window.location.href='admin_login.php'</script>";
}

include("./connection.php");
$id = $_GET['id'];
$sql = "select * from register where id='$id'";
$data = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($data);
include("./header.php");

?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Form</h1>
      <nav>
        
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Update</li>
          </ol>
        </nav>

    </div><!-- End Page Title -->
    <div class="container">
      <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6 text-right">
          <a href="./admin_register.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
        </div>
      </div>
    </div>


    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">

            <header>

              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                </div>
              </nav>
            </header>


            <div class="container">
              <div class="form-container">

                <!-- <h2 class="center-align">Update Form</h2> -->
                <form method="POST" onsubmit="return validateUPDATEFORM()">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> Student Name <span style="color: red;"> *</span></label>
                        <input type="text" class="form-control" id="name" name="fullname" placeholder="Enter student name" onkeydown="return alphaOnly(event);" tabindex="1">
                        <small id="nameError" class="text-danger"></small>
                      </div>
                      <div class="form-group">
                        <label for="fatherName"><i class="fas fa-user"></i> Father's Name<span style="color: red;"> *</span></label>
                        <input type="text" class="form-control" id="fatherName" name="fatherName" placeholder="Enter father's name" onkeydown="return alphaOnly(event);" tabindex="3">
                        <small id="fathernameError" class="text-danger"></small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone"><i class="fas fa-phone"></i> Student Phone Number<span style="color: red;"> *</span> </label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter  phone number" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10" tabindex="2">
                        <small id="phoneError" class="text-danger"></small>
                      </div>
                      <div class="form-group">
                        <label for="fatherPhone"><i class="fas fa-phone"></i> Father's Phone Number<span style="color: red;"> *</span> </label>
                        <input type="text" class="form-control" id="fatherphone" name="fphone" placeholder="Enter father phone number" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10" tabindex="4">
                        <small id="fatherphoneError" class="text-danger"></small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email<span style="color: red;"> *</span> </label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" tabindex="5">
                        <small id="emailError" class="text-danger"></small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="school"><i class="fas fa-school"></i> School Name<span style="color: red;"> *</span> </label>
                        <input type="text" class="form-control" id="school" name="school" placeholder="Enter your school name" onkeydown="return alphaOnly(event);" tabindex="6">
                        <small id="schoolError" class="text-danger"></small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="address"><i class="fas fa-map-marker-alt"></i> Address<span style="color: red;"> *</span> </label>
                        <textarea class="form-control" id="address" name="address" rows="1" placeholder="Enter your address" tabindex="7"></textarea>
                        <small id="addressError" class="text-danger"></small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="board"><i class="fas fa-clipboard-list"></i> Board<span style="color: red;"> *</span> </label>
                        <select class="form-control" id="board" name="board" tabindex="8">
                          <option value="ICSE">ICSE</option>
                          <option value="CBSE">CBSE</option>
                        </select>
                        <small id="boardError" class="text-danger"></small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="grade"><i class="fas fa-graduation-cap"></i> Grade<span style="color: red;"> *</span></label>
                        <select class="form-control" id="grade" name="grade" tabindex="9">
                          <option value="8th">8th</option>
                          <option value="9th">9th</option>
                          <option value="10th">10th</option>
                          <option value="11th">11th</option>
                          <option value="12th">12th</option>
                        </select>
                        <small id="gradeError" class="text-danger"></small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="gender"> Gender<span style="color: red;"> *</span></label>
                        <select class="form-control" id="gender" name="gender" tabindex="10">
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="other">Other</option>
                        </select>
                        <small id="genderError" class="text-danger"></small>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <button type="submit" name="update" class="btn btn-primary " onclick="showUpdateConfirmation()">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
include("./footer.php");
  ?>

</body>

</html>
<script src="./assets/js/home.js"></script>
<script>
  function fetchStudentData(id) {
    fetch(`http://localhost/pp_classes/NiceAdmin/NiceAdmin/get_student_data.php?id=${id}`)
      .then(response => response.json())
      .then(data => {
        if (data.hasOwnProperty('error')) {
          alert('Error: ID not provided');
          return;
        }


        document.getElementById('name').value = data.fullname;
        document.getElementById('phone').value = data.phone;
        document.getElementById('fatherName').value = data.fatherName;
        document.getElementById('fatherphone').value = data.fathernumber;
        document.getElementById('email').value = data.email;
        document.getElementById('school').value = data.schoolname;
        document.getElementById('address').value = data.address;
        document.getElementById('board').value = data.Board;
        document.getElementById('grade').value = data.standard;
        document.getElementById('gender').value = data.gender;
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }

  window.addEventListener('load', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    if (id) {
      fetchStudentData(id);
    }
  });


</script>
<script src="./assets/js/jquery.js"></script>
<script>
$(document).ready(function() {
    // Cache the board and grade select elements
    var $boardSelect = $('#board');
    var $gradeSelect = $('#grade');

    // Function to show/hide grade options based on the selected board
    function updateGradeOptions() {
        var selectedBoard = $boardSelect.val();
        $gradeSelect.find('option').hide();

        if (selectedBoard === 'CBSE') {
            // Show all grade options for CBSE
            $gradeSelect.find('option').show();
        } else if (selectedBoard === 'ICSE') {
            // Show only specific grade options for ICSE
            $gradeSelect.find('option[value="8th"]').show();
            $gradeSelect.find('option[value="9th"]').show();
            $gradeSelect.find('option[value="10th"]').show();
            $gradeSelect.val("8th");
        }
    }

    updateGradeOptions();

    // Add change event listener to the board select element
    $boardSelect.on('change', function() {
        updateGradeOptions();
    });
});
</script>



<?php
if (isset($_POST['update'])) {
  $fullname = $_POST['fullname'];
  $phone = $_POST['phone'];

  $fatherName = $_POST['fatherName'];
  $fphone = $_POST['fphone'];

  $email = $_POST['email'];
  $school = $_POST['school'];

  $address = $_POST['address'];
  $board = $_POST['board'];

  $grade = $_POST['grade'];
  $gender = $_POST['gender'];
  $UpdateQuery = "update register set fullname='$fullname',phone='$phone',fatherName='$fatherName',fatherNumber='$fphone',
  email='$email',schoolname='$school',Board='$board',standard='$grade',address='$address',gender='$gender' where id='$id'";
  $data = mysqli_query($conn, $UpdateQuery);
  if ($data) {
    ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Student Record Updated Successfully',
            showConfirmButton: false,
            timer: 2000

        }).then(function() {
            window.location.href = "admin_register.php";
        });
        
    </script>
<?php

  } else {
    echo "<script>alert('Data not updated')</script>";
  }
}
?>

