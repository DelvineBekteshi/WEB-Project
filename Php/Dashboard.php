<?php
if (!isset($_SESSION)) {
    session_start();
  }

if ($_SESSION['role'] != 'admin') {
    header('Location: log in.php');
    exit();
}



require_once('database.php');
require_once('Houses.php');

$db=new Database();
$connection=$db->getConnection();
$House= new Houses($connection);

$all=$House->getHouses();

?>
<!DOCTYPE html>
    <html>
        <head>
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../CSS/Dashboard.css">
        </head>
        <body>
            <div class="header"> 
            <a href="index.php"><h2>Delandra Estates</h2></a>
            <h4 id="dash">Dashboard</h4>
       
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
      
        <div id="crud">
        <table> 
            <p>Houses</p>
            <tr>
                <th>Email</th>
                <th>Title</th>
            </tr>
            
<?php foreach($all as $key => $value){ ?>
    <tr>
    <td><?php echo $value['email']?></td>
    <td><?php echo $value['title']?></td>
    <td id='de'><a href="deleteHouse.php?id=<?php echo $value['id'] ?>"><button id='d'>Delete</button></a>
    <a href="editHouse.php?id=<?php echo $value['id'] ?>"><button id='e'>Edit</button></a>
</td>
            </tr>
            <?php }?>
        </table>
        
        </div>
    
        </body>
 </html>