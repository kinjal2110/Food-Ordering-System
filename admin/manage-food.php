<?php include('partials/menu.php'); ?>

<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <br><?php
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
        if(isset($_SESSION['No_food_found']))
        {
            echo $_SESSION['No_food_found'];
            unset($_SESSION['No_food_found']);
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
        }?>
        <br>
        <table class="tbl-full">
            <a href="add-food.php" class="btn-primary">Add Food</a>
            <br><br>
            <tr>
                <th>Sr No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
                // create SQL query to  get all food
                $sql = "select * from tbl_food";
                $sn = 1;
                $res= mysqli_query($con, $sql);

                // count row to check whether we have food or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    // we have food in database
                    // get the foods from database and display
                    while($row= mysqli_fetch_assoc($res))
                    {
                        $id=$row['id'];
                        $title = $row['title'];
                        $description= $row['description'];
                        $price = $row['price'];
                        $image_name= $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>
           
           <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $title; ?></td>
                <td><?php echo $description; ?></td>
                <td><?php echo $price; ?></td>
                <td>  <?php
                // img img is not empty
                    if($image_name!="")
                    {
                        // display img
                      ?>  <img src="<?php echo HOME_URL.'images/food/' ?><?php echo $image_name; ?>" alt="" width="100px" height="100px">
                      <?php
                    }
                    else{
                        // just display the msg
                        echo '<div class="error">Image not added</div>';
                    }
                ?></td>
                <td><?php echo $featured; ?></td>
                <td><?php echo $active; ?></td>
              <td><a href="<?php echo HOME_URL; ?>/admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary"> update</a>
                <a href="<?php echo HOME_URL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">    delete</a>
                </td>
            </tr>
                        <?php
                    }
                }
                else
                {
                    // food not added in database.
                    echo "<td colspan='7'>Food not added yet</td>";
                }
            ?>

        </table>
    </div>
    <!-- main content section ends -->

<?php include('partials/footer.php');  ?>