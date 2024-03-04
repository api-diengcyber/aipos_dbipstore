<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>AIPOS Email</title>
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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
        <!--[if lte IE 9]>
          <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="<?php echo base_url() ?>assets/js/html5shiv.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
        <![endif]-->
        <style>
        .main-container:before {
            display: block;
            content: "";
            position: absolute;
            z-index: -2;
            width: 100%;
            max-width: inherit;
            bottom: 0;
            top: 0;
            background-color: rgba(0, 0, 0, 0.7803921568627451);
        }
        </style>
    </head>

    <body style="/* background-color: white; */" class="bd">
        <div class="main-container" id="main" style="background-color: rgba(0, 0, 0, 0.0);">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="center">
                            <h1 style="font-family:fantasy">
                                <img src="<?php echo base_url() ?>assets/images/banner.png" style="height:75px">
                            </h1>
                            <h4 class="white" id="id-company-text">© Dieng Cyber</h4>
                        </div>
                        <div class="well white" style="min-height:300px;border-radius:10px;margin:20px;background-color: rgba(0, 176, 255, 0.1803921568627451);">
                            <h3><b>Congratulation!</b><br>Selamat pendaftaran akun anda telah berhasil , silahkan login untuk memulai aplikasi. <br><br><a href="<?php echo base_url() ?>" class="btn btn-primary" style="border-radius:10px"><i class="fa fa-arrow-left"></i> Login</a></h3>
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
        </script><script src="<?php echo base_url() ?>assets/js/jquery.mobile.custom.min.js"></script><script src="<?php echo base_url() ?>assets/js/jquery.mobile.custom.min.js"></script>

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
