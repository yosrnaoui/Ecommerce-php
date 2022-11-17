<?php
session_start();
include("connection.php");
include("functions.php");
        
        if (isset($_GET['ID'])) {
            $ID = mysqli_real_escape_string($conn,$_GET['ID']);
        
            $sql = "SELECT * FROM product WHERE productId='$ID' ";
            $result= mysqli_query($conn,$sql);
            $row1= mysqli_fetch_array($result);
        }
        $msg="";

        if (isset($_POST['submit'])) {
            $target1="images/".basename($_FILES['image']['name']);
            $target3="images/".basename($_FILES['newimage']['name']);

            $productId=$_POST['productId'];
            $category=$_POST['category'];
            $reference=$_POST['reference'];
            $name=$_POST['name'];
            $image=$_FILES['image']['name'];
            $newimage=$_FILES['newimage']['name'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $quantity=$_POST['quantity'];

        $query = "UPDATE product SET  category='$category',productReff='$reference',productName='$name',image='$image',newimage='$newimage',
        productDescription='$description',productPrice='$price',productQuantity='$quantity' WHERE productId='$ID' ";
        $result = mysqli_query($conn,$query);

        if ((move_uploaded_file($_FILES['image']['tmp_name'],$target1)) OR (move_uploaded_file($_FILES['newimage']['tmp_name'],$target3))) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "There was a problem uploading image";
        }
        header("Location:product.php");

        }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="add.css" >
        <link rel="stylesheet" href="stylehomepage.css" >
        <meta charset="utf-8"> 
        <title>Edit Product</title>
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
                   <td id="td1"><b> Edit Product </b></td>  
               </tr>
        </table><br>
        <a href="product.php"><img src="pictures/previous.png" id="img"></a>
        <div id="d1">
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <b> Product Category </b>
            <br>
            <input class="formulaire" type="text" name="category" placeholder="Enter product reference" required><br><br>
            <b> Product Reference </b>
            <br>
            <input class="formulaire" type="text" name="reference" placeholder="Enter product reference" required><br><br>
            <b> Product Name </b>
            <br>
            <input class="formulaire" type="text" name="name" placeholder="Enter product name" required><br><br>
            <b> Product Photo  </b>
            <br>
            <input class="formulaire" type="file" name="image" required><br><br>
            <b> Product Photo 2 </b>
            <br>
            <input class="formulaire" type="file" name="newimage" required><br><br>
            <b> Product Description </b>
            <br>
            <input class="formulaire" type="text" name="description" placeholder="Enter product description" required><br><br>
            <b> Product Price</b>
            <br>
            <input class="formulaire" type="text" name="price" placeholder="Enter the product price" required><br><br>
            <b> Product Quantity</b>
            <br>
            <input class="formulaire" type="text" name="quantity" placeholder="Enter the product quantity" required><br>
            <br>
            <div >
            <input type="reset" name="reset" value="Cancel" class="button">
            <input type="submit" name="submit" value="Edit" class="button">
            </div><br>
        </form>

        </div>
       
    </body>
</html>