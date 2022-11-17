<?php
session_start();
include("connection.php");
include("functions.php");


if (isset($_GET['ID'])) {
    $ID = mysqli_real_escape_string($conn,$_GET['ID']);

    $sql = "SELECT * FROM product WHERE productId='$ID' ";
    $result1= mysqli_query($conn,$sql);
    $row1= mysqli_fetch_array($result1);
}
if (isset($_POST["submit"])) 
{  
    $user_data = check_login($conn);
    $reference=$row1["productReff"];
    $name=$row1["productName"];
    $image=$row1["image"];
    $newimage=$row1["newimage"];
    $price=$row1["productPrice"];
    $quantity=$_POST["quantity"];

    $qr="SELECT productQuantity FROM product WHERE productReff='$reference' ";
    $result1=mysqli_query($conn,$qr);
    $row2=mysqli_fetch_assoc($result1);
    $stockQuantity=$row2['productQuantity'];
    $newQuantity=$stockQuantity-$quantity; 

    if ($newQuantity > 0 )  {
    $request="SELECT reference FROM cart WHERE reference='$reference' ";
    $result2=mysqli_query($conn,$request);
    if (mysqli_num_rows($result2)<1) {
    $query=" INSERT INTO cart (reference,name,image,price,quantity) VALUES ('$reference','$name','$image','$price','$quantity') ";
    $result3=mysqli_query($conn,$query);    
    }
    else {
        $req=" SELECT quantity FROM cart WHERE reference='$reference' ";
        $result4=mysqli_query($conn,$req);
        if ($row3=mysqli_fetch_assoc($result4)) {
            $cartQuantity=$row3['quantity'];
            $newQ=$cartQuantity+$quantity;
            $qr=" UPDATE cart SET quantity='$newQ' WHERE reference='$reference'  ";
            $result5=mysqli_query($conn,$qr);
        }
    } 
    $rq=" UPDATE product SET productQuantity='$newQuantity' WHERE productReff='$reference'";
    $result6=mysqli_query($conn,$rq);
    }
    else { 
        echo "<script type=\"text/javascript\">alert('Insufficient stock!');</script>";
    }

}

?>             

<!DOCTYPE html>
<html>
    <head>
	    <link rel="stylesheet" href="productDetails.css"/>
	    <link rel="stylesheet" href="stylehomepage.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
	    <title>Product Details</title>
    </head>
    <body>
        <a href="homeUser.php"><img src="pictures/brand.png"></a>
        <table class="s">
        	<tr>
        		<td id="Search">
                   <form method="post" action="searchUser.php">
                        <input class="b" type="text" placeholder="Search.." name="searchh">
                        <button id="btn" type="submit" name="submit"><i class="fa fa-search"></i></button>
                   </form>
                </td>
        		<td>
        		   <nav class="search">
                   <ul>
        		   	    <li> <a href="cart.php"><img src="pictures/cart.png" id="img">
                        <?php 
                        $conn=mysqli_connect("localhost", "root", "", "aurora");

                        if (!$conn)
                        {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $request="SELECT COUNT(*) FROM cart";
                     
                         $result=mysqli_query($conn,$request);
                            
                        while ($row=mysqli_fetch_assoc($result)) 
                            { 
                            foreach ($row as $field => $value) {

                                echo "(".$value.")" ;
                            }
                        }

                        mysqli_close($conn);
                                
                        ?>
                        </a> </li>
                        <li> <a href="helpUser.php"><img src="pictures/help.png" id="img"> help</a> </li>
        		   	    <li> <a href="logout.php"><img src="pictures/logout.png" id="img"> Logout</a> </li>
        		   	</ul>
        		   </nav>	
        		</td>
        	</tr>
        </table>
        <nav class="menu">
        	<ul>
                 <li><a href="WomenUser.php">Women</a></li>
                 <li><a href="menUser.php">Men</a></li>
                 <li><a href="#contact">Contact Us</a></li>
            </ul>
        </nav>

    <div id="centre">
        
        <div class="d1">
            <br><br>
            <img src='admin/images/<?php echo $row1['image'] ; ?>'>
            <img src='admin/images/<?php echo $row1['newimage'] ; ?>'>
        </div><br>
        <div>
            <form action="" method="post"><br><br>
                <h3><?php echo $row1['productName'] ; ?></h3>
                <p><?php echo $row1['productDescription'] ; ?></p>
                Quantity <input type="number" value="1" name="quantity"><br>
                <h5><?php echo $row1['productPrice'] ; ?> TND </h5>

                <input type="submit" name="submit" id="button" value="Add to basket">
            </form>
        </div>
        <br><br>
    
    </div>
        <br><br>

        <table id="contact">
         	<tr>
         		<td><h3>Our Contact</h3></td>
                <td><h3>Our Location</h3></td>
         	</tr>
         	<tr>
         		<td>
         			<img id="img" src="pictures/mail.png">&nbsp &nbsp  aurora@gmail.com<br><br>
                    <img id="img" src="pictures/phone.png"> &nbsp &nbsp +216 58 017 120
                </td>
                <td rowspan="2">
                	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12882.049277207652!2d8.7105249!3d36.1784203!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xea46e94b9ed2cde8!2sInstitut%20Sup%C3%A9rieur%20de%20l&#39;Informatique%20du%20Kef!5e0!3m2!1sfr!2stn!4v1604850424413!5m2!1sfr!2stn" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                	</iframe>
                </td> 
         	</tr>
         	<tr>
         		<td class="contact"><h3>Find Us On</h3>
         			<ul>
         				<li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i> </a> </li>
         				<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i> </a> </li>
         				<li><a href="https://www.twitter.com/"><i class="fa fa-twitter"></i> </a> </li>
         				<li><a href="https://www.youtube.com/"><i class="fa fa-youtube"></i> </a> </li>
         			</ul>
         		</td>	
         	</tr>
         </table>
    </body>
</html>