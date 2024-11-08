// server.js
const express = require('express');
const cors = require('cors');
const OpenAI = require('openai'); // Ensure you're using the correct OpenAI SDK or GaiaNet's specific client SDK

const app = express();
app.use(express.json());
app.use(cors());

// Array of GaiaNet nodes to allow decentralized requests
const gaiaNodes = [
  { baseURL: 'https://llama.us.gaianet.network/v1', name: 'Node 1' },
  { baseURL: 'https://phi.us.gaianet.network/v1', name: 'Node 2' },
  { baseURL: 'https://yumchat.us.gaianet.network/v1', name: 'Node 3' },
  { baseURL: 'https://consensus.us.gaianet.network/v1', name: 'Node 4' }
  // { baseURL: 'https://0x39faff7a0809c1431ec8c5888ba6027ed3093e8e.us.gaianet.network/v1', name: 'Node 5' }
];

// Function to randomly select a GaiaNet node
function getRandomNode() {
  const randomIndex = Math.floor(Math.random() * gaiaNodes.length);
  return gaiaNodes[randomIndex];
}

// Function to call a GaiaNet node and handle potential errors
async function callGaiaNet(question) {
  let node = getRandomNode();  // Start with a random node

  const client = new OpenAI({
    baseURL: node.baseURL,
    apiKey: ''  // GaiaNet might not require an API key, so this could be left blank
  });

  try {
    const response = await client.chat.completions.create({
      model: "Llama-3-8B-Instruct",  // Adjust to the correct model name if needed
      messages: [
        { role: "system", content: "You are a legal assistant. Please provide accurate and relevant legal assistance to the user." },
        { role: "user", content: question }
      ],
      temperature: 0.7,  // Adjust temperature for variability if desired
      max_tokens: 100  // Adjust token limit as necessary
    });
    return response.choices[0].message.content;
  } catch (error) {
    console.error(`Error on ${node.name}:`, error);
    throw error;
  }
}

// Define the '/ask' route with retry functionality
app.post('/ask', async (req, res) => {
  const { question } = req.body;
  let retries = 3;  // Number of retries in case of failure
  let answer;

  while (retries > 0) {
    try {
      answer = await callGaiaNet(question);
      break;  // Exit the loop if successful
    } catch (error) {
      console.log(`Retrying with a different node. Attempts left: ${retries - 1}`);
      retries -= 1;
      if (retries === 0) {
        return res.status(500).json({ error: 'Failed to get an answer from GaiaNet after multiple attempts.' });
      }
    }
  }

  res.json({ answer });
});

// Start the server
app.listen(4000, () => {
  console.log('Server running on port 4000');
});
