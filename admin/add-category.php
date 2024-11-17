<?php include('partials/menu.php');?>

<div class = "main-content">]
    <div class = "wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php

            if(isset($_SESSION['add-category']))
            {
                echo $_SESSION['add-category'];
                unset($_SESSION['add-category']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <br>
        <br>
    
        <!-- add category part statgs -->
        <form action="" method = "post" enctype = "multipart/form-data"> 

            <table class = "tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name = "title" placeholder = "Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Popular: </td>
                    <td>
                        <input type="radio" name = "popular" value = "Yes"> Yes
                        <input type="radio" name = "popular" value = "No"> No
                        
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name = "active" value = "Yes"> Yes
                        <input type="radio" name = "active" value = "No"> No
                        
                    </td>
                </tr>

                <tr>
                    <td>Select Category Image:</td>
                    <td>
                        
                        <input type="file" name = "image">
                    </td>

                </tr>

                <tr>
                    <td colspan = "2">
                        <input type="submit" name = "submit" value = "add categroy" class = "btn-secondary">
                        <input type="submit" name = "cancel" value = "cancel" class = "btn-danger">
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
                
                if(empty($title) || !isset($title))
                {
                    $_SESSION['add-category'] = "<div class = 'error'>Failed to Add Category! Give a valid title</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }

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
                    // echo $active;
                }
                else///////////////////////////////////////////////////////////////////////////////active popular kaj kore na
                {
                    $active = "No";
                    // echo $active;
                }

                // check whether image is selected or not and check image name accordingly
                //print_r($_FILES['image']);

                // die();

                if(isset($_FILES['image']['name']))
                {
                    // chekcs image and image has a name or not
                    // we need img name, src path and dest path

                    $image_name = $_FILES['image']['name'];

                    // renaming image ;)

                    // first we need to get the extension
                    $ext = end(explode('.',$image_name));
                    //rename img
                    $image_name = "Category_".$title.'_'.rand(000,999).'.'.$ext;


                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/categories/".$image_name;

                    // uploading image part
                    $upload = move_uploaded_file($source_path,$destination_path);

                    // check whether upped or not
                    // if not then redirct with error msg

                    if($upload == FALSE)
                    {
                        // redirect and sh0w error
                        $_SESSION['upload']= "<div class = 'error'><b>Upload Image!!</b> </div>";
                        header('location:'.SITEURL.'admin/add-category.php');
                        die(); // stop the process.. without image no category axpted
                    }

                }
                else
                {
                    //don't upload img and set img name as blank
                    $_SESSION['upload']= "<div class = 'error'>Failed to Upload Image. </div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                    die();
                }


                $sql1 = "SELECT * FROM categories WHERE title like '$title'";
                $res1 = mysqli_query($conn, $sql1);

                if($res1 == TRUE AND mysqli_num_rows($res1) != 0)
                {
                    $_SESSION['add-category'] = "<div class = 'error'>Failed to Add Category! Title already exists</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }


                // sql code to insert into table
                $sql = "INSERT INTO categories SET
                    title = '$title',
                    image_name = '$image_name',
                    popular = '$popular',
                    active = '$active'
                ";

                //execute the query and save the data

                $res = mysqli_query($conn, $sql) or die(mysqli_error());

                if($res == TRUE)
                {
                    // query executed
                    $_SESSION['add-category'] = "<div class = 'success'>Category Added</div>";
                    echo $title;
                    echo $restaurant;
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else{
                    // failed to add category
                    $_SESSION['add-category'] = "<div class = 'error'>Failed to Add Category</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
            else
            {
                // button was not pressed
            }
            if(isset($_POST['cancel']))
            {
                header("location:".SITEURL.'admin/manage-category.php');
            }
        ?>
            
    </div>
        <!-- add category ends -->
</div>

<?php include('partials/footer.php'); ?>