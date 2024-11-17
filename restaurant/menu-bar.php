<?php
     include('../config/constants.php') ;
     include('login-check-restaurant.php') ;

     $restaurant_name=$_GET['restaurant_name'];
?>
<html>
    <head>
        <title>FOODIES -restaurant-panel</title>
        <link rel="stylesheet" href="../css/admin.css">

    </head>
    <body>
        <!-- MENU section starting -->
        <div class = "menu text-center">
            <div class = "wrapper">
                <ul>
                    <!-- <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admins</a></li>
                    <li><a href="manage-restaurant.php">Restaurants</a>
                    <li><a href="manage-rider.php">Riders</a>
                    <li><a href="manage-category.php">Category</a></li>-->
                    <li><a href="restaurant-menu.php?restaurant_name=<?php echo $restaurant_name;?>">Food</a></li> 
                    <li><a href="manage-order.php?restaurant_name=<?php echo $restaurant_name;?>">Order</a></li>
                    <li><a href="logout-restaurant.php">Logout</a></li>

                </ul>
            </div>
        </div>
        <!-- MENU section ending -->
         <!-- main content section starting -->
