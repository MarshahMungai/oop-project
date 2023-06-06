<?php
require_once 'Database.php';
// classes/UserManager.php
class UserManager {
    private $db;

    public $host = 'localhost';
    public $dbname = 'bankdb_oop';
    public $username = 'root';
    public $password = '';

    public function __construct() {
        // Establish database connection or initialize any necessary dependencies
        $this->db = new Database($this->host, $this->dbname, $this->username, $this->password); // Replace with your database connection logic
    }

    public function registerUser($user) {
        // Save the user data to the database
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $params = array($user->getUsername(), $user->getEmail(), $user->getPassword());
        $this->db->execute($sql, $params); // Replace with your database query execution logic
    }

    public function loginUser($username, $password) {
        // Check if the username and password match a user in the database
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $params = array($username, $password);
        $result = $this->db->execute($sql, $params); // Replace with your database query execution logic

        if ($result && $result->rowCount() > 0) {
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        return null;
    }

    public function getUserById($userId) {
        // Retrieve user data from the database based on the provided user ID
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $params = array($userId);
        $result = $this->db->execute($sql, $params); // Replace with your database query execution logic

        if ($result && $result->rowCount() > 0) {
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        return null;
    }

    public function getTransactionsByUserId($userId) {
        // Retrieve transactions associated with the provided user ID
        $sql = "SELECT * FROM transactions WHERE user_id = ?";
        $params = array($userId);
        $result = $this->db->execute($sql, $params); // Replace with your database query execution logic

        if ($result && $result->rowCount() > 0) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        return array();
    }

    // Add other methods for user management, such as getUserById(), updateProfile(), deleteProfile(), etc.
}
