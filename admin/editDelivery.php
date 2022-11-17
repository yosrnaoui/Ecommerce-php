<?php
session_start();
include("connection.php");
include("functions.php");

        if (isset($_GET['ID'])) {
            $ID = mysqli_real_escape_string($conn,$_GET['ID']);
        
            $sql = "SELECT * FROM personal_information WHERE ID_Order='$ID' ";
            $result= mysqli_query($conn,$sql);
            $row1= mysqli_fetch_array($result);
        }

        if (isset($_POST['submit'])) {
        $id_order = $_POST['id_order'];
        $input = $_POST['input'];
        $mail = $_POST['mail'];
        $phone = $_POST['phone'];
        $addresse = $_POST['addresse'];
        $ville = $_POST['ville'];
        $zip = $_POST['zip'];

        $query = "UPDATE personal_information SET full_name='$input',mail_address='$mail',
        phone_number='$phone',person_address='$addresse',city='$ville',zip_code='$zip'  WHERE ID_Order='$ID' ";
        $result = mysqli_query($conn,$query);
        header("location:managementDelivery.php");
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="add.css" >
        <link rel="stylesheet" href="stylehomepage.css" >
        <meta charset="utf-8"> 
        <title>Edit Delivery</title>
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
                   <td id="td1"><b> Edit Delivery </b></td>  
               </tr>
        </table><br>
        <a href="managementDelivery.php"><img src="pictures/previous.png" id="img"></a>
        <div id="d1">
        <form class="form" action="" method="post">
            <img src="pictures/name.png" width="20px" height="20px">
            <b> Full Name </b>
            <br>
            <input class="formulaire" type="text" name="input" placeholder="Enter Your Full Name" required><br><br>
            <img src="pictures/login.png" width="20px" height="20px">
            <b> mail adress </b>
            <br>
            <input class="formulaire" type="email" name="mail" placeholder="Enter email" required><br><br>
            <img src="pictures/psw.png" width="20px" height="20px">   
            <b> phone number <span style="color: red">*</span></b>
            <br>
            <input class="formulaire" type="tel" placeholder="(+216)00000000" name="phone" required><br><br>
            <img src="pictures/address.png" width="20px" height="20px">   
            <b> adress <span style="color: red">*</span></b>
            <br>
            <input class="formulaire" type="text" placeholder="Enter Your Address" name="addresse" required onkeyup="test2()"><br>
            <br>
            <img src="pictures/City.png" width="20px" height="20px">
            <b> City <span style="color: red">*</span></b>
            <br>
            <input class="formulaire" type="text" name="ville" placeholder="Enter Your City" required onkeyup="test2()"><br><br>
            <img src="pictures/zip.png" width="20px" height="20px">
            <b> Zip_code <span style="color: red">*</span></b>
            <br>
            <input class="formulaire" type="text" name="zip" placeholder="Enter Zip_code" required onkeyup="test2()"><br><br>

            <div >
            <input type="reset" name="reset" value="Cancel" class="button">
            <input type="submit" name="submit" value="Edit" class="button">
            </div><br>
        </form>

        </div>
       
    </body>
</html>