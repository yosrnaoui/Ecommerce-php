<?php
session_start();

    include("connection.php");
    include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name=$_POST["name"];
            $mail=$_POST["mail"];
            $psw1=md5($_POST["psw1"]);
            $psw2=md5($_POST["psw2"]);
            
            if( !is_numeric($name))
            {
                //check if the user exist already or not
                $request="SELECT username FROM member WHERE email='$mail' ";
                $result=mysqli_query($conn,$request);

                if (mysqli_num_rows($result)>0) {
                    echo "<script type=\"text/javascript\">alert('You already have an account!');</script>";
                }
                // confirm password
                else if ($psw1!==$psw2) {
                    echo "<script type=\"text/javascript\">alert('Please check your password!');</script>";
                }
                // save to database
                else { 
                    $user_id = random_num(20); 
                    $query="INSERT INTO member (user_id,username,email,password) VALUES ('$user_id','$name','$mail','$psw1')";
                    $result=mysqli_query($conn,$query);
                    echo "<script type=\"text/javascript\">alert('You are now a member of AURORA. Thanks for joining us!');</script>";
                }
                header("Location:login1.php");
                die;
            }
            else
            {
                echo "Please enter some valid information";
            }            
            }
?>
<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="stylehomepage.css" >
        <link rel="stylesheet" href="login.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type"> 
	    <title>Sign Up</title>
    </head>
    
    <body>
        <script>
            function test() {
            var checker = document.getElementById('terms');
            var sendbtn = document.getElementById('submit');
            if (checker.checked==false) {
                sendbtn.disabled = true ;
                sendbtn.style.cursor="not-allowed";
            }
            else { 
                sendbtn.disabled = false;
                sendbtn.style.cursor="pointer";
            }
        }
        </script>
        <a href="home.php"><img src="pictures/brand.png"></a>
        <table class="s">
        	<tr>
        		<td id="Search">
                   <form method="post" action="search.php"> 
                        <input class="b" type="text" placeholder="Search.." name="searchh">
                        <button id="btn" type="submit" name="submit"><i class="fa fa-search"></i></button>
                   </form>
                </td>
        		<td>
        		   <nav class="search">
        		   	    <ul>
        		   	    	<li> <a href="help.php"><img src="pictures/help.png" id="img"> help</a> </li>
        		   	    	<li> <a href="login1.php"><img src="pictures/login.png" id="img"> Login</a> </li>
        		   	    </ul>
        		   </nav>	
        		</td>
        	</tr>
        </table>
        <nav class="menu">
        	<ul>
                 <li><a href="Women.php">Women</a></li>
                 <li><a href="men.php">Men</a></li>
                 <li><a href="#contact">Contact Us</a></li>
            </ul>
        </nav>
        
         <br><br> 
        <table id="titles">
               <tr>
                   <td id="td1"><img id="im" src="pictures/login.png" ><b> Sign Up </b></td>  
               </tr>
        </table><br><br>
        <div id="d1">
        <form class="form" action="" method="post">
            <img src="pictures/name.png" width="20px" height="20px">
            <b> USer Name </b>
            <br>
            <input class="loginmail" type="text" name="name" placeholder="Enter email or username" required><br><br>
            <img src="pictures/login.png" width="20px" height="20px">
            <b> E-mail </b>
            <br>
            <input class="loginmail" type="email" name="mail" placeholder="Enter email or username" required><br><br>
            <img src="pictures/psw.png" width="20px" height="20px">   
            <b> Password</b>
            <br>
            <input class="loginmail" type="password" placeholder="Enter Password" name="psw1" required><br><br>
            <img src="pictures/psw.png" width="20px" height="20px">   
            <b> Confirm Password</b>
            <br>
            <input class="loginmail" type="password" placeholder="Confirm Password" name="psw2" required><br>
            <br>
            <input type="checkbox" value="terms" id="terms" onchange="test();" checked> By creating an account you agree to our <a href="policy.pdf" style="color:#8a8079"> Terms & Privacy</a>.<br><br>
            <div >
            <input type="reset" name="reset" value="Cancel" class="button">
            <input type="submit" name="submit" value="signup" class="button">
            </div><br>
            I already have an account <a href="login1.php" style="color:#8a8079"> Login</a> !
        </form>
        <br><br>
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