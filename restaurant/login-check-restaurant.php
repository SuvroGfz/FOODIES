<?php
    // authorization action ctrl
    // check whether the user is logged in or not

    if(!isset($_SESSION['restaurant_name']))
    {
        $_SESSION['no-login-message'] = "<div class = 'error'>Please login to enter your dashboard.</div>";
        //redirect
        header('location:'.SITEURL.'restaurant/login-restaurant.php');
    }
?>