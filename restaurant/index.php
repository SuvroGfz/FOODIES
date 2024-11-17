<?php
    include('restaurant-menu.php') ;
    // include('../config/constants.php') ;

    header("location:".SITEURL."restaurant/restaurant-sign-up.php");

    echo "HELLO RIDER";
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }

    
    // header('location:'.SITEURL.'rider/rider-sign-up.php');
?>