<?php
session_start();

// Ensure both moves are available
if (!isset($_SESSION['player1']) || !isset($_SESSION['player2'])) {
    die("Both players must make their moves.");
}

$player1Move = $_SESSION['player1'];
$player2Move = $_SESSION['player2'];

// Determine the winner
function determineWinner($move1, $move2) {
    if ($move1 === $move2) return "Draw";
    if (($move1 === 'rock' && $move2 === 'scissors') || 
        ($move1 === 'scissors' && $move2 === 'paper') || 
        ($move1 === 'paper' && $move2 === 'rock')) {
        return "Player 1 Wins!";
    }
    return "Player 2 Wins!";
}

$result = determineWinner($player1Move, $player2Move);

// Clear session
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Game Results</h1>
    <p>Player 1 chose: <?= htmlspecialchars($player1Move) ?></p>
    <p>Player 2 chose: <?= htmlspecialchars($player2Move) ?></p>
    <h2><?= $result ?></h2>

    <h3>Submitting results to the blockchain...</h3>
    <script src="https://cdn.jsdelivr.net/npm/web3/dist/web3.min.js"></script>
    <script>
        const player1Move = "<?= $player1Move ?>";
        const player2Move = "<?= $player2Move ?>";
        const result = "<?= $result ?>";

        // Blockchain interaction logic
        const web3 = new Web3(Web3.givenProvider || "http://localhost:8545");
        const contractAddress = "YOUR_CONTRACT_ADDRESS";
        const contractABI = []; // Replace with your contract's ABI

        const contract = new web3.eth.Contract(contractABI, contractAddress);

        async function sendResult() {
            const accounts = await web3.eth.requestAccounts();
            const from = accounts[0];

            await contract.methods.submitGameResult(player1Move, player2Move, result)
                .send({ from })
                .on("receipt", (receipt) => {
                    console.log("Result submitted:", receipt);
                });
        }

        sendResult();
    </script>
</body>
</html>
