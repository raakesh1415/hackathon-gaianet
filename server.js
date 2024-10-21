const express = require('express');
const cors = require('cors');
const OpenAI = require('openai'); // Make sure you're using the correct OpenAI library or GaiaNet's specific client SDK

const app = express();
app.use(express.json());
app.use(cors());

const client = new OpenAI({
  baseURL: 'https://pastor.gaianet.network/v1',  // Update to the GaiaNet node's base URL
  apiKey: 'gaia'  // GaiaNet doesn't need an API key, you can leave it blank if the system allows.
});

// Function to call the GaiaNet node
async function callGaiaNet(question) {
  try {
    const response = await client.chat.completions.create({
      model: "Llama-3-8B-Instruct",  // Update to the correct model
      messages: [
        { role: "system", content: "You are a legal assistant. Please provide accurate and relevant legal assistance to the user." },
        { role: "user", content: question }
      ],
      temperature: 0.7,  // Adjust temperature if needed for variability
      max_tokens: 100  // Adjust token limit as necessary
    });
    return response.choices[0].message.content;  // Return the generated response
  } catch (error) {
    console.error('Error in callGaiaNet:', error);
    throw new Error(error.message || error);
  }
}

// Define the '/ask' route
app.post('/ask', async (req, res) => {
  const { question } = req.body;

  try {
    const answer = await callGaiaNet(question);
    res.json({ answer });
  } catch (error) {
    res.status(500).json({ error: 'Failed to get an answer from GaiaNet' });
  }
});

// Start the server
app.listen(4000, () => {
  console.log('Server running on port 4000');
});
