<?php
$pageTitle = "Index";
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
  // die('Error: Empty API response.');
}

$adminData = $data[0];

$AllPage_Api = "http://localhost/pp_classes/NiceAdmin/API/all-page-api.php";
$AllPage_Api_Data = file_get_contents($AllPage_Api);
$result_data = json_decode($AllPage_Api_Data, true);
$collecteddata = $result_data[0];

$slider_api = "http://localhost/pp_classes/NiceAdmin/API/slider-api.php";
$slider_data = file_get_contents($slider_api);
$imageWithData = json_decode($slider_data, true);
// print_r($imageWithData);
include("../components/header.php");
?>

<link rel="stylesheet" href="./css/styl2.css">
<div class="hero-slider">
  <?php if (empty($imageWithData)) { ?>
    <!-- Default image when there is no data in the database -->
    <div class="slider-item th-fullpage hero-area" style="background-image: url('./images/slider/slider-bg-1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 style="color: #00B33B;font-size: 50px;font-weight: bold;text-transform: uppercase;letter-spacing: 1px;" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Default Heading 1</h1>
            <p style="color: white;font-size: 30px;font-weight: 200;text-transform: lowercase;letter-spacing: 1px;" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Default Description 1</p>
          </div>
        </div>
      </div>
    </div>
    <div class="slider-item th-fullpage hero-area" style="background-image: url('./images/slider/slider-bg-2.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 style="color: #00B33B;font-size: 50px;font-weight: bold;text-transform: uppercase;letter-spacing: 1px;" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Default Heading 2</h1>
            <p style="color: white;font-family: Roboto, Sans-serif;font-size: 30px;font-weight: 200;text-transform: lowercase;letter-spacing: 1px;" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".5">Default Description 2</p>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <!-- Display images from the database -->
    <?php foreach ($imageWithData as $item) { ?>

      <div class="slider-item th-fullpage hero-area" style="background-image: url('/pp_classes/NiceAdmin/slider-image/<?php echo $item['slider_image']; ?>');">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1 style="color: #00B33B;font-size: 50px;font-weight: bold;text-transform: uppercase;letter-spacing: 1px;" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1"><?php echo $item['slider_image_heading']; ?></h1>
             
             
             <p style="color: white;font-family: Roboto, Sans-serif;font-size: 30px;font-weight: 200;text-transform: lowercase;letter-spacing: 1px;" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5"><?php echo $item['slider_image_description']; ?></p>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php } ?>
</div>


<?php
$Home_api = "http://localhost/pp_classes/NiceAdmin/API/home_api.php";
$Home_api_data = file_get_contents($Home_api);
$TotalData = json_decode($Home_api_data, true);
// print_r($TotalData);
?>
<section class="service-2 section">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-lg-6">
        <!-- section title -->
        <div class="title text-center">

          <h1 style=" background-image: url(https://images.unsplash.com/photo-1619005434452-92e854f14fea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y29sb3JmdWxsfGVufDB8fDB8fHww&w=1000&q=80);background-clip:text ;background-size: cover;-webkit-background-clip:text;color: transparent;"><?php echo isset($TotalData[0]['our_learnershead']) ? $TotalData[0]['our_learnershead'] : "Our Learners"; ?></h1>
          <!-- <p>Success Message for  Our Learners <br>“Teachers can open the door, but you must enter it yourself. ” </p> -->
          <p><?php echo isset($TotalData[0]['our_learners']) ? $TotalData[0]['our_learners'] : "Success Message for Our Learners <br>Teachers can open the door, but you must enter it yourself."; ?></p>


          <div class="border"></div>
        </div>
        <!-- /section title -->
      </div>
    </div>
    <div class="row">
      

      <div class="col-md-4 text-center d-none d-md-block">
        <!-- <img loading="lazy" src="images/about/member.jpg" class="img-fluid inline-block" alt=""> -->
        <img loading="lazy" src="/pp_classes/NiceAdmin/re/<?php echo $TotalData[0]['image']; ?>" class="img-fluid inline-block" alt="">
     
      </div>



      <div class="col-md-8">
        <div class="row text-center">
          <div class="col-md-6 col-sm-6">
            <div class="service-item">
              <i class="tf-ion-ios-alarm-outline"></i>
              <!-- <h4>Time Management</h4> -->
              <h4><?php echo isset($TotalData[0]['time_managementhead']) ? $TotalData[0]['time_managementhead'] : "Time Management"; ?></h4>
              <!-- <p>The benefits of managing time are simple. Good time management allows you to accomplish bigger results in a shorter period which leads to more time freedom, helps you focus better.</p>	 -->
              <p><?php echo isset($TotalData[0]['time_management']) ? $TotalData[0]['time_management'] : "Default Time Management" ?></p>
            </div>
          </div><!-- END COL -->
          <div class="col-md-6 col-sm-6">
            <div class="service-item">
              <i class="tf-ion-ios-book-outline"></i>

              <h4><?php echo isset($TotalData[0]['for_learnershead']) ? $TotalData[0]['for_learnershead'] : "For Learners "; ?></h4>
              <!-- <p>Please always have faith in yourself, students. You are capable of performing any task, no matter how difficult it may be. <br> optimistic and put in a lot of effort to achieve your goals.</p> -->
              <p><?php echo isset($TotalData[0]['for_learners']) ? $TotalData[0]['for_learners'] : "Default for Learners" ?></p>
            </div>
          </div><!-- END COL -->

        </div>
      </div>

    </div> <!-- End row -->
  </div> <!-- End container -->
</section> <!-- End section -->

<!--
Start About Section
==================================== -->
<section class="about-2 section" id="about">
  <div class="container">
    <div class="row justify-content-center">
      <div class="row height_manage">

        <div class="col-8 grid2">

          <h2><?php echo isset($TotalData[0]['introductionhead']) ? $TotalData[0]['introductionhead'] : "Introduction"; ?></h2>
          <!-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid iste corporis aperiam assumenda numquam, est
					quaerat fugiat autem eveniet molestiae quam exercitationem. Voluptatibus pariatur cum expedita molestias sed
					illo animi!
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid iste corporis aperiam assumenda numquam, est
					quaerat fugiat autem eveniet molestiae quam exercitationem. Voluptatibus pariatur cum expedita molestias sed
					illo animi! -->
          <p><?php echo isset($TotalData[0]['introduction']) ? $TotalData[0]['introduction'] : "Default Introduction" ?></p>
        </div>

        <div class="col grid1">
          <!-- <h2 class="widget-title text-center">Achivement</h2> -->
          <h2 class="widget-title text-center"><?php echo isset($TotalData[0]['achievementhead']) ? $TotalData[0]['achievementhead'] : "Achivement"; ?></h2>
          <?php
          // Define an array of data items
          $dataItems = isset($TotalData[0]['achievement']) ? [$TotalData[0]['achievement']] : ["Default Achievement"];

          // You can add more data items to the array if needed
          $dataItems[] = "Lorem ipsum, dolor sit amet consectetur adipisicing elit.";
          $dataItems[] = "Aliquid iste corporis aperiam assumenda numquam, est quaerat fugiat autem.";
          $dataItems[] = "Autem eveniet molestiae quam exercitationem. Voluptatibus pariatur cum expedita molestias sed illo animi!";
          ?>

          <marquee class="css" behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
            <?php foreach ($dataItems as $item) : ?>
              <i class='fas fa-angle-double-right' style='font-size:15px;color:#e6e600'></i>
              <?php echo $item; ?>
              <br>
            <?php endforeach; ?>
          </marquee>

        </div>


      </div>

    </div>

  </div> <!-- End container -->
</section> <!-- End section -->

<!-- for home -->
<section class="learn-bg pt-md-5">
  <div class="container-fluid">
    <div class="row pt-md-5">
      <div class="container text-center mt-5">
        <div class="learn-text font-fam-bold">Learn From <span class="teacher">The Best</span></div>
        <div class="learn-text-sm font-fam-medium pt-3">Explore the concepts with India’s most experienced
          Teachers!</div>
      </div>




    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="container text-center pt-5">
        <h2 class="learn-text font-fam-bold ">Why <span class="why-phy">PP Classes?</span></h2>
        <div class="learn-text-sm font-fam-medium mt-4">Your One Stop Destination For Success</div>
      </div>
    </div>



    <div class="container py-5">

      <div class="row ">
        <div class="col-lg-3 col-sm-12 col-md-3  justify-content-center"><img class="img-fluid" alt="img11" src="https://www.pw.live/version14/assets/img/group-20356.svg"></div>
        <div class="col-lg-9 col-sm-12 col-md-9">
          <div class="d-flex flex-column">
            <div class="why-inner-head font-fam-bold px-4">Scheduled Lectures</div>
            <div class="why-inner-text font-fam-regular px-4">Learning is an important step for achieving dreams in a
              student’s journey. We encourage the student to explore the concept in depth
              instead
              of memorizing. The live lectures help us in learning the needs of the students
              and
              motivates the students to be creative and be passionate learners.</div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 text-center">
        <div class="col-lg-12 col-sm-12 col-md-12  justify-content-center"><img class="img-fluid" alt="img18" src="https://www.pw.live/version14/assets/img/group-20364.svg"></div>
      </div>

      <div class="row">

        <div class="col-12 col-md-12 d-flex justify-content-center d-md-none"><img class="img-fluid" alt="img11" src="https://www.pw.live/version14/assets/img/group-20360.svg" width="220" height="220"></div>

        <div class="col-12 col-md-9">
          <div class="d-flex flex-column">
            <div class="why-inner-head font-fam-bold px-4"> Doubt Solving Sessions</div>
            <div class="why-inner-text font-fam-regular px-4">Our tutorial always encourage students to ask
              questions. We have created an atmosphere where students don’t hesitate to ask
              their doubts. We firmly believe in More you ask, the more you learn.</div>
          </div>
        </div>
        <div class="col-12 col-md-3 d-flex justify-content-center d-md-block d-none"><img class="img-fluid" alt="img11" src="https://www.pw.live/version14/assets/img/group-20360.svg" width="220" height="220"></div>
      </div>
      <div class="col-12 col-md-12 text-center">
        <span class="d-md-block d-none"><img class="img-fluid" alt="img18" src="https://www.pw.live/version14/assets/img/group-20365.svg"></span>
        <span class="d-md-none"><img class="img-fluid" alt="img18" src="https://www.pw.live/version14/assets/img/mgroup20368.svg"></span>
      </div>
      <div class="row">

        <div class="col-12 col-md-3 d-flex justify-content-center"><img class="img-fluid" alt="img11" src="https://www.pw.live/version14/assets/img/group-20358.svg"></div>
        <div class="col-12 col-md-9">
          <div class="d-flex flex-column">
            <div class="why-inner-head font-fam-bold px-4">Structured And Targeted Study Material</div>
            <div class="why-inner-text font-fam-regular px-4">Explore the art of concept with our structured material
              with intelligent question tackling and problem solving skills.</div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 text-center">

        <span class="d-md-block d-none"><img class="img-fluid" alt="img18" src="https://www.pw.live/version14/assets/img/group-20364.svg"></span>
        <span class="d-md-none"><img class="img-fluid" alt="img18" src="https://www.pw.live/version14/assets/img/mgroup20364.svg"></span>
      </div>
      <div class="row">
        <div class="col-12 col-md-3 d-flex justify-content-center d-md-none"><img class="img-fluid" alt="img11" src="https://www.pw.live/version14/assets/img/group-20359.svg"></div>
        <div class="col-12 col-md-9">
          <div class="d-flex flex-column">
            <div class="why-inner-head font-fam-bold px-4">Tests On Regular Basis For Progress Tracking</div>
            <div class="why-inner-text font-fam-regular px-4">It is a set of test papers designed to make the student
              comfortable with all possible varieties of questions along with the various ways
              in which the same question can be put in order to make the student sweat in the
              exam hall.The problems involve multi-dimensional thinking at a time.</div>
          </div>
        </div>
        <div class="col-12 col-md-3 d-flex justify-content-center"><img class="img-fluid d-md-block d-none" alt="img11" src="https://www.pw.live/version14/assets/img/group-20359.svg">
        </div>
      </div>
    </div>
  </div>


</section>





<?php
include("../components/footer.php");
?>