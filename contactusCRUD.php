<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('database.php');

 

class contactFormCRUD extends Database{
    private $id;
    private $emri;
    private $email;
    private $msg;
    private $conn;

    public function __construct($id='',$emri='',$email='',$msg=''){
        parent::__construct();
        $this->id=$id;
        $this->emri=$emri;
        $this->email=$email;
        $this->msg=$msg;

        $this->conn=$this->getConnection();
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getEmri(){
        return $this->emri;
    }
    public function setEmri($emri){
        $this->emri=$emri;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getMsg(){
        return $this->msg;
    }
    public function setMsg($msg){
        $this->msg=$msg;
    }
    
    public function insertoMesazhin(){
        try{
            $sql="INSERT INTO contactus(emri,email,mesazhi) VALUES (:emri,:email,:msg)";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([
                ':emri'=>$this->emri,
                ':email'=>$this->email,
                ':msg'=>$this->msg
            ]);

            $_SESSION['mesazhiMeSukses']=true;
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function shfaqMesazhet(){
        try{
            $sql="SELECT * FROM contactus order by id DESC";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            

            return $stmt->fetchAll();
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function konfirmoMesazhin(){
        try{
            $sql="UPDATE contactus set statusi = 'Mesazhi eshte pranuar' where id=?";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([$this->id]);

            $_SESSION['mesazhiUKonfirmua']=true;
           header("Location: index.php");
           exit();
        } catch (Exception $e){
            return $e->getMessage();
        }
    }
}


?>