<?php include('partials/menu.php');?>

<div class = "main-content">]
    <div class = "wrapper">
        <h1>Add Category</h1>

        <br>
        <br>
    
        <!-- add category part statgs -->
        <form action="" method = "post">

            <table class = "tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name = "title" placeholder = "Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <input type="text" name = "category" placeholder = "Restaurant Title">
                    </td>
                </tr>

                <tr>
                    <td>Menu ID: </td>
                    <td>
                        <input type="text" name = "menu_id" placeholder = "Restaurant Title">
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="text" name = "price" placeholder = "Restaurant Title">
                    </td>
                </tr>

                <tr>
                    <td>Popular: </td>
                    <td>
                        <input type="radio" name = "popular" value = "yes"> Yes
                        <input type="radio" name = "popular" value = "no"> No
                        
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name = "active" value = "yes"> Yes
                        <input type="radio" name = "active" value = "no"> No
                        
                    </td>
                </tr>

                <tr>
                    <td colspan = "2">
                        <input type="submit" name = "submit" value = "add categroy" class = "btn-secondary">
                    </td>
                </tr>


            </table>

        </form>
        <!-- form ends here -->

        <?php
            // check whether submit button was clicked or not
            if(isset($_POST['submit']))
            {
                // button was clicked, process works    
                $title = $_POST['title'];
                $restaurant = $_POST['restaurant'];
                
                if(isset($_POST['popular']))
                {
                    // checked if button was pressed or not
                    $popular = $_POST['popular'];
                }
                else
                {
                    // default value if not given
                    $popular = "No";                      
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "Yes";
                }

                // sql code to insert into table
                $sql = "INSERT INTO categories SET
                    title = '$title',
                    restaurant = '$restaurant',
                    popular = '$popular',
                    active = '$active'
                ";

                //execute the query and save the data
                $conn = mysqli_connect('localhost','root', '') or die(mysqli_error());
                $db_select = mysqli_select_db($conn,'foodies') or die(mysqli_error());
                $res = mysqli_query($conn, $sql) or die(mysqli_error());
            }
            else
            {
                // button was not pressed
            }
        ?>
            
    </div>
        <!-- add category ends -->
</div>