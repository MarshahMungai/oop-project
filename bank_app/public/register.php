<?php
// public/register.php

// Include necessary files and check if the user is already logged in
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/UserManager.php';

session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to the dashboard if the user is already logged in
    header('Location: dashboard.php');
    exit();
}

// Handle user registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        // Retrieve registration data from the form
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo $username. " ". $email. " ". $password;
        // Create a new user instance
        $user = new User($username, $email, $password);

        // Create a new user manager instance
        $userManager = new UserManager();

        // Register the user
        $userManager->registerUser($user);

        // Set a session variable to indicate successful registration
        $_SESSION['registration_completed'] = true;

        // Redirect to the login page after successful registration
        header('Location: login.php');
        exit();
    }
}

// Render the registration page
include __DIR__ . '/../views/register.php';
