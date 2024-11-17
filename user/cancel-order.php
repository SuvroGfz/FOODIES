<?php
    include("../config/constants.php");
    $order_id = $_GET['order_id'];

    $user_id = $_GET['user_id'];

    $sql2 = "UPDATE table_orders SET status = 'Cancelled' WHERE order_id = '$order_id'";

    $res2 = mysqli_query($conn,$sql2);

    if($res2 == TRUE)
    {
        $_SESSION['order-action'] = "Order id - ".$order_id." <div class = 'error'> Was Cancelled </div>";
        header('location:'.SITEURL.'user/user-orders.php?id='.$user_id);

    }
    else
    {
        $_SESSION['order-action'] = "<div class = 'error'> Order Couldnot be Cancelled </div>";
        header('location:'.SITEURL.'user/user-orders.php?id='.$user_id);
    }
?>