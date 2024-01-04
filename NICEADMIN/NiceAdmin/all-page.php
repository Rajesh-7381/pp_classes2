<?php
session_start();
if(!$_SESSION['auth']){
    echo "<script>window.location.href='admin_login.php'</script>";
}
include('./connection.php');

$AllPage_Api="http://localhost/pp_classes/NiceAdmin/API/all-page-api.php";
$AllPage_Api_Data=file_get_contents($AllPage_Api);
$result=json_decode($AllPage_Api_Data,true);
$data=$result[0];
// print_r($result);


// header-footer
$header_footer_api_url="http://localhost/pp_classes/NiceAdmin/API/Header-Footer_api.php";
$header_footer_api_url_data=file_get_contents($header_footer_api_url);
$header_footer_api_url_result=json_decode($header_footer_api_url_data,true);
// print_r($header_footer_api_url_result);
$result_data=$header_footer_api_url_result[0];

include('./header.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>All Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./home.php">all page</a></li>
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
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Allpage</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#header-footer">Edit Header-Footer</button>
                            </li>

                        </ul>
                        <form action="" >
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <!-- <h5 class="card-title">About</h5> -->
                                    <div class="col-lg-9 col-md-8"> </div>
                                   
                                    <h5 class="card-title">All Page Details:</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Regular Course:</div>
                                        
                                        <div class="col-lg-9 col-md-8"><?php echo isset($data['regular']) ? $data['regular'] : "Regular Course"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Shortterm Course:</div>
                                   
                                        <div class="col-lg-9 col-md-8"><?php echo isset($data['shortterm']) ? $data['shortterm'] : "Shortterm Course"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Crash Course:</div>
                                        
                                        <div class="col-lg-9 col-md-8"><?php echo isset($data['crash']) ? $data['crash'] : "Crash Course"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Contact Us Heading:</div>
                                   
                                        <div class="col-lg-9 col-md-8"><?php echo isset($data['contact']) ? $data['contact'] : "ContactUs"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Contact Us Description:</div>
                                   
                                        <div class="col-lg-9 col-md-8"><?php echo isset($data['contactus_description']) ? $data['contactus_description'] : "Default data goes here"; ?></div>
                                    </div>

                                    <h5 class="card-title">Header-Footer:</h5>



                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Home:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['home']) ? $result_data['home'] : "Home"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Register:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['register']) ? $result_data['register'] : "Register"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Explore Program:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['explore']) ? $result_data['explore'] : "Explore Program"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Regular Course:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['regular']) ? $result_data['regular'] : "Regular Course"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Shorterm Course:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['shortterm']) ? $result_data['shortterm'] : "Shortterm Course"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Crash Course:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['crash']) ? $result_data['crash'] : "Crash Course"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Resource:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['resource']) ? $result_data['resource'] : "Resource"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Gallery:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['galleryname']) ? $result_data['galleryname'] : "Gallery"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Contact Us:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['contactus']) ? $result_data['contactus'] : "ContactUs"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Almuni Speaks:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['Alumni_Speaks']) ? $result_data['Alumni_Speaks'] : "Almuni Speaks"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">About Us:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['aboutus_Head']) ? $result_data['aboutus_Head'] : "About Us"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Company:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['Company_Header']) ? $result_data['Company_Header'] : "Company"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Service:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['Service_Header']) ? $result_data['Service_Header'] : "Service"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Reach Us At:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['Reach_Us_At']) ? $result_data['Reach_Us_At'] : "Reach Us At"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">CopyRight:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['Copyright']) ? $result_data['Copyright'] : "© Copyright 2023 . All Rights Reserved"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['Address']) ? $result_data['Address'] : "Address"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['Phone']) ? $result_data['Phone'] : "Phone"; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email:</div>
                                        <div class="col-lg-9 col-md-8"><?php echo isset($result_data['Email']) ? $result_data['Email'] : "Email"; ?></div>
                                    </div>
                                   

                                </div>
                        </form>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                            <!-- Profile Edit Form -->

                            <form method="POST" action="./all-pagedata.php"  id="Home"  onsubmit="return validateAllPageForm()">

                                        

                                <div class="row mb-3">
                                    <label for="regular" class="col-md-4 col-lg-3 col-form-label">Regular Course:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="regular"  class="form-control"  id="regular" placeholder=" Regular course"><?php echo isset($data['regular']) ? $data['regular'] : "Regular Course"; ?></textarea>
                                        <small id="addressError" class="text-danger"></small>
                                       
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="shortterm" class="col-md-4 col-lg-3 col-form-label">Shortterm Course:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="shortterm"  class="form-control"  id="shortterm" placeholder=" shortterm course"><?php echo isset($data['shortterm']) ? $data['shortterm'] : "Shortterm Course"; ?></textarea>
                                        <small id="addressError" class="text-danger"></small>
                                       
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="crash" class="col-md-4 col-lg-3 col-form-label">Regular Course:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="crash"  class="form-control"  id="crash" placeholder=" crash course"><?php echo isset($data['crash']) ? $data['crash'] : "Crash Course"; ?></textarea>
                                        <small id="addressError" class="text-danger"></small>
                                       
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="contact" class="col-md-4 col-lg-3 col-form-label">Contact Us Heading:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="contact" type="text" class="form-control" value="<?php echo isset($data['contact']) ? $data['contact'] : "ContactUs"; ?>" id="contact" placeholder=" Achivement">
                                        <small id="addressError" class="text-danger"></small>
                                       
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="contactus_description" class="col-md-4 col-lg-3 col-form-label">Contact Us Description:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="contactus_description"  class="form-control" id="contactus_description" placeholder=" Contact us description"><?php echo isset($data['contactus_description']) ? $data['contactus_description'] : "Do you have any questions?Please do not hesitate to contact us directly. Our team will get back to you within a matter of hours to help you."; ?></textarea>
                                        <small id="addressError" class="text-danger"></small>
                                       
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                </div>

                            </form><!-- End Profile Edit Form -->

                        </div>


                        <div class="tab-pane fade profile-edit pt-3" id="header-footer">

                            <form method="POST" action="./Header-Footer.php" id="slider" onsubmit="return validateHeaderFooterForm()">
                                
                                <h5 class="card-title">Change Header-Footer</h5>

                                <div class="row mb-3">
                                    <label for="home" class="col-md-4 col-lg-3 col-form-label">Home:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="home" type="text" class="form-control" value="<?php echo isset($result_data['home']) ? $result_data['home'] : "Home"; ?>" id="home" placeholder="">
                                        <small id="sliderImageHeadingError"  class="text-danger"></small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="register" class="col-md-4 col-lg-3 col-form-label">Register :</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="register" type="text" value="<?php echo isset($result_data['register']) ? $result_data['register'] : "Register"; ?>" class="form-control" id="register" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="explore" class="col-md-4 col-lg-3 col-form-label">Explore Program :</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="explore" type="text" class="form-control" value="<?php echo isset($result_data['explore']) ? $result_data['explore'] : "Explore Program"; ?>" id="explore" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="regular" class="col-md-4 col-lg-3 col-form-label">Regular Course :</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="regular" type="text" class="form-control" value="<?php echo isset($result_data['regular']) ? $result_data['regular'] : "Regular Course"; ?>" id="regular" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="shortterm" class="col-md-4 col-lg-3 col-form-label">ShortTerm Course :</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="shortterm" type="text" class="form-control" value="<?php echo isset($result_data['shortterm']) ? $result_data['shortterm'] : "Shortterm Course"; ?>" id="shortterm" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="crash" class="col-md-4 col-lg-3 col-form-label">Crash Course :</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="crash" type="text" class="form-control" value="<?php echo isset($result_data['crash']) ? $result_data['crash'] : "Crash Course"; ?>" id="crash" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="resource" class="col-md-4 col-lg-3 col-form-label">Resource :</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="resource" type="text" class="form-control" value="<?php echo isset($result_data['resource']) ? $result_data['resource'] : "Resource"; ?>" id="resource" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="galleryname" class="col-md-4 col-lg-3 col-form-label">Gallery:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="galleryname" type="text" class="form-control" value="<?php echo isset($result_data['galleryname']) ? $result_data['galleryname'] : "Gallery"; ?>" id="galleryname" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="contactus" class="col-md-4 col-lg-3 col-form-label">Contact Us:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="contactus" type="text" class="form-control" value="<?php echo isset($result_data['contactus']) ? $result_data['contactus'] : "ContactUs"; ?>" id="contactus" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                  
                                </div>
                                <div class="row mb-3">
                                    <label for="aboutus_Head" class="col-md-4 col-lg-3 col-form-label">About Us:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="aboutus_Head" type="text" class="form-control" value="<?php echo isset($result_data['aboutus_Head']) ? $result_data['aboutus_Head'] : "About Us"; ?>" id="aboutus_Head" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Alumni_Speaks" class="col-md-4 col-lg-3 col-form-label">Almuni Speaks:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="Alumni_Speaks" type="text" class="form-control" value="<?php echo isset($result_data['Alumni_Speaks']) ? $result_data['Alumni_Speaks'] : "Almuni Speaks"; ?>" id="Alumni_Speaks" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Company_Header" class="col-md-4 col-lg-3 col-form-label">Company:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="Company_Header" type="text" class="form-control" value="<?php echo isset($result_data['Company_Header']) ? $result_data['Company_Header'] : "Company"; ?>" id="Company_Header" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Service_Header" class="col-md-4 col-lg-3 col-form-label">Service:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="Service_Header" type="text" class="form-control" value="<?php echo isset($result_data['Service_Header']) ? $result_data['Service_Header'] : "Our Services"; ?>" id="Service_Header" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Reach_Us_At" class="col-md-4 col-lg-3 col-form-label">Reach Us At:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="Reach_Us_At" type="text" class="form-control" value="<?php echo isset($result_data['Reach_Us_At']) ? $result_data['Reach_Us_At'] : "Reach Us At"; ?>" id="Reach_Us_At" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="copyright" class="col-md-4 col-lg-3 col-form-label">Copyright:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="copyright" type="text" class="form-control" value="<?php echo isset($result_data['Copyright']) ? $result_data['Copyright'] : "© Copyright 2023 . All Rights Reserved"; ?>" id="copyright" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                               
                                <div class="row mb-3">
                                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="Address" type="text" class="form-control" value="<?php echo isset($result_data['Address']) ? $result_data['Address'] : "Address"; ?>" id="Address" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="Phone" type="text" class="form-control" value="<?php echo isset($result_data['Phone']) ? $result_data['Phone'] : "Phone"; ?>" id="Phone" placeholder="">
                                        <small id="sliderImageDescriptionError" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email:</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="Email" type="text" class="form-control" value="<?php echo isset($result_data['Email']) ? $result_data['Email'] : "Email"; ?>" id="Email" placeholder="">
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
    function validateAllPageForm() {
        const regular = document.getElementById("regular").value.trim();
        const shortterm = document.getElementById("shortterm").value.trim();
        const crash = document.getElementById("crash").value.trim();
        const contact = document.getElementById("contact").value.trim();
        const contactus_description = document.getElementById("contactus_description").value.trim();

        // Validate the regular course textarea
        if (regular === "") {
            alert("Please fill in the Regular Course.");
            return false;
        }

        // Validate the shortterm course textarea
        if (shortterm === "") {
            alert("Please fill in the Shortterm Course.");
            return false;
        }

        // Validate the crash course textarea
        if (crash === "") {
            alert("Please fill in the Crash Course.");
            return false;
        }

        // Validate the contact us heading input
        if (contact === "") {
            alert("Please fill in the Contact Us Heading.");
            return false;
        }

        // Validate the contact us description textarea
        if (contactus_description === "") {
            alert("Please fill in the Contact Us Description.");
            return false;
        }

        return true;
    }
</script>
<script>
    function validateHeaderFooterForm() {
        const home = document.getElementById("home").value.trim();
        const register = document.getElementById("register").value.trim();
        const explore = document.getElementById("explore").value.trim();
        const regularcourse = document.getElementById("regular").value.trim();
        const shorttermcourse = document.getElementById("shortterm").value.trim();
        const crashcourse = document.getElementById("crash").value.trim();
        const resource = document.getElementById("resource").value.trim();
        const galleryname = document.getElementById("galleryname").value.trim();
        const contactus = document.getElementById("contactus").value.trim();
        const aboutus_Head = document.getElementById("aboutus_Head").value.trim();
        const Alumni_Speaks = document.getElementById("Alumni_Speaks").value.trim();
        const Company_Header = document.getElementById("Company_Header").value.trim();
        const Service_Header = document.getElementById("Service_Header").value.trim();
        const Reach_Us_At = document.getElementById("Reach_Us_At").value.trim();
        const copyright = document.getElementById("copyright").value.trim();
        const Address = document.getElementById("Address").value.trim();
        const Phone = document.getElementById("Phone").value.trim();
        const Email = document.getElementById("Email").value.trim();

        // Validate the home input
        if (home === "") {
            alert("Please fill in the Home.");
            return false;
        }

        // Validate the register input
        if (register === "") {
            alert("Please fill in the Register.");
            return false;
        }

        // Validate the explore input
        if (explore === "") {
            alert("Please fill in the Explore Program.");
            return false;
        }
        if (regularcourse === "") {
            alert("Please fill in the regular course.");
            return false;
        }
        if (shorttermcourse === "") {
            alert("Please fill in the shortterm course.");
            return false;
        }
        if (crashcourse === "") {
            alert("Please fill in the crash course.");
            return false;
        }

        // Validate the resource input
        if (resource === "") {
            alert("Please fill in the Resource.");
            return false;
        }

        // Validate the galleryname input
        if (galleryname === "") {
            alert("Please fill in the Gallery.");
            return false;
        }

        // Validate the contactus input
        if (contactus === "") {
            alert("Please fill in the Contact Us.");
            return false;
        }

        // Validate the aboutus_Head input
        if (aboutus_Head === "") {
            alert("Please fill in the About Us.");
            return false;
        }

        // Validate the Alumni_Speaks input
        if (Alumni_Speaks === "") {
            alert("Please fill in the Alumni Speaks.");
            return false;
        }

        // Validate the Company_Header input
        if (Company_Header === "") {
            alert("Please fill in the Company.");
            return false;
        }

        // Validate the Service_Header input
        if (Service_Header === "") {
            alert("Please fill in the Service.");
            return false;
        }

        // Validate the Reach_Us_At input
        if (Reach_Us_At === "") {
            alert("Please fill in the Reach Us At.");
            return false;
        }
        if (copyright === "") {
            alert("Please fill in the Copyright.");
            return false;
        }
        if (Address === "") {
            alert("Please fill in the Address.");
            return false;
        }
        if (Phone === "") {
            alert("Please fill in the Phone.");
            return false;
        }
        if (Email === "") {
            alert("Please fill in the Email.");
            return false;
        }

        return true;
    }
</script>


