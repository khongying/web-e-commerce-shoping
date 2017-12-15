<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-12">
	<div class="panel panel-info" >
		<div class="panel-heading">
			<div class="panel-title">
				<?= $po_no ?> 
				<span class="btn btn-warning"><?= $status_name ?></span>
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
	<?php
		if ($status_id == 1) {
	?>
		<div id="payment_box" style="margin-top:50px;" class="mainbox col-md-12">
			<div class="panel panel-danger" >
				<div class="panel-heading">
					<div class="panel-title">แจ้งชำระสินค้า</div>
				</div>
				<div style="padding-top:30px" class="panel-body" >
					<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
					
					<form id="payment_form" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
						
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon">ชื่อ - นามสุกล</span>
							<input type="text" class="form-control" name="name" value="<?= $full_name ?>">
						</div>

						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon">ที่อยู่จัดส่ง</span>
							<textarea name="address" class="form-control"><?= $address ?></textarea>
						</div>

						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon">เบอร์โทรศัพท์</span>
							<input type="text" class="form-control" name="phone" value="<?= $phone ?>">
						</div>

						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon">สลิปการโอน</span>
							<input type="file" class="form-control" name="img">
							<input type="hidden" class="form-control" name="po_no" value="<?= $po_no ?>">
						</div>
						
						<div style="margin-top:10px" class="form-group">
							<div class="col-sm-12 controls">
								<a id="submit_payment" class="btn btn-success">บันทึก</a>
								<a id="btn-login" href="<?= base_url() ?>index.php/register" class="btn btn-danger">ยกเลิกการสั่งซื้อ</a>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	<?php
		}
	?>

<script type="text/javascript">
$(function(){
  $("#submit_payment").click(function(){
       var formData = new FormData($("#payment_form")[0]); 
      $.ajax({
            url: '<?=base_url()?>index.php/backend/payment',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {

              try{
                 console.log(data);
                 var json = jQuery.parseJSON(data);
                 if(json.status == true){


                    swal({
                        title: "สำเร็จ",
                        text: json.message,
                        type: "success",
                        showCancelButton: false
                    },
                    function(){
                        window.location = '<?=base_url()?>index.php/main/po_list';
                    });
                  
                    
                 }else{
                  
                  swal({
                        title: "Error",
                        text: json.message,
                        type: "success",
                        showCancelButton: false
                    },
                    function(){
                        window.location = '<?=base_url()?>index.php/main/po_list';
                    });
                    
                 }
              }catch(e){
                    // $.simplyToast(e, 'danger');
              }
          },
          cache: false,
          contentType: false,
          processData: false
      });
  });
});
</script>