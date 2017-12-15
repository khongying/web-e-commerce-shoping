<style type="text/css">
	td,th{
		text-align: center;
	}
</style>
<div class="container">
	<h3><i class="fa fa-users"></i> ระบบจัดการสมาชิก</h3>
	<hr/>
	<table class="table table-hover table-bordered ">
		<thead>
			<tr>
				<th>#</th>
				<th>เลขที่ใบสั่งซื้อ</th>
				<th>สถานะ</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
				foreach ($po as $key => $value) {
			?>
				<tr>
					<td><?= $i++; ?>.</td>
					<td><?= $value->po_no ?></td>
					<td>
						<?php
							if ($value->status == 1) {
								echo '<span class="btn btn-danger">'.$value->name.'</span>';
							}elseif ($value->status == 2) {
								echo '<span class="btn btn-success">'.$value->name.'</span>';
							}elseif ($value->status == 3) {
								echo '<span class="btn btn-info">'.$value->name.'</span>';
							}else{
								echo '<span class="btn btn-warning">'.$value->name.'</span>';
							}
						?>
					</td>
					<td>
						<a class="open btn btn-sm btn-primary" po_no="<?= $value->po_no ?>" data-toggle="modal" data-target="#openModal"><i class="fa fa-folder-open"></i></a>
						<a class="update btn btn-sm btn-warning" po_no="<?= $value->po_no ?>" data-toggle="modal" data-target="#updateModal"><i class="fa fa-upload"></i></a>
					<?php
						if ($value->status != 1) {
					?>
						<a class="payment btn btn-sm btn-success" po_no="<?= $value->po_no ?>" data-toggle="modal" data-target="#paymentModal"><i class="fa fa-file"></i></a>
					<?php
						}
					?>
					</td>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>


<div id="paymentModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">หลักฐานการชำระสินค้า</h4>
      </div>
      <div class="modal-body">
        <div id="modal_payment"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="updateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">อัพเดท สถานะ</h4>
      </div>
      <div class="modal-body">
        <div id="modal_update"></div>
      </div>
    </div>

  </div>
</div>

<div id="openModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ข้อมูลใบสั่งซื้อ</h4>
      </div>
      <div class="modal-body">
        <div id="modal_open"></div>
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
	$('.payment').click(function(event) {
		var po_no =  $(this).attr('po_no');
		$('#modal_payment').load("<?= base_url(); ?>index.php/backend/show_payment/"+po_no);
	});
</script>

<script type="text/javascript">
	$('.update').click(function(event) {
		var po_no =  $(this).attr('po_no');
		$('#modal_update').load("<?= base_url(); ?>index.php/backend/update_po/"+po_no);
	});
</script>

<script type="text/javascript">
	$('.open').click(function(event) {
		var po_no =  $(this).attr('po_no');
		$('#modal_open').load("<?= base_url(); ?>index.php/backend/data_po/"+po_no);
	});
</script>
