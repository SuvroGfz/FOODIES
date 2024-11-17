<?php
        // include constants.php
        include('../config/constants.php');

        // get the id / username of admin to be deleted
        $menu_id = $_GET['menu_id'];

        //delete restaurants query
        $sql = "DELETE FROM restaurants WHERE menu_id = $menu_id";

        $res = mysqli_query($conn, $sql);

        // check whether successful query or not
        if($res == TRUE)
        {
            // show message 
            //echo 'Admin deleted';
            // create session variable and display message
            $_SESSION['delete'] ="<div class = 'success'>Restaurant Deleted Successfully</div>";
            header('location:'.SITEURL.'admin/manage-restaurant.php');
        }
        else
        {
            //echo 'Failed to delete admin';
            $_SESSION['delete'] = "<div class = 'error'>Failed to delete restaurant, try again later</div>";
            header('location:'.SITEURL.'admin/manage-restaurant.php');

        }

        // redirect to manage admin page with message(error/success)
        

?>