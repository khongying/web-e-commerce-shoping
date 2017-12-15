<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Login</div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                
                <form id="loginform" class="form-horizontal" role="form" method="post">
                    
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-email" type="email" class="form-control" name="email" value="" placeholder="email">
                    </div>
                    
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <a id="submit_login" class="btn btn-success">Login  </a>
                            <a id="btn-login" href="<?= base_url() ?>index.php/register" class="btn btn-primary">Register  </a>
                        </div>
                    </div>
                 
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


  function chk_login() {
    var formData = new FormData($("#loginform")[0]); 
      $.ajax({
            url: '<?= base_url() ?>index.php/login/chk_loing',
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
                        window.location = '<?=base_url()?>';
                    });
                  
                    
                 }else{
                  
                    swal({
                        title: "ไม่สำเร็จ",
                        text: json.message,
                        type: "error",
                        showCancelButton: false
                    },
                    function(){
                        window.location = '<?=base_url()?>index.php/login';
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
  }
$(function(){
  $("#submit_login").click(function(){
      chk_login();
  });

 $('input').keyup(function(e){
      if(e.keyCode == 13)
      {
        chk_login();
      }
});



});
</script>