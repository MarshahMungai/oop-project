<?php
// Include UserManager class
require_once '../classes/UserManager.php';

session_start();

// Retrieve sender's user ID from the session
$senderId = $_SESSION['user_id'];

// Retrieve form inputs
$recipientAccount = $_POST['recipient'];
$transferAmount = $_POST['amount'];

// Create an instance of UserManager
$userManager = new UserManager();

// Retrieve sender's account balance from the database
$senderAccountNumber = $_SESSION['account_number']; // Assuming you have the sender's account number stored in the session
$senderBalance = $userManager->getAccountBalance($senderAccountNumber);

// Verify if sender has sufficient funds
if ($senderBalance < $transferAmount) {
    // Display error message to the user
    echo "Insufficient funds. Transfer cannot be completed.";
    exit();
}

// Get recipient's user ID by account number
$recipientId = $userManager->getUserIdByAccountNumber($recipientAccount);

if (!$recipientId) {
    // Display error message if recipient account does not exist
    echo "Recipient account not found.";
    exit();
}

// Retrieve recipient's account balance from the database
$recipientBalance = $userManager->getAccountBalance($recipientAccount);

// Update sender's account balance
$newSenderBalance = $senderBalance - $transferAmount;
$userManager->updateAccountBalance($senderAccountNumber, $newSenderBalance);

// Update recipient's account balance
$newRecipientBalance = $recipientBalance + $transferAmount;
$userManager->updateAccountBalance($recipientAccount, $newRecipientBalance);

// Insert transaction details into the database
$description = "Funds Transfer";
$transactionDate = date("Y-m-d H:i:s");
$userManager->insertTransaction($senderId, $recipientId, $transferAmount, $description, $transactionDate);

// Display success message to the user
echo "Transfer completed successfully.";

// Redirect back to the transfer form or any other desired page
header("Location: dashboard.php");
exit();
?>
