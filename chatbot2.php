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

/* Move conversation container up */
.conversation-container {
  max-width: 1000px;
  width: 100%;
  margin: 20px auto;
  margin-top: -50px; /* Adjust this value to move it up */
}

.question-box, .answer-box {
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

.question-box p, .answer-box p {
  margin: 0;
}

/* Input Field & Submit Button */
.search-container {
  position: fixed;
  bottom: 0;
  width: 100%;
  background-color: #00082f;
  padding: 20px;
  display: flex;
  justify-content: center;
  z-index: 1000;
}

.search-input {
  background-color: #2f3146;
  border: none;
  padding: 10px 15px;
  border-radius: 30px;
  width: 450px; /* Increased width */
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
    <!-- Logo Section -->
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <div class="legal_logo">
          <img src="Screenshot_2024-10-13_121447-removebg-preview.png" alt="Legal Assistant Logo" class="logo img-fluid">
        </div>
      </div>
    </div>

    <!-- Conversation Section -->
    <div class="conversation-container d-flex flex-column" id="conversationContainer">
      <div class="question-box" id="questionBox">
        <p id="displayQuestion"></p> <!-- Removed default text -->
      </div>
      <div class="answer-box" id="answerBox">
        <p id="answer"></p> <!-- Removed default text -->
      </div>
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
      const question = document.getElementById('question').value; // Get the question from the input

      if (!question.trim()) {
        alert('Please type a question'); // Alert if input is empty
        return;
      }

      // Display the question and answer sections after the button is clicked
      const conversationContainer = document.getElementById('conversationContainer');
      conversationContainer.style.display = 'flex';

      // Display the question on the right side
      document.getElementById('displayQuestion').textContent = question;
      document.getElementById('questionBox').style.display = 'block';

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
        document.getElementById('answer').textContent = result.answer; // Display the answer below the question
      } catch (error) {
        console.error('Error fetching answer:', error);
        document.getElementById('answer').textContent = 'Error fetching answer: ' + error.message;
      }
    });
  </script>
</body>

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