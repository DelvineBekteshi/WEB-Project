<?php
    if(!isset($_SESSION)){
        session_start();    
    }
    
    require_once('database.php');

    class News extends Database{
        private $id;
        private $title;
        private $img;
        private $description;
        private $conn;
        
        public function __construct($id='', $title='', $img='', $description=''){
            parent::__construct();
            $this->id=$id;
            $this->title = $title;
            $this->img = $img;
            $this->description = $description;

            $this->conn = $this->getConnection();
        }

    public function getId(){ return $this->id; }
    public function getTitle(){ return $this->title; }
    public function getDescription(){ return $this->description; }
    public function getImg(){ return $this->img; }
    

    public function setTitle($title){ $this->title = $title; }
    public function setDescription($description){ $this->description = $description; }
    public function setImg($img){ $this->img = $img; }


    public function handleFileUpload() {
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
            $foto = $_FILES['foto'];
            $emriFotos = $foto['name'];
            $emeriTempIFotes = $foto['tmp_name'];

            $formatiIFotos = pathinfo($emriFotos, PATHINFO_EXTENSION);
            $formatiIFotosPerKontrollim = strtolower($formatiIFotos);

            $teLejuara = ['jpg', 'jpeg', 'png', 'svg', 'webp'];

            if (in_array($formatiIFotosPerKontrollim, $teLejuara)) {
                $emriUnikFotos = uniqid('', true) . "." . $formatiIFotosPerKontrollim;
                $destinacioniFotos = 'WEB-Project/' . $emriUnikFotos;
                if (move_uploaded_file($emeriTempIFotes, $destinacioniFotos)) {
                    $this->setImg($destinacioniFotos);
                }
            }
        }
    }
    
    public function shtoLajme() {
        try {
            $sql = "INSERT INTO `new`(`title`, `description`, `img`) VALUES (:title, :description, :img)";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':title', $this->title);
            $stm->bindParam(':description', $this->description);
            $stm->bindParam(':img', $this->img);
            $stm->execute();
            $_SESSION['LajmiUShtuaMeSukses'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getNews() {
        try {
            $query = "SELECT * FROM new";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}

    
?>