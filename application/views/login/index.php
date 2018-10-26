
<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Boostbox - Locked</title>
    
    <!-- BEGIN META -->
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
       <link href='https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
      <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/modules/boostbox/css/theme-default/bootstrap.css?v=<?=time()?>" />

      <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/modules/boostbox/css/theme-default/boostbox.css?v=<?=time()?>" />

      <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/modules/boostbox/css/theme-default/font-awesome.min.css?v=<?=time()?>" />

      <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/modules/boostbox/css/theme-default/boostbox_responsive.css?v=<?=time()?>" />
      <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/modules/boostbox/css/theme-default/app-icon.css?v=<?=time()?>" />
      <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/modules/boostbox/css/theme-default/libs/toastr/toastr.css?v=<?=time()?>">
      <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/modules/boostbox/css/theme-default/libs/blueimp-file-upload/jquery.fileupload.css?v=<?=time()?>">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/modules/boostbox/css/theme-default/libs/wysihtml5/wysihtml5.css" />

      <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/custom/css/main.css?v=<?=time()?>">
<script>
  var base_url = '<?=base_url();?>';
</script>
  
    <!-- END STYLESHEETS -->

    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script type="text/javascript" src="http://www.codecovers.eu/assets/js/modules/boostbox/libs/utils/html5shiv.js?1401441990"></script>
  <script type="text/javascript" src="http://www.codecovers.eu/assets/js/modules/boostbox/libs/utils/respond.min.js?1401441990"></script>
    <![endif]-->
  </head>

  
          
        

  <body   class="body-dark">
  
<!-- START LOGIN BOX -->
<div class="box-type-login">
  <div class="box text-center">
    <div class="box-head">
     <h3><span><img src="<?=base_url();?>assets/img/logo.png?v=2537590462" align="absmiddle" width="190"></span>
      <!-- <h4 class="text-light text-inverse-alt">Ease your output with BoostBox</h4> -->
    </div>
    <div class="box-body box-centered style-inverse">
      <h2 class="text-light">ระบบจัดการงาน</h2>
      <br/>
      <form  id="form_login"  >
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username">
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6 text-left">
          <div data-toggle="buttons" onclick="_remeberme()">
            <label class="btn checkbox-inline btn-checkbox-primary-inverse" id="remeberme">
              <input type="checkbox" value="1" name="rememberChkBox" id="rememberChkBox"> จดจำข้อมูลเข้าสู่ระบบ
            </label>
          </div>
        </div>
        <div class="col-xs-6 text-right">
          <button class="btn btn-primary" type="submit" id="send_login" ><i class="fa fa-key"></i>เข้าสู่ระบบ</button>
        </div>
      </div>
      </form>
    </div><!--end .box-body -->
    <div class="box-footer force-padding text-white">
      <!-- <a class="text-primary-alt" href="http://www.codecovers.eu/boostbox/pages/login">No account yet?</a> Or did you 
      <a class="text-primary-alt" href="http://www.codecovers.eu/boostbox/pages/login">forgot your password?</a> -->
    </div>
  </div>
</div>
<!-- END LOGIN BOX -->


  <!-- BEGIN JAVASCRIPT -->
       <script src="<?=base_url();?>assets/js/modules/boostbox/libs/jquery/jquery-1.11.0.min.js?v=<?=time()?>"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/core/BootstrapFixed.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/spin.js/spin.min.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/wysihtml5/advanced.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/wysihtml5/wysihtml5-0.4.0pre.min.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/ckeditor/ckeditor.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/modules/boostbox/libs/ckeditor/config.js?t=DBAA"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/js/modules/boostbox/libs/ckeditor/skins/moono/editor.css">
<script type="text/javascript" src="<?=base_url();?>assets/js/modules/boostbox/libs/ckeditor/lang/en.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/modules/boostbox/libs/ckeditor/styles.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/vendor/jquery.ui.widget.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/vendor/tmpl.min.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/vendor/load-image.min.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/vendor/jquery.blueimp-gallery.min.js"></script><!-- 
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/jquery.iframe-transport.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/jquery.fileupload.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/jquery.fileupload-process.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/jquery.fileupload-image.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/jquery.fileupload-audio.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/jquery.fileupload-video.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/jquery.fileupload-validate.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/jquery.fileupload-ui.js"></script> -->
<!-- <script src="<?=base_url();?>assets/js/modules/boostbox/libs/blueimp-file-upload/main.js"></script> -->
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/toastr/toastr.min.js"></script><!-- <script src="<?=base_url();?>assets/js/modules/boostbox/libs/autosize/jquery.autosize.min.js"></script> -->
<script src="<?=base_url();?>assets/js/modules/boostbox/libs/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/core/demo/DemoFormEditors.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/core/App.js"></script>
<script src="<?=base_url();?>assets/js/modules/boostbox/core/demo/Demo.js?v=<?=time()?>"></script>

<script src="<?=base_url();?>assets/custom/js/main.js?v=<?=time()?>"></script>


  
  <!-- END JAVASCRIPT -->
  
  </body>
  <script type="text/javascript">
     $(function () {
    if (localStorage.chkbox != '') {
console.log(localStorage.chkbox)

        
        $('#rememberChkBox').prop('checked',true);

        $('#username').val(localStorage.username);
        $('#password').val(localStorage.pass);
    } else {
        // $('#rememberChkBox').removeAttr('checked');
        $('#password').val('');
        $('#username').val('');
    }
});
   function _remeberme(){
        console.log($('#rememberChkBox').is(':checked'))
        if ($('#rememberChkBox').is(':checked')) {
          // $('#rememberChkBox').prop('checked',true);
            // save username and password
            $('#remeberme').addClass('active');
            localStorage.username = $('#username').val();
            localStorage.pass = $('#password').val();
            localStorage.chkbox = $('#rememberChkBox').val();
        } else {
          $('#rememberChkBox').prop('checked',false);
          $('#remeberme').removeClass('active');
            localStorage.username = '';
            localStorage.pass = '';
            localStorage.chkbox = '';
        }
      }
   

  </script>
</html>