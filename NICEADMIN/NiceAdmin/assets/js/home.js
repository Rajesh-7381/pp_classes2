
   

    // function updateRecord(id){
    //   var xhr=new XMLHttpRequest();
    //   xhr.open("POST","home-update.php",true);
    //   xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    //   xhr.onreadystatechange=function(){
    //     if(xhr.readyState===4 && xhr.readyState===200){
    //       alert(xhr.responseText)
    //       location.reload();

    //     }
    //   };
    //   xhr.send("id=" +id);
    // }
    
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("Home").addEventListener('submit', function(event) {
            event.preventDefault();
            if (HomeVALIDATE()) {
                var homedata = new FormData(this);
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'home-edit.php', true);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                            // alert('Updated Successfully');
                            location.reload();
                        } else {
                            console.error("Error updating: " + xhr.responseText);
                            alert("Error updating. Please try again");
                        }
                    }
                };
                xhr.send(homedata); // Send the FormData object
            }
        });

     


        function HomeVALIDATE() {
            return true;
        }

        function ImageVALIDATE() {
            return true;
        }
    });


    // searching functionality
    $(document).ready(function() {
        $('#search').keyup(function() {
            var searchTerm = $(this).val();
    
            $.ajax({
                url: 'search_data.php',
                type: 'GET',
                data: {
                    search: searchTerm
                },
                success: function(response) {
                    $('#tableData').html(response);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });
    });
    // function studentData(id){
    //   console.log(id);
    // }
    
    // single data shown
    $(document).on('click', '.viewbtn', function() {
        var studentid = $(this).val();
        // alert(studentid)
        $.ajax({
            type: "GET",
            // data show in view.php
            url: "view.php?id=" + studentid,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
    
                } else if (res.status == 200) {
                    // $('#id').html(res.data.id);
                    $('#email').html(res.data.email);
                    $('#fullname').html(res.data.fullname);
                    $('#phone').html(res.data.phone);
    
                    $('#fatherName').html(res.data.fatherName);
                    $('#fatherphone').html(res.data.fathernumber);
                    $('#Board').html(res.data.Board);
                    $('#grade').html(res.data.standard);
    
                    $('#address').html(res.data.address);
                    $('#schoolName').html(res.data.schoolname);
                    $('#gender').html(res.data.gender);
                    $('#editURL').attr("href", "./admin_update.php?id=" + studentid)
    
                }
            }
        });
    });

// register page update 
    
  function validateUPDATEFORM() {
    var name_Input = document.getElementById("name");
    var nameError = document.getElementById("nameError");
    var nameValue = name_Input.value.trim();

    if (nameValue === "") {
      name_Input.classList.remove("is-valid");
      name_Input.classList.add("is-invalid");
      nameError.innerText = "Please enter your name.";
      return false;
    } else {
      name_Input.classList.remove("is-invalid");
      name_Input.classList.add("is-valid");
      nameError.innerText = "";
    }


    var phone_Input = document.getElementById("phone");
    var phoneError = document.getElementById("phoneError");
    var phoneValue = phone_Input.value.trim();

    if (phoneValue === "") {
      phone_Input.classList.remove("is-valid");
      phone_Input.classList.add("is-invalid");
      phoneError.innerText = "Please enter your phone number.";
      return false;
    } else if (phoneValue.length !== 10) {
      phone_Input.classList.remove("is-valid");
      phone_Input.classList.add("is-invalid");
      phoneError.innerText = "Please enter a 10-digit phone number.";
      return false;
    } else {
      phone_Input.classList.remove("is-invalid");
      phone_Input.classList.add("is-valid");
      phoneError.innerText = "";
    }


    var fathername_Input = document.getElementById("fatherName");
    var fathernameError = document.getElementById("fathernameError");
    var fathernameValue = fathername_Input.value.trim();

    if (fathernameValue === "") {
      fathername_Input.classList.remove("is-valid");
      fathername_Input.classList.add("is-invalid");
      fathernameError.innerText = "Please enter your father's name.";
      return false;
    } else {
      fathername_Input.classList.remove("is-invalid");
      fathername_Input.classList.add("is-valid");
      fathernameError.innerText = "";
    }

    var fatherphone_Input = document.getElementById("fatherphone");
    var fatherphoneError = document.getElementById("fatherphoneError");
    var fatherphoneValue = fatherphone_Input.value.trim();

    if (fatherphoneValue === "") {
      fatherphone_Input.classList.remove("is-valid");
      fatherphone_Input.classList.add("is-invalid");
      fatherphoneError.innerText = "Please enter your father's phone number.";
      return false;
    } else if (fatherphoneValue.length !== 10) {
      fatherphone_Input.classList.remove("is-valid");
      fatherphone_Input.classList.add("is-invalid");
      fatherphoneError.innerText = "Please enter a 10-digit phone number.";
      return false;
    } else {
      fatherphone_Input.classList.remove("is-invalid");
      fatherphone_Input.classList.add("is-valid");
      fatherphoneError.innerText = "";
    }

    var email_Input = document.getElementById("email");
    var emailError = document.getElementById("emailError");
    var emailValue = email_Input.value.trim();

    if (emailValue === "") {
      email_Input.classList.remove("is-valid");
      email_Input.classList.add("is-invalid");
      emailError.innerText = "Please enter your email address.";
      return false;
    } else if (!validateEmail(emailValue)) {
      email_Input.classList.remove("is-valid");
      email_Input.classList.add("is-invalid");
      emailError.innerText = "Please enter a valid email address.";
      return false;
    } else {
      email_Input.classList.add("is-valid");
      email_Input.classList.remove("is-invalid");
      emailError.innerText = "";
    }

    var school_Input = document.getElementById("school");
    var schoolError = document.getElementById("schoolError");
    var schoolValue = school_Input.value.trim();

    if (schoolValue === "") {
      school_Input.classList.remove("is-valid");
      school_Input.classList.add("is-invalid");
      schoolError.innerText = "Please enter your school name.";
      return false;
    } else {
      school_Input.classList.add("is-valid");
      school_Input.classList.remove("is-invalid");
      schoolError.innerText = "";
    }

    var address_Input = document.getElementById("address");
    var addressError = document.getElementById("addressError");
    var addressValue = address_Input.value.trim();

    if (addressValue === "") {
      address_Input.classList.remove("is-valid");
      address_Input.classList.add("is-invalid");
      addressError.innerText = "Please enter your address.";
      return false;
    } else {
      address_Input.classList.add("is-valid");
      address_Input.classList.remove("is-invalid");
      addressError.innerText = "";
    }

    var board_Select = document.getElementById("board");
    var boardError = document.getElementById("boardError");
    var boardValue = board_Select.value;

    if (boardValue === "") {
      board_Select.classList.remove("is-valid");
      board_Select.classList.add("is-invalid");
      boardError.innerText = "Please select a board.";
      return false;
    } else {
      board_Select.classList.add("is-valid");
      board_Select.classList.remove("is-invalid");
      boardError.innerText = "";
    }

    var grade_Select = document.getElementById("grade");
    var gradeError = document.getElementById("gradeError");
    var gradeValue = grade_Select.value;

    if (gradeValue === "") {
      grade_Select.classList.remove("is-valid");
      grade_Select.classList.add("is-invalid");
      gradeError.innerText = "Please select a grade.";
      return false;
    } else {
      grade_Select.classList.add("is-valid");
      grade_Select.classList.remove("is-invalid");
      gradeError.innerText = "";
    }

    var gender_Select = document.getElementById("gender");
    var genderError = document.getElementById("genderError");
    var genderValue = gender_Select.value;

    if (genderValue === "") {
      gender_Select.classList.remove("is-valid");
      gender_Select.classList.add("is-invalid");
      genderError.innerText = "Please select a gender.";
      return false;
    } else {
      gender_Select.classList.add("is-valid");
      gender_Select.classList.remove("is-invalid");
      genderError.innerText = "";
    }

    return true;
  }

  function addValidationListeners() {
    var name_Input = document.getElementById("name");
    name_Input.addEventListener("mouseout", validateUPDATEFORM);

    var phone_Input = document.getElementById("phone");
    phone_Input.addEventListener("mouseout", validateUPDATEFORM);

    var fathername_Input = document.getElementById("fatherName");
    fathername_Input.addEventListener("mouseout", validateUPDATEFORM);

    var fatherphone_Input = document.getElementById("fatherphone");
    fatherphone_Input.addEventListener("mouseout", validateUPDATEFORM);

    var email_Input = document.getElementById("email");
    email_Input.addEventListener("mouseout", validateUPDATEFORM);

    var school_Input = document.getElementById("school");
    school_Input.addEventListener("mouseout", validateUPDATEFORM);

    var address_Input = document.getElementById("address");
    address_Input.addEventListener("mouseout", validateUPDATEFORM);

    var board_Select = document.getElementById("board");
    board_Select.addEventListener("mouseout", validateUPDATEFORM);

    var grade_Select = document.getElementById("grade");
    grade_Select.addEventListener("mouseout", validateUPDATEFORM);

    var gender_Select = document.getElementById("gender");
    gender_Select.addEventListener("mouseout", validateUPDATEFORM);

  }


  window.addEventListener("load", addValidationListeners);

  function validateEmail(email) {
    var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(email);
  }

  function alphaOnly(event) {
    var key = event.keyCode;
    return (key >= 65 && key <= 90) || key === 8 || key == 32 || key == 9;
  }


  