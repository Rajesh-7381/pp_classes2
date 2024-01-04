<?php
$pageTitle = "Gallery-page";
session_start();
if(!$_SESSION['auth']){
  echo "<script>window.location.href='admin_login.php'</script>";
}
include("./connection.php");

if (isset($_POST['submit'])) {
  $allowed_formats = array('jpg', 'jpeg', 'png');
  $uploadfiles = $_FILES['uploadfile'];
  $target_dir = "../image_collection/";

  for ($i = 0; $i < count($uploadfiles['name']); $i++) {
    $uploadfile = $uploadfiles['name'][$i];
    $tempname = $uploadfiles['tmp_name'][$i];
    $file_extension = pathinfo($uploadfile, PATHINFO_EXTENSION);

    if (in_array(strtolower($file_extension), $allowed_formats)) {
      $target_file = $target_dir . basename($uploadfile);

      if (move_uploaded_file($tempname, $target_file)) {
        $bio = $_POST['bio'];


        $query = "INSERT INTO resource_gallery_img (image_source, description,image_type) VALUES (?,?,'gallery')";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $target_file, $bio);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
          $_SESSION['image_uploaded'] = true;
          $uploadMessage = "File uploaded successfully .";
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
  $deleteQuery = "DELETE FROM resource_gallery_img WHERE id = ?";
  $stmt = mysqli_prepare($conn, $deleteQuery);
  mysqli_stmt_bind_param($stmt, "i", $deleteId);
  $deleteResult = mysqli_stmt_execute($stmt);
  if ($deleteResult) {
    $deleteMessage = "Image deleted successfully.";
  } else {
    echo "<script>alert('Error deleting image.')</script>";
  }
}


include("./header.php");


?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Gallery</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Gallery</li>
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
              <div class="offset-md-1 form-div col-8 ">
                <form action="#" method="post" enctype="multipart/form-data" onsubmit="return gallery()">
                  <div class="form-group">
                    <label for="profileimage"><span style="color: green;"> Image</span></label>

                    <input type="file" name="uploadfile[]" id="profileimage" class="form-control" multiple>
                    <span style="color: red;">(Only jpeg , png , jpg format allowed)*</span>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="bio"><span class="text-primary">Purpose</span></label>
                    <textarea name="bio" id="bio" class="form-control" cols="30" rows="4" placeholder=" Message...."></textarea>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <?php
          if (isset($uploadMessage)) {
            echo "<script>alert('$uploadMessage')</script>";
          }
          ?>
          <div class="table-responsive">
            <?php
            $gallery_api_url = "http://localhost/pp_classes/NiceAdmin/API/gallery_api.php"; 
            $response = file_get_contents($gallery_api_url);
            $gallery = json_decode($response, true);
            // $gallery=$imageData[0];
            // print_r($gallery);

            if (count($gallery) > 0) {
              echo '
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                            <th style="text-align: center; background:black; color:white">Sl no.</th>
           
                            <th style="text-align: center; background:black; color:white">Purpose</th>
                            <th style="text-align: center; background:black; color:white">Image</th>
                            <th style="text-align: center; background:black; color:white">Action</th>
                       </tr>
                      </thead>
                      <tbody>';

                        $serialNumber = 1;
                          foreach ($gallery as $resultdata) {
                              echo '
                               <tr>
                                     <td style="text-align: center;">' . $serialNumber . '</td>
                                     <td style="text-align: center;">' . $resultdata["description"] . '</td>
                                     <td style="text-align: center;"><img src="' . $resultdata["image_source"] . '" width="100px" height="100px"  alt="Image ' . $serialNumber . '"></td>
                                     <td style="text-align: center;">';
                            if (isset($_SESSION['image_uploaded']) && $_SESSION['image_uploaded']) {
                             }
                              echo '<a style="text-decoration:none" href="gallery-edit.php?id=' . $resultdata["id"] . '" class="btn btn-success btn-sm btn-block m-1"><i class="fas fa-edit" title="Image update"></i></a>';
                              echo '<a style="text-decoration:none" href="?id=' . $resultdata["id"] . '" class="btn btn-danger btn-sm btn-block m-1"><i class="fas fa-trash-alt" title="Image Deletion"></i></a>';
                              echo '</td></tr>';

                              $serialNumber++;
                          }

                        echo '
                            </tbody>
                        </table>';
                   } else {
                      echo "<h2>No data found.</h2>";
                   }
                  
          ?>
        

          
          
        </div>
      </div>


    </div><!-- End Right side columns -->
  </section>

</main><!-- End #main -->
<?php include("./footer.php"); ?>
<script>
  function gallery(){
    var profileimage = document.getElementById("profileimage").value.trim();
    var bio = document.getElementById("bio").value.trim();

    if (profileimage === ""){
      alert("Image required");
      return false;
    } else {
      var allowedextensions = ['jpg', 'jpeg', 'png'];
      var extension = profileimage.split(".").pop().toLowerCase();
      if (!allowedextensions.includes(extension)){
        alert('Please select a valid image file: jpg, jpeg, png');
        return false;
      }
    }
    
    if (bio === ""){
      alert("Please enter a description");
      return false;
    }
    
    return true;
  }
</script>
