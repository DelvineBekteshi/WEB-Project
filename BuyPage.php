<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: log in.php');
    exit;
}

require_once('database.php');
require_once('houses.php');

$db = new Database();
$conn = $db->getConnection();

// Fetch houses from the database
$sql = "SELECT * FROM houses";
$stmt = $conn->prepare($sql);
$stmt->execute();
$houses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delandra Estates</title>
    <link rel="stylesheet" href="BuyPageStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<header>
    <i class='bx bxs-home-heart' style='color:#ffffff'></i>
    <a href="index.php" class="header0">Delandra Estates</a>
    <a href="index.php" class="header1">Home</a>
    <a href="BuyPage.php" class="header1">Buy / Rent</a>
    <a href="contact us.html" class="header1">Contact</a>
    <a href="about us.php" class="header1">Agents</a>
    <a href="log in.php" class="header2">Log In/Register</a>
</header>

<main>
    <div class="part2">
        <p id="text1"><b>Homes for Sale</b></p>
    </div>
    <form>
        <p id="text2"></p>
        <input type="search" id="search" placeholder="Search..">
    </form>

    <?php foreach ($houses as $house): ?>
        <div class="house">
            <img src="<?= htmlspecialchars($house['image_url']) ?>" alt="<?= htmlspecialchars($house['title']) ?>" id="house">
            <div>
                <p class="houseTitle"><?= htmlspecialchars($house['title']) ?></p>
                <p class="houseDesc">Location: <?= htmlspecialchars($house['location']) ?></p>
                <p class="houseDesc"><?= htmlspecialchars($house['description']) ?></p>
                <button class="cta-button" onclick="location.href='HouseDetails.php?id=<?= $house['id'] ?>'">More...</button>
            </div>
        </div>
    <?php endforeach; ?>

</main>

<footer>
    <section class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <h3>About us</h3>
                <p>We find the perfect place for you! Designed with care for the environment and your well-being.</p>
            </div>
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="logout.php">Log out</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="about us.php">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-socials">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="https://www.facebook.com/"><i class='bx bxl-facebook-square'></i></a>
                    <a href="https://x.com/"><i class='bx bxl-twitter'></i></a>
                    <a href="https://www.instagram.com/"><i class='bx bxl-instagram-alt'></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Delandra Estates. All Rights Reserved.</p>
        </div>
    </section>
</footer>

</body>
</html>
