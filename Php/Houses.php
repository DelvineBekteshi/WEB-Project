<?php 
if(!isset($_SESSION)){
    session_start();    
}

require_once('database.php');

class Houses extends Database {
    private $id;
    private $title;
    private $description;
    private $location;
    private $image_url;
    private $email;
    private $conn;

    public function __construct($id='', $title='', $description='', $location='', $image_url='', $email=''){
        parent::__construct();
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->location = $location;
        $this->image_url = $image_url;
        $this->email= $email;
        $this->conn = $this->getConnection();
    }

    public function getId(){
         return $this->id; 
    }
    public function getTitle(){
         return $this->title;
         }
    public function getDescription(){ 
        return $this->description;
     }
    public function getLocation(){ 
        return $this->location;
     }
    public function getImage_url(){ 
        return $this->image_url;
     }
    public function getEmail(){
        return $this->email; 
    }

    public function setTitle($title){ 
        $this->title = $title;
     }
    public function setDescription($description){ 
        $this->description = $description;
     }
    public function setLocation($location){ 
        $this->location = $location;
     }
    public function setImage_url($image_url){ 
        $this->image_url = $image_url; 
    }
    public function setEmail($email){
        $this->email=$email; 
    }

    public function handleFileUpload() {
        if (isset($_FILES['fotoShtepise']) && $_FILES['fotoShtepise']['error'] === 0) {
            $foto = $_FILES['fotoShtepise'];
            $emriFotos = $foto['name'];
            $emeriTempIFotes = $foto['tmp_name'];

            $formatiIFotos = pathinfo($emriFotos, PATHINFO_EXTENSION);
            $formatiIFotosPerKontrollim = strtolower($formatiIFotos);

            $teLejuara = ['jpg', 'jpeg', 'png', 'svg', 'webp'];

            if (in_array($formatiIFotosPerKontrollim, $teLejuara)) {
                $emriUnikFotos = uniqid('', true) . "." . $formatiIFotosPerKontrollim;
                $destinacioniFotos = '../Fotot/' . $emriUnikFotos;
                if (move_uploaded_file($emeriTempIFotes, $destinacioniFotos)) {
                    $this->setImage_url($destinacioniFotos);
                }
            }
        }
    }
    
    public function shtoShtepine() {
        try {
            $sql = "INSERT INTO `houses`(`title`, `description`, `location`, `image_url`, `email`) VALUES (:title, :description, :location, :image_url, :email)";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':title', $this->title);
            $stm->bindParam(':description', $this->description);
            $stm->bindParam(':location', $this->location);
            $stm->bindParam(':image_url', $this->image_url);
            $stm->bindParam(':email', $this->email);
            $stm->execute();
            $_SESSION['ProduktiUShtuaMeSukses'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getHouses() {
        try {
            $query = "SELECT * FROM houses";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}

?>