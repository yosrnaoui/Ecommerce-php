<?php
include("connection.php");
$select = "DELETE FROM product WHERE productId='".$_GET['del_id']."' ";
$query = mysqli_query($conn,$select);
header("Location: product.php");
?>