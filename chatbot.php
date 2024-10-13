<!DOCTYPE html>
<html lang="en">
<head>
  <title>Legal Assistant Chatbot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #00082f;
      color: white;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .chatbot-container {
      display: flex;
      height: 100%;
    }
    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #001f54;
      padding: 15px;
      border-right: 1px solid #4f4f4f;
    }
    .sidebar h5 {
      color: white;
    }
    .sidebar ul {
      padding-left: 0;
      list-style: none;
    }
    .sidebar ul li {
      margin-bottom: 15px;
    }
    .sidebar ul li a {
      text-decoration: none;
      color: #a5c9ff;
      display: block;
      padding: 10px;
      border-radius: 5px;
      background-color: #001f54;
    }
    .sidebar ul li a:hover {
      background-color: #3d7ff5;
    }
    .new-chat-btn {
      background-color: #3d7ff5;
      color: white;
      border-radius: 5px;
      padding: 10px;
      text-align: center;
      margin-top: 20px;
    }
    /* Main chat area */
    .main-chat {
      flex-grow: 1;
      padding: 30px;
    }
    .main-chat .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .main-chat .header h1 {
      color: #ffffff;
    }
    .main-chat .header img {
      width: 50px;
    }
    /* Examples, Capabilities, Limitations section */
    .examples,
    .capabilities,
    .limitations {
      margin-top: 50px;
    }
    .card {
      background-color: #001f54;
      color: white;
      padding: 15px;
      border-radius: 10px;
      border: none;
    }
    .card p {
      margin: 0;
    }
    .search-bar {
      display: flex;
      align-items: center;
      margin-top: 50px;
    }
    .search-bar input {
      flex-grow: 1;
      padding: 10px;
      border-radius: 20px;
      border: none;
      margin-right: 10px;
    }
    .search-bar button {
      background-color: #3d7ff5;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 50%;
    }
  </style>
</head>
<body>

  <div class="chatbot-container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-info d-flex align-items-center mb-4">
        <img src="user-profile.png" alt="User Avatar" class="img-fluid rounded-circle me-2" width="50">
        <div>
          <h5>User</h5>
          <p>user@gmail.com</p>
        </div>
      </div>

      <ul class="recent-chats">
        <li><a href="#">Previous Chat</a></li>
        <li><a href="#">Previous Chat</a></li>
        <li><a href="#">Previous Chat</a></li>
        <li><a href="#">Previous Chat</a></li>
        <li><a href="#">Previous Chat</a></li>
        <li><a href="#">Previous Chat</a></li>
        <li><a href="#">Previous Chat</a></li>
      </ul>

      <div class="new-chat-btn">
        <a href="#" class="text-white">+ New Chat</a>
      </div>
    </div>

    <!-- Main Chat Area -->
    <div class="main-chat">
      <div class="header d-flex justify-content-between align-items-center">
        <h1>Welcome to Legal Assistant</h1>
        <img src="logo.png" alt="Legal Assistant Logo">
      </div>

      <div class="examples mt-4">
        <h4>Examples</h4>
        <div class="card mb-3">
          <p>"Explain quantum computing in simple terms"</p>
        </div>
        <div class="card mb-3">
          <p>"Got any creative ideas for a 10-year-old's birthday?"</p>
        </div>
        <div class="card mb-3">
          <p>"How do I make an HTTP request in JavaScript?"</p>
        </div>
      </div>

      <div class="capabilities mt-4">
        <h4>Capabilities</h4>
        <div class="card mb-3">
          <p>Remembers what user said earlier in the conversation</p>
        </div>
        <div class="card mb-3">
          <p>Allows user to provide follow-up corrections</p>
        </div>
        <div class="card mb-3">
          <p>"How do I make an HTTP request in JavaScript?"</p>
        </div>
      </div>

      <div class="limitations mt-4">
        <h4>Limitations</h4>
        <div class="card mb-3">
          <p>May occasionally generate incorrect information</p>
        </div>
        <div class="card mb-3">
          <p>May occasionally produce harmful instructions or biased content</p>
        </div>
        <div class="card mb-3">
          <p>Limited knowledge of world and events after 2021</p>
        </div>
      </div>

      <!-- Search bar -->
      <div class="search-bar mt-4">
        <input type="text" placeholder="Search for anything...">
        <button><i class="bi bi-search"></i></button>
      </div>

    </div>
  </div>

</body>
</html>
