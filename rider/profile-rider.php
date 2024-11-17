<?php
     include('rider-menu.php') ;
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

<div class = "main-content">
    <div class = "wrapper text-center rider-sign-in center">

        
        <br><br>
        <?php
            //get the id of the selected admin
            $email = $_GET['email'];

            //sql query
            $sql = "SELECT * FROM riders WHERE email = '$email'";

            //execute the query
            $res  = mysqli_query($conn,$sql);

            //check
            if($res == TRUE)
            {
                // check data available or not
                $count = mysqli_num_rows($res);

                // check whether we have data or not
                if($count == 1)
                {
                    // get the details 
                    //echo "ADMIN AVAILABLE";
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $phone = $row['phone'];
                    $location = $row['location'];
                    $vehicle = $row['vehicle'];

                }
                else
                {
                    // redirect to manage admin page
                    header('location:'.SITEURL.'rider/profile-rider.php?email='.$email);
                }
            }
            else
            {

            }
        ?>

        <h1 class = "rider-profile-name">Rider Profile - <?php echo $full_name;?></h1>
        <br>
        
        <h4>
        <?php
            if(isset($_SESSION['password-changed']))
            {
                echo $_SESSION['password-changed'];
                unset($_SESSION['password-changed']);
            }
            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }
            if(isset($_SESSION['password-didnot-match']))
            {
                echo $_SESSION['password-didnot-match'];
                unset($_SESSION['password-didnot-match']);
            }
        ?>
        </h4>

        <br><br>
        <form action="" method = "POST">
            <!-- <fieldset> -->
                <!-- <legend>User Info:</legend> -->
            <table class = "tbl-40 text-white center tbl-bg">
                <tr>
                    <td> Full Name:</td>
                    <td><input class = "input-responsive" type="text" name="full_name" value = "<?php echo $full_name ?>"></td>
                </tr>
                <tr>
                    <td> Email:</td>
                    <td><input class = "input-responsive" type="text" name="email" value = "<?php echo $email ?>"></td>
                </tr>
                <tr>
                    <td> Phone No:</td>
                    <td><input class = "input-responsive" type="text" name="phone" value = "<?php echo $phone ?>"></td>
                </tr>
                <tr>
                    <td> Vehicle:</td>
                    <td><input class = "input-responsive" type="text" name="vehicle" value = "<?php echo $vehicle ?>"></td>
                </tr>
                <tr>
                    <td> Location:</td>
                    <td><input class = "input-responsive" type="text" name="location" value = "<?php echo $location ?>"></td>
                </tr>
                
                
                <tr>
                    <td colspan="3">
                        <input type="hidden" name = "email" value = "<?php echo $email;?>">
                        <input type="submit" name="submit" value="Update Profile" class="btn-secondary">
                        <input type="submit" name="cancel" value="Cancel" class="btn-danger">
                        <input type="submit" name = "change_password" value = "change password" class = "btn-primary">
                    </td>
                </tr>
            </table>
            <!-- </fieldset> -->

        </form>
    </div>

</div>

<?php 
    // check whether the sumbmit button is clicked or not 
    if(isset($_POST['submit']))
    {
        //echo "BUTTON CLICKED";
        // get the values to update
        $email = $_POST['email'];
        $full_name = $_POST['full_name'];
        $location = $_POST['location'];
        $vehicle = $_POST['vehicle'];
        $phone = $_POST['phone'];

        // sql query to update database values
        $sql = "UPDATE riders SET
            full_name = '$full_name',
            location = '$location',
            phone = '$phone',
            vehicle = '$vehicle'
            WHERE email = '$email'
        ";

        //excecute
        $res = mysqli_query($conn,$sql);

        //check if successful or nto
        if($res == TRUE)
        {
            $_SESSION['update'] = "<div class = 'success'>Rider Profile Updated Successfully</div>";
            header('location:'.SITEURL.'rider/profile-rider.php?email='.$email);
        }
        else
        {
            // failed to update
            $_SESSION['update'] = "<div class = 'failure'>Could not update profile</div>";
            header('location:'.SITEURL.'rider/profile-rider.php?email='.$email);
        }

    }
    if(isset($_POST['cancel']))
    {
        header("location:".SITEURL.'rider/profile-rider.php?email='.$email);
    }
    if(isset($_POST['change_password']))
    {
        header("location:".SITEURL.'rider/change-password.php?email='.$email);
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