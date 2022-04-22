<?php 

    include('config/constant.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin where id = $id";

    $res = mysqli_query($conn, $sql);

    if ( $res == TRUE){
        $_SESSION['delete'] = "<div class='success'>Delete admin successfully</div>";
        header("location:".SITEURL."admin/manage-admin.php");
    }else{
        $_SESSION['delete'] = "<div class='error'>Fail to Delete admin successfully</div>";
        header("location:".SITEURL."admin/manage-admin.php");
    }

?>