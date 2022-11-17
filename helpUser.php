<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="help.css" >
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
                   <form method="post" action="searchUSer.php">
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
                   <td id="td1"><img id="im" src="pictures/help.png"><b> Help </b></td>  
               </tr>
        </table><br><br>
        <h4>
            Checkout our frequently asked questions below. If you still can't find your answer, please contact us.
            <br>
            Our team is available 24H/24H from Monday to Friday.
        </h4>
        <br>
        <button class="question">Where are your products shipped from?</button>
        <div class="answer">
            <p>We ship from many countries around the world. With so many shipping centers across the country, we provide some of the fastest, most affordable delivery options in the industry</p>
        </div>
        <button class="question">How can I pay for my order?</button>
        <div class="answer">
            <p>Clothing Shop Online currently accepts Visa, MasterCard, Discover, and American Express.We also accept payment on delivery
            </p>
        </div>
        <button class="question">How long will it take me to get my order?</button>
        <div class="answer">
            <p>For standard shipping, you should receive your order within 4-5 business days.</p>
        </div>
        <button class="question">How can I check the status of my order?</button>
        <div class="answer">
            <p>We know you can't wait to receive your order, which is why we will be sure to notify you when your order ships via email.</p>
        </div>
        <button class="question">Can I cancel or change my order?</button>
        <div class="answer">
            <p>We begin processing orders as soon as they are placed, for this reason we are unable to cancel or make changes to orders.</p>
        </div>
        <button class="question">Can I exchange my order?</button>
        <div class="answer">
            <p>We are sorry to inform you that we do not offer exchanges at this time.</p>
        </div>
        <button class="question">What do I do if my order is damaged?</button>
        <div class="answer">
            <p>We are so sorry to hear that your order arrived in less than pristine condition! Please let us make it right. Our customer service team will be more than happy to assist with processing a replacement order or issuing a refund. You can find our contact information <a href="#contact">here</a></p>
        </div>
        <button class="question">Why did I only receive part of my order?</button>
        <div class="answer">
            <p>Don't worry, it's on its way! While we do our best to ship all orders in one package, there are times when orders will ship from multiple countries.</p>
        </div>
        <button class="question">I received the wrong goods, what do I do?</button>
        <div class="answer">
            <p>Although we strive for perfection, we are human and sometimes the wrong items are shipped from our warehouses. We are so sorry for any inconvenience this has caused and our customer service team is here to help make things right. Please contact our customer service team <a href="#contact">here</a></p>
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
         <script>
            var acc = document.getElementsByClassName("question");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var answer = this.nextElementSibling;
               if (answer.style.display === "block") {
                answer.style.display = "none";
               } else {
               answer.style.display = "block";
               }
               });
            }
</script>
    </body>
</html>