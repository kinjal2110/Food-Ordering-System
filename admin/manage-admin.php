<?php include('partials/menu.php'); ?>

<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>
        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];          //displaying session msg
            unset($_SESSION['add']);        //this is removing msg
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['user_not_found']))
        {
            echo $_SESSION['user_not_found'];
            unset($_SESSION['user_not_found']);
        }
        if(isset($_SESSION['pswd_not_match']))
        {
            echo $_SESSION['pswd_not_match'];
            unset($_SESSION['pswd_not_match']);
        }
        if(isset($_SESSION['change_pswd']))
        {
            echo $_SESSION['change_pswd'];
            unset($_SESSION['change_pswd']);
        }
        ?><br><br>
        <table class="tbl-full">
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br><br>
            <tr>
                <th>Sr No.</th>
                <th>Full Name</th>
                <th>Email/Username</th>
                <th>Actions</th>
            </tr>
            <?php
            // query to get all admin
            $sql = "select * from tbl_admin";
            $res = mysqli_query($con, $sql);

            $sn = 1;            //create variable and assign  the value.
            if ($res == true) {
                $rows = mysqli_num_rows($res);      //get all the rows from database

                // checck no. of rows
                if ($rows > 0) {
                    // we have data in database
                    while ($rows = mysqli_fetch_assoc($res)) {
                        // using while loop to get all data from database
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];


                        // displays value in table
            ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><a href="<?php echo HOME_URL; ?>admin/change-password.php?id=<?php echo $id ?>" class="btn-dark">change password</a>
                                <a href="<?php echo HOME_URL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary"> update</a>
                                <a href="<?php echo HOME_URL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger"> delete</a>
                            </td>
                        </tr>
            <?php
                    }
                } else {
                    // we don't have data in database
                    ?>
  <td colspan="4"> No Admin added</td>
                     
                    <?php
                }
            }
            ?>
        </table>
    </div>
    <!-- main content section ends -->

    <?php include('partials/footer.php');  ?>