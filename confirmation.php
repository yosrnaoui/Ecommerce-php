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
	    <title>Confiramtion </title>
    </head>
    
    <body>
        <a href="homeUser.php"><img src="pictures/brand.png"></a>
        
         <br><br> 
        <table id="titles">
               <tr>
                   <td id="td1"><b> Confirmation </b></td>  
               </tr>
        </table><br>
        <div id="d1">
        
<form class="form" method="post" action="">
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
                                <input type='hidden' name='price' value='".$row['price']."'>
                                <input type='hidden' name='quantity' value='".$row['quantity']."'>
                                </form></td>"; 
                        
                }
                echo "</tr>"; 
                echo "</table>";
                echo "<div style='width: 25%; color: #83756e; text-align: center; font-size: 18pt; border: 2px solid #83756e; position: absolute; right: 150px;'><b>Total Price : ".$total.",000 TND</b></div>";
                }
        ?>  
</form>

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
                                <input type='hidden' name='price' value='".$row['price']."'>
                                <input type='hidden' name='quantity' value='".$row['quantity']."'>
                                </form></td>"; 
                        
                }
                echo "</tr>"; 
                echo "</table>";
                echo "<div style='width: 25%; color: #83756e; text-align: center; font-size: 18pt; border: 2px solid #83756e; position: absolute; right: 150px;'><b>Total Price : ".$total.",000 TND</b></div>";
                }
        ?>  
</form>

        </div><br><br><br>

        
    </body>
</html>    