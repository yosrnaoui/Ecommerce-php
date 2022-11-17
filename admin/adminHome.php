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
        <link rel="stylesheet" href="stylehomepage.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type"> 
	    <title>AURORA ADMIN</title>
    </head>
    
    <body>
        <a href="adminHome.php"><img src="pictures/brand.png"></a>
        <table class="s">
        	<tr>
        		<td>
        		   <nav class="search">
        		   	    <ul>
                            <li> <a href="logout.php"><img src="pictures/logout.png" id="img"> Logout</a> </li>
        		   	    </ul>
        		   </nav>	
        		</td>
        	</tr>
        </table><br><br>
        <nav class="menu">
        	<ul>
                <a  href="managementMember.php" 
                    style=" cursor: pointer;height: 50px;
                    border-radius : 10px;text-align: center;
                    color : white ;background-color: #83756e ;
                    font-size: 20px;width: 150px;
                    margin: center;padding: 10px;text-decoration:none;"> Member Management</a><br><br> 
                <a  href="managementdelivery.php" 
                    style=" cursor: pointer;height: 50px;
                    border-radius : 10px;text-align: center;
                    color : white ;background-color: #83756e ;
                    font-size: 20px;width: 150px;
                    margin: center;padding: 10px;text-decoration:none;"> Deliveries Management</a><br><br> 
                <a  href="product.php" 
                    style=" cursor: pointer;height: 50px;
                    border-radius : 10px;text-align: center;
                    color : white ;background-color: #83756e ;
                    font-size: 20px;width: 150px;
                    margin: center;padding: 10px;text-decoration:none;"> Product Management</a><br><br>     
            </ul>
        </nav>
    </body>
</html>