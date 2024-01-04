<?php
$pageTitle = "ContactUs-page";
session_start();
if(!$_SESSION['auth']){
  echo "<script>window.location.href='admin_login.php'</script>";
}
include("./header.php");
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Contact Us</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Contact Us</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <br>
            <div class='container'>
              <div class='table-responsive'>
                <table class='table table-bordered'>
                  <thead class='table-dark'>
                    <tr>
                      <th style='text-align: center; background:black; color:white'>Sl No.</th>
                      <th style='text-align: center; background:black; color:white'> Name</th>
                      <th style='text-align: center; background:black; color:white'>Email</th>
                      <th style='text-align: center; background:black; color:white'>Phone no.</th>
                      <th style='text-align: center; background:black; color:white'>Alternative Phone no.</th>
                      <th style='text-align: center; background:black; color:white'>Message</th>
                      

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $api_url = 'http://localhost/pp_classes/NiceAdmin/API/contact_us_api.php';
                    $json_data = file_get_contents($api_url);
                    $data = json_decode($json_data, true);

                    if (is_array($data) && count($data) > 0) {
                      $serialNumber = 1;
                      foreach ($data as $item) {
                        echo '<tr>
                            <td>' . $serialNumber . '</td>
                            <td>' . $item["name"] . '</td>
                            <td>' . $item["email"] . '</td>
                            <td>' . $item["phone"] . '</td>
                            <td>' . $item["altphone"] . '</td>
                            <td>' . $item["message"] . '</td>
                           
                          </tr>';
                        $serialNumber++;
                      }
                    } else {
                      echo '<tr><td colspan="6">No data found.</td></tr>';
                    }
                    ?>

                  </tbody>
                </table>
              </div>             
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

 <?php
include("./footer.php");
 ?>