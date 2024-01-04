<?php
$pageTitle = "Home-Page";
session_start();
if(!$_SESSION['auth']){
    echo "<script>window.location.href='admin_login.php'</script>";
}


include('./connection.php');


$homeapi_url="http://localhost/pp_classes/NiceAdmin/API/home_api.php";
$datacollect=file_get_contents($homeapi_url);
$jsondata=json_decode($datacollect,true);
$resultdata=$jsondata[0];   
// print_r($resultdata);





include('./header.php');

$sql = "SELECT * FROM ImageChange";
$data1112 = mysqli_query($conn, $sql);
$totalimage = mysqli_num_rows($data1112);


?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Home</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
                <li class="breadcrumb-item">Admin</li>
                <!-- <li class="breadcrumb-item active"></li> -->
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-0">
            </div>

            <div class="col-xl-11">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Home</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Home</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#edit-home-image">Edit Home Image</button>
                            </li>

                        </ul>
                        <form action="" >
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <!-- <h5 class="card-title">About</h5> -->
                                    <div class="col-lg-9 col-md-8"> </div>
                                    
                                    <h5 class="card-title">Home Page Details:</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Our Learners Heading:</div>
                                        
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($resultdata['our_learnershead']) ? $resultdata['our_learnershead'] : "Our Learners"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Our Learners Description:</div>
                                        
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($resultdata['our_learners']) ? $resultdata['our_learners'] : "Success Message for Our Learners <br>Teachers can open the door, but you must enter it yourself."; ?></div>
                                    </div>



                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Time Management Heading:</div>
                                       
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($resultdata['time_managementhead']) ? $resultdata['time_managementhead'] : "Default Time Management"; ?> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Time Management Description:</div>
                                       
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($resultdata['time_management']) ? $resultdata['time_management'] : "Default Time Management"; ?> </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">For Learners Heading:</div>
                                     
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($resultdata['for_learnershead']) ? $resultdata['for_learnershead'] : "Default For Learners"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">For Learners Description:</div>
                                     
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($resultdata['for_learners']) ? $resultdata['for_learners'] : "Default For Learners"; ?></div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Image:</div>

                                        <div class="col-lg-9 col-md-8"><?php $imageSrc = !empty($resultdata['image']) ? $resultdata['image'] : 'Default Introduction';echo "<img src='" . $imageSrc . "' width='100' height='100'>";?></div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Introduction Heading:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($resultdata['introductionhead']) ? $resultdata['introductionhead'] : "Default Introduction"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Introduction Description:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($resultdata['introduction']) ? $resultdata['introduction'] : "Default Introduction"; ?></div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Achivement Heading:</div>
                                        
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($resultdata['achievementhead']) ? $resultdata['achievementhead'] : " Achivement"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Achivement Description:</div>
                                        
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($resultdata['achievement']) ? $resultdata['achievement'] : " Achivement"; ?></div>
                                    </div>
                                    <div class="table-responsive col-md-12" id="tableData" style="margin-left: 2px;margin-top: 20px;">
                                        <?php
                                        if ($totalimage != 0) {
                                            $serialNumber = 1;
                                            echo "<table class='table table-bordered' style='width:100%;'>
                   <thead>
                    <tr>
                      <th style='text-align: center; background:black; color:white'>Sl No.</th>
        
                      <th style='text-align: center; background:black; color:white'>Slider Image</th>
                      <th style='text-align: center; background:black; color:white'>Image Heading</th>
                      <th style='text-align: center; background:black; color:white'>Image Description</th>
                      <th style='text-align: center; background:black; color:white'>Action</th>
                  
                    </tr>
                  </thead>
                  <tbody>";
                                            while ($result = mysqli_fetch_assoc($data1112)) {
                                                echo '<tr>
                            <td>' . $serialNumber++ . '</td>

                            <td><img src="' . $result["slider_image"] . '" alt="Image" width="100" height="100"></td>
                            <td>' . $result["slider_image_heading"] . '</td>
                            <td>' . $result["slider_image_description"] . '</td>
                            

                            <td style="text-align: center;">
                            <a style="text-decoration:none" class="btn btn-success btn-sm " href="home-edit2.php?id='.$result['id'] .'"> <i class="fas fa-edit"></i></a>

                            <button class="btn btn-danger btn-sm" onclick="deleteRecord(' . $result["id"] . ')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            
                        </td>

                            
                          </tr>';
                                            }

                                            echo '</tbody>
                </table>';
                                        } else {
                                        }
                                        ?>
                                    </div>

                                </div>
                        </form>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                            <!-- Profile Edit Form -->
                           



                            <form method="POST" onsubmit="return validateForm()"  id="Home" enctype="multipart/form-data" action="home-edit.php">

                                        
                                        <h5 class="card-title">Edit Home Heading and Description:</h5>

                                <div class="row mb-3">
                                    <label for="our_learnershead" class="col-md-4 col-lg-3 col-form-label">Our Learners Heading: </label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="our_learnershead" class="form-control" id="our_learnershead" style="height: 100px" placeholder="Heading Message..."><?php echo !empty($resultdata['our_learnershead']) ? $resultdata['our_learnershead'] : "Our Learners"; ?></textarea>
                                        <small id="aboutError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="our_learners" class="col-md-4 col-lg-3 col-form-label">Our Learners Description: </label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="our_learners" class="form-control" id="our_learners" style="height: 100px" placeholder="Heading Message..."><?php echo !empty($resultdata['our_learners']) ? $resultdata['our_learners'] : "Success Message for Our Learners Teachers can open the door, but you must enter it yourself."; ?></textarea>
                                        <small id="aboutError" class="text-danger"></small>
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="time_managementhead" class="col-md-4 col-lg-3 col-form-label">Time Management Heading:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="time_managementhead" class="form-control" style="height: 100px" id="time_managementhead" placeholder="Time Management" ><?php echo !empty($resultdata['time_managementhead']) ? $resultdata['time_managementhead'] : " Time Management"; ?> </textarea>
                                        <small id="companyError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="time_management" class="col-md-4 col-lg-3 col-form-label">Time Management Description:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="time_management"   class="form-control" style="height: 100px" id="time_management" placeholder="Time Management" ><?php echo !empty($resultdata['time_management']) ? $resultdata['time_management'] : "Default Time Management"; ?> </textarea>
                                        <small id="companyError" class="text-danger"></small>
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="for_learnershead" class="col-md-4 col-lg-3 col-form-label">For Learners Heading:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="for_learnershead" class="form-control" style="height: 100px" id="for_learnershead" placeholder="Messae for our learners..."><?php echo !empty($resultdata['for_learnershead']) ? $resultdata['for_learnershead'] : " For Learners"; ?></textarea>
                                        <small id="jobError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="for_learners" class="col-md-4 col-lg-3 col-form-label">For Learners Description:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="for_learners" class="form-control" style="height: 100px" id="for_learners" placeholder="Messae for our learners..."><?php echo !empty($resultdata['for_learners']) ? $resultdata['for_learners'] : "Default For Learners"; ?></textarea>
                                        <small id="jobError" class="text-danger"></small>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="image" type="file" class="form-control" id="image" >
                                        <span style="color: red;">(*only jpg,jpeg,png formats allowed*)</span>
                                        <small id="jobError" class="text-danger"></small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="introductionhead" class="col-md-4 col-lg-3 col-form-label">Introduction Heading:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="introductionhead"  class="form-control" style="height: 100px" id="introductionhead" placeholder="Introduction"><?php echo !empty($resultdata['introductionhead']) ? $resultdata['introductionhead'] : " Introduction"; ?></textarea>
                                        <small id="jobError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="introduction" class="col-md-4 col-lg-3 col-form-label">Introduction Description:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="introduction"  class="form-control" style="height: 100px" id="introduction" placeholder="Introduction"><?php echo !empty($resultdata['introduction']) ? $resultdata['introduction'] : "Default Introduction"; ?></textarea>
                                        <small id="jobError" class="text-danger"></small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="achievementhead" class="col-md-4 col-lg-3 col-form-label">Achivement Head:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="achievementhead"  class="form-control" style="height: 100px" id="achievementhead" placeholder=" Achivement"><?php echo !empty($resultdata['achievementhead']) ? $resultdata['achievementhead'] : " Achivement"; ?></textarea>
                                        <small id="addressError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="achievement" class="col-md-4 col-lg-3 col-form-label">Achivement Description:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="achievement"  class="form-control" style="height: 100px" id="achievement" placeholder=" Achivement"><?php echo !empty($resultdata['achievement']) ? $resultdata['achievement'] : " Default Achivement"; ?></textarea>
                                        <small id="addressError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                </div>

                            </form><!-- End Profile Edit Form -->
                           

                        </div>


                        <div class="tab-pane fade profile-edit pt-3" id="edit-home-image">

                            <!-- Profile Edit Form -->

                            <form method="POST"  id="slider" enctype="multipart/form-data" action="./home-edit-image.php" onsubmit="return slider()">
                                
                                <h5 class="card-title">Slider Image Details:</h5>
                                
                                
                                <div class="row mb-3">
                                    <label for="slider_image" class="col-md-4 col-lg-3 col-form-label">Slider Image:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="file" name="slider_image" id="slider_image">
                                        <small id="sliderImageError" class="text-danger"></small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="slider_image_heading" class="col-md-4 col-lg-3 col-form-label">Image Heading:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="slider_image_heading" type="text" class="form-control" id="slider_image_heading" placeholder="Image Heading"></textarea>
                                        <small id="sliderImageHeadingError" class="text-danger"></small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="slider_image_description" class="col-md-4 col-lg-3 col-form-label">Image Description:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="slider_image_description" type="text" class="form-control" id="slider_image_description" placeholder="Image Description"></textarea>
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                            <!-- End Profile Edit Form -->

                        </div>

                        <!-- End Profile Edit Form -->

                    </div>


                </div>

            </div><!-- End Bordered Tabs -->

        </div>

    </section>
</main><!-- End #main -->


<?php
include('./footer.php');
?>


<!-- <script src="./assets/js/home.js"></script> -->

<script>
function validateForm() {
    var ourLearnersHead = document.getElementById("our_learnershead").value.trim();
    var ourLearnersDesc = document.getElementById("our_learners").value.trim();
    var timeManagementHead = document.getElementById("time_managementhead").value.trim();
    var timeManagementDesc = document.getElementById("time_management").value.trim();
    var forLearnersHead = document.getElementById("for_learnershead").value.trim();
    var forLearnersDesc = document.getElementById("for_learners").value.trim();
    var image = document.getElementById("image").value;
    var introductionHead = document.getElementById("introductionhead").value.trim();
    var introductionDesc = document.getElementById("introduction").value.trim();
    var achievementHead = document.getElementById("achievementhead").value.trim();
    var achievementDesc = document.getElementById("achievement").value.trim();
    
    
    
    // Validate our_learnershead (You can add more specific validation as needed)
    if (ourLearnersHead === "") {
        alert("Our Learners Heading is required.");
        return false;
    }
    
    // Validate our_learners (You can add more specific validation as needed)
    if (ourLearnersDesc === "") {
        alert("Our Learners Description is required.");
        return false;
    }
    
    // Validate time_managementhead (You can add more specific validation as needed)
    if (timeManagementHead === "") {
        alert("Time Management Heading is required.");
        return false;
    }
    
    // Validate time_management (You can add more specific validation as needed)
    if (timeManagementDesc === "") {
        alert("Time Management Description is required.");
        return false;
    }

    // Validate for_learnershead (You can add more specific validation as needed)
    if (forLearnersHead === "") {
        alert("For Learners Heading is required.");
        return false;
    }
    
    // Validate for_learners (You can add more specific validation as needed)
    if (forLearnersDesc === "") {
        alert("For Learners Description is required.");
        return false;
    }
    
    // Validate image format
    if (image === "") {
        alert("Image is required.");
        return false;
    } else {
        var allowedExtensions = ["jpg", "jpeg", "png"];
        var extension = image.split(".").pop().toLowerCase();
        if (!allowedExtensions.includes(extension)) {
            alert("Please select a valid image file (JPG, JPEG, or PNG).");
            return false;
        }
    }
    
    // Validate introductionhead (You can add more specific validation as needed)
    if (introductionHead === "") {
        alert("Introduction Heading is required.");
        return false;
    }
    
    // Validate introduction (You can add more specific validation as needed)
    if (introductionDesc === "") {
        alert("Introduction Description is required.");
        return false;
    }

    // Validate achievementhead (You can add more specific validation as needed)
    if (achievementHead === "") {
        alert("Achievement Head is required.");
        return false;
    }
    
    // Validate achievement (You can add more specific validation as needed)
    if (achievementDesc === "") {
        alert("Achievement Description is required.");
        
    }
    
    return true;
}




    

</script>
<script>
    function slider() {
        // Get form inputs
        var sliderImage = document.getElementById("slider_image").value;
        var sliderImageHeading = document.getElementById("slider_image_heading").value.trim();
        var sliderImageDescription = document.getElementById("slider_image_description").value.trim();

        // Check if slider image is selected
        if (sliderImage === "") {
        alert("slider Image is required.");
        return false;
    } else {
        var allowedExtensions = ["jpg", "jpeg", "png"];
        var extension = sliderImage.split(".").pop().toLowerCase();
        if (!allowedExtensions.includes(extension)) {
            alert("Please select a valid image file (JPG, JPEG, or PNG).");
            return false;
        }
    }
       

        // Check if slider image heading is empty
        if (sliderImageHeading === "") {
           alert("please  enter slider image heading.")
            return false; // Prevent form submission
        }

        // Check if slider image description is empty
        if (sliderImageDescription === "") {
            alert("please  enter slider image description."); 
                     return false; // Prevent form submission
        }

        // If all validations pass, the form will be submitted
        return true;
    }
    function deleteRecord(id) {

if (confirm("Are you sure you want to delete this image?")) {

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "home-delete-image.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {

            alert(xhr.responseText);
            location.reload()

        }
    };
    xhr.send("id=" + id);
}   
}
</script>
