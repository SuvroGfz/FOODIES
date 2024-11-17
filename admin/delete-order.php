<?php
        // include constants.php
        include('../config/constants.php');

        // get the id / username of admin to be deleted
        $id = $_GET['order_id'];

        //delete admin query
        $sql = "DELETE FROM table_orders WHERE order_id = $id";

        $res = mysqli_query($conn, $sql);

        // check whether successful query or not
        if($res == TRUE)
        {
            // show message 
            //echo 'Admin deleted';
            // create session variable and display message
            $_SESSION['delete'] ="<div class = 'success'>Order Deleted Successfully</div>";
            header('location:'.SITEURL.'admin/manage-order.php');
        }
        else
        {
            //echo 'Failed to delete admin';
            $_SESSION['delete'] = "<div class = 'error'>Failed to delete order, try again later</div>";
            header('location:'.SITEURL.'admin/manage-order.php');

        }

        // redirect to manage admin page with message(error/success)
        

    ?>