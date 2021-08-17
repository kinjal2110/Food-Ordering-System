<?php include('partials/menu.php'); ?>

<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['remove']))
        {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['No_category_found']))
        {
            echo $_SESSION['No_category_found'];
            unset($_SESSION['No_category_found']);
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
        if(isset($_SESSION['failed_to_remove']))
        {
            echo $_SESSION['failed_to_remove'];
            unset($_SESSION['failed_to_remove']);
        }
        ?><br><br>
        <table class="tbl-full">
            <a href="<?php echo HOME_URL . 'admin/add-category.php' ?>" class="btn-primary">Add Category</a>
            <br><br>
            <tr>
                <th>Sr No.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <tr>
                <?php
                // query to get all category from database
                $sql = "select * from tbl_category";
                $res = mysqli_query($con, $sql);

                $sn = 1;            //create variable and assign  the value.
                if ($res == true) {
                    $rows = mysqli_num_rows($res);      //get all the rows from database

                    // checck no. of rows
                    if ($rows > 0) {
                        // we have data in database
                        while ($rows = mysqli_fetch_assoc($res)) {
                            // using while loop to get all data from database
                            $id = $rows['id'];
                            $title = $rows['title'];
                            $image_name = $rows['image_name'];
                            $featured = $rows['featured'];
                            $active = $rows['active'];

                            // displays value in table
                ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $title; ?></td>
              <td>  <?php
                // img img is not empty
                    if($image_name!="")
                    {
                        // display img
                      ?>  <img src="<?php echo HOME_URL.'images/category/' ?><?php echo $image_name; ?>" alt="" width="100px" height="100px">
                      <?php
                    }
                    else{
                        // just display the msg
                        echo '<div class="error">Image not added</div>';
                    }
                ?></td>
                <td><?php echo $featured; ?></td>
                <td><?php echo $active ?></td>
                <td> <a href="<?php echo HOME_URL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary"> update</a>
                    <a href="<?php echo HOME_URL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger"> delete</a>
                </td>
            </tr>
        <?php
                        }
                    } else {
                        // we don't have data in database
        ?>
        <td colspan="5"> No categories added</td>
<?php
                    }
                }
?>

        </table>
    </div>
    <!-- main content section ends -->

    <?php include('partials/footer.php');  ?>