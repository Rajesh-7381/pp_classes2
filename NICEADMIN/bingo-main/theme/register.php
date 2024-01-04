<?php
$pageTitle = "Student Register";
session_start();
include('./connection.php');

$api_url2 = "http://localhost/pp_classes/NiceAdmin/API/admin_api.php";

$curl = curl_init($api_url2);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

if (!$response) {
  // die('Error: API request failed.');
}

$data = json_decode($response, true);

if (empty($data)) {
  // die('Error: Empty API response.');
}

$adminData = $data[0];

$AllPage_Api="http://localhost/pp_classes/NiceAdmin/API/all-page-api.php";
$AllPage_Api_Data=file_get_contents($AllPage_Api);
$result_data=json_decode($AllPage_Api_Data,true);
$collecteddata=$result_data[0];
include("../components/header.php");
$header_footer_api_url="http://localhost/pp_classes/NiceAdmin/API/Header-Footer_api.php";
$header_footer_api_url_data=file_get_contents($header_footer_api_url);
$header_footer_api_url_result=json_decode($header_footer_api_url_data,true);
// print_r($header_footer_api_url_result);
$result_data=$header_footer_api_url_result[0];
?>



  <section class="single-page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2><?php echo isset($result_data['register']) ? $result_data['register'] : "Register"; ?></h2>
          <ol class="breadcrumb header-bradcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="index.php" class="text-white"><?php echo isset($result_data['home']) ? $result_data['home'] : "Home"; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo isset($result_data['register']) ? $result_data['register'] : "Register"; ?></li>
          </ol>
        </div>
      </div>
    </div>
  </section>


  <div class="container">
    <div class="form-container">
      <!-- <h2 style="text-align: center;">Student Registration Form</h2> -->
      <h2 style="text-align: center;"><?php echo isset($collecteddata['sregistration']) ? $collecteddata['sregistration'] :"Student Registration Form"; ?></h2>
      <form method="POST" onsubmit="return validateFORM()" id="registrationForm" action="#">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name"><i class="fas fa-user"></i> Student Name <span style="color:red">*</span></label>
              <input type="text" class="form-control" id="name" name="fullname" placeholder="Enter your name" onkeydown="return alphaOnly(event);" tabindex="1">
              <small id="nameError" class="text-danger"></small>
            </div>
            <div class="form-group">
              <label for="fatherName"><i class="fas fa-user"></i> Father's Name<span style="color:red">*</span></label>
              <input type="text" class="form-control" id="fatherName" name="fatherName" placeholder="Enter your father's name" onkeydown="return alphaOnly(event);" tabindex="3">
              <small id="fathernameError" class="text-danger"></small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="phone"><i class="fas fa-phone"></i> Student Phone Number <span style="color:red">*</span></label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10" tabindex="2">

              <small id="phoneError" class="text-danger"></small>
            </div>
            <div class="form-group">
              <label for="fatherPhone"><i class="fas fa-phone"></i> Father's Phone Number <span style="color:red">*</span></label>
              <input type="text" class="form-control" id="fatherPhone" name="fathernumber" placeholder="Enter father phone number" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10" tabindex="4">

              <small id="fatherphoneError" class="text-danger"></small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="gender"> Gender <span style="color:red">*</span></label>
              <select class="form-control" id="gender" name="gender" tabindex="5">
                <option value="">Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
              <small id="genderError" class="text-danger"></small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email"><i class="fas fa-envelope"></i> Email <span style="color:red">*</span></label>
              <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" tabindex="6">
              <small id="emailError" class="text-danger"></small>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="school"><i class="fas fa-school"></i> School Name <span style="color:red">*</span></label>
              <input type="text" class="form-control" id="school" name="school" placeholder="Enter your school name" onkeydown="return alphaOnly(event);" tabindex="7">
              <small id="schoolError" class="text-danger"></small>
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group">
              <label for="address"><i class="fas fa-map-marker-alt"></i> Address <span style="color:red">*</span></label>
              <textarea class="form-control" id="address" name="address" rows="1" placeholder="Enter your address" tabindex="8"></textarea>
              <small id="addressError" class="text-danger"></small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="board"><i class="fas fa-clipboard-list"></i> Board <span style="color:red">*</span></label>
              <select class="form-control" id="board" name="board" tabindex="9">
                <option value="">--Select--</option>
                <option value="CBSE">CBSE</option>
                <option value="ICSE">ICSE</option>
              </select>
              <small id="boardError" class="text-danger"></small>
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group">
              <label for="grade"><i class="fas fa-graduation-cap"></i> Grade<span style="color:red">*</span></label>
              <select class="form-control" id="grade" name="grade" tabindex="10">
                <option value="">--Select--</option>
                <option value="8th">8th</option>
                <option value="9th">9th</option>
                <option value="10th">10th</option>
                <option value="11th">11th</option>
                <option value="12th">12th</option>
              </select>
              <small id="gradeError" class="text-danger"></small>
            </div>
          </div>
        </div>


    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block swalDefaultSuccess" tabindex="11">Submit</button>
    </form>
  </div>
  </div>

  <!-- <div class="card-body">
        <button type="button" class="btn btn-success swalDefaultSuccess">
          Launch Success Toast
        </button>
    </div> -->
    <?php
$registerpage_api="http://localhost/pp_classes/NiceAdmin/API/registerpage_api.php";
$registerpage_data=file_get_contents($registerpage_api);
$registerpageData=json_decode($registerpage_data,true);
// $data=$registerpageData[0];


?>

  <section class="about-shot-info section-sm">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mt-20">
          
          <h2 class="mb-3"><?php echo isset($collecteddata['tutorial']) ? $collecteddata['tutorial'] :"Our Tutorial"; ?></h2>
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat voluptate molestias, quaerat quo natus
            dolor harum voluptatibus modi dicta ducimus.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum quae officia earum dolore est quaerat
            cupiditate voluptatibus id, magni alias veniam voluptate, libero explicabo, distinctio atque!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, fugit itaque ratione incidunt voluptas.
            Quaerat quidem dolor, quisquam amet inventore quas adipisci ea sint qui placeat beatae molestias aut, aperiam!
          </p> -->
          <p><?php echo isset($registerpageData[0]['our_tutorial']) ? $registerpageData[0]['our_tutorial'] : "Default our tutorial" ?></p>
        </div>
        <div class="col-lg-6 mt-4 mt-lg-0">
          <!-- <img loading="lazy" class="img-fluid" src="images/company/company-image.jpg" alt=""> -->
          <img loading="lazy" class="img-fluid" src="/pp_classes/NiceAdmin/Register/<?php echo $registerpageData[0]['our_tutorial_image']; ?>" alt="">
         
          
          
        </div>
      </div>
    </div>
  </section>


  <section class="company-mission section-sm bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <!-- <h3>Our Mission</h3> -->
          <h3><?php echo isset($collecteddata['mission']) ? $collecteddata['mission'] :"Our Mission"; ?></h3>
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere in suscipit voluptatum totam dolores
            assumenda vel, quia earum voluptatem blanditiis vero accusantium saepe aliquid nulla nemo accusamus, culpa
            inventore! Culpa nemo aspernatur tenetur, at quam aliquid reprehenderit obcaecati dicta illum mollitia,
            perferendis hic, beatae voluptates? Ex labore, obcaecati harum nam.</p> -->
            <p><?php echo isset($registerpageData[0]['our_mission']) ? $registerpageData[0]['our_mission'] : "Default our mission" ?></p>
        </div>
        <div class="col-md-6 mt-5 mt-md-0">
          <!-- <h3>Our Vision</h3> -->
          <h3><?php echo isset($collecteddata['vission']) ? $collecteddata['vission'] :"Our Vision"; ?></h3>
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere in suscipit voluptatum totam dolores
            assumenda vel, quia earum voluptatem blanditiis vero accusantium saepe aliquid nulla nemo accusamus, culpa
            inventore! Culpa nemo aspernatur tenetur, at quam aliquid reprehenderit obcaecati dicta illum mollitia,
            perferendis hic, beatae voluptates? Ex labore, obcaecati harum nam.</p> -->
            <p><?php echo isset($registerpageData[0]['our_vission']) ? $registerpageData[0]['our_vission'] : "Default our vission" ?></p>

        </div>
      </div>
    </div>
  </section>

  <?php
    include("../components/footer.php");
  ?>

<script src="./js/register.js"></script>




<?php

include("../theme/connection.php");

if (isset($_POST['submit'])) {

  $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
  $fathername = mysqli_real_escape_string($conn, $_POST['fatherName']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $fatherphone = mysqli_real_escape_string($conn, $_POST['fathernumber']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $school = mysqli_real_escape_string($conn, $_POST['school']);
  $standard = mysqli_real_escape_string($conn, $_POST['grade']);
  $board = mysqli_real_escape_string($conn, $_POST['board']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);


  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT * FROM register WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $present = mysqli_num_rows($result);

    if ($present > 0) {
      echo '<script>
        Swal.fire({
          icon: "error",
          title: "Oops...",
          html: "Hi <b>' . $fullname . '</b>, and your email <b>' . $email . '</b> already exist! <br> Please register with a different email id.",
          timer: 1500,
        });
      </script>';
      
    } else {
     
      $query = "INSERT INTO register (fullname, fatherName, email, phone, fathernumber, address, schoolname, standard, Board, gender) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "ssssssssss", $fullname, $fathername, $email, $phone, $fatherphone, $address, $school, $standard, $board, $gender);

      if (mysqli_stmt_execute($stmt)) {
        $submissionTime = date("Y-m-d H:i:s");
        echo '<script>
          Swal.fire({
            position: "top-right",  
            icon: "success",
            html: "Hi <b>' . $fullname . '</b>, your form has been submitted successfully!",
            timer: 5000,
            showConfirmButton: false
          });
        </script>';
      } else {
        echo '<script>
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Error inserting data!"
          });
        </script>';
      }
      mysqli_stmt_close($stmt);
    }
  }
}
?>