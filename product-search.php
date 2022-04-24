<?php include('partials-front/menu.php'); ?>
<!-- Navbar Section Ends Here -->

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Products on Your Search <a href="#" class="text-white">"<?php echo $_POST['search']; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Product Menu</h2>

        <?php
        if (isset($_POST['search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);

            $sql = "SELECT * FROM tbl_product WHERE title like '%$search%' or description like '%$search%'";
            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                if ($image_name == '') {
                                    echo "<div class='error'>No Image </div>";
                                } else {
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php } ?>
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">$<?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
        <?php
                    }
                } else {
                    echo "<div class='error'>Products not found.. Contact us to supply our inventory.</di>";
                }
            }
        }
        ?>

        <div class="clearfix"></div>

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->
<?php include('partials-front/footer.php'); ?>