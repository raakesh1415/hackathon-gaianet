const express = require('express');
const cors = require('cors'); // Add this line
const OpenAI = require('openai');

const app = express();
app.use(express.json()); // For parsing JSON data

app.use(cors()); // Add this line

const client = new OpenAI({
  baseURL: 'https://0x828b041a0259839e75606155977b84d87fcaa12d.us.gaianet.network/v1',
  apiKey: 'gaia' // Leave this empty when using GaiaNet
});

async function callOpenAI(question) {
  try {
    const response = await client.chat.completions.create({
      model: "llama-3.2-3B-Instruct-Q5_K_M",
      messages: [
        { role: "system", content: "You are a legal assistant. Please provide accurate and relevant legal assistance to the user." },
        { role: "user", content: question }
      ],
      temperature: 0.7,
      max_tokens: 100
    });
    return response.choices[0].message.content; // Return the answer
  } catch (error) {
    console.error('Error in callOpenAI:', error);
    throw new Error(error.message || error);
  }
}

// Define the '/ask' route
app.post('/ask', async (req, res) => {
  const { question } = req.body;

  try {
    const answer = await callOpenAI(question);
    res.json({ answer });
  } catch (error) {
    res.status(500).json({ error: 'Failed to get an answer from Gaia' });
  }
});

// Start the server
app.listen(4000, () => {
  console.log('Server running on port 4000');
});
