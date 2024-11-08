const express = require('express');
const cors = require('cors');
const OpenAI = require('openai'); // Ensure the correct OpenAI SDK or GaiaNet's specific client SDK is used

const app = express();
app.use(express.json());
app.use(cors());

// Define an array of GaiaNet nodes (this could be expanded or dynamically loaded)
const gaiaNodes = [
  { baseURL: 'https://llama.us.gaianet.network/v1', name: 'Node 1' },
  { baseURL: 'https://phi.us.gaianet.network/v1', name: 'Node 2' },
  { baseURL: 'https://yumchat.us.gaianet.network/v1', name: 'Node 3' },
  { baseURL: 'https://consensus.us.gaianet.network/v1', name: 'Node 4' }
  // { baseURL: 'https://0x39faff7a0809c1431ec8c5888ba6027ed3093e8e.us.gaianet.network/v1', name: 'Node 5' }
];

// Helper function to randomly select a node
function getRandomNode() {
  const randomIndex = Math.floor(Math.random() * gaiaNodes.length);
  return gaiaNodes[randomIndex];
}

// Function to call GaiaNet node
async function callGaiaNet(question) {
  // Select a random node
  const node = getRandomNode();
  const client = new OpenAI({
    baseURL: node.baseURL,
    apiKey: ''  // GaiaNet doesn't need an API key, you can leave it blank if the system allows
  });

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
    console.error('Error in callGaiaNet on node', node.name, ':', error);
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
    // Retry on failure: Try another node in case of an error
    try {
      const answer = await callGaiaNet(question);
      res.json({ answer });
    } catch (retryError) {
      console.error('Retry failed:', retryError);
      res.status(500).json({ error: 'Failed to get an answer from GaiaNet' });
    }
  }
});

// Start the server
app.listen(4000, () => {
  console.log('Server running on port 4000');
});


