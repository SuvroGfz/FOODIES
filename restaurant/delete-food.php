<?php
     include('../config/constants.php') ;
     include('login-check-restaurant.php') ;

     $restaurant_name=$_GET['restaurant_name'];
     $title = $_GET['title'];
     $image_name = $_GET['image_name'];
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
         <!-- main content section starting -->
 <div class = "main-content">
            <div class="wrapper">
            <h1>Manage My Menu</h1>

<br /><br/><br/>

<!-- button to add category -->
<?php
if(isset($_GET['title']) AND isset($_GET['image_name']))
{
    $title = $_GET['title'];
    $image_name = $_GET['image_name'];
}
else
{
    //redirect back to cat page
    header('location:'.SITEURL.'restaurant/restaurant-menu.php?restaurant_name='.$restaurant_name);

}
// get the cat title to be deleted

// remove physical image file // path khuji
$path = "../images/food/".$image_name;
// delete image file
$remove = unlink($path); // bool return korbe, jodi remove korte pare taile true, naile false
if($remove == FALSE)
{
    $_SESSION['delete'] = "<div class = 'error'>Failed to delete category image</div>";
    header('location:'.SITEURL.'restaurant/restaurant-menu.php?restaurant_name='.$restaurant_name);
}

//delete category query
$sql = "DELETE FROM foods WHERE title = '$title'";

$res = mysqli_query($conn, $sql);

// check whether successful query or not
if($res == TRUE)
{
    // show message 
    //echo 'Admin deleted';
    // create session variable and display message
    $_SESSION['delete'] ="<div class = 'success'>food Deleted Successfully</div>";
    header('location:'.SITEURL.'restaurant/restaurant-menu.php?restaurant_name='.$restaurant_name);
}
else
{
    //echo 'Failed to delete admin';
    $_SESSION['delete'] = "<div class = 'error'>Failed to delete food, try again later</div>";
    header('location:'.SITEURL.'restaurant/restaurant-menu.php?restaurant_name='.$restaurant_name);

}

// redirect to manage cat page with message(error/success)


?>

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