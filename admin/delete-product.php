<?php 

    include('config/constant.php');

    if (isset($_GET['id']) AND isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if ($image_name != ''){
            $path = "../images/product/".$image_name;

            //check if the folder is writable chmod 777
            $remove = unlink($path);

            if (!$remove){
                $_SESSION['delete-img'] = "<div class='error'>Fail to Delete Image successfully</div>";
                header("location:".SITEURL."admin/manage-product.php");
                die();
            }
        }

        $sql = "DELETE FROM tbl_product where id = $id";

        $res = mysqli_query($conn, $sql);

        if ( $res == true){
            $_SESSION['delete'] = "<div class='success'>Delete Product successfully</div>";
            header("location:".SITEURL."admin/manage-product.php");
        }else{
            $_SESSION['delete'] = "<div class='error'>Fail to Delete product successfully</div>";
            header("location:".SITEURL."admin/manage-product.php");
        }
    }else{
        header("location:".SITEURL."admin/manage-product.php");
    }

?>