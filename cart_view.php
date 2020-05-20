<?php include 'includes/session.php' ?>
<?php include 'includes/header.php' ?>


<body class="hold-transition skin-yellow layout-top-nav">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
	 
    <div class="content-wrapper">
        <div class="container">
            
            <!-- Main content -->
	        <section class="content">
	        <div class="row">
	        	<div class="col-sm-12">
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
								<h5><b>Lakukan pembayaran via bank berikut</b> & <b>Konfirmasi pembayaran melalui WhatsApp ke nomor berikut : </b>
								<span><b>08777-111-333</span></b></h5>
								<br>
                                <div class='col-md-8' style='margin-top:30px;'>
									<table style='margin-left: 17%;' align='center' >

									<tr>
										<td align='center' style='padding-right:40px;'>
											<img src='images/bni.jpg' width='150px'  >
											<br><br>032033024
											<br><b>BNI</b>
										</td>
										<td align='center' style='padding-right:40px;'>
											<img src='images/bca.png' width='150px' >
											<br><br>2131030193
											<br><b>BCA</b>
										</td>
										<td align='center' style='padding-right:40px;'>
											<img src='images/mandiri.jpg' width='150px'  >
											<br><br>2131030193
											<br><b>Mandiri</b>
										</td>
										<td align='center' style='padding-right:40px;'>
											<img src='images/bri.png' width='150px' >
											<br><br>23400920320593
											<br><b>BRI</b>
										</td>
									</tr>

									</table>
								</div>
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

$(function() {
	$(document).on('click', '.add', function(e){
			e.preventDefault();
			var id = $(this).data('id');
			var qty = $('#qty_'+id).val();
			qty++;
			$('#qty_'+id).val(qty);
			$.ajax({
				type: 'POST',
				url: 'cart_update.php',
				data: {
					id: id,
					qty: qty,
				},
				dataType: 'json',
				success: function(response){
					if(!response.error){
						getDetails();
						getCart();
						getTotal();
					}
				}
			});
		});

	$(document).on('click', '.minus', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		if(qty>1){
			qty--;
		}
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});


	$(document).on('click', '.cart_delete', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'cart_delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});
})
</script>
</body>
</html>