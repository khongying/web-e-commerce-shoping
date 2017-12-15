<div class="container">
  <div class="col-lg-2">
    <div class='span2 sidebar'>
      <h3>ใบสั้งซื้อ</h3>
      <ul class="nav nav-pills brand-pills nav-stacked">
        <?php
          foreach ($list_po as $key => $value) {
        ?>
            <li role="presentation" class="brand-nav">
              <a href="#tab1" class="po_data" po_no="<?= $value->po_no ?>" aria-controls="tab1" role="tab" data-toggle="tab"><?= $value->po_no ?></a>
            </li>
        <?php
          }
        ?>
      </ul>
      
    </div>
  </div>
  <div class="col-lg-10">
    <div id="data_po"></div>
  </div>
</div>
<script type="text/javascript">
  $('.po_data').click(function(event) {
    var po_no = $(this).attr('po_no');
    $("#data_po").load("<?= base_url(); ?>index.php/main/po_data/"+po_no);
  });
</script>