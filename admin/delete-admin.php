<?php
// include constants.php file here
include('../config/constants.php');

// get id of the admin to the deleted
$id= $_GET['id'];
echo $id;

// query to delete admin
$sql = "delete from tbl_admin where id=$id";

// execute the query
$res = mysqli_query($con,$sql);

// check whether the query executed successfully or not.
if($res== true)
{
    // echo 'query executed successfully anf admin deleted.';
    // create session variable to display msg
    $_SESSION['delete']='<div class="success">Admin Deleted Successfully</div>';
    header("Location:".HOME_URL."admin/manage-admin.php");
}
else
{
    // echo 'failed to delete admin.';
    $_SESSION['delete'] = '<div class="error">Failed to delete admin, try again later</div>';
    header("Location:".HOME_URL."admin/manage-admin.php");
}
// redirect to manage admin page with msg either success oor error.

?>