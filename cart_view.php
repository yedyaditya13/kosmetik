<?php include 'includes/session.php' ?>
<?php include 'includes/header.php' ?>


<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
	 
    <div class="content-wrapper">
        <div class="container">
            
            <!-- Main content -->
	        <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
                <h1 class="page-header">YOUR CART</h1>
	        		<div class="box box-solid">
	        			<div class="box-body">
		        		<table class="table table-bordered">
		        			<thead>
		        				<th></th>
		        				<th>Photo</th>
		        				<th>Name</th>
		        				<th>Price</th>
		        				<th width="20%">Quantity</th>
		        				<th>Subtotal</th>
		        			</thead>
		        			<tbody id="tbody">
		        			</tbody>
		        		</table>
	        			</div>
	        		</div>
                    <?php 
                        if (isset($_SESSION['user'])) {
                            echo "
                                <h5><b>Lakukan Pembayaran Melalui</b></h5>
                                
	        				";
                        }
                        else{
	        				echo "
	        					<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
	        				";
	        			}
                    ?>
	        	</div>
                <!-- <div>
                        <?php include 'includes/sidebar.php' ?>
                </div> -->
	        </div>
	        </section>

        </div>
    </div>
    <?php $pdo->close() ?>
    <?php include 'includes/footer.php' ?>
</div>


<?php include 'includes/scripts.php' ?>
<script>

getDetails();
getTotal();

var total = 0;
function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'cart_details.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
			getCart();
		}
	});
}

function getTotal(){
	$.ajax({
		type: 'POST',
		url: 'cart_total.php',
		dataType: 'json',
		success:function(response){
			total = response;
		}
	});
}


</script>
</body>
</html>