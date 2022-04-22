<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name :</td>
                    <td><input type="text" name="fullname" placeholder="Enter your Full Name"/></td>
                </tr>
                <tr>
                    <td>Username :</td>
                    <td><input type="text" name="username" placeholder="Enter your username"/></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="password" placeholder="Enter your password"/></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary"/>
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
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);   //Password encrypted with mMD5

        $sql = "INSERT INTO tbl_admin SET 
                full_name = '$fullname',
                username= '$username',
                password = '$password'";

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if ($res == TRUE){
            $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }else{
            $_SESSION['add'] = "<div class='error'>Fail to add admin</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    }
?>