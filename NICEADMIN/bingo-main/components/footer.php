<?php
$header_footer_api_url = "http://localhost/pp_classes/NiceAdmin/API/Header-Footer_api.php";
$header_footer_api_url_data = file_get_contents($header_footer_api_url);
$data = json_decode($header_footer_api_url_data, true);
$result = $data[0];
?>

<footer id="footer" class="bg-one">
  <div class="top-footer">
    <div class="container">

      <div class="row justify-content-around">
        <!-- <h2 class="elementor-heading-title elementor-size-xl"><font color="red"> PP Class®</font><b><font color="#00b33b">  is among the Top Institute in BBSR </font></b><font color="red">and </font><b><font color="#00b33b">Ranks on Google </font></b>for:</h2> -->

        <div class="col-lg-2 col-md-6 mb-5 mb-lg-0">

          <ul>

            <h3><?php echo isset($result['Company_Header']) ? $result['Company_Header'] : 'Company'; ?></h3>
            <li><a href="abouts.php">About Us</a><?php echo isset($result['aboutus_Head']) ? $result['aboutus_Head'] : 'About Us'; ?></li>
            <li><a href="./almunispaeks.php">Almuni Speaks</a><?php echo isset($result['Alumni_Speaks']) ? $result['Alumni_Speaks'] : 'Almuni Speaks'; ?></li>
            <li><a href="contact.php">Contact Us</a><?php echo isset($result['contactus']) ? $result['hocontactusme'] : 'Contact Us'; ?></li>


        </div>
        <!-- End of .col-sm-3 -->

        <div class="col-lg-2 col-md-6 mb-5 mb-lg-0">
          <ul>
            <li>

              <h3><?php echo isset($result['Service_Header']) ? $result['Service_Header'] : 'Our Services'; ?></h3>
            </li>
            <li><a href="./ex_shortterm_course.php">Short Term Course</a><?php echo isset($result['shortterm']) ? $result['shortterm'] : 'Short Term Course'; ?></li>
            <li><a href="./ex_crash_course.php">Crash Course</a><?php echo isset($result['crash']) ? $result['crash'] : 'Crash Course'; ?></li>

          </ul>
        </div>
        <!-- End of .col-sm-3 -->
        <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
          <ul>
            <li>

              <h3><?php echo isset($result['Reach_Us_At']) ? $result['Reach_Us_At'] : 'Reach Us At'; ?></h3>
            </li>
            <ul class="list-unstyled mb-7">
              <li style="color: aliceblue">
                <i class="fas fa-map-marker-alt" title="location"></i>&nbsp;<?= isset($result_data['Address']) ? $result_data['Address'] : 'Address'; ?>
              </li>
              <li class="text-secondary"><?= isset($adminData['address']) ? $adminData['address'] : "6B 666 Village Near Patia Railway Crossing , BBSR"; ?></li>

              <li style="color: aliceblue">
                <i class='fas fa-phone' title="phone"></i>&nbsp;<?= isset($result_data['Phone']) ? $result_data['Phone'] : '9338234305'; ?>
              </li>
              <li class="text-muted"><?= isset($adminData['phone']) ? $adminData['phone'] : "Phone"; ?></li>

              <li style="color: aliceblue">
                <i class="fa fa-envelope" title="email"></i>&nbsp;<?= isset($result_data['Email']) ? $result_data['Email'] : 'Email'; ?>
              </li>
              <li class="text-muted"><?= isset($adminData['email_id']) ? $adminData['email_id'] : "ppclassesbbsr@gmail.com"; ?></li>
            </ul>

          </ul>
        </div>

      </div>
    </div> <!-- end container -->
  </div>
  <div class="footer-bottom">

    <h5><?php echo isset($result['copyright']) ? $result['copyright'] : '© Copyright 2023 . All Rights Reserved'; ?></h5>

  </div>
</footer> <!-- end footer -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap4 -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- Parallax -->
<script src="plugins/parallax/jquery.parallax-1.1.3.js"></script>
<!-- lightbox -->
<script src="plugins/lightbox2/js/lightbox.min.js"></script>
<!-- Owl Carousel -->
<script src="plugins/slick/slick.min.js"></script>
<!-- filter -->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Smooth Scroll js -->
<script src="plugins/smooth-scroll/smooth-scroll.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Custom js -->
<script src="js/script.js"></script>
<script src="../theme/js/sweetalert.js"></script>
<script src="../theme/js/jquery.js"></script>

</body>

</html>