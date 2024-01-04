
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("profileForm");
    const submitButton = document.getElementById("submitButton");

    submitButton.addEventListener("click", function() {
        // Check if all fields are filled
        const ourTutorial = document.getElementById("our_tutorial").value;
        const ourMission = document.getElementById("our_mission").value;
        const ourVission = document.getElementById("our_vission").value;
        const tutImage = document.getElementById("tut-image").value;

        // Reset error messages
        document.getElementById("aboutError").textContent = "";
        document.getElementById("companyError").textContent = "";
        document.getElementById("jobError").textContent = "";
        document.getElementById("phoneError").textContent = "";

        let hasError = false;

        if (!ourTutorial) {
            // Display an alert for Our Tutorial
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Please enter Our Tutorial.",
            });
            hasError = true;
        }

        if (!ourMission) {
            // Display an alert for Our Mission
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Please enter Our Mission.",
            });
            hasError = true;
        }

        if (!ourVission) {
            // Display an alert for Our Vision
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Please enter Our Vision.",
            });
            hasError = true;
        }

        if (!tutImage) {
            // Display an alert for choosing an image
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Please choose an image.",
            });
            hasError = true;
        } else {
            const allowedExtensions = ['jpg', 'jpeg', 'png'];
            const fileExtension = tutImage.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(fileExtension)) {
                // Display an alert for invalid file format
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Invalid file format. Only JPG, JPEG, and PNG are allowed.",
                });
                hasError = true;
            }
        }

        if (!hasError) {
            // If no errors, send the form data via Ajax
            const formData = new FormData(form);

            fetch("register-page-details-update.php", {
                    method: "POST",
                    body: formData,
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status === "success") {
                        // Success
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Form has been updated/inserted successfully!",
                        }).then(() => {
                            // Reload the page
                            window.location.reload();
                        });
                    } else {
                        // Show an error SweetAlert popup
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: data.message || "An error occurred.",
                        });
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });

    // Add an event listener to clear error messages when input fields are edited
    const inputFields = form.querySelectorAll("input, textarea");
    inputFields.forEach((input) => {
        input.addEventListener("input", function() {
            const errorId = input.id + "Error";
            document.getElementById(errorId).textContent = "";
        });
    });
});
