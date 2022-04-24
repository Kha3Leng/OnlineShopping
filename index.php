<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>product-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Goods.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Products</h2>

        <?php
        $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
        ?>
                    <a href="<?php echo SITEURL; ?>category-products.php?id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <img src="images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>
                <?php
                }
            } else {
                ?>
                <a href="#">
                    <div class="box-3 float-container">
                        <img src="images/category/dummy.jpeg" alt="Pizza" class="img-responsive img-curve">

                        <h3 class="float-text text-white">No Category</h3>
                    </div>
                </a>
        <?php
            }
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Products</h2>

        <?php
        $sql1 = "SELECT * FROM tbl_product WHERE active = 'Yes' AND featured = 'Yes'";
        $res1 = mysqli_query($conn, $sql1);

        if ($res == true) {
            if (mysqli_num_rows($res1) > 0) {
                while ($row1 = mysqli_fetch_assoc($res1)) {
                    $id = $row1['id'];
                    $title = $row1['title'];
                    $description = $row1['description'];
                    $price = $row1['price'];
                    $image_name = $row1['image_name'];
        ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">

                            <?php
                            if ($image_name == '') {
                                echo "<div class='error'>No Image</div>";
                            } else {
                            ?>
                                <img src="images/product/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php } ?>
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">$ <?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="order.php" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
        <?php
                }
            } else {
            }
        }
        ?>

        <div class="clearfix"></div>



    </div>

    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->
<?php include('partials-front/footer.php'); ?>