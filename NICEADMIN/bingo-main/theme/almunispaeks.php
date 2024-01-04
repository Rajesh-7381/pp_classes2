  <?php
  $pageTitle = "Almunis";
  session_start();
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

  $adminData = $data[0];
  include("../components/header.php");
  $header_footer_api_url = "http://localhost/pp_classes/NiceAdmin/API/Header-Footer_api.php";
  $header_footer_api_url_data = file_get_contents($header_footer_api_url);
  $data77 = json_decode($header_footer_api_url_data, true);
  $result = $data77[0];
  ?>

  <section class="single-page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2><?php echo isset($result['Alumni_Speaks']) ? $result['Alumni_Speaks'] : "Almuni Speaks"; ?></h2>
          <ol class="breadcrumb header-bradcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="index.php" class="text-white"><?php echo isset($result['home']) ? $result['home'] : "Home"; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo isset($result['Alumni_Speaks']) ? $result['Alumni_Speaks'] : "Almuni Speaks"; ?></li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- blog details part start -->
  <section class="blog-details section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <article class="post">

           

            <div>
            <h2 class="text-center" style=" background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBve0qerqKq_--ntjD3kFnf2w2ydojm-fo8j5k2Uto&s);background-clip:text ;background-size: cover;-webkit-background-clip:text;color: transparent;"> Our <?php echo isset($result['Alumni_Speaks']) ? $result['Alumni_Speaks'] : "Almuni Speaks"; ?></h2>
              <!-- <img src="./pexels-max-fischer-5212703.jpg" alt="" height="500" width="100%"> -->
            </div>
            <br>


            <div class="row row-cols-1 row-cols-md-5">
              
              <div class="col">
                <div class="card custom-card " style="border-color: orange ;height: 300px;min-height: 300px;">
                  <center>
                    <div class="d-block m-auto ">
                      <h1><i class="fa fa-plus" style="cursor: pointer;font-size:3em;color:#797979;" title="Click to become a testimonial" id="plusICON65" aria-hidden="true" onclick="almunispeakForm()"></i></h1 class="d-block justify-content-center m-auto">
                    </div>
                  </center>
                  <div class="card-body">
                    <div class="footer6767" onclick="almunispeakForm()"></div>
                    <h5 class="card-title"></h5>
                    <p class="card-text"></p>



                  </div>

                </div>

              </div>
              <?php

              $api_url2 = "http://localhost/pp_classes/NiceAdmin/API/testimonial_api_message.php";
              $response = file_get_contents($api_url2);
              $data = json_decode($response, true);

              if ($data && count($data) > 0) {
                foreach ($data as $item) {
                  echo '
                      <div class="col">
                        <div class="card custom-card mb-4" style="border-color: red; background: url(\'\') no-repeat center center / cover;height: 300px;min-height: 300px;">
                          <div class="background-overlay"></div>
                          <div class="card-body">
                            <h5 class="card-text"><i class="bx bxs-quote-alt-left quote-icon-left" style="color: green;"></i>' . htmlspecialchars($item["event"]) . '<i class="bx bxs-quote-alt-right quote-icon-right" style="color: green;"></i></h5>
                            <p class="card-title text-left">' . htmlspecialchars($item["name"]) . '</p>
                          </div>
                        </div>
                      </div>
                    ';
                }
              } else {
                // echo "No results found";
              }
              ?>
            </div>

            <script>
              function almunispeakForm() {
                window.location.href = "testimonial.php";
              }
            </script>
        </div>
        </article>
      </div>

    </div>
    </div>
  </section>
  <!-- blog details part end -->
  <?php
  include("../components/footer.php");
  ?>