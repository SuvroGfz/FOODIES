<?php 
    include('../config/constants.php');

?>


<html>
    <head>
        <title>Restaurant Login - FOODIES</title>
        <link rel = "stylesheet" href = "../css/restaurant.css">
    </head>

    <body>

        <!-- <img src="../images/rider-bg.jpg" class = ""> -->

    <!--<section class = "login-bg-img">-->
        <div class = "restaurant-sign-in-blur">
            <div class="login img-bg">
                <img src="../images/logo.png" class = "img-responsive">
                <h1 class="text-center text-with-stroke">Restaurant Login</h1>

                <br><br>
                
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    if(isset($_SESSION['no-login-message']))
                    {
                        echo $_SESSION['no-login-message'];
                        unset($_SESSION['no-login-message']);
                    }
                    
                ?>
                <br><br>

                <form action="" method = "POST" class = "text-center"   >
                    <div class = "text-white"><b>Restaurant Name:</b></div>
                    
                    <br>
                    <input type="restaurant_name" name = "restaurant_name" placeholder = "Enter Your restaurant name">

                    <br><br>
                    <div class = "text-white"><b>Password:</b></div>
                    
                    <br>
                    <input type="password" name = "password" placeholder = "Enter Your Password">

                    <br><br>
                    <input type="submit" name = "submit" value = "Login" class = "btn-primary">
                    <input type="submit" name = "home" value = "Home" class = "btn-primary">

                    <br><br>
                </form>

                <p class="text-center">
                    Created by <a href="#">1905015</a> and <a href="#">1905020</a>
                </p>
            </div>
        </div>
        </section>
    </body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        // //button clicked
        // //echo "BUTTON CLICKED";
        // //get the data from the form
        
        $restaurant_name = $_POST['restaurant_name'];
        $password = md5($_POST['password']);//password encryption

        $sql = "SELECT * FROM restaurants WHERE restaurant_name='$restaurant_name' AND password = '$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            // set active status ------------------------
            $sql2 = "UPDATE restaurants SET active = 'Yes' WHERE restaurant_name = '$restaurant_name'";
            $res2 = mysqli_query($conn,$sql2);

            // at least one user is there
            $_SESSION['login'] = "<div class = 'success'>Login Successful</div>";
            $_SESSION['restaurant_name'] = $restaurant_name; // check whether admin is logged in or not

            header('location:'.SITEURL.'restaurant/restaurant-menu.php?restaurant_name='.$restaurant_name);
        }
        else
        {
            // no user available
            $_SESSION['login'] = "<div class = 'error'>Login Failed</div>";
            header('location:'.SITEURL.'restaurant/login-restaurant.php');
        }
    }
    if(isset($_POST['home']))
    {
        header('location:'.SITEURL.'common/login-all.php');
    }
?>