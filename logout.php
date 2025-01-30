<?php
session_start();
require_once 'database.php';

$_SESSION=[];

if(isset($_SESSION['email'])){

session_unset(); 
 
session_destroy();

header("Location:index.php");
exit();
} else{
    header("Location:log in.php");
    exit();
}
 

?>