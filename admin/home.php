<?php 
  include 'includes/session.php';
?>
<?php 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }

  $conn = $pdo->open();
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                  $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id");
                  $stmt->execute();

                  $total = 0;
                  foreach($stmt as $srow){
                    $subtotal = $srow['price']*$srow['quantity'];
                    $total += $subtotal;
                  }

                  echo "<h3>Rp ".number_format($total, 2, ',', '.')."</h3>";
                ?>
            <p>Total Penjualan</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <!-- <a href="book.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                  $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products");
                  $stmt->execute();
                  $prow =  $stmt->fetch();

                  echo "<h3>".$prow['numrows']."</h3>";
                ?>

              <p>Number of Products</p>
            </div>
            <div class="icon">
              <i class="fa fa-barcode"></i>
            </div>
            <!-- <a href="student.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                  $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users");
                  $stmt->execute();
                  $urow =  $stmt->fetch();

                  echo "<h3>".$urow['numrows']."</h3>";
                ?>

              <p>Number of Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <!-- <a href="return.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
                  $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE sales_date=:sales_date");
                  $stmt->execute(['sales_date'=>$today]);

                  $total = 0;
                  foreach($stmt as $trow){
                    $subtotal = $trow['price']*$trow['quantity'];
                    $total += $subtotal;
                  }

                  echo "<h3>&#36; ".number_format($total, 2, ',', '.')."</h3>";
                  
                ?>
              <p>Penjualan Hari Ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <!-- <a href="borrow.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->



<?php $pdo->close(); ?>
<?php include 'includes/scripts.php'; ?>

</script>
<script>

</script>
</body>
</html>
