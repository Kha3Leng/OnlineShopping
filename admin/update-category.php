<?php include('partial/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <?php 

            if (isset($_GET['id'])){
                $id = $_GET['id'];

                $sql = "SELECT * FROM tbl_category WHERE id = $id";
                $res = mysqli_query($conn, $sql);

                if ( $res == TRUE){
                    if ( mysqli_num_rows($res) == 1){
                        if ( $row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                        }
                    }else{
                        $_SESSION['no-category-avail'] = "<div class='error'>Category unavailable</div>";
                        header("location:".SITEURL."admin/manage-category.php");
                    } 
                }
            }else{
                header("location:".SITEURL."admin/manage-category.php");
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                        <td>Title :</td>
                        <td><input type="text" name="title" value="<?php echo $title; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Featured :</td>
                        <td>
                            <input <?php if ($featured == 'Yes') {echo 'checked';}?> type="radio" name="featured" value="Yes">Yes</input>
                            <input <?php if ($featured == 'No') {echo 'checked';}?> type="radio" name="featured" value="No">No</input>
                        </td>
                    </tr>
                    <tr>
                        <td>Active :</td>
                        <td>
                            <input <?php if ($active == 'Yes') {echo 'checked';}?> type="radio" name="active" value="Yes">Yes</input>
                            <input <?php if ($active == 'No') {echo 'checked';}?> type="radio" name="active" value="No">No</input>
                        </td>
                    </tr>
                    <tr>
                        <td>Current Image :</td>
                        <td>
                            <?php 
                                if($image_name != ""){
                                    ?>
                                    <img alt="" src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" width="70px"/>
                                    <?php
                                }else{
                                    echo '<div class="error">Image not added</div>';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>New Image :</td>
                        <td><input type="file" name="new_image_name"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="current_image" value="<?php echo $image_name; ?>"/>
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <input type="submit" name="submit" value="Update Category" class="btn-secondary"/>
                        </td>
                    </tr>

                </table>
        </form>
    </div>
</div>

<?php 
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $id = $_POST['id'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];
        $new_image_name = $_POST['new_image_name'];
        $cur_image_name = $_POST['current_image'];
        $image_name = '';

        if(isset($_FILES['new_image_name'])){
            $image_name = $_FILES['new_image_name']['name'];
            if ( $image_name != ''){
                //renaming image
                $temp = explode('.', $image_name);
                $ext = end($temp);
                $image_name = "category_".rand(000,999).".".$ext;
                $src_path = $_FILES['new_image_name']['tmp_name'];
                $des_path = "../images/category/".$image_name;
                
                // cannot upload??? because folder is not writable.. run chmod 777 folder
                $upload =  move_uploaded_file($src_path, $des_path);
                
                if( $upload == false){
                    $_SESSION['upload'] = "<div class='error'>Fail to upload image</div>";
                    header("location:".SITEURL."admin/manage-category.php");
                    die();
                }

                if ($cur_image_name != ''){
                    $path = "../images/category/".$cur_image_name;
                    $remove = unlink($path);
    
                    if (!$remove){
                        $_SESSION['delete-img'] = "<div class='error'>Fail to Delete Current Image successfully</div>";
                        header("location:".SITEURL."admin/manage-category.php");
                        die();
                    }
                }
                
            }else{
                $image_name = $cur_image_name;
            }

        }else{
            $image_name = $cur_image_name;
        }
    
        echo $sql = "UPDATE tbl_category SET 
                title = '$title',
                featured = '$featured',
                active = '$active',
                image_name = '$image_name'
                WHERE id = $id";

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res == true){
            $_SESSION['update'] = "<div class='success'>Successfully updated</div>";
            header("location:".SITEURL."admin/manage-category.php");
        }else{
            $_SESSION['update'] = "<div class='error'>Fail to Update Category</div>";
            header("location:".SITEURL."admin/manage-category.php");
        }

    }
?>


<?php include('partial/footer.php');?>