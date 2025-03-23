<?php 
    require_once('Houses.php');
    $dhenat = new Houses();
    if(isset($_GET['id'])){
        $myId=$_GET['id'];
        $dhenat->deleteShtepi($myId);
        header("Location: dashboard.php");
        exit();
    }

?>