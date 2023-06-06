<?php
// config/db.php

// Database connection parameters
$host = 'localhost';
$dbname = 'bankdb_oop';
$username = 'root';
$password = '';

try {
    // Create a new PDO instance for database connection
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Set PDO error mode to exception for better error handling
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Additional database configuration options, if needed
    // $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // Return the database connection
    return $db;
} catch (PDOException $e) {
    // Display an error message on connection failure
    die('Database connection failed: ' . $e->getMessage());
}
