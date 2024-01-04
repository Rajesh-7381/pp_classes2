<?php
$pageTitle = "Resources";
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
$header_footer_api_url="http://localhost/pp_classes/NiceAdmin/API/Header-Footer_api.php";
$header_footer_api_url_data=file_get_contents($header_footer_api_url);
$header_footer_api_url_result=json_decode($header_footer_api_url_data,true);
// print_r($header_footer_api_url_result);
$result_data=$header_footer_api_url_result[0];
?>
<link rel="stylesheet" href="./css/style4.css">
  <section class="single-page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2><?php echo isset($result_data['resource']) ? $result_data['resource'] : "Resource"; ?></h2>
          <ol class="breadcrumb header-bradcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="index.php" class="text-white"><?php echo isset($result_data['home']) ? $result_data['home'] : "Home"; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo isset($result_data['resource']) ? $result_data['resource'] : "Resource"; ?></li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <br>

  <div class="container text-center mt-5">
    <div class="learn-text font-fam-bold">Learn From <span class="teacher">The Best</span></div>
    <div class="learn-text-sm font-fam-medium pt-3">Explore the concepts with Our most experienced
      Teachers!</div>
  </div>

  <?php
  $api_url = "http://localhost/pp_classes/NiceAdmin/API/resource_api.php";
  $response = file_get_contents($api_url);
  $image_bio_collection = json_decode($response, true);


  if (!empty($image_bio_collection)) {
  ?>
    <div class="gallery">
      <?php
      foreach ($image_bio_collection as $item) {
      ?>
        <img src="/pp_classes/NiceAdmin/re/<?php echo $item['image_source']; ?>" alt="" height="900" width="900" class="img-fluid mx-auto d-block " />
      <?php
        echo '<br>';
        echo '<br>';
        echo '
      <div class="container-fluid">';
        echo $item['description'];
      }
      ?>
    </div>
  <?php
  } else {
    // echo "No images found.";
  }
  ?>
  </div>
  <br>

  <?php
    include("../components/footer.php");
  ?>