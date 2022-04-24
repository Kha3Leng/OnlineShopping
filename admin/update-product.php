<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <?php

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM tbl_product WHERE id = $id";
            $res = mysqli_query($conn, $sql);

            if ($res == TRUE) {
                if (mysqli_num_rows($res) == 1) {
                    if ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $current_category = $row['category_id'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    }
                } else {
                    $_SESSION['no-product-avail'] = "<div class='error'>Product unavailable</div>";
                    header("location:" . SITEURL . "admin/manage-product.php");
                }
            }
        } else {
            header("location:" . SITEURL . "admin/manage-product.php");
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title :</td>
                    <td><input type="text" name="title" value="<?php echo $title; ?>" /></td>
                </tr>
                <tr>
                    <td>Description :</td>
                    <td>
                        <textarea name="description"><?php echo $description; ?>
                            </textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price :</td>
                    <td><input type="number" name="price" value="<?php echo $price; ?>" /></td>
                </tr>
                <tr>
                    <td>Category :</td>
                    <td>
                        <select name="category">
                            <?php
                            $sql1 = "SELECT title, id from tbl_category WHERE active = 'Yes'";
                            $res1 = mysqli_query($conn, $sql1);

                            if ($res1 == true and mysqli_num_rows($res1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($res1)) {
                                    $category_title = $row1['title'];
                                    $category_id = $row1['id'];
                            ?>
                                    <option <?php if ($current_category == $category_id) {
                                                echo "selected";
                                            } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                <?php
                                }
                            } else {
                                ?>
                                <option value="0">No Category</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured :</td>
                    <td>
                        <input <?php if ($featured == 'Yes') {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="Yes">Yes</input>
                        <input <?php if ($featured == 'No') {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="No">No</input>
                    </td>
                </tr>
                <tr>
                    <td>Active :</td>
                    <td>
                        <input <?php if ($active == 'Yes') {
                                    echo "checked";
                                } ?> type="radio" name="active" value="Yes">Yes</input>
                        <input <?php if ($active == 'No') {
                                    echo "checked";
                                } ?> type="radio" name="active" value="No">No</input>
                    </td>
                </tr>
                <tr>
                    <td>Current Image :</td>
                    <td><img src="../images/product/<?php echo $image_name; ?>" width="70px" /></td>
                </tr>
                <tr>
                    <td>Image :</td>
                    <td><input type="file" name="new_image_name" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $image_name; ?>" />
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" name="submit" value="Update Product" class="btn-secondary" />
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $id = $_POST['id'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    $price = $_POST['price'];
    $category_id = $_POST['category'];
    $description = $_POST['description'];
    $new_image_name = $_POST['new_image_name'];
    $cur_image_name = $_POST['current_image'];
    $image_name = '';

    if (isset($_FILES['new_image_name'])) {
        $image_name = $_FILES['new_image_name']['name'];
        if ($image_name != '') {
            //renaming image
            $temp = explode('.', $image_name);
            $ext = end($temp);
            $image_name = "product_" . rand(0000, 9999) . "." . $ext;
            $src_path = $_FILES['new_image_name']['tmp_name'];
            $des_path = "../images/product/" . $image_name;

            // cannot upload??? because folder is not writable.. run chmod 777 folder
            $upload =  move_uploaded_file($src_path, $des_path);

            if ($upload == false) {
                $_SESSION['upload'] = "<div class='error'>Fail to upload image</div>";
                header("location:" . SITEURL . "admin/manage-product.php");
                die();
            }

            if ($cur_image_name != '') {
                $path = "../images/product/" . $cur_image_name;
                $remove = unlink($path);

                if (!$remove) {
                    $_SESSION['delete-img'] = "<div class='error'>Fail to Delete current image successfully</div>";
                    header("location:" . SITEURL . "admin/manage-product.php");
                    die();
                }
            }
        } else {
            $image_name = $cur_image_name;
        }
    } else {
        $image_name = $cur_image_name;
    }

    $sql = "UPDATE tbl_product SET 
                title = '$title',
                description = '$description',
                price = $price,
                category_id = $category_id,
                featured = '$featured',
                active = '$active',
                image_name = '$image_name'
                WHERE id = $id";

    $res = mysqli_query($conn, $sql);

    //  or die(mysqli_error()); 
    // above function may cause header() not being able to redirect as headers already sent
    // remove die() function solves the issue.

    if ($res == true) {
        $_SESSION['update'] = "<div class='success'>Updated Product successfully</div>";
        header("Location:" . SITEURL . "admin/manage-product.php");
        // if (headers_sent()) {
        //     die("Error: headers already sent!");
        // } else {
        //     header("Location:" . SITEURL . "admin/manage-product.php");
        //     exit();
        // }
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to update product successfully</div>";
        header("location:" . SITEURL . "admin/manage-product.php");
    }
}
?>

<?php include('partial/footer.php'); ?>