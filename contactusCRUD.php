<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('database.php');

class contactusCRUD extends Database{
    private $id;
    private $emri;
    private $email;
    private $msg;
    private $conn;

    public function __construct($id='', $emri='', $email='', $msg=''){
        parent::__construct();
        $this->id=$id;
        $this->emri=$emri;
        $this->email=$email;
        $this->msg=$msg;
        $this->conn=$this->getConnection();
    }

    public function getId(){ return $this->id; }
    public function getEmri(){ return $this->emri; }
    public function getEmail(){ return $this->email; }
    public function getMsg(){ return $this->msg; }
    

    public function setEmri($emri){ $this->emri = $emri; }
    public function setEmail($email){ $this->email = $email; }
    public function setMsg($msg){ $this->msg = $msg; }

    public function shtoMesazh() {
        try {
            $sql = "INSERT INTO `contactus`(`emri`, `email`, `msg`) VALUES (:emri, :email, :msg)";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':emri', $this->emri);
            $stm->bindParam(':email', $this->email);
            $stm->bindParam(':msg', $this->msg);
            $stm->execute();
            $_SESSION['MesazhiUDerguaMeSukses'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getMesazhet(){
        try {
            $query = "SELECT * FROM contactus";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
} ?>