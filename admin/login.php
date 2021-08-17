<?php
include('../config/constants.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1><br>
<?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['no_login_msg']))
    {
        echo $_SESSION['no_login_msg'];
        unset($_SESSION['no_login_msg']);
    }
?>
<br>
        <!-- form starts here -->
        <form action="" method="POST" class="text-center">
           Username: <input type="text" name="username" placeholder="Enter Username" class="input-field"><br><br>
           Password: <input type="password" name='password' placeholder="Enter password" class="input-field"><br><br>
            <input type="submit" name='submit' value="Login" class="btn-login"><br>
        </form>
        <!-- form ends here -->
        <br>
        <p>Created by <a href="https://thoughtsofkinjal.blogspot.com/">Kinjal Suryavanshi</a></p>
    </div>
</body>
</html>
<?php
// check whether the submit button is work or not.
if(isset($_POST['submit']))
{
    // echo ' work';
    // get the data from login form.
    $username= mysqli_real_escape_string($con,$_POST['username']);
    $password =mysqli_real_escape_string($con,md5($_POST['password']));

    // sql to check whether the username and password exists or not.
    $sql = "select * from tbl_admin where username='$username' and password='$password'";

    // to see execute query
    $res = mysqli_query($con, $sql);

    // count rows to check whether user exists or not.
    $count = mysqli_num_rows($res);
    // if count == 1 then user exists otherwise not.

    if($count==1)
    {
        // user available - login 
        $_SESSION['login']="<div class='success'>Login Successfully..</div>";
        $_SESSION['user']=$username;
        header('Location:'.HOME_URL.'admin/');
    }
    else
    {
        // user not available - login failed
        $_SESSION['login']="<div class='error'>Username or password did not match, Please try again..</div>";
        header('Location:'.HOME_URL.'admin/login.php');
 
    }
}
?>