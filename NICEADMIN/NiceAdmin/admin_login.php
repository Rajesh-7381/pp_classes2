<?php
// session_start();
$pageTitle = "Login-page";
include("./connection.php");

session_start();
$email = '';
$password = '';

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql45 = "SELECT * FROM admin_pass WHERE email='$email' AND password='$password'";

  $result56 = mysqli_query($conn, $sql45);
  $data23 = mysqli_num_rows($result56);

  if ($data23 > 0) {

    $_SESSION['auth'] = 'true';
    echo "<script>window.location.href='home.php'</script>";
    exit;
  }
}

if (isset($_POST['reset_password'])) {
  $forgotEmail = $_POST['forgotemail'];
  $newPassword = $_POST['forgotpassword'];

  $updateSql = "UPDATE admin_pass SET password = '$newPassword' where email = '$forgotEmail'";
  $updateResult = mysqli_query($conn, $updateSql);

  if ($updateResult) {
    echo 'Password reset successful';
  }
}


$sql = "SELECT email FROM admin_pass LIMIT 1";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $forgotEmail = $row['email'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo isset($pageTitle) ? $pageTitle : "Default Title"; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" type="image/x-icon" href="./assets/img/pp_classes_logo1.jpg" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .is-valid {
      border: 2px solid green;
    }

    .is-invalid {
      border: 2px solid red;
    }
  </style>

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="./logo.png" alt="">
        <span class="d-none d-lg-block">PP Class</span>
      </a>
      <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
    </div><!-- End Logo -->
  </header>
  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown">
    </ul>
  </nav>

  <!-- ======= Sidebar ======= -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Login</h1>

    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">



        <section class="vh-100">
          <div class="container-fluid h-custom">
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start logo-container">
              <p class="lead fw-normal mb-0 me-3"></p>
              <button type="button" class="btn  btn-floating mx-1">
                <!-- <i class="fab fa-pied-piper-pp" style="font-size: 40px;" onclick="home()"></i> -->
              </button>
            </div>
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="./assets/img/WhatsApp Image 2023-07-15 at 20.12.23.jpg" class="img-fluid" alt="Sample image">
              </div>
              <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" onsubmit="return validateADMINform9090()" class="needs-validation" novalidate>

                  <div class="mb-3">
                    <label class="form-label" for="email"><b>Email address:</b></label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Enter email address" value="<?php echo $email; ?>" autocomplete="off" required>
                    <small id="emailError" class="form-text text-danger"></small>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="password"><b>Password:</b></label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                    <small id="passwordError" class="form-text text-danger"></small>
                  </div>

                  <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    <a href="javascript:void(0);" onclick="openForgotPasswordModal();" class="text-body">Forgot password?</a>
                    <a href="./Register.php" class="text-body">Register here?</a>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </section>

        <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
          <div class="modal-dialog" style="width: 300px;">
            <div class="modal-content text-center">
              <div class="modal-header h5 text-white bg-primary justify-content-center">
                Password Reset
              </div>
              <div class="modal-body px-5">
                <p class="py-2"></p>
                <form method="POST" onsubmit="return reset_PASSWORD_Function()">
                  <div class="form-outline">
                    <label class="form-label" for="forgotemail"><b>Email Address:</b></label>
                    <input type="text" id="forgotemail" name="forgotemail" class="form-control my-2" value="<?php echo isset($forgotEmail) ? $forgotEmail : ''; ?>" />
                  </div>
                  <div class="form-outline">
                    <label class="form-label" for="forgotpassword"><b>Password:</b></label>
                    <input type="password" id="forgotpassword" name="forgotpassword" class="form-control my-3" placeholder="New Password" required />
                  </div>
                  <button type="submit" name="reset_password" class="btn btn-primary w-100">Reset password</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <div class="col-12">
              <div class="card">
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>2023 </span></strong>Your Website. All rights reserved.
    </div>

  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->
  <!-- <script src="assets/vendor/tinymce/tinymce.min.js"></script> -->
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <!-- <script src="assets/js/main.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/admin_login.js"></script>


</body>

</html>