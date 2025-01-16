<?php
session_start();

// Capture player, move, and wallet address
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $player = $_POST['player'];
    $move = $_POST['move'];
    $amount = $_POST['amount'];
    $walletAddress = $_POST['walletAddress'];

    if (empty($walletAddress)) {
        die("Wallet address not provided. Please connect your wallet.");
    }

    // Store player moves and wallet addresses
    $_SESSION[$player] = [
        'move' => $move,
        'amount' => $amount,
        'wallet' => $walletAddress
    ];

    // Check if both players have made their moves
    if (isset($_SESSION['player1']) && isset($_SESSION['player2'])) {
        // Redirect to blockchain interaction
        header('Location: blockchain.php');
        exit();
    } else {
        echo "<p>Waiting for the second player to make their move...</p>";
        echo '<a href="index.php">Go Back</a>';
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
