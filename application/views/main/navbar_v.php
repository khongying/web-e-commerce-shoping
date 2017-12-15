<nav class="navbar navbar-default navbar-fixed-top" style="background-color: #BDE4F4">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?= base_url() ?>"> <img src="<?= base_url(); ?>imges/web/Bell.png" style="height:150%;" /> </a>
      <a class="navbar-brand" href="<?= base_url() ?>">Shop Doraemon</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="<?= base_url() ?>index.php/main/product_show">สินค้า</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
       <!-- <li>
          <a>
            <i class="fa fa-cart-plus fa-lg"></i>
            <div id="count_cart" count="<?= count($session_basket) ?>"><?= count($session_basket) ?></div>
          </a>
        </li> -->
      <li><a href="<?= base_url() ?>index.php/login"><i class="fa fa-user"></i> เข้าสู่ระบบ</a></li>

    </ul>
  </div>
</nav>

<div id="page">