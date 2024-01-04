
  document.addEventListener("DOMContentLoaded", function() {

    const form = document.getElementById("registrationForm");
    const fullnameInput = document.getElementById("fullname");
    const phoneInput = document.getElementById("phone");
    const emailInput = document.getElementById("email");
    const passingYearSelect = document.getElementById("passing-year");
    const presentStatusInput = document.getElementById("present_status");
    const workingPlaceInput = document.getElementById("working-place");
    const memorableEventInput = document.getElementById("memorableEvent");


    fullnameInput.addEventListener("input", validateName);
    phoneInput.addEventListener("input", validatePhone);
    emailInput.addEventListener("input", validateEmail);
    passingYearSelect.addEventListener("change", validatePassingYear);
    presentStatusInput.addEventListener("input", validatePresentStatus);
    workingPlaceInput.addEventListener("input", validateWorkingPlace);
    memorableEventInput.addEventListener("input", validateMemorableEvent);

    function validateName() {
      const nameError = document.getElementById("nameError");
      if (fullnameInput.value.trim() === "") {
        nameError.textContent = "Name is required";
      } else {
        nameError.textContent = "";
      }
    }

    function validatePhone() {
      const phoneError = document.getElementById("phoneError");
      if (!/^\d{10}$/.test(phoneInput.value.trim())) {
        phoneError.textContent = "Invalid phone number";
      } else {
        phoneError.textContent = "";
      }
    }

    function validateEmail() {
      const emailError = document.getElementById("emailError");
      if (!/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/.test(emailInput.value.trim())) {
        emailError.textContent = "Invalid email address";
      } else {
        emailError.textContent = "";
      }
    }

    function validatePassingYear() {
      const passError = document.getElementById("passError");
      if (passingYearSelect.value === "not selected") {
        passError.textContent = "Please select a passing year";
      } else {
        passError.textContent = "";
      }
    }

    function validatePresentStatus() {
      const presentStatusError = document.getElementById("presentstatusError");
      if (presentStatusInput.value.trim() === "") {
        presentStatusError.textContent = "Present status is required";
      } else {
        presentStatusError.textContent = "";
      }
    }

    function validateWorkingPlace() {
      const workingPlaceError = document.getElementById("workingPlaceError");
      if (workingPlaceInput.value.trim() === "") {
        workingPlaceError.textContent = "Working place is required";
      } else {
        workingPlaceError.textContent = "";
      }
    }

    function validateMemorableEvent() {
      const memorableEventError = document.getElementById("MemorableEventError");
      if (memorableEventInput.value.trim() === "") {
        memorableEventError.textContent = "Memorable event is required";
      } else {
        memorableEventError.textContent = "";
      }
    }

    // Form submission handler
    form.addEventListener("submit", function(event) {

      validateName();
      validatePhone();
      validateEmail();
      validatePassingYear();
      validatePresentStatus();
      validateWorkingPlace();
      validateMemorableEvent();


      const errorMessages = form.querySelectorAll(".text-danger");
      let hasErrors = false;
      errorMessages.forEach(error => {
        if (error.textContent !== "") {
          hasErrors = true;
        }
      });

      if (hasErrors) {
        event.preventDefault();
      }
    });
  });
