<?php include('partials/menu.php');?>

<div class = "main-content">
    <div class = "wrapper">
        <h1>Update Admin</h1>
        
        <br><br>
        <?php
            //get the id of the selected admin
            $id = $_GET['id'];

            //sql query
            $sql = "SELECT * FROM dbl_admin WHERE id = $id";

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
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    // redirect to manage admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {

            }
        ?>

        <form action="" method = "POST">
            <table class = "tbl-40">
                <tr>
                    <td> Full Name:</td>
                    <td><input type="text" name="full_name" value = "<?php echo $full_name ?>"></td>
                </tr>
                <tr>
                    <td> User Name:</td>
                    <td><input type="text" name="username" value = "<?php echo $username ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name = "id" value = "<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
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
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // sql query to update database values
        $sql = "UPDATE dbl_admin SET
            full_name = '$full_name',
            username = '$username'
            WHERE id = '$id'
        ";

        //excecute
        $res = mysqli_query($conn,$sql);

        //check if successful or nto
        if($res == TRUE)
        {
            $_SESSION['update'] = "<div class = 'success'>Admin Updated Successfully</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // failed to update
            $_SESSION['update'] = "<div class = 'error'>Admin Update Failed</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }

    }
    if(isset($_POST['cancel']))
    {
        header("location:".SITEURL.'admin/manage-admin.php');
    }

?>

<?php include('partials/footer.php')?>