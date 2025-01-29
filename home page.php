<?php 
session_start();
require_once "useri.php";
<<<<<<< HEAD
 
=======

$user =new useri('project');

>>>>>>> ce4372a92a2d6e4900699c8aa2216f3ebd12b2bf
?>

<html>
    <head>
        <title>Delandra Estate</title>
        <link rel="stylesheet" href="home page.css">
        <link rel="icon" href="favicon-16x16.png" type="image/x-icon">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <header>
            <i class='bx bxs-home-heart' style='color:#ffffff'  ></i>
            <a href="home page.html" class="header0">Delandra Estates</a>
            <a href="home page.html" class="header1">Home</a>
            <a href="BuyPage.html" class="header1">Buy / Rent</a>
            <a href="contact us.html" class="header1">Contact</a>
            <a href="about us.html" class="header1">Agents</a>
<<<<<<< HEAD
            <?php if($_SESSION['role'] == 'admin'): ?>
                <a href="dashboard.php" class="btn">Dashboard</a>
=======
            <a href="log in.php" class="header2">Log In/Register</a>

            <?php
            if($user->role=='admin'):  
            ?>

            <a href="dashboard.php" class="btn">Dashboard</a>
>>>>>>> ce4372a92a2d6e4900699c8aa2216f3ebd12b2bf
            <?php endif; ?>

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
            <div class="News">
            <a href=""><p class="NewsTitle"><b>"Celebrating Diversity: A Real Estate Agency That Reflects Our Community"</b></p></a>
            <div class="newsCon">
                <img src="news1.jpg" alt="News1" class="image">
                <div class="NewsDesc">
                    <p>At Delandra Estates, we are proud to represent and work within a diverse community. Whether you're buying your first
                        home, searching for an investment property, or exploring new neighborhoods, we understand that everyone has unique NewsDesc
                        and aspirations. Our team is committed to serving people from all walks of life, ensuring that every client feels valued and supported throughout
                        the real estate process.
                        We recognize that the journey to finding the right property is deeply personal, and we honor the variety of backgrounds, cultures,
                        and life experiences that each client brings. Our multilingual team is dedicated to bridging any communication gaps, ensuring that language
                        is never a barrier to your real estate success.We believe that building lasting relationships is as important as finding the perfect property, 
                        and we take the time to listen, understand, and tailor our approach to each individual's needs. Our commitment to integrity and transparency ensures 
                        that you are informed and confident at every step, whether negotiating offers, navigating financing options, or finalizing a sale. Beyond transactions, we are passionate
                         about fostering connections within our community, helping individuals and families lay the foundation for a brighter future.
                         We believe that building lasting relationships is as important as finding the perfect property, and we take the time to listen,
                          understand, and tailor our approach to each individual's needs. Our commitment to integrity and transparency ensures that you are informed 
                          and confident at every step, whether negotiating offers, navigating financing options, or finalizing a sale. Beyond transactions, we are passionate about fostering 
                          connections within our community, helping individuals and families lay the foundation for a brighter future.
                    </p>
                </div>
            </div>
            </div>
        
            <div class="News">
                <a href=""><p class="NewsTitle"><b>"Unlocking Dream Homes: Delandra Estates Delivers Top-Tier Real Estate Services"</b></p></a>
                <div class="newsCon">
                    <img src="news2.avif" alt="news2" class="image">
                    <div class="NewsDesc">
                        <p>With over 10 years of experience in the real estate industry, I specialize in turning your dreams into reality.
                             Whether you're looking for a luxury property, your first home, or an investment opportunity, my expertise in the 
                             local market ensures that you find the perfect fit at the best price. Throughout my career, I’ve had the privilege 
                             of helping a wide range of clients—from first-time buyers looking for their dream home to seasoned investors seeking 
                             high-yield opportunities. My approach is rooted in building trust, understanding your specific needs, and guiding you 
                             through every step of the real estate process with a focus on delivering results. I pride myself on staying ahead of 
                             market trends, leveraging data-driven insights to provide clients with a competitive edge in every transaction. 
                             My extensive network of industry professionals—from lenders to contractors—ensures that my clients receive comprehensive 
                             support throughout their journey. Communication is at the heart of my service, and I am always available to answer questions,
                            provide updates, and offer advice tailored to your unique goals. By combining strong negotiation skills with a deep understanding
                             of market dynamics, I consistently secure the best outcomes for my clients.  
                        </p>
                    </div>
                </div>
            </div>

            <div class="News">
                <a href=""><p class="NewsTitle"><b>"From First-Time Home buyers to Million-Dollar Listings: Delandra Estates Surpasses $10 Million
                    in Sales This Year"</b></p></a>
                <div class="newsCon">
                    <img src="news3.jpg" alt="news3" class="image">
                    <div class="NewsDesc">
                        <p>In an impressive display of skill and market knowledge, Delandra Estates has achieved an incredible $10 million in sales in 2024.
                             This milestone not only underscores their ability to navigate the competitive real estate landscape 
                            but also highlights their dedication to helping clients find the perfect properties—whether it’s the first home or a high-end investment.
                            This significant achievement reflects the team's commitment to excellence, consistently delivering results in a market that demands expertise, 
                            insight, and a personalized approach. By focusing on both luxury homes and emerging neighborhoods, Delandra Estates has proven time and again 
                            that their understanding of local trends and client needs leads to successful transactions. Beyond the impressive figures, Delandra Estates 
                            attributes their success to their unwavering commitment to understanding the unique goals of each client. The team goes above and beyond by 
                            providing tailored solutions, ensuring that buyers and sellers alike feel empowered and supported throughout the process. Their expertise extends
                            beyond closing deals—Delandra Estates prides itself on being a resource for market insights, offering clients the knowledge they need to make informed 
                            decisions in a competitive environment. In addition to their focus on individual client success, the team actively contributes to the communities they 
                            serve. By supporting local events, engaging with neighborhood initiatives, and promoting sustainable real estate practices, they foster a sense of connection 
                            and responsibility that resonates with their clients. As they look toward the future, Delandra Estates 
                            remains committed to setting new standards of excellence, ensuring that every client experience is not just successful but truly exceptional.</p>
                    </div>
                </div>
            </div>
        </div>
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
            <?php if(isset($_SESSION['email'])): ?>
                <!-- linku -->
            <li><a herf="logout.php" class="btn">Log out</a></li> 
            <?php endif; ?>
            <li><a href="home page.html">Home</a></li> 
            <li><a href="about us.html">About </a></li>
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