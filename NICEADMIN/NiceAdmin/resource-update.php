<?php
session_start();
include("./header.php");
include("./connection.php");

// Initialize variables to hold data
$bio = "";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $updateId = $_GET['id'];

    // Fetch existing data associated with the 'id'
    $selectQuery = "SELECT * FROM resource_gallery_img WHERE id = ?";
    $stmt = $conn->prepare($selectQuery);
    $stmt->bind_param("i", $updateId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Update the variables with retrieved data
            $bio = $row['description'];
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
    $newImageDescription = $_POST['image_description'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageFileName = $_FILES['image']['name'];
        $imagePath = "../re/" . $imageFileName;

        // Move the uploaded image to the desired location
        if (move_uploaded_file($imageTmpName, $imagePath)) {
            // Update the image path and description in the database
            $updateQuery = "UPDATE resource_gallery_img SET image_source = ?, description = ? WHERE id = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("ssi", $imagePath, $newImageDescription, $updateId);

            if ($stmt->execute()) {
                // Redirect to a success page or perform other actions as needed
               ?>
                    <script>window.location.href='resource.php'</script>
               <?php
                exit;
            } else {
                echo "Error updating data: " . $stmt->error;
            }
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "No file uploaded or an error occurred during upload.";
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Update Resource Image</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Resource Image</li>
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
                                <form action="#" method="post" enctype="multipart/form-data" onsubmit="return resourceimageupdate()">
                                    <input type="hidden" name="id" value="<?php echo $updateId; ?>">
                                    <div class="form-group">
                                        <label for="image"><b>Image:</b></label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="image_description"><b>Description:</b></label>
                                        <textarea class="form-control" name="image_description" id="image_description"><?php echo $bio; ?></textarea>
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
 function resourceimageupdate() {
  var profileimage55 = document.getElementById("image").value.trim();
  var bio67 = document.getElementById("image_description").value.trim();

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