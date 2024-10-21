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
      margin: 0;
      display: flex;
      flex-direction: column;
      color: white;
      font-family: 'Arial', sans-serif;
      overflow: hidden;
    }

    header {
      background-color: #00082f;
      padding: 10px;
      text-align: center;
    }

    .logo {
      max-width: 250px;
    }

    main {
      flex-grow: 1;
      overflow-y: auto;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding-bottom: 100px;
      position: relative;
    }

    /* Hide scrollbar but keep functionality */
    main::-webkit-scrollbar {
      display: none;
    }

    main {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    .conversation-container {
      max-width: 1000px;
      width: 100%;
      margin: 20px;
      display: flex;
      flex-direction: column;
      position: relative;
      z-index: 1;
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
      position: relative;
    }

    .question-box {
      align-self: flex-end;
      margin-left: auto;
      background-color: #1E90FF;
    }

    .answer-box {
      align-self: flex-start;
      margin-right: auto;
    }

    .question-box p,
    .answer-box p {
      margin: 0;
    }

    .answer-box ul {
      padding-left: 20px;
      margin-top: 10px;
      list-style-type: disc;
    }

    .answer-box ul li {
      margin-bottom: 5px;
    }

    /* Adding timestamps */
    .timestamp {
      font-size: 0.8rem;
      color: #deeefa;
      margin-top: 8px;
      text-align: right;
    }

    /* Icons for the user question */
    .user-icon {
      position: absolute;
      left: -40px;
      top: 0;
    }

    .question-box::before {
      content: "\f007"; /* FontAwesome user icon */
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
      color: #1E90FF;
      position: absolute;
      left: -35px;
      top: 0;
    }

    .answer-box::before {
      content: "\f2db"; /* FontAwesome chat icon */
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
      color: #1E90FF;
      position: absolute;
      left: -35px;
      top: 0;
    }

    footer {
      background-color: #00082f;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 2;
    }

    .search-input {
      background-color: #2f3146;
      border: none;
      padding: 10px 15px;
      border-radius: 30px;
      width: 600px;
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
      border-radius: 50px;
      cursor: pointer;
      margin-left: 10px;
    }

    .search-btn i {
      color: white;
    }

    /* Hover effect */
    .answer-box:hover,
    .question-box:hover {
      box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
    }

    .answer-box p {
      margin-top: 10px; /* Add space above paragraphs */
    }

    .answer-box ul {
      margin-top: 10px; /* Add space above lists */
    }

    .answer-box ul li {
      margin-top: 5px; /* Space between list items */
    }
  </style>
</head>

<body>
  <!-- Header Section (Logo) -->
  <header>
    <img src="Screenshot_2024-10-13_121447-removebg-preview.png" alt="Legal Assistant Logo" class="logo">
  </header>

  <!-- Main Section (Conversation) -->
  <main>
    <div class="conversation-container" id="conversationContainer">
      <!-- Questions and Answers will be appended here -->
    </div>
  </main>

  <!-- Footer Section (Search Bar) -->
  <footer>
    <input type="text" id="question" class="search-input" placeholder="Type your question here...">
    <button type="submit" class="search-btn" id="submitBtn">
      <i class="fa-solid fa-paper-plane"></i>
    </button>
  </footer>

  <script>
    document.getElementById('submitBtn').addEventListener('click', async function (event) {
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

      // Add timestamp for the question
      const questionTimestamp = document.createElement('div');
      questionTimestamp.className = 'timestamp';
      questionTimestamp.textContent = new Date().toLocaleTimeString();
      questionBox.appendChild(questionTimestamp);

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

        // Check if the result contains formatted content like paragraphs or lists
        if (Array.isArray(result.answer)) {
          // If the response is an array, assume it's a list of answers or items (e.g., legal codes)
          const list = document.createElement('ul'); // Create an unordered list
          result.answer.forEach((item) => {
            const listItem = document.createElement('li');
            listItem.innerHTML = item.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>'); // Convert **text** to <strong>text</strong>
            list.appendChild(listItem); // Append each item to the list
          });
          answerBox.appendChild(list); // Append the list to the answer box
        } else if (typeof result.answer === 'string') {
          // If it's a single string, handle it as regular text or paragraphs
          const paragraphs = result.answer.split('\n');
          paragraphs.forEach((paragraph) => {
            const answerParagraph = document.createElement('p');
            answerParagraph.innerHTML = paragraph.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>'); // Convert **text** to <strong>text</strong>
            answerBox.appendChild(answerParagraph);
          });
        }

        // Add timestamp for the answer
        const answerTimestamp = document.createElement('div');
        answerTimestamp.className = 'timestamp';
        answerTimestamp.textContent = new Date().toLocaleTimeString();
        answerBox.appendChild(answerTimestamp);

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

      // Scroll to the bottom of the conversation container with smooth scrolling
      conversationContainer.scrollTo({
        top: conversationContainer.scrollHeight,
        behavior: 'smooth'
      });
    });
  </script>
</body>

</html>
