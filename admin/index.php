
  
    <?php include('partials/menu.php'); ?>
    <!-- main content section starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Dashboard</h1>
            <br>
            <?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
?>
           <br>
            <div class="col-4 text-center">
                <?php
                    $sql = "select * from tbl_category";

                    $res = mysqli_query($con, $sql);

                    $count = mysqli_num_rows($res);

                    
                ?>
                <h1><?php echo $count; ?></h1>
                <br>
                Categories
            </div>


            <div class="col-4 text-center">
                <?php 
                    $sql = "select * from tbl_food";

                    $res = mysqli_query($con, $sql);

                    $count = mysqli_num_rows($res);
                ?>
                <h1><?php echo $count; ?></h1>
                <br>
                Foods
            </div>
            <div class="col-4 text-center">
            <?php 
                    $sql = "select * from tbl_order";

                    $res = mysqli_query($con, $sql);

                    $count = mysqli_num_rows($res);
                ?>
                <h1><?php echo $count; ?></h1>
                 <br>
                Orders
            </div>

            <div class="col-4 text-center">
                <?php
                    $sql = "select SUM(total) as 'total' from tbl_order where status='Delivered'";

                    $res = mysqli_query($con, $sql);

                    $row = mysqli_fetch_assoc($res);

                    // get total revenue
                    $total_revenue = $row['total'];
                ?>
                <h1><?php echo $total_revenue; ?></h1>
                <br>
                Revenue
            </div>
            
        </div>
        <div class="clearfix">
                
            </div>
    </div>
    <!-- main content section ends -->

<?php 
    include('partials/footer.php');
?>
