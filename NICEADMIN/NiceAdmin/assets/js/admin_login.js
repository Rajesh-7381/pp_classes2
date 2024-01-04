
function validateEmail(email) {
  var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return pattern.test(email);
}

function validateADMINform9090() {
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

  var password_Input = document.getElementById("password");
  var passwordError = document.getElementById("passwordError");
  var passwordValue = password_Input.value.trim();

  if (passwordValue === "") {
    password_Input.classList.remove("is-valid");
    password_Input.classList.add("is-invalid");
    passwordError.innerText = "Please enter your password.";
    return false;
  } else {
    password_Input.classList.add("is-valid");
    password_Input.classList.remove("is-invalid");
    passwordError.innerText = "";
  }

  return true;
}

function reset_PASSWORD_Function() {
  var forgotemail_Input = document.getElementById("forgotemail");
  var forgotemailError = document.getElementById("forgotemailError");
  var forgotemailValue = forgotemail_Input.value.trim();

  if (forgotemailValue === "") {
    forgotemail_Input.classList.remove("is-valid");
    forgotemail_Input.classList.add("is-invalid");
    forgotemailError.innerText = "Please enter your email address.";
    return false;
  } else if (!validateEmail(forgotemailValue)) {
    forgotemail_Input.classList.remove("is-valid");
    forgotemail_Input.classList.add("is-invalid");
    forgotemailError.innerText = "Please enter a valid email address.";
    return false;
  } else {
    forgotemail_Input.classList.add("is-valid");
    forgotemail_Input.classList.remove("is-invalid");
    forgotemailError.innerText = "";
  }

  var forgotpassword_Input = document.getElementById("forgotpassword");
  var forgotpasswordError = document.getElementById("forgotpasswordError");
  var forgotpasswordValue = forgotpassword_Input.value.trim();

  if (forgotpasswordValue === "") {
    forgotpassword_Input.classList.remove("is-valid");
    forgotpassword_Input.classList.add("is-invalid");
    forgotpasswordError.innerText = "Please enter a new password.";
    return false;
  } else {
    forgotpassword_Input.classList.add("is-valid");
    forgotpassword_Input.classList.remove("is-invalid");
    forgotpasswordError.innerText = "";
  }

  return true;
}

function addValidationListeners() {
  var email_Input = document.getElementById("email");
  email_Input.addEventListener("mouseout", validateADMINform9090);

  var password_Input = document.getElementById("password");
  password_Input.addEventListener("mouseout", validateADMINform9090);

  var forgot_email_Input = document.getElementById("forgotemail");
  forgot_email_Input.addEventListener("mouseout", reset_PASSWORD_Function);

  var fogot_password_Input = document.getElementById("forgotpassword");
  fogot_password_Input.addEventListener("mouseout", reset_PASSWORD_Function);
}

window.addEventListener("load", addValidationListeners);



function openForgotPasswordModal() {
  var modal = document.getElementById("exampleModal");
  var modalInstance = new bootstrap.Modal(modal);
  modalInstance.show();
}
