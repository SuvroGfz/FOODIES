<?php
    include("../config/constants.php");
    $id = $_GET['order_id'];

    $sql = "SELECT * FROM table_orders WHERE order_id = '$id'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $restaurant_name = $row['restaurant_name'];


    $sql2 = "UPDATE table_orders SET status = 'Cooking' WHERE order_id = '$id'";

    $res2 = mysqli_query($conn,$sql2);

    if($res2 == TRUE)
    {
        $_SESSION['order-action'] = "<div class = 'success'> Order Accepted </div>";
        header('location:'.SITEURL.'restaurant/manage-order.php?restaurant_name='.$restaurant_name);

    }
    else
    {
        $_SESSION['order-action'] = "<div class = 'error'> Order Couldnot be Accepted </div>";
        header('location:'.SITEURL.'restaurant/manage-order.php?restaurant_name='.$restaurant_name);
    }
?>
