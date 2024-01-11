

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login Form</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form onsubmit="login(); return false;">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your username" autocomplete="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" autocomplete="current-password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

<script>
    function login() {
        event.preventDefault(); 
        const email = document.getElementById('email').value;
        // alert("1")
        const password = document.getElementById('password').value;
        // console.log(password)
        if (!email || !password) {
            alert('Please fill in all fields.');
            return;
        }
        // Send the credentials to the server for authentication
        fetch('login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    email,
                    password
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.token) {
                    // Store the token in localStorage or sessionStorage
                    localStorage.setItem('token', data.token);
                    alert('Login successful!');
                   window.location.href="../admin_login.php";
                } else {
                    alert('Login failed. Invalid credentials.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>

<!-- Get Input Values:

The function login() is called when the form is submitted. It retrieves the values entered in the email and password input fields.
Check for Empty Fields:

It checks whether both the email and password fields are not empty. If either is empty, it displays an alert and returns, preventing the form from being submitted.
Fetch API Request:

It uses the fetch API to send a POST request to the 'login.php' endpoint.
The request includes the email and password in the request body, formatted as JSON.
Handle Response:

It handles the response from the server using promises (then and catch).
The first then parses the JSON response received from the server.
The second then checks if the response contains a token. If a token is present, it indicates successful login.
If successful, it stores the token in the localStorage, displays a success alert, and redirects to "logout.php" using window.location.href.
Error Handling:

If there is an error during the fetch operation, the catch block logs the error to the console. -->