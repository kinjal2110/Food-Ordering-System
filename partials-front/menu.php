<?php include('config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our css file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- navbar section starts here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <img src="images/logo2.webp" alt="" height="100px" width="100px" class="img-responsive logo-img">
            </div>
            <div>
                <h2 class="food-title">Indian Foody</h2>
            </div>
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo HOME_URL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo HOME_URL.'categories.php'; ?>">Category</a>
                    </li>
                    <li>
                        <a href="<?php echo HOME_URL.'foods.php'; ?>">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo HOME_URL.'order.php'; ?>">Order</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix">

            </div>
        </div>
    </section>
    <!-- navbar section ends here -->
