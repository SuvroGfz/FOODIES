<?php 
    include('../config/constants.php');

?>


<html>
    <head>
        <title>User Login - FOODIES</title>
        <link rel = "stylesheet" href = "../css/style.css">
    </head>

    <body>

        <!-- <img src="../images/rider-bg.jpg" class = ""> -->

    <!--<section class = "login-bg-img">-->
        <div class = "user-sign-in-blur">
            <div class="login-box img-bg-user">
                <!-- <img src="../images/logo.png" class = "img-responsive"> -->
                <h1 class="text-center text-with-stroke-white">User Login</h1>

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
                    if(isset($_SESSION['logout-msg']))
                    {
                        echo $_SESSION['logout-msg'];
                        unset($_SESSION['logout-msg']);
                    }
                    
                ?>
                <br><br>

                <form action="" method = "POST" class = "text-center"   >
                    <div class = "text-white"><b>Email:</b></div>
                    
                    <br>
                    <input type="email" name = "email" placeholder = "Enter Your Email">

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
        
        $email = $_POST['email'];
        $password = md5($_POST['password']);//password encryption

        $sql = "SELECT * FROM users WHERE email='$email' AND password = '$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        $rows = mysqli_fetch_assoc($res);
        $id = $rows['id'];

        if($count == 1)
        {
            // set active status ------------------------
            $sql2 = "UPDATE users SET active = 'Yes' WHERE email = '$email'";
            $res2 = mysqli_query($conn,$sql2);

            // at least one user is there
            $_SESSION['login'] = "<div class = 'success'>Login Successful</div>";
            $_SESSION['email'] = $email; // check whether user is logged in or not
            header('location:'.SITEURL.'user/index.php?id='.$id);
        }
        else
        {
            // no user available
            $_SESSION['login'] = "<div class = 'error'>Login Failed</div>";
            header('location:'.SITEURL.'user/login-user.php');
        }
    }
    if(isset($_POST['home']))
    {
        header('location:'.SITEURL.'common/login-all.php');
    }
?>