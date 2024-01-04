<?php
$header_footer_api_url="http://localhost/pp_classes/NiceAdmin/API/Header-Footer_api.php";
$header_footer_api_url_data=file_get_contents($header_footer_api_url);
$data=json_decode($header_footer_api_url_data,true);
$result=$data[0];
// print_r($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title><?php echo isset($pageTitle) ? $pageTitle : "Default Title"; ?></title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="One page parallax responsive HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Bingo HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/pp_classes_logo1.jpg" />


  <!-- CSS
  ================================================== -->
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- Lightbox.min css -->
  <link rel="stylesheet" href="plugins/lightbox2/css/lightbox.min.css">
  <!-- animation css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  

</head>

<body id="body">

  <!--
  Start Preloader
  ==================================== -->
  <div id="preloader">
    <div class='preloader'>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <header class="navigation fixed-top">
    <div class="container">
      <!-- main nav -->
      <nav class="navbar navbar-expand-lg navbar-light px-0">
        <!-- logo -->
        <a class="navbar-brand logo" href="index.php">
        <img loading="lazy" class="logo-default" src="../screenshots/Screenshot 2023-07-24 084126.png" alt="logo" />

        </a>
        <!-- /logo -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
          <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>">
				<a class="nav-link" href="./index.php"><?php echo isset($result['home']) ? $result['home'] : 'HOME'; ?></a>
			  </li>
            <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'register.php') echo 'active'; ?>">
            <a class="nav-link" href="./register.php"><?php echo isset($result['register']) ? $result['register'] : 'REGISTER'; ?></a>

            </li>
            <li class="nav-item dropdown <?php if (basename($_SERVER['PHP_SELF']) == 'ex_regular_course.php') echo 'active'; ?>">
              <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo isset($result['explore']) ? $result['explore'] : 'EXPLORE PROGRAM'; ?>  <i class="tf-ion-chevron-down"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./ex_regular_course.php"><?php echo isset($result['regular']) ? $result['regular'] : 'Regular Course'; ?></a></li>
              <li><a class="dropdown-item" href="./ex_shortterm_course.php"><?php echo isset($result['shortterm']) ? $result['shortterm'] : 'Short Term Course'; ?></a></li>
              <li><a class="dropdown-item" href="./ex_crash_course.php"><?php echo isset($result['crash']) ? $result['crash'] : 'Crash Course'; ?></a></li>

          </li>
          </ul>
          </li>
          <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'resource.php') echo 'active'; ?>">
            <a class="nav-link" href="resource.php"><?php echo isset($result['resource']) ? $result['resource'] : 'RESOURCE'; ?></a>
          </li>

          <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'gallery.php') echo 'active'; ?>">
            <a class="nav-link" href="gallery.php"><?php echo isset($result['galleryname']) ? $result['galleryname'] : 'GALLERY'; ?></a>
          </li>
          <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'testimonial.php') echo 'active'; ?>">
            <a class="nav-link" href="testimonial.php">Testimonial</a>
          </li>
          <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'active'; ?>">
            <a class="nav-link" href="contact.php"> <?php echo isset($result['contactus']) ? $result['contactus'] : 'CONTACTUS/ENQUIRY'; ?></a>
          </li>

          </ul>
        </div>
      </nav>
      <!-- /main nav -->
    </div>
  </header>

  

