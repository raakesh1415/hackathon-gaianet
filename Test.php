<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaia Net Chat Interface</title>
    <script>
        async function sendMessage() {
            const userMessage = document.getElementById('userMessage').value;
            
            if (!userMessage) {
                document.getElementById('response').innerText = "Please enter a message!";
                return;
            }

            try {
                const response = await fetch('/api/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ message: userMessage })
                });

                const data = await response.json();
                document.getElementById('response').innerText = data.reply || data.error;
            } catch (error) {
                console.error('Error:', error);
                document.getElementById('response').innerText = 'An error occurred. Please try again.';
            }
        }
    </script>
</head>
<body>
    <h1>Chat with Gaia Net</h1>
    <input type="text" id="userMessage" placeholder="Ask a question..." required>
    <button onclick="sendMessage()">Send</button>
    <h2>Response:</h2>
    <p id="response"></p>
</body>
</html>
