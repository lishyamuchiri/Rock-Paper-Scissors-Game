<?php
// Handle POST data from wallet connection
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $walletAddress = $input['walletAddress'];

    if (!empty($walletAddress)) {
        // Save wallet address (e.g., to a database or session)
        $_SESSION['walletAddress'] = $walletAddress;

        // Respond to the client
        echo json_encode(['success' => true, 'message' => 'Wallet address saved successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid wallet address']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
