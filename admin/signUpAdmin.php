<?php
session_start();

    include("connection.php");
    include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name=$_POST["name"];
            $psw1=md5($_POST["psw1"]);
            $psw2=md5($_POST["psw2"]);
            $key=$_POST["key"];
            
            if(!empty($name) && !empty($psw1) && !empty($psw2) && !is_numeric($name) && $key=='admin' )
            {   
                //check if the user exist already or not
                $request="SELECT username FROM admin WHERE username='$name' OR email='$mail' ";
                $result=mysqli_query($conn,$request);

                if (mysqli_num_rows($result)>0) {
                    echo "<script type=\"text/javascript\">alert('Admin already have an account!');</script>";
                }
                // confirm password
                else if ($psw1!=$psw2) {
                    echo "<script type=\"text/javascript\">alert('Please check your password!');</script>";
                }
                // save to database
                else { 
                    $query="INSERT INTO admin (admin_name,password) VALUES ('$name','$psw1')";
                    $result=mysqli_query($conn,$query);
                    echo "<script type=\"text/javascript\">alert('You are now an admin of AURORA!');</script>";
                }
                header("Location:login.php");
                die; 
            }
            else
            {
                echo "<script type=\"text/javascript\">alert('Please enter some valid information!');</script>";
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
	    <title>Sign Up Admin</title>
    </head>
    
    <body>
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
            <img src="pictures/psw.png" width="20px" height="20px">   
            <b> Password</b>
            <br>
            <input class="loginmail" type="password" placeholder="Enter Password" name="psw1" required><br><br>
            <img src="pictures/psw.png" width="20px" height="20px">   
            <b> Confirm Password</b>
            <br>
            <input class="loginmail" type="password" placeholder="Confirm Password" name="psw2" required><br><br>
            <img src="pictures/psw.png" width="20px" height="20px">   
            <b> Registration Key</b>
            <br>
            <input class="loginmail" type="password" placeholder="Enter the administrator registration key" name="key" required><br><br>
            <div >
            <input type="reset" name="reset" value="Cancel" class="button">
            <input type="submit" name="submit" value="signup" class="button">
            </div><br>
            Admin already have an account <a href="login1.php" style="color:#8a8079"> Login</a> !
        </form>
        <br><br>
        </div>

    </body>
</html>