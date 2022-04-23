<?php include("partial/menu.php"); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <strong><h1>Manage Product</h1></strong>

                <?php 
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
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
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="#" class="btn-secondary">Update Admin</a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="#" class="btn-danger">Delete Admin</a>
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