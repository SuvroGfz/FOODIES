<?php
     include('../config/constants.php') ;
     include('login-check-rider.php') ;
     $email=$_GET['email'];
?>
<html>
    <head>
        <title>FOODIES -rider-panel</title>
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
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li> -->
                    <li><a href="<?php echo SITEURL;?>rider/profile-rider.php?email=<?php echo $email;?>">Profile</a></li>
                    <li><a href="<?php echo SITEURL;?>rider/manage-order.php?email=<?php echo $email;?>">Order</a></li>
                    <li><a href="logout-rider.php">Logout</a></li>

                </ul>
            </div>
        </div>
        <!-- MENU section ending -->