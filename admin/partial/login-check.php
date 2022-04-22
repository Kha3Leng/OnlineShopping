<?php 
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login'] = "<div class='error center'>Log In to Access</div>";
        header("location:".SITEURL."admin/login.php");
    }
?>