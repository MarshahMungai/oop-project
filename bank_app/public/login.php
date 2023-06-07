<?php
// public/login.php

require_once '../config/db.php';
require_once '../classes/UserManager.php';

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

$username = '';
$password = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userManager = new UserManager();

    $user = $userManager->loginUser($username, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['account_number'] = $user['account_number'];

        header('Location: dashboard.php');
        exit();
    } else {
        $error = 'Invalid username or password. Please try again.';
    }
}

// Include the login view template
include '../views/login.php';