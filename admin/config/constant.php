<?php
    session_start();

    define('SITEURL', 'http://192.168.64.3/OnlineShopping/');
    define('LOCALHOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DBNAME', 'OnlineShopping');
    
    $conn = mysqli_connect(LOCALHOST, USERNAME, PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DBNAME) or die(mysqli_error());
?>