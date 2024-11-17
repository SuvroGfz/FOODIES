<?php include('../config/constants.php') ?>

<?php
    $email = $_SESSION['email'];
    // destroy sessions an redirect to login
    // session_destroy(); // unsets user-session also.. so logged out
    unset($_SESSION['email']);
    // redirect
    $_SESSION['logout-msg']="<div class = 'success'> Successfully Logged Out </div>";
    header('location:'.SITEURL.'user/login-user.php');

?>
