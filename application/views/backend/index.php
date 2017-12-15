<div class="container">
	<h3><i class="fa fa-archive"></i> คลังสินค้า</h3>
	<hr/>
	<table class="table table-striped">
		<thead>
			<tr>
				<th style="width: 100px;">#</th>
				<th style="width: 150px;">รหัสสินค้า</th>
				<th style="width: 150;">รายการ</th>
				<th style="width: 100px;">ราคา</th>
				<th style="width: 100px;">จำนวนสินค้า</th>
				<th style="width: 100px;"></th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($all_product as $key => $value) {
			?>
				<tr>
					<td> <img src="<?= base_url(); ?>imges/product/<?= $value->file ?>" style="width: 50px;"> </td>
					<td><?= $value->code ?></td>
					<td><?= $value->name ?></td>
					<td><?= number_format($value->price,2)  ?></td>
					<td><?=  $value->total  ?></td>
					<td>
						<a href="<?=base_url()?>index.php/product/edit_product/<?= $value->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i></a> 
						<a class="del btn btn-sm btn-danger" product_id="<?= $value->id ?>"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$('.del').click(function(event) {
		var product_id = $(this).attr('product_id');
		alert(product_id);
		$(this).parent().parent().remove();
	});
</script>