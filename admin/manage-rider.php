<?php include('partials/menu.php'); ?>

 <!-- main content section starting -->
 <div class = "main-content">
    <!--<section class = "manage-restaurant-bg-img">-->
        <div class="wrapper login-admin-bg">
        <img src="../images/rider-icon-2.png" alt="" align = "right" class = "">

        <h1 class = "text-white-black-stroke">Manage Riders</h1> 

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
                <!-- button to add rider -->
                <br><br/><br/>
                
                <a href="add-rider.php" class="btn-primary">Add a new Rider</a>
                <br><br/><br/>
                <table class="tbl-full light-table">
                    <tr>
                        <th>Rider ID</th>
                        <th>Full Name</th>
                        <th>Location</th>
                        <th>Current Location</th>
                        <th>Active</th>
                        <th>Current Order ID</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        //query to get all admins 
                        $sql = "SELECT * FROM riders";
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
                                    $rider_id = $rows['rider_id'];
                                    $full_name = $rows['full_name'];
                                    $locaion = $rows['location'];                                   
                                    $current_location = $rows['current_location'];
                                    $active = $rows['active'];
                                    $current_order = $rows['current_order']

                                    // display the values in the table
                                    ?>

                                    <tr>

                                        <td><?php echo $rider_id?></td>
                                        <td><?php echo $full_name?></td>
                                        <td><?php echo $locaion?></td>
                                        <td><?php echo $current_location?></td>
                                        <td><?php 
                                                if($active == "Yes")
                                                {
                                                    echo "Acive Now";
                                                }
                                                else
                                                {
                                                    echo "Offline";
                                                }
                                            
                                            ?>
                                        </td>
                                        <td><?php 
                                                if($current_order != NULL)
                                                {
                                                    echo $current_order;
                                                }
                                                else
                                                {
                                                    echo "N/A";
                                                }
                                            
                                            ?>
                                        </td>

                                    
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-rider.php?rider_id=<?php echo $rider_id; ?>" class="btn-secondary">update rider</a> 
                                            <a href="<?php echo SITEURL; ?>admin/delete-rider.php?rider_id=<?php echo $rider_id; ?>" class="btn-danger">delete rider</a> 
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