<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>

        <form action="" method="POST">
            <table class="tbl-30"><?php
                                    if (isset($_GET['order_id'])) {
                                        $order_id = $_GET['order_id'];

                                        $sql = "SELECT o.*, p.title pname, p.price price FROM tbl_order o, tbl_product p WHERE o.id = $order_id and p.id = o.product_id";
                                        $res = mysqli_query($conn, $sql);

                                        if ($res == TRUE) {
                                            if ($row = mysqli_fetch_assoc($res)) {
                                                $id = $row['id'];
                                                $pname = $row['pname'];
                                                $price = $row['price'];
                                                $order_qty = $row['order_qty'];
                                                $customer_id = $row['customer_id'];
                                                $status = $row['status'];
                                    ?><tr>
                                <td>Product</td>
                                <td><b><?php echo $pname; ?></b></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><b>$ <?php echo $price; ?></b></td>
                            </tr>
                            <tr>
                                <td>Qty</td>
                                <td><input type="number" name="order_qty" value="<?php echo $order_qty; ?>" /></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <select name="status">
                                        <option value="Ordered" <?php if ($status == 'Ordered') echo 'selected'; ?>>Ordered</option>
                                        <option value="On Delivery" <?php if ($status == 'On Delivery') echo 'selected'; ?>>On Delivery</option>
                                        <option value="Delivered" <?php if ($status == 'Delivered') echo 'selected'; ?>>Delivered</option>
                                        <option value="Cancelled" <?php if ($status == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Customer</td>
                                <td>
                                    <select name="customer_id"><?php
                                                                $sql1 = "SELECT * FROM tbl_customer";
                                                                $res1 = mysqli_query($conn, $sql1);

                                                                if ($res1 == true) {
                                                                    if (mysqli_num_rows($res1) > 0) {
                                                                        while ($row1 = mysqli_fetch_assoc($res1)) {
                                                                            $cid = $row1['id'];
                                                                            $name = $row1['name']; ?><option value="<?php echo $cid; ?>" <?php if ($customer_id == $cid) echo 'selected'; ?>><?php echo $name; ?></option><?php
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                } ?>
                                    </select>
                                </td>
                            </tr><?php
                                            }
                                        }
                                    } else {
                                        header("location:" . SITEURL . "admin/manage-order.php");
                                    } ?><tr>
                    <td colspan=" 2">
                        <input type="hidden" name="id" value="<?php echo $order_id; ?>" />
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary" />
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div><?php
        if (isset($_POST['submit'])) {
            $order_id = $_POST['id'];
            $customer_id = $_POST['customer_id'];
            $order_qty = $_POST['order_qty'];
            $status = $_POST['status'];

            $sql = "UPDATE tbl_order SET 
                customer_id = $customer_id,
                order_qty = $order_qty,
                status = '$status'
                WHERE id = $order_id";
            $res = mysqli_query($conn, $sql);
            if ($res == true) {
                $_SESSION['update'] = "<div class='success'>Successfully updated</div>";
                header("location:" . SITEURL . "admin/manage-order.php");
                // if (headers_sent()) {
                //     die("Error: headers already sent!");
                // } else {
                //     header("location:" . SITEURL . "admin/manage-product.php");
                //     exit();
                // }
            } else {
                $_SESSION['update'] = "<div class='error'>Fail to Update Admin</div>";
                header("location:" . SITEURL . "admin/manage-order.php");
            }
        }
        ?><?php include('partial/footer.php'); ?>