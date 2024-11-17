<?php include("rider-menu.php");?>
<?php header("refresh: 5");//auto refresh kore ei line ta

    $email = $_GET['email'];
?>

<!-- main content section starting -->
<div class = "main-content">
            <div class="wrapper rider-sign-in text-center">
            <h1 class = "text-white-black-stroke">Current Orders</h1>


            <br><br>
            <?php
                if(isset($_SESSION['recieve']))
                {
                    echo $_SESSION['recieve'];//displaying msg
                    unset($_SESSION['recieve']);//removing msg after refreshing session 
                }
                if(isset($_SESSION['delivered']))
                {
                    echo $_SESSION['delivered'];//displaying msg
                    unset($_SESSION['delivered']);//removing msg after refreshing session 
                }
            ?>


<table class="tbl-full light-table">
    <tr>
        <th>Order ID</th>
        <th>Food Name</th>
        <th>Restaurant Name</th>
        <th>Status</th>
        <th>Date</th>
        <th>Total</th>
        <th>Actions</th>
    </tr>

    <?php 
        $sql = "SELECT rider_id FROM riders WHERE email = '$email'";
        
        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);
        
        $row = mysqli_fetch_assoc($res);

        $rider_id = $row['rider_id'];

        $sql = "SELECT * FROM table_orders WHERE rider_id = '$rider_id' AND (status LIKE 'Waiting For Rider' OR status LIKE 'Out For Delivery')";
        
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
                $restaurant = $rows['restaurant_name'];

                $sql2 = "SELECT * FROM foods WHERE id='$food_id'";
                $res2 = mysqli_query($conn,$sql2);
                $rows2 = mysqli_fetch_assoc($res2);

                $price = $rows2['price'];
                $food_name=$rows2['title'];

                ?>
                <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $food_name; ?></td>
                    <td><?php echo $restaurant; ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo $date; ?></td>
                    <td>BDT-<?php echo $total; ?></td>
                    <td>
                        <?php 
                            if($status == "Waiting For Rider" || $status == "waiting for rider")
                            {
                                ?>
                                <a href="<?php echo SITEURL; ?>rider/recieve-order.php?order_id=<?php echo $id; ?>&email=<?php echo $email;?>" class="btn-primary">recieve order</a> 
                                <?php   
                            }
                            else if($status == "Out For Delivery" || $status == "out for delivery")
                            {
                                ?>
                                <a href="<?php echo SITEURL; ?>rider/deliver-order.php?order_id=<?php echo $id; ?>&email=<?php echo $email;?>" class="btn-secondary">hand over to customer</a> 
                                <?php
                            }
                            else
                            {
                                ?>
                                <a href="" class="btn-useless"><?php echo $status;?></a> 
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
<br><br><br>

<h1 class = "text-white-black-stroke">Previous Orders</h1>


<br><br>



<table class="tbl-full light-table">
<tr>
<th>Order ID</th>
<th>Food Name</th>
<th>Restaurant Name</th>
<th>Date</th>
<th>Total</th>
<th>Actions</th>
</tr>

<?php 
$sql = "SELECT rider_id FROM riders WHERE email = '$email'";

$res = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($res);

$rider_id = $row['rider_id'];

$sql = "SELECT * FROM table_orders WHERE rider_id = '$rider_id' AND (status NOT LIKE 'Waiting For Rider' AND status NOT LIKE 'Out For Delivery')";

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
    $restaurant = $rows['restaurant_name'];

    $sql2 = "SELECT * FROM foods WHERE id='$food_id'";
    $res2 = mysqli_query($conn,$sql2);
    $rows2 = mysqli_fetch_assoc($res2);

    $price = $rows2['price'];
    $food_name=$rows2['title'];

    ?>
    <tr>
        <td><?php echo $id;?></td>
        <td><?php echo $food_name; ?></td>
        <td><?php echo $restaurant; ?></td>
        <td><?php echo $date; ?></td>
        <td>BDT-<?php echo $total; ?></td>
        <td>
            <?php 
                if($status == "Waiting For Rider" || $status == "waiting for rider")
                {
                    ?>
                    <a href="<?php echo SITEURL; ?>rider/recieve-order.php?order_id=<?php echo $id; ?>&email=<?php echo $email;?>" class="btn-primary">recieve order</a> 
                    <?php   
                }
                else if($status == "Out For Delivery" || $status == "out for delivery")
                {
                    ?>
                    <a href="<?php echo SITEURL; ?>rider/deliver-order.php?order_id=<?php echo $id; ?>&email=<?php echo $email;?>" class="btn-secondary">order delivered</a> 
                    <?php
                }
                else
                {
                    ?>
                    <a href="" class="btn-useless"><?php echo $status;?></a> 
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
                
            </div>
        </div>
        <!-- main content section ending -->

<?php include('../admin/partials/footer.php'); ?>