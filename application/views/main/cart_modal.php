<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>ชื่อสินค้า</th>
			<th style="width: 100px;">จำนวนสินค้า</th>
			<th>ราคา/หย่วย</th>
			<th>ราคาทั้งหมด</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$total = 0;
			foreach ($session_basket as $key => $value) {
				$total += $value['total'];
			
		?> 
			<tr id="row<?= $value['code']?>">
				<td><img src="<?= base_url(); ?>imges/product/<?= $value['img'] ?>" style="width: 50px;"></td>
				<td><?= $value['product_name'] ?></td>
				<td><input type="number" class="edit_total form-control" code="<?= $value['code'] ?>" price="<?= $value['price'] ?>" name="count" value="<?= $value['count'] ?>"></td>
				<td><?= $value['price'] ?></td>
				<td><?=  number_format($value['total'],2) ?></td>
				<td><a class="del_cart btn btn-sm btn-danger" code="<?= $value['code'] ?>"><i class="fa fa-trash"></i></a></td>

			</tr>
		<?php
				
			}
		?>
			<tr>
				<td colspan="4"><b>ราคารวมทั้งหมด</b></td>
				<td colspan="2"><?= number_format($total,2) ?></td>
			</tr>
	</tbody>
</table>

<script type="text/javascript">
	$(".edit_total").bind("keyup change", function(e) {
    	var code = $(this).attr('code');
    	var price = $(this).attr('price');
    	var qty = $(this).val();
    	$.ajax({
				url: '<?= base_url() ?>index.php/main/update_cart',
				type: 'POST',
				data: {code: code, qty: qty, price: price},
			})
			.done(function(data) {
				$("#cart_data").load("<?= base_url(); ?>index.php/main/cart");
			});
	})

	$('.del_cart').click(function(event) {
		var code = $(this).attr('code');
		swal({
		  title: 'ลบรายการนี้?',
		  text: "คุณต้องการลบรายการนี้ใช่ไหม!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonText: 'ยืนยัน',
		  confirmButtonText: "Yes, delete it!",
		  closeOnConfirm: false
		},
		function(){
			
			$.ajax({
				url: '<?= base_url() ?>index.php/main/del_cart',
				type: 'POST',
				data: {code: code},
			})
			.done(function(data) {
				$('#count_cart').attr('count', data);
     			$('#count_cart').text(data);
	         	$('#row'+code).remove();
	  			swal("ลบเรียบร้อยแล้ว!", null, "success");
              	$("#cart_data").load("<?= base_url(); ?>index.php/main/cart");
			});
			
		});
	});
</script>