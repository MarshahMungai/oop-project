<?php
//Entry point

//check if user logged in or registered
if (isset($_SESSION['user_id'])) {
    
}

// Display company website
include __DIR__ . '/../views/website.php';
?>