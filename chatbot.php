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
      background-color: #1E90FF;
      /* DodgerBlue */
      padding: 15px;
      border-radius: 50%;
      display: inline-block;
      margin-bottom: 10px;
    }

    .fa-icon {
      font-size: 2.0rem;
      /* Adjust this for bigger icons */
      color: white;
    }

    /* Customized text box */
    .custom-box {
      background-color: #262c45;
      /* Grey background */
      color: white;
      /* White text */
      padding: 10px;
      /* Padding inside the box */
      border-radius: 10px;
      /* Rounded corners */
      margin-top: 20px;
      /* Add some margin on top */
    }

  .answer-container {
    background-color:#2f3146; /* White background */
    padding: 20px;           /* Add some padding */
    border-radius: 15px;     /* Curved corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Adds a slight shadow for depth */
    margin: 20px auto;       /* Center the container */
    max-width: 1000px;        /* Limit the width */
    text-align: center;      /* Center the content */
  }

  #answer {
    color: white;             /* Text color for the answer */
    font-size: 18px;         /* Adjust font size */
  }



    /* Search bar styles */


    .search-bar {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }

    .search-container {
      position: fixed;
      /* Fixes the position to the viewport */
      bottom: 0;
      /* Aligns to the bottom */
      left: 0;
      /* Aligns to the left */
      width: 100%;
      /* Full width */
      background-color: #00082f;
      /* Background color */
      padding: 20px 0;
      /* Padding for the container */
      display: flex;
      /* Enables flexbox */
      justify-content: center;
      /* Centers content horizontally */
      z-index: 1000;
      /* Ensures it stays on top of other elements */
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

    .answer-container {
      background-color: #262c45;
      padding: 20px;
      border-radius: 10px;
      width: 100%;
      max-width: 600px;
      color: white;
      margin: 20px auto;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    #answer {
      text-align: center;
      font-size: 1.2rem;
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
          <h1 class="m-10 text-white">Welcome to Legal Assistant</h1>
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

    <!-- Example text with customized background and text color
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
    </div> -->

    <div class="answer-container">
      <h2 class="text-white">Answer</h2>
      <p id="answer">Waiting for answer...</p>
    </div>


    <div class="row search-container" style="width: 100%; background-color: #00082f;">
      <div class="col-12 justify-content-center">
        <div class="search-bar">
          <input type="text" id="question" class="search-input" placeholder="search for anything">
          <button type="submit" class="search-btn" id="submitQuestion">
            <i class="fa-solid fa-paper-plane"></i>
          </button>
        </div>
      </div>
    </div>



  </div>
</body>

<script>

document.getElementById('submitBtn').addEventListener('click', async function(event) {
  event.preventDefault(); // Prevent page reload
  const question = document.getElementById('question').value; // Get the question from the input

  try {
    const response = await fetch('http://localhost:4000/ask', { // Sending the request to Node.js
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ question: question }) // Send question to the server
    });

    if (!response.ok) {
      throw new Error('Failed to fetch the answer');
    }

    const result = await response.json(); // Parse the JSON response from the server
    document.getElementById('answer').textContent = result.answer; // Display the answer
  } catch (error) {
    console.error('Error fetching answer:', error);
    document.getElementById('answer').textContent = 'Error fetching answer: ' + error.message;
  }
});

</script>

</html>


<script>
  document.getElementById('submitQuestion').addEventListener('click', async function(event) {
    event.preventDefault(); // Prevent form reload (if wrapped in a form tag)
    const question = document.getElementById('question').value;

    if (!question) {
      document.getElementById('answer').textContent = 'Please enter a question.';
      return; // Exit if there's no question
    }

    try {
      const response = await fetch('http://localhost:4000/ask', { // Use full URL with host and port
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          question: question
        }) // Send the question to the backend
      });

      if (!response.ok) {
        throw new Error('Failed to fetch the answer');
      }

      const result = await response.json(); // Parse the JSON response from the backend
      document.getElementById('answer').textContent = result.answer || 'No answer available'; // Display the answer
    } catch (error) {
      console.error('Error fetching answer:', error);
      document.getElementById('answer').textContent = 'Error fetching answer: ' + error.message;
    }
  });
</script>