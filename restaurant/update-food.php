<?php
     include('../config/constants.php') ;
     include('login-check-restaurant.php') ;
     $restaurant_name = $_GET['restaurant_name'];
     $title = $_GET['title'];
     $image_name = $_GET['image_name'];
     $sql = "SELECT price FROM foods WHERE title = '$title'";

     $res = mysqli_query($conn,$sql);

     $row = mysqli_fetch_assoc($res);
     $price = $row['price'];
?>


<html>
    <head>
        <title>FOODIES -restaurant-panel</title>
        <link rel="stylesheet" href="../css/admin.css">

    </head>
    <body>
        <!-- MENU section starting -->
        <div class = "menu text-center">
            <div class = "wrapper">
                <ul>
                    <!-- <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admins</a></li>
                    <li><a href="manage-restaurant.php">Restaurants</a>
                    <li><a href="manage-rider.php">Riders</a>
                    <li><a href="manage-category.php">Category</a></li>-->
                    <li><a href="restaurant-menu.php?restaurant_name=<?php echo $restaurant_name;?>">Food</a></li> 
                    <li><a href="manage-order.php?restaurant_name=<?php echo $restaurant_name;?>">Order</a></li>
                    <li><a href="logout-restaurant.php">Logout</a></li>

                </ul>
            </div>
        </div>
        <!-- MENU section ending -->
        <?php
        //checking whether set or not
        if(isset($_GET['title']) AND isset($_GET['image_name']))
        {
            $title = $_GET['title'];
            $current_image = $image_name;

            $sql = "SELECT * FROM foods WHERE title = '$title'";

            $res = mysqli_query($conn,$sql);

            $count = mysqli_num_rows($res);

            if($count == 1)
            {
                $row = mysqli_fetch_assoc($res);
                
                $active = $row['active'];
                $popular = $row['popular'];

                
            }
            else
            {
                $_SESSION['no-food-found'] = "<div class = 'error'>Food Not Found </div>";
                header('location:'.SITEURL.'restaurant/restaurant-menu.php?restaurant_name='.$restaurant_name);
                    
            }
        }
        else
        {
            //redirect back to cat page
            header('location:'.SITEURL.'restaurant/restaurant-menu.php?restaurant_name='.$restaurant_name);

        }

?>

<div class = "main-content">
    <div class = "wrapper">
        <h1>Update Food - <?php echo $title ?></h1>
        <br><br>

        <?php

            // if(isset($_SESSION['add-category']))
            // {
            //     echo $_SESSION['add-category'];
            //     unset($_SESSION['add-category']);
            // }
            // if(isset($_SESSION['upload']))
            // {
            //     echo $_SESSION['upload'];
            //     unset($_SESSION['upload']);
            // }
        ?>

        <br>
        <br>
    
        <?php
           
        ?>

        <!-- add category part statgs -->
        <form action="" method = "post" enctype = "multipart/form-data"> 

            <table class = "tbl-40">
                <tr>
                    <td>Popular: </td>
                    <td>
                        <input <?php if($popular == "Yes") {echo "checked";} ?> type="radio" name = "popular" value = "Yes"> Yes
                        <input <?php if($popular == "No") {echo "checked";} ?> type="radio" name = "popular" value = "No"> No
                        
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active == "Yes") {echo "checked";}?> type="radio" name = "active" value = "Yes"> Yes
                        <input <?php if($active == "No") {echo "checked";}?> type="radio" name = "active" value = "No"> No
                        
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="text" name = "price" value = "<?php echo $price;?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            //display current image
                            if($current_image == "")
                            {
                                echo "NO IMAGE AVAILABLE!";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/foods/<?php echo $current_image; ?>" width = "100px">
                                <?php
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name = "image">
                    </td>

                </tr>

                <tr>
                    <td colspan = "2">
                        <input type="hidden" name = "current_image" value = "<?php echo $current_image ?>">
                        <input type="hidden" name = "title" value = "<?php echo $title ?>">
                        <input type="submit" name = "submit" value = "update food" class = "btn-secondary">
                        <input type="submit" name = "cancel" value = "cancel" class = "btn-danger">
                    </td>
                </tr>


            </table>

        </form>

        <?php
            if(isset($_POST['submit']))
            {
                if(isset($_POST['price'])) 
                {
                    $price = $_POST['price'];
                }
                
                $popular = $_POST['popular'];
                $active = $_POST['active'];
                $current_image = $_POST['current_image'];

                // upload new image
                    //check image selected or not
                
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];


                    if($image_name != "")
                    {
                        // new image paisi.. remame kore puran ta delete korbo

                        // renaming image ;)


                        // first we need to get the extension
                        $ext = end(explode('.',$image_name));
                        //rename img
                        $image_name = "Category_".$title.'_'.rand(000,999).'.'.$ext;


                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/foods/".$image_name;

                        

                        // uploading image part
                        $upload = move_uploaded_file($source_path,$destination_path);

                        // check whether upped or not
                        // if not then redirct with error msg

                        if($upload == FALSE)
                        {
                            // redirect and sh0w error
                            //$_SESSION['upload']= "<div class = 'error'><b>Upload Image!!</b> </div>";
                            //echo $image_name;
                            header('location:'.SITEURL.'restaurant/update-food.php?title='.$title.'image_name='.$image_name.'restaurant_name='.$restaurant_name);
                            //die(); // stop the process.. without image no category axpted
                        }

                        // delete old image file

                        $remove_path = "../images/foods/".$current_image;

                        $remove = unlink($remove_path);

                        // check whether removal succeeded or not

                        if($remove == FALSE)
                        {
                            // failed to remove prev img
                            $_SESSION['failed-to-remove-image']="<div class = 'error' > Failed to remove current image</div>";
                            header('location:'.SITEURL.'restaurant/restaurant-menu.php?restaurant_name='.$restaurant_name);
                        }
                    }
                    else
                    {
                        $image_name = $current_image;
                    }

                }
                else
                {
                    $image_name = $current_image;
                }
                

                //update database
                $sql2 = "UPDATE foods SET
                    active = '$active',
                    popular = '$popular',
                    price = '$price',
                    image_name = '$image_name'
                    WHERE title = '$title'
                ";

                $res2 = mysqli_query($conn,$sql2);

                if($res2 == TRUE)
                {
                    // done
                    $_SESSION['update'] = "<div class = 'success'> Food Updated</div>";
                    header("location:".SITEURL.'restaurant/restaurant-menu.php?restaurant_name='.$restaurant_name);

                }
                else
                {


                }

                //redirect

            }

            if(isset($_POST['cancel']))
            {
                header("location:".SITEURL.'restaurant/restaurant-menu.php?restaurant_name='.$restaurant_name);
            }
        ?>
        
        <!-- form ends here -->


        <br><br>
        <!-- Footer section starting -->
<div class = "footer">
            <div class = "wrapper">
                <p class = "text-center">All rights reserved. Designed By <a href="#">1905015 & 1905020</a></p>
            </div>
        </div>
        <!-- Footer section ending -->
    </body>
</html>
