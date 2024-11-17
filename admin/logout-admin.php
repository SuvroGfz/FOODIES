<?php include('../config/constants.php') ?>

<?php
    // destroy sessions an redirect to login
    // session_destroy(); // unsets user-session also.. so logged out
    unset($_SESSION['user']);
    echo '<script>alert("Logged Out Successfully")</script>';

    // redirect
    header('location:'.SITEURL.'admin/login-admin.php');

?>
