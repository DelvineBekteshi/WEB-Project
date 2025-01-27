<?php

class Useri {
    private $conn;
    private $table_name = 'useri'; // Updated table name to match your database

    public function __construct($db) {
        $this->conn = $db;
    }

    // Register user
    public function register($email, $password): bool {
        $query = "INSERT INTO {$this->table_name} (email, password) VALUES(:email, :password)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));

        // Execute query and return result
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Log in user
    public function logIn($email, $password): bool {
        $query = "SELECT id, email, password FROM {$this->table_name} WHERE email = :email";
        $stmt = $this->conn->prepare($query);

        // Bind parameter
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if user exists
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify password
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['useri_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                return true;
            }
        }
        return false;
    }
}
?>
