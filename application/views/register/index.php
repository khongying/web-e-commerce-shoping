<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Register</div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                
                <form id="form_register" class="form-horizontal" method="post">
                    
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                        <input id="login-email" type="email" class="form-control" name="email" placeholder="email">
                    </div> 
                    
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input id="login-full-name" type="text" class="form-control" name="full-name" value="" placeholder="ชื่อ-นามสกุล">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <textarea class="form-control" name="address" placeholder="ที่อยู่"></textarea>
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input id="login-phone" type="text" class="form-control" name="phone" placeholder="เบอร์โทรศัทพ์">
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
       var formData = new FormData($("#form_register")[0]); 
      $.ajax({
            url: '<?=base_url()?>index.php/register/add_user',
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