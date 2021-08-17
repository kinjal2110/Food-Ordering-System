<?php
// authorization and acess control
// check  whether user login or not.
if(!isset($_SESSION['user']))
{
// if user is not logged in then redirect to login page
$_SESSION['no_login_msg']="<div class='error'>Please login to access Admin Panel.</div>";

// redirect to login page
header('Location:'.HOME_URL.'admin/login.php');
}
?>