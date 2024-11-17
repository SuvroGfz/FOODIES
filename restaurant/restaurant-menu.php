<?php include("menu-bar.php"); ?>
         <!-- main content section starting -->
 <div class = "main-content">
            <div class="wrapper manage-restaurant-bg-img">
            <h1 class = "text-white-black-stroke-rest text-center">Manage My Menu - <?php echo $restaurant_name; ?></h1>

<br /><br/><br/>

<!-- button to add category -->
<?php

    if(isset($_SESSION['add-food']))
    {
        echo $_SESSION['add-food'];
        unset($_SESSION['add-food']);
    }
    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }
    if(isset($_SESSION['no-food-found']))
    {
        echo $_SESSION['no-food-found'];
        unset($_SESSION['no-food-found']);
    }
    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
?>

<br><br>    
<a href="add-food.php?restaurant_name=<?php echo $restaurant_name;?>" class="btn-primary">Add Food</a>

<br /><br/><br/>

<table class="tbl-full light-table-rest">
    <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
        <th>Status</th>
        <th>Popular</th>
        <th>Action</th>
    </tr>

    <?php

        $sql = "SELECT * FROM foods WHERE restaurant = '$restaurant_name'";

        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);

        //check if data available or not
        if($count > 0)
        {
            // display data
            $sn = 1;
            while($row = mysqli_fetch_assoc($res))
            {
                $title = $row['title'];
                $image_name = $row['image_name'];
                $price = $row['price'];
                $popular = $row['popular'];
                $active = $row['active'];

                ?>
                    <tr>
                        <td><?php echo $sn?></td>
                        <td><?php echo $title?></td>
                        <td>
                            <?php 
                                if($image_name != "")                            
                                {
                                    // display image
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/foods/<?php echo $image_name; ?>" class = "img-square">
                                    <?php
                                }
                                else
                                {
                                    echo "<div class = 'error'>Image not Available</div>";
                                }
                            ?>
                        </td>
                        <td><?php 
                                echo $price;
                            ?>
                        </td>
                        <td><?php 
                                if($active == "Yes")
                                {
                                    echo "Active";
                                }
                                else
                                {
                                    echo "Inactive";
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                if($popular == "Yes")
                                {
                                    echo "Yes";
                                }
                                else
                                {
                                    echo "No";
                                }
                            ?>
                        
                        </td>
                        <td>
                            <a href="<?php echo SITEURL; ?>restaurant/update-food.php?title=<?php echo $title; ?>&image_name=<?php echo $image_name?>&restaurant_name=<?php echo $restaurant_name;?>" class="btn-secondary">update food</a> 
                            <a href="<?php echo SITEURL; ?>restaurant/delete-food.php?title=<?php echo $title; ?>&image_name=<?php echo $image_name?>&restaurant_name=<?php echo $restaurant_name;?>" class="btn-danger">delete food</a> 
                        </td>
                    </tr>
                <?php

                $sn = $sn + 1;
            }
        }
        else
        {
            //empty
            // kisu korar nai 
            ?>
                <tr>
                    <td colspan = "6"><div class="error">No Food Available</div></td>
                </tr>
            <?php
        }
    ?>

</table>
                
            </div>
        </div>
        <!-- main content section ending -->
        <!-- Footer section starting -->
        <div class = "footer">
            <div class = "wrapper">
                <p class = "text-center">All rights reserved. Designed By <a href="#">1905015 & 1905020</a></p>
            </div>
        </div>
        <!-- Footer section ending -->
    </body>
</html>
