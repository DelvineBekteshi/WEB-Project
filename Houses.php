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
    private $conn;

    public function __construct($id='', $title='', $description='', $location='', $image_url=''){
        parent::__construct();
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->location = $location;
        $this->image_url = $image_url;
        $this->conn = $this->getConnection();
    }

    public function getId(){ return $this->id; }
    public function getTitle(){ return $this->title; }
    public function getDescription(){ return $this->description; }
    public function getLocation(){ return $this->location; }
    public function getImage_url(){ return $this->image_url; }

    public function setId($id){ $this->id = $id; }
    public function setTitle($title){ $this->title = $title; }
    public function setDescription($description){ $this->description = $description; }
    public function setLocation($location){ $this->location = $location; }
    public function setImage_url($image_url){ $this->image_url = $image_url; }
    
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
                $destinacioniFotos = 'uploads/' . $emriUnikFotos;
                if (move_uploaded_file($emeriTempIFotes, $destinacioniFotos)) {
                    $this->setImage_url($destinacioniFotos);
                }
            }
        }
    }
    
    public function shtoShtepine() {
        try {
            $sql = "INSERT INTO `houses`(`title`, `description`, `location`, `image_url`) VALUES (:title, :description, :location, :image_url)";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':title', $this->title);
            $stm->bindParam(':description', $this->description);
            $stm->bindParam(':location', $this->location);
            $stm->bindParam(':image_url', $this->image_url);
            $stm->execute();
            $_SESSION['ProduktiUShtuaMeSukses'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>
