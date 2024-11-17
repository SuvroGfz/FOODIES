<?php include('../user/user-sign-up-menu.php'); ?>
<?php

    if(isset($_POST['login']))
    {
        header('location:'.SITEURL.'user/login-user.php');
    }

    if(isset($_POST['sign-up']))
    {
        //button clicked
        //echo "BUTTON CLICKED";
        //get the data from the form
        
        // echo "Sign up BUTTON CLICKED";


        $full_name = $_POST['full_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $road = $_POST['road'];
        $house = $_POST['house'];
    
        $password = md5($_POST['password']);//password encryption

        if($full_name == "" )
        {
            
            header('location:'.SITEURL.'rider/rider-sign-up.php');
        }
        
        // checking duplicate email ? thakle axpt korbona
        
        $sql_no_duplicate = "SELECT * FROM users WHERE email = '$email'";
        $res_no_duplicate = mysqli_query($conn,$sql_no_duplicate);
        if($res_no_duplicate == TRUE)
        {
            $count = mysqli_num_rows($res_no_duplicate);

            if($count > 0)
            {
                $_SESSION['sign-up'] = "<div class = 'error'>This email was already used to create account</div>";
                header('location:'.SITEURL.'rider/rider-sign-up.php');
            }
        }

        //sql query to save the data
        $sql = "INSERT INTO users SET
            full_name = '$full_name',
            phone = '$phone',
            password = '$password',
            email = '$email',
            location = '$location',
            house = '$house',
            road = '$road',
            active = 'No',
            credits = 0
        ";

        //execute the query and save the data
        $res = mysqli_query($conn, $sql);

        // // check whether data is inserted or not, display msg
        if($res == TRUE)
        {
            //echo "DATA inserted";
            //create a session variable to display msg
            $_SESSION['sign-up'] = "<div class = 'success'><b>Account Created</b></div>";

                        // header("location:".SITEURL.'common/login-all.php');

            header("location:".SITEURL.'user/user-sign-up.php');
            // header('location:http://localhost:81/FOODIES/login-all.php');
            //redirect to add admin page
            // echo $_SESSION['sign-up'];
            
            // unset($_POST);
        }
        else
        {
            //echo "Failed to insert data";
            //create a session variable to display msg
            
            $_SESSION['sign-up'] = "<div class = 'error'>Account could not be Created</div>";
            //redirect to add admin page
            header("location:".SITEURL.'user/user-sign-up.php');

            // header("location:".SITEURL.'common/login-all.php');
            // echo $_SESSION['sign-up'];

        }
    }
    else
    {
        //button not clicked
        //echo "BUTTON NOT CLICKED";
    }
?>



    <div class="user-sign-in">
        <div class="container">
            
            <h2 class="text-center text-with-stroke-user">Are you a FOODIE? Sign-Up Now!!!</h2>

            <!-- <div class = "text-center"> -->
            <?php
                if(isset($_SESSION['sign-up']))
                {
                    echo $_SESSION['sign-up'];
                    unset($_SESSION['sign-up']);
                }
            ?>
            <!-- </div> -->

            <form action="" method = "POST" enctype = "multipart/form-data" name = "form">
                
                <fieldset>
                    <legend class = "text-white">Information Form</legend>
                    <div class="sign-up-label text-white">Full Name</div>
                    <input type="text" name="full_name" placeholder="E.g. Amirul" class = "input-responsive">

                    <div class="sign-up-label text-white">Phone Number</div>
                    <input type="tel" name="phone" placeholder="E.g. 01XXXXXXXXX" class="input-responsive">

                    <div class="sign-up-label text-white">Email</div>
                    <input type="email" name="email" placeholder="E.g. amirulislamalif292@gmail.com" class="input-responsive">

                    <div class="sign-up-label text-white">Password</div>
                    <input type="password" name="password" placeholder="use a strong passowrd - mix letters of both case, numbers, special characters" class="input-responsive">

                    <div class="sign-up-label text-white">Area</div>
                    <input type = "text" name="location" placeholder="Basabo" class="input-responsive"></input>

                    <div class="sign-up-label text-white">Road/Block No</div>
                    <input type = "text" name="road" placeholder="10" class="input-responsive"></input>

                    <div class="sign-up-label text-white">House</div>
                    <input type = "text" name="house" placeholder="3" class="input-responsive"></input>
                    
                    <br>

                    <input type="submit" name="sign-up" value="Create Account" class="btn btn-primary">
                    <input type="reset" name="clear" value="Clear" class="btn btn-primary">
                    <!-- <input type="submit" name = "login" value="Login" class = "btn"> -->

                </fieldset>

                <h4 class="text-white">Already have an account? </h4>
            
                <input type="submit" name = "login" value="Login" class = "btn btn-primary">
                
            </form>
            
            

        </div>
    </div>
    
    <!-- information Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container-transparent text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->


<?php include('../admin/partials/footer.php'); ?>   

