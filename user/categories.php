<?php include("partials/user-menu.php"); ?>

<section class="categories">
        <div class="">
            <!-- <table> -->

                <div class = "container">
                    <h2 class="text-center">Popular Now:</h2>

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
                                <div class="box-3">
                                    <img src="../images/categories/<?php echo $image_name;?>" alt="Pizza" class="img-cat-user img-curve">

                                    <h3 class=""><?php echo $title;?></h3>
                                </div>
                                </a>

                                <?php
                            }
                        }
                    ?>
                </div>

<!-- not popular now -->
<div class="clearfix"></div>


<br><br><br>
                <div class = "container">
                    <h2 class="text-center">Other Categories:</h2>

                    <?php
                        $sql = "SELECT * FROM categories WHERE popular = 'No' AND active = 'Yes'";

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
                                <div class="box-3">
                                    <img src="../images/categories/<?php echo $image_name;?>" alt="Pizza" class="img-cat-user img-curve">

                                    <h3 class=""><?php echo $title;?></h3>
                                </div>
                                </a>

                                <?php
                            }
                        }
                    ?>

                    </div>

            <!-- <br><br><br> -->
        <div class="clearfix"></div>


            <!--................ Currently Unvaailable............... -->
            
                <div class = "container">

                    <h2 class="text-center">Currently Unavailable Categories:</h2>

                    <?php
                        $sql = "SELECT * FROM categories WHERE active = 'No'";

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
                                <div class="box-3">
                                    <img src="../images/categories/<?php echo $image_name;?>" alt="Pizza" class="img-cat-user img-curve">

                                    <h3 class=""><?php echo $title;?></h3>
                                </div>
                                </a>

                                <?php
                            }
                        }
                    ?>

                    </div>

            </table>

            <div class="clearfix"></div>
        </div>
</section>
    <!-- Categories Section Ends Here -->