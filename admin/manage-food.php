<?php include('partials/menu.php'); ?>

 <!-- main content section starting -->
 <div class = "main-content">
            <div class="wrapper">
            <h1>Manage Food</h1>

<br /><br/><br/>

<!-- button to add admin -->

<a href="add-food-admin.php" class="btn-primary">Add Food</a>

<br /><br/><br/>

<table class="tbl-full">
    <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Menu ID</th>
        <th>Category</th>
        <th>Price</th>
        <th>Popular</th>
        <th>action</th>
        
    </tr>

    <tr>
        <td>1.</td>
        <td>Smoky Chicken BBQ Burger</td>
        <td>bgst123</td>
        <td>Burger</td>
        <td>200</td>
        <td>No</td>

        <td>
            <a href="#" class="btn-secondary">update food</a> 
            <a href="#" class="btn-danger">delete food</a> 
        </td>
    </tr>

    <tr>
        <td>1.</td>
        <td>Smoky Beef BBQ Burger</td>
        <td>bgst123</td>
        <td>Burger</td>
        <td>300</td>
        <td>Yes</td>

        <td>
            <a href="#" class="btn-secondary">update food</a> 
            <a href="#" class="btn-danger">delete food</a> 
        </td>
    </tr>

</table>
                
            </div>
        </div>
        <!-- main content section ending -->

<?php include('partials/footer.php'); ?>