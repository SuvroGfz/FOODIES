<?php
    // authorization action ctrl
    // check whether the user is logged in or not

    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message'] = "<div class = 'error'>Please login to access admin panel.</div>";
        //redirect
        header('location:'.SITEURL.'admin/login-admin.php');
    }
?>