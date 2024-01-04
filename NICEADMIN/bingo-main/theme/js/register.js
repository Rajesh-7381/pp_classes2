
  $(document).ready(function() {
    var gradeSelect = $('#grade');
    var gradeOptions = gradeSelect.html();

    $('#board').change(function(e) {
      e.preventDefault();
      var selectedBoard = $(this).val();

      // Clear the grade options
      gradeSelect.html('');


      if (selectedBoard === '') {
        gradeSelect.prop('disabled', true);
      } else {
        gradeSelect.prop('disabled', false);


        if (selectedBoard === 'CBSE') {
          gradeSelect.append(gradeOptions);
        } else if (selectedBoard === 'ICSE') {
          gradeSelect.append('<option value="8th">8th</option>');
          gradeSelect.append('<option value="9th">9th</option>');
          gradeSelect.append('<option value="10th">10th</option>');
        }
      }
    });
  });

  function validateFORM() {
    resetErrors();

    const name = document.getElementById("name");
    const nameValue = name.value.trim();
    if (nameValue === "") {
      showError(name, "Please enter your name.");
      return false;
    }

    const phone = document.getElementById("phone");
    const phoneValue = phone.value.trim();
    if (phoneValue === "" || phoneValue.length !== 10 || !/^\d+$/.test(phoneValue)) {
      showError(phone, "Please enter a valid 10-digit phone number.");
      return false;
    }

    const fatherName = document.getElementById("fatherName");
    const fatherNameValue = fatherName.value.trim();
    if (fatherNameValue === "") {
      showError(fatherName, "Please enter your father's name.");
      return false;
    }

    const fatherPhone = document.getElementById("fatherPhone");
    const fatherPhoneValue = fatherPhone.value.trim();
    if (fatherPhoneValue === "" || fatherPhoneValue.length !== 10 || !/^\d+$/.test(fatherPhoneValue)) {
      showError(fatherPhone, "Please enter a valid 10-digit phone number.");
      return false;
    }

    const gender = document.getElementById("gender");
    const genderValue = gender.value;
    if (genderValue === "") {
      showError(gender, "Please select a gender.");
      return false;
    }

    const email = document.getElementById("email");
    const emailValue = email.value.trim();
    if (emailValue === "" || !validateEmail(emailValue)) {
      showError(email, "Please enter a valid email address.");
      return false;
    }

    const school = document.getElementById("school");
    const schoolValue = school.value.trim();
    if (schoolValue === "") {
      showError(school, "Please enter your school name.");
      return false;
    }

    const address = document.getElementById("address");
    const addressValue = address.value.trim();
    if (addressValue === "") {
      showError(address, "Please enter your address.");
      return false;
    }

    const board = document.getElementById("board");
    const boardValue = board.value;
    if (boardValue === "") {
      showError(board, "Please select a board.");
      return false;
    }

    const grade = document.getElementById("grade");
    const gradeValue = grade.value;
    if (gradeValue === "") {
      showError(grade, "Please select a grade.");
      return false;
    }

    return true;
  }


  function resetErrors() {
    const errorElements = document.querySelectorAll(".text-danger");
    errorElements.forEach(error => (error.innerText = ""));

    const invalidElements = document.querySelectorAll(".invalid");
    invalidElements.forEach(element => element.classList.remove("invalid"));
  }


  function showError(element, message) {
    const errorElement = element.nextElementSibling; //next element siblings returns next text element
    errorElement.innerText = message; 
    element.classList.add("invalid");
  }


  function validateEmail(email) {
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(email);
  }


  function alphaOnly(event) {
    const key = event.keyCode;
    return (key >= 65 && key <= 90) || key === 8 || key == 32 || key == 9;
  }


  const form = document.querySelector("form");
  form.addEventListener("submit", function(event) {
    if (!validateFORM()) {
      event.preventDefault();
    }
  });
