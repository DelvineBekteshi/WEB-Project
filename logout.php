<?php

session_start();


if (isset($_SESSION['id']) ) {
   
    session_unset();

    
    session_destroy();

    
    header("Location: log in.php");
    exit();
} else {
    
    header("Location: log in.php"); 
    exit();
}
?>

