<?php
session_start();
include("connection.php");
include("functions.php");
$admin_data = check_login($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="add.css" >
        <link rel="stylesheet" href="consult.css">
        <link rel="stylesheet" href="stylehomepage.css" >
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type"> 
        <title> Product</title>
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
                <td id="td1"><b> 
                    <a href="product.php"
                    style=" color : black ;text-decoration:none;"
                    > Consult Products </a> </b></td>  
            </tr>
        </table><br>
        <div id="Search">
            <form method="post" action="searchProduct.php">
                <input class="b" type="text" placeholder="Search.." name="searchh">
                <button id="btn" type="submit" name="submit"><i class="fa fa-search"></i></button>
            </form>
        </div><br>
        <a href="addMenProduct.php" 
            style=" cursor: pointer;height: 50px;
                    border-radius : 10px;text-align: center;
                    color : white ;background-color: #83756e ;
                    font-size: 20px;width: 150px;
                    margin: center;padding: 10px;text-decoration:none;">Add product</a><br><br> 

<table border="1" align="center" frame="void" style="width: 100%; text-align: center;" rules="rows">
<tr style="color: #83756e; font-size: 16pt;">
<th>ID</th>
<th>Product ID</th>
<th>Product Category</th>
<th>Product Reference</th>
<th>Product Name</th>
<th>Product Photo</th>
<th>Product Description</th>
<th>Product Price</th>
<th>Product Quantity</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php

if(!empty($_POST['searchh']))
{
    $keyword=$_POST['searchh'];

    $query="SELECT * FROM product where productReff like '%$keyword%' or productName like '%$keyword%'
    or productPrice like '%$keyword%' or category like '%$keyword%'" ;
    $result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0) {
    while ($row=mysqli_fetch_assoc($result)) {
        ?>
        <tr style="color: 'black'; font-size: 16pt;">
        <td style="width:auto;"><?php echo $row['id']; ?></td>
        <td style="width:auto;"><?php echo $row['productId']; ?></td>
        <td style="width:auto;"><?php echo $row['category']; ?></td>
        <td style="width:auto;"><?php echo $row['productReff']; ?></td>
        <td style="width:auto;"><?php echo $row['productName']; ?></td>
        <td><img style="padding-top: 10px; width:150px; height: 150px;" src="images/<?= $row['image']?> "></td>
        <td style="width:auto;"><?php echo $row['productDescription']; ?></td>
        <td style="width:auto;"><?php echo $row['productPrice']; ?></td>
        <td style="width:auto;"><?php echo $row['productQuantity']; ?></td>
        <!-- Edit Button -->
        <td ><a style="cursor: pointer;
                        height: 20px;
                        text-align: center;
                        color : #702626 ;
                        border-radius: 20px;
                        border-color: #702626;
                        font-size: 30px;
                        background-color: #D4C7BE ;
                        display: inline-block;
                        text-align: left;
                        text-decoration: none;
                        width: auto;" style="decoration:none;" href="editProduct.php?ID=<?php echo $row['productId']; ?> " alt="edit">Edit</a></td>
        <!-- Delete Button-->
        <td> <input style="cursor: pointer;
                        height: 30px;
                        text-align: center;
                        color : #702626 ;
                        border-radius: 20px;
                        border-color: #702626;
                        font-size: 20px;
                        background-color: #D4C7BE ;
                        display: inline-block;
                        text-align: right;
                        width: auto;" type="button" onClick="deleteproduct(<?php echo $row['productId'];?>)" name="Delete" value="Delete"> </td> 
        </tr>
        <!-- JavaScript function for deleting data -->
        <script language="javascript">
        function deleteproduct(delid) {
            if(confirm("Do you want to delete this product!")) {
                window.location.href='deleteproduct.php?del_id=' +delid+'';
                return true;
            }
        }
        </script>
        <?php
    }

   }
   else {
        ?>
        <tr style="color: #83756e; font-size: 16pt;">
        <th colspan="11"> Add products! </th>
        </tr>
        <?php
        }
    }
        ?>
</table> 
    </body>
</html