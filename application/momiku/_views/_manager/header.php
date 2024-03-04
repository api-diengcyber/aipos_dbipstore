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
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/daterangepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-colorpicker.min.css" />


    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?php echo base_url() ?>assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if !IE]> -->
    <script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
    <!-- <![endif]-->

    <!--[if lte IE 8]>
    <script src="<?php echo base_url() ?>assets/js/html5shiv.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
    <![endif]-->
    <!-- </head> -->
  </head>

  <body class="no-skin">
    <div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
      <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
          <span class="sr-only">Toggle sidebar</span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
          <a href="" class="navbar-brand">
            <small>
              <img class="nav-user-photo" src="<?php echo base_url() ?>assets/images/logo.png" width="30" style="margin:0px;" alt="">
              &nbsp;&nbsp;<?php echo !empty($nama_toko) ? $nama_toko." (MANAGER)" : "Nama Toko" ?>
            </small>
          </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
          <ul class="nav ace-nav" style="text-align: right;">
            <li class="green dropdown-modal">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="ace-icon fa fa-comment icon-animated-vertical"></i>
                <span class="badge badge-success"></span>
              </a>

              <ul class="dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header">
                  <i class="ace-icon fa fa-comment-o"></i>
                  CS Online
                </li>

                <li class="dropdown-content">
                  <ul class="dropdown-menu dropdown-navbar navbar-green">
                    <li>
                      <a href="#">
                        <button type="button" class="btn btn-xs btn-block btn-primary" produksi="popup('https://m.me/aiposretailrestaurant');">
                          <i class="ace-icon fa fa-facebook bigger-110"></i>
                          <b>Chat Facebook</b>
                        </button>
                        <button type="button" class="btn btn-xs btn-block btn-success" produksi="t_wa();">
                          <i class="ace-icon fa fa-whatsapp bigger-110"></i>
                          <b>Chat Whatsapp</b>
                        </button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

            <li class="light-10 dropdown-modal">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <span class="user-info">
                  <small>Selamat Datang,</small>
                  <?php echo !empty($nama_user) ? $nama_user : "Email" ?>
                </span>
                <i class="ace-icon fa fa-caret-down"></i>
              </a>
              <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li>
                  <a href="<?php echo base_url() ?>auth/logout">
                    <i class="ace-icon fa fa-power-off"></i>
                    Keluar
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- /.navbar-container -->
    </div>

    <div class="main-container ace-save-state" id="main-container">
      
      <div style="position:fixed;z-index:1026;width:100%;">
      </div>
      
      <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
      </script>
