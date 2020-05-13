<?php include 'includes/header.php' ?>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'includes/navbar.php'?>

        <div class="content-wrapper">
	        <div class="container">

            <!-- Main Content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-9">

                        <!-- Carousel Display -->
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                            <div class="item active">
                                <img src="images/banner1.png" alt="First slide">
                            </div>
                            <div class="item">
                                <img src="images/banner2.png" alt="Second slide">
                            </div>
                            <div class="item">
                                <img src="images/banner3.png" alt="Third slide">
                            </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="fa fa-angle-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="fa fa-angle-right"></span>
                            </a>
                        </div>
                        
                        <h2>Top Seller</h2>
                            <div class="row">
                                <div class='col-sm-4'>
                                    <div class='box box-solid'>
                                        <div class='box-body prod-body'>
                                            <img src='images/banner3.png' width='100%' height='230px' class='thumbnail'>
                                            <h5><a href=''></a></h5>
                                        </div>
                                        <div class='box-footer'>
                                            <b>&#36;</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                    <div class="col-sm-3">
                        <!-- SIDEBAR -->
                    </div>
                </div>
            </section>

            </div>
        </div>

    </div>
</body>
</html>