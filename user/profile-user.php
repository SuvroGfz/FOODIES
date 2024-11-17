<?php include("partials/user-menu.php");?>

<div class = "main-content">
    <div class = "wrapper text-center user-sign-in center">

        
        <br><br>
        <?php
            //get the id of the selected admin
            $id = $_GET['id'];

            //sql query
            $sql = "SELECT * FROM users WHERE id = $id";

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
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $location = $row['location'];
                    $road = $row['road'];
                    $house = $row['house'];
                    $credits = $row['credits'];

                }
                else
                {
                    // redirect to manage admin page
                    header('location:'.SITEURL.'user/index.php?id='.$id);
                }
            }
            else
            {

            }
        ?>

        <h1 class = "user-profile-name">User Profile - <?php echo $full_name;?></h1>
        <br>
        
        <h4>
        <?php
            if(isset($_SESSION['password-changed']))
            {
                echo $_SESSION['password-changed'];
                unset($_SESSION['password-changed']);
            }
            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }
            if(isset($_SESSION['password-didnot-match']))
            {
                echo $_SESSION['password-didnot-match'];
                unset($_SESSION['password-didnot-match']);
            }
        ?>
        </h4>

        <br><br>
        <form action="" method = "POST">
            <!-- <fieldset> -->
                <!-- <legend>User Info:</legend> -->
            <table class = "tbl-40 text-white center tbl-bg">
                <tr>
                    <td> Full Name:</td>
                    <td><input class = "input-responsive" type="text" name="full_name" value = "<?php echo $full_name ?>"></td>
                </tr>
                <tr>
                    <td> Email:</td>
                    <td><input class = "input-responsive" type="text" name="email" value = "<?php echo $email ?>"></td>
                </tr>
                <tr>
                    <td> Phone No:</td>
                    <td><input class = "input-responsive" type="text" name="phone" value = "<?php echo $phone ?>"></td>
                </tr>
                <tr>
                    <td> Credits:</td>
                    <td><input class = "input-responsive" type="text" name="credits" value = "<?php echo $credits ?>"></td>
                </tr>
                <tr>
                    <td> Area:</td>
                    <td><input class = "input-responsive" type="text" name="location" value = "<?php echo $location ?>"></td>
                </tr>
                <tr>
                    <td> Road:</td>
                    <td><input class = "input-responsive" type="text" name="road" value = "<?php echo $road ?>"></td>
                </tr>
                <tr>
                    <td> House No:</td>
                    <td><input class = "input-responsive" type="text" name="house" value = "<?php echo $house ?>"></td>
                </tr>
                
                <tr>
                    <td colspan="3">
                        <input type="hidden" name = "id" value = "<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Profile" class="btn-secondary">
                        <input type="submit" name="cancel" value="Cancel" class="btn-danger">
                        <input type="submit" name = "change_password" value = "change password" class = "btn-primary-blue">
                    </td>
                </tr>
            </table>
            <!-- </fieldset> -->

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
        $location = $_POST['location'];
        $house = $_POST['house'];
        $road = $_POST['road'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $credits = $_POST['credits'];

        // sql query to update database values
        $sql = "UPDATE users SET
            full_name = '$full_name',
            location = '$location',
            email = '$email',
            phone = '$phone',
            house = '$house',
            road = '$road',
            credits = '$credits'
            WHERE id = '$id'
        ";

        //excecute
        $res = mysqli_query($conn,$sql);

        //check if successful or nto
        if($res == TRUE)
        {
            $_SESSION['update'] = "<div class = 'success'>User Profile Updated Successfully</div>";
            header('location:'.SITEURL.'user/index.php?id='.$id);
        }
        else
        {
            // failed to update
            $_SESSION['update'] = "<div class = 'failure'>Could not update profile</div>";
            header('location:'.SITEURL.'user/index.php?id='.$id);
        }

    }
    if(isset($_POST['cancel']))
    {
        header("location:".SITEURL.'user/index.php?id='.$id);
    }
    if(isset($_POST['change_password']))
    {
        header("location:".SITEURL.'user/change-password.php?id='.$id);
    }

?>

<?php include('partials/footer.php')?>