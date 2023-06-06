<?php
// public/dashboard.php

require_once '../config/db.php';
require_once '../classes/UserManager.php';

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch user data from the database or any other necessary logic
$userManager = new UserManager();
$user = $userManager->getUserById($_SESSION['user_id']);

// Pass necessary data to the view
$accountNumber = $user['account_number'];
$balance = $user['balance'];
$transactions = $userManager->getTransactionsByUserId($_SESSION['user_id']);

// Include the dashboard view template
include '../views/dashboard.php';
