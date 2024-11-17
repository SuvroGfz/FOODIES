<?php include('partials/menu.php'); ?>

 <!-- main content section starting -->
 <div class = "main-content">
            <div class="wrapper login-admin-bg">
            <h1 class = "text-white-black-stroke">Manage Category</h1>

<br /><br/><br/>

<!-- button to add category -->
<?php

    if(isset($_SESSION['add-category']))
    {
        echo $_SESSION['add-category'];
        unset($_SESSION['add-category']);
    }
    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }
    if(isset($_SESSION['no-category-found']))
    {
        echo $_SESSION['no-category-found'];
        unset($_SESSION['no-category-found']);
    }
    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
?>

<br><br>    
<a href="add-category.php" class="btn-primary">Add Category</a>

<br /><br/><br/>

<table class="tbl-full light-table">
    <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Image</th>
        <th>Status</th>
        <th>Popular</th>
        <th>Action</th>
    </tr>

    <?php

        $sql = "SELECT * FROM categories";

        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);

        //check if data available or not
        if($count > 0)
        {
            // display data
            $sn = 1;
            while($row = mysqli_fetch_assoc($res))
            {
                $title = $row['title'];
                $image_name = $row['image_name'];
                $popular = $row['popular'];
                $active = $row['active'];

                ?>
                    <tr>
                        <td><?php echo $sn?></td>
                        <td><?php echo $title?></td>
                        <td>
                            <?php 
                                if($image_name != "")                            
                                {
                                    // display image
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/categories/<?php echo $image_name; ?>" class = "img-square">
                                    <?php
                                }
                                else
                                {
                                    echo "<div class = 'error'>Image not Available</div>";
                                }
                            ?>
                        </td>
                        <td><?php 
                                if($active == "Yes")
                                {
                                    echo "Active";
                                }
                                else
                                {
                                    echo "Inactive";
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                if($popular == "Yes")
                                {
                                    echo "Yes";
                                }
                                else
                                {
                                    echo "No";
                                }
                            ?>
                        
                        </td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-category.php?title=<?php echo $title; ?>&image_name=<?php echo $image_name?>" class="btn-secondary">update category</a> 
                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?title=<?php echo $title; ?>&image_name=<?php echo $image_name?>" class="btn-danger">delete category</a> 
                        </td>
                    </tr>
                <?php

                $sn = $sn + 1;
            }
        }
        else
        {
            //empty
            // kisu korar nai 
            ?>
                <tr>
                    <td colspan = "6"><div class="error">No Category Available</div></td>
                </tr>
            <?php
        }
    ?>

</table>
                
            </div>
        </div>
        <!-- main content section ending -->

<?php include('partials/footer.php'); ?>