<?php

session_start();

    include("connection.php");

if(isset($_SESSION['user_id']))
{
    $req="DELETE FROM cart ";
    $result=mysqli_query($conn,$req);
    unset($_SESSION['user_id']);
}

header("Location:home.php");
die;


?>