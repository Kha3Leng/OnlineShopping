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
                                            <a href="#" class="btn-secondary">Update Admin</a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="#" class="btn-danger">Delete Admin</a>
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