<?php
session_start();

    include("connection.php");
    include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $input=$_POST["input"];
            $psw=md5($_POST["psw"]);
            
            if(!empty($input) && !empty($psw) && !is_numeric($input))
            { 
                $req="SELECT * FROM admin WHERE admin_name='$input' ";
                $result=mysqli_query($conn,$req);

                if (mysqli_num_rows($result)<1) {
                    echo "<script type=\"text/javascript\">alert('Please check your coordinates!');</script>";
                }
                else {
                    if ($result && mysqli_num_rows($result) > 0 )
                    {
                        $admin_data = mysqli_fetch_assoc($result);
                        
                        if($admin_data['password'] === $psw)
                        {
                            $_SESSION['id'] = $admin_data['id'] ;
                            header("Location:adminHome.php");
                            die;
                        }
                    }
                }
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
	    <title>Login</title>
    </head>
    
    <body>
        
        <table id="titles">
               <tr>
                   <td id="td1"><img id="im" src="pictures/login.png" ><b> Login </b></td>  
               </tr>
        </table><br><br>
        <div id="d1">
        <form class="form" action="" method="POST">
            <img src="pictures/login.png" width="20px" height="20px">
            <b> E-mail / Username</b>
            <br>
            <input class="loginmail" type="text" name="input" placeholder="Enter email or username" required><br><br>
            <img src="pictures/psw.png" width="20px" height="20px">   
            <b> Password</b>
            <br>
            <input class="loginmail" type="password" placeholder="Enter Password" name="psw" required><br>
            <br>
            <div >
            <input type="reset" name="reset" value="Cancel" class="button">
            <input type="submit" name="submit" value="Login" class="button">
            </div><br><br>
             Still don't have an account? <a href="signUpAdmin.php" style="color:#8a8079"> Sign up</a> now!
        </form>
        </div><br><br>
    </body>
</html>