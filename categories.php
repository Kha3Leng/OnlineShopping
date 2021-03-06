<?php include('partials-front/menu.php'); ?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Products</h2>

        <?php
        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
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
                            <img src="images/category/<?php echo $image_name; ?>" class="img-responsive img-curve">

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>
        <?php
                }
            } else {
                echo "<div> No Category </div>";
            }
        }
        ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<?php include('partials-front/footer.php'); ?>