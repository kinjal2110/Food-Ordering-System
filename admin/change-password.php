<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td><input type="password" name="current_password" placeholder="current password" class="input-field"></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new_password" class="input-field" placeholder="new password"></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password" class="input-field" placeholder="confirm password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" id="">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php

if (isset($_POST['submit'])) {
    // echo 'clicked';
    // get the data
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    // check wether id and password are exists or not.
    $sql = "select * from tbl_admin where
    id=$id and password='$current_password'";

    // check cinfirm or new password is match or not.
    $res = mysqli_query($con, $sql);

    // if above is true
    if ($res == true) {
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            // user exists
            // check whether new password and cinfirm password match or not
            if ($new_password == $confirm_password) {
                // update password
                // echo 'password matched';
                $sql = "update tbl_admin SET password='$new_password'
                where id= $id";

                $res = mysqli_query($con, $sql);

                // check whether query updated or not.
                if($res == true)
                {
                    $_SESSION['change_pswd'] = '<div class="success">Password changed successfully </div>';
                    header('Location:' . HOME_URL . 'admin/manage-admin.php');
        
                }
                else{
                    $_SESSION['change_pswd'] = '<div class="error">Password was changed  </div>';
                    header('Location:' . HOME_URL . 'admin/manage-admin.php');
        
                }
            }
             else 
             {
                // we will redirect to manage admin
                $_SESSION['pswd_not_match'] = '<div class="error">Password not Match </div>';
                header('Location:' . HOME_URL . 'admin/manage-admin.php');
            }
        } else {
            // user doesn't exists
            $_SESSION['user_not_found'] = '<div class="error">User not found </div>';
            header('Location:' . HOME_URL . 'admin/manage-admin.php');
        }
    }
}
?>
<?php
include('partials/footer.php');
?>