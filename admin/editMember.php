<?php
session_start();
include("connection.php");
include("functions.php");

if (isset($_GET['ID'])) {
    $ID = mysqli_real_escape_string($conn,$_GET['ID']);

    $sql = "SELECT * FROM member WHERE user_id='$ID' ";
    $result= mysqli_query($conn,$sql);
    $row1= mysqli_fetch_array($result);
}

        if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $psw1 = md5($_POST['psw1']);
        $psw2 = md5($_POST['psw2']);

        $query = "UPDATE member SET username='$name',email='$mail',password='$psw1' WHERE user_id='$ID' ";
        $result = mysqli_query($conn,$query);
        header("location:managementMember.php");
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="add.css" >
        <link rel="stylesheet" href="stylehomepage.css" >
        <meta charset="utf-8"> 
        <title>Edit Member</title>
    </head>
    
    <body>
        <a href="adminHome.php"><img src="pictures/brand.png"></a>
        <nav class="menu">
        	<ul>
                 <li><a href="managementMember.php">Members</a></li>
                 <li><a href="managementDelivery.php">Deliveries</a></li>
                 <li><a href="product.php">Products</a></li>
            </ul>
        </nav>
        <table id="titles">
               <tr>
                   <td id="td1"><b> Edit Member </b></td>  
               </tr>
        </table><br>
        <a href="managementMember.php"><img src="pictures/previous.png" id="img"></a>
        <div id="d1">
        <form class="form" action="" method="post">
            <img src="pictures/name.png" width="20px" height="20px">
            <b> User Name </b>
            <br>
            <input class="formulaire" type="text" name="name" placeholder="Enter username" required><br><br>
            <img src="pictures/login.png" width="20px" height="20px">
            <b> E-mail </b>
            <br>
            <input class="formulaire" type="email" name="mail" placeholder="Enter email" required><br><br>
            <img src="pictures/psw.png" width="20px" height="20px">   
            <b> Password</b>
            <br>
            <input class="formulaire" type="password" placeholder="Enter Password" name="psw1" required><br><br>
            <img src="pictures/psw.png" width="20px" height="20px">   
            <b> Confirm Password</b>
            <br>
            <input class="formulaire" type="password" placeholder="Confirm Password" name="psw2" required><br>
            <br>
            <div >
            <input type="reset" name="reset" value="Cancel" class="button">
            <input type="submit" name="submit" value="Edit" class="button">
            </div><br>
        </form>

        </div>
       
    </body>
</html>