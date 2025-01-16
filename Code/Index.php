<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock-Paper-Scissors Blockchain Game</title>
    <link rel="stylesheet" href="blockchain.css">
</head>
<body>
    <div class="container">
        <h1>Rock-Paper-Scissors Blockchain Game</h1>
        <button id="connect-wallet">Connect Core Wallet</button>
        <p id="wallet-status">Wallet not connected</p>

        <form action="game.php" method="POST">
            <label for="player">Player:</label>
            <select name="player" id="player" required>
                <option value="player1">Player 1</option>
                <option value="player2">Player 2</option>
            </select>

            <label for="move">Choose your move:</label>
            <select name="move" id="move" required>
                <option value="rock">Rock</option>
                <option value="paper">Paper</option>
                <option value="scissors">Scissors</option>
            </select>

            <label for="amount">Testnet Token Amount (≤ 1):</label>
            <input type="number" name="amount" id="amount" step="0.01" min="0" max="1" required>

            <input type="hidden" name="walletAddress" id="walletAddress">

            <button type="submit">Submit Move</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/web3/dist/web3.min.js"></script>
    <script>
        const connectWalletButton = document.getElementById('connect-wallet');
        const walletStatus = document.getElementById('wallet-status');
        const walletAddressInput = document.getElementById('walletAddress');

        let web3;

        connectWalletButton.addEventListener('click', async () => {
            if (window.ethereum) {
                web3 = new Web3(window.ethereum);
                try {
                    // Request access to the user's wallet
                    const accounts = await window.ethereum.request({ method: 'eth_requestAccounts' });
                    const walletAddress = accounts[0];

                    // Update UI and hidden input for backend processing
                    walletStatus.textContent = `Connected: ${walletAddress}`;
                    walletAddressInput.value = walletAddress;
                    connectWalletButton.disabled = true;
                } catch (error) {
                    console.error('Wallet connection failed:', error);
                    walletStatus.textContent = 'Wallet connection failed. Please try again.';
                }
            } else {
                alert('Core wallet not detected. Please install a Web3-enabled browser extension.');
            }
        });
    </script>
</body>
</html>
