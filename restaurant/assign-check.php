<?php
    include("../config/constants.php");

    $order_id = $_GET['order_id'];
    $rider_id = $_GET['rider_id'];
    $restaurant_name = $_GET['restaurant_name'];

    $sql1 = "SELECT * FROM restaurants WHERE restaurant_name = '$restaurant_name'";
    $res1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $restaurant_location = $row1['location'];

    // echo $order_id;echo $rider_id;echo $restaurant_name;
    $sql = "UPDATE table_orders SET status = 'Waiting For Rider',rider_id = '$rider_id' WHERE order_id = '$order_id'";
    $sql2 = "UPDATE riders SET current_location = '$restaurant_location', current_order = '$order_id' WHERE rider_id = $rider_id";
    

    $res = mysqli_query($conn,$sql);
    $res2 = mysqli_query($conn,$sql2);

    if($res == TRUE && $res2 == TRUE)
    {
        $_SESSION['order-action'] = "<div class = 'success'> Order Sent to Rider </div>";
        header('location:'.SITEURL.'restaurant/manage-order.php?restaurant_name='.$restaurant_name);
    }
    else
    {
        $_SESSION['order-action'] = "<div class = 'error'> Failed to Send order to Rider </div>";
        header('location:'.SITEURL.'restaurant/manage-order.php?restaurant_name='.$restaurant_name);

    }
?>