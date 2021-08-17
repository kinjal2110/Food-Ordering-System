<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>
        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" class="input-field" placeholder="Enter title"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" class='input-field' placeholder="Enter description here" id="" cols="30" rows="6"></textarea></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price" class="input-field" placeholder="Enter price here"></td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td><input type="file" name="image_name" id=""></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td><select name="category" id="" class="input-field">
                            <?php
                            // create php query to display categories from database
                            // display all active categories from database.
                            $sql = "select * from tbl_category where active='yes' or active='Yes'";

                            $res = mysqli_query($con, $sql);

                            // count rows to check whether we have categories or not!
                            $count = mysqli_num_rows($res);

                            // if count is greater than 0 then we have categories otherwise not!
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    // get the details of category
                                    $id = $row['id'];
                                    $title = $row['title'];

                            ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                <?php }
                            } else {
                                ?>

                                <option value='0'>No categories found</option>
                            <?php
                            }

                            ?>

                        </select></td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td><input type="radio" name="featured" value="yes" id=""> Yes
                        <input type="radio" name="featured" id="" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td><input type="radio" name="active" value="yes" id=""> Yes
                        <input type="radio" name="active" value="no" id=""> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><input type="submit" name="submit" class="btn-secondary"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    // echo 'done';
    // get the data from form 
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // check whether radio button is checked or not!
    if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];
    } else {
        $featured = 'no';
    }

    if (isset($_POST['active'])) {

        $active = $_POST['active'];
    } else {
        $active = 'no';
    }
    // check whether the select img is clicked or not.& upload img only if img is selected.
    if(isset($_FILES['image_name']['name']))
    {
        


        // we will upload img
        // for upload img we need two things source path and destination path.
        $image_name = $_FILES['image_name']['name'];
        // print_r($_FILES['image_name']); exit;
        // get .jpg, .png, .jpeg extension of image
        $ext =end(explode('.',$image_name));

        // img renaming
        $image_name = 'food_name_'.rand(000,999).'.'.$ext;

        $source_path = $_FILES['image_name']['tmp_name'];

        $destination_path = "../images/food/".$image_name;

        $upload = move_uploaded_file($source_path,$destination_path);

        // check whether the img uploaded or not
        // if img is not uploaded then we will stop the process and redirect with error msg
        if($upload == false)
        {
            // set msg
            $_SESSION['upload']= '<div class="error">Failed to upload image</div>';
            header('Location:'.HOME_URL.'admin/add-food.php');
            die();
        }
        else{

        }
    }
    else
    {
        //don't upload img and set img name value blank
        $image_name='';
    }
 // insert into database

            // create SQL query to save data
                // for numerical value we don't need to pass value inside quetoes, but for string value it is compulsory.
                $sql = "insert into tbl_food set title='$title', 
                description='$description', price=$price,
                image_name = '$image_name', category_id=$category,
                featured='$featured', active='$active'";

        // execute the query
        $res= mysqli_query($con, $sql);

        // check whether data inserted or not.
        if($res == true)
        {
            // data inserted successfully
            $_SESSION['add']='<div class="success">Food added successfully</div>';
            header('Location:'.HOME_URL.'admin/manage-food.php');
        }
        else{
            // failed to insert data
            $_SESSION['add']='<div class="error">Failed to add food</div>';
            header('Location:'.HOME_URL.'admin/manage-food.php');
        }
    // upload img if selected

    // redirect with msg manage-food
} else {
}
?>
<?php include('partials/footer.php'); ?>