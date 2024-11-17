<?php
     include('../config/constants.php') ;
     include('login-check-rider.php') ;
?>
<?php
        if(isset($_GET['email']))
        {
            $email = $_GET['email'];

        }
        else
        {
            
            $_SESSION['no-login-message']="<div class = 'error'> Please Login to Access Your FOODIES Account</div>";
            header("location:".SITEURL."rider/login-rider.php");
        }
        
?>
<html>
    <head>
        <title>FOODIES -rider-panel</title>
        <link rel="stylesheet" href="../css/style.css">

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
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li> -->
                    <li><a href="<?php echo SITEURL;?>rider/manage-order.php?email=<?php echo $email;?>">Order</a></li>
                    <li><a href="logout-rider.php">Logout</a></li>

                </ul>
            </div>
        </div>

<div class = "main-content">
        <div class = "wrapper user-sign-in text-white">
            <h1 class = "text-center">Change Password @ User</h1>
            <br>
            <?php
            if(isset($_GET['email']))
            {
                $email = $_GET['email'];
            }
            ?>
            <!-- form part -->
            <form action="" method = "POST">
            <table class = "tbl-40 center tbl-bg text-white">
                <tr>
                    <td> Old Password:</td>
                    <td><input type="password" name="old_password" placeholder = "Old Password"></td>
                </tr>
                <tr>
                    <td> New Password:</td>
                    <td><input type="password" name="new_password" placeholder = "New Password"></td>
                </tr>
                <tr>
                    <td> Retype Password:</td>
                    <td><input type="password" name="confirm_password" placeholder = "Confirm Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name = "email" value = "<?php echo $email;?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                        <input type="submit" name="cancel" value="Cancel" class="btn-danger">
                    </td>
                </tr>
            </table>

        </form>
        </div>
    
    </div>


    <?php
        if(isset($_POST['submit']))
        {
            // get data from the form
            $email = $_POST['email'];
            $old_password = md5($_POST['old_password']);
            //echo $old_password;
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);


            $sql = "SELECT * FROM riders WHERE email = '$email' AND password = '$old_password'";


            $res = mysqli_query($conn,$sql);

            if($res == TRUE)
            {
                $count = mysqli_num_rows($res);

                if($count == 1)
                {
                    // user ase and pass change korbo

                    if($new_password == $confirm_password)
                    {
                        //echo "Password Matches";

                        $sql2 = "UPDATE riders 
                            SET password = '$new_password'
                            WHERE email = '$email'";

                        $res2 = mysqli_query($conn,$sql2);

                        if($res2 == TRUE)
                        {
                            // success
                            $_SESSION['password-changed'] = "<div class = 'success'> Password Changed</div>";
                            header("location:".SITEURL.'rider/profile-rider.php?email='.$email);

                        }
                        else
                        {
                            $_SESSION['user-not-found'] = "<div class = 'error'>Failed to Change Password</div>";
                            header("location:".SITEURL.'rider/profile-rider.php?email='.$email);

                        }
                        


                    }
                    else
                    {
                        $_SESSION['password-didnot-match'] = "<div class = 'error'>Passwords did not match! Try again</div>";
                        header("location:".SITEURL.'rider/profile-rider.php?email='.$email);

                    }
                    
                }
                else
                {
                    // current pass vul maybe
                    $_SESSION['user-not-found'] = "<div class = 'error'>Wrong Password Entered! Failed to Change Password</div>";
                    header("location:".SITEURL.'rider/profile-rider.php?email='.$email);
                }
            }

        }

        if(isset($_POST['cancel']))
        {
            header("location:".SITEURL.'rider/profile-rider.php?email='.$email);
        }
    ?>


<!-- social Section Starts Here -->
<section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">1905015 & 1905020</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>