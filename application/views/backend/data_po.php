<div class="row">
	<div id="loginbox" class="mainbox col-md-12">
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">
					<?= $po_no ?>
				</div>
			</div>
			<div style="padding-top:30px" class="panel-body" >
				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>รหัสสินค้า</th>
							<th>ชื่อสินค้า</th>
							<th>จำนวน</th>
							<th>ราคาต่อหน่วย</th>
							<th>จำนวนเงิน</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$total = 0;
							foreach ($po_data as $key => $value) {
							$total += $value->unit_price*$value->qty;
						?>
						<tr>
							<td><?= $value->product_code ?></td>
							<td><?= $value->name ?></td>
							<td><?= $value->qty ?></td>
							<td><?= number_format($value->unit_price,2) ?></td>
							<td><?= number_format($value->unit_price*$value->qty,2) ?></td>
						</tr>
						<?php
							}
						?>
						<tr>
							<td colspan="4"><b>ราคารวมทั้งหมด</b></td>
							<td><?= number_format($total,2) ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>