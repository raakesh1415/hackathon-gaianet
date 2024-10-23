# Decentralized AI-Powered Legal Assistant

The **Decentralized AI-Powered Legal Assistant** is an innovative solution designed to provide accessible, secure, and affordable legal support. Built on **GaiaNet’s decentralized infrastructure**, this AI assistant offers a range of legal services, including case analysis and legal research. By leveraging decentralized legal databases, it ensures that users receive up-to-date legal precedents while keeping sensitive information private.

Unlike traditional, centralized AI tools, this assistant operates on a decentralized network, allowing individuals and businesses—such as **startups, employees, and law firms**—to gain accurate legal support without high costs or compromising privacy.

## Key Features

- **Case Analysis**: AI-driven analysis of legal cases in text/prompt.
- **Legal Research**: Access to decentralized, up-to-date legal databases.
- **Privacy-First**: Ensures that sensitive legal data remains secure and private.
- **Scalable**: Adaptable to various ecosystems, including legal firms, startups, and enterprise solutions.

## Why Use the Decentralized AI Legal Assistant?

- **Affordable**: Offers legal services without the high fees associated with traditional legal support.
- **Secure**: Built on a decentralized infrastructure, ensuring no centralized entity controls your legal data.
- **Real-World Integration**: Practical for use in modern legal challenges, offering seamless integration into various systems and legal frameworks.

## Scalability & Integration

The AI assistant is designed to be scalable and adaptable. It can integrate with other ecosystems, making it a versatile tool for businesses, legal professionals, and organizations looking for secure, decentralized legal support.

---
## Running The Project

Before getting started, ensure the following are installed on your system:

- **[GaiaNet](https://docs.gaianet.ai/node-guide/quick-start)**
- **[XAMPP](https://www.apachefriends.org/download.html)**
- **[Node.js](https://nodejs.org/en)** with openai library

# Gaianet config 

```
{
  "address": "YOUR_NODE_ID",
  "chat": "https://huggingface.co/second-state/Llama-3.2-3B-Instruct-GGUF/resolve/main/Llama-3.2-3B-Instruct-Q5_K_M.gguf",
  "chat_batch_size": "16",
  "chat_ctx_size": "16384",
  "chat_name": "Llama-3.2-3B-Instruct",
  "description": "GaiaNet node config for legal assistance, providing accurate legal advice and referencing statutes, case law, and legal precedents.",
  "domain": "us.gaianet.network",
  "embedding": "https://huggingface.co/gaianet/Nomic-embed-text-v1.5-Embedding-GGUF/resolve/main/nomic-embed-text-v1.5.f16.gguf",
  "embedding_batch_size": "8192",
  "embedding_collection_name": "legal-collection",
  "embedding_ctx_size": "8192",
  "embedding_name": "Nomic-embed-text-v1.5",
  "llamaedge_port": "8080",
  "prompt_template": "llama-3-chat",
  "qdrant_limit": "1",
  "qdrant_score_threshold": "0.5",
  "rag_policy": "retrieve-legal-precedents",
  "rag_prompt": "You are a legal assistant. Use the information in the following context to provide accurate and relevant legal assistance to the user. Ensure your advice is clear and easy to understand.\n----------------\n",
  "reverse_prompt": "",
  "server_health_url": "https://pulse.gaianet.ai/node-health/YOUR_NODE_ID",
  "server_info_url": "https://pulse.gaianet.ai/node-info/YOUR_NODE_ID",
  "snapshot": "",
  "system_prompt": "You are a legal assistant. Please provide accurate and relevant legal assistance to the user."
}
```

# Starting the Legal Assisstant Website

1. Run the gaianet 
```
gaianet start
```

2. cd into the project directory
```
cd hackathon-gaianet
```
3. Run the server.js

```
node server.js
```

4. Run the sql and apache server in xampp

5. You're done!



