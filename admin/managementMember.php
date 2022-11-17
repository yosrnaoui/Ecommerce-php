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
        <title>Consult Member</title>
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
                    <a href="managementMember.php"
                    style=" color : black ;text-decoration:none;"
                    > Consult Member </a> </b></td>  
            </tr>
        </table><br>
        <div id="Search">
            <form method="post" action="searchMember.php">
                <input class="b" type="text" placeholder="Search.." name="searchh">
                <button id="btn" type="submit" name="submit"><i class="fa fa-search"></i></button>
            </form>
        </div><br>
        <a href="addMember.php" 
            style=" cursor: pointer;height: 50px;
                    border-radius : 10px;text-align: center;
                    color : white ;background-color: #83756e ;
                    font-size: 20px;width: 150px;
                    margin: center;padding: 10px;text-decoration:none;">Add Member</a><br><br> 

<table border="1" align="center" frame="void" style="width: 100%; text-align: center;" rules="rows">
<tr style="color: #83756e; font-size: 16pt;">
<th>Id</th>
<th>User_Id</th>
<th>user_name</th>
<th>E-mail</th>
<th>Password</th>
<th>Date</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php

$sql="SELECT * FROM member";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0) {
    while ($row=mysqli_fetch_assoc($result)) {
        ?>
        <tr style="color: 'black'; font-size: 16pt;">
        <td style="width:auto;"><?php echo $row['id']; ?></td>
        <td style="width:auto;"><?php echo $row['user_id']; ?></td>
        <td style="width:auto;"><?php echo $row['username']; ?></td>
        <td style="width:auto;"><?php echo $row['email']; ?></td>
        <td style="width:auto;"><?php echo $row['password']; ?></td>
        <td style="width:auto;"><?php echo $row['date']; ?></td>
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
                        width: auto;" style="decoration:none;" href="editMember.php?ID=<?php echo $row['user_id']; ?> " alt="edit" >Edit</a> </td>
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
                        width: auto;" type="button" onClick="deleteme(<?php echo $row['user_id'];?>)" name="Delete" value="Delete"> </td> 
        </tr>
        <!-- JavaScript function for deleting data -->
        <script language="javascript">
        function deleteme(delid) {
            if(confirm("Do you want to delete <?php echo $row['username'];?>!")) {
                window.location.href='delete.php?del_id=' +delid+'';
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
        <th colspan="8"> Add member </th>
        </tr>
        <?php
        }
        ?>
        </table> 

</body>

</html> 

