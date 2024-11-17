<?php include("partials/user-menu.php"); ?>

    <?php
            // get the search keyword
            $search = $_POST['search'];

    ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


            <?php

                $sql = "SELECT * FROM foods WHERE title LIKE '%$search%'";

                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    while($rows = mysqli_fetch_assoc($res))
                    {
                        $food_id = $rows['id'];
                        $title = $rows['title'];
                        $price = $rows['price'];
                        $image_name = $rows['image_name'];
                        $restaurant_name = $rows['restaurant'];

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
                                <p class = "food-creator">@<?php echo $restaurant_name;?></p>
                                <br>

                                <a href="<?php echo SITEURL;?>user/order.php?id=<?php echo $id;?>&food_id=<?php echo $food_id;?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                else
                {
                    echo "<div class = 'error text-center'>No such food item available</div>";
                }
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD searched Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Explore Other Foods</h2>

            <?php 
                $sql2 = "SELECT * FROM foods WHERE active = 'Yes' AND  title NOT LIKE '%$search%'";

                $res2 = mysqli_query($conn,$sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2 > 0)
                {
                    while($rows2 = mysqli_fetch_assoc($res2))
                    {
                        $food_title = $rows2['title'];
                        $price = $rows2['price'];
                        $image_name2 = $rows2['image_name'];

                        $restaurant_name = $rows2['restaurant'];
                        $popular = $rows2['popular'];

                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="../images/foods/<?php echo $image_name2;?>" class="img-food-user img-curve">
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $food_title;?></h4>
                                <p class="food-price">BDT-<?php echo $price;?></p>
                                <p class="food-detail">
                                    Made with Italian Sauce, Chicken, and organice vegetables.
                                </p>
                                <p class = "food-creator">@<?php echo $restaurant_name;if($popular == "Yes") echo " #Popular#";?></p>
                                
                                <br>

                                <a href="<?php echo SITEURL;?>user/order.php?id=<?php echo $id;?>&food_id=<?php echo $food_id;?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>

            <div class="clearfix"></div>

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
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