<?php

function check_login($conn) 
{
    if (isset($_SESSION['id']))
    {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM admin WHERE id ='$id' limit 1 ";

        $result = mysqli_query($conn,$query);
        if ($result && mysqli_num_rows($result) > 0 )
        {
            $admin_data = mysqli_fetch_assoc($result);
            return $admin_data;
        }
    }
    //redirect to login
    header("Location:login.php");
    die;
}
function check_product($conn) 
{
    if (isset($_SESSION['productId']))
    {
        $id = $_SESSION['productId'];
        $query = "SELECT * FROM womenproduct WHERE productID ='$id' limit 1 ";

        $result = mysqli_query($conn,$query);
        if ($result && mysqli_num_rows($result) > 0 )
        {
            $product_data = mysqli_fetch_assoc($result);
            return $product_data;
        }
    }
    //redirect to login
    header("Location:addWomenProduct.php");
    die;
}

function random_num($length)
{
    $text ="";
    if($length < 5 )
    {
        $length = 5;
    }
    $len = rand(4,$length);

    for($i=0;$i < $len; $i++) 
    {
        $text .= rand(0,9);
    }
    return $text;
}


?>