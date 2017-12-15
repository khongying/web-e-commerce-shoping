<div class="container">
  <div class="col-lg-2">
    <div class='span2 sidebar'>
      <h3><i class="fa fa-shopping-cart"></i> ประเภทสินค้า</h3>
      <ul class="nav nav-pills brand-pills nav-stacked">
        
        <li role="presentation" class="brand-nav">
          <a class="product" type_product="B" aria-controls="tab1" role="tab" data-toggle="tab">กระเป๋า</a>
        </li>
        <li role="presentation" class="brand-nav">
          <a class="product" type_product="T" aria-controls="tab1" role="tab" data-toggle="tab">เสื้อ</a>
        </li>
        <li role="presentation" class="brand-nav">
          <a class="product" type_product="S" aria-controls="tab1" role="tab" data-toggle="tab">รองเท้า</a>
        </li>
        <li role="presentation" class="brand-nav">
          <a class="product" type_product="W" aria-controls="tab1" role="tab" data-toggle="tab">นาฬิกา</a>
        </li>
        <li role="presentation" class="brand-nav">
          <a class="product" type_product="C" aria-controls="tab1" role="tab" data-toggle="tab">เคสโทรศัพท์</a>
        </li>
        
      </ul>
      
    </div>
  </div>
  <div class="col-lg-10">
    <div id="data_product">
        <div class="row" style="display:flex; flex-wrap: wrap;">

              <?php 
                  foreach ($all_product as $key => $value) {
              ?>
                <div class="col-sm-3 col-md-3">
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


      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $('.product').click(function(event) {
    var type_product = $(this).attr('type_product');
    // alert(type_product);
    $("#data_product").load("<?= base_url(); ?>index.php/product/list_product/"+type_product);
  });
</script>


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