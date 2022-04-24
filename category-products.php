<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql1 = "SELECT title FROM tbl_category WHERE id = $id";
            $res1 = mysqli_query($conn, $sql1);
            if ($res1 == true) {
                if (mysqli_num_rows($res1) > 0) {
                    while ($row = mysqli_fetch_assoc($res1)) {
                        $title = $row['title'];
                    }
                } else {
                    echo "<div class='error'>No Category</div>";
                }
            }
        } else {
            // header("location:" . SITEURL);
            echo "<div class='error'>No erro</div>";
        }
        ?>

        <h2>Products on <a href="#" class="text-white">"<?php echo $title; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Products</h2>

        <?php
        $sql = "SELECT * FROM tbl_product  WHERE category_id = $id";
        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $ptitle = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
        ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            if ($image_name == '') {
                                echo "<div class='error'>No Image</div>";
                            } else {
                            ?>
                                <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php } ?>
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">$ <?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
        <?php
                }
            } else {
                echo "<div class='error'>No Product</div>";
            }
        }
        ?>


        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->
<?php include('partials-front/footer.php'); ?>