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
        <link rel="stylesheet" href="add.css" >
        <link rel="stylesheet" href="consult.css">
        <link rel="stylesheet" href="stylehomepage.css" >
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type"> 
        <title>Consult Order Delivery</title>
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
                <td id="td1"><b> 
                    <a href="managementDelivery.php"
                    style=" color : black ;text-decoration:none;"
                    > Consult Order Delivery </a> </b></td>  
                </tr>
        </table><br>
        <div id="Search">
            <form method="post" action="searchDelivery.php">
                <input class="b" type="text" placeholder="Search.." name="searchh">
                <button id="btn" type="submit" name="submit"><i class="fa fa-search"></i></button>
            </form>
        </div><br>
        
<table border="1" align="center" frame="void" style="width: 100%; text-align: center;" rules="rows">
<tr style="color: #83756e; font-size: 16pt;">
<th>Id Order</th>
<th>User Mail</th>
<th>Full Name</th>
<th>Phone Number</th>
<th>Person Address</th>
<th>City</th>
<th>Zip Code</th>
<th>Edit</th>
<th>Delete</th>
</tr>    

<?php

$request="SELECT * FROM personal_information";

$result=mysqli_query($conn,$request);

if(mysqli_num_rows($result)>0) {
    while ($row=mysqli_fetch_assoc($result)) {
        ?>
        <tr style="color: 'black'; font-size: 16pt;">
        <td style="width:auto;"><?php echo $row['ID_Order']; ?></td>
        <td style="width:auto;"><?php echo $row['User_mail']; ?></td>
        <td style="width:auto;"><?php echo $row['full_name']; ?></td>
        <td style="width:auto;"><?php echo $row['phone_number']; ?></td>
        <td style="width:auto;"><?php echo $row['person_address']; ?></td>
        <td style="width:auto;"><?php echo $row['city']; ?></td>
        <td style="width:auto;"><?php echo $row['zip_code']; ?></td>
        <!-- Edit Button -->
        <td ><a style="cursor: pointer;
                        height: 20px;
                        text-align: center;
                        color : #702626 ;
                        border-radius: 20px;
                        border-color: #702626;
                        font-size: 30px;
                        background-color: #D4C7BE ;
                        display: inline-block;
                        text-align: left;
                        text-decoration: none;
                        width: auto;" style="decoration:none;" href="editDelivery.php?ID=<?php echo $row['ID_Order']; ?> " alt="edit" >Edit</a> </td>
        <!-- Delete Button-->
        <td> <input style="cursor: pointer;
                        height: 30px;
                        text-align: center;
                        color : #702626 ;
                        border-radius: 20px;
                        border-color: #702626;
                        font-size: 20px;
                        background-color: #D4C7BE ;
                        display: inline-block;
                        text-align: right;
                        width: auto;" type="button" onClick="deleteme(<?php echo $row['ID_Order'];?>)" name="Delete" value="Delete"> </td> 
        </tr>
        <!-- JavaScript function for deleting data -->
        <script language="javascript">
        function deleteme(delid) {
            if(confirm("Do you want to delete!")) {
                window.location.href='deleteDelivery.php?del_id=' +delid+'';
                return true;
            }
        }
        </script>
        <?php
    }

   }
   else {
        ?>
        <tr style="color: #83756e; font-size: 16pt;">
        <th colspan="9"> No deliveries found! </th>
        </tr>
        <?php
        }
        ?>
        </table> 

    </body>

</html>