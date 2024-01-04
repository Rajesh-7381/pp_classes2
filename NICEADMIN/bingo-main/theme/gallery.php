
<?php
$pageTitle = "Student Gallery";
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
<link rel="stylesheet" href="./css/style3.css">
<link rel="stylesheet" href="style3.css">
  <section class="single-page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2><?php echo isset($result_data['galleryname']) ? $result_data['galleryname'] : "Gallery"; ?></h2>
          <ol class="breadcrumb header-bradcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="index.php" class="text-white"><?php echo isset($result_data['home']) ? $result_data['home'] : "Home"; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo isset($result_data['galleryname']) ? $result_data['galleryname'] : "Gallery"; ?></li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <br>

  <?php 
$api_url = "http://localhost/pp_classes/NiceAdmin/API/gallery_api.php"; 
$response = file_get_contents($api_url);
$imageData = json_decode($response, true);

if ($imageData && count($imageData) > 0) {
    echo '<div class="container">';
    $cards_per_row = 4;
    $counter = 0;
    foreach ($imageData as $row) {
        if ($counter % $cards_per_row === 0) {
            echo '<div class="row">';
        }
        ?>
       <div class="col-md-4">
    <div class="card">
        <img src="/pp_classes/NiceAdmin/image_collection/<?php echo $row['image_source']; ?>" height="300" width="350" class="zoom-effect"  alt="Image">
        <div class="card-body">
            <!-- Additional card body content goes here if needed -->
        </div>
    </div>
    <p class="card-text text-center"><?php echo $row['description']; ?></p>
</div>

        
        <?php
        if ($counter % $cards_per_row === $cards_per_row - 1) {
            echo '</div>';
        }
        $counter++;
    }

    if ($counter % $cards_per_row !== 0) {
        echo '</div>';
    }
} else {
    // echo "No images found.";
}
?>

    </div>
    <br><br>

    <?php
   include("../components/footer.php");
  ?>