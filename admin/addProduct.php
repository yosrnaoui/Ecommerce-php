<?php
session_start();

    include("connection.php");
    include("functions.php");
    $msg="";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $target="images/".basename($_FILES['image']['name']);
            $target2="images/".basename($_FILES['newimage']['name']);

            $category=$_POST['category'];
            $reference=$_POST['reference'];
            $name=$_POST['name'];
            $image=$_FILES['image']['name'];
            $newimage=$_FILES['newimage']['name'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $quantity=$_POST['quantity'];
            
            $productId = random_num(20);
            $sql=" INSERT INTO product (productId,category,productReff,productName,image,newimage,productDescription,productPrice,productQuantity) 
                  VALUES ('$productId','$category','$reference','$name','$image','$newimage','$description','$price','$quantity')";
            $result=mysqli_query($conn,$sql);

            if ((move_uploaded_file($_FILES['image']['tmp_name'],$target)) OR (move_uploaded_file($_FILES['newimage']['tmp_name'],$target2))) {
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
        <title>Add Product </title>
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
                   <td id="td1"><b> Add Product </b></td>  
               </tr>
        </table><br>
        <a href="product.php"><img src="pictures/previous.png" id="img"></a>
        <div id="d1">
          <form class="form" action="" method="post" enctype="multipart/form-data" >
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
            <input class="formulaire" type="text" placeholder="Enter the product price" name="price" required><br><br>
            <b> Product Quantity</b>
            <br>
            <input class="formulaire" type="text" placeholder="Enter the product quantity" name="quantity" required><br>
            <br>
            <div >
            <input type="reset" name="reset" value="Cancel" class="button">
            <input type="submit" name="submit" value="Add" class="button">
            </div><br>
           </form>
        </div>
    
    </body>
</html>