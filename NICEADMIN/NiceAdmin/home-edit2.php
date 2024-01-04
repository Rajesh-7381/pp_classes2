<?php
$pageTitle = "Slider-Image-update";
session_start();
include("./header.php");
include("./connection.php");


// Initialize variables to hold data
$image_heading = "";
$image_description = "";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $updateId = $_GET['id'];

    // Fetch existing data associated with the 'id'
    $selectQuery = "SELECT * FROM ImageChange WHERE id = ?";
    $stmt = $conn->prepare($selectQuery);
    $stmt->bind_param("i", $updateId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Update the variables with retrieved data
            $image_heading = $row['slider_image_heading'];
            $image_description = $row['slider_image_description'];

            
        } else {
            echo "Record not found.";
        }
    } else {
        echo "Error executing query: " . $stmt->error;
    }
} else {
    echo "Invalid 'id' parameter in the URL.";
}

// Process the form submission
if (isset($_POST['submit'])) {
    $updateId = $_POST['id'];
    $newImageHeading = $_POST['image_heading'];
    $newImageDescription = $_POST['image_description'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageFileName = $_FILES['image']['name'];
        $imagePath = "../slider-image/" . $imageFileName;

        // Move the uploaded image to the desired location
        if (move_uploaded_file($imageTmpName, $imagePath)) {
            // Update the image path and other data in the database
            $updateQuery = "UPDATE ImageChange SET slider_image = ?, slider_image_heading = ?, slider_image_description = ? WHERE id = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("sssi", $imagePath, $newImageHeading, $newImageDescription, $updateId);

            if ($stmt->execute()) {
                // Redirect to a success page or perform other actions as needed
                ?>
                <script>window.location.href='home.php'</script>

                <?php
                exit;
            } else {
                echo "Error updating data: " . $stmt->error;
            }
        } else {
            // echo "Error moving uploaded file.";
        }
    } else {
        // echo "No file uploaded or an error occurred during upload.";
    }
}
?>


<main id="main" class="main">
  <div class="pagetitle">
    <h1>Update Slider Image</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Slider Image</li>
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
                
              <div class="offset-md-3 col-md-6">
                
                <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
                    
                  <input type="hidden" name="id" value="<?php echo $updateId; ?>">
                  
                  <div class="form-group">
                    <label for="image"><b>Image:</b></label>
                    <input type="file" class="form-control" name="image" id="image">
                  </div>
                  
                  <div class="form-group">
                    <label for="image_heading"><b> Heading:</b></label>
                    <textarea  class="form-control" name="image_heading" id="image_heading" ><?php echo $image_heading; ?></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="image_description"><b> Description:</b></label>
                    <textarea class="form-control" name="image_description" id="image_description"><?php echo $image_description; ?></textarea>
                  </div>
                  
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Update">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Right side columns -->
  </section>
  
  <!-- Back Button (Positioned to the right) -->
  
</main><!-- End #main -->



<?php
include("./footer.php");
?>
<script>
function validateForm() {
    var imageField = document.getElementById("image");
    var imageHeadingField = document.getElementById("image_heading");
    var imageDescriptionField = document.getElementById("image_description");

    var errors = [];

    // Validate image upload
    if (imageField.files.length === 0) {
        errors.push("Please select an image.");
    } else {
        var allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        var fileName = imageField.files[0].name;
        var fileExtension = fileName.split(".").pop().toLowerCase();
        if (allowedExtensions.indexOf(fileExtension) === -1) {
            errors.push("Only JPG, JPEG, PNG, and GIF files are allowed.");
        }
    }

    // Validate image heading (adjust the length limit as needed)
    var imageHeading = imageHeadingField.value.trim();
    if (imageHeading.length < 1 || imageHeading.length > 5000) {
        errors.push("Image heading must be between 1 and 5000 characters.");
    }

    // Validate image description (adjust the length limit as needed)
    var imageDescription = imageDescriptionField.value.trim();
    if (imageDescription.length < 1 || imageDescription.length > 5000) {
        errors.push("Image description must be between 1 and 5000 characters.");
    }

    // Display validation errors or submit the form
    if (errors.length > 0) {
        var errorMessages = errors.join("\n");
        alert(" errors:\n" + errorMessages);
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}
</script>