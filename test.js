const express = require('express');
const axios = require('axios');

const app = express();
const PORT = 3000;

// Middleware
app.use(express.json()); // Body parser for JSON input
app.use(express.static('public')); // Serve static files from the public directory

// Endpoint to handle Gaia Net requests
app.post('/api/chat', async (req, res) => {
  const userMessage = req.body.message;
  if (!userMessage) {
    return res.status(400).json({ error: 'Message content is required.' });
  }
  
  try {
    const response = await axios.post('https://www.gaianet.ai/chat?subdomain=0x828b041a0259839e75606155977b84d87fcaa12d.us.gaianet.network', {
      model: "llama-3.1-8b-instruct",
      messages: [
        { role: "system", content: "You are a mathematician." },
        { role: "user", content: userMessage }
      ],
      temperature: 0.7,
      max_tokens: 100
    });

    // Handle Gaia response
    const reply = response.data.choices[0].message.content;
    res.json({ reply });
  } catch (error) {
    console.error('Error:', error.message || error);
    res.status(500).json({ error: 'An error occurred while processing your request.' });
  }
});

// Start the server
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});
