<?php include("partial/menu.php"); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <strong><h1>Manage Category</h1></strong>

                <br><br>

                <?php 
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['delete-img'])){
                        echo $_SESSION['delete-img'];
                        unset($_SESSION['delete-img']);
                    }
                    
                    if(isset($_SESSION['no-category-avail'])){
                        echo $_SESSION['no-category-avail'];
                        unset($_SESSION['no-category-avail']);
                    }

                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['delete-img'])){
                        echo $_SESSION['delete-img'];
                        unset($_SESSION['delete-img']);
                    }
                ?>
                
                <br><br><br>
                <a href="add-category.php" class="btn-primary">Add Category</a>
                <br><br><br>

                <table class="tbl-full">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image Name</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM tbl_category";
                        $res = mysqli_query($conn, $sql);

                        if( $res == true){
                            $count = mysqli_num_rows($res);

                            if ( $count > 0){
                                while( $row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $image_name = $row['image_name'];
                                    $featured = $row['featured'];
                                    $active = $row['active'];

                                    ?>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $title; ?></td>
                                            <td>
                                                <?php 
                                                    if ($image_name != ''){
                                                        //display image
                                                        ?>
                                                        <img alt="" src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" width="70px"/>
                                                        <?php
                                                    }else{
                                                        echo "<div class='error'>No Image Added</div>";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $featured; ?></td>
                                            <td><?php echo $active; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Category</a>
                                            </td>
                                        </tr>
                                    <?php

                                }
                            }else{
                                ?>
                                <td colspan="6">No Data</td>
                                <?php
                            }
                        }
                    ?>
                    

                </table>
                
            </div>
        </div>
        <!-- Main Content Section Ends -->
<?php include('partial/footer.php'); ?>