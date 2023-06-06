<?php

// Include necessary files and check if the user is logged in
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/UserManager.php';

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit();
}

// Handle the transfer process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['transfer'])) {
        // Retrieve transfer details from the form
        $recipient = $_POST['recipient'];
        $amount = $_POST['amount'];

        // Establish a database connection
        $db = new DB();
        $conn = $db->getConnection();

        // Get the logged-in user's ID and validate it
        $userID = $_SESSION['user_id'];

        // Retrieve sender's account details from the database
        $userManager = new UserManager($conn);
        $sender = $userManager->getUserById($userID);

        // Check if the sender has enough balance for the transfer
        if ($amount > $sender->getBalance()) {
            $_SESSION['transfer_error'] = "Insufficient balance.";
            header('Location: dashboard.php');
            exit();
        }

        // Retrieve recipient's account details from the database
        $recipientUser = $userManager->getUserById($recipient);

        if (!$recipientUser) {
            $_SESSION['transfer_error'] = "Recipient not found.";
            header('Location: dashboard.php');
            exit();
        }

        // Perform the transfer
        $userManager->transferFunds($sender, $recipientUser, $amount);

        $_SESSION['transfer_success'] = true;
        header('Location: dashboard.php');
        exit();
    }
}

// Redirect to the dashboard if the request method is not POST
header('Location: dashboard.php');
exit();
?>
