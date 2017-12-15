<div class="container">
	<h3><i class="fa fa-users"></i> ระบบจัดการสมาชิก</h3>
	<hr/>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>E-mail</th>
				<th>ชื่อข-นามสกุล</th>
				<th>เบอร์โทรศัพท์</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
				foreach ($member as $key => $value) {
			?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $value->email ?></td>
					<td><?= $value->full_name ?></td>
					<td><?= $value->phone ?></td>
					<td>
						<a class="del btn btn-sm btn-danger" member="<?= $value->id ?>"><i class="fa fa-trash"></i></a>
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
		var member_id = $(this).attr('member');
		$(this).parent().parent().remove();
	});
</script>