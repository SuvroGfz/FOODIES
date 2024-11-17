<?php include('partials/menu.php'); ?>

 <!-- main content section starting -->
 <div class = "main-content">
    <!--<section class = "manage-restaurant-bg-img">-->
        <div class="wrapper login-admin-bg">
        <img src="../images/restaurant-icon.png" alt="" align = "right" class = "light-image">

        <h1 class = "text-white-black-stroke">Manage Restaurants</h1> 

                <br />  
                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];//displaying msg
                        unset($_SESSION['add']);//removing msg after refreshing session 
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];//displaying msg
                        unset($_SESSION['delete']);//removing msg after refreshing session 
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];//displaying msg
                        unset($_SESSION['update']);//removing msg after refreshing session 
                    }
                ?>
                <!-- button to add restaurant -->
                <br><br/><br/>
                
                <a href="add-restaurant.php" class="btn-primary">Add a new Restaurant</a>
                <br><br/><br/>
                <table class="tbl-full light-table">
                    <tr>
                        <th>Menu ID</th>
                        <th>Restaurant Name</th>
                        <th>Location</th>
                        <th>Credits</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        //query to get all admins 
                        $sql = "SELECT * FROM restaurants";
                        //execute query
                        $res = mysqli_query($conn,$sql);

                        //check whether query is executed or not...
                        if($res == TRUE)
                        {
                            // count the rows to check whether we have data or not
                            $count = mysqli_num_rows($res);


                            // check the number of rows
                            if($count > 0)
                            {
                                while($rows = mysqli_fetch_assoc($res))
                                {
                                    // fetching data using while loop

                                    // get individual data
                                    $menu_id = $rows['menu_id'];
                                    $restaurant_name = $rows['restaurant_name'];
                                    $locaion = $rows['location'];
                                    $credits = $rows['credits'];
                                    $active = $rows['active'];

                                    // display the values in the table
                                    ?>

                                    <tr>

                                        <td><?php echo $menu_id?></td>
                                        <td><?php echo $restaurant_name?></td>
                                        <td><?php echo $locaion?></td>
                                        <td><?php echo $credits?></td>
                                        <td><?php 
                                                if($active == TRUE)
                                                {
                                                    echo "Acive";
                                                }
                                                else
                                                {
                                                    echo "Closed";
                                                }
                                            
                                            ?>
                                        </td>

                                    
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-restaurant.php?menu_id=<?php echo $menu_id; ?>" class="btn-secondary">update restaurant</a> 
                                            <a href="<?php echo SITEURL; ?>admin/delete-restaurant.php?menu_id=<?php echo $menu_id; ?>" class="btn-danger">delete restaurant</a> 
                                        </td>
                                        
                                    </tr>

                                    <?php
                                }
                            }
                        }

                    ?>
                    
                    
                </table>
                                
            </div>
            <!--</section>       -->

        </div>


        <!-- main content section ending -->

<?php include('partials/footer.php'); ?>