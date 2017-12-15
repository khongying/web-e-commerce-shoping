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
				<tr id="row<?= $value->id ?>">
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
			swal({
				title: 'ลบรายการนี้?',
				text: "คุณต้องการลบรายการนี้ใช่ไหม!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: false
			},
			function(){

				$.ajax({
					url: '<?= base_url() ?>index.php/backend/del_member',
					type: 'POST',
					data: {member_id: member_id},
				})
				.done(function(data) {
					

				var json = jQuery.parseJSON(data);
				if(json.status == true){


				swal({
				    title: "สำเร็จ",
				    text: json.message,
				    type: "success",
				    showCancelButton: false
				},
				function(){
					$('#row'+json.id).remove();
				});


				}else{

				swal({
				    title: "ไม่สำเร็จ",
				    text: json.message,
				    type: "error",
				    showCancelButton: false
				},
				function(){
				    window.location = '<?=base_url()?>index.php/backend/member';
				});

				}
				// console.log(data);
					
				});
			});
	});
</script>