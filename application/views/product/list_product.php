<div class="row" style="display:flex; flex-wrap: wrap;">
<?php 
  foreach ($product as $key => $value) {
?>
<div class="col-md-3">
  <div class="thumbnail">
    <img src="<?= base_url(); ?>imges/product/<?= $value->file ?>" style="width: 40%; height:50%;">
    <div class="caption">
      <h4><?= $value->code ?> <?= $value->name ?></h4>
      <p class="card-text"><?= $value->detail ?></p>
      <h5><?= number_format($value->price,2)  ?> บาท</h5>
      <p>
        <a class="add_prod btn btn-success" product_code="<?= $value->code ?>" price="<?= $value->price ?>" img="<?= $value->file ?>" product_name="<?= $value->name ?>"><i class="fa fa-cart-plus"></i> ใส่ตระกร้า</a>
      </p>
    </div>
  </div>
</div>
<?php
  }
?>
<div class="row" style="display:flex; flex-wrap: wrap;">
<script type="text/javascript">
  $('.add_prod').click(function(event) {
    var code = $(this).attr('product_code');
    var price = $(this).attr('price');
    var img = $(this).attr('img');
    var product_name = $(this).attr('product_name');
    // alert(code);
    $.ajax({
      url: '<?= base_url() ?>index.php/main/basket',
      type: 'POST',
      data: {code: code, price: price, img: img, product_name: product_name},
    })
    .done(function(data) {
      $('#count_cart').attr('count', data);
      $('#count_cart').text(data);
    });
    
  });
</script>