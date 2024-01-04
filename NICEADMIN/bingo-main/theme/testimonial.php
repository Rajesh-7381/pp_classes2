<?php
$pageTitle = "Testimonials";
session_start();
include('./connection.php');

$api_url2 = "http://localhost/pp_classes/NiceAdmin/API/admin_api.php";

$curl = curl_init($api_url2);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

if (!$response) {
  die('Error: API request failed.');
}

$data = json_decode($response, true);

if (empty($data)) {
  die('Error: Empty API response.');
}

$adminData = $data[0];
include("../components/header.php");
?>

  <section class="single-page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Testimonial</h2>
          <ol class="breadcrumb header-bradcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Testimonial</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!--
Start About Section
==================================== -->
  <section class="about-2 section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="title text-center">
            <h2>Message For Testimonial</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
              aut, eum itaque illo totam tempora eius.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
              aut, eum itaque illo totam tempora eius.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
              aut, eum itaque illo totam tempora eius.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
              aut, eum itaque illo totam tempora eius.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
              aut, eum itaque illo totam tempora eius.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
              aut, eum itaque illo totam tempora eius.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
              aut, eum itaque illo totam tempora eius.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
              aut, eum itaque illo totam tempora eius.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
              aut, eum itaque illo totam tempora eius.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
              aut, eum itaque illo totam tempora eius.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
              aut, eum itaque illo totam tempora eius.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
              aut, eum itaque illo totam tempora eius.</p>
            <div class="border"></div>
          </div>
        </div>
        <div class="col-md-6">
          <ul class="checklist">

            <div class="container">

              <h3><strong>Testimonials</strong></h3>
              <form method="POST" id="registrationForm" class="custom-form">
                <div class="form-group">
                  <label for="name"><i class="fas fa-user"></i> <b>Name:</b></label>
                  <input type="text" class="form-control" id="fullname" name="name" placeholder="Enter your name" onkeydown="return alphaOnly(event);">
                  <small id="nameError" class="text-danger"></small>
                </div>

                <div class="form-group">
                  <label for="phone"><i class="fas fa-phone"></i> <b>Phone:</b></label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter  phone number" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10">

                  <small id="phoneError" class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="email"><i class="fas fa-envelope"></i> <b>Email:</b></label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com">
                  <small id="emailError" class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="passing-year"><i class="fas fa-calendar"></i> <b>Passing Year:</b></label>
                  <select class="form-control" name="passing_year" id="passing-year">
                    <option value="not selected">--select--</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>

                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>

                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>

                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>

                  </select>
                  <small id="passError" class="text-danger"></small>
                </div>

                <div class="form-group">
                  <label for="present_status"><i class="fas fa-info-circle"></i> <b>Present Status:</b></label>
                  <input type="text" class="form-control" id="present_status" name="present_status" placeholder="Enter your present status">
                  <small id="presentstatusError" class="text-danger"></small>
                </div>

                <div class="form-group">
                  <label for="working-place"> <i class="fas fa-building"></i> <b>Working Place:</b></label>
                  <input type="text" class="form-control" id="working-place" name="working_place" placeholder="Enter your working place">
                  <small id="workingPlaceError" class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="memorableEvent"><i class="fas fa-comment"></i> <b>Memorable Event:</b></label>
                  <textarea type="text" class="form-control" rows="1" id="memorableEvent" name="memorableEvent" placeholder="Enter your memorable event"></textarea>
                  <small id="MemorableEventError" class="text-danger"></small>
                </div>
                <div>
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block"></input>
              </form>
              <br>
            </div>

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
          </ul>
          <!-- <a href="about.html" class="btn btn-main mt-20">Learn More</a> -->
        </div>
      </div> <!-- End row -->
    </div> <!-- End container -->
  </section> <!-- End section -->
  <!-- Start Pricing section
		=========================================== -->
  <section class="pricing-table" id="pricing">
    <div class="container">
      <div class="row justify-content-center">
        <!-- section title -->
        <div class="col-xl-6 col-lg-8">
          <div class="title title-white text-center ">
            <h2>Our Greatest Plans</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium soluta deserunt eaque, est, quia hic odit sed incidunt officiis quidem.</p>
            <div class="border"></div>
          </div>
        </div>
        <!-- /section title -->
      </div>

    </div> <!-- End container -->
  </section> <!-- End section -->


<?php
include("../components/footer.php");
include("./connection.php");

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $passing_year = $_POST['passing_year'];
  $present_status = $_POST['present_status'];
  $working_place = $_POST['working_place'];
  $memorableEvent = $_POST['memorableEvent'];

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // $conn = new mysqli("YOUR_HOST", "YOUR_USERNAME", "YOUR_PASSWORD", "YOUR_DB_NAME");


    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

// inserted data
    $insertSql = "INSERT INTO testimonial (name, phone, email, passing_YEAR, presentSTATUS, workingPLACE, memoryableEVENT) 
                          VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSql);


    $stmt->bind_param('sssssss', $name, $phone, $email, $passing_year, $present_status, $working_place, $memorableEvent);


    if ($stmt->execute()) {
      echo "<script> 
      Swal.fire({
        title: 'Here is the chance you can become a testimonial',
        showClass: {
          popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp'
        }
      })
      </script>";
    } else {
    }

    $stmt->close();
    $conn->close();
  } else {
    echo "<script>alert('Invalid email format.')</script>";
  }
}
?>