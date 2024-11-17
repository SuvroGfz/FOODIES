<?php
        // include constants.php
        include('../config/constants.php');

        //checking whether set or not
        if(isset($_GET['title']) AND isset($_GET['image_name']))
        {
            $title = $_GET['title'];
            $image_name = $_GET['image_name'];
        }
        else
        {
            //redirect back to cat page
            header('location:'.SITEURL.'admin/manage-category.php');

        }
        // get the cat title to be deleted

        // remove physical image file // path khuji
        $path = "../images/categories/".$image_name;
        // delete image file
        $remove = unlink($path); // bool return korbe, jodi remove korte pare taile true, naile false
        if($remove == FALSE)
        {
            $_SESSION['delete'] = "<div class = 'error'>Failed to delete category image</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }

        //delete category query
        $sql = "DELETE FROM categories WHERE title = '$title'";

        $res = mysqli_query($conn, $sql);

        // check whether successful query or not
        if($res == TRUE)
        {
            // show message 
            //echo 'Admin deleted';
            // create session variable and display message
            $_SESSION['delete'] ="<div class = 'success'>Category Deleted Successfully</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //echo 'Failed to delete admin';
            $_SESSION['delete'] = "<div class = 'error'>Failed to delete category, try again later</div>";
            header('location:'.SITEURL.'admin/manage-category.php');

        }

        // redirect to manage cat page with message(error/success)
        

    ?>

<?php include('partials/footer.php'); ?>