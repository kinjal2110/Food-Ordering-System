<?php
include('../config/constants.php');
if (isset($_GET['id']) or isset($_GET['image_name'])) {
    // header("Location:".HOME_URL."admin/manage-admin.php");
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if ($image_name != '') {
        // img is available
        $path = '../images/food/' . $image_name;

        $remove = unlink($path);   //unlink will remove img

        
         
            // sql query delete data from database
            $sql = "delete from tbl_food where id= $id";
// echo $sql; exit;
            $res = mysqli_query($con, $sql);

            if ($res == true) {
                // set success msg and redirect
                $_SESSION['delete'] = '<div class="success">Food deleted successfully</div>';
                header('Location:' . HOME_URL . 'admin/manage-food.php');
            } else {
                $_SESSION['delete'] = '<div class="error">Failed to delete records</div>';
                header('Location:' . HOME_URL . 'admin/manage-food.php');
            }
        
    }
    else{
        $sql = "delete from tbl_food where id= $id";
        // echo $sql; exit;
                    $res = mysqli_query($con, $sql);
        
                    if ($res == true) {
                        // set success msg and redirect
                        $_SESSION['delete'] = '<div class="success">Food deleted successfully</div>';
                        header('Location:' . HOME_URL . 'admin/manage-food.php');
                    } else {
                        $_SESSION['delete'] = '<div class="error">Failed to delete records</div>';
                        header('Location:' . HOME_URL . 'admin/manage-food.php');
                    }
        header('Location:'.HOME_URL.'admin/manage-food.php');
    }
} else {
    // redirect to manage category page.
    header('Location:' . HOME_URL . 'admin/manage-food.php');
}
