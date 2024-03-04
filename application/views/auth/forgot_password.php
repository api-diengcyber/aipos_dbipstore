
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Login - AIPOS Retail & Restaurant</title>

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
        .login-container{
          margin-top:25vh;
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

  <body class="login-layout bd">
    <div class="main-container" id="main">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
              <div class="center">
                <img src="<?php echo base_url() ?>assets/images/banner.png" alt="logo.png" style="height:75px">
              </div>

              <div class="space-6"></div>

              <div class="position-relative">

                <div id="forgot-box" class="forgot-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header red lighter bigger">
                        <i class="ace-icon fa fa-key"></i>
                        <?php echo lang('forgot_password_heading');?>
                      </h4>
                      <div class="space-6"></div>
                      <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
                      <?php echo $message;?>
                      <?php echo form_open("auth/forgot_password");?>
                        <fieldset>
                          <label for="identity">
                            <?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?>
                           </label>
                           <br />
                           <?php echo form_input($identity);?>
                           <button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
                            <i class="ace-icon fa fa-lightbulb-o"></i>
                            <span class="bigger-110">Send Me!</span>
                           </button>
                        </fieldset>
                      <?php echo form_close();?>
                    </div><!-- /.widget-main -->

                    <div class="toolbar center">
                      <a href="login" class="back-to-login-link">
                        Back to login
                        <i class="ace-icon fa fa-arrow-right"></i>
                      </a>
                    </div>
                  </div><!-- /.widget-body -->
                </div><!-- /.forgot-box -->
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
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>

  </body>
</html>