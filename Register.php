<?php
// Start session
session_start();

// Database connection details
$host = 'localhost'; // your host
$user = 'root';      // your database username
$pass = '';          // your database password
$db = 'tourist';     // your database name

// Create a new connection
$con = new mysqli($host, $user, $pass, $db);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $mnumber = $_POST['mnumber'];
    $password = $_POST['pass'];

    // Validate input
    if (!empty($username) && !empty($email) && !empty($mnumber) && !empty($password) && preg_match('/^[0-9]{10}$/', $mnumber)) {
        // Prepare the SQL statement
        $stmt = $con->prepare("INSERT INTO regi (Username, Email, Mobile_Number, type, Password) VALUES (?, ?, ?, 'tourist', ?)");
        $stmt->bind_param("ssss", $username, $email, $mnumber, $password);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the home page after successful registration
            echo "<script type='text/javascript'> 
                    alert('Successfully Registered'); 
                    window.location.href='index.php'; 
                  </script>";
        } else {
            echo "<script type='text/javascript'> alert('Registration Failed: " . $stmt->error . "');</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<script type='text/javascript'> alert('Please fill all fields correctly');</script>";
    }
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <link rel="stylesheet" href="Register.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    .input-box {
      position: relative;
      margin-bottom: 20px;
    }
    .input-box input {
      width: 100%;
      padding: 10px 40px 10px 10px;
      box-sizing: border-box;
      border: 1px solid #ddd;
      border-radius: 5px;
      outline: none;
    }
    .input-box i {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
    }

    .error {
      color: red;
      font-size: 0.9em;
      text-align: left; /* Center the text */
      margin: 25px 0 ; /* Add margin for spacing */
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <form method="POST" onsubmit="return validatePassword()">
      <h1>Registration</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" name="uname" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="email" placeholder="Email" name="email" required>
        <i class='bx bxs-envelope'></i>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Mobile number" name="mnumber" required>
        <i class='bx bxs-phone-call'></i>
      </div>
      <div class="input-box">
        <input type="password" id="password" placeholder="Password" name="pass" required>
        <i class='bx bxs-lock-alt' id="togglePassword"></i>
      </div>
     
      <div id="passwordError" class="error"></div>
      <button type="submit" class="btn">Register</button>
      <div class="register-link">
        <p>I have an account? &nbsp;<a href="login.php">Login</a></p>
      </div>
    </form>
  </div>
  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const passwordError = document.querySelector('#passwordError');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('bxs-lock-alt');
        this.classList.toggle('bxs-lock-open-alt');
    });

    function validatePassword() {
      const passwordValue = password.value;
      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

      if (!passwordRegex.test(passwordValue)) {
        passwordError.textContent = "Password must be at least 8 characters long, include an uppercase letter, a lowercase letter, a number, and a special character.";
        return false;
      }

      passwordError.textContent = ""; // Clear any previous error
      return true; // Allow form submission
    }
  </script>
</body>
</html>
