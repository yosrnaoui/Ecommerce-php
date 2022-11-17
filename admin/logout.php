<?php

session_start();

    include("connection.php");

if(isset($_SESSION['id']))
{
    $result=mysqli_query($conn,$req);
    unset($_SESSION['id']);
}

header("Location:login.php");
die;


?>