<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
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
            <a href="index.php"><h2>Delandra Estates</h2></a>
            <h4>Users name</h4>
        </div>

        <div class="Customise">
            <h4>Customise this page</h4>
        </div>

        <div class="Navigation">
            <h3>Navigation</h3>
            <ul> 
            <li><a href="Dashboard.php">Dashboard</a></li>
            <li ><a href="index.php">Home</a></li>
            <li><a href="BuyPage.php">Buy/Rent</a></li>
            <li><a href="contact us.html">Contact</a></li>
            </ul>
        </div>

        <div class="Navigation2">
            <h3>Agents</h3>
            <ul>
                <li><a href="about us.php">Arwen Dais</a></li>
                <li><a href="about us.php">Lyra Winslow</a></li>
                <li><a href="about us.php">Noelle Zeph</a></li>
            </ul>
        </div>

        <div class="Contactmessages">
            <h3>New messages</h3>
            <textarea name="comments" cols="30" rows="4"></textarea>

        </div>
        <div class="Statistikat">
            <div class="stat-box1">
            <p>Customers</p>
            </div>
            <div class="stat-box2">
                <p>Views</p>
            </div>
            <div class="stat-box3">
                <p>Sales</p>
            </div>
            <div class="stat-box4">
                <p>Comments</p>
            </div>
        </div>
        <div class="DetajetCustomer">
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