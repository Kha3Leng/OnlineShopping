<?php include('partials-front/menu.php'); ?>
<!-- Navbar Section Ends Here -->

<?php
if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
    $sql = "SELECT * FROM tbl_product WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $product_id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
        }
    }
} else {
    header("location:" . SITEURL);
    // echo "what";
}
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="#" class="order" method="POST">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <?php
                    if ($image_name == '') {
                        echo "<div class='error'>No Image</div>";
                    } else {
                    ?>
                        <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    <?php } ?>
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <p class="food-price">$ <?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>" />
                    <input type="hidden" name="id" value="<?php echo $product_id; ?>" />

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

        <?php
        if (isset($_POST['submit'])) {
            $product_id = $_POST['id'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            $total = $price * $qty;
            $order_date = date("Y-m-d h:i:s");
            $status = "Ordered"; // ordered, on delivery, delivered, cancelled

            $cname = $_POST["full-name"];
            $contact = $_POST["contact"];
            $email = $_POST["email"];
            $address = $_POST["address"];

            $sql = "INSERT INTO tbl_customer(name, contact, email, address) VALUES ('$cname', '$contact', '$email', '$address')";
            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                $customer_id = mysqli_insert_id($conn);
                $sql1 = "INSERT INTO tbl_order(product_id, order_qty, total, order_date, status, customer_id)
                 VALUES ($product_id, $qty, $total,\"$order_date\", '$status', $customer_id)";
                $res1 = mysqli_query($conn, $sql1);
                if ($res1 == true) {
                    $_SESSION['order'] =  "<div class='success text-center'>Ordered Successfully</div>";
                    header("Location:" . SITEURL);
                } else {
                    $_SESSION['order'] =  "<div class='error text-center'>Failed to order Successfully</div>";
                    header("location:" . SITEURL);
                }
            } else {
                $_SESSION['customer'] =  "<div class='error text-center'>Failed to add customer Successfully</div>";
                header("location:" . SITEURL);
            }
        }
        ?>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->
<?php include('partials-front/footer.php'); ?>