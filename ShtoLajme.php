<?php 
if (!isset($_SESSION)) {
    session_start();
} 

require_once('News.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['title']) && isset($_FILES['foto']) && !empty($_POST['description']) ) {
        $news = new News();
        $news->setTitle($_POST['title']);
        $news->setDescription($_POST['description']);
        $news->setImg($_FILES['foto']['name']);
        $news->handleFileUpload();
        $news->shtoLajme();
        header("Location: ShtoLajme.php");
        exit;
    } else {
        echo "<script>alert('Please fill in all fields and upload a valid image.');</script>";
    }
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title id="mainTitle">Add News</title>
    <link rel="stylesheet" href="ShtoLajme.css">
</head>
<body>

    <div class="wrapper">
        <h1>Add News</h1>
        <form action="ShtoLajme.php" method="POST" enctype="multipart/form-data">
            
            <div class="input-box">
                <input type="text" id="title" name="title" placeholder="News Title" required>
            </div>

           
            <div class="input-box">
                <textarea id="description" name="description" placeholder="News Description" required></textarea>
            </div>
 
            <div class="input-box">
                <input type="file" id="foto" name="foto" accept="image/*" required>
            </div>

            
            <button type="submit" class="btn">Add</button>

           
            <div class="register-link">
                <p>Go back to <a href="index.php">Home Page</a></p>
            </div>
        </form>
    </div>

</body>
</html>