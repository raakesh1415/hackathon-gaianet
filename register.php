<!DOCTYPE html>
<html lang="en">
<head>
  <title>Legal Assistant Register</title>
   <link rel="icon" href="logo.png" type="image/x-icon" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #00082f;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }
    .registration-form {
      background-color: #001f54;
      border-radius: 10px;
      padding: 30px;
      width: 500px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }
    .registration-form h2 {
      color: #ffffff;
      text-align: center;
      margin-bottom: 20px;
    }
    .registration-form .form-label {
      color: #ffffff;
    }
    .registration-form input {
      border-radius: 20px;
      padding: 10px;
    }
    .registration-form .form-control:focus {
      box-shadow: none;
      border-color: #3d7ff5;
    }
    .btn-register {
      background-color: #3d7ff5;
      border: none;
      border-radius: 20px;
      padding: 10px;
      width: 100%;
      color: #ffffff;
      margin-top: 20px;
    }
    .btn-register:hover {
      background-color: #366fda;
    }
    .form-header {
      background-color: #5b83e5;
      color: #ffffff;
      padding: 10px;
      border-radius: 10px 10px 0 0;
      text-align: center;
      margin-bottom: 10px;
    }
    .text-light {
      color: #9ca2ad !important;
    }
    .logo {
      max-width: 250px;
      margin-bottom: 10px;
    }
    .legal_logo {
      position: absolute;
      top: 40px;
      left: 50%;
      transform: translateX(-50%);
    }
    .welcome {
      position: absolute;
      top: 100px;
      left: 50%;
      transform: translateX(-50%);
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Grid Structure for Logo and Form -->
    <div class="row">
      <!-- Logo Section -->
      <div class="col-12 d-flex justify-content-center">
        <div class="legal_logo">
          <img src="Screenshot_2024-10-13_121447-removebg-preview.png" alt="Legal Assistant Logo" class="logo img-fluid">
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Logo Section -->
      <div class="col-12 d-flex justify-content-center">
        <div class="welcome">
          <h1 class="text-white">Welcome to Legal Assistant</h1>
        </div>
      </div>
    </div>

   

    <!-- Registration Form Section -->
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <div class="registration-form border border-3 border-white">
          <div class="form-header">
            <h3>Registration Form</h3>
          </div>
          <form action="" method="POST">
          <div class="mb-3">
              <label for="user" class="form-label">Username <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="user" name="user" placeholder="Enter username">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            </div>
            <div class="mb-3">
              <label for="cpassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter confirm password">
            </div>
            <button type="submit" class="btn btn-register">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
 
<?php

    require_once('config.php');

    if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpassword'])) {
    
      // Sanitize and validate user inputs
      $user = htmlspecialchars(trim($_POST['user']));
      $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
      $pass = $_POST['password'];
      $cpass = $_POST['cpassword'];
      
      // Check if passwords match
      if ($pass !== $cpass) {
        echo "Passwords do not match!";
        exit();
      }
  
      // Hash the password securely
      $hashPass = password_hash($pass, PASSWORD_DEFAULT);
  
      // Prepare the SQL query
      $stmt = $mysqli->prepare("INSERT INTO users (user, email, pass) VALUES (?, ?, ?)");
  
      if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("sss", $user, $email, $hashPass);
  
        // Execute and check for errors
        if (!$stmt->execute()) {
          echo "Error: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
      } else {
        echo "Error preparing the statement: " . $mysqli->error;
      }
    }
  
    // Close the database connection
    $mysqli->close();


?>
