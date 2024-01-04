<?php
$pageTitle = "Crash Course";
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
include("../components/header.php");
$header_footer_api_url = "http://localhost/pp_classes/NiceAdmin/API/Header-Footer_api.php";
$header_footer_api_url_data = file_get_contents($header_footer_api_url);
$data77 = json_decode($header_footer_api_url_data, true);
$result = $data77[0];
?>
<link rel="stylesheet" href="./css/styl2.css">
<section class="single-page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2> <?php echo isset($result['crash']) ? $result['crash'] : "Crash Course"; ?></h2>
        <ol class="breadcrumb header-bradcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="index.php" class="text-white"><?php echo isset($result['home']) ? $result['home'] : "Home"; ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo isset($result['crash']) ? $result['crash'] : "Crash Course"; ?></li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="about-2 section" id="about">
  <div class="container">
    <div class="row justify-content-center">
      <div class="row height_manage">

        <div class="col-8 grid2">
          <?php


          $AllPage_Api = "http://localhost/pp_classes/NiceAdmin/API/all-page-api.php";
          $AllPage_Api_Data = file_get_contents($AllPage_Api);
          $result_data = json_decode($AllPage_Api_Data, true);
          $collecteddata = $result_data[0];


          ?>

          <h2> <?php echo isset($result['crash']) ? $result['crash'] : "Crash Course"; ?></h2>
          <?php echo isset($collecteddata['crash']) ? $collecteddata['crash'] : " “The most common way people give up their power is by thinking they don’t have any option.”
            Most students tend to believe that they don’t have many options to choose from after their 10th exams.
            Even if they do find diverse options, they feel confused about “Which one should I go for?” or “What career path is right for me?”
            In such a situation, there is a lot of confusion that tends to enter the mind of the students.
            While most students think that a full-time degree is the only way to ensure a good career,
            there are several short term courses after the 10th that can give you the edge that you need."; ?>
        </div>

        <div class="col grid1">
          <?php
          $Home_api = "http://localhost/pp_classes/NiceAdmin/API/home_api.php";
          $Home_api_data = file_get_contents($Home_api);
          $Data12 = json_decode($Home_api_data, true);
          $TotalData = $Data12[0];
          // print_r($TotalData);
          ?>
          <!-- <h2 class="widget-title text-center">Achivement</h2> -->
          <h2 class="widget-title text-center"><?php echo isset($TotalData['achievementhead']) ? $TotalData['achievementhead'] : "Achivement"; ?></h2>
          <?php
          // Define an array of data items
          $dataItems = isset($TotalData['achievement']) ? [$TotalData['achievement']] : ["Default Achievement"];

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


  </div>

</section>
<?php

$api_url = 'http://localhost/pp_classes/NiceAdmin/API/crashcourse.php';
$data = file_get_contents($api_url);
$course = json_decode($data, true);
?>
<br>
<div class="container">
  <!-- <img src="./images/image.png" alt="" height="2%" width="98%"> -->
</div>
<section class="about-2 section" id="about">

  <div class="container">
    <div class="row justify-content-center">
      <div class="row height_manage col-12">

        <?php
        if (!empty($course)) {
          echo '<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="bg-info text-light" style="text-align:center">Board</th>
                            <th class="bg-info text-light" style="text-align:center">Grade</th>
                            <th class="bg-info text-light" style="text-align:center">Course</th>
                            <th class="bg-info text-light" style="text-align:center">Duration</th>
                            <th class="bg-info text-light" style="text-align:center">Payment</th>
                        </tr>
                    </thead>
                    <tbody>';


          foreach ($course as $result) {
            echo '<tr>
                        <td style="text-align:center">' . htmlspecialchars($result["board"]) . '</td>
                        <td style="text-align:center">' . htmlspecialchars($result["grade"]) . '</td>
                        <td style="text-align:center">' . htmlspecialchars($result["program"]) . '</td>
                        <td style="text-align:center">' . htmlspecialchars($result["duration"]) . '</td>
                        <td style="text-align:center"><a href="#" data-toggle="modal" data-target="#exampleModal">Pay Now</a></td>
                      </tr>';
          }

          echo '</tbody></table>';
        } else {
          echo '<h1>No Active Course In This Time.</h1>';
        }

        ?>
      </div>

    </div>


  </div>

</section>
<div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
  <div class="modal-dialog" style="width: 300px;">
    <div class="modal-content text-center">
      <div class="modal-header h5 text-white bg-primary justify-content-center">
        Pay Using
      </div>
      <div class="modal-body px-5">
        <p class="py-2"></p>
        <form method="POST" onsubmit="return reset_PASSWORD_Function()">
          <div class="form-outline">
            <label class="form-label" for="forgotemail"><b>CARD::</b></label>
            <a href="../../Stripe-Payment-Gateway-Integration-in-PHP-master/Stripe-Payment-Gateway-Integration-in-PHP-master/index.php">Pay Now</a>
          </div>
          <div class="form-outline">
            <label class="form-label" for="forgotpassword"><b>UPI And Other::</b></label>
            <a href="../../razorpay-payment-gateway-in-php/index.php">Pay Now</a>
          </div>
          <!-- <button type="submit" name="reset_password" class="btn btn-primary w-100">Reset password</button> -->
        </form>
      </div>
    </div>
  </div>
</div>

</div>

<?php
include("../components/footer.php");
?>