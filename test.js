const OpenAI = require('openai');

const client = new OpenAI({
  baseURL: 'https://0xeeb1f7a560e010552d0ecc4f674efff7f73279f8.us.gaianet.network/v1',
  apiKey: 'gaia' // Leave this empty when using GaiaNet
});

async function callOpenAI() {
    try {
      const response = await client.chat.completions.create({
        model: "llama-3.1-8b-instruct",
        messages: [
          { role: "system", content: "You are a mathematician." },
          { role: "user", content: "What is  ?" }
        ],
        temperature: 0.7,
        max_tokens: 100 // Try reducing the token count for a quicker response
      });
  
      console.log(response.choices[0].message.content);
    } catch (error) {
      console.error('Error:', error.message || error);
    }
  }
  
  //Usage
  callOpenAI();
