<?php include('partials/menu.php');?>

<div class = "main-content">
    <div class = "wrapper">
        <h1>Update Rider</h1>
        
        <br><br>
        <?php
            //get the id of the selected restaurant
            $rider_id = $_GET['rider_id'];

            //sql query
            $sql = "SELECT * FROM riders WHERE rider_id = $rider_id";

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
                    //echo "Rider AVAILABLE";
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $location = $row['location'];
                    $current_location = $row['current_location'];

                }
                else
                {
                    // redirect to manage rider page
                    header('location:'.SITEURL.'admin/manage-rider.php');
                }
            }
            else
            {

            }
        ?>

        <form action="" method = "POST">
            <table class = "tbl-40">
                <tr>
                    <td> Rider Name:</td>
                    <td><input type="text" name="full_name" value = "<?php echo $full_name ?>"></td>
                </tr>
                <tr>
                    <td> Location:</td>
                    <td><input type="text" name="location" value = "<?php echo $location ?>"></td>
                </tr>
                <tr>
                    <td> Current Location:</td>
                    <td><input type="text" name="current_location" value = "<?php echo $current_location ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name = "rider_id" value = "<?php echo $rider_id;?>">
                        <input type="submit" name="submit" value="Update Rider" class="btn-secondary">
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
        $full_name = $_POST['full_name'];
        $location = $_POST['location'];
        $current_location = $_POST['current_location'];

        
        // sql query to update database values
        $sql = "UPDATE riders SET
            full_name = '$full_name',
            location = '$location',
            current_location = '$current_location'
            WHERE rider_id = '$rider_id'
        ";

        //excecute
        $res = mysqli_query($conn,$sql);

        //check if successful or nto
        if($res == TRUE)
        {
            $_SESSION['update'] = "<div class = 'success'>Rider Details Updated Successfully</div>";
            header('location:'.SITEURL.'admin/manage-rider.php');
        }
        else
        {
            // failed to update
            $_SESSION['update'] = "<div class = 'success'>Rider Details Updated Successfully</div>";
            header('location:'.SITEURL.'admin/manage-rider.php');
        }

    }
    if(isset($_POST['cancel']))
    {
        header("location:".SITEURL.'admin/manage-rider.php');
    }

?>

<?php include('partials/footer.php')?>