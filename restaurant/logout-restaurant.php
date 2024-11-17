<?php
    include('../config/constants.php');
    // authorization action ctrl
    // check whether the user is logged in or not
    $email = $_SESSION['restaurant_name'];
    unset($_SESSION['restaurant_name']);

    // query to set inactive
    $sql = "UPDATE restaurants SET active = 'No' WHERE restaurant_name = '$restaurant_name'";
    $res = mysqli_query($conn,$sql);

    header('location:'.SITEURL.'restaurant/login-restaurant.php');
?>