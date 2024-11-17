<?php include("partials/user-menu.php");?>

<?php 

    if(isset($_GET['category_name']) && isset($_GET['id']))
    {
        $id = $_GET['id'] ;
        $category_name = $_GET['category_name'];
    }
    else
    {
        // header('location:'.SITEURL.'user/index.php');
    }
    
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on "<a href="categories.php?id=<?php echo $id;?>" class="text-white">Category </a>- <?php echo $category_name;?>"</h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                $sql = "SELECT * FROM foods WHERE category = '$category_name'";

                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    while($rows = mysqli_fetch_assoc($res))
                    {
                        $food_id = $rows['id'];
                        $title = $rows['title'];
                        $price = $rows['price'];
                        $restaurant_name = $rows['restaurant'];
                        $popular = $rows['popular'];
                        $active = $rows['active'];
                        $image_name = $rows['image_name'];


                        ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="../images/foods/<?php echo $image_name;?>" class="img-food-user img-curve">
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title;?></h4>
                                <p class="food-price">BDT-<?php echo $price;?></p>
                                <p class="food-detail">
                                    Made with Italian Sauce, Chicken, and organice vegetables.
                                </p>
                                <p class = "food-creator">@<?php echo $restaurant_name;if($popular == "Yes") echo " #Popular#";?></p>
                                <?php
                                    if($active == "Yes")
                                    {
                                        ?><p class = "food-available">Available</p><?php
                                    }
                                    else
                                    {
                                        ?><p class = "food-not-available">Unavailable</p><?php
                                    }
                                ?>

                                <br>

                                <a href="<?php echo SITEURL;?>user/order.php?id=<?php echo $id;?>&food_id=<?php echo $food_id;?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class = 'error text-center'> No Food Found for Selected Category</div>'";
                }
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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