<?php
$pageTitle = "Profile-page";
session_start();
if(!$_SESSION['auth']){
  echo "<script>window.location.href='admin_login.php'</script>";
}

include('./connection.php');

$api_url = "http://localhost/pp_classes/NiceAdmin/API/admin_api.php";

$curl = curl_init($api_url);
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

$result = $data[0];
include("./header.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/pp_classes/NiceAdmin/profile/<?php echo $result['profileimage']; ?>" alt="Profile" class="rounded-circle">
              <h2><?php echo !empty($result['fullname']) ? $result['fullname'] : "p prasanjeet"; ?></h2>
              <h3><?php echo !empty($result['job']) ? $result['job'] : "TEACHER"; ?></h3>

            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
              

              </ul>
              <form >
                <div class="tab-content pt-2">
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">About</h5>
                    <div class="col-lg-9 col-md-8"><?php echo !empty($result['about']) ? $result['about'] : "PP Classes provides a mature environment where sound work ethics, self-discipline and acquisition of independent learning skills are fostered. Staff is deeply committed to the academic progress and welfare of students and all students are encouraged to interact closely with their teachers and seek help at any time. There is a positive learning environment where students will constantly get a chance achieve their best and have a strong sense of identification. The institute aims to develop students who have a passion for life a desire to reach their full potential and to have a life long love of learning. To play your role effectively we at PP classes strive habits, attitude & values. My good wishes for a successful future to all."; ?> </div>

                    <h5 class="card-title">Profile Details</h5>

                    
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Profile Image</div>
                      <div class="col-lg-9 col-md-8"><img src="" alt=""></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo !empty($result['fullname']) ? $result['fullname'] : "p prasanjeet"; ?> </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Company</div>
                      <div class="col-lg-9 col-md-8"><?php echo !empty($result['company']) ? $result['company'] : "PP Classes"; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Job</div>
                      <div class="col-lg-9 col-md-8"><?php echo !empty($result['job']) ? $result['job'] : "TEACHER"; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Country</div>
                      <div class="col-lg-9 col-md-8">INDIA</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Address</div>
                      <div class="col-lg-9 col-md-8"> <?php echo !empty($result['address']) ? $result['address'] : "6B 666 Village Near Patia Railway Crossing , BBSR"; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8"><?php echo !empty($result['phone']) ? $result['phone'] : "9338234305"; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8"><?php echo !empty($result['email_id']) ? $result['email_id'] : "ppclassesbbsr@gmail.com"; ?></div>
                    </div>


                  </div>
              </form>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->

                <form action="./update_profile.php" method="POST" onsubmit="return ProfileVALIDATE()" enctype="multipart/form-data" id="profileForm" >


                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="file" name="profileimage" id="profileimage">
                      <small id="imageerror" class="text-danger"></small>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo !empty($result['fullname']) ? $result['fullname'] : "p prasanjeet"; ?>" placeholder="Enter Your Name">
                      <small id="nameError" class="text-danger"></small>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="about" class="form-control" id="about" style="height: 100px" placeholder="Message..."><?php echo !empty($result['about']) ? $result['about'] : "PP Classes provides a mature environment where sound work ethics, self-discipline and acquisition of independent learning skills are fostered. Staff is deeply committed to the academic progress and welfare of students and all students are encouraged to interact closely with their teachers and seek help at any time. There is a positive learning environment where students will constantly get a chance achieve their best and have a strong sense of identification. The institute aims to develop students who have a passion for life a desire to reach their full potential and to have a life long love of learning. To play your role effectively we at PP classes strive habits, attitude & values. My good wishes for a successful future to all." ; ?></textarea>
                      <small id="aboutError" class="text-danger"></small>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="company" type="text" class="form-control" id="company" value="<?php echo !empty($result['company']) ? $result['company'] : "PP Classes"; ?>" placeholder="PP Classes Tutorial">
                      <small id="companyError" class="text-danger"></small>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="job" type="text" class="form-control" id="Job" value="<?php echo !empty($result['job']) ? $result['job'] : "TEACHER"; ?>" placeholder="Teacher">
                      <small id="jobError" class="text-danger"></small>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="country" type="text" class="form-control" id="Country" value="INDIA" placeholder="INDIA">
                      <small id="jobError" class="text-danger"></small>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Address" value="<?php echo !empty($result['address']) ? $result['address'] : "6B 666 Village Near Patia Railway Crossing , BBSR"; ?>" placeholder=" BBSR, Nayapali 751013">
                      <small id="addressError" class="text-danger"></small>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo !empty($result['phone']) ? $result['phone'] : "9338234305"; ?>" placeholder="+919338234305">
                      <small id="phoneError" class="text-danger"></small>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email_id" class="col-md-4 col-lg-3 col-form-label">Email Id</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email_id" type="text" class="form-control" id="email_id" value="<?php echo !empty($result['email_id']) ? $result['email_id'] :"ppclassesbbsr@gmail.com"; ?>" placeholder="exampl@gmail.com">
                      <small id="emailError" class="text-danger"></small>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                  </div>

                </form>

              </div>

              <!-- End Profile Edit Form -->
            </div>

          </div>
        </div><!-- End Bordered Tabs -->
      </div>
      
    </section>
  </main><!-- End #main -->

 <?php include("./footer.php"); ?>
 <!-- <script src="./assets/js/users_profile.js"></script> -->

 <script>
  function ProfileVALIDATE() {
  var image_input = document.getElementById("profileimage");
  var image_error = document.getElementById("imageerror");
  var imageValue = image_input.value.trim();

  if (imageValue === "") {
    image_input.classList.remove("is-valid");
    image_input.classList.add("is-invalid");
    image_error.innerText = "Please choose an image.";
    return false;
  } else if (!isValidImageFormat(imageValue)) {
    image_input.classList.remove("is-valid");
    image_input.classList.add("is-invalid");
    image_error.innerText = "Please choose a valid image (jpg, jpeg, or png).";
    return false;
  } else {
    image_input.classList.remove("is-invalid");
    image_input.classList.add("is-valid");
    image_error.innerText = "";
  }

  var name_Input = document.getElementById("fullName");
  var nameError = document.getElementById("nameError");
  var nameValue = name_Input.value.trim();

  if (nameValue === "") {
      name_Input.classList.remove("is-valid");
      name_Input.classList.add("is-invalid");
      nameError.innerText = "Please enter your name.";
      return false;
  } else {
      name_Input.classList.remove("is-invalid");
      name_Input.classList.add("is-valid");
      nameError.innerText = "";
  }

  var about_Input = document.getElementById("about");
  var aboutError = document.getElementById("aboutError");
  var aboutValue = about_Input.value.trim();

  if (aboutValue === "") {
      about_Input.classList.remove("is-valid");
      about_Input.classList.add("is-invalid");
      aboutError.innerText = "Please write something....";
      return false;
  } else {
      about_Input.classList.remove("is-invalid");
      about_Input.classList.add("is-valid");
      aboutError.innerText = "";
  }

  var company_Input = document.getElementById("company");
  var companyError = document.getElementById("companyError");
  var companyValue = company_Input.value.trim();

  if (companyValue === "") {
      company_Input.classList.remove("is-valid");
      company_Input.classList.add("is-invalid");
      companyError.innerText = "Please enter your company name.";
      return false;
  } else {
      company_Input.classList.remove("is-invalid");
      company_Input.classList.add("is-valid");
      companyError.innerText = "";
  }

  var job_Input = document.getElementById("Job");
  var jobError = document.getElementById("jobError");
  var jobValue = job_Input.value.trim();

  if (jobValue === "") {
      job_Input.classList.remove("is-valid");
      job_Input.classList.add("is-invalid");
      jobError.innerText = "Please enter your job.";
      return false;
  } else {
      job_Input.classList.remove("is-invalid");
      job_Input.classList.add("is-valid");
      jobError.innerText = "";
  }

  var address_Input = document.getElementById("Address");
  var addressError = document.getElementById("addressError");
  var addressValue = address_Input.value.trim();

  if (addressValue === "") {
      address_Input.classList.remove("is-valid");
      address_Input.classList.add("is-invalid");
      addressError.innerText = "Please enter your address.";
      return false;
  } else {
      address_Input.classList.remove("is-invalid");
      address_Input.classList.add("is-valid");
      addressError.innerText = "";
  }

  var phone_Input = document.getElementById("Phone");
  var phoneError = document.getElementById("phoneError");
  var phoneValue = phone_Input.value.trim();

  if (phoneValue === "") {
      phone_Input.classList.remove("is-valid");
      phone_Input.classList.add("is-invalid");
      phoneError.innerText = "Please enter your phone number.";
      return false;
  } else if (phoneValue.length !== 10) {
      phone_Input.classList.remove("is-valid");
      phone_Input.classList.add("is-invalid");
      phoneError.innerText = "Please enter a 10-digit phone number.";
      return false;
  } else {
      phone_Input.classList.remove("is-invalid");
      phone_Input.classList.add("is-valid");
      phoneError.innerText = "";
  }

  var email_id_Input = document.getElementById("email_id");
  var emailError = document.getElementById("emailError");
  var emailValue = email_id_Input.value.trim();

  if (emailValue === "") {
      email_id_Input.classList.remove("is-valid");
      email_id_Input.classList.add("is-invalid");
      emailError.innerText = "Please enter your email address.";
      return false;
  } else if (!validateEmail(emailValue)) {
      email_id_Input.classList.remove("is-valid");
      email_id_Input.classList.add("is-invalid");
      emailError.innerText = "Please enter a valid email address.";
      return false;
  } else {
      email_id_Input.classList.remove("is-invalid");
      email_id_Input.classList.add("is-valid");
      emailError.innerText = "";
  }

  return true;
}

function addValidationListeners() {
  var name_Input = document.getElementById("fullName");
  name_Input.addEventListener("input", ProfileVALIDATE);

  var about_Input = document.getElementById("about");
  about_Input.addEventListener("input", ProfileVALIDATE);

  var company_Input = document.getElementById("company");
  company_Input.addEventListener("input", ProfileVALIDATE);

  var job_Input = document.getElementById("Job");
  job_Input.addEventListener("input", ProfileVALIDATE);

  var address_Input = document.getElementById("Address");
  address_Input.addEventListener("input", ProfileVALIDATE);

  var phone_Input = document.getElementById("Phone");
  phone_Input.addEventListener("input", ProfileVALIDATE);

  var email_id_Input = document.getElementById("email_id");
  email_id_Input.addEventListener("input", ProfileVALIDATE);
}

window.addEventListener("load", addValidationListeners);

function validateEmail(email) {
  var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return pattern.test(email);
}

function alphaOnly(event) {
  var key = event.keyCode;
  return (key >= 65 && key <= 90) || key === 8 || key == 32 || key == 9;
}
function isValidImageFormat(fileName) {
  // Define an array of valid image file extensions
  var validFormats = ["jpg", "jpeg", "png"];

  // Get the file extension from the file name
  var fileExtension = fileName.split(".").pop().toLowerCase();

  // Check if the file extension is in the valid formats array
  return validFormats.includes(fileExtension);
}
 </script>