<?php 
define('PROJECT_ROOT_PATH', __DIR__);

 ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blank Page - SB Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <style type="text/css">
        .disable{
            display: none;
        }
    </style>
</head>

<body>

    <div id="wrapper">


        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Quản lý sinh viên</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-dashboard"></i> Trang Chủ
                        </a>
                    </li>
                    <li>
                        <a href="index?controller=category">
                            <i class="fa fa-bar-chart-o"></i>Category
                        </a>
                    </li>
                    <li>
                        <a href="index?controller=book">
                            <i class="fa fa-user"></i>Book
                        </a>
                    </li>
             
                    
                </ul>

                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>   <?php// echo $_SESSION['username']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="?controller=user&action=logout">
                                    <i class="fa fa-power-off"></i> Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

       <!--  <div id="page-wrapper"> -->
            <!-- /.row -->
            <?php 
            //include_once('routes/route.php');
            ?>
        <!-- </div> -->
        <!-- /#page-wrapper -->

    <!-- </div> -->
    <!-- /#wrapper -->


    
<!-- <div class="container">
    
<div class="col-md-4">


</div>
<div class="col-md-8"></div>


</div> -->






    <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--  <script src=".../../assets/js/jquery-1.10.2.js"></script> -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/xuly.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>

</body>

</html>