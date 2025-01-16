async function connectWallet() {
    if (window.ethereum) {
        try {
            const accounts = await window.ethereum.request({ method: 'eth_requestAccounts' });
            const walletAddress = accounts[0];

            document.getElementById('wallet-status').innerText = `Connected: ${walletAddress}`;

            // Send wallet address to PHP server
            fetch('save_wallet.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ walletAddress })
            })
            .then(response => response.json())
            .then(data => console.log('Wallet address saved:', data))
            .catch(error => console.error('Error saving wallet address:', error));
        } catch (error) {
            console.error("User rejected the connection", error);
            document.getElementById('wallet-status').innerText = "Connection rejected";
        }
    } else {
        alert('Please install a wallet extension like MetaMask or use a wallet-compatible browser!');
    }
}
