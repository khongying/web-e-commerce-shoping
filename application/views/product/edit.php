<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">แก้ไขสินค้า</div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                
                <form id="form_product_edit" class="form-horizontal" method="post" enctype="multipart/form-data">
                <?php
                    foreach ($product as $key => $value) {
                ?>
                  <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-qrcode"></i></span>
                        <input type="text" readonly="true" class="form-control" name="code" value="<?= $value->code ?>">
                  </div> 

                  <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                      <input type="text" class="form-control" name="name"  value="<?= $value->name ?>">
                  </div>

                   <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                        <?php 
                          if ($value->type_product = "B") {
                            echo ' <input type="text" readonly="true" class="form-control"  value="กระเป๋า">';
                          }else if ($value->type_product = "T") {
                            echo ' <input type="text" readonly="true" class="form-control"  value="เสื้อ">';
                          }else if ($value->type_product = "S") {
                            echo ' <input type="text" readonly="true" class="form-control"  value="รองเท้า">';
                          }else if ($value->type_product = "W") {
                            echo ' <input type="text" readonly="true" class="form-control"  value="นาฬิกา">';
                          }else{
                            echo ' <input type="text" readonly="true" class="form-control"  value="เคสโทรศัพท์">';
                          }
                        ?>
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                        <textarea class="form-control" name="detail" ><?= $value->detail ?></textarea>
                    </div> 

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        <input type="number" class="form-control" name="price" value="<?= $value->price ?>">
                    </div> 

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-cart-plus"></i></span>
                        <input type="number" class="form-control" name="total" value="<?= $value->total ?>">
                        <input type="hidden" name="product_id" value="<?= $value->id ?>">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                        <input type="file" class="form-control" name="img">
                    </div> 
                <?php
                    }
                ?>

                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <a id="submit_from" class="btn btn-success"><i class="fa fa-floppy-o"></i> บันทึก</a>
                        </div>
                    </div>
                 
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$(function(){
  $("#submit_from").click(function(){
       var formData = new FormData($("#form_product_edit")[0]); 
      $.ajax({
            url: '<?=base_url()?>index.php/product/update_product',
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
                        window.location = '<?=base_url()?>index.php/backend';
                    });
                  
                    
                 }else{
                   swal({
                        title: "ไม่สำเร็จ",
                        text: json.message,
                        type: "error",
                        showCancelButton: false
                    },
                    function(){
                        window.location = '<?=base_url()?>index.php/backend';
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