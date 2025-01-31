<?php 
if(!isset($_SESSION)){
    session_start();
}

require_once('contactusCRUD.php');

if( $_SERVER["REQUEST_METHOD"]=="POST"){
if(!empty($_POST['emri'])&&!empty($_POST['email'])&&!empty($_POST['msg'])&& isset($_POST['dergoMSG'])){
    $cuCRUD= new contactusCRUD();
    $cuCRUD->setEmri($_POST['emri']);
    $cuCRUD->setEmails($_POST['email']);
    $cuCRUD->setMsg($_POST['msg']);
    $cuCRUD->handleFileUpload();
    $cuCRUD->insertoMesazhin();
    header("Location: Dashboard.php");
    exit;
} else{
    echo "<script>alert('Please fill in all the fields and click Send!'); </script>";
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contact us</title>
        <link rel="stylesheet" href="contact us.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <style>
            .contact .content {
                color: black;
            }
            .container .contactInfo {
                color: black;
            }

        </style>
    </head>
    <body>
        <selection class="contact">
            <div class="content">
                <h2>Contact Us</h2>
                <p>Ask us about your future home!</p>

            </div>
            <div class="container">
                <div class="contactInfo">
                    <div class="box">
                        <div class="icon"><i class='bx bxs-map' ></i></div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>Rruga Hasan Prishtina,<br>Prishtina, 10000,<br>Kosova</p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="icon"><i class='bx bxs-phone' ></i></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>+383-138-454</p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="icon"><i class='bx bxs-envelope' ></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>realestate@outlook.com</p>
                        </div>
                    </div>
                </div>
                <div class="contactForm">
                <form method="POST" action="contactus.php">

                        <h2>Send Message</h2>
                        <div class="inputBox">
                            <input type="text" name="emri" required="required">
                            <span>Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="email" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <textarea type="text" name="msg" required="required"></textarea>
                            <span>Type your Message...</span>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="dergoMSG" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </selection>
        
    </body>
</html>

<?php 
if(isset($_SESSION['mesazhiMeSukses'])){
unset($_SESSION['mesazhiMeSukses']);
}

?>