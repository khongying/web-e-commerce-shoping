<div class="container">
  <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-2">
    <div class="panel panel-info" >
      <div class="panel-heading">
        <div class="panel-title">ยืนยันการสั่งซื้อ</div>
      </div>
      <div style="padding-top:30px" class="panel-body" >
        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
        <form id="confirm_order" class="form-horizontal" role="form" method="post">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>ชื่อสินค้า</th>
                <th style="width: 100px;">จำนวนสินค้า</th>
                <th>ราคา/หย่วย</th>
                <th>ราคาทั้งหมด</th>
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
                <td>
                  <?= $value['product_name'] ?>
                  <input type="hidden" name="code[]" value="<?= $value['code'] ?>">
                </td>
                <td>
                  <?= $value['count'] ?>
                  <input type="hidden" name="qty[]" value="<?= $value['count'] ?>">
                </td>
                <td>
                  <?= $value['price'] ?>
                  <input type="hidden" name="unit_price[]" value="<?= $value['price'] ?>">
                </td>
                <td>
                  <?= number_format($value['total'],2) ?>
                  <input type="hidden" name="total_price[]" value="<?= $value['total'] ?>">
                </td>
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
          
          <div style="margin-top:10px" class="form-group">
            <div class="col-sm-12 controls">
              <a id="submit_order" class="btn btn-success"><i class="fa fa-check-circle-o"></i> ตกลง</a>
              <a href="<?= base_url() ?>index.php/main/close_basket" class="btn btn-danger"><i class="fa fa-times-circle-o"></i> ยกเลิก</a>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
  $("#submit_order").click(function(){
       var formData = new FormData($("#confirm_order")[0]); 
      $.ajax({
            url: '<?= base_url() ?>index.php/main/add_order',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {

              try{
                 console.log(data);
                 var json = jQuery.parseJSON(data);
                 if(json.status == true){


                    swal({
                        title: json.po_no,
                        text: json.message,
                        type: "success",
                        showCancelButton: false
                    },
                    function(){
                        window.location = '<?=base_url()?>';
                    });
                  
                    
                 }else{
                  
                    swal({
                        title: json.message,
                        text: null,
                        type: "success",
                        showCancelButton: false
                    },
                    function(){
                        window.location = '<?=base_url()?>';
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