<?php 
if (!isset($_SESSION)) {
    session_start();
  }
require 'database.php';
require_once "useri.php";
  
$user =new useri('project');

require_once 'News.php'; 

$news1 = new News();
$news = $news1->getNews();
?>

<html>
    <head>
        <title>Delandra Estate</title>
        <link rel="stylesheet" href="index.css">
        <link rel="icon" href="favicon-16x16.png" type="image/x-icon">
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
 
    <?php
if (isset($_SESSION['id']) && $_SESSION['role']=='admin') {
    echo "<a href='dashboard.php' class='header1'>Dashboard</a>";
}
?>
            <a href="log in.php" class="header2">Log In/Register</a>
           
        </header>
        <main>
            <!-- pjesa e shtuar faza 2 e projektit -->
            <div class="image-container">

                <span class="next">&#10095;</span>
                <span class="prev">&#10094;</span>

                <selection class="slides">
                    <div class="slide" id="lastImageDuplicate">
                        <img src="f9.jpg" alt="">
                        </div>
                    <div class="slide">
                    <img src="background4.png" alt="House with greenery">
                    </div>
                    <div class="slide"> 
                    <img src="f4.jpg" alt="">
                    </div>
                    <div class="slide">
                    <img src="f8.jpg" alt="">
                    </div>
                    <div class="slide">
                    <img src="f9.jpg" alt="">
                    </div>
                    <div class="slide" id="firstImageDuplicate">
                        <img src="background4.png" alt="House with greenery">
                        </div>

                </selection>
                <div class="overlay-content">
                  <h1>Find a place where you<br>can be yourself</h1>
                  <button class="cta-button" onclick="window.location.href='contact us.html';">Book a call</button>

                </div>
                <selection class="dots">
                    <div class="dot active"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                  </selection>
                </div>
    
                <script type="text/javascript">
                // i qasemi elementeve ne html
                    const carouselRow=document.querySelector('.slides');
                    const carouselSlides=document.getElementsByClassName('slide');
                    const dots=document.getElementsByClassName('dot');
                    const nextBtn=document.querySelector('.next');
                    const prevBtn=document.querySelector('.prev');
    
                // i deklarojme variablat
    
                let index =1;
                var width;
    
    
                function slideWidth(){
                width=carouselSlides[0].clientWidth;
                }
                slideWidth();
                window.addEventListener('resize',slideWidth);
                carouselRow.style.transform='translateX('+(- width*index)+'px)';
    
    
                // next slide
    
                nextBtn.addEventListener('click', nextSlide);
                function nextSlide(){
                    if(index>=carouselSlides.length-1){
                        return
                    };
                    
                    carouselRow.style.transition='transform 0.4s ease-out';
                    index++;
                    carouselRow.style.transform='translateX('+(- width*index)+'px)';
                    dotsLabel();
    
                }
                // slide e meparshme
                prevBtn.addEventListener('click', prevSlide);
                    function prevSlide(){
                        if(index<=0){
                            return
                        };
                        carouselRow.style.transition='transform 0.4s ease-out';
                        index--;
                        carouselRow.style.transform='translateX('+(-width*index)+'px)';
                        dotsLabel();
                    }
                
                // kthehu ne sliden e pare, kur arrin ne sliden e fundit
    
                carouselRow.addEventListener('transitionend',function(){
                    if(carouselSlides[index].id=='firstImageDuplicate'){
                    carouselRow.style.transition='none';
                    index=carouselSlides.length-index;
                    carouselRow.style.transform='translateX('+(-width*index)+'px)';
                    dotsLabel();
                }
                
                    if(carouselSlides[index].id=='lastImageDuplicate'){
                    carouselRow.style.transition='none';
                    index=carouselSlides.length-index-2;
                    carouselRow.style.transform='translateX('+(-width*index)+'px)';
                    dotsLabel();
                }
                });
                function autoslide(){
                    deleteInterval=setInterval(timer,1000);
                    function timer(){
                        nextSlide();
                    }
                }
                autoslide();
    
                const mainContainer=document.querySelector('.image-container');
                mainContainer.addEventListener('mouseover', function(){
                    clearInterval(deleteInterval);
                });
    
                // rifillon sliding kur mausi eshte jashte
    
                mainContainer.addEventListener('mouseout',autoslide);
    
                function dotsLabel() {
          
                for (let i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace('active', '');
        }
     
               let dotIndex = index;
    
         
               if (carouselSlides[index].id === 'lastImageDuplicate') {
               dotIndex = 1;
        } 
              else if (carouselSlides[index].id === 'firstImageDuplicate') {
              dotIndex = dots.length;
        }
     
             dots[dotIndex - 1].className += ' active';
    }
    
                </script>
            <!-- fundi -->
              </div>
        
        <div class="part2">
            <h2>Trusted By 100 Million Buyers</h2>
            <p>
                Welcome to Delandra Estate, where finding your dream home is our mission. 
                Specializing in exclusive properties and tailored service, we present a curated collection of residences that epitomize sophistication, 
                comfort, and charm. Our team of dedicated professionals is here to guide you every step of the way, ensuring a seamless and personalized experience. 
                Discover your next property with us and let us turn your vision into reality.
                Explore our listings today, and take the first step toward finding a place you’ll love to call home.
            </p> 
        </div>

        <div class="part3">
            <p id="part3Title"><b>Delandra Estate News</b></p>

            <?php foreach ($news as $new): ?>
                <div class="News">
            <a href=""><p class="NewsTitle"><b><?php echo htmlspecialchars($new['title']); ?></b></p></a>
            <div class="newsCon">
                <img src="<?php echo htmlspecialchars($new['img']); ?>" alt="News1" class="image">
                <div class="NewsDesc">
                    <p><?php echo htmlspecialchars($new['description']); ?></p>
                </div>
            </div>
            </div>
            <?php endforeach; ?>
        </main>
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
            <li><a href="about us.php">About </a></li>
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
  </footer>
</div>
</section>
</body>
</html>