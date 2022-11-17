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
                 <li><a href="#about">About Us</a></li>
                 <li><a href="#contact">Contact Us</a></li>
            </ul>
        </nav>
        <div style="width:100%">
             <img class="mySlides" src="pictures/slider3.png">
             <img class="mySlides" src="pictures/slider2.jpg">
             <img class="mySlides" src="pictures/slider1.jpg" >
         </div>
         <div id="aboutus">
             <h2 id="about">About Us</h2>
             <p>We founded <b>AURORA</b> in order to secure a better future and enviornment...With the existing of fast fashion, there is a heavy burden on the enviornment because of all the waste. And for that we have created our brand in order for you to invest in an amazing quality clothes that will last for you and help save our planet.
             <br><b>Sustainable:</b> AURORA sources the world's most sustainable materials, including Organic Cotton, Recycled Polyester, and Lenzing Modal.
             <br><b>Ethical:</b> Our Factories around the world hold the highest certifications in the industry, ensuring the best working conditions, and the highest level of sustainable production processes. 
             <br><b>Impactful:</b> Our partnership with the International Rescue Committee allows our profits to benefit in-need communities around the world.</p>   
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
         <script>
      var myIndex = 0;
      carousel();
      function carousel() {
          var i;
          var x = document.getElementsByClassName("mySlides");
          for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";  
           }
          myIndex++;
          if (myIndex > x.length) {myIndex = 1}    
          x[myIndex-1].style.display = "block";  
         setTimeout(carousel, 2000); // Change image every 2 seconds   
        }
       </script>   
    </body>
</html>