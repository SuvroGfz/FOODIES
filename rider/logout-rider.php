<?php
    include('../config/constants.php');
    // authorization action ctrl
    // check whether the user is logged in or not
    $email = $_SESSION['email'];
    unset($_SESSION['email']);

    // query to set inactive
    $sql = "UPDATE riders SET active = 'No' WHERE email = '$email'";
    $res = mysqli_query($conn,$sql);

    header('location:'.SITEURL.'rider/login-rider.php');
?>