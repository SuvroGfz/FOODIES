<?php include('../common/rest-menu.php'); ?>
<?php
//process the value from form and submit in database
    //check whether the button is clicked or not

    // if (headers_sent()) {
    //     die("Redirect failed.");
    // }
    // else{
    //     exit(header("Location:".SITEURL.'../common/login-all.php'));
    // }


    if(isset($_POST['login']))
    {
        header('location:'.SITEURL.'restaurant/login-restaurant.php');
    }

    if(isset($_POST['sign-up']))
    {
        //button clicked
        //echo "BUTTON CLICKED";
        //get the data from the form
        
        // echo "Sign up BUTTON CLICKED";

        $restaurant_name = $_POST['restaurant_name'];
        $location = $_POST['location'];
        $credits = $_POST['credits'];
        $password = md5($_POST['password']);//password encryption
       
        
        // checking duplicate email ? thakle axpt korbona
        
        $sql_no_duplicate = "SELECT * FROM restaurants WHERE restaurant_name = '$restaurant_name'";
        $res_no_duplicate = mysqli_query($conn,$sql_no_duplicate);
        if($res_no_duplicate == TRUE)
        {
            $count = mysqli_num_rows($res_no_duplicate);

            if($count > 0)
            {
                $_SESSION['sign-up'] = "<div class = 'error'>This restaurant was already used to creat account</div>";
                header('location:'.SITEURL.'restaurant/restaurant-sign-up.php');
            }
        }

        //sql query to save the data
        $sql = "INSERT INTO restaurants SET
            restaurant_name = '$restaurant_name',
            location = '$location',
            credits = '$credits',
            password = '$password',
            active = 'No'
        ";

        //execute the query and save the data
        $res = mysqli_query($conn, $sql);

        // // check whether data is inserted or not, display msg
        if($res == TRUE)
        {
            //echo "DATA inserted";
            //create a session variable to display msg
            $_SESSION['sign-up'] = "<div class = 'success'><b>Restaurant Account Created</b></div>";
            
            // $alert = "This is DEMO WARNING";
            // echo "<script type='text/javascript'>alert('$alert');</script>";

            header("location:".SITEURL.'restaurant/restaurant-sign-up.php');
                        
            // unset($_POST);
        }
        else
        {
            //echo "Failed to insert data";
            //create a session variable to display msg
            
            $_SESSION['sign-up'] = "<div class = 'error'>Restaurant Account could not be Created</div>";
            //redirect to add admin page
            header("location:".SITEURL.'restaurant/restaurant-sign-up.php');

            // header("location:".SITEURL.'common/login-all.php');
            // echo $_SESSION['sign-up'];

        }
    }
    else
    {
        //button not clicked
        //echo "BUTTON NOT CLICKED";
    }

    // function function_alert($msg) {
    //     echo "<script type='text/javascript'>alert('$msg');</script>";
    // }
?>
    <div class="restaurant-sign-in">
        <div class="container">
            
            <h2 class="text-center text-with-stroke">Restaurant Sign-Up</h2>

            <?php 
                if(isset($_SESSION['sign-up']))
                {
                    echo $_SESSION['sign-up'];
                    unset($_SESSION['sign-up']);
                } ?>

            <form action="" method = "POST" enctype = "multipart/form-data" name = "form">
                
                <fieldset>
                    <legend class = "text-black">Information Form</legend>
                    <div class="sign-up-label text-black">Restaurant Name</div>
                    <input type="text" name="restaurant_name" placeholder="E.g. XYZ FOODS" class = "input-responsive">

                    <div class="sign-up-label text-black">Location</div>
                    <input type = "text" name="location" placeholder="Basabo" class="input-responsive"></input>

                    <div class="sign-up-label text-black">Credits</div>
                    <input type = "text" name="credits" placeholder="12345" class="input-responsive"></input>

                    <div class="sign-up-label text-black">Password</div>
                    <input type="password" name="password" placeholder="use a strong passowrd - mix letters of both case, numbers, special characters" class="input-responsive">

                   
                    
                    <!-- <select name="vehicle" id="" class="input-responsive" required aria-placeholder="Choose an option">
                        <option value="cycle">Cycle</option>
                        <option value="motorcycle">Motorcycle</option>
                    </select>
                 -->
                    <br>

                    <input type="submit" name="sign-up" value="Create Account" class="btn btn-primary">
                    <input type="reset" name="sign-up" value="Clear" class="btn btn-primary">
                    <!-- <input type="submit" name = "login" value="Login" class = "btn"> -->

                </fieldset>

                <h4 class="text-white">Already have an account? </h4>
            
                <input type="submit" name = "login" value="Login" class = "btn btn-primary  ">
                
            </form>
            
            

        </div>
    </div>
    
    <!-- information Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
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

