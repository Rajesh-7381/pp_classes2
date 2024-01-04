<?php
$pageTitle = "Resource-page";
session_start();

if (!$_SESSION['auth']) {
  echo "<script>window.location.href='admin_login.php'</script>";
}

include("./connection.php");

if (isset($_POST['submit'])) {
  $allowed_formats = array('jpg', 'jpeg', 'png');
  $uploadfiles = $_FILES['uploadfile'];
  $target_dir = "../re/";

  for ($i = 0; $i < count($uploadfiles['name']); $i++) {
    $uploadfile = $uploadfiles['name'][$i];
    $tempname = $uploadfiles['tmp_name'][$i];
    $file_extension = pathinfo($uploadfile, PATHINFO_EXTENSION);

    if (in_array(strtolower($file_extension), $allowed_formats)) {
      $target_file = $target_dir . basename($uploadfile);

      if (move_uploaded_file($tempname, $target_file)) {
        $bio = $_POST['bio'];

        // Use prepared statement to insert data
        $query = "INSERT INTO resource_gallery_img (image_source, description, image_type) VALUES (?, ?, 'resource')";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $target_file, $bio);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
          $_SESSION['image_uploaded'] = true;
          $uploadMessage = "File uploaded successfully and data inserted into the database.";
        } else {
          echo "Error inserting data into the database.";
        }
      } else {
        echo "<script>alert('Error uploading file.')</script>";
      }
    } else {
      // echo "<script>alert('Only JPG, JPEG, and PNG files are allowed.')</script>";
    }
  }
}


if (isset($_GET['id']) && isset($_SESSION['image_uploaded']) && $_SESSION['image_uploaded']) {
  $deleteId = $_GET['id'];
  $deleteQuery = "DELETE FROM resource_gallery_img WHERE id = '$deleteId'";
  $deleteResult = mysqli_query($conn, $deleteQuery);
  if ($deleteResult) {
    $deleteMessage = "Image deleted successfully.";
  } else {
    echo "<script>alert('Error deleting image.')</script>";
  }
}



?>

<?php include("./header.php"); ?>
<?php

?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Resources</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Resources</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <div class="container">
            <div class="row">
              <div class="offset-md-4 form-div col-4 ">
                <form action="#" method="post" enctype="multipart/form-data" onsubmit="return resourceimage()">
                  <div class="form-group">
                    <label for="profileimage"><span style="color: green;">Resource Image</span></label>

                    <input type="file" name="uploadfile[]" id="profileimage55" class="form-control" multiple>
                    <span style="color: red;">(Only jpeg , png , jpg format allowed)*</span>
                  </div>
                  <div class="form-group">
                    <label for="bio"><span class="text-primary">Description</span></label>
                    <textarea name="bio" id="bio67" class="form-control" cols="30" rows="4" placeholder="Resource Message...."></textarea>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <?php
            $resource_api_url = "http://localhost/pp_classes/NiceAdmin/API/resource_api.php";
            $resource_api_url_data = file_get_contents($resource_api_url);
            $data = json_decode($resource_api_url_data, true);

            if (count($data) > 0) {
              echo '<table class="table table-bordered">
            <thead class="table-header">
                <tr>
                    <th style="text-align: center;background:black; color:white">Sl no.</th>
                    <th style="text-align: center;background:black; color:white">Description</th>
                    <th style="text-align: center;background:black; color:white">Image</th>
                    <th style="text-align: center;background:black; color:white">Action</th>
                </tr>
            </thead>
            <tbody>';

              $serialNumber = 1;
              foreach ($data as $item) {
                echo '<tr>
                <td style="text-align: center;">' . $serialNumber . '</td>
                <td style="text-align: center;">' . $item["description"] . '</td>
                <td style="text-align: center;"><img src="' . $item["image_source"] . '" width="100px" height="100px" alt="Image ' . $serialNumber . '"></td>
                <td style="text-align: center;">
                    <a style="text-decoration:none" href="resource-update.php?id=' . $item["id"] . '" class="btn btn-success btn-block btn-sm m-1"><i class="fas fa-edit" title="update data"></i></a>
                    <a style="text-decoration:none" href="?id=' . $item["id"] . '" class="btn btn-danger btn-block btn-sm m-1"><i class="fas fa-trash-alt" title="Image Deletion"></i></a>
                </td>
            </tr>';

                $serialNumber++;
              }

              echo '</tbody></table>';
            } else {
              echo "<h2>No data found.</h2>";
            }
            ?>
          </div>





        </div>
      </div>


    </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->

<?php include("./footer.php"); ?>
<script>
 function resourceimage() {
  var profileimage55 = document.getElementById("profileimage55").value.trim();
  var bio67 = document.getElementById("bio67").value.trim();

  if (profileimage55 === "") {
    alert("Resource image required");
    return false;
  } else {
    var allowedextensions = ['jpg', 'jpeg', 'png'];
    var extensions = profileimage55.split(".").pop().toLowerCase();
    if (!allowedextensions.includes(extensions)) {
      alert('Please select a valid image file: jpg, jpeg, png');
      return false;
    }
  }

  if (bio67 === "") {
    alert("Please enter a resource message");
    return false;
  }

  return true;
}

</script>