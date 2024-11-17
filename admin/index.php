<?php include('partials/menu.php');
echo '<script>alert("You have loggin in FOODIES Admin Panel")</script>';

?>

        <!-- main content section starting -->
        <div class = "main-content">
            <div class="wrapper login-admin-bg">
                <h1>Dashboard</h1>

                <br><br>
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>

                <br><br>

                <div class="col-4">

                <?php
                    $sql = "SELECT * FROM users ";
        
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                ?>
                    <h1><?php echo $count ?></h1>
                    Users
                </div>
                <div class="col-4">

                <?php
                    $sql = "SELECT * FROM restaurants ";
        
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                ?>
                    <h1><?php echo $count ?></h1>
                    Restaurants
                </div>
                <div class="col-4">
                <?php
                    $sql = "SELECT * FROM riders ";
        
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                ?>
                    <h1><?php echo $count ?></h1>
                    Riders
                </div>
                <div class="col-4">
                <?php
                    $sql = "SELECT * FROM categories ";
        
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                ?>
                    <h1><?php echo $count ?></h1>
                    Categories
                </div>
                <div class="col-4">
                <?php
                    $sql = "SELECT * FROM table_orders ";
        
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                ?>
                    <h1><?php echo $count ?></h1>
                    Orders
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- main content section ending -->

        <?php include('partials/footer.php'); ?>        