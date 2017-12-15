<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">เพิ่มสินค้า</div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                
                <form id="form_product_add" class="form-horizontal" method="post" enctype="multipart/form-data">
                    
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-qrcode"></i></span>
                        <input type="text" class="form-control" name="code" placeholder="รหัสสินค้า">
                    </div> 

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <input type="text" class="form-control" name="name" placeholder="ชื่อสินค้า">
                    </div> 

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                        <select class="form-control" name="type_product">
                        	<option value="B">กระเป๋า</option>
                        	<option value="T">เสื้อ</option>
                        	<option value="S">รองเท้า</option>
                        	<option value="W">นาฬิกา</option>
                        	<option value="C">เคสโทรศัพท์</option>
                        </select>
                    </div> 

                     <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                        <textarea class="form-control" name="detail" placeholder="รายละเอียดสินค้า"></textarea>
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        <input type="number" class="form-control" name="price" placeholder="ราคาสินค้า">
                    </div> 

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-cart-plus"></i></span>
                        <input type="number" class="form-control" name="total" placeholder="จำนวนสินค้า">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                        <input type="file" class="form-control" name="img">
                    </div> 
               


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
       var formData = new FormData($("#form_product_add")[0]); 
      $.ajax({
            url: '<?=base_url()?>index.php/product/add_product',
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