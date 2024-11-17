

    <?php include("partials/user-menu.php"); ?>
    <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }


    ?>
    
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


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">

        

            <h2 class="text-center">Explore Categories</h2>

            <?php
                $sql = "SELECT * FROM categories WHERE popular = 'Yes' AND active = 'Yes'";

                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $image_name = $row['image_name'];
                        $title = $row['title'];
                        $active = $row['active'];

                        ?>

                        <a href="<?php echo SITEURL?>user/category-foods.php?id=<?php echo $id;?>&category_name=<?php echo $title;?>">
                        <div class="box-3 float-container">
                            <img src="../images/categories/<?php echo $image_name;?>" alt="Pizza" class="img-cat-user img-curve">

                            <h3 class="float-text text-white"><?php echo $title;?></h3>
                        </div>
                        </a>

                        <?php
                    }
                }
            ?>

            <!-- <a href="category-foods.html">
            <div class="box-3 float-container">
                <img src="../images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white">Pizza</h3>
            </div>
            </a> -->

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

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

                        $restaurant_name = $rows2['restaurant'];

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
                                <p class = "food-creator">@<?php echo $restaurant_name;?></p>

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
            <a href="foods.php?id=<?php echo $id;?>">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include("partials/footer.php");?>