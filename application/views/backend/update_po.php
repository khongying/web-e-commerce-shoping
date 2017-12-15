<div class="row">
	<div class="panel-body" >
		<form class="form-horizontal" id="from_update">
			<div style="margin-bottom: 25px" class="input-group">
				<span class="input-group-addon"><i class="fa fa-sliders"></i></span>
				<select class="form-control" name="status">
					<?php
						foreach ($po_status as $key => $value) {
					?>
					<option value="<?= $value->id ?>"><?= $value->name ?></option>
					<?php
						}
					?>
				</select>
				<input type="hidden" name="po_no" value="<?= $po_no ?>">
			</div>
			<div style="margin-top:10px" class="form-group">
				<div class="col-sm-12 controls">
					<a id="submit_update" po_no="<?= $po_no ?>" class="btn btn-success">อัพเดท</a>
					<a data-dismiss="modal" class="btn btn-danger">ปิด</a>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$('#submit_update').click(function(event) {
		var formData = new FormData($("#from_update")[0]); 
      $.ajax({
            url: '<?=base_url()?>index.php/backend/updata_status_po',
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
                        window.location = '<?=base_url()?>index.php/backend/payment_list';
                    });
                  
                    
                 }else{
                  
                  swal({
                        title: "Error",
                        text: json.message,
                        type: "success",
                        showCancelButton: false
                    },
                    function(){
                        window.location = '<?=base_url()?>index.php/backend/payment_list';
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
</script>
