<?php
        // include constants.php
        include('../config/constants.php');

        // get the id / username of admin to be deleted
        $rider_id = $_GET['rider_id'];

        //delete restaurants query
        $sql = "DELETE FROM riders WHERE rider_id = $rider_id";

        $res = mysqli_query($conn, $sql);

        // check whether successful query or not
        if($res == TRUE)
        {
            // show message 
            //echo 'Admin deleted';
            // create session variable and display message
            $_SESSION['delete'] ="<div class = 'success'>Rider Deleted Successfully</div>";
            header('location:'.SITEURL.'admin/manage-rider.php');
        }
        else
        {
            //echo 'Failed to delete admin';
            $_SESSION['delete'] = "<div class = 'error'>Failed to delete Rider, try again later</div>";
            header('location:'.SITEURL.'admin/manage-rider.php');

        }

        // redirect to manage admin page with message(error/success)
        

?>