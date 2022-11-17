<?php
include("connection.php");
$select = "DELETE FROM personal_information WHERE ID_Order='".$_GET['del_id']."' ";
$query = mysqli_query($conn,$select);
header("Location: managementDelivery.php");
?>