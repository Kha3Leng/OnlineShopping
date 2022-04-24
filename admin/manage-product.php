<?php include("partial/menu.php"); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <strong><h1>Manage Product</h1></strong>

                <br><br>

                <?php 
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete-img'])){
                        echo $_SESSION['delete-img'];
                        unset($_SESSION['delete-img']);
                    }

                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['no-product-avail'])){
                        echo $_SESSION['no-product-avail'];
                        unset($_SESSION['no-product-avail']);
                    }

                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                
                <br><br><br>
                <a href="<?php echo SITEURL; ?>admin/add-product.php" class="btn-primary">Add Product</a>
                <br><br><br>

                <table class="tbl-full">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_product";
                        $res = mysqli_query($conn, $sql);

                        if ( $res == true){
                            if ( mysqli_num_rows($res) > 0){
                                while( $row = mysqli_fetch_assoc($res)){
                                  $id = $row['id'];
                                  $title = $row['title'];
                                  $description = $row['description'];  
                                  $category_id = $row['category_id'];  
                                  $price = $row['price'];
                                  $image_name = $row['image_name'];
                                  $featured = $row['featured'];
                                  $active = $row['active'];

                                  ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $description; ?></td>
                                        <td>$ <?php echo $price; ?></td>
                                        <td>
                                            <?php 
                                                if ($image_name != ''){
                                                    ?>
                                                        <img src="../images/product/<?php echo $image_name;?>" width="70px"/>
                                                    <?php
                                                }else{
                                                    echo "<div class='error'>No Image</div>";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 

                                            if ($category_id != 0){
                                                $sql1 = "SELECT title FROM tbl_category WHERE id = $category_id";
                                                $res1 = mysqli_query($conn, $sql1);

                                                if($res1 == true){
                                                    if (mysqli_num_rows($res1) == 1 && $row1 = mysqli_fetch_assoc($res1)){
                                                        echo $row1['title'];
                                                    }
                                                }
                                            }else{
                                                echo "<div class='error'>No Category Selected</div>";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/update-product.php?id=<?php echo $id; ?>" class="btn-secondary">Update Product</a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="<?php echo SITEURL;?>admin/delete-product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" 
                                                class="btn-danger">Delete Product</a>
                                        </td>
                                    </tr>
                                  <?php
                                }
                            }else{
                                ?>
                                <tr>
                                    <td colspan='8'>No Data</td>
                                </tr>
                                <?php
                            }
                        }
                    ?>

                </table>
            </div>
        </div>
        <!-- Main Content Section Ends -->
<?php include('partial/footer.php'); ?>