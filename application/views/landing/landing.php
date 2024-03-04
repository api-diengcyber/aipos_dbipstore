<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>AIPOS Retail</title>
    <link rel="icon shortcut" href="<?php echo base_url() ?>assets/images/logo-hitam-transparan.png">

    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <meta name="google-translate-customization" content="d955e5d7948eb09-dcf4cb569e6595e7-gbd2c2d6b5016db50-d" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/chosen.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-rtl.min.css" />

    <style>
html, body {
    height: 100%;
}

html {
    display: table;
    margin: auto;
}
        body {
            background-color: #0c4daf!important;
            margin:0 auto;
            display: table-cell;
            vertical-align: middle;
        }

        .login-container {
            /* background-color: red; */
            margin: auto;
        }

        .login-box .widget-body {
            border-radius: 12px!important;
        }

        .main-link {
            text-decoration: none;
            color: #000;
        }

        .main-link:hover {
            text-decoration: none;
            color: #000;
        }
    </style>
  </head>

  <body class="login-layout">
    <div class="main-container" id="main">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-12">
            <div class="login-container">

              <div class="center">
                <img src="<?php echo base_url() ?>assets/images/banner.png" alt="logo.png" style="height:75px">
              </div>

              <div class="space-6"></div>

              <div class="position-relative">
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?php echo base_url() ?>auth/login" class="main-link">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body text-center">
                                    <div class="widget-main">
                                        <h3 style="margin-bottom:20px;">OUTLET</h3>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.login-box -->
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a href="<?php echo base_url() ?>produksi/" class="main-link">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body text-center">
                                    <div class="widget-main">
                                        <h3 style="margin-bottom:20px;margin-left:-8px;">PRODUKSI</h3>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.login-box -->
                        </a>
                    </div>
                </div>

              </div><!-- /.position-relative -->
              
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.main-content -->
    </div><!-- /.main-container -->
  
      <div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120" style="color:#FFF;">
            AIPOS Retail & Restaurant &copy; DIENG CYBER SYSTEM 2022
            </span>
          </div>
        </div>
      </div>

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->

    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->

    <!-- titik pada nomor -->
    <script src="<?php echo base_url() ?>assets/js/my.js" type="text/javascript"></script>
    <!-- titik pada nomor -->

    <!--[if lte IE 8]>
      <script src="<?php echo base_url() ?>assets/js/excanvas.min.js"></script>
    <![endif]-->
    <!-- page specific plugin scripts -->
    <script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.ui.touch-punch.min.js"></script>

    
    <!-- page specific plugin scripts -->
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.select.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-tag.min.js"></script>
    
    <script src="<?php echo base_url() ?>assets/js/tree.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.nestable.min.js"></script>

    <!-- ace scripts -->
    <script src="<?php echo base_url() ?>assets/js/ace-elements.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/ace.min.js"></script>

  </body>
</html>
