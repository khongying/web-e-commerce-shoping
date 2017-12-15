<div class="container">
	<div id="show_page">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<img  src="<?= base_url(); ?>imges/web/sa.jpg" style="width:100%; height: 250px;">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<center>
				<div class="card" style="width: 20rem; color: #EA21A2;">
					<h1 style="text-align: center;"><i class="fa fa-shopping-cart fa-lg"></i></h1>
					<div class="card-body text-center">
						<h4 class="card-title">สินค้าลิขสิทธิ์แท้</h4>
						<p class="card-text">ทางร้านเรามีสินค้าให้เลือกมายมาย</p>
						<a href="<?= base_url() ?>index.php/main/product_show" class="btn btn-danger" style="background-color: #EA21A2;">Go Shopping</a>
					</div>
				</div>
				</center>
			</div>
			<div class="col-lg-4">
				<center>
				<div class="card" style="width: 20rem; color: #09A8FA;">
					<h1 style="text-align: center;"><i class="fa fa-truck fa-lg"></i></h1>
					<div class="card-body text-center">
						<h4 class="card-title">ส่งของเร็วทันใจ</h4>
						<p class="card-text">บริการจัดส่งสินค้าแบบเร็วทันใจ</p>
						<a href="https://th.kerryexpress.com/th/home/" target="_blank" class="btn btn-info">Go Kerry Express</a>
					</div>
				</div>
			</center>
			</div>
			<div class="col-lg-4">
				<center>
				<div class="card" style="width: 20rem; color: #2C9E4B;">
					<h1 style="text-align: center;"><i class="fa fa-money fa-lg"></i></h1>
					<div class="card-body text-center">
						<h4 class="card-title">วิธีชำระสินค้า</h4>
						<p class="card-text">ขอบคุณที่มาอุดหนุน</p>
						<a id="money" class="btn btn-success" style="background-color: #2C9E4B;">Go Payment</a>
					</div>
				</div>
			</center>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#money').click(function(event) {
		$('#show_page').load("<?= base_url(); ?>index.php/main/how_payment");
	});
</script>