<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>About Us</title>
        <link rel="stylesheet" href="about us.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <header>
            <i class='bx bxs-home-heart' style='color:#ffffff'  ></i>
            <a href="index.php" class="header0">Delandra Estates</a>
            <a href="index.php" class="header1">Home</a>
            <a href="BuyPage.html" class="header1">Buy / Rent</a>
            <a href="contact us.html" class="header1">Contact</a>
            <a href="about us.php" class="header1">Agents</a>
            <a href="log in.php" class="header2">Log In/Register</a>
        </header>
        <div class="about-section">
            <h1>About Us</h1>
            <p>We are dedicated to making your real estate journey smooth and successful. Whether you’re buying, selling, renting, or investing, our team combines market expertise with personalized service to help you achieve your goals. We pride ourselves on delivering transparent, professional, and client-focused solutions for all types of properties, ensuring every transaction is handled with care and integrity.</p>
        </div>

        <h2 style="text-align:center" id="ourTeam">Our Team</h2>
        <div class="row">
            <div class="column">
                <div class="card">
                    <img src="agent1.avif" alt="Arwen"  class="Agents">
                    <div class="container">
                        <h2>Arwen Damaris</h2>
                        <p class="title">CEO & Founder</p>
                        <p>A visionary CEO, leads her real estate company with innovation and a focus on sustainable, community-driven projects. Known for her resilience and approachable leadership, she’s a trailblazer for women in the industry.</p>
                        <p>arwendamaris05@outlook.com</p>
                        <p><button class="button" onclick="window.location.href='contact us.html';">Contact</button></p>
                    </div>
                </div>
            </div>

            <div class="colum">
                <div class="card">
                    <img src="agent2.avif" alt="Lyra" class="Agents">
                    <div class="container">
                        <h2>Lyra Winslow</h2>
                        <p class="title">Art Director</p>
                        <p>A visionary Art Director specializing in real estate, combines creative expertise with market insight to craft compelling visual narratives. She excels in developing branding strategies, marketing campaigns, and property presentations.</p>
                        <p>lyrawinslow07@gmail.com</p>
                        <div class="contactBtn">
                            <p><button class="button" onclick="window.location.href='contact us.html';">Contact</button></p>
                    </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <img src="agent3.jpg" alt="Noelle" class="Agents">
                    <div class="container">
                        <h2>Noelle Zephyrine</h2>
                        <p class="title">Designer</p>
                        <p>Noelle Zephyrine is a visionary designer at the forefront of real estate innovation. With a talent for blending sophisticated aesthetics with functional design, she creates captivating interiors and branding that elevate every property.</p>
                        <p>zephyrinenoelle@outlook.com</p>
                        <p><button class="button" onclick="window.location.href='contact us.html';">Contact</button></p>
                    </div>
                </div>
            </div>
        </div>
        
        <footer>
            <section class="footer">
            <div class="footer-container">
                <div class="footer-about">
                    <h3>About us</h3>
                    <p>
                        We find the perfect place for you!
                        Designed with care for the environment and your well-being.
                    </p>
                </div>
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                    <li><a href="logout.php">Log out</a></li>
                        <li><a href="index.php">Home</a></li> 
                        <li><a href="about us.php">About</a></li>
                        <li><a href="contact us.html">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-socials">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/"><i class='bx bxl-facebook-square'></i></a>
                        <a href="https://x.com/"><i class='bx bxl-twitter' undefined ></i></a>
                        <a href="https://www.instagram.com/"><i class='bx bxl-instagram-alt' ></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Delandra Estates. All Right Reserved.</p>
            </div>
            </section>
            </footer>
            <?php include 'footer.php'; ?>

    </body>
</html>