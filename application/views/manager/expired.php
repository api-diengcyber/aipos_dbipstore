<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <title>AIPOS Retail & Restaurant</title>
    <link rel="icon shortcut" href="<?php echo base_url() ?>assets/images/logo-hitam-transparan.png">

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <style>
      .login-container{
        width:80%!important;
      }
      @media screen and (min-width:1920px){
        .login-container{
          margin-top:20vh;
        }
      }
    </style>
    <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="<?php echo base_url() ?>assets/js/html5shiv.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-layout blur-login bd" style="">

    <div class="main-container" style="" id="main">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
              <br>
              <br>

              <div class="center">
                <img src="<?php echo base_url() ?>assets/images/banner.png" alt="logo.png" style="height:75px">
              </div>

              <div class="space-6"></div>

              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main" style="">
                      <div style="font-size:20px;">
                        <b>SISTEM MENDEKATI JATUH TEMPO <?php echo $expired ;?> SEGERA LAKUKAN KONFIRMASI PEMBAYARAN UNTUK MENGHINDARI SISTEM TIDAK AKTIF</b>
                        <br><br> 
                        <a href="<?php echo base_url() ?>" class='btn btn-primary btn-sm no-border btn-block'><i class='ace-icon fa fa-check'></i> OK</a>
                      </div>
                      <center>
                        <span id="redirct"></span>
                      </center>
                    </div><!-- /.widget-main -->
                  </div><!-- /.widget-body -->

                </div><!-- /.login-box -->
                 <div class="center">
                <h6 class="white">AIPOS Retail &amp; Restaurant © 2019 | www.diengcyber.com</h6>
                 </div>
              </div><!-- /.position-relative -->
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.main-content -->
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
    <script>
    /* jQuery(function($){
      var time = 30;
      $("#redirct").html('otomatis masuk aplikasi dalam ' + time + 's');
      var intv = setInterval(function(){
        time--;
        if (time == 0) {
          clearInterval(intv);
          document.location.href = '<?php echo base_url() ?>';
        }
        $("#redirct").html('otomatis masuk aplikasi dalam ' + time + 's');
      }, 1000);
    }); */
    </script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="<?php echo base_url() ?>assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script><script src="<?php echo base_url() ?>assets/js/jquery.mobile.custom.min.js"></script><script src="<?php echo base_url() ?>assets/js/jquery.mobile.custom.min.js"></script><script src="<?php echo base_url() ?>assets/js/jquery.mobile.custom.min.js"></script>


</body>
</html>