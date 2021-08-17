<?php
include('partials/menu.php');
?>
<?php
    // get the id of selected admin
    $id =  $_GET['id'];

    // create sql query to get the details.
    $sql = "Select * from tbl_admin where id=$id";

    // standard sql query
    $res = mysqli_query($con, $sql);

    // check wether the query is executed or not.
    if($res== true)
    {
        // check whether the data is available or not
        $count = mysqli_num_rows($res);

        // check whether we have admin data or not.
        if($count == 1)
        {
            // echo 'admin available';
            $row = mysqli_fetch_assoc($res);

            $full_name = $row['full_name'];
            $username = $row['username'];
        }
        else
        {
            header('Location:'.HOME_URL.'admin/manage-admin.php');
        }
    }
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1><br><br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name ?>" id="" class="input-field"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" value="<?php echo $username ?>" id="" class="input-field"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>" id="">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary" id="">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
// check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    // echo 'btn clicked';
    // get all values from form to be update

    $id =mysqli_real_escape_string($con, $_GET['id']);
    $full_name =mysqli_real_escape_string($con, $_POST['full_name']);
    $username = mysqli_real_escape_string($con,$_POST['username']);

    // create sql query to update admin
    $sql = "update tbl_admin SET
    full_name='$full_name',
    username='$username' where id='$id'";

    $res= mysqli_query($con,$sql);

    // check whether the query successfull executed or not
    if($res == true)
    {
        // query executed admin updated
        $_SESSION['update']='<div class="success">Admin updated successfully</div>';
        header('Location: '.HOME_URL.'admin/manage-admin.php');
    }
    else
    {
        // failed to update admin
        $_SESSION['update']='<div class="error">Failed to update admin</div>';
        header('Location: '.HOME_URL.'admin/manage-admin.php');
 
    }
}
else
{
    // echo 'not clicked';
}
?>
<?php
include('partials/footer.php');
?>