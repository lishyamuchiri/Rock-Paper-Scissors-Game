# **Project Title: Rock-Paper-Scissors Game**

## **Description**  
A decentralized **Rock-Paper-Scissors Game** built on the Avalanche blockchain. This project combines the power of Solidity for smart contracts and PHP for backend integration, offering players a secure, transparent, and tamper-proof gaming experience. Players can join a game, make moves, and determine the winner in a fair and seamless manner.  

### **Key Features**

1. **Decentralized Gameplay:**  
   - The game operates on a Solidity smart contract deployed on the Avalanche blockchain, ensuring no central authority.

2. **Smart Contract Mechanics:**  
   - Key functionalities include `joinGame`, `makeMove`, and `checkWinner`, with all interactions processed transparently on-chain.

3. **PHP and Solidity Integration:**  
   - The backend, powered by PHP, communicates with the smart contract using **web3.php**, bridging blockchain functionality with user interaction.

4. **Transparency & Fairness:**  
   - All gameplay data is stored immutably on the blockchain to ensure fairness.

5. **Quick Deployment & Testing:**  
   - The contract can be deployed and tested efficiently using Remix IDE.

6. **Instant Winner Validation:**  
   - Results are computed on-chain using classic Rock-Paper-Scissors rules, ensuring accuracy and impartiality.

---

## **Gameplay Instructions**

### **1. Join the Game**
- Players register for a session using the `joinGame()` function. Each session accommodates two players.

### **2. Make Your Move**
- Players submit moves encoded as:
  - `1` = Rock
  - `2` = Paper
  - `3` = Scissors
- Moves are submitted through the `makeMove(uint8 _move)` function securely.

### **3. Determine the Winner**
- The `checkWinner()` function determines the outcome based on the submitted moves:
  - **Draw:** Both players made the same move.
  - **Player 1 Wins:** Player 1's move beats Player 2.
  - **Player 2 Wins:** Player 2's move beats Player 1.

---

## **PHP Integration Instructions**

1. Install the **web3.php** library using Composer:  
   ```bash
   composer require sc0vu/web3.php
   ```

2. Set up the PHP backend with:
   - Avalanche RPC URL (C-Chain endpoint).
   - Smart contract ABI and address.

3. Use PHP to call functions like `joinGame` and `makeMove`. Example:
   ```php
   $contract->at($contractAddress)->send(
       'joinGame', 
       [], 
       [
           'from' => '0xYourWalletAddress', 
           'gas' => '3000000'
       ],
       function ($err, $result) {
           if ($err !== null) {
               echo "Error: " . $err->getMessage();
               return;
           }
           echo "Transaction Successful: " . $result;
       }
   );
   ```

---

## **Tools and Technologies**

1. **Remix IDE**: For developing, testing, and deploying the Solidity smart contract.  
2. **Solidity**: Programming language for the game logic.
3. **PHP (web3.php)**: Backend interaction with the smart contract.  
4. **Avalanche Blockchain**: High-speed, low-cost blockchain for deployment.  

---

## **How to Run the Project**

1. **Deploy the Smart Contract:**
   - Write and deploy the contract using Remix on the Avalanche blockchain.

2. **Set Up Backend:**
   - Use PHP with **web3.php** to interact with the deployed contract.

3. **Start Playing:**
   - Players can use the PHP-powered interface to join games, make moves, and view results.

  

---
