<?php include("partial/menu.php"); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <strong>
            <h1>Manage Order</h1>
        </strong>

        <br><br><br>
        <a href="#" class="btn-primary">Add Order</a>

        <br><br><br>
        <?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <br><br><br>

        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "SELECT o.*, c.name cname, p.title pname, p.id pid FROM tbl_order o, tbl_customer c, tbl_product p WHERE o.customer_id = c.id and p.id = o.product_id order by o.order_date";
            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $pname = $row['pname'];
                        $price = $row['price'];
                        $order_qty = $row['order_qty'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
                        $cname = $row['cname'];
            ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $pname; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php echo $order_qty; ?></td>
                            <td><?php echo $order_date; ?></td>
                            <td><?php
                                if ($status == 'Ordered') {
                                    echo "<label style='color: orange;'>$status</label>";
                                } else if ($status == 'On Delivery') {
                                    echo "<label style='color: green;'>$status</label>";
                                } else if ($status == 'Delivered') {
                                    echo "<label style='color: #009432;'>$status</label>";
                                } else if ($status == 'Cancelled') {
                                    echo "<label style='color: grey;'>$status</label>";
                                } else
                                ?></td>
                            <td><?php echo $cname; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-order.php?order_id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>
            <?php
                    }
                } else {
                    echo "<td colspan='8'>No Order</td>";
                }
            }
            ?>
        </table>
    </div>
</div>
<!-- Main Content Section Ends -->
<?php include('partial/footer.php'); ?>