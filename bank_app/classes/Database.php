<?php
class Database {
    private $db;

    public function __construct($host, $dbname, $username, $password) {
        try {
            // Create a new PDO instance for database connection
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

            // Set PDO error mode to exception for better error handling
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle the database connection error
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function execute($sql, $params = []) {
        try {
            $statement = $this->db->prepare($sql);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            // Handle the query execution error
            die('Database query failed: ' . $e->getMessage());
        }
    }

    // Add additional methods for fetching data, transactions, etc.
}
