<?php 
    include('config/constant.php'); 
    include('login-check.php');
?>
<html>
    <head>
        <title>Online Shopping – Home Page</title>
        <link rel="stylesheet" href="../css/admin.css"/>
    </head>

    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-c">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-product.php">Product</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="manage-customer.php">Customer</a></li>
                    <li><a href="logout.php" class="error">Log Out</a></li>
                <ul>
            </div>
        </div>
        <!-- Menu Section Ends -->