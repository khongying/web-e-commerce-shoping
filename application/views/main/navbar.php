<nav class="navbar navbar-default navbar-fixed-top" style="background-color: #BDE4F4">
  <div class="container-fluid">
    <div class="navbar-header">
      <?php
          if ($status != 0) {
      ?>
         <a id="side_bar" onclick="openNav()" class="navbar-brand"><i class="fa fa-bars"></i></a>
      <?php
          }
      ?>
      <a class="navbar-brand" href="<?= base_url() ?>"> <img src="<?= base_url(); ?>imges/web/Bell.png" style="height:150%;" /> </a>
      <a class="navbar-brand" href="<?= base_url() ?>"> Shop Doraemon</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="<?= base_url() ?>index.php/main/product_show">สินค้า</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li>
          <a id="cart" data-toggle="modal" data-target="#myCart" style="cursor:pointer">
            <i class="fa fa-shopping-cart fa-lg"></i>&nbsp;&nbsp;
            <div id="count_cart" count="<?= count($session_basket) ?>"><?= count($session_basket) ?></div>
          </a>
        </li>
      
      <?php
          if ($email != "") {
      ?>
         <li>
          
          <a data-toggle="dropdown" style="cursor:pointer"><i class="fa fa-user"></i> <?= $email ?></a>
           <ul class="dropdown-menu">
            <?php
                if ($status != 0) {
            ?>
               <li><a href="<?= base_url() ?>index.php/backend"><i class="fa fa-bar-chart"></i> ระบบหลังบ้าน</a></li>
            <?php
                }
            ?>
            <li><a href="<?= base_url() ?>index.php/main/po_list"><i class="fa fa-file-text"></i> ข้อมูลการสั่งซื้อ</a></li>
            <li><a href="<?= base_url() ?>index.php/login/logout"><i class="fa fa-power-off"></i> ออกจากระบบ</a></li>
          </ul>

        </li>
      <?php
          }else{
      ?>
        <li><a href="<?= base_url() ?>index.php/login"><i class="fa fa-user"></i> เข้าสู่ระบบ</a></li>
      <?php
          }
      ?>
      
    </ul>
  </div>
</nav>

<div id="myCart" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ตะกร้าสินค้า</h4>
      </div>
      <div class="modal-body">
        <div id="cart_data"></div>
      </div>
      <div class="modal-footer">
        <a href="<?= base_url() ?>index.php/main/confirm_order" class="btn btn-success"><i class="fa fa-shopping-cart"></i> สั่งซี้อ</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> ปิด</button>
      </div>
    </div>

  </div>
</div>

<div id="page">
