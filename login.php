<?php
 // Start the session
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "tourist";

// Create a connection to the database


$data = mysqli_connect($host, $user, $pass, $db);
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($data, $_POST['uname']);
    $password = mysqli_real_escape_string($data, $_POST['pass']);

    // Check credentials in the database
    $query = "SELECT * FROM regi WHERE username='$username' AND password='$password'";
    $result = mysqli_query($data, $query);

    if (mysqli_num_rows($result) == 1) {
        // User found
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $username;

        // Check user type and redirect accordingly
        if ($row["type"] == "admin") {
            header("Location:a_dashboard.php"); // Redirect to admin index page
        } 
        else {
            header("Location: index.php"); // Redirect to user index page
        }
        exit();
    } else {
        // Incorrect credentials
        $error = "Invalid username or password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }
  body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url('Img/0_displayimg/login.jpg') no-repeat;
    background-size: cover;
    background-position: center;
  }
  .wrapper{
    width: 420px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .2);
    backdrop-filter: blur(30px);
    color: #fff;
    border-radius: 12px;
    padding: 30px 40px;
  }
  .wrapper h1{
    font-size: 36px;
    text-align: center;
  }
  .wrapper .input-box{
    position: relative;
    width: 100%;
    height: 50px;
    
    margin: 30px 0;
  }
  .input-box input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, .2);
    border-radius: 40px;
    font-size: 16px;
    color: #fff;
    padding: 20px 45px 20px 20px;
  }
  .input-box input::placeholder{
    color: #fff;
  }
  .input-box i{
    position: absolute;
    right: 20px;
    top: 30%;
    transform: translate(-50%);
    font-size: 20px;
  
  }
  .wrapper .remember-forgot{
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0 15px;
  }
  .remember-forgot label input{
    accent-color: #fff;
    margin-right: 3px;
  
  }
  .remember-forgot a{
    color: #fff;
    text-decoration: none;
  
  }
  .remember-forgot a:hover{
    text-decoration: underline;
  }
  .wrapper .btn{
    width: 100%;
    height: 45px;
    background: #fff;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    cursor: pointer;
    font-size: 16px;
    color: #333;
    font-weight: 600;
  }
  .wrapper .register-link{
    font-size: 14.5px;
    text-align: center;
    margin: 20px 0 15px;
  
  }
  .register-link p a{
    color: #fff;
    text-decoration: none;
    font-weight: 600;
  }
  .register-link p a:hover{
    text-decoration: underline;
  }
    </style>
</head>
<body>
    <div class="wrapper">
        <form method="POST" id="loginForm">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="uname" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" id="password" placeholder="Password" name="pass" required>
                <i class='bx bxs-lock-alt' id="togglePassword"></i>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? &nbsp;<a href="Register.php">Register</a></p>
            </div>
        </form>
    </div>


  <?php
    if (isset($error)) {
        echo "<script>alert('$error');</script>";
    }
    ?>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function () {
            var passwordField = document.getElementById('password');
            var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.classList.toggle('bx-show');
        });
    </script>
</body>
</html>
