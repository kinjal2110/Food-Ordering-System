<?php
include('partials/menu.php');
?>
<?php
if (isset($_GET['id'])) {
    // get the id of selected admin
    $id =  $_GET['id'];

    // create sql query to get the details.
    $sql = "Select * from tbl_food where id=$id";

    // standard sql query
    $res = mysqli_query($con, $sql);

    // check wether the query is executed or not.
    if ($res == true) {
        // check whether the data is available or not
        $count = mysqli_num_rows($res);

        // check whether we have admin data or not.
        if ($count == 1) {
            // echo 'category available';
            $row = mysqli_fetch_assoc($res);

            $title = $row['title'];
            $description = $row['description'];
            $price = $row['price'];
        
            $image_name = $row['image_name'];
            $featured = $row['featured'];
            $active = $row['active'];
        } else {
            $_SESSION['No_food_found'] = '<div class="error">Category not found</div>';
            header('Location:' . HOME_URL . 'admin/manage-food.php');
        }
    } else {
        header('Location:' . HOME_URL . 'admin/manage-food.php');
    }
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1><br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td><input type="text" name="title" value="<?php echo $title ?>" id="" class="input-field"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" value="<?php echo $description; ?>" id="" cols="20" rows="10"><?php echo $description; ?></textarea></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price" value="<?php echo $price; ?>" id=""></td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td><?php
                        if ($image_name != '') {
                        ?> <img name='' src="<?php echo HOME_URL . 'images/food/'; ?><?php echo $image_name; ?>" width="100px" height="100px" alt="">
                        <?php
                        } else {
                            echo '<div class="error">Image not added</div>';
                        }
                        ?>
                        <input type="file" name="current_image" value="" id="" class="input-field">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td><input <?php if ($featured == 'yes') {
                                    echo 'checked';
                                } ?> type="radio" name="featured" value="yes" id=""> Yes
                        <input <?php if ($featured == 'no') {
                                    echo 'checked';
                                } ?> type="radio" name="featured" value="no" id=""> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td><input <?php if ($active == 'yes') {
                                    echo ' checked';
                                } ?> type="radio" name="active" value="yes"> Yes
                        <input <?php if ($active == 'no') {
                                    echo 'checked';
                                } ?> type="radio" name="active" value="no" id=""> No
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>" id="">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary" id="">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
// check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    // echo 'btn clicked';
    // get all values from form to be update

    $id = mysqli_real_escape_string($con,$_POST['id']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $current_image =mysqli_real_escape_string($con, $_POST['current_image']);
    $featured = mysqli_real_escape_string($con,$_POST['featured']);
    $active =mysqli_real_escape_string($con, $_POST['active']);
    // echo $current_image; exit;
    // check whether img is selected or not
    if (isset($_FILES['current_image']['name'])) {
        // get the img details
        $image_name = $_FILES['current_image']['name'];

        // check whether img available or not
        if ($image_name != '') {
            // img available

            // upload new img and remove current img
            $image_name = $_FILES['current_image']['name'];

            // get .jpg, .png, .jpeg extension of image
            $ext = end(explode('.', $image_name));

            // img renaming
            $image_name = 'food_name_' . rand(000, 999) . '.' . $ext;

            $source_path = $_FILES['current_image']['tmp_name'];

            $destination_path = "../images/food/" . $image_name;

            $upload = move_uploaded_file($source_path, $destination_path);

            // check whether the img uploaded or not
            // if img is not uploaded then we will stop the process and redirect with error msg
            if ($upload == false) {
                // set msg
                $_SESSION['upload'] = '<div class="error">Failed to upload image</div>';
                header('Location:' . HOME_URL . 'admin/manage-food.php');
                die();
            }
            if ($current_image != '') {
                $remove_path = '../images/food' . $current_image;
                $remove = unlink($remove_path);

                //  check whether img remove or not
                if ($remove == false) {
                    // failed to remove img
                    $_SESSION['failed_to_remove'] = '<div class="error">Failed to remove current image</div>';
                    header('Location:' . HOME_URL . 'admin/manage-food.php');
                    die();
                }
            }
        } else {

            $image_name = $current_image;
        }
    } else {
        $image_name = $current_image;
    }


    // create sql query to update admin
    $sql = "update tbl_food SET
    title='$title',
    description='$description',
    price=$price,
    image_name='$image_name',
    featured='$featured', active='$active' where id='$id'";

    $res = mysqli_query($con, $sql);

    // check whether the query successfull executed or not
    if ($res == true) {
        // query executed admin updated
        $_SESSION['update'] = '<div class="success">Food updated successfully</div>';
        header('Location: ' . HOME_URL . 'admin/manage-food.php');
    } else {
        // failed to update admin
        $_SESSION['update'] = '<div class="error">Failed to update Food</div>';
        header('Location: ' . HOME_URL . 'admin/manage-food.php');
    }
} else {
    // echo 'not clicked';
}
?>
<?php
include('partials/footer.php');
?>