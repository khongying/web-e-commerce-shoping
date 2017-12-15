<?php
	foreach ($payment as $key => $value) {
?>

<div class="row">
	<div class="col-md-5">
		<img src="<?= base_url(); ?>imges/payment/<?= $value->img_post ?>" style="width: 200px;" > 
	</div>
	<div class="col-md-7">
		<div class="form-group">
			<b>ชื่อรับสินค้า : </b> <?= $value->name_post ?>
		</div>
		<div class="form-group">
			<b>ที่อยู่จัดส่ง : </b> <?= $value->address_post ?>
		</div>
		
	</div>
</div>

<?php
	}
?>
