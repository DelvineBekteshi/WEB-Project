<?php

$myUser='delvinabekteshi2005@gmail.com';
$myPass='Delvina123';

if(isset($_POST['submit'])){


    $userName=$_POST['userName'];
    $pass=$_POST['password'];

    if($userName==$myUser and $pass==$myPass){
        setCookie('log in',$userName,time()+3600);
        setCookie('log in',$pass,time()+3600);

        header('Location:index.php');
    } else{
        header('Location:njoftim.php');
    }
}

?>