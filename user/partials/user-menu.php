<?php include("../config/constants.php");?>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOODIES - home </title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];

        }
        else
        {
            
            $_SESSION['no-login-message']="<div class = 'error'> Please Login to Access Your FOODIES Account</div>";
            header("location:".SITEURL."user/login-user.php");
        }
        
    ?>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="" title="Logo">
                    <img src="../images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php?id=<?php echo $id;?>">Home</a>
                    </li>
                    <li>
                        <a href="categories.php?id=<?php echo $id;?>">Categories</a>
                    </li>
                    <li>
                        <a href="foods.php?id=<?php echo $id;?>">Foods</a>
                    </li>
                    <li>
                        <a href="user-orders.php?id=<?php echo $id;?>">Orders</a>
                    </li>
                    <li>
                        <a href="profile-user.php?id=<?php echo $id;?>">Profile</a>
                    </li>
                    <li>
                        <a href="logout-user.php?id=<?php echo $id;?>">Logout</a>
                    </li>
                    

                </ul>
            </div>

            <div class="clearfix"></div>
            <?php 

                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                
            
            ?>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

