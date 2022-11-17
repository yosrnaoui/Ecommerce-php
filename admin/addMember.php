<?php
session_start();

    include("connection.php");
    include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name=$_POST["name"];
            $mail=$_POST["mail"];
            $psw1=md5($_POST["psw1"]);
            $psw2=md5($_POST["psw2"]);

            if(!is_numeric($mail))
            { 
                //check if the user exist already or not
                $request="SELECT username FROM member WHERE password='$psw1' AND email='$mail' ";
                $result=mysqli_query($conn,$request);

                if (mysqli_num_rows($result)>0) {
                    echo "<script type=\"text/javascript\">alert('User exist already !');</script>";
                }
                // confirm password
                else if ($psw1!=$psw2) {
                    echo "<script type=\"text/javascript\">alert('Please check your password!');</script>";
                }
                // save to database
                else { 
                    $user_id = random_num(20); 
                    $query="INSERT INTO member (user_id,username,email,password) VALUES ('$user_id','$name','$mail','$psw1')";
                    $result=mysqli_query($conn,$query);
                    echo "<script type=\"text/javascript\">alert('You are now a member of AURORA. Thanks for joining us!');</script>";
                    header("Location:managementMember.php");
                    die;
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
        <link rel="stylesheet" href="add.css" >
        <link rel="stylesheet" href="stylehomepage.css" >
        <meta charset="utf-8"> 
        <title>Add Member</title>
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
                   <td id="td1"><b> Add Member </b></td>  
               </tr>
        </table><br>
        <a href="managementMember.php"><img src="pictures/previous.png" id="img"></a>
        <div id="d1">
          <form class="form" action="" method="post">
            <img src="pictures/name.png" width="20px" height="20px">
            <b> User Name </b>
            <br>
            <input class="formulaire" type="text" name="name" placeholder="Enter username" required><br><br>
            <img src="pictures/login.png" width="20px" height="20px">
            <b> E-mail </b>
            <br>
            <input class="formulaire" type="email" name="mail" placeholder="Enter email" required><br><br>
            <img src="pictures/psw.png" width="20px" height="20px">   
            <b> Password</b>
            <br>
            <input class="formulaire" type="password" placeholder="Enter Password" name="psw1" required><br><br>
            <img src="pictures/psw.png" width="20px" height="20px">   
            <b> Confirm Password</b>
            <br>
            <input class="formulaire" type="password" placeholder="Confirm Password" name="psw2" required><br>
            <br>
            <div >
            <input type="reset" name="reset" value="Cancel" class="button">
            <input type="submit" name="submit" value="Add" class="button">
            </div><br>
           </form>
        </div>
    
    </body>
</html>