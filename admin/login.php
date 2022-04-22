<?php include('config/constant.php'); ?>
<html>
    <head>
        <title>Online Shopping – LOGIN </title>
        <link rel="stylesheet" href="../css/admin.css"/>
    </head>
    <body>
        <div class="login center">
            <h1>Log In</h1>
            <br>
            <?php 
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login'])){
                    echo $_SESSION['no-login'];
                    unset($_SESSION['no-login']);
                }
            ?>
            <br>

            <form action="" method="POST" class="center">
                Username : <br><input type="text" name="username" placeholder="Enter username"/><br><br>
                Password : <br><input type="password" name="password" placeholder="Enter password "/><br><br>
                <input type="submit" name="submit" value="Log In" class="btn-primary"/>
            </form>

            <p>Created By - <a href="#">Me</a></p>
        </div>
    </body>
</html>

<?php 
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
        $res = mysqli_query($conn, $sql);
        echo $count = mysqli_num_rows($res);
        
        
        if( $count == 1){
            $_SESSION['login'] = "<div class='success center'>Loggged in Successfully</div>";
            $_SESSION['user'] = $username;
            header("location:".SITEURL.'admin/');
        }else{
            $_SESSION['login'] = "<div class='error center'>Logged In Failed</div>";
        }
    }
?>
