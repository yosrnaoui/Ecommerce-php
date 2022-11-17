<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($conn);
?>
<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="stylehomepage.css" >
        <link rel="stylesheet" href="cart.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type"> 
	    <title>Your Order</title>
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
        
         <br><br> 
        <table id="titles">
               <tr>
                   <td id="td1"><img id="im" src="pictures/login.png" ><b> Basket </b></td>  
               </tr>
        </table><br>
        <div id="d1">
        <form class="form" action="cart.php" method="POST">
            <img src="pictures/name.png" >
            <b> Full Name </b>
            <br>
            <input class="loginmail" type="text" name="input" placeholder="Enter Your Full Name" required><br><br>
            <img src="pictures/psw.png" >   
            <b> phone number <span style="color: red">*</span></b>
            <br>
            <input class="loginmail" type="tel" placeholder="(+216)00000000" name="phone" required><br><br>
            <img src="pictures/address.png" >   
            <b> adress <span style="color: red">*</span></b>
            <br>
            <input class="loginmail" type="text" placeholder="Enter Your Address" name="addresse" required ><br>
            <br>
            <img src="pictures/City.png" >
            <b> City <span style="color: red">*</span></b>
            <br>
            <input class="loginmail" type="text" name="ville" placeholder="Enter Your City" required ><br><br>
            <img src="pictures/zip.png" >
            <b> Zip_code <span style="color: red">*</span></b>
            <br>
            <input class="loginmail" type="text" name="zip" placeholder="Enter Zip_code" required ><br><br>

            <div >
            <input type="reset" name="reset" value="Cancel" class="button" onclick="alert('Order Successfully cancelled!')">
            <input type="submit" name="submit" value="order" class="button">
            </div><br>
        </form>
        <?php 
            if (isset($_POST["submit"])) {
                $input=$_POST["input"];
                $phone=$_POST["phone"];
                $addresse=$_POST["addresse"];
                $ville=$_POST["ville"];
                $zip=$_POST["zip"];
                $user_mail=$user_data["email"];

                $conn=mysqli_connect("localhost", "root", "", "aurora");
                if (!$conn)
                {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $request="SELECT * FROM cart";
                $result=mysqli_query($conn,$request);

                if(mysqli_num_rows($result)>0){
                    $query1="INSERT INTO personal_information (User_mail,full_name,phone_number,person_address,city,zip_code)
                     VALUES ('$user_mail','$input','$phone','$addresse','$ville','$zip')";
                    $result1=mysqli_query($conn,$query1);
                    $request2="DELETE FROM cart";
                    $result2=mysqli_query($conn,$request2);

                    echo "<script type=\"text/javascript\">alert('Order Successfully passed!');</script>";
                  /* header("Location:confirmation.php");*/
                }
                else {
                    echo "<script type=\"text/javascript\">alert('Your Shopping Cart is Empty!');</script>";
                }
                header("Location:homeUser.php");
            }
        ?>

<form method="post" action="">
        <?php
       
        $conn=mysqli_connect("localhost", "root", "", "aurora");

        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        $request="SELECT * FROM cart";

        $result=mysqli_query($conn,$request);

        if(mysqli_num_rows($result)>0) {
        $total=0;
        echo "<table border='1' frame='void' rules='rows' style='width: 50%; text-align: center;'>";
        echo "<tr style='color: #83756e; font-size: 16pt;'>
                    <th>Photo|<br><br></th>
                    <th>Reference|<br><br></th>
                    <th>Name|<br><br></th>
                    <th>Price|<br><br></th>
                    <th>Quantity|<br><br></th>
                    <th><br><br></th></tr>";
                    while ($row=mysqli_fetch_assoc($result)) 
                    { 
                       echo "<tr>";
                       
                       foreach ($row as $field => $value) {
                        if ($field=="image")
                            {
                                echo "<td><img style='padding-top: 10px; width:100px; height: 150px;' src='admin/images/".$row['image']."'></td>";
                            }else {
                                echo "<td style='width:17%; font-size: 14pt;'><b>".$value."<b></td>"; 
                            }
                    
                        if ($field=="price") {
                            $pr=explode(" ",$value);
                            $val= (int) $pr[0];
                            $quantity=$row['quantity'];
                            $total=$total+$quantity*$val;
                        }
                    }
                    echo "<td style='width:auto';><form action ='' method='post'>
                                <input type='hidden' name='image' value='".$row['image']."'>
                                <input type='hidden' name='Ref' value='".$row['reference']."'>
                                <input type='hidden' name='name' value='".$row['name']."'>
                                <input type='hidden' name='price' value='".$row['price']."'>
                                <input type='hidden' name='quantity' value='".$row['quantity']."'>
                                <input style='cursor: pointer;
                                height: 30px;
                                text-align: center;
                                color : #702626 ;
                                border-radius: 20px;
                                border-color: #702626;
                                font-size: 20px;
                                background-color: #D4C7BE ;
                                width: 30px;' type='submit' name='Del' value='x'></form></td>"; 
                    if(isset($_POST["Del"])) {
                        $ref=$_POST["Ref"];
                        $name=$_POST["name"];
                        $image=$_POST["image"];
                        $price=$_POST["price"];
                        $quantity=$_POST["quantity"];

                        $rq="DELETE FROM cart WHERE reference='$ref' AND name='$name' AND image='$image' AND price='$price' AND quantity='$quantity' ";
                        $res=mysqli_query($conn,$rq);  

                        $qr="SELECT productQuantity FROM product WHERE productReff='$ref' ";
                        $resultat=mysqli_query($conn,$qr);
                        $array=mysqli_fetch_assoc($resultat);
                        $stockQuantity=$array['productQuantity'];
                        $newQuantity=$stockQuantity+$quantity;

                        $rq1=" UPDATE product SET productQuantity='$newQuantity' WHERE productReff='$ref'";
                        $result1=mysqli_query($conn,$rq1);
                        }   
                        
                }
                echo "</tr>"; 
                echo "</table>";
                echo "<div style='width: 25%; color: #83756e; text-align: center; font-size: 18pt; border: 2px solid #83756e; position: absolute; right: 150px;'><b>Total Price : ".$total.",000 TND</b></div>";
                }
                
                            
        else {
                echo "<br><h1 style='text-align: center; color : #83756e ;'>Your Shopping Cart is Empty!</h1><br>";
            }
        ?>  
</form>

        </div><br><br><br>

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