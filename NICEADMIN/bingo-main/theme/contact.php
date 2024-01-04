 <?php
  $pageTitle = "ContactUs";
  session_start();
  include('./connection.php');

  $api_url = "http://localhost/pp_classes/NiceAdmin/API/admin_api.php";

  $curl = curl_init($api_url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  curl_close($curl);

  if (!$response) {
    // die('Error: API request failed.');
  }

  $data = json_decode($response, true);

  if (empty($data)) {
    // die('Error: Empty API response.');
  }

  $adminData = $data[0];

  $AllPage_Api = "http://localhost/pp_classes/NiceAdmin/API/all-page-api.php";
  $AllPage_Api_Data = file_get_contents($AllPage_Api);
  $result_data = json_decode($AllPage_Api_Data, true);
  $collecteddata = $result_data[0];

  include("../components/header.php");
  $header_footer_api_url = "http://localhost/pp_classes/NiceAdmin/API/Header-Footer_api.php";
  $header_footer_api_url_data = file_get_contents($header_footer_api_url);
  $header_footer_api_url_result = json_decode($header_footer_api_url_data, true);
  // print_r($header_footer_api_url_result);
  $result_data = $header_footer_api_url_result[0];

  ?>


 <section class="single-page-header">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <h2><?php echo isset($result_data['contactus']) ? $result_data['contactus'] : "ContactUs"; ?></h2>
         <ol class="breadcrumb header-bradcrumb justify-content-center">
           <li class="breadcrumb-item"><a href="index.php" class="text-white"><?php echo isset($result_data['home']) ? $result_data['home'] : "Home"; ?></a></li>
           <li class="breadcrumb-item active" aria-current="page"><?php echo isset($result_data['contactus']) ? $result_data['contactus'] : "ContactUs"; ?></li>
         </ol>
       </div>
     </div>
   </div>
 </section>

 <!--Start Contact Us
    =========================================== -->

 <div class="container d-flex justify-content-center ">
   <section class="mb-4">
     <!-- <h2 class="h1-responsive font-weight-bold text-center my-5">Contact Us</h2> -->
     <h2 class="h1-responsive font-weight-bold text-center my-5"><?php echo isset($collecteddata['contact']) ? $collecteddata['contact'] : "Contact Us"; ?></h2>
     <p class="text-center w-responsive mx-auto mb-5"><?php echo isset($collecteddata['contactus_description']) ? $collecteddata['contactus_description'] : "Do you have any questions?
         <br> Please do not hesitate to contact us directly. Our team will get back to you within a matter of hours to help you."; ?>
     </p>
     
     <div class="row ">

       <div class="col-md-8 mb-md-0 mb-5 ">
         <!-- <div class="contact-form"> -->
         <form id="contactform" method="POST" onsubmit="return validateFORM() && message_counting(document.getElementById('message'));">
           <div class="row">
             <div class="col-md-6">
               <div class="md-form mb-3">
                 <label for="name"><i class="fas fa-user"></i> <b>Your Name</b> <span style="color: red;">*</span></label>
                 <input type="text" name="name" id="fullname" class="form-control" placeholder="Enter Your Number" onkeydown="return alphaOnly(event);">
                 <small id="nameError" class="text-danger"></small>
               </div>
             </div>

             <div class="col-md-5">
               <div class="md-form mb-3">
                 <label for="email"><i class="fas fa-envelope"></i> <b>Your Email</b> <span style="color: red;">*</span></label>
                 <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email">
                 <small id="emailError" class="text-danger"></small>
               </div>
             </div>

             <div class="col-md-6">
               <div class="md-form mb-3">
                 <label for=""><i class="fas fa-phone"></i></i>&nbsp;<b>Your Phone Number</b> <span style="color: red;">*</span></label>
                 <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your number" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10">
                 <small id="phoneError" class="text-danger"></small>
               </div>
             </div>
             <div class="col-md-5">
               <div class="md-form mb-3">
                 <label for=""><i class="fas fa-phone"></i></i>&nbsp;<b>Alternative Phone Number</b></label>
                 <input type="text" class="form-control" id="altphone" name="altphone" placeholder="Enter Alternative Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10 ">
                 <small id="phoneError2" class="text-danger"></small>
               </div>
             </div>
             <!-- <div class="row">  -->
             <div class="col-md-11">
               <div class="md-form">
                 <label for="message"><i class="fas fa-comments"></i> <b>Message</b> <span style="color: red;">*</span></label>
                 <textarea type="text" name="message" id="message" rows="2" cols="8" class="form-control md-textarea" onkeyup="message_counting(this)" placeholder="message..."></textarea>
                 <small id="charNum">500 characters remaining</small>
                 <small id="messageError" class="text-danger"></small>
               </div>
             </div>

           </div>

           <br>
           <div class=" col-md-3 text-center">
             <input type="submit" class="btn btn-primary" id="btn" name="submit" value="Send Now">
           </div>
         </form>
       </div>
       <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
         <ul>

           <ul class="list-unstyled mb-7">
             <li style="color: blue">
               <i class="fas fa-map-marker-alt" title="location"></i>&nbsp;<?= isset($result_data['Address']) ? $result_data['Address'] : 'Address'; ?>
             </li>
             <li class="text-secondary"><?= isset($adminData['address']) ? $adminData['address'] : "6B 666 Village Near Patia Railway Crossing , BBSR"; ?></li>

             <li style="color: blue">
               <i class='fas fa-phone' title="phone"></i>&nbsp;<?= isset($result_data['Phone']) ? $result_data['Phone'] : 'Phone'; ?>
             </li>
             <li class="text-muted"><?= isset($adminData['phone']) ? $adminData['phone'] : "9338234305"; ?></li>

             <li style="color: blue">
               <i class="fa fa-envelope" title="email"></i>&nbsp;<?= isset($result_data['Email']) ? $result_data['Email'] : 'Email'; ?>
             </li>
             <li class="text-muted"><?= isset($adminData['email_id']) ? $adminData['email_id'] : "ppclassesbbsr@gmail.com"; ?></li>
           </ul>

         </ul>
       </div>
     </div>
   </section>
 </div>

 <?php
  include("../components/footer.php");
  ?>
 <script src="js/script.js"></script>


 <script>
   function validateFORM() {
     var nameInput = document.getElementById("fullname");
     var emailInput = document.getElementById("email");

     var phoneInput = document.getElementById("phone");
     var phoneInput2 = document.getElementById("altphone");

     var messageInput = document.getElementById("message");
     var nameError = document.getElementById("nameError");

     var emailError = document.getElementById("emailError");
     var phoneError = document.getElementById("phoneError");

     var phoneError2 = document.getElementById("phoneError2");
     var messageError = document.getElementById("messageError");

     var nameValue = nameInput.value.trim();
     var emailValue = emailInput.value.trim();

     var phoneValue = phoneInput.value.trim();
     var phoneValue2 = phoneInput2.value.trim();
     var messageValue = messageInput.value.trim();

     if (nameValue === "") {
       nameError.innerText = "Please enter your name.";
       return false;
     } else {
       nameError.innerText = "";
     }

     if (emailValue === "") {
       emailError.innerText = "Please enter your email.";
       return false;
     } else if (!validateEmail(emailValue)) {
       emailError.innerText = "Please enter a valid email address.";
       return false;
     } else {
       emailError.innerText = "";
     }

     if (phoneValue.length !== 10) {
       phoneError.innerText = "Please enter a 10-digit phone number.";
       return false;
     } else {
       phoneError.innerText = "";
     }
     var altphoneInput = document.getElementById("altphone");
     var altphoneValue = altphoneInput.value.trim();
     if (altphoneValue !== "" && altphoneValue.length !== 10) {
       var phoneError2 = document.getElementById("phoneError2");
       phoneError2.innerText = "Please enter a 10-digit phone number.";
       return false;
     } else {
       var phoneError2 = document.getElementById("phoneError2");
       phoneError2.innerText = ""; 
     }

     if (messageValue === "") {
       messageError.innerText = "Please enter your message.";
       return false;
     } else if (messageValue.length > 500) {
       messageError.innerText = "Message should not exceed 500 characters.";
       return false;
     } else {
       messageError.innerText = "";
     }

     return true;
   }

   function validateEmail(email) {
     var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
     return pattern.test(email);
   }

   function alphaOnly(event) {
     var key = event.keyCode;
     return (key >= 65 && key <= 90) || key === 8 || key == 9 || key === 32;
   }

   function message_counting(textarea) {
     var maxLength = 500;
     var currentLength = textarea.value.length;
     var remaining = maxLength - currentLength;
     var charNum = document.getElementById("charNum");
     charNum.innerText = remaining + " characters remaining";
     if (currentLength > maxLength) {
       charNum.style.color = "red";
       return false;
     } else {
       charNum.style.color = "";
       return true;
     }
   }

   
 </script>



 <?php
  include("connection.php");
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $altphone = $_POST['altphone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (name, email,phone, altphone, message) VALUES ('$name', '$email','$phone', '$altphone', '$message')";
    echo $sql;
    if (mysqli_query($conn, $sql)) {
      // echo "Data inserted successfully.";
      echo "<script>alert('We will shortly contact with us')</script>";

    } else {
      // echo "Data not inserted.";
    }
  }
  ?>

 