<?php include("partial/menu.php"); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <strong><h1>Dashboard</h1></strong>
                <?php 
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <div class="col-4 center">
                    <h1>5</h1>
                    <br/>
                     Category
                </div>
                <div class="col-4 center">
                    <h1>5</h1>
                    <br/>
                     Product
                </div>
                <div class="col-4 center">
                    <h1>5</h1>
                    <br/>
                     Order
                </div>
                <div class="col-4 center">
                    <h1>5</h1>
                    <br/>
                     Customer
                </div>
                <div class="col-4 center">
                    <h1>5</h1>
                    <br/>
                     Admin
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('partial/footer.php'); ?>