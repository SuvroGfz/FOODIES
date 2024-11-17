<?php include('../config/constants.php') ?>


<html>
    <head>
        <title>Admin Login - FOODIES</title>
        <link rel = "stylesheet" href = "../css/admin.css">
    </head>

    <body>
    <section class = "login-admin-bg">
        <div class="login img-bg-admin">

            <img src="../images/logo.png" class = "img-responsive">

            <h1 class="text-center text-white-black-stroke">Admin Login</h1>

            <br><br>
            
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['user']))
                {
                    echo $_SESSION['user'];
                    echo '<script>alert("Logged Out Successfully")</script>';

                    unset($_SESSION['user']);
                }
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <form action="" method = "POST" class = "text-center"   >
                <div class = "text-white">Username: </div>
                <br>
                <input type="text" name = "username" placeholder = "Enter Username">

                <br><br>
                <div class = "text-white">Password:</div>
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
        </section>
    </body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        //button clicked
        //echo "BUTTON CLICKED";
        //get the data from the form
        
        $username = $_POST['username'];
        $password = md5($_POST['password']);//password encryption

        $sql = "SELECT * FROM dbl_admin WHERE username='$username' AND password = '$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            // at least one user is there
            $_SESSION['login'] = "<div class = 'success'>Login Successful</div>";
            $_SESSION['user'] = $username; // check whether admin is logged in or not

            header('location:'.SITEURL.'admin/');
        }
        else
        {
            // no user available
            $_SESSION['login'] = "<div class = 'error'>Login Failed</div>";
            header('location:'.SITEURL.'admin/login-admin.php');
        }
    }
    if(isset($_POST['home']))
    {
        header('location:'.SITEURL.'common/login-all.php');
    }
?>