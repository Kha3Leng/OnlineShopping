<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Product</h1>

        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <br><br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title :</td>
                    <td><input type="text" name="title" placeholder="Enter Title"/></td>
                </tr>
                <tr>
                    <td>Description :</td>
                    <td><textarea name="description"></textarea></td>
                </tr>
                <tr>
                    <td>Price :</td>
                    <td><input type="number" name="price" placeholder="Enter Price"/></td>
                </tr>
                <tr>
                    <td>Category :</td>
                    <td>
                        <select name="category">
                            <?php 
                                $sql = "SELECT title, id from tbl_category WHERE active = 'Yes'";
                                $res = mysqli_query($conn, $sql);

                                if ( $res == true AND mysqli_num_rows($res) > 0){
                                    while($row = mysqli_fetch_assoc($res)){
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
                                        ?>
                                        <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                        <?php
                                    }
                                }else{
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
                        <input type="radio" name="featured" value="Yes">Yes</input>
                        <input type="radio" name="featured" value="No">No</input>
                    </td>
                </tr>
                <tr>
                    <td>Active :</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes</input>
                        <input type="radio" name="active" value="No">No</input>
                    </td>
                </tr>
                <tr>
                    <td>Image :</td>
                    <td><input type="file" name="image_name"/></td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary"/>
                    </td>
                </tr>

            </table>
        </form> 
    </div>
</div>

<?php include('partial/footer.php'); ?>

<?php 
    // Process the data from the form and store in the database
    // Check if submit button is clicked
    
    if(isset($_POST['submit'])){
        
        // Button Clicked
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category_id = $_POST['category'];

        if(isset($_POST['featured'])){
            $featured = $_POST['featured'];
        }else{
            $featured = "No";
        }

        if(isset($_POST['active'])){
            $active = $_POST['active'];
        }else{
            $active = "No";
        }
        
        if(isset($_FILES['image_name'])){
            $image_name = $_FILES['image_name']['name'];
            if ($image_name != ''){
                //renaming image
                $temp = explode('.', $image_name);
                $ext = end($temp);
                $image_name = "product_".rand(0000,9999).".".$ext;
                $src_path = $_FILES['image_name']['tmp_name'];
                $des_path = "../images/product/".$image_name;
    
                // cannot upload??? because folder is not writable.. run chmod 777 folder
                $upload =  move_uploaded_file($src_path, $des_path);
                
                if( $upload == false){
                    $_SESSION['upload'] = "<div class='error'>Fail to upload image</div>";
                    header("location:".SITEURL."admin/add-product.php");
                    die();
                }
            }       
        }else{
            $image_name = '';
        }
        
        $sql1 = "INSERT INTO tbl_product SET 
                title = '$title',
                featured= '$featured',
                active = '$active',
                description = '$description',
                price = $price,
                category_id = $category_id,
                image_name = '$image_name'";

        $res1 = mysqli_query($conn, $sql1) or die(mysqli_error());

        if ($res == TRUE){
            $_SESSION['add'] = "<div class='success'>Product added successfully</div>";
            header("location:".SITEURL.'admin/manage-product.php');
        }else{
            $_SESSION['add'] = "<div class='error'>Fail to add product</div>";
            header("location:".SITEURL.'admin/manage-product.php');
        }
    }
?>