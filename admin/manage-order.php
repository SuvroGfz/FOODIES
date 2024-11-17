<?php include('partials/menu.php'); ?>
<?php header("refresh: 5");//auto refresh kore ei line ta
    
    // echo date('H:i:s Y-m-d');

    ?>
    
 <!-- main content section starting -->
 <div class = "main-content">
            <div class="wrapper login-admin-bg">
            <h1 class = "text-white-black-stroke">Manage Order</h1>


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
            ?>


<table class="tbl-full light-table">
    <tr>
        <th>Order ID</th>
        <th>Restaurant</th>
        <th>Customer Name</th>
        <th>Address</th>
        <th>Status</th>
        <th>Rider ID</th>
        <th>Date</th>
        <th>Total</th>
        <th>Actions</th>
    </tr>

    <?php 
        $sql = "SELECT * FROM table_orders";
        
        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);

        if($count > 0)
        {
            while($rows = mysqli_fetch_assoc($res))
            {
                $id = $rows['order_id'];
                $customer_name = $rows['customer_name'];
                $restaurant_name = $rows['restaurant_name'];
                $status = $rows['status'];
                $date = $rows['date'];
                $total = $rows['total'];
                $location = $rows['location'];
                $road = $rows['road'];
                $house = $rows['house'];
                $rider_id = $rows['rider_id'];

                ?>
                <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $restaurant_name; ?></td>
                    <td><?php echo $customer_name; ?></td>
                    <td>House: <?php echo $house;?>,Road: <?php echo $road;?>,Area: <?php echo $location;?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php if($rider_id == 0) echo "NULL"; else echo $rider_id;?></td>
                    <td><?php echo $date; ?></td>
                    <td>BDT-<?php echo $total; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/update-order.php?order_id=<?php echo $id; ?>" class="btn-secondary">update order</a> 
                        <a href="<?php echo SITEURL; ?>admin/delete-order.php?order_id=<?php echo $id; ?>" class="btn-danger">delete order</a> 
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
                
            </div>
        </div>
        <!-- main content section ending -->

<?php include('partials/footer.php'); ?>