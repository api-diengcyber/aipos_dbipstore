<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>AIPOS Email Activation</title>
    <link rel="icon shortcut" href="<?php echo base_url() ?>assets/images/logo-hitam-transparan.png">

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <style>
    html, body {
        height: 100%;
        margin: 0;
    }
    body{
        padding-bottom: 0;
        font-family: 'Open Sans';
        font-size: 13px;
        color: white;
        line-height: 1.5;
    }
    h1,h2,h3,h4,h5,h6{
        font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
    }
    h3{font-size:24px; margin:5px;}
    h4{font-size:18px; margin:5px;}
    .center{
        text-align: center;
    }
    #main{
        padding-top:5px;
        padding-bottom:5px;
        min-height:100%;
        min-width:100%;
        width: 100%;
        color: black;
    }
    .well{
         min-height:300px;
         border-radius:10px;
         margin:20px;
         padding: 30px;
         margin-left: 50px;
         margin-right: 50px;
    }

    @media(max-width: 800px){
    .well{
         min-height:300px;
         border-radius:10px;
         margin:2px;
         padding: 5px;
         margin-left: 5px;
         margin-right: 5px;
    }
    }
    </style>
</head>

<body>
    <div class="main-container" id="main">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="center">
                        <h1 style="font-family:fantasy;margin-bottom:0px;">
                            <img src="<?php echo base_url() ?>assets/images/banner-1.jpg" style="height:75px">
                        </h1>
                        <h4 class="white" id="id-company-text" style="margin:5px;">© Dieng Cyber</h4>
                    </div>
                    <div class="well white">
                        <h3>Selamat Datang di AIPOS,</h3>
                        <p style="font-size: 14px; ">
                        AIPOS (Artificial Intelligence Point of Sales) adalah aplikasi kasir dengan kecerdasan 
                        buatan. Anda berada dalam mode gratis silahkan upgrade untuk kelengkapan fitur. 
                        berikut adalah link verifikasi email Anda untuk mendapatkan laporan AIPOS harian.
                        </p>

                        <a href="<?php echo base_url() ?>auth/activate/<?php echo $id ?>/<?php echo $activation ?>">Aktifkan Akun Anda </a>

                        <br><br>
                        <h4 style="color: black; margin: 0px;">Ada 4 Fitur utama :</h4>
                        <ol>
                            <li style="font-size: 14px; margin: 5px;">Free</li>
                            <li style="font-size: 14px; margin: 5px;">Basic</li>
                            <li style="font-size: 14px; margin: 5px;">Medium</li>
                            <li style="font-size: 14px; margin: 5px;">Full</li>
                        </ol>

                        <p>
                            <br>
                        cek kelengkapan informasinya di : <a href="https://www.aipos.id" title="AIPOS">www.aipos.id</a>
                        <br>
                        salam, 
                        <h4>AIPOS INDONESIA</h4>
                        supported by 
                        <br>
                        <a href="https://www.diengcyber.com" title="Dieng Cyber">www.diengcyber.com</a><br>
                        Jl. S Parman, Semagung Wonosobo<br>
                        HP. 085729670954<br>
                        </p>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->

</body>
</html>