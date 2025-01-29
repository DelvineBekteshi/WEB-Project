<?php

class Useri {
    private $conn;
    private $table_name = 'useri'; 

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($email, $password, $role): bool {
        $query = "INSERT INTO {$this->table_name} (email, password, role) VALUES(:email, :password, :role)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function logIn($email, $password): bool {
        $query = "SELECT id, email, password, role FROM {$this->table_name} WHERE email = :email";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['useri_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role']; 
                return true;
            }
        }
        return false;
    }
}
    
