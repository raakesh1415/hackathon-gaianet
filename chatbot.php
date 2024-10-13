<!DOCTYPE html>
<html lang="en">
<head>
  <title>Legal Assistant</title>
  <link rel="icon" href="logo.png" type="image/x-icon" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/fab8eeb652.js" crossorigin="anonymous"></script>
  <style>
    body {
      background-color: #00082f;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }
    .text-light {
      color: #9ca2ad !important;
    }
    .logo {
      max-width: 250px;
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
    .ex {
      color: white;
    }
    /* Icon styles */
    .icon-bg {
      background-color: #1E90FF; /* DodgerBlue */
      padding: 15px;
      border-radius: 50%;
      display: inline-block;
      margin-bottom: 10px;
    }
    .fa-icon {
      font-size: 2.0rem; /* Adjust this for bigger icons */
      color: white;
    }
    /* Customized text box */
    .custom-box {
      background-color: #262c45; /* Grey background */
      color: white;              /* White text */
      padding: 10px;             /* Padding inside the box */
      border-radius: 10px;       /* Rounded corners */
      margin-top: 20px;          /* Add some margin on top */
    }
    /* Search bar styles */
    .search-container {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #00082f;
        padding: 20px 0;
        display: flex;
        justify-content: center;  /* Center horizontally */
    }

    .search-bar {
        display: flex;
        align-items: center;
    }

    .search-input {
        background-color: #2f3146;
        border: none;
        padding: 10px 15px;
        border-radius: 30px;
        width: 400px;
        color: #9ca2ad;
        font-size: 1rem;
        outline: none;
    }

    .search-input::placeholder {
        color: #9ca2ad;
    }

    .search-btn {
        background-color: #1E90FF;
        border: none;
        padding: 10px;
        margin-left: -50px;
        border-radius: 50%;
        cursor: pointer;
    }

    .search-btn i {
        color: white;
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
    <div class="row d-flex justify-content-center">
      <div class="col-4 text-center ex raised">
        <span class="icon-bg">
          <i class="fa-regular fa-lightbulb fa-icon"></i>
        </span>
        <h3>Examples</h3>
      </div>
      <div class="col-4 text-center cap ex raised">
        <span class="icon-bg">
          <i class="fa-solid fa-bolt fa-icon"></i>
        </span>
        <h3>Capabilities</h3>
      </div>
      <div class="col-4 text-center ex raised">
        <span class="icon-bg">
          <i class="fa-solid fa-triangle-exclamation fa-icon"></i>
        </span>
        <h3>Limitations</h3>
      </div>
    </div>

    <!-- Example text with customized background and text color -->
    <div class="row d-flex justify-content-center">
      <div class="col-4 text-center">
        <div class="custom-box">
          <h5>"Explain about the laws in Malaysia in simple terms"</h5>
        </div>
      </div>
      <div class="col-4 text-center">
        <div class="custom-box">
          <h5>"Explain about the laws in Malaysia in simple terms"</h5>
        </div>
      </div>
      <div class="col-4 text-center">
        <div class="custom-box">
          <h5>"Explain about the laws in Malaysia in simple terms"</h5>
        </div>
      </div>
    </div>

    <!-- Example text with customized background and text color -->
    <div class="row d-flex justify-content-center">
      <div class="col-4 text-center">
        <div class="custom-box">
          <h5>"Explain about the laws in Malaysia in simple terms"</h5>
        </div>
      </div>
      <div class="col-4 text-center">
        <div class="custom-box">
          <h5>"Explain about the laws in Malaysia in simple terms"</h5>
        </div>
      </div>
      <div class="col-4 text-center">
        <div class="custom-box">
          <h5>"Explain about the laws in Malaysia in simple terms"</h5>
        </div>
      </div>
    </div>

    <!-- Example text with customized background and text color -->
    <div class="row d-flex justify-content-center">
      <div class="col-4 text-center">
        <div class="custom-box">
          <h5>"Explain about the laws in Malaysia in simple terms"</h5>
        </div>
      </div>
      <div class="col-4 text-center">
        <div class="custom-box">
          <h5>"Explain about the laws in Malaysia in simple terms"</h5>
        </div>
      </div>
      <div class="col-4 text-center">
        <div class="custom-box">
          <h5>"Explain about the laws in Malaysia in simple terms"</h5>
        </div>
      </div>
    </div>

    <div class="row search-container">
        <div class="col-12 search-bar">
            <input type="text" class="search-input" placeholder="search for anything">
            <button class="search-btn"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </div>

  </div>
</body>
</html>
