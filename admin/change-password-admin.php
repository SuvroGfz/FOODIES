<?php include('partials/menu.php');?>

    <div class = "main-content">
        <div class = "wrapper">
            <h1>Change Password @ Admin</h1>

            <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }
            ?>
            <!-- form part -->
            <form action="" method = "POST">
            <table class = "tbl-40">
                <tr>
                    <td> Old Password:</td>
                    <td><input type="password" name="old_password" placeholder = "Old Password"></td>
                </tr>
                <tr>
                    <td> New Password:</td>
                    <td><input type="password" name="new_password" placeholder = "New Password"></td>
                </tr>
                <tr>
                    <td> Retype Password:</td>
                    <td><input type="password" name="confirm_password" placeholder = "Confirm Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name = "id" value = "<?php echo $id;?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                        <input type="submit" name="cancel" value="Cancel" class="btn-danger">
                    </td>
                </tr>
            </table>

        </form>
        </div>
    
    </div>


    <?php
        if(isset($_POST['submit']))
        {
            // get data from the form
            $id = $_POST['id'];
            $old_password = md5($_POST['old_password']);
            //echo $old_password;
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);


            $sql = "SELECT * FROM dbl_admin WHERE id = $id AND password = '$old_password'";


            $res = mysqli_query($conn,$sql);

            if($res == TRUE)
            {
                $count = mysqli_num_rows($res);

                if($count == 1)
                {
                    // user ase and pass change korbo

                    if($new_password == $confirm_password)
                    {
                        //echo "Password Matches";

                        $sql2 = "
                            UPDATE dbl_admin 
                            SET password = '$new_password'
                            WHERE id = $id
                        ";

                        $res2 = mysqli_query($conn,$sql2);

                        if($res2 == TRUE)
                        {
                            // success
                            $_SESSION['password-changed'] = "<div class = 'success'> Password Changed</div>";
                            header("location:".SITEURL.'admin/manage-admin.php');

                        }
                        else
                        {
                            $_SESSION['user-not-found'] = "<div class = 'error'>Failed to Change Password</div>";
                            header("location:".SITEURL.'admin/manage-admin.php');

                        }
                        


                    }
                    else
                    {
                        $_SESSION['password-didnot-match'] = "<div class = 'error'>Passwords did not match! Try again</div>";
                        header("location:".SITEURL.'admin/manage-admin.php');

                    }
                    
                }
                else
                {
                    // current pass vul maybe
                    $_SESSION['user-not-found'] = "<div class = 'error'>Wrong Password Entered! Failed to Change Password</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }

        }

        if(isset($_POST['cancel']))
        {
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    ?>


