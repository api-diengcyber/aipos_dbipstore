
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Daftar - AIPOS Retail & Restaurant</title>
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
      @media screen and (min-width:1920px){
        .sign-up-container{
          margin-top:10vh;
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
  
  <body class="login-layout blur-login bd" >
    <div class="main-container" id="main">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1" style="padding:20px">
            <div class="sign-up-container">
              <div class="center">
                <h1 style="padding:0px">
                  <img class="nav-user-photo" src="<?php echo base_url() ?>assets/images/banner.png" style="height:75px" alt="Jason's Photo"> 
                </h1>
              </div>

              <div class="position-relative">

                <div id="signup-box" class="signup-box visible widget-box no-border" style="">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-users blue"></i>
                        Registrasi Baru
                      </h4>

                      <div class="space-6"></div>
                      <p> Masukkan data untuk registrasi: </p>
                      <div id="infoMessage">
                      <?php echo $message;?></div>

                      
                      <?php //echo form_open("auth/sign_up");?>
                      <form method="POST" action="<?php echo base_url() ?>auth/sign_up" autocomplete="off">
                        <fieldset>
                        <div class="col-sm-6">
                          
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <?php echo form_input($nama);?>
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                          </label>
                          <!--                          
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <?php echo form_input($nama_belakang);?>
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                          </label>
                          -->
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <?php echo form_input($email);?>
                              <i class="ace-icon fa fa-envelope"></i>
                            </span>
                          </label>

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <?php echo form_input($telp);?>
                              <i class="ace-icon fa fa-phone"></i>
                            </span>
                          </label>
                          <!--         
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <?php echo form_textarea($alamat); ?>
                              <i class="ace-icon fa fa-globe"></i>
                            </span>
                          </label>
                          -->
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <?php echo form_input($password);?>
                              <i class="ace-icon fa fa-lock"></i>
                            </span>
                          </label>
                          
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <?php echo form_input($password_confirm);?>
                              <i class="ace-icon fa fa-retweet"></i>
                            </span>
                          </label>
                          
                        </div>
                        <div class="col-sm-6">

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <?php echo form_input($nama_toko);?>
                              <i class="ace-icon fa fa-gift"></i>
                            </span>
                          </label>
                          <!--         
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <?php echo form_textarea($alamat_toko); ?>
                            </span>
                          </label>

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <?php echo form_input($telp_toko);?>
                              <i class="ace-icon fa fa-phone"></i>
                            </span>
                          </label>
                          -->
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <b>VERSI AIPOS : </b> <br>
                              <div class="radio">
                                <label>
                                  <input name="versi_aipos" type="radio" class="ace" value="1" checked />
                                  <span class="lbl"> Retail </span>
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input name="versi_aipos" type="radio" class="ace" value="2" disabled />
                                  <span class="lbl"> Restaurant </span>
                                </label>
                                <span id="info_restaurant" style="display: none;" class="badge badge-danger"><b> Trial 14 Hari</b></span>
                              </div>
                            </span>
                          </label>
                          <!--
                          <label class="block">
                            <input type="checkbox" class="ace" id="accept_check" />
                            <span class="lbl">
                              I accept the
                              <a href="#">User Agreement</a>
                            </span>
                          </label>
                          -->

                          <div class="space-24"></div>

                          <div class="clearfix">

                            <button type="button" onclick="window.location.href = '<?php echo base_url() ?>auth/sign_up';" class="width-30 pull-left btn btn-sm">
                              <i class="ace-icon fa fa-refresh"></i>
                              <span class="bigger-110">Reset</span>
                            </button>

                            <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                              <span class="bigger-110">Register</span>
                              <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </button>

                          </div>
                        </div>
                        </fieldset>
                      <?php echo form_close();?>
                    </div>

                    <div class="toolbar center">
                      <a href="<?php echo base_url() ?>auth/login" class="back-to-login-link">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        Back to login
                      </a>
                    </div>
                  </div><!-- /.widget-body -->
                </div><!-- /.signup-box -->
                 <div class="center">
                <h6 class="white">AIPOS Retail &amp; Restaurant © 2018 | www.diengcyber.com</h6>
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

    <!-- <![endif]-->

    <!--[if IE]>
<script src="<?php echo base_url() ?>assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
       $(document).on('click', '.toolbar a[data-target]', function(e) {
        e.preventDefault();
        var target = $(this).data('target');
        $('.widget-box.visible').removeClass('visible');//hide others
        $(target).addClass('visible');//show target
       });
      });
      
      
      //you don't need this, just used for changing background
      jQuery(function($) {
       $('#btn-login-dark').on('click', function(e) {
        $('body').attr('class', 'login-layout');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'blue');
        
        e.preventDefault();
       });
       $('#btn-login-light').on('click', function(e) {
        $('body').attr('class', 'login-layout light-login');
        $('#id-text2').attr('class', 'grey');
        $('#id-company-text').attr('class', 'blue');
        
        e.preventDefault();
       });
       $('#btn-login-blur').on('click', function(e) {
        $('body').attr('class', 'login-layout blur-login');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'light-blue');
        
        e.preventDefault();
       });
       
      });
    </script>
  </body>
</html>