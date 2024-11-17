<?php include('partials/menu.php');?>

<div class = "main-content">
    <div class = "wrapper">
        <h1>Update Restaurant</h1>
        
        <br><br>
        <?php
            //get the id of the selected restaurant
            $menu_id = $_GET['menu_id'];

            //sql query
            $sql = "SELECT * FROM restaurants WHERE menu_id = $menu_id";

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
                    //echo "REstaurant AVAILABLE";
                    $row = mysqli_fetch_assoc($res);

                    $restaurant_name = $row['restaurant_name'];
                    $location = $row['location'];
                    $credits = $row['credits'];
                }
                else
                {
                    // redirect to manage admin page
                    header('location:'.SITEURL.'admin/manage-restaurant.php');
                }
            }
            else
            {

            }
        ?>

        <form action="" method = "POST">
            <table class = "tbl-40">
                <tr>
                    <td> Restaurant Name:</td>
                    <td><input type="text" name="restaurant_name" value = "<?php echo $restaurant_name ?>"></td>
                </tr>
                <tr>
                    <td> Location:</td>
                    <td><input type="text" name="location" value = "<?php echo $location ?>"></td>
                </tr>
                <tr>
                    <td> Credits:</td>
                    <td><input type="text" name="credits" value = "<?php echo $credits ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name = "id" value = "<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Restaurant" class="btn-secondary">
                        <input type="submit" name="cancel" value="Cancel" class="btn-danger">
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
        //echo "BUTTON CLICKED";
        // get the values to update
        $restaurant_name = $_POST['restaurant_name'];
        $location = $_POST['location'];
        $credits = $_POST['credits'];

        
        // sql query to update database values
        $sql = "UPDATE restaurants SET
            restaurant_name = '$restaurant_name',
            location = '$location',
            credits = '$credits'
            WHERE menu_id = '$menu_id'
        ";

        //excecute
        $res = mysqli_query($conn,$sql);

        //check if successful or nto
        if($res == TRUE)
        {
            $_SESSION['update'] = "<div class = 'success'>Restaurant Updated Successfully</div>";
            header('location:'.SITEURL.'admin/manage-restaurant.php');
        }
        else
        {
            // failed to update
            $_SESSION['update'] = "<div class = 'success'>Restaurant Updated Successfully</div>";
            header('location:'.SITEURL.'admin/manage-restaurant.php');
        }

    }
    if(isset($_POST['cancel']))
    {
        header("location:".SITEURL.'admin/manage-restaurant.php');
    }

?>

<?php include('partials/footer.php')?>