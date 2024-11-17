<?php include('partials/menu.php'); ?>
<?php header("refresh: 5");?>
        <!-- main content section starting -->
        <div class = "main-content">
            <div class="wrapper login-admin-bg">
               <img src="../images/admin-icon.png" alt="" align = "right">

                <h1 class = "text-white-black-stroke">Manage Admin</h1>


                <br />

                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];//displaying msg
                        unset($_SESSION['add']);//removing msg after refreshing session 
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];//displaying msg
                        unset($_SESSION['delete']);//removing msg after refreshing session 
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];//displaying msg
                        unset($_SESSION['update']);//removing msg after refreshing session 
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];//displaying msg
                        unset($_SESSION['user-not-found']);//removing msg after refreshing session 
                    }

                    if(isset($_SESSION['password-changed']))
                    {
                        echo $_SESSION['password-changed'];//displaying msg
                        unset($_SESSION['password-changed']);//removing msg after refreshing session 
                    }

                    if(isset($_SESSION['password-didnot-match']))
                    {
                        echo $_SESSION['password-didnot-match'];//displaying msg
                        unset($_SESSION['password-didnot-match']);//removing msg after refreshing session 
                    }
                ?>

                <br><br/><br/>


                <!-- button to add admin -->

                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br /><br/><br/>

                <table class="tbl-full light-table">
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        //query to get all admins 
                        $sql = "SELECT * FROM dbl_admin";
                        //execute query
                        $res = mysqli_query($conn,$sql);

                        //check whether query is executed or not...
                        if($res == TRUE)
                        {
                            // count the rows to check whether we have data or not
                            $count = mysqli_num_rows($res);


                            // check the number of rows
                            if($count > 0)
                            {
                                while($rows = mysqli_fetch_assoc($res))
                                {
                                    // fetching data using while loop

                                    // get individual data
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $user_name = $rows['username'];

                                    // display the values in the table
                                    ?>

                                    <tr>

                                        <td><?php echo $id?></td>
                                        <td><?php echo $full_name?></td>
                                        <td><?php echo $user_name?></td>
                                    
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/change-password-admin.php?id=<?php echo $id; ?>" class="btn-primary">change password</a> 
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">update admin</a> 
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">delete admin</a> 
                                        </td>
                                        
                                    </tr>

                                    <?php
                                }
                            }
                        }

                    ?>

                </table>
            </div>
        </div>
        <!-- main content section ending -->
<?php include('partials/footer.php'); ?>