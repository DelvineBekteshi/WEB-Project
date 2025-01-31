<html>
<?php
<<<<<<< HEAD
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: log in.php');
        exit;
    }
=======
session_start();

require_once('Houses.php');
$houseObj = new Houses();
$houses = $houseObj->getHouses();
<<<<<<< Updated upstream
=======
>>>>>>> 6b065e8d7f1bb1a2656a7c98d421cb1ad64e68fb
>>>>>>> Stashed changes
?>
    <head>
        <title>Delandra Estates</title>
        <link rel="stylesheet" href="BuyPageStyle.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <header>
            <i class='bx bxs-home-heart' style='color:#ffffff'  ></i>
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
           <div class="house">
                <img src="house1.jpg" alt="house1" id="house">
           <div>     
                <p class="houseTitle">Auburn Hillside Home </p>
                <p class="houseDesc">Location: Auburn, California, USA</p>
                <p class="houseDesc">Perched on a scenic hillside in Auburn, California, this exquisite home blends rustic 
                    charm with modern elegance. The exterior boasts a warm, earthy palette that harmonizes
                    beautifully with the surrounding landscape, featuring natural stone accents and large, floor-to-ceiling windows that invite ample sunlight.</p>               
           <button class="cta-button" id="Home1" onclick="BuyPage.php='House1.html';">More...</button>
         </div>
     </div>

<<<<<<< HEAD
           <div class="house">
            
                <img src="house2.jpg" alt="house2" id="house"> 
                <div>
                <p class="houseTitle">Sunset Haven House</p>
                <p class="houseDesc">Location: Blue Ridge Mountains, North Carolina, USA</p>
                <p class="houseDesc">Nestled on a gently sloping hillside overlooking the vast expanse of the Pacific Ocean, Sunset Haven stands as a beacon of tranquility and elegance. This coastal retreat captures the essence of serene living with its perfect blend of modern architecture and natural charm.</p>
                <button class="cta-button">More...</button>
            </div>
           </div>
           <div class="house">
            
                <img src="img4.png" alt="house3" id="house">
                <div>
                <p class="houseTitle">Coastal Haven Villa</p>
                <p class="houseDesc">Location: Malibu, CA, USA</p>
                <p class="houseDesc"> A luxurious cliffside retreat overlooking the Pacific Ocean, featuring panoramic views, private beach access, and an open-concept interior for seamless indoor-outdoor living.</p>
                <button class="cta-button">More...</button>
            </div>
           </div>

           <div class="house">
            
                <img src="img5.png" alt="house4" id="house">
            <div>  
                <p class="houseTitle">Sunset Grove Bungalow</p>
                <p class="houseDesc">Location: Palm Springs, CA, USA</p>
                <p class="houseDesc"> A luxurious cliffside retreat overlooking the Pacific Ocean, featuring panoramic views, private beach access, and an open-concept interior for seamless indoor-outdoor living.</p>
                <button class="cta-button">More...</button>
                </div>  
           </div>

           <div class="house">
            
                <img src="img6.jpg" alt="house5" id="house">
                <div>
                <p class="houseTitle">Hidden Oasis Hacienda</p>
                <p class="houseDesc">Location: Ojai, CA, USA</p>
                <p class="houseDesc"> A Spanish-style hacienda with terracotta tiles, lush courtyards, and a tranquil fountain at its center, perfect for those seeking a peaceful retreat.</p>
                <button class="cta-button">More...</button>
                    </div>
           </div>
        </div>
        </main>
=======
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
                <img src="<?php echo htmlspecialchars($house['image_url']); ?>" alt="House Image" id="house">
                <div>
                <h2 class="houseTitle"><?php echo htmlspecialchars($house['title']); ?></h2>
                <p class="houseDesc"><?php echo htmlspecialchars($house['description']); ?></p>
                <p class="houseDesc">Location: <?php echo htmlspecialchars($house['location']); ?></p>
                <button class="cta-button">More...</button>
                   </div>
            </div>
        <?php endforeach; ?>
<<<<<<< Updated upstream
=======
>>>>>>> 6b065e8d7f1bb1a2656a7c98d421cb1ad64e68fb
>>>>>>> Stashed changes

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
          <script>
            document.getElementById("Home1").onclick = function() {
              location.href = 'House1.html';
            };
          </script>
    </body>
</html>


