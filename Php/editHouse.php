<?php 
if (!isset($_SESSION)) {
    session_start();
}
require_once('Houses.php');
$dhenat= new Houses();
$myId = $_GET["id"];
$record = $dhenat->lexoShtepiSipasID($myId);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['location']) && isset($_FILES['fotoShtepise']) && !empty($_POST['email'])) {
        $house = new Houses();
        $house->setTitle($_POST['title']);
        $house->setDescription($_POST['description']);
        $house->setLocation($_POST['location']);
        $house->setImage_url($_FILES['fotoShtepise']['name']);
        $house->setEmail($_POST['email']);
        $house->handleFileUpload();
        $house->shtoShtepine();
        header("Location: editHouse.php");
        exit;
    } else {
        echo "<script>alert('Please fill in all fields and upload a valid image.');</script>";
    }
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title id="mainTitle">Edit House</title>
    <link rel="stylesheet" href="../CSS/ShtoShtepi.css">
</head>
<body>

    <div class="wrapper">
        <h1>Edit House</h1>
        <form action="editHouse.php" method="POST" enctype="multipart/form-data">
            
            <div class="input-box">
                <input type="email" id="email" name="email" placeholder="Email Address" required value="<?php echo $record["email"]?>">
            </div>

            <div class="input-box">
                <input type="text" id="title" name="title" placeholder="House Title" required value="<?php echo $record["title"]?>">
            </div>

           
            <div class="input-box">
                <textarea id="description" name="description" placeholder="House Description" required value="<?php echo $record["description"]?>"></textarea>
            </div>

            
            <div class="input-box">
                <input type="text" id="location" name="location" placeholder="Location" required value="<?php echo $record["location"]?>">
            </div>

           
            <div class="input-box">
                <input type="file" id="fotoShtepise" name="fotoShtepise" accept="image/*" required value="<?php echo $record["image_url"]?>">
            </div>

            
            <button type="submit" class="btn">Edit House</button>

           
            <div class="register-link">
                <p>Go back to <a href="index.php">Home Page</a></p>
            </div>
        </form>
    </div>

</body>
</html>