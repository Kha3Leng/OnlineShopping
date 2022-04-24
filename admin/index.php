<?php include("partial/menu.php"); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <strong>
            <h1>Dashboard</h1>
        </strong>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <div class="col-4 center">
            <?php
            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                $category_count = mysqli_num_rows($res);
            }
            ?>
            <h1><?php echo $category_count; ?></h1>
            <br />
            Category
        </div>
        <div class="col-4 center">
            <?php
            $sql1 = "SELECT * FROM tbl_product WHERE active='Yes'";
            $res1 = mysqli_query($conn, $sql1);

            if ($res1 == true) {
                $product_count = mysqli_num_rows($res1);
            }
            ?>
            <h1><?php echo $product_count; ?></h1>
            <br />
            Product
        </div>
        <div class="col-4 center">
            <?php
            $sql2 = "SELECT * FROM tbl_order WHERE status='Ordered'";
            $res2 = mysqli_query($conn, $sql2);

            if ($res2 == true) {
                $order_count = mysqli_num_rows($res2);
            }
            ?>
            <h1><?php echo $order_count; ?></h1>
            <br />
            Total Order
        </div>
        <div class="col-4 center">
            <?php
            $sql3 = "SELECT SUM(total) as total FROM tbl_order WHERE status='Delivered'";
            $res3 = mysqli_query($conn, $sql3);

            if ($res3 == true) {
                $row = mysqli_fetch_assoc($res3);
                $total = $row['total'];
            }
            ?>
            <h1>$ <?php echo $total; ?></h1>
            <br />
            Revenue Generated
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section Ends -->

<?php include('partial/footer.php'); ?>