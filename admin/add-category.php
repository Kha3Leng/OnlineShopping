<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

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
                    <td><input type="text" name="title" placeholder="Enter Category Title"/></td>
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
                echo $image_name = "category_".rand(000,999).".".$ext;
                $src_path = $_FILES['image_name']['tmp_name'];
                $des_path = "../images/category/".$image_name;
    
                // cannot upload??? because folder is not writable.. run chmod 777 folder
                $upload =  move_uploaded_file($src_path, $des_path);
                
                if( $upload == false){
                    $_SESSION['upload'] = "<div class='error'>Fail to upload image</div>";
                    header("location:".SITEURL."admin/add-category.php");
                    die();
                }
            }       
        }else{
            $image_name = '';
        }
        
        $sql = "INSERT INTO tbl_category SET 
                title = '$title',
                featured= '$featured',
                active = '$active',
                image_name = '$image_name'";

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if ($res == TRUE){
            $_SESSION['add'] = "<div class='success'>Category added successfully</div>";
            header("location:".SITEURL.'admin/manage-category.php');
        }else{
            $_SESSION['add'] = "<div class='error'>Fail to add category</div>";
            header("location:".SITEURL.'admin/manage-category.php');
        }
    }
?>