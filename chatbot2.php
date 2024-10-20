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
      color: white;
      font-family: 'Arial', sans-serif;
    }

    .logo {
      max-width: 250px;
    }

    .legal_logo {
      position: absolute;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
    }

    .conversation-container {
      max-width: 1000px;
      width: 100%;
      margin: 20px auto;
      margin-top: -50px;
      display: flex;
      flex-direction: column;
    }

    .question-box,
    .answer-box {
      background-color: #262c45;
      padding: 15px;
      border-radius: 15px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.4);
      margin: 10px 0;
      color: #fff;
      max-width: 600px;
      display: inline-block;
      word-wrap: break-word;
    }

    .question-box {
      align-self: flex-end;
      margin-left: auto;
      background-color: #1E90FF;
      color: white;
    }

    .answer-box {
      align-self: flex-start;
      margin-right: auto;
    }

    .question-box p,
    .answer-box p {
      margin: 0;
    }

    .search-container {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #00082f;
      padding: 20px;
      display: flex;
      justify-content: center;
      z-index: 1000;
      left: 2px;
    }

    .search-input {
      background-color: #2f3146;
      border: none;
      padding: 10px 15px;
      border-radius: 30px;
      width: 600px;
      /* Increased the width */
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
      padding: 10px 20px;
      /* Added padding for better spacing */
      border-radius: 50px;
      cursor: pointer;
      margin-left: 10px;
      /* Added margin for spacing */
    }

    .search-btn i {
      color: white;
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- Logo Section -->
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <div class="legal_logo">
          <img src="Screenshot_2024-10-13_121447-removebg-preview.png" alt="Legal Assistant Logo" class="logo img-fluid">
        </div>
      </div>
    </div>

    <!-- Conversation Section -->
    <div class="conversation-container" id="conversationContainer">
      <!-- Questions and Answers will be appended here -->
    </div>

    <!-- Search Bar Section -->
    <div class="search-container">
      <input type="text" id="question" class="search-input" placeholder="Type your question here...">
      <button type="submit" class="search-btn" id="submitBtn">
        <i class="fa-solid fa-paper-plane"></i>
      </button>
    </div>
  </div>

  <script>
    document.getElementById('submitBtn').addEventListener('click', async function(event) {

      event.preventDefault(); // Prevent page reload
      const question = document.getElementById('question').value.trim(); // Get the question from the input

      if (!question) {
        alert('Please type a question'); // Alert if input is empty
        return;
      }

      const conversationContainer = document.getElementById('conversationContainer');

      // Create new question box element
      const questionBox = document.createElement('div');
      questionBox.className = 'question-box';
      const questionText = document.createElement('p');
      questionText.textContent = question;
      questionBox.appendChild(questionText);
      conversationContainer.appendChild(questionBox); // Append question to conversation container

      // Clear input after submission
      document.getElementById('question').value = '';

      try {
        const response = await fetch('http://localhost:4000/ask', { // Sending the request to Node.js
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            question: question
          }) // Send question to the server
        });

        if (!response.ok) {
          throw new Error('Failed to fetch the answer');
        }

        const result = await response.json(); // Parse the JSON response from the server

        // Create new answer box element
        const answerBox = document.createElement('div');
        answerBox.className = 'answer-box';
        const answerText = document.createElement('p');
        answerText.textContent = result.answer;
        answerBox.appendChild(answerText);
        conversationContainer.appendChild(answerBox); // Append answer to conversation container
      } catch (error) {
        console.error('Error fetching answer:', error);

        // Display error in the answer box
        const answerBox = document.createElement('div');
        answerBox.className = 'answer-box';
        const answerText = document.createElement('p');
        answerText.textContent = 'Error fetching answer: ' + error.message;
        answerBox.appendChild(answerText);
        conversationContainer.appendChild(answerBox); // Append error answer to conversation container
      }
    });
  </script>
</body>

</html>