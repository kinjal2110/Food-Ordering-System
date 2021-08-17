<?php include('partials/menu.php'); ?>

<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
        <br>
        <h2>Food Table</h2>
        <table class="tbl-full">
            <br>
            <tr>
                <th>Sr No.</th>
                <th>Food</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
             </tr>

            <?php

            $sql = "select * from tbl_order";
            $sn = 1;
            $res = mysqli_query($con, $sql);

            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $food; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $total; ?></td>
                        <td><a href="<?php echo HOME_URL; ?>/admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary"> update</a>
            </td>
                       </tr>
            <?php

                }
            }
            ?>
        </table>
<br><br>
        <h2>Customer Details table</h2>
        <table class="tbl-full">
            <br>
            <tr>
                <th>Sr No.</th>
                <th>Order-date</th>
                <th>Status</th>
                <th>Customer-name</th>
                <th>Customer-contact</th>
                <th>Customer-email</th>
            </tr>

            <?php

            $sql = "select * from tbl_order";
            $sn = 1;
            $res = mysqli_query($con, $sql);

            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $order_date = $row['order_date'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
            ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $order_date; ?></td>
                        <td><?php echo $status; ?></td>
                        <td><?php echo $customer_name; ?></td>
                        <td><?php echo $customer_contact; ?></td>
                        <td><?php echo $customer_email; ?></td>
                    </tr>
            <?php

                }
            }
            ?>
        </table>

    </div>
    <!-- main content section ends -->

    <?php include('partials/footer.php');  ?>