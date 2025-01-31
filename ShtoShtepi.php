<?php 
if (!isset($_SESSION)) {
    session_start();
}
require_once('Houses.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['location']) && isset($_FILES['fotoShtepise'])) {
        $house = new Houses();
        $house->setTitle($_POST['title']);
        $house->setDescription($_POST['description']);
        $house->setLocation($_POST['location']);
        $house->setImage_url($_POST['fotoShtepise']);
        $house->handleFileUpload();
        $house->shtoShtepine();
        header("Location: ShtoShtepi.php");
        exit;
    } else {
        echo "<script>alert('Please fill in all fields and upload a valid image.');</script>";
    }
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title id="mainTitle">Add New House</title>
    <link rel="stylesheet" href="ShtoShtepi.css">
</head>
<body>

    <div class="wrapper">
        <h1>Add New House</h1>
        <form action="ShtoShtepi.php" method="POST" enctype="multipart/form-data">
            
            <div class="input-box">
                <input type="text" id="title" name="title" placeholder="House Title" required>
            </div>

           
            <div class="input-box">
                <textarea id="description" name="description" placeholder="House Description" required></textarea>
            </div>

            
            <div class="input-box">
                <input type="text" id="location" name="location" placeholder="Location" required>
            </div>

           
            <div class="input-box">
                <input type="file" id="fotoShtepise" name="fotoShtepise" accept="image/*" required>
            </div>

            
            <button type="submit" class="btn">Add House</button>

           
            <div class="register-link">
                <p>Go back to <a href="index.php">Home Page</a></p>
            </div>
        </form>
    </div>

</body>
</html>