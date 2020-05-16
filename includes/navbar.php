<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand"><b>Penjualan Kalung</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="">ABOUT US</a></li>
                <li><a href="">CONTACT US</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORY <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">

                    </ul>
                </li>
            </ul>
            <!-- SEARCH FITUR
            <form method="POST" class="navbar-form navbar-left" action="search.php">
                <div class="input-group">
                    <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search for Product" required>
                    <span class="input-group-btn" id="searchBtn" style="display:none;">
                        <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
                    </span>
                </div>
            </form> -->

            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="label label-success cart_count"></span>
                        </a>
                        <ul class="dropdown-menu">
                        <li class="header">You have <span class="cart_count"></span> item(s) in cart</li>
                        <li>
                            <ul class="menu" id="cart_menu">
                            </ul>
                        </li>
                        <li class="footer"><a href="cart_view.php">Go to Cart</a></li>
                        </ul>
                    </li>
                    <?php 
                        // Jika session user hide button logon dan signup
                        if(isset($_SESSION['user'])) {
                            echo "
                                <li><a href='logout.php'>Logout</a></li>
                            ";
                        }
                        else{
                            echo "
                                <li><a href='login.php'>LOGIN</a></li>
                                <li><a href='register.php'>SIGNUP</a></li>
                            ";
                        }
                    ?>
                </ul>
            </div>   
        
        </div>
    </nav>
</header>