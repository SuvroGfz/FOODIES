<?php include("menu-bar.php");?>
<?php header("refresh: 5");//auto refresh kore ei line ta

    $restaurant_name = $_GET['restaurant_name'];
?>

<!-- main content section starting -->
<div class = "main-content">
            <div class="wrapper manage-restaurant-bg-img">
            <h1 class = "text-white-black-stroke-rest text-center">Manage Order</h1>


            <br><br>
            <?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];//displaying msg
                    unset($_SESSION['update']);//removing msg after refreshing session 
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];//displaying msg
                    unset($_SESSION['delete']);//removing msg after refreshing session 
                }
                if(isset($_SESSION['order-action']))
                {
                    echo $_SESSION['order-action'];//displaying msg
                    unset($_SESSION['order-action']);//removing msg after refreshing session 
                }
                
            ?>
<form action="" method = "POST">

<table class="tbl-full light-table-rest">
    <tr>
        <th>Order ID</th>
        <th>Food Name</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Status</th>
        <th>Rider ID</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>

    <?php 
        $sql = "SELECT * FROM table_orders WHERE restaurant_name = '$restaurant_name' AND (status NOT LIKE 'Cancelled' AND status NOT LIKE 'Delivered')";
        
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
                    <td><?php if($rider_id == 0) echo "NULL"; else echo $rider_id;?></td>
                    <td><?php echo $date; ?></td>
                    <td>
                        
                        <?php
                        if($status == "Ordered"){
                            ?>
                            <input type="hidden" name = "id" value = "<?php echo $id;?>">
                            <a href="<?php echo SITEURL; ?>restaurant/order-accept.php?order_id=<?php echo $id; ?>" class="btn-secondary">accept order</a> 

                            <input type="hidden" name = "id" value = "<?php echo $id;?>">
                            <a href="<?php echo SITEURL; ?>restaurant/order-reject.php?order_id=<?php echo $id; ?>" class="btn-danger">reject order</a> 
                        <?php
                        }
                        elseif($status == "Cancelled")
                        {
                            ?>
                            <div class = "error">Cancelled</div>
                            <?php
                        }
                        elseif($status == "Waiting For Rider")
                        {
                            ?>
                            <div class = "btn-useless">Waiting For Rider</div>
                            <?php
                        }
                        else if($status == "Out For Delivery")
                        {
                            ?>
                            <div class = "btn-useless">Out For Delivery</div>
                            <?php
                        }
                        else
                        {?>
                            <input type="hidden" name = "id" value = "<?php echo $id;?>">

                            <a href="<?php echo SITEURL; ?>restaurant/order-assign.php?order_id=<?php echo $id;?>&restaurant_name=<?php echo $restaurant_name;?>" class="btn-primary">assign order</a> 
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