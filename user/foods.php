<?php include("partials/user-menu.php"); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        
        <form action="food-search.php?id=<?php echo $id;?>" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
        <div class="container">
            <h2 class="text-center">Popular Now:</h2>

            <?php 
                

                $sql2 = "SELECT * FROM foods WHERE active = 'Yes' AND popular = 'Yes'";

                $res2 = mysqli_query($conn,$sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2 > 0)
                {
                    while($rows2 = mysqli_fetch_assoc($res2))
                    {
                        $food_id = $rows2['id'];
                        $food_title = $rows2['title'];
                        $price = $rows2['price'];
                        $image_name2 = $rows2['image_name'];

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
                                <br>

                                <a href="<?php echo SITEURL;?>user/order.php?id=<?php echo $id;?>&food_id=<?php echo $food_id;?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
            
            <div class="clearfix"></div>

            <br><br>
            <!-- Not popular but available .......... -->

            <h2 class="text-center">Other Food Items:</h2>

            <?php 
                $sql2 = "SELECT * FROM foods WHERE active = 'Yes' AND popular = 'No'";

                $res2 = mysqli_query($conn,$sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2 > 0)
                {
                    while($rows2 = mysqli_fetch_assoc($res2))
                    {
                        $food_id = $rows2['id'];
                        $food_title = $rows2['title'];
                        $price = $rows2['price'];
                        $image_name2 = $rows2['image_name'];

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
                                <br>

                                <a href="<?php echo SITEURL;?>user/order.php?id=<?php echo $id;?>&food_id=<?php echo $food_id;?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
            
            <div class="clearfix"></div>
            <br><br>

            <!-- Not popular but available .......... -->

            <h2 class="text-center">Currently Unvaailable Items:</h2>

            <?php 
                $sql2 = "SELECT * FROM foods WHERE active = 'No'";

                $res2 = mysqli_query($conn,$sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2 > 0)
                {
                    while($rows2 = mysqli_fetch_assoc($res2))
                    {
                        $food_id = $rows2['id'];
                        $food_title = $rows2['title'];
                        $price = $rows2['price'];
                        $image_name2 = $rows2['image_name'];

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
                                <br>

                                <!-- currently not available items .... button press korle warning lagbe -->

                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                    
                    <div class = "text-center text-black">All items are available</div>
                    
                    <?php
                }
            ?>
            
            <div class="clearfix"></div>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->