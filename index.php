<?php
    include('partials-front/menu.php');
?>
    <!-- food search section starts here -->
    <section class="food-search text-center">
        <div class="container">
            <form action="<?php echo HOME_URL.'food-search.php'; ?>" method="POST">
                <input type="search" name="search" placeholder="Search for Food">
                <input type="submit" name="submit" id="" value="search" class="btn btn-primary">
            </form>
        </div>
    </section>
    <!--food search section ends here -->
    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>
    
    <!-- categories section starts here -->
    <section class="categories">
        <div class="container text-center">
            <h2 class="text-center">Categories</h2>
            
            <?php 
                //Create SQL Query to Display CAtegories from Database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' OR featured='Yes' LIMIT 3";
                //Execute the Query
                $res = mysqli_query($con, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo HOME_URL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Check whether Image is available or not
                                    if($image_name=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo HOME_URL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>
            <div class="clearfix">
            </div>
        </div>

    </section>
    <!-- categories section ends here -->

    <!-- food menu section starts here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Explore Food </h2>
<?php

//Getting Foods from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' OR featured='Yes' LIMIT 6";

            //Execute the Query
            $res2 = mysqli_query($con, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether food available or not
            if($count2>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo HOME_URL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">$<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo HOME_URL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //Food Not Available 
                echo "<div class='error'>Food not available.</div>";
            }
            
            ?>

            <!-- <div class="food-menu-box">
                <div class="food-menu-img  img-responsive ">
                    <img src="images/nisha-ramesh-Q5mPPGld5Zk-unsplash.jpg" alt="" class="img-responsive  img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Halva</h4>
                    <p class="food-price">$5.2</p>
                    <p class="food-detail">One cannot announce the arrival of winters without making the season's first
                        gajar ka halwa. Grated carrots in a loving embrace with Nestlé MILKMAID, assorted nuts is the
                        most comforting sign of a long awaited winter.</p><br>
                    <a href="" class="btn btn-primary food-btn">Order Now</a>
                </div>
            </div>
            <div class="food-menu-box">
                <div class="food-menu-img  img-responsive ">
                    <img src="images/a-singh-W50inNOVUdU-unsplash.jpg" alt="" height="340px"
                        class="img-responsive  img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Gulab jamun</h4>
                    <p class="food-price">$10.2</p>
                    <p class="food-detail">An evergreen and a favorite of all, a traditional Indian sweet, prepared at
                        every festival in every household is the kala jamun.</p><br>
                    <a href="" class="btn btn-primary food-btn">Order Now</a>
                </div>
            </div>
            <div class="food-menu-box">
                <div class="food-menu-img  img-responsive ">
                    <img src="images/yansi-keim-qDaSDiuc8bU-unsplash.jpg" alt="" class="img-responsive  img-curve"
                        height="355px">
                </div>
                <div class="food-menu-desc">
                    <h4>Bhajiya</h4>
                    <p class="food-price">$4.2</p>
                    <p class="food-detail">These crisp fritters are prepared mainly with onion and gram flour (besan).
                        Kanda Bhajiya is a popular street food snack in Maharashtra. There are many variations to
                        preparing them. This is crispy, delicious Kanda Bhajiya.</p><br>
                    <a href="" class="btn btn-primary food-btn">Order Now</a>
                </div>
            </div>
            <div class="food-menu-box">
                <div class="food-menu-img  img-responsive ">
                    <img src="images//shreyak-singh-FabRYbxWuZU-unsplash.jpg" alt="" class="img-responsive  img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Idli-Sambhar</h4>
                    <p class="food-price">$3.2</p>
                    <p class="food-detail">Idli Sambar is a hearty, satisfying, comforting and a healthy meal of soft
                        fluffy idlis served with savory, spiced and lightly tangy sambar – a vegetable stew made with
                        lentils and assorted vegetables. It is a winning combination made for each other.</p><br>
                    <a href="" class="btn btn-primary food-btn">Order Now</a>
                </div>
            </div>
            <div class="food-menu-box">
                <div class="food-menu-img  img-responsive ">
                    <img src="images/ashwini-chaudhary-hyugKPPBikw-unsplash.jpg" alt=""
                        class="img-responsive  img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Paratha</h4>
                    <p class="food-price">$8.5</p>
                    <p class="food-detail">Crispy, flaky paratha is the perfect side to serve with dals and curries.
                        This traditional Indian flatbread is unleavened, and is filled with tender and crisp layers. Try
                        my classic plain paratha recipe with step-by-step photos to make a batch for enjoying with your
                        favorite saucy dishes.</p><br>
                    <a href="" class="btn btn-primary food-btn">Order Now</a>
                </div>
            </div>
            <div class="food-menu-box">
                <div class="food-menu-img  img-responsive ">
                    <img src="images/3dc31ca08524ba086dfd6ae0a693e0d3.jpg" alt="" class="img-responsive  img-curve"
                        height="350px">
                </div>
                <div class="food-menu-desc">
                    <h4>Pav-Bhaji</h4>
                    <p class="food-price">$6.8</p>
                    <p class="food-detail">a world-famous fast food dish or perhaps the king of the street food from the
                        western state of maharashtra. the recipe is an amalgamation of vegetables spiced with a unique
                        blend of spices known as pav bhaji masala and served with soft bread roll aka pav</p><br>
                    <a href="" class="btn btn-primary food-btn">Order Now</a>
                </div>
             </div> -->
            <div class="clearfix"></div>
        </div>
        
        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- food menu section ends here -->

<?php include('partials-front/footer.php'); ?>