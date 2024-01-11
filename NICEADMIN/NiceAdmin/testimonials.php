<?php
$pageTitle = "Testimonials-page";
session_start();
if(!$_SESSION['auth']){
  echo "<script>window.location.href='admin_login.php'</script>";
}

include("./header.php"); ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Testimonials</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Testimonials</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="container">

              <br>
              <div class="table-responsive col-md-12" id="tableData">
                <?php
                include("./connection.php");
                $sql = "select status from testimonial";
                $data12 = mysqli_query($conn, $sql);
                while ($result = mysqli_fetch_assoc($data12)) {
                  
                }

                $api_url = 'http://localhost/pp_classes/NiceAdmin/API/testimonial_api.php';
                $data = file_get_contents($api_url);
                $testimonials = json_decode($data, true);
            

                if (!empty($testimonials)) {
                  echo "<table class='table table-bordered'>
                    <thead>
                      <tr>
                        <th style='text-align: center; background:black; color:white'>Sl No.</th>
                        <th style='text-align: center; background:black; color:white'>Name</th>
                        <th style='text-align: center; background:black; color:white'>Phone</th>
                        <th style='text-align: center; background:black; color:white'>Email</th>
                         <th style='text-align: center; background:black; color:white'>Passing Year</th>
                         <th style='text-align: center; background:black; color:white'>Present Status</th>
                         <th style='text-align: center; background:black; color:white'>Working Place</th>
                         <th style='text-align: center; background:black; color:white'>Memorable Event</th>
                        <th style='text-align: center; background:black; color:white'>Operations</th>
                      </tr>
                    </thead>
                    <tbody>";
                  $slNo = 1;



                  foreach ($testimonials as $testimonial) {
                    echo '<tr>';
                    echo '<td>' . $slNo++ . '</td>';
                    echo '<td>' . $testimonial["name"] . '</td>';
                    echo '<td>' . $testimonial["phone"] . '</td>';
                    echo '<td>' . $testimonial["email"] . '</td>';
                    echo '<td>' . $testimonial["passing_year"] . '</td>';
                    echo '<td>' . $testimonial["present_status"] . '</td>';
                    echo '<td>' . $testimonial["working_place"] . '</td>';
                    echo '<td>' . $testimonial["memorable_event"] . '</td>';
                    echo '<td class="d-flex">'; 

                    if ($testimonial["status"] == 0) {
                      echo '<a href="testimonial_accept.php?id=' . $testimonial["id"] . '" class="btn btn-success btn-block btn-sm m-1"><i class="fas fa-check" title="Accept Testimonial"></i> </a>';
                      echo '<a href="testimonial_delete.php?id=' . $testimonial["id"] . '" class="btn btn-danger btn-block btn-sm m-1"><i class="fas fa-times" title="Reject Testimonial"></i> </a>';
                    } else {
                      echo '<a href="testimonial_delete.php?id=' . $testimonial["id"] . '" class="btn btn-danger btn-block btn-sm m-1"><i class="fas fa-times" title="Reject Testimonial"></i> </a>';
                    }

                    echo '</td>';
                    echo '</tr>';
                  }

                  echo '</tbody>
                    </table>';
                } else {
                  echo "<h2>No data found.</h2>";
                }
                ?>
       

            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
<?php include("./footer.php"); ?>