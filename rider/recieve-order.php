<?php
    include("../config/constants.php");
    $order_id = $_GET['order_id'];
    $email = $_GET['email'];

    $sql2 = "UPDATE table_orders SET status = 'Out For Delivery' WHERE order_id = $order_id";

    $res2 = mysqli_query($conn,$sql2);

    if($res2 == TRUE)
    {
        $_SESSION['recieve'] = "<div class = 'success'> Order Received </div>";
        header('location:'.SITEURL.'rider/manage-order.php?email='.$email);

    }
    else
    {
        $_SESSION['recieve'] = "<div class = 'error'> Order Couldnot be Received </div>";
        header('location:'.SITEURL.'restaurant/manage-order.php?email='.$email);
    }

?>
