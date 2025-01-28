<?php

class Database {
    private $host = 'localhost';
    private $dbname = 'project';
    private $username = 'root'; 
    private $password = ''; 
    private $role;   
    private $conn;

    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password,  $this->role);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch(PDOException $e) {
            die('Connection failed: ' . $e->getMessage()); 
        }
    }

    public function getConnection(): PDO {
        return $this->conn;
    }
}

?>
