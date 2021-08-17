<?php
include("partials/menu.php");
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>
        <?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    
?><br><br>
        <!-- add category form starts -->
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
<tr>
    <td>Title:</td>
    <td><input type="text" name='title' class="input-field" placeholder="Category Title"></td>
</tr>

<tr>
    <td>Select Image</td>
    <td><input type="file" name="image_name"></td>
</tr>

<tr>
    <td>Featured:</td>
    <td><input type="radio" name="featured" value="yes" id=""> Yes 
    <input type="radio" name="featured" value="no" id=""> No</td>
</tr>
<tr>
    <td>Active:</td>
    <td><input type="radio" name="active" value="yes"> Yes
    <input type="radio" name="active" value="no" id=""> No</td>
</tr>
<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
    </td>
</tr>
        </table>
        </form>
        <!-- add category form ends -->
    </div>
</div>

<?php
// check whether submit button is clicked or not
if(isset($_POST['submit']))
{
    // echo 'clicked';
    // get the value from form.
    $title = $_POST['title'];

    // for radio input type we need to check button is selected or not.
    if(isset($_POST['featured']))
    {
        // get the value from form.
        $featured = $_POST['featured'];
    }
    else{
        // set the default value.
        $featured = 'no';
    }

    if(isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
    else
    {
        $active = 'no';
    }

    // check whether the image is selected or not.
    // print_r($_FILES['image_name']);
    // die();

    if(isset($_FILES['image_name']['name']))
    {
        


        // we will upload img
        // for upload img we need two things source path and destination path.
        $image_name = $_FILES['image_name']['name'];

        // get .jpg, .png, .jpeg extension of image
        $ext =end(explode('.',$image_name));

        // img renaming
        $image_name = 'food_category_'.rand(000,999).'.'.$ext;

        $source_path = $_FILES['image_name']['tmp_name'];

        $destination_path = "../images/category/".$image_name;

        $upload = move_uploaded_file($source_path,$destination_path);

        // check whether the img uploaded or not
        // if img is not uploaded then we will stop the process and redirect with error msg
        if($upload == false)
        {
            // set msg
            $_SESSION['upload']= '<div class="error">Failed to upload image</div>';
            header('Location:'.HOME_URL.'admin/add-category.php');
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

    // create SQL query to insert category in database

    $sql = "insert into tbl_category set 
            title= '$title',
            image_name = '$image_name', featured='$featured', active='$active'";
        
    // execute the query and save in database
    $res= mysqli_query($con, $sql);

    // check whether the query executed or not
    if($res == true)
    {
        // query executed and category add
        $_SESSION['add']= '<div class="success">Category added successfully</div>';
        header('Location:'.HOME_URL.'admin/manage-category.php');
    }
    else
    {
        // failed to add category
        $_SESSION['add']= '<div class="error">Failed to add Category  </div>';
        header('Location:'.HOME_URL.'admin/manage-category.php');
    }
}
?>

<?php
include("partials/footer.php");
?>