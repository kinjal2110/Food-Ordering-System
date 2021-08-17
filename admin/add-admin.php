<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1><br>
        <?php
            if(isset($_SESSION['add']))            //checking session is set or not
            {
                echo $_SESSION['add'];          //display session msg
                unset($_SESSION['add']);        //remove session msg
            }
        ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name" class="input-field"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" id="" placeholder="Enter your username" class="input-field"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter your password" class="input-field"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
               
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>

<?php
// process the value from form and save in database

// check whather the button is clicked or not
if(isset($_POST["submit"]))
{
    // button clicked
    // get data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password =md5($_POST['password']);

    // sql query to save data into database
    $sql = "Insert into tbl_admin set
    full_name='$full_name',
    username='$username',
    password='$password'";

    // executing query and save data in database
    $res =mysqli_query($con,$sql) or die(mysqli_error());       //store data in database
    if($res == true)
    {
        // data inserted
        // echo 'data inserted';
        $_SESSION['add']='<div class="success">Admin inserted successfully</div>';
        // redirecxt page
        header('Location:'.HOME_URL.'admin/manage-admin.php');
    }
    else{
        // echo 'failed to insert data';
        $_SESSION['add']='<div class="error">failed to add admin</div>';
        // redirecxt page
        header('Location:'.HOME_URL.'admin/manage-admin.php');
    }
    }
else{
    // button doesn't clicked
}
?>