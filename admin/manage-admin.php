<?php include("partial/menu.php"); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <strong><h1>Manage Admin</h1></strong>
                <br>
                <?php 
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);  //Remove session variable 'add'
                    }

                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);  //Remove session variable 'delete'
                    }

                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);  //Remove session variable 'update'
                    }

                    if(isset($_SESSION['user-not-found'])){
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);  //Remove session variable 'user-not-found'
                    }

                    if(isset($_SESSION['password-not-matched'])){
                        echo $_SESSION['password-not-matched'];
                        unset($_SESSION['password-not-matched']);  //Remove session variable 'password-not-matched'
                    }

                    if(isset($_SESSION['update_password'])){
                        echo $_SESSION['update_password'];
                        unset($_SESSION['update_password']);  //Remove session variable 'update_password'
                    }
                ?>
                
                <!-- Btn to add admin -->
                <br><br><br>
                <a href="add-admin.php" class="btn-primary">Add Admin</a>
                <br><br><br>

                <table class="tbl-full">
                    <tr>
                        <!-- <th>Serial No</th> -->
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_admin";
                        $res = mysqli_query($conn, $sql) or die(mysqli_error());
                        if($res == TRUE){
                            $count = mysqli_num_rows($res);

                            if ( $count > 0 ){
                                $sn = 1;
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $full_name = $row['full_name'];
                                    $username = $row['username'];
                                    ?>
                                    <tr>
                                        <!-- <td style="width: 30px;"><?php echo $sn++; ?></td> -->
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                    <?php

                                }
                            }else{

                            }
                        }
                    ?>

                </table>
            </div>
        </div>
        <!-- Main Content Section Ends -->
<?php include('partial/footer.php'); ?>