<?php
if (!isset($_SESSION)) {
    session_start();
  }

if ($_SESSION['role'] != 'admin') {
    header('Location: log in.php');
    exit();
}



require_once('database.php');
require_once('contactusCRUD.php');

$db=new Database();
$connection=$db->getConnection();
$contact= new contactusCRUD($connection);

$messages=$contact->getMesazhet();


require_once('Houses.php');
$houseObj = new Houses();
$houses = $houseObj->getHouses();
?>
<!DOCTYPE html>
    <html>
        <head>
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../CSS/Dashboard.css?v=2">
        </head>
        <body>
            <div class="header"> 
            <a href="index.php"><h2>Delandra Estates</h2></a>
            <h4>Dashboard</h4>

        <link rel="stylesheet" type="text/css" href="Dashboard.css">
        </head>
        <body>
            <div class="header"> 
            <a href="home page.php"><h2>Delandra Estates</h2></a>
             
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
                <li><a href="about us.php">Arwen Dais</a></li>
                <li><a href="about us.php">Lyra Winslow</a></li>
                <li><a href="about us.php">Noelle Zeph</a></li>
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

            </div>
            

        </div>
       <div class="Contactmessages" id="1">
            <h3>New messages</h3>
            <div class="new">
                <?php 
                if(count($messages)>0):?>
                   <?php foreach($messages as $message): ?>
                 <p><strong>Name:</strong><?= htmlspecialchars($message['emri'])?><br>
                    <strong>Email:</strong><?= htmlspecialchars($message['email'])?><br>
                    <strong>Message:</strong><?= nl2br(htmlspecialchars($message['msg']))?></p>
                    <hr>
                    <?php endforeach;?>
                    <?php else: ?>
                        <p>No messages yet</p>
                        <?php endif;?>
            </div>
            <textarea name="comments" cols="50" rows="6"></textarea>
        </div>
        
        <div class="DetajetCustomer" id="1">
            <h3 id='cDetails'>Product Details</h3>
            <textarea name="comments" cols="40" rows="12" id='cDetails'>
    <?php foreach ($houses as $house): ?>
        <?php echo htmlspecialchars($house['email']) . ' added '; ?>
    <?php endforeach; ?>
</textarea>

        </div>
    
        </body>
 </html>