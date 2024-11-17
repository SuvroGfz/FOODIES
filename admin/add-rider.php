<?php include('partials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Rider</h1>
            <br/><br/>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//displaying msg
                    unset($_SESSION['add']);//removing msg after refreshing session 
                }
            ?>

            <form action="" method = "POST">
            
                <table class = "tbl-40">
                    <tr>
                        <td> Rider Name:</td>
                        <td><input type="text" name="full_name" placeholder = "Enter Rider Name"></td>
                    </tr>
                    <tr>
                        <td> Location:</td>
                        <td><input type="text" name="location" placeholder = "Set a Location Area of the Rider"></td>
                    </tr>
                    <tr>
                        <td> Current Location:</td>
                        <td><input type="text" name="current_location" placeholder = "Set Current Location of the Restaurant"></td>
                    </tr>
                    <tr>
                        <td> Password:</td>
                        <td><input type="password" name="password" placeholder = "Set password"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Rider" class="btn-secondary">
                            <input type="submit" name="cancel" value="Cancel" class="btn-danger">
                        </td>

                        <td>
                        </td>
                    </tr>
                </table>
                
            </form>
        </div>
    </div>
<?php include('partials/footer.php'); ?>

<?php
//process the value from form and submit in database
    //check whether the button is clicked or not

    if(isset($_POST['submit']))
    {
        //button clicked
        //echo "BUTTON CLICKED";
        //get the data from the form
        
        $full_name = $_POST['full_name'];
        $location = $_POST['location'];
        $password = md5($_POST['password']);//password encryption
        $current_location = $_POST['current_location'];

        if($full_name == "")
        {
            $_SESSION['add'] = "Rider Adding Failed";
        }    

        //sql query to save the data
        $sql = "INSERT INTO riders SET
            full_name = '$full_name',
            location = '$location',
            password = '$password',
            current_location = '$current_location';
        ";

        //execute the query and save the data
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // check whether data is inserted or not, display msg
        if($res == TRUE)
        {
            echo "DATA inserted";
            //create a session variable to display msg
            $_SESSION['add'] = "<div class = 'success'>Rider Added Successfully</div>";
            //redirect to add admin page
            header("location:".SITEURL.'admin/manage-rider.php');
        }
        else
        {
            echo "Failed to insert data";
            //create a session variable to display msg
            $_SESSION['add'] = "Rider Adding Failed";
            //redirect to add admin page
            header("location:".SITEURL.'admin/add-rider.php');
        }
    }
    else
    {
        //button not clicked
        //echo "BUTTON NOT CLICKED";
    }

    if(isset($_POST['cancel']))
    {
        header("location:".SITEURL.'admin/manage-rider.php');
    }
?>