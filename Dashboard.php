<?php
if (!isset($_SESSION)) {
    session_start();
  }

if ($_SESSION['role'] != 'admin') {
    header('Location: log in.php');
    exit();
}
?>
<DOCTYPE html>
    <html>
        <head>
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="Dashboard.css">
        </head>
        <body>
            <div class="header"> 
            <a href="home page.php"><h2>Delandra Estates</h2></a>
            <h4>Users name</h4>
        </div>

        <div class="Customise">
           <h4>Dashboard</h4>
        </div>

        <div class="Nav">
        <div class="Navigation">
            <h3>Navigation</h3>
            <ul> 
            <li><a href="Dashboard.php">Dashboard</a></li>
            <li ><a href="index.php">Home</a></li>
            <li><a href="BuyPage.php">Buy/Rent</a></li>
            <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>

        <div class="Navigation2">
            <h3>Agents</h3>
            <ul>
                <li><a href="about us.html">Arwen Dais</a></li>
                <li><a href="about us.html">Lyra Winslow</a></li>
                <li><a href="about us.html">Noelle Zeph</a></li>
            </ul>
        </div>

        <div class="part3">

            <div class="Statistikat">
                <div class="kolona1">
            <div class="stat-box1">
            <a href="ShtoLajme.php"><p>Add News</p></a>
            </div>
            <div class="stat-box1">
            <a href="ShtoShtepi.php"><p>Add Products</p></a> 
            </div>
            </div>
            <div class="kolona2">
            <div class="stat-box1">
              <a href=""><p>Add Agents</p></a>  
            </div>
            <div class="stat-box1">
               <a href="contact us.php"><p id="koment">Contact</p></a> 
            </div>
        </div>
        </div>
       </div>
        </div>
       <div class="Contactmessages", id="1">
            <h3>New messages</h3>
            <textarea name="comments" cols="30" rows="4"></textarea>
        </div>
        
        <div class="DetajetCustomer", id="1">
            <h3>Customer Details</h3>
            <ul>
                <li>Name:     | Price:     | Payment: Paid</li>
                <li>Name:     | Price:     | Payment: Paid</li>
                <li>Name:     | Price:     | Payment: Paid</li>
                <li>Name:     | Price:     | Payment: Paid</li>
                <li>Name:     | Price:     | Payment: Paid</li>
            </ul>
        </div>
    
        </body>
 </html>