<?php include('partials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Restaurant</h1>
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
                        <td> Restaurant Name:</td>
                        <td><input type="text" name="restaurant_name" placeholder = "Enter Restaurant Name"></td>
                    </tr>
                    <tr>
                        <td> Location:</td>
                        <td><input type="text" name="location" placeholder = "Set a Location for the Restaurant"></td>
                    </tr>
                    <tr>
                        <td> Credits:</td>
                        <td><input type="text" name="credits" placeholder = "Set Current Credits of the Restaurant"></td>
                    </tr>
                    <tr>
                        <td> Password:</td>
                        <td><input type="password" name="password" placeholder = "set password"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Restaurant" class="btn-secondary">
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
        
        $restaurant_name = $_POST['restaurant_name'];
        $location = $_POST['location'];
        $password = md5($_POST['password']);//password encryption
        $credits = $_POST['credits'];

        if($restaurant_name == "")
        {
            $_SESSION['add'] = "Restaurant Adding Failed";
        }    

        //sql query to save the data
        $sql = "INSERT INTO restaurants SET
            restaurant_name = '$restaurant_name',
            location = '$location',
            password = '$password',
            credits = '$credits';
        ";

        //execute the query and save the data
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // check whether data is inserted or not, display msg
        if($res == TRUE)
        {
            echo "DATA inserted";
            //create a session variable to display msg
            $_SESSION['add'] = "<div class = 'success'>Restaurant Added Successfully</div>";
            //redirect to add admin page
            header("location:".SITEURL.'admin/manage-restaurant.php');
        }
        else
        {
            echo "Failed to insert data";
            //create a session variable to display msg
            $_SESSION['add'] = "Restaurant Adding Failed";
            //redirect to add admin page
            header("location:".SITEURL.'admin/add-restaurant.php');
        }
    }
    else
    {
        //button not clicked
        //echo "BUTTON NOT CLICKED";
    }

    if(isset($_POST['cancel']))
    {
        header("location:".SITEURL.'admin/manage-restaurant.php');
    }
?>