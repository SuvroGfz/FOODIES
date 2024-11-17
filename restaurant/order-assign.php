<?php
    include("menu-bar.php");
    header("refresh: 3");

    $id = $_GET['order_id'];

    


?>

<div class = "main-content">
    <!--<section class = "manage-restaurant-bg-img">-->
        <div class="wrapper login-admin-bg">

        <h1 class = "text-white-black-stroke">Available Riders</h1> 

                <br />  
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
                        $sql = "SELECT * FROM riders WHERE active = 'Yes'";
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
                                            <a href="<?php echo SITEURL; ?>restaurant/assign-check.php?rider_id=<?php echo $rider_id; ?>&order_id=<?php echo $id;?>&restaurant_name=<?php echo $restaurant_name;?>" class="btn-primary">assign rider</a> 
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
