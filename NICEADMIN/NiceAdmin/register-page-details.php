<?php
$pageTitle = "Register-page";
session_start();
if (!$_SESSION['auth']) {
    echo "<script>window.location.href='admin_login.php'</script>";
}
include('./connection.php');

include('./header.php');
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Register</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Register Page</li>
             
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">

            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#Registerpage-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Registerpage-edit">Edit Register Page</button>
                            </li>


                        </ul>
                        <form action="">
                            <?php 
                            $registerpageapiurl = "http://localhost/pp_classes/NiceAdmin/API/registerpage_api.php";
                            $api_url_data = file_get_contents($registerpageapiurl);
                            $resultdata = json_decode($api_url_data, true);
                            $result = $resultdata[0];
                            ?>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="Registerpage-overview">

                                    <h5 class="card-title">Register Page Details</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Our Tutorial Image:</div>
                                        <div class="col-lg-9 col-md-8"><img src="/pp_classes/NiceAdmin/image_collection/<?php echo !empty($result['our_tutorial_image']) ? $result['our_tutorial_image'] : "image" ?>" height="100" width="100" class="zoom-effect" alt="Image"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Student Registration Form:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($result['studentregistration']) ? $result['studentregistration'] : "Student Registration Form" ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Our Tutorial Heading:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($result['our_tutorialHead']) ? $result['our_tutorialHead'] : "Our Tutorial" ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Our Tutorial Description:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($result['our_tutorial']) ? $result['our_tutorial'] : "Default our tutorial" ?></div>
                                    </div>



                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Our Mission Heading:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($result['our_missionhead']) ? $result['our_missionhead'] : "Our Mission" ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Our Mission Description:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($result['our_mission']) ? $result['our_mission'] : "Default our mission" ?></div>
                                    </div>



                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Our Vission Heading:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($result['our_vissionhead']) ? $result['our_vissionhead'] : "Our Vision" ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Our Vission Description:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo !empty($result['our_vission']) ? $result['our_vission'] : " Our Tutorial" ?></div>
                                    </div>




                                </div>
                        </form>

                        <div class="tab-pane fade profile-edit pt-3" id="Registerpage-edit">

                            <form action="./register-page-details-update.php" method="POST" enctype="multipart/form-data" id="profileForm">

                                <div class="row mb-3">
                                    <!-- Other form fields here -->
                                </div>
                                <div class="row mb-3">
                                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Our Tutorial Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="tut-image" type="file" class="form-control" id="tut-image">
                                        <span id="companyError" class="text-danger">(*only jpg ,jpeg ,png formats allowed*)</span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="studentregistration" class="col-md-4 col-lg-3 col-form-label">studentregistration form:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="studentregistration" class="form-control" id="studentregistration" style="height: 100px" placeholder="Message..."><?php echo !empty($result['studentregistration']) ? $result['studentregistration'] : "Student Registration Form" ?></textarea>
                                        <small id="studentregistration2" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="our_tutorialHead" class="col-md-4 col-lg-3 col-form-label">Our Tutorial Heading:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="our_tutorialHead" class="form-control" id="our_tutorialHead" style="height: 100px" placeholder="Message..."><?php echo !empty($result['our_tutorialHead']) ? $result['our_tutorialHead'] : "Our Tutorial" ?></textarea>
                                        <small id="aboutError2" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="our_tutorial" class="col-md-4 col-lg-3 col-form-label">Our Tutorial Description:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="our_tutorial" class="form-control" id="our_tutorial" style="height: 100px" placeholder="Message..."><?php echo !empty($result['our_tutorial']) ? $result['our_tutorial'] : "Default our tutorial" ?></textarea>
                                        <small id="aboutError" class="text-danger"></small>
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="our_missionhead" class="col-md-4 col-lg-3 col-form-label">Our Mission Heading:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="our_missionhead" class="form-control" id="our_missionhead" style="height: 100px" placeholder="Message..."><?php echo !empty($result['our_missionhead']) ? $result['our_missionhead'] : "Our Mission" ?></textarea>
                                        <small id="jobError2" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Our Mission Description:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="our_mission" class="form-control" id="our_mission" style="height: 100px" placeholder="Message..."><?php echo !empty($result['our_mission']) ? $result['our_mission'] : "Default our mission" ?></textarea>
                                        <small id="jobError" class="text-danger"></small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="our_vissionhead" class="col-md-4 col-lg-3 col-form-label">Our Vission Heading:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="our_vissionhead" class="form-control" id="our_vissionhead" style="height: 100px" placeholder="Message..."><?php echo !empty($result['our_vissionhead']) ? $result['our_vissionhead'] :"Our Vision" ?></textarea>
                                        <small id="phoneError2" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Our Vission Description:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="our_vission" class="form-control" id="our_vission" style="height: 100px" placeholder="Message..."><?php echo !empty($result['our_vission']) ? $result['our_vission'] : "Default our vission" ?></textarea>
                                        <small id="phoneError" class="text-danger"></small>
                                    </div>
                                </div>

                                <div class="text-center">
                                <button type="button" name="submitButton" id="submitButton" class="btn btn-primary">Save Changes</button>

                                </div>

                            </form>

                            <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("profileForm");
        const submitButton = document.getElementById("submitButton");

        submitButton.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default form submission behavior

            if (validateForm()) {
                form.submit();
            }
        });

        function validateForm() {
            let hasError = false;

            function showAlert(message) {
                alert(message);
                hasError = true;
            }

            const studentregistration = document.getElementById("studentregistration").value;
            const our_tutorialHead = document.getElementById("our_tutorialHead").value;
            const ourTutorial = document.getElementById("our_tutorial").value;
            const our_missionhead = document.getElementById("our_missionhead").value;
            const ourMission = document.getElementById("our_mission").value;
            const our_vissionhead = document.getElementById("our_vissionhead").value;
            const ourVission = document.getElementById("our_vission").value;
            const tutImage = document.getElementById("tut-image").value;

            if (!studentregistration) {
                showAlert("Please enter Student Registration Form.");
            }
            if (!our_tutorialHead) {
                showAlert("Please enter Our Tutorial Heading.");
            }
            if (!ourTutorial) {
                showAlert("Please enter Our Tutorial Description.");
            }
            if (!our_missionhead) {
                showAlert("Please enter Our Mission Heading.");
            }
            if (!ourMission) {
                showAlert("Please enter Our Mission Description.");
            }
            if (!our_vissionhead) {
                showAlert("Please enter Our Vision Heading.");
            }
            if (!ourVission) {
                showAlert("Please enter Our Vision Description.");
            }
            if (!tutImage) {
                showAlert("Please choose an image.");
            } else {
                const allowedExtensions = ['jpg', 'jpeg', 'png'];
                const fileExtension = tutImage.split('.').pop().toLowerCase();

                if (!allowedExtensions.includes(fileExtension)) {
                    showAlert("Invalid file format. Only JPG, JPEG, and PNG are allowed.");
                }
            }

            return !hasError;
        }
    });
</script>








                        </div>


                    </div>

                </div>
            </div>
        </div>

    </section>
</main>

<?php
include("./footer.php");
?>
<!-- <script src="./assets/js/register-page.js"></script>     -->