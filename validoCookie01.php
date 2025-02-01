<?php

$myUser='delvinabekteshi2005@gmail.com';
$myPass='Delvina123';

if($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['remember'])){


    $userName=$_POST['userName'];
    $pass=$_POST['password'];

    if($userName==$myUser and $pass==$myPass){
        setCookie('userName',$userName,time()+3600,"/");
        setCookie('password',$pass,time()+3600,"/");

    } else{
        setCookie('userName',"",time()-3600,"/");
        setCookie('password',"",time()-3600,"/");
    }


}
 
?>