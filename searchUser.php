<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="stylehomepage.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type"> 
        <title>AURORA</title>
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
        <div>
        <?php
        if(!empty($_POST['searchh']))
        {
            $conn=mysqli_connect("localhost", "root", "", "aurora");
           
            $keyword=$_POST['searchh'];

            $query="SELECT * FROM product where productReff like '%$keyword%' or productName like '%$keyword%'
            or productPrice like '%$keyword%' or category like '%$keyword%'" ;

            $result1=mysqli_query($conn,$query);
            if(mysqli_num_rows($result1)>0) {

                echo "<table  rules='rows' style='width: 100%; text-align: center;'>";
        
                    while ($row=mysqli_fetch_assoc($result1)) 
                    { 
                       echo "<tr>";
                       
                       foreach ($row as $field => $value) {
                        if ($field=="image") {
                            echo "<td><img style=' width:70%; height: -10%;' src='admin/images/".$row['image']."'></td>";
                        }
                    }
                    echo "<td style='width:auto;'><form action ='' method='post'>
                                <button style='cursor: pointer;
                                height: 100px;
                                text-align: center;
                                color : #702626 ;
                                border-radius: 20px;
                                border-color: #702626;
                                font-size: 50px;
                                background-color: #D4C7BE ;
                                display: inline-block;
                                text-align: center;
                                width:auto;'><a href='detailsProductUser.php?ID={$row['productId']}'
                                style='text-decoration:none;color:#702626'>View Details</a></button>
                                </form></td>";
                }
                echo "</tr>"; 
        
                echo "</table>";
                } 
            
                     
                else {
                    echo "<br><h1 style='text-align: center; color : #83756e ;'>No Products Found!</h1><br>";
                }
        }

        ?>

        </div>
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