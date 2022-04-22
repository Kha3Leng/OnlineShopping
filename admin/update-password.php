<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>

        <?php 
            $id = $_GET['id'];
        ?>
        
        <form action="" method="POST">
            <table class="tbl-30">
                    <tr>
                        <td>Current Password :</td>
                        <td><input type="password" name="current_password" placedholder="Current Password" /></td>
                    </tr>
                    <tr>
                        <td>New Password :</td>
                        <td><input type="password" name="new_password" placedholder="New Password" /></td>
                    </tr>
                    <tr>
                        <td>Confirm Password :</td>
                        <td><input type="password" name="confirm_password" placedholder="Confirm Password" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <input type="submit" name="submit" value="Change Password" class="btn-secondary"/>
                        </td>
                    </tr>

                </table>
        </form>
    </div>
</div>

<?php 
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password =  '$current_password'";
        $res = mysqli_query($conn, $sql);

        if ( $res == true ){
            if ( $row = mysqli_fetch_assoc($res)){
                if ( $new_password == $confirm_password){
                    $sql1 = "UPDATE tbl_admin SET password = '$confirm_password' WHERE id = $id";
                    $res1 = mysqli_query($conn, $sql1);
                    if ($res1 == true){
                        $_SESSION['update_password'] = "<div class='success'>Successfully updated the password.</div>";
                    }else{
                        $_SESSION['update_password'] = "<div class='error'>Failed to Update Password.</div>";
                    }
                }else{
                    $_SESSION['password-not-matched'] = "<div class='error'>Password not matched.</div>";
                }
                header("location:".SITEURL."admin/manage-admin.php");
            }else{
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
                header("location:".SITEURL."admin/manage-admin.php");
            }
        }
    }
?>

<?php include('partial/footer.php'); ?>