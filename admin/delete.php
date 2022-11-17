<?php
include("connection.php");
$select = "DELETE FROM member WHERE user_id='".$_GET['del_id']."' ";
$query = mysqli_query($conn,$select);
header("Location: managementMember.php");
?>