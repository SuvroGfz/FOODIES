<?php include("partials/user-menu.php");?>
<?php header("refresh: 5");//auto refresh kore ei line ta

    $user_id = $_GET['id'];
?>

<!-- main content section starting -->
<div class = "main-content">
            <div class="wrapper text-center user-sign-in center">
            <h1 class = "user-profile-name">Current Orders</h1>


            <br><br>
            <?php                
            ?>
            <form action="" method = "POST">

            <table class="tbl-full text-white center tbl-bg">
                <tr>
                    <th>Order ID</th>
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Rider</th>
                    <th>Contact</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    $sql = "SELECT * FROM table_orders WHERE user_id = '$user_id' AND (status NOT LIKE 'Cancelled' AND status NOT LIKE 'Delivered')";
                    
                    $res = mysqli_query($conn,$sql);

                    $count = mysqli_num_rows($res);

                    if($count > 0)
                    {
                        while($rows = mysqli_fetch_assoc($res))
                        {
                            $id = $rows['order_id'];
                            $status = $rows['status'];
                            $date = $rows['date'];
                            $total = $rows['total'];
                            $food_id = $rows['food_id'];
                            $quantity = $rows['quantity'];
                            $rider_id = $rows['rider_id'];

                            if($rider_id != NULL || $rider_id != 0)
                            {
                                $sql_rider = "SELECT * FROM riders WHERE rider_id = $rider_id";
                                $res_rider = mysqli_query($conn,$sql_rider);
                                $count_rider = mysqli_num_rows($res_rider);
                                if($count_rider == 1)
                                {
                                    $row_rider = mysqli_fetch_assoc($res_rider);
                                    $rider_name = $row_rider['full_name'];
                                    $phone = $row_rider['phone'];
                                }
                                else
                                {
                                    $rider_name = "N/A";
                                    $phone = "N/A";
                                }
                            }
                            else
                            {
                                $rider_name = "N/A";
                                $phone = "N/A";
                            }

                            $sql2 = "SELECT * FROM foods WHERE id='$food_id'";
                            $res2 = mysqli_query($conn,$sql2);
                            $count2 = mysqli_num_rows($res2);

                            
                            if($count2 == 1)
                            {
                                $rows2 = mysqli_fetch_assoc($res2);

                                $price = $rows2['price'];
                                $food_name=$rows2['title'];

                            }
                            

                            ?>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $food_name; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td>BDT-<?php echo $total; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><?php echo $rider_name ;?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $date; ?></td>
                                <td>
                                    
                                    <?php
                                    if($status == "Ordered"){
                                        ?>
                                        <input type="hidden" name = "id" value = "<?php echo $id;?>">
                                        <a href="<?php echo SITEURL; ?>user/cancel-order.php?order_id=<?php echo $id; ?>&user_id=<?php echo $user_id;?>" class="btn-danger">cancel order</a> 
                                    <?php
                                    }
                                    elseif($status == "Cancelled")
                                    {
                                        ?>
                                        <div class = "error">Cancelled</div>
                                        <?php
                                    }
                                    elseif($status == "Delivered")
                                    {
                                        ?>
                                        <div class = "success">Delivered</div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <div class = "btn-useless"><?php echo $status;?></div>
                                        <?php
                                    }
                                    
                                    ?>
                                </td>
                            </tr>

                            <?php
                            

                        }
                    }
                    else
                    {

                    }
                ?>


            </table>

            </form>
                
            <br><br>
            

                        <h1 class = "user-profile-name">Previous Orders</h1>


            <br><br>
            <?php                
            ?>
            <form action="" method = "POST">

            <table class="tbl-full text-white center tbl-bg">
                <tr>
                    <th>Order ID</th>
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Rider</th>
                    <th>Contact</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    $sql = "SELECT * FROM table_orders WHERE user_id = '$user_id' AND (status LIKE 'Cancelled' OR status LIKE 'Delivered')";
                    
                    $res = mysqli_query($conn,$sql);

                    $count = mysqli_num_rows($res);

                    if($count > 0)
                    {
                        while($rows = mysqli_fetch_assoc($res))
                        {
                            $id = $rows['order_id'];
                            $status = $rows['status'];
                            $date = $rows['date'];
                            $total = $rows['total'];
                            $food_id = $rows['food_id'];
                            $quantity = $rows['quantity'];
                            $rider_id = $rows['rider_id'];

                            if($rider_id != NULL || $rider_id != 0)
                            {
                                $sql_rider = "SELECT * FROM riders WHERE rider_id = $rider_id";
                                $res_rider = mysqli_query($conn,$sql_rider);
                                $count_rider = mysqli_num_rows($res_rider);
                                if($count_rider == 1)
                                {
                                    $row_rider = mysqli_fetch_assoc($res_rider);
                                    $rider_name = $row_rider['full_name'];
                                    $phone = $row_rider['phone'];
                                }
                                else
                                {
                                    $rider_name = "N/A";
                                    $phone = "N/A";
                                }
                            }
                            else
                            {
                                $rider_name = "N/A";
                                $phone = "N/A";
                            }

                            $sql2 = "SELECT * FROM foods WHERE id='$food_id'";
                            $res2 = mysqli_query($conn,$sql2);
                            $count2 = mysqli_num_rows($res2);

                            
                            if($count2 == 1)
                            {
                                $rows2 = mysqli_fetch_assoc($res2);

                                $price = $rows2['price'];
                                $food_name=$rows2['title'];

                            }
                            

                            ?>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $food_name; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td>BDT-<?php echo $total; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><?php echo $rider_name ;?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $date; ?></td>
                                <td>
                                    
                                    <?php
                                    if($status == "Ordered"){
                                        ?>
                                        <input type="hidden" name = "id" value = "<?php echo $id;?>">
                                        <a href="<?php echo SITEURL; ?>user/cancel-order.php?order_id=<?php echo $id; ?>&user_id=<?php echo $user_id;?>" class="btn-danger">cancel order</a> 
                                    <?php
                                    }
                                    elseif($status == "Cancelled")
                                    {
                                        ?>
                                        <div class = "error">Cancelled</div>
                                        <?php
                                    }
                                    elseif($status == "delivered" || $status == "Delivered")
                                    {
                                        ?>
                                        <div class = "success">Delivered</div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <div class = "btn-useless"><?php echo $status;?></div>
                                        <?php
                                    }
                                    
                                    ?>
                                </td>
                            </tr>

                            <?php
                            

                        }
                    }
                    else
                    {

                    }
                ?>


            </table>

            </form>
                
            </div>
        </div>

        
        <!-- main content section ending -->

<?php include('../admin/partials/footer.php'); ?>