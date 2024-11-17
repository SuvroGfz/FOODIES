<?php include("partials/user-menu.php");?>

<?php 
    $id = $_GET['id'];
    if(isset($_GET['food_id']))
    {
        $food_id = $_GET['food_id'];
    }
    else
    {
        // home page e pathay dei
        header('location:'.SITEURL.'user/index.php?id='.$id);
    }

    $sql = "SELECT * FROM foods WHERE id = '$food_id'";

    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);

    if($count == 1)
    {
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $active = $row['active'];

        $restaurant_name = $row['restaurant'];
        $image_name = $row['image_name'];

        if($active != "Yes")
        {
            header('location:'.SITEURL.'user/index.php?id='.$id);

        }


    }
    else
    {
        header('location:'.SITEURL.'user/index.php?id='.$id);
    }
    
    $sql2 = "SELECT * FROM users WHERE id = '$id'";
    $res2 = mysqli_query($conn,$sql2);
    $count = mysqli_num_rows($res2);

    if($count == 1)
    {
        $row2 = mysqli_fetch_assoc($res2);

        $customer_name = $row2['full_name'];
        $phone = $row2['phone'];
        $location = $row2['location'];
        $road = $row2['road'];
        $house = $row2['house'];


    }
    else
    {

    }
?>
            <?php
                if(isset($_POST['submit']))
                {
                    $food_id = $_POST['food_id'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];

                    $total = $price * $quantity;

                    $TRIGGER_TRANS = "CREATE TRIGGER TRIGGER_TRANSACTION
                    ON table_orders
                    AFTER INSERT
                    AS
                    BEGIN
                    
                           DECLARE @useroldcredit INT
                           DECLARE @totalPrice INTO
                           DECLARE @newUserCredit
                           DECLARE @Action VARCHAR(50)
                     
                            @newUserCredit = @useroldcredit + @totalPrice
                           @newResCred = @oldResCrd + @totalPrice
                           SELECT @CustomerId = INSERTED.CustomerId       
                           FROM INSERTED
                     
                           UPDATE users
                           SET users.credits = @newUserCredit
                           WHERE users.id = user_id;
                           
                           UPDATE restaurants
                           SET restaurants.credits = @newResCred
                           WHERE restaurants.restaurant_name = restaurant_name;
                     
                           INSERT INTO CustomerLogs
                           VALUES(@CustomerId, @Action)
                    END";

                    //------------------------prob
                    $date = date("Y-m-d");
                    // echo $date;
                    //----------------------date e problem kortese

                    $sql_price = "SELECT * FROM users WHERE id = $id";
                    $res_price = mysqli_query($conn,$sql_price);
                    $row_price = mysqli_fetch_assoc($res_price);
                    $user_credits = $row_price['credits'];
                    echo $user_credits;
                    echo "   ";
                    echo $total;
                    if($user_credits < $total)
                    {
                        echo "TRUE";
                        $_SESSION['order'] = "<div class = 'error'>Failed to Order. Insufficient Balance</div>";
                        header('location:'.SITEURL.'user/index.php?id='.$id);
                    } 
                    else
                    {
                        $delivery_notes = $_POST['delivery_notes'];

                        $status = "Ordered";

                        $customer_name = $_POST['customer_name'];
                        $phone = $_POST['phone'];
                        $location = $_POST['location'];
                        $house = $_POST['house'];
                        $road = $_POST['road'];

                        $sql_insert = "INSERT INTO table_orders SET
                            user_id = $id,
                            food_id = $food_id,  
                            quantity = $quantity,
                            total = $total,
                            restaurant_name = '$restaurant_name',
                            date = '$date',
                            status = '$status',
                            delivery_notes = '$delivery_notes',
                            customer_name = '$customer_name',
                            phone = '$phone',
                            location = '$location',
                            road = '$road',
                            house = '$house'
                        ";

                        $res_insert = mysqli_query($conn,$sql_insert);

                        if($res_insert == TRUE)
                        {
                            // saved
                            $_SESSION['order'] = "<div class = 'success'> Order Placed Successfully. </div>";
                            //redirect
                            echo '<script class = ""> alert("Welcome to Geeks for Geeks")</script>';

                            header('location:'.SITEURL.'user/index.php?id='.$id);

                        }
                        else
                        {
                            $_SESSION['order'] = "<div class = 'error'>Failed to Order</div>";
                            header('location:'.SITEURL.'user/index.php?id='.$id);
                        }
                    }
                }
                if(isset($_POST['cancel']))
                {
                    header('location:'.SITEURL.'user/index.php?id='.$id);

                }
            ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method = "POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="../images/foods/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-food-user img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name = "food_id" value = "<?php echo $food_id?>">
                        
                        <p class="food-price">BDT-<?php echo $price;?></p>
                        <input type="hidden" name = "price" value = "<?php echo $price?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="quantity" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Receiver Name</div>
                    <input type="text" name="customer_name" value="<?php echo $customer_name;?>" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="phone" value="<?php echo $phone;?>" class="input-responsive" required>

                    <div class="order-label">Area</div>
                    <input type="text" name="location" value="<?php echo $location;?>" class="input-responsive" required>

                    <div class="order-label">Road/Block</div>
                    <input type="text" name="road" value="Road No-<?php echo $road;?> / Block-A" class="input-responsive" required>

                    <div class="order-label">House</div>
                    <input type="text" name="house" value="#<?php echo $house;?>" class="input-responsive" required>

                    <div class="order-label">Delivery Notes</div>
                    <textarea name="delivery_notes" rows = "5" placeholder="E.g. Landmarks near you, Location Details, House Name, Floor etc" class="input-responsive"  ></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                    <input type="submit" name="cancel" value="Cancel Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

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

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">1905015 & 1905020</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>