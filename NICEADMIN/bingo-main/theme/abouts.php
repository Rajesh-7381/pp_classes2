<?php
$pageTitle = "AboutUs-page";
session_start();
include('./connection.php');

$api_url = "http://localhost/pp_classes/NiceAdmin/API/admin_api.php";

$response=file_get_contents($api_url);

$data = json_decode($response, true);
$adminData = $data[0];
include("../components/header.php");

$header_footer_api_url = "http://localhost/pp_classes/NiceAdmin/API/Header-Footer_api.php";
$header_footer_api_url_data = file_get_contents($header_footer_api_url);
$data77 = json_decode($header_footer_api_url_data, true);
$result = $data77[0];

?>

<section class="single-page-header">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                
                                <h2><?php echo isset($result['aboutus']) ? $result['aboutus'] : "About Us"; ?></h2>
                                <ol class="breadcrumb header-bradcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="index.php" class="text-white"><?php echo isset($result['home']) ? $result['home'] : "Home"; ?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo isset($result['aboutus']) ? $result['aboutus'] : "About Us"; ?></li>
                                </ol>
                        </div>
                </div>
        </div>
</section>
<?php

if (empty($adminData) || !file_exists($_SERVER['DOCUMENT_ROOT'] . '/pp_classes/NiceAdmin/profile/' . $adminData['profileimage'])) {

    $defaultImage = '../../NiceAdmin/assets/img/unnamed (1).jpg';
} else {

    $defaultImage = '/pp_classes/NiceAdmin/profile/' . $adminData['profileimage'];
}
?>

<main class="font-fam-med">

        <ol class="breadcrumb">
                <!-- <li class="active">Active page</li> -->
        </ol>

        <section class="container mt-2">
                <div class="row">
                        <!-- Col 1  -->
                       

                        <div class="col-lg-6 col-md-6 col-12 my-4">
                                <h1 class="my-4 font-fam-bold heading-1 filteredDesc"><?php echo isset($result['aboutus']) ? $result['aboutus'] : "About Us"; ?></h1>
                                <p class="font-normal text-lg">
                                        <!-- Physics And Chemistry is ❤️. Class 8th to 12th, For CBSE And ICSE Students. -->
                                </p>

                                <div class="">
                                        <p class="font-normal text-lg">
                                                <?php echo !empty($adminData['about']) ? $adminData['about'] :"PP Classes provides a mature environment where sound work ethics, self-discipline and acquisition of independent learning skills are fostered. Staff is deeply committed to the academic progress and welfare of students and all students are encouraged to interact closely with their teachers and seek help at any time. There is a positive learning environment where students will constantly get a chance achieve their best and have a strong sense of identification. The institute aims to develop students who have a passion for life a desire to reach their full potential and to have a life long love of learning. To play your role effectively we at PP classes strive habits, attitude & values. My good wishes for a successful future to all."; ?>
                                        </p>
                                </div>
                                <div class="">
                                        <p class="font-normal text-lg">
                                                The founder Prajwal Prasanjeet❤️ stands for
                                                <span class="font-medium italic">education for every child
                                                        irrespective of it's economic
                                                        status.</span>
                                        </p>
                                </div>
                        </div>

                        <!-- Col 2 -->
                        
                        <div class="col-lg-6 col-md-6 col-12 mt-5 text-end">
                                
                        <img class="img-fluid" width="353" src="<?php echo $defaultImage; ?>" alt="prajwal-sir" style="border-radius: 50%; border:1rem solid #fff">


                        </div>
                </div>
        </section>

        <section class="container">

                <div class="features-card test-series-card">
                        <div class="row">
                                <div class="col-lg-1">
                                        <img class="" src="./images/bsf-exam-mqqb.webp" alt="studymaterial" style="width: 40px;height: 40px;">

                                </div>
                                <div class="col col-lg-11">
                                        <p class="card-details-text semibold my-3" style="font-weight: bold;">Test Series</p>
                                        <p class="details pe-md-3">
                                                We provide you the best test series for Class 8th to 12th
                                                chapterwise which will be scheduled for whole year. This test
                                                series
                                                follows very logical sequence of Basic → Advance questions.
                                        </p>
                                </div>
                        </div>
                </div>

        </section>

        <section class="container">

                <div class="features-card dpp-card">
                        <div class="row">
                                <div class="col-lg-1">
                                        <img class="" src="./images/calendar-4029233-3337896.webp" alt="dpp" style="width: 40px;height: 40px;">

                                </div>
                                <div class="col col-lg-11">
                                        <p class="card-details-text semibold my-3" style="font-weight: bold;">DPP</p>
                                        <p class="details  pe-md-3">
                                                Daily Practice is the key to success. Hence we are now providing
                                                lecturewise DPP sheets for Class XI Alpha Physics. The best
                                                questions of this sheet would be also discussed in the
                                                freetime
                                        </p>
                                </div>
                        </div>
                </div>

        </section>

        <section class="container">

                <div class="features-card notes-card">
                        <div class="row">
                                <div class="col-lg-1">
                                        <img class="" src="./images/download.png" alt="PP Classes notes" style="width: 40px;height: 40px;">

                                </div>
                                <div class="col col-lg-11">
                                        <p class="card-details semibold my-3" style="font-weight: bold;">Our Typed Notes</p>
                                        <p class="details  pe-md-3">
                                                Sometime we need neat and ordered study material prepared
                                                according
                                                to the syllabus of our exam. The content of these not may/may
                                                not be
                                                same as PDF handwritten notes. These notes are equivalent to all
                                                the
                                                material provided by any reputed institute of India which is
                                                working.

                                        </p>
                                </div>
                        </div>
                </div>

        </section>

        <section class="container">

                <div class="features-card assignment-card">
                        <div class="row">
                                <div class="col-lg-1">
                                        <img class="" src="./images/download (1).png" alt="assignments" style="width: 40px;height: 40px;">
                                </div>
                                <div class="col col-lg-11">
                                        <p class="card-details-text semibold my-3" style="font-weight: bold;">Assignment</p>
                                        <p class="details pe-md-3">
                                                Now, this is something you won't get for free so easily. These
                                                Assignment are best in industry and follow a very logical
                                                sequence
                                                of Basic→Advance questions.The cherry on top is that at the end
                                                of
                                                Assignment you get solution too detailed. The Assignment are
                                                designed keeping in my mind the syllabus of CBSE as well as ICSE
                                                .
                                        </p>
                                </div>
                        </div>
                </div>

        </section>

        <section class="container">

                <div class="features-card pdf-card">
                        <div class="row">
                                <div class="col-lg-1">
                                        <img class="" src="./images/images.png" alt="pdf notes" style="width: 40px;height: 40px;">
                                </div>
                                <div class="col col-lg-11">
                                        <p class="card-details-text semibold my-3" style="font-weight: bold;">
                                                PDF Note (Handwritten)
                                        </p>
                                        <br>
                                        <p class="details pe-md-3">
                                                Though the best notes are those which are written by yourself,
                                                yet
                                                at the time due to unavoidable circumstances we urgently need
                                                notes
                                                which are best in content as well as quality. For this we have
                                                included PDF notes of each chapter. These notes are aligned
                                                under
                                                Concepts Notes. At times, you may find some
                                                PDF Handwritten Notes. Kindly Note that some of
                                                these
                                                notes are not written by us and they are borrowed from student
                                                community.
                                        </p>
                                </div>
                        </div>

                </div>

        </section>

      
</main>

<?php
include("../components/footer.php");
?>