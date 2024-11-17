<?php include('partials/menu.php');?>
<?php $id = $_GET['order_id'];?>

<div class = "main-content">
    <div class = "wrapper">
        <h1>Update Order</h1>
        
        <br><br>
        <?php 
            //sql query
            $sql = "SELECT * FROM table_orders WHERE order_id = $id";

            //execute the query
            $res  = mysqli_query($conn,$sql);

            //check
            if($res == TRUE)
            {
                // check data available or not
                $count = mysqli_num_rows($res);

                // check whether we have data or not
                if($count == 1)
                {
                    // get the details 
                    //echo "ADMIN AVAILABLE";
                    $rows = mysqli_fetch_assoc($res);

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
                }
                else
                {
                    // redirect to manage admin page
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {

            }
        ?>

        <form action="" method = "POST">
            <table class = "tbl-40">
                <tr>
                    <td> Order Status:</td>
                    <td>
                        <!-- <input type="text" name="full_name" value = "<?php //echo $status; ?>"> -->
                        <select name="status" >
                            <option value="Ordered">Ordered</option>
                            <option value="Cooking">Cooking</option>
                            <option value="Out For Delivery">Out For Delivery</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                            <option value="Waiting For Rider">Waiting For Rider</option>
                        </select>
                    
                    
                    </td>
                </tr>
                <tr>
                    <td> Rider ID:</td>
                    <td><input type="text" name="rider_id" value = "<?php echo $rider_id;?>"></td>
                </tr>

                <tr>
                    <td> Total:</td>
                    <td><input type="number" name="total" value = "<?php echo $total;?>"></td>
                </tr>

                <tr>
                    <td> Location:</td>
                    <td><input type="text" name="location" value = "<?php echo $location;?>"></td>
                </tr>
                <tr>
                    <td> Road:</td>
                    <td><input type="text" name="road" value = "<?php echo $road;?>"></td>
                </tr>
                <tr>
                    <td> House:</td>
                    <td><input type="text" name="house" value = "<?php echo $house;?>"></td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="hidden" name = "id" value = "<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                        <input type="submit" name="cancel" value="Undo Changes" class="btn-danger">
                    </td>
                </tr>
            </table>

        </form>
    </div>

</div>

<?php 
    // check whether the sumbmit button is clicked or not 
    if(isset($_POST['submit']))
    {
        echo "BUTTON CLICKED";
        // get the values to update
        $id = $_POST['id'];
        
        $status2 = $_POST['status'];
        $rider_id2 = $_POST['rider_id'];
        $location2 = $_POST['location'];
        $house2 = $_POST['house'];
        $road2 = $_POST['road'];
        $total2 = $_POST['total'];

        if($rider_id2 == 0)
        $ri = NULL;

        // sql query to update database values
        $sql = "UPDATE table_orders SET
            status = '$status2',
            rider_id = '$ri',
            location = '$location2',
            house = '$house2',
            road = 'Mirpur Road',
            total = '200'
            WHERE order_id = $id
        ";

        //excecute
        $res = mysqli_query($conn,$sql);

        //check if successful or nto
        if($res == TRUE)
        {
            $_SESSION['update'] = "<div class = 'success'>Order Updated Successfully</div>";
            header('location:'.SITEURL.'admin/manage-order.php');
        }
        else
        {
            // failed to update
            $_SESSION['update'] = "<div class = 'error'>Order Update Failed</div>";
            header('location:'.SITEURL.'admin/manage-order.php');
        }

    }
    if(isset($_POST['cancel']))
    {
        header("location:".SITEURL.'admin/manage-order.php');
    }

?>

<?php include('partials/footer.php')?>