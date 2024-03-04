<style>
 .d-none {
    display:none;
  }
  .d-block {
    display:block!important;
  }
  body {
    width: 100vw!important;
    height: 100vh!important;
    overflow: hidden!important;
  }
  .nmpd-grid {border: none; padding: 20px;}
  .nmpd-grid>tbody>tr>td {border: none;}
  
  /* Some custom styling for Bootstrap */
  .qtyInput {display: block;
    width: 100%;
    padding: 6px 12px;
    color: #555;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
  }

  .btn-nav {
    padding: 10px;
    width: 50px;
    height: 50px;
  }
  .mT-10 {
    margin-top: 10px;
  }
  .page-content {
    overflow-x: hidden;
    min-height:100vh;
  }
  .form-group input[type=email], .form-group input[type=url], .form-group input[type=search], .form-group input[type=tel], .form-group input[type=color], .form-group input[type=text], .form-group input[type=password], .form-group input[type=datetime], .form-group input[type=datetime-local], .form-group input[type=date], .form-group input[type=month], .form-group input[type=time], .form-group input[type=week], .form-group input[type=number], .form-group select, .form-group textarea {
    background: #FFF;
    height: 42px;
    border-radius: 5px!important;
  }
  .ace-settings-container {
    top:40px!important;
  }
  .table-info {
    margin: 0px;
    border: solid 1px white;
    border-radius: 5px;
    margin-top: 15px;
    height:345px!important;
  }
  .label-addr {
    border-radius: 0px 0px 10px 10px;
    padding: 3px;
    width: 98%;
  }
  .member::before {
    background-color: #ffffff!important;
    color: #838383!important;
  }
  .product-list {
    padding: 10px;
    border: solid 1px white;
    border-radius: 5px;
    background: #caebff;
    min-height: 400px;
  }
  @media screen and (max-height:768px){
    .product-list {
      max-height: 500px;
    }
    .blue-product {
      height: 43px!important;
    }
    .item {
      padding:4px!important;
    }
  }
  @media screen and (min-height:595px) and (max-height: 765px){
      .harga-display {
          height:120px!important;
      }
      .logo {
          height:120px!important;
          padding:5px;
      }
      .product-list {
          min-height: 350px!important; 
          max-height: 350px!important; 
      }
      .table-info {
          height: 240px!important;
      }
      .btn-nav {
          width: auto;
          height: 40px;
      }
      #kat_product_touch {
          border-right: 2px solid #f6feff;
          height: 330px;
          overflow-y: scroll;
      }
      #dat_product_touch {
          min-height: auto!important;
      }
      #product-list_wrapper {
          margin-bottom: 0px!important;
      }
      #prevp {
        width: 50px;
      }
      #nextp {
        width: 50px;
      }
      .blue-product {
          height: 26px!important;
          font-size:12px!important;
      }
      body {
        height: 100vh;
        width: 100vw;
        overflow: hidden;
      }
      .mobile-scroll {
        height: 290px!important;
        overflow-y:scroll;
      }
  }
  @media only screen and (max-height:800px){
    .product-list {
      max-height: 500px!important;
    }
    .blue-product {
      height: 43px!important;
    }
    .item {
      padding:3.5px!important;
    }
  }
  .p-0 {
    padding:0px;
  }
  .w-98 {
    width:98%!important;
  }
  .bdc-grey {
    border: solid 2px #1b527f;
  }
  .list-product {
    padding: 0px!important;
    margin:0px;
    list-style: none;
  }
  .item {
    padding: 7px;
    border: 2px solid #1b527f;
    background: linear-gradient(to bottom , #4798dd, #095e97);
    margin: 5px 0px 5px 0px;
    color: white;
    border-radius: 5px;
    cursor: pointer;
  }
  .item:hover {
    background: linear-gradient(to left, #337ab7 , #0d3e68);
  }
  @media screen and (min-width:768px){
    .desktop-none {
      display: none!important;
    }
  }
  @media only screen and (min-width:1920px){
    .item {
      padding: 16px!important;
    }
    .blue-product {
      height: 80.5px!important;
      font-size: 16px!important;
    }
  }
  .blue-product {
    background: #5180a8;
    color: #fff900;
    font-size: 14px!important;
  }
  .table-hovers>tbody>tr:hover {
    background-color: #428bca;
    color: white;
  }
  .modal-round {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    background: linear-gradient(to bottom , #2196F3 , #2196F3);
    color: white;
  }
  .round-bottom {
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
  }
  .bgc-blue {
    background-color: #f6feff!important;
  }
  .logo {
    background-color: #35b3ea;
    text-align: center;
    border: solid 2px #ffffff;
    border-radius: 10px;
    padding: 20px;
    height: 150px;
  }
  .harga-display {
    background: linear-gradient(to right, #0ca7d6, #60bfff);
    border: solid 2px #ffffff;
    border-radius: 10px;
    padding: 20px;
    height: 150px;
  }
  .btn-blue-dark {
    background-color: #254a6b!important;
  }
  .image-checkbox {
      cursor: pointer;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      border: 4px solid transparent;
      margin-bottom: 0;
      outline: 0;
      border:solid 2px blue;
      border-radius:5px;
      background-color: #60b5ff;
      border: solid 2px #285f80;
      padding: 10px;
  }
  .image-checkbox input[type="checkbox"] {
      display: none;
  }
  .image-checkbox-checked {
      border-color: #4783B0;
  }
  .image-checkbox .glyphicon {
      position: absolute;
      color: #ffffff;
      background-color: #204462;
      padding: 10px;
      top: -10px;
      right: 15px;
      border-radius: 10px;
  }
  .image-checkbox-checked .glyphicon {
    display: block !important;
  }
  .show-mobile {
    visibility: hidden;
  }
  .btn-produk {
    background-color: #3eb7d9!important;
    border: 0px;
    border-radius: 5px;
    margin-top: -5px;
    margin-bottom: 10px;
  }
  .ace-thumbnails>li {
    border: 1px solid #ececec;
    border-radius: 10px;
  }
  .img-list {
    width: 96px!important;
    height: 96px!important;
  }
  input,select {
    background:transparent!important;
  }

  /* Css mobile view */
  @media only screen and (max-width: 460px){
    .img-mekanik {
      height:80px!important;
    }
    .img-list {
      width:96px;
      height: 96px;
    }
    .page-content {
      padding: 8px 10px 24px;
    }
    .mobile-none {
      display: none;
    }
    .xsaller-90 {
      display: none;
    }
    .table-info {
      margin-top: 15px;
      padding:0px 10px;
      height: 38vh!important;
    }
    #total-display {
      font-size: 4.1rem!important;
    }
    .harga-display {
      height: 100px!important
    }
    .m-mB-10 {
      margin-bottom: 10px;
    }
    .show-mobile {
      visibility: visible;
    }
    .btn-kat {
      width: 100%!important;
      margin:3px 0px!important;
    }
    .blue-product {
      height:60px!important;
    }
    .plat {
      margin-left: 0px!important;
      margin-top: 20px!important;
    }
    .border-blue {
      border: solid 1px #cff4ff;
    }
    .mobile-scroll {
      margin-top: 10px;
      height: 68vh;
      overflow: scroll;
      padding: 10px;
    }
    .kat_product_touch {
      border-right: 2px solid #e3e3e3!important;
    }
    #modalProduk {
      z-index: 999999;
    }
    .lp {
      padding:5px!important;
    }
    .btn-nav {
        padding: 10px;
        width: 50px;
        height: 35px;
    }
    .ace-thumbnails {
      padding: 0px!important;
    }
  }
  /*Css tablet view */
  @media only screen and (max-width:1280px){
    .img-list {
      width:92px!important;
      height: 92px!important;
    }
  }
</style>

<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/select2.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.numpad.css');?>">

<div class="main-content" id="cihtml">
  <div class="main-content-inner">
    <div class="breadcrumbs breadcrumbs-touch ace-save-state breadcrumbs-fixed" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="<?php echo base_url();?>">Home</a>
        </li>
        <li class="active">Penjualan</li>
      </ul><!-- /.breadcrumb -->

      <div class="nav-search hidden-480" id="nav-search">
        F11: Fullscreeen, END : Selesai, ENTER : Cetak / Bayar, DEL : Hapus Barang
      </div>
    </div>

    <div class="page-content" id="fullscreen">
      <div class="ace-settings-container" id="ace-settings-container">
        <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
          <i class="ace-icon fa fa-cog bigger-130"></i>
        </div>

        <div class="ace-settings-box clearfix" id="ace-settings-box">
          <div class="pull-left width-50">
            <div class="ace-settings-item">
              <div class="pull-left">
                <select id="skin-colorpicker" class="hide">
                  <?php echo $theme_option ?>
                </select>
              </div>
              <span>&nbsp; Choose Skin</span>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
              <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
              <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
              <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
              <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
              <label class="lbl" for="ace-settings-add-container">
                Inside
                <b>.container</b>
              </label>
            </div>
          </div><!-- /.pull-left -->

          <div class="pull-left width-50">
            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
              <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
              <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
              <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
            </div>
          </div><!-- /.pull-left -->
        </div><!-- /.ace-settings-box -->
      </div><!-- /.ace-settings-container -->

      <div class="page-header">
        <h1>
          Penjualan Retail
        </h1>
      </div><!-- /.page-header -->
      <style>
          .btn-nav {
            padding: 10px;
            width: 50px;
            height: 50px;
          }
          .mT-10 {
            margin-top: 10px;
          }
          .page-content {
            overflow-x: hidden;
            min-height:100vh;
          }
          .form-group input[type=email], .form-group input[type=url], .form-group input[type=search], .form-group input[type=tel], .form-group input[type=color], .form-group input[type=text], .form-group input[type=password], .form-group input[type=datetime], .form-group input[type=datetime-local], .form-group input[type=date], .form-group input[type=month], .form-group input[type=time], .form-group input[type=week], .form-group input[type=number], .form-group select, .form-group textarea {
            background: #FFF;
            height: 42px;
            border-radius: 5px!important;
          }
          .ace-settings-container {
            top:40px!important;
          }
          .table-info {
            margin: 0px;
            border: solid 1px white;
            border-radius: 5px;
            margin-top: 15px;
            height:345px!important;
          }
          .label-addr {
            border-radius: 0px 0px 10px 10px;
            padding: 3px;
            width: 98%;
          }
          .member::before {
            background-color: #ffffff!important;
            color: #838383!important;
          }
          .product-list {
            padding: 10px;
            border: solid 1px white;
            border-radius: 5px;
            background: #caebff;
            min-height: 400px;
          }
          @media screen and (max-height:768px){
            .product-list {
              max-height: 500px;
            }
            .blue-product {
              height: 43px!important;
            }
            .item {
              padding:4px!important;
            }
          }
          @media screen and (min-height:595px) and (max-height: 765px){
              .harga-display {
                  height:120px!important;
              }
              .logo {
                  height:120px!important;
                  padding:5px;
              }
              .product-list {
                  min-height: 350px!important; 
                  max-height: 350px!important; 
              }
              .table-info {
                  height: 240px!important;
              }
              .btn-nav {
                  width: auto;
                  height: 40px;
              }
              #kat_product_touch {
                  border-right: 2px solid #f6feff;
                  height: 330px;
                  overflow-y: scroll;
              }
              #dat_product_touch {
                  min-height: auto!important;
              }
              #product-list_wrapper {
                  margin-bottom: 0px!important;
              }
              #prevp {
                width: 50px;
              }
              #nextp {
                width: 50px;
              }
              .blue-product {
                  height: 26px!important;
                  font-size:12px!important;
              }
              body {
                height: 100vh;
                width: 100vw;
                overflow: hidden;
              }
              .mobile-scroll {
                height: 290px!important;
                overflow-y:scroll;
              }
          }
          @media only screen and (max-height:800px){
            .product-list {
              max-height: 500px!important;
            }
            .blue-product {
              height: 43px!important;
            }
            .item {
              padding:3.5px!important;
            }
          }
          .p-0 {
            padding:0px;
          }
          .w-98 {
            width:98%!important;
          }
          .bdc-grey {
            border: solid 2px #1b527f;
          }
          .list-product {
            padding: 0px!important;
            margin:0px;
            list-style: none;
          }
          .item {
            padding: 7px;
            border: 2px solid #1b527f;
            background: linear-gradient(to bottom , #4798dd, #095e97);
            margin: 5px 0px 5px 0px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
          }
          .item:hover {
            background: linear-gradient(to left, #337ab7 , #0d3e68);
          }
          @media screen and (min-width:768px){
            .desktop-none {
              display: none!important;
            }
          }
          @media only screen and (min-width:1920px){
            .item {
              padding: 16px!important;
            }
            .blue-product {
              height: 80.5px!important;
              font-size: 16px!important;
            }
          }
          .blue-product {
            background: #5180a8;
            color: #fff900;
            font-size: 14px!important;
          }
          .table-hovers>tbody>tr:hover {
            background-color: #428bca;
            color: white;
          }
          .modal-round {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            background: linear-gradient(to bottom , #2196F3 , #2196F3);
            color: white;
          }
          .round-bottom {
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
          }
          .bgc-blue {
            background-color: #f6feff!important;
          }
          .logo {
            background-color: #35b3ea;
            text-align: center;
            border: solid 2px #ffffff;
            border-radius: 10px;
            padding: 20px;
            height: 150px;
          }
          .harga-display {
            background: linear-gradient(to right, #0ca7d6, #60bfff);
            border: solid 2px #ffffff;
            border-radius: 10px;
            padding: 20px;
            height: 150px;
          }
          .btn-blue-dark {
            background-color: #254a6b!important;
          }
          .image-checkbox {
              cursor: pointer;
              box-sizing: border-box;
              -moz-box-sizing: border-box;
              -webkit-box-sizing: border-box;
              border: 4px solid transparent;
              margin-bottom: 0;
              outline: 0;
              border:solid 2px blue;
              border-radius:5px;
              background-color: #60b5ff;
              border: solid 2px #285f80;
              padding: 10px;
          }
          .image-checkbox input[type="checkbox"] {
              display: none;
          }
          .image-checkbox-checked {
              border-color: #4783B0;
          }
          .image-checkbox .glyphicon {
              position: absolute;
              color: #ffffff;
              background-color: #204462;
              padding: 10px;
              top: -10px;
              right: 15px;
              border-radius: 10px;
          }
          .image-checkbox-checked .glyphicon {
            display: block !important;
          }
          .show-mobile {
            visibility: hidden;
          }
          .btn-produk {
            background-color: #3eb7d9!important;
            border: 0px;
            border-radius: 5px;
            margin-top: -5px;
            margin-bottom: 10px;
          }
          .ace-thumbnails>li {
            border: 1px solid #ececec;
            border-radius: 10px;
          }
          .img-list {
            width: 96px!important;
            height: 96px!important;
          }

          /* Css mobile view */
          @media only screen and (max-width: 460px){
            .img-mekanik {
              height:80px!important;
            }
            .img-list {
              width:96px;
              height: 96px;
            }
            .page-content {
              padding: 8px 10px 24px;
            }
            .mobile-none {
              display: none;
            }
            .xsaller-90 {
              display: none;
            }
            .table-info {
              margin-top: 15px;
              padding:0px 10px;
              height: 38vh!important;
            }
            #total-display {
              font-size: 4.1rem!important;
            }
            .harga-display {
              height: 100px!important
            }
            .m-mB-10 {
              margin-bottom: 10px;
            }
            .show-mobile {
              visibility: visible;
            }
            .btn-kat {
              width: 100%!important;
              margin:3px 0px!important;
            }
            .blue-product {
              height:60px!important;
            }
            .plat {
              margin-left: 0px!important;
              margin-top: 20px!important;
            }
            .border-blue {
              border: solid 1px #cff4ff;
            }
            .mobile-scroll {
              margin-top: 10px;
              height: 68vh;
              overflow: scroll;
              padding: 10px;
            }
            .kat_product_touch {
              border-right: 2px solid #e3e3e3!important;
            }
            #modalProduk {
              z-index: 999999;
            }
            .lp {
              padding:5px!important;
            }
            .btn-nav {
                padding: 10px;
                width: 50px;
                height: 35px;
            }
            .ace-thumbnails {
              padding: 0px!important;
            }
          }
          .table-temp > tbody > tr > th{
            vertical-align: middle!important;
          }
          
          .odd {
            background: whitesmoke;
          }

          .odd input,.odd select {
            background:whitesmoke;
          }

          /*Css tablet view */
          @media only screen and (max-width:1280px){
            .img-list {
              width:92px!important;
              height: 92px!important;
            }
          }
      </style>
      <div class="row" id="touchscreen">
        <div class="col-xs-12">
          <div class="row">
            <div class="col-md-2 logo mobile-none"><img src="<?php echo base_url('assets/images/logo-lingkaran.png');?>" alt="" style="height:100px"></div>
            <div class="col-md-10 col-xs-12">
              <div class="harga-display">
                <span style="color:white;font-weight:bold">TOTAL</span>
                <span class="pull-right" id="total-display" style="font-size:70px;font-weight:bold;color:white">
                  0
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12" style="padding:15px 0px">
              <div class="row">
                <div class="col-md-6 col-xs-12">
                  <div class="row" style="margin: 0px 10px 0px 0px;">
                    <form class="form-inline">
                      <div class="form-group form-touch col-xs-4 p-0">
                        <span class="btn btn-primary btn-round btn-xs w-98" style="padding:4px;">
                            <label class="pull-right inline">
                              <xsall class="muted xsaller-90">MEMBER</xsall>
                              <input type="checkbox" class="ace ace-switch ace-switch-5" id="memberToggle" />
                              <span class="lbl middle member"></span>
                            </label>
                            <input type="hidden" id="member_status">
                        </span>
                      </div>
                      <div class="form-group col-xs-4 p-0" style="margin-bottom:0px">
                        <div class="default_pembeli" id="default_pembeli">
                          <input type="text" class="form-control nama_pembeli" autocomplete="off" placeholder="Nama Pembeli"/>
                        </div>
                      </div>
                      <div class="form-group col-xs-4 p-0 " style="margin-bottom:0px">
                        <div class="default_pembayaran" id="default_pembayaran">
                          <input type="text" class="form-control alamat_pembeli" autocomplete="off" placeholder="Alamat Pembeli"/>
                        </div>
                      </div>
                      <div class="form-group col-xs-4 p-0 pull-right" style="margin-bottom:0px">
                        <div id="panelDeadline" class="form-group btn-round w-98 panelDeadline" style="display:none;" class="mT-10">
                          <div class="input-icon">
                            <input type="text" class="form-control btn-round w-98 deadline" id="deadline" placeholder="Hari" value="" tabindex="5" maxlength="11" />
                            <i class="ace-icon fa fa-calendar red"></i>
                          </div>
                        </div>
                      </div>
                      <div class="row panelPembayaran hide">
                        <div class="col-md-2">
                          <div class="form-group">
                            <select class="pembayaran" style="width:100%;">
                              <option value="1">TUNAI</option>
                              <option value="2">KREDIT</option>
                              <option value="3">LAINNYA</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3 panelDeadline hide" style="padding-left:0px;">
                          <div class="form-group">
                            <input type="text" class="form-control deadline" placeholder="Hari" maxlength="11" />
                          </div>
                        </div>
                      </div>
                      <style>
                        .lainya {
                          width:100%;
                          display:flex;
                          padding-right:20px;
                        }
                        .lainya select,.lainya input {
                          flex:1;
                        }
                      </style>
                      <div class="panelPembayaranLainnya hide" style="width:100%;margin-top:20px">
                        <div class="lainya">
                          <div class="form-group">
                            <input type="text" name="nominal_tunai" id="nominal_tunai" class="form-control text-right numbering" placeholder="Nominal Tunai" />
                          </div>
                          <div class="form-group">
                            <input type="text" name="nominal_transfer" id="nominal_transfer" class="form-control text-right numbering" placeholder="Nominal Transfer" />
                          </div>
                          <div class="form-group">
                            <select name="akun_transfer" id="akun_transfer" class="" style="width:100%;">
                              <?php foreach ($data_akun_transfer as $key): ?>
                              <option value="<?php echo $key->kode ?>"><?php echo $key->akun ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <input type="text" name="nominal_hutang" id="nominal_hutang" class="form-control text-right numbering" placeholder="Nominal Hutang" readonly />
                          </div>
                          
                        </div>
                        <div class="lainya">
                          <div class="form-group">
                            <input type="text" class="form-control deadline2" placeholder="Hari" value="30" maxlength="11" />
                          </div>
                        </div>
                        
                        
                      </div>
                    </form>
                  </div>
                  <script>
                  </script>
                  <div class="col-xs-12 desktop-none">
                      <button type="button" class="btn btn-primary btn-produk no-border show-mobile" data-toggle="modal" data-target="#modalProduk" data-id="" id="toggleProduk"><i class="fa fa-plus"></i> Produk</button>
                  </div>
                  <div class="row table-info" style="height:400px;overflow-y:scroll;margin-bottom: 10px;">
                    <form id="formTouchBarang">
                      <div class="panel panel-body p-0 border-blue" style="margin-bottom:0px" id="loadTemp">
                        <table class="table table-temp table-bordered" style="table-layout:fixed">
                          <thead style="position:sticky;top:300px">
                            <tr>
                              <th rowspan="2">NO</th>
                              <th width="150">NAMA BARANG</th>
                              <th width="70">QTY</th>
                              <th width="120">PILIHAN HARGA</th>
                              <th colspan="3">DISKON</th>
                              <th rowspan="2">SUB TOTAL</th>
                            </tr>
                            <tr>
                              <th>STOK</th>
                              <th width="70">QTY BONUS</th>
                              <th width="120">H. SAT</th>
                              <th width="30">1</th>
                              <th width="30">2</th>
                              <th width="30">3</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </form>
                  </div>
                  <div class="row" style="margin:0px">
                    <div class="col-md-9 col-xs-12 m-mB-10">
                      <button type="button" class="btn btn-primary btn-round no-border" id="btn_touch_ubah" data-id="" data-toggle="modal" data-target="#myModal">Ubah</button>&nbsp;
                      <button type="button" class="btn btn-danger btn-round no-border" id="btn_touch_hapus" data-id=""><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <button type="button" id="id-btn-dialog3" class="id-btn-dialog3 btn-block btn btn-primary btn-round no-border">Selesai</button>
                    </div>
                  </div>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content" style="border-radius:30px">
                      <div class="modal-header modal-round">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Perubahan Detail Struk</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal">
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Nama:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="mdl_touch_ubah_nama" id="mdl_touch_ubah_nama" readonly />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Kuantitas:</label>
                            <div class="col-sm-10"> 
                              <div class="input-group"><input type="text" class="form-control" name="mdl_touch_ubah_kuantitas" id="mdl_touch_ubah_kuantitas"><div class="input-group-addon numpad-qty numpad"><i class="fa fa-table"></i></div></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Harga:</label>
                            <div class="col-sm-10"> 
                              <div class="input-group"><input type="text" class="form-control" name="mdl_touch_ubah_harga" id="mdl_touch_ubah_harga" readonly /><div class="input-group-addon numpad-qty numpad"><i class="fa fa-table"></i></div></div>
                            </div>
                          </div>
                          <!-- <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Potongan / pcs:</label>
                            <div class="col-sm-10"> 
                              <div class="row">
                                <div class="col-sm-6"> % <div class="input-group"><input type="text" class="form-control" style="border-right-top-radius:0px;border-right-bottom-radius:0px;" name="mdl_touch_ubah_pot_persen" id="mdl_touch_ubah_pot_persen"><div class="input-group-addon numpad-potongan1"><i class="fa fa-table"></i></div></div></div>
                                <div class="col-sm-6"> Potongan<div class="input-group"><input type="text" class="form-control" name="mdl_touch_ubah_pot" id="mdl_touch_ubah_pot"><div class="input-group-addon numpad-potongan2 numpad"><i class="fa fa-table"></i></div></div></div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Total Harga:</label>
                            <div class="col-sm-10"> 
                              <input type="text" class="form-control" name="mdl_touch_ubah_total" id="mdl_touch_ubah_total" readonly>
                            </div>
                          </div> -->
                          <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="button" class="btn btn-primary btn-round no-border" id="mdl_btn_submit">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer round-bottom">
                        <button type="button" class="btn btn-danger btn-round no-border" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 col-xs-12 p-0 mobile-none" id="product-list_wrapper" style="padding-right:25px;margin-bottom:50px">
                  <div class="product-list">
                      <div class="row">
                        <div class="col-xs-4" style="border-right: 2px solid #cbd7dc" id="kat_product_touch">
                        </div>
                        <div class="col-xs-8" id="dat_product_touch" style="min-height:475px">
                        </div>
                      </div>
                  </div>
                </div>
                <div id="modalProduk" class="modal fade" role="dialog" style="overflow-y:auto">
                  <div class="modal-header" style="background-color: #21a4f1;border-bottom: 3px solid #1b527f!important;padding:5px;font-size:13px!important">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="tutup()"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"  id="myModalLabel" style="text-align:center;color:white">PILIH PRODUK</h4>
                  </div>
                  <div class="modal-body" style="background-color:white;height: 84%;padding:0px">
                      <div class="row">
                        <input type="hidden" id="kat-temp">
                        <style>
                        .d-none { display: none }
                        .d-block {display: block}
                        .open-kat {
                          overflow: scroll;
                          position: fixed;
                          z-index: 9999999;
                          padding: 10px 10px 10px 25px;
                          background-color: #ebfdff;
                          color: #1d1d1d;
                          height: 100%;
                        }
                        .dat_product_touch {
                          min-height: 475px;
                          height: 100%;
                          padding: 10px 30px;
                        }
                        #nama_kategori {
                          margin-top:10px;
                          font-weight: bold;
                        }
                        .btn-popup {
                          border: 0px;
                          padding: 10px;
                          border-radius: 40px!important;
                          position: absolute;
                          top: 0px;
                          right: 10px;
                          height: 40px;
                        }
                        .mdl-footer {
                          background-color: white!important;
                          position: relative;
                          border-top: 2px solid white!important;
                          height: 60px;
                        }
                        </style>
                        <div class="col-xs-5 kat_product_touch d-none">
                        </div>
                        <div class="col-xs-12 dat_product_touch">
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer mdl-footer">
                    <button id="katToggle" class="btn btn-blue-dark btn-sm btn-popup"><i class="fa fa-exchange"></i> Kategori</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.page-content -->
</div><!-- /.main-content -->

<script src="<?php echo base_url() ?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/spinbox.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/daterangepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.knob.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/autosize.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.inputlimiter.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-tag.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/tree.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.nestable.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo base_url() ?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/ace.min.js"></script>

<?php $id_member = $this->input->get('id_member', true); ?>
<script type="text/javascript">
  var id_pembeli = null;
  var pembayaran = 1;
  var ibarang = 0;
  var app_total_ppn = 0;
  var app_total_diskon = 0;
  var app_ppn_nominal = 0;
  var app_total = 0;
  var app_total_asli = 0;
  var app_diskon = 0;
  var id_pil_harga = 0;
  var data_touch_ubah = {};

  var data_pembeli = [
    <?php foreach ($data_pembeli as $key): ?>
    { 
      value:<?php echo $key->id_member ?>, 
      label: "<?php echo $key->nama ?>", 
      alamat: "<?php echo $key->alamat ?>",
      id_pil_harga:<?php echo $key->id_pil_harga ?>, 
      <?php if (!empty($key->id_sales)) { ?>
      id_sales: <?php echo $key->id_sales ?>,
      nama_sales: "<?php echo $key->first_name." ".$key->last_name ?>",
      <?php } ?>
    },
    <?php endforeach ?>
  ];

  var pil_harga = ["-- Pilih Harga --", "H. Outlet", "H. Res. Kecil", "H. Res. Besar", "H. Agen Kecil", "H. Agen Besar", "H. Online", "H. Distributor"];

  function showPopup(text) {
    hidePopup();
    $(".popup").show();
    $(".popup-body").html(text);
    setTimeout(function(){
      hidePopup();
    }, 1000);
  }

  function hidePopup() {
    $(".popup").hide();
    $(".popup-body").html("");
  }

  $(document).ready(function(){
    $("body").hide();
    $("#navbar").remove();
    $("#sidebar").remove();
    $(".page-header").remove();
    $(".footer").remove();
    $("div").removeClass('main-container');
    $("div").removeClass('main-content');
    $(".aside-trigger").click();

    $('#katToggle').click(function(e){
        $('.kat_product_touch').toggleClass('d-none');
        $('.kat_product_touch').toggleClass('open-kat');
    });

    $('#memberToggle').change(function(e){
      statusMember();
    });

    //load data kategori
    getDataKategori(0);

    function refresh() {
      $(".status_member").val(1);
      $(".status_member").trigger("change");
      id_pembeli = null;
      pembayaran = 1;
      barcode = null;
      id_barang = null;
      ibarang = 0;
      app_total_ppn = 0;
      app_total_diskon = 0;
      app_ppn_nominal = 0;
      app_total = 0;
      app_total_asli = 0;
      app_diskon = 0;
      pilPembayaran();
      statusBarcode();
      loadTemp();
    }

    $(".numbering").on("keyup", function(){
      var val = jNumber($(this).val());
      $(this).val(numberWithCommas(val.toString()));
    });

    function statusMember() {
      id_pembeli = null;
      $(".nama_pembeli").val("");
      $(".nama_pembeli").removeAttr("readonly");
      $(".alamat_pembeli").val("");
      $(".panelPembayaran").addClass("hide");
      $(".panelSales").addClass("hide");
      $(".panelSales select").html('<option value="">-- Pilih Sales --</option>');
      $(".pembayaran").val('1');
      pilPembayaran();
      loadTemp();
      var status_member = $("#memberToggle").is(':checked');
      var var_data_pembeli = [];
      if (!status_member) { // BUKAN MEMBER
        $(".alamat_pembeli").removeAttr("readonly");
        $("#nominal_tunai").val("");
        $("#nominal_transfer").val("");
        $("#nominal_hutang").val("");
      } else { // MEMBER
        var_data_pembeli = data_pembeli;
        $(".alamat_pembeli").attr("readonly", "readonly");
      }
      $(".nama_pembeli").autocomplete({
        source: var_data_pembeli,
        delay: 0,
        autoFocus: true,
        select: function(event, ui){
          event.preventDefault();
          $(".nama_pembeli").val(ui.item.label);
          $(".alamat_pembeli").val(ui.item.alamat);
          $(".nama_pembeli").attr("readonly", "readonly");
          $(".panelPembayaran").removeClass("hide");
          if (typeof(ui.item.id_sales)!=='undefined') {
            $(".panelSales").removeClass("hide");
            var html = '';
            html += '<option value="'+ui.item.id_sales+'" selected>'+ui.item.nama_sales+'</option>';
            html += '<option value="">-- Tidak ada sales --</option>';
            $(".panelSales select").html(html);
          }
          $(".pembayaran").focus();
          id_pembeli = ui.item.value;
          id_pil_harga = ui.item.id_pil_harga;
          loadTemp();
        }
      });
      $(".nama_pembeli").focus();
    }

    <?php if (!empty($id_member)) { ?>
    var get_id = <?php echo $id_member ?>;
    for (var ip in data_pembeli) {
      if (data_pembeli[ip].value==get_id) {
        $(".status_member").attr("disabled", "disabled");
        $(".alamat_pembeli").attr("readonly", "readonly");
        $(".nama_pembeli").val(data_pembeli[ip].label);
        $(".alamat_pembeli").val(data_pembeli[ip].alamat);
        $(".nama_pembeli").attr("readonly", "readonly");
        $(".panelPembayaran").removeClass("hide");
        if (typeof(data_pembeli[ip].id_sales)!=='undefined') {
          $(".panelSales").removeClass("hide");
          var html = '';
          html += '<option value="'+data_pembeli[ip].id_sales+'" selected>'+data_pembeli[ip].nama_sales+'</option>';
          html += '<option value="">-- Tidak ada sales --</option>';
          $(".panelSales select").html(html);
        }
        $(".pembayaran").focus();
        id_pembeli = data_pembeli[ip].value;
        loadTemp();
      }
    }
    <?php } ?>

    function pilPembayaran() {
      $(".deadline").val("");
      pembayaran = $(".pembayaran").find(":selected").val()*1;
      if (pembayaran==2) { // KREDIT
        $(".panelDeadline").removeClass("hide");
        $(".deadline").focus();
      } else { // TUNAI
        $(".panelDeadline").addClass("hide");
      }
      if (pembayaran==3) {
        $(".panelPembayaranLainnya").removeClass("hide");
        $("#nominal_tunai").val(numberWithCommas(app_total.toString()));
        $("#nominal_transfer").val('');
        hitunglainnya();
        setTimeout(function(){
          $("#nominal_tunai").focus();
        }, 80);
      } else {
        $(".panelPembayaranLainnya").addClass("hide");
      }
    }
    pilPembayaran();
    $(".pembayaran").on('change', function(){
      pilPembayaran();
    });

    var barcode = null;
    var id_barang = null;

    function statusBarcode() {
      $(".nama_barang").val("");
      var status_barcode = $(".status_barcode").find(":selected").val();
      var source_nama_barang = [];
      if (status_barcode=="1") { // BARCODE
        source_nama_barang = [];
      } else { // NAMA BARANG
        source_nama_barang = function(request, response){
          $.ajax({
            url: '<?php echo base_url() ?>outlet/penjualan_retail/json_produk',
            type: 'post',
            data: 'term='+request.term+'&tgl=<?php echo date("Y-m-d") ?>',
            success: function(data) {
              response($.map(data, function (value, key) {
                return {
                  value: value.value,
                  label: value.label,
                };
              }));
            }
          });
        }
      }
      barcode = null;
      $(".nama_barang").focus();
      $(".nama_barang").autocomplete({
        source: source_nama_barang,
        minLength: 1,
        delay: 0,
        autoFocus: true,
        select: function(event, ui){
          $('input[name="nama_barang"]').val(ui.item.nama_produk);
          barcode = ui.item.value;
          $(".form_barang").submit();
        }
      });
    }
    statusBarcode();
    $(".status_barcode").on('change', function(){
      statusBarcode();
    });

    $(".form_barang").submit(function(e){
      e.preventDefault();
      if (barcode!=null) {
      } else {
        barcode = $(".nama_barang").val();
      }
      insertTemp();
      function insertTemp() {
        $(".nama_barang").attr("disabled","disabled");
        $.ajax({
          url: '<?php echo base_url() ?>outlet/penjualan_retail/insert_barang_temp_by_id/<?php echo date("Y-m-d") ?>',
          type: 'post',
          data: 'barcode='+barcode+'&id_pil_harga='+id_pil_harga,
          success: function(data){
            $(".nama_barang").removeAttr("disabled");
            var parsed_data = JSON.parse(data);
            var response = parsed_data.response;
            if (response[0]=="0") {
              alert('Barang Tidak Tersedia!');
            } else if(response[0]=="1") {
            } else if(response[0]=="2") {
              alert('Barang telah Habis!');
            } else if(response[0]=="3") {
              alert('Barang telah kadaluarsa!');
            } else {
              alert("Error");
            }
            loadTemp();
            $(".nama_barang").focus();
          },
          error: function(){
            insertTemp();
          }
        });
      }
    });
    
    $("#ongkos_kirim").on("keyup", function(){
      var val = $(this).val();
      loadTemp();
    });

    loadTemp();

    $("#nominal_tunai").on("keyup", function(){
      var val = jNumber($(this).val());
      hitunglainnya();
    });
    $("#nominal_tunai").trigger("keyup");

    $("#nominal_transfer").on("keyup", function(){
      var val = jNumber($(this).val());
      hitunglainnya();
    });
    $("#nominal_transfer").trigger("keyup");

    function hitunglainnya() {
      var tunai = jNumber($("#nominal_tunai").val())*1;
      var transfer = jNumber($("#nominal_transfer").val())*1;
      var hutang = (app_total*1)-(tunai+transfer);
      $("#nominal_hutang").val(numberWithCommas(hutang));
    }

    $(".btn-selesai").on('click', function(){
      if (ibarang > 0) {
        $(this).attr("disabled","disabled");
        var fd = new FormData();
        fd.append("id_pembeli", id_pembeli);
        fd.append("id_sales", $('select[name="id_sales"]').val());
        fd.append("tgl", $('.tgl_penjualan').val());
        fd.append("nama_pembeli", $(".nama_pembeli").val());
        fd.append("alamat_pembeli", $(".alamat_pembeli").val());
        fd.append("pembayaran", pembayaran);
        fd.append("total_asli", app_total_asli);
        fd.append("diskon_member", app_diskon);
        fd.append("total", app_total);
        fd.append("ppn_nominal", app_ppn_nominal);
        fd.append("total_ppn", app_total_ppn);
        fd.append("total_diskon", app_total_diskon);
        fd.append("deadline", $(".deadline").val()*1);
        fd.append("nominal_tunai", jNumber($("#nominal_tunai").val())*1);
        fd.append("nominal_transfer", jNumber($("#nominal_transfer").val())*1);
        fd.append("akun_transfer", $("#akun_transfer").val());
        fd.append("nominal_hutang", jNumber($("#nominal_hutang").val())*1);
        fd.append("deadline2", $(".deadline2").val());
        fd.append("ongkos_kirim", $("#ongkos_kirim").val());
        $.ajax({
          url: '<?php echo base_url() ?>outlet/penjualan_retail/create_action',
          type: 'post',
          processData: false,
          contentType: false,
          data: fd,
          success: function(data) {
            if (typeof(data.next_no_faktur)!=='undefined') {
              $("#tampil_no_faktur").val(data.next_no_faktur);
            }
            if (typeof(data.no_faktur)!=='undefined') {
              var myWindow = window.open("<?php echo base_url() ?>outlet/penjualan_retail/cetak_nota_penjualan/"+data.no_faktur, "MsgWindow", "width=300, height=400");
            }
            showPopup("Tersimpan");
            refresh();
          },
          error: function(){
            alert("Masalah Simpan");
            $(this).removeAttr("disabled");
          }
        });
      } else {
        alert("Belum ada barang!");
      }
    });

    $("body").show();
  });

  function getDataKategori(start){
      $.ajax({
          url : '<?php echo base_url("outlet/penjualan_retail/data_kategori");?>',
          type: 'post',
          data: 'start='+start,
          success : function(response){
            $('#kat_product_touch').html(response);
            $('.kat_product_touch').html(response);
            afterResponseTouchKat();
          }
      });
  }

  function getDataProduct(start,id_kat){
    $.ajax({
      url : '<?php echo base_url("outlet/penjualan_retail/data_produk_by_kat");?>',
      type: 'post',
      data: 'id_kat='+id_kat+'&&start='+start,
      success : function(response){
        $('#dat_product_touch').html(response);
        $('.dat_product_touch').html(response);
        afterResponseTouchPKat();
      },
      error : function(xhr,status,throwError){
        console.log(throwError);
        console.log(xhr.code);
      }
    });
  }

  function afterResponseTouchKat() {
    var swipe = $('#kat_product_touch');
    swipe.on('swipeleft', function(e) {
      e.stopImmediatePropagation();
      e.preventDefault();
      $('#next').click();
    });
    swipe.on('swiperight', function(e) {
      e.stopImmediatePropagation();
      e.preventDefault();
      $('#prev').click();
    });
    var swipeM = $('.kat_product_touch');
    swipeM.on('swipeleft', function(e) {
      e.stopImmediatePropagation();
      e.preventDefault();
      $('#next').click();
    });
    swipeM.on('swiperight', function(e) {
      e.stopImmediatePropagation();
      e.preventDefault();
      $('#prev').click();
    });
    $("#next, #prev").click(function(e) {
      e.stopImmediatePropagation();
      var np = $(this).attr('data-np');
      getDataKategori(np);
    });
    $("li[id*=item_touch_kategori]").click(function(e){
      e.stopImmediatePropagation();
      var start = $(this).attr('data-start');
      var id_kategori_2 = $(this).attr('data-id-kategori-2');
      // hide kategori
      $('#katToggle').click();

      $('#kat-temp').val(id_kategori_2);
      getDataProduct(start, id_kategori_2);
    });
  }

  function afterResponseTouchPKat() {
    var swipe = $('#dat_product_touch');
    
    swipe.on('swipeleft', function(e) {
      e.stopImmediatePropagation();
      e.preventDefault();
      $('#nextp').click();
    });
    swipe.on('swiperight', function(e) {
      e.stopImmediatePropagation();
      e.preventDefault();
      $('#prevp').click();
    });
    //END SWIPE

    //SWIPE FUNCTION
    var swipeM = $('.dat_product_touch');
    swipeM.on('swipeleft', function(e) {
      e.stopImmediatePropagation();
      e.preventDefault();
      $('#nextp').click();
    });
    swipeM.on('swiperight', function(e) {
      e.stopImmediatePropagation();
      e.preventDefault();
      $('#prevp').click();
    });
    //END SWIPE

    //TOUCH SUBMIT FORM
    $("#nextp, #prevp").click(function(e){
      e.stopImmediatePropagation();
      var np = $(this).attr('data-np');
      var id_kat = $(this).attr('data-id-kat');
      getDataProduct(np, id_kat);
    });
    $("li[id*=item_touch_produk]").click(function(e){
      e.preventDefault();
      var barcode = $(this).attr('data-barcode');
      var id_produk_2 = $(this).attr('data-id-produk-2');
      insertTemp(barcode, id_produk_2);
      $('#showAdded').html($(this).text()+'ditambahkan');
      $("#showAdded").show().delay(1000).fadeOut();
    });
    //END TOUCH SUBMIT FORM
  }

  function insertTemp(barcode,id_produk_2) {
    $(".nama_barang").attr("disabled","disabled");
    $.ajax({
      url: '<?php echo base_url() ?>outlet/penjualan_retail/insert_barang_temp_by_id/<?php echo date("Y-m-d") ?>',
      type: 'post',
      data: 'barcode='+barcode+'&id_pil_harga='+id_pil_harga,
      success: function(data){
        $(".nama_barang").removeAttr("disabled");
        var parsed_data = JSON.parse(data);
        var response = parsed_data.response;
        if (response[0]=="0") {
          alert('Barang Tidak Tersedia!');
        } else if(response[0]=="1") {
        } else if(response[0]=="2") {
          alert('Barang telah Habis!');
        } else if(response[0]=="3") {
          alert('Barang telah kadaluarsa!');
        } else {
          alert("Error");
        }
        loadTemp();
        $(".nama_barang").focus();
      },
      error: function(){
        insertTemp();
      }
    });
  }

  function loadTemp() {
    app_total = 0;
    app_total_asli = 0;
    app_diskon = 0;
    app_total_ppn = 0;
    app_ppn_nominal = 0;
    app_total_diskon = 0;
    $('input[name="nama_barang"]').val("");
    $('.btn-selesai').attr("disabled","disabled");
    $.ajax({
      url: '<?php echo base_url() ?>outlet/penjualan_retail/load_temp',
      type: 'post',
      data: 'id_member='+id_pembeli,
      success: function(data) {

        data_touch_ubah = data.data;

        var total_asli = data.total_asli*1;
        var diskon = data.diskon*1;
        var total = data.total*1;

        ibarang = 0;
        app_total = total;
        app_total_asli = total_asli;
        app_diskon = diskon;
        app_total_ppn = data.total_ppn*1;
        app_ppn_nominal = data.ppn_nominal*1;
        app_total_diskon = data.total_diskon_nominal*1;


        $("#panelTotal").html(app_total);
        $("#panelTotal2").html(app_total);
        $("#total").val(app_total);
        $("#total-display").html(tandaPemisahTitik(Math.round(app_total*1)));

        if (total_asli > 0 && id_pembeli!=null && diskon > 0) {
          $(".diskon_member").html("Diskon member "+diskon+"%");
          $(".total_asli").removeClass("hide");
          $(".total_asli_value").html(tandaPemisahTitik(Math.round(total_asli)));
        } else {
          $(".diskon_member").html("");
          $(".total_asli").addClass("hide");
          $(".total_asli_value").html("0");
        }
        var temp = data.data;
        var ongkos_kirim = $("#ongkos_kirim").val()*1;
        $(".total").html(tandaPemisahTitik(Math.round(total)+ongkos_kirim));
        $(".total_ppn").html(tandaPemisahTitik(Math.round(app_total_ppn)));
        $(".total_diskon_nominal").html(Math.round(app_total_diskon));
        var html = "";
        for (var item in temp) {
          ibarang++;
          var html_pil_harga = '<select class="pil_harga" data-id="'+temp[item].id_orders_temp+'" style="width:100%;border-width:0px;">';
          for (var item_p in pil_harga) {
            var selected = "";
            if (item_p==temp[item].pil_harga) {
              selected = "selected";
            }
            html_pil_harga += '<option value="'+item_p+'" '+selected+'>'+pil_harga[item_p]+'</option>';
          }
          html_pil_harga += '</select>';

          let classColor = "";
          if(item % 2 != 0){
            classColor = "odd";
          }

          html += '<tr class="'+classColor+' tr-touch-barang rowBarangT_'+temp[item].id_orders_temp+'" data-id="'+temp[item].id_orders_temp+'" data-index="'+(temp[item].no - 1)+'">\
                      <th class="center" rowspan="2">'+temp[item].no+'</th>\
                      <th>'+temp[item].nama_produk+'</th>\
                      <th class="text-center" style="padding:0px;"><input style="padding:6px;border-width:0px;outline:none;width:100%;" class="text-center jumlah" value="'+temp[item].jumlah+'" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'"></th>\
                      <th style="padding:0px;">'+html_pil_harga+'</th>\
                      <th rowspan="2" class="text-center" style="padding:0px;"><input style="padding:6px;border-width:0px;outline:none;width:100%;" class="text-center diskon" value="'+temp[item].diskon+'" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'"></th>\
                      <th rowspan="2" class="text-center" style="padding:0px;"><input style="padding:6px;border-width:0px;outline:none;width:100%;" class="text-center diskon2" value="'+temp[item].diskon2+'" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'"></th>\
                      <th rowspan="2" class="text-center" style="padding:0px;"><input style="padding:6px;border-width:0px;outline:none;width:100%;" class="text-center diskon3" value="'+temp[item].diskon3+'" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'"></th>\
                      <th rowspan="2" class="text-right">'+tandaPemisahTitik(Math.round(temp[item].sub_total*1))+'</th>\
                    </tr>\
                    <tr class="'+classColor+' tr-touch-barang rowBarangT_'+temp[item].id_orders_temp+'" data-id="'+temp[item].id_orders_temp+'" data-index="'+(temp[item].no - 1)+'">\
                      <th>'+temp[item].stok+'</th>\
                      <th class="text-center" style="padding:0px;"><input style="padding:6px;border-width:0px;outline:none;width:100%;" class="text-center jumlah_bonus" value="'+temp[item].jumlah_bonus+'" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'"></th>\
                      <th class="text-center" style="padding:0px;"><input style="padding:6px;border-width:0px;outline:none;width:100%;" class="text-center harga_jual_sat" value="'+numberWithCommas(temp[item].harga_jual)+'" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'"></th>\
                    </tr>';
        }
        $(".table-temp > tbody").html(html);
        if (ibarang > 0) {
          $('.btn-selesai').removeAttr("disabled");
        }
        $(".pil_harga").on('change', function(){
          var data_id = $(this).attr('data-id');
          var stok = $(this).attr('data-stok');
          var val = $(this).val();
          update('field=pil_harga&id_orders_temp='+data_id+'&value='+val);
        });
        $(".jumlah").on('change', function(){
          var data_id = $(this).attr('data-id');
          var stok = $(this).attr('data-stok');
          var val = $(this).val();
          var jumlah_bonus = $(".jumlah_bonus").val();
          var new_stok = val*1 + jumlah_bonus*1;
          if (new_stok <= stok) {
            update('field=jumlah&id_orders_temp='+data_id+'&value='+val);
          } else {
            alert("Stok tidak cukup!");
            loadTemp();
          }
        });
        $(".jumlah_bonus").on('change', function(){
          var data_id = $(this).attr('data-id');
          var stok = $(this).attr('data-stok');
          var val = $(this).val();
          var jumlah = $(".jumlah").val();
          var new_stok = val*1 + jumlah*1;
          if (new_stok <= stok) {
            update('field=jumlah_bonus&id_orders_temp='+data_id+'&value='+val);
          } else {
            alert("Stok tidak cukup!");
            loadTemp();
          }
        });
        $(".diskon").on('change', function(){
          var data_id = $(this).attr('data-id');
          var stok = $(this).attr('data-stok');
          var val = $(this).val();
          update('field=diskon&id_orders_temp='+data_id+'&value='+val);
        });
        $(".harga_jual_sat").on('keyup', function(){
          var val = jNumber($(this).val());
          $(this).val(numberWithCommas(val.toString()));
        });
        $(".harga_jual_sat").on('change', function(){
          var data_id = $(this).attr('data-id');
          var val = $(this).val();
          update('field=harga_jual&id_orders_temp='+data_id+'&value='+jNumber(val));
        });
        $(".diskon2").on('change', function(){
          var data_id = $(this).attr('data-id');
          var stok = $(this).attr('data-stok');
          var val = $(this).val();
          update('field=diskon2&id_orders_temp='+data_id+'&value='+val);
        });
        $(".diskon3").on('change', function(){
          var data_id = $(this).attr('data-id');
          var stok = $(this).attr('data-stok');
          var val = $(this).val();
          update('field=diskon3&id_orders_temp='+data_id+'&value='+val);
        });
        $(".btn-delete").on('click', function(){
          var data_id = $(this).attr('data-id');
          var stok = $(this).attr('data-stok');
          var val = $(this).val();
          $.ajax({
            url: '<?php echo base_url() ?>outlet/penjualan_retail/delete_orders_temp/'+data_id,
            type: 'post',
            success: function(){
              loadTemp();
            },
            error: function(){
              loadTemp();
            }
          });
        });

        addFuncTouchBarang(data.total);
      }
    });
  }

  function update(data) {
    $.ajax({
      url: '<?php echo base_url() ?>outlet/penjualan_retail/update_temp',
      type: 'post',
      data: data,
      success: function(response) {
        loadTemp();
      },
      error: function(){
        update(data);
      }
    });
  }

  // BUTTON TOUCH UBAH HAPUS //
  var touchBtn = function(total){
    if (total < 1) {
      $("#btn_touch_ubah").attr('data-id','');
      $("#btn_touch_hapus").attr('data-id','');
    }
    var data_id_ubah = $("#btn_touch_ubah").attr('data-id');
    if (data_id_ubah != "") {
      $("#btn_touch_ubah").removeAttr('disabled');
    } else {
      $("#btn_touch_ubah").attr('disabled','disabled');
    }
    var data_id_hapus = $("#btn_touch_hapus").attr('data-id');
    if (data_id_hapus != "") {
      $("#btn_touch_hapus").removeAttr('disabled');
    } else {
      $("#btn_touch_hapus").attr('disabled','disabled');
    }
  }

  // TOUCH BARANG ACTION //
  var addFuncTouchBarang = function(total){

    touchBtn(total);

    function touchbarangselected(el) {
      var data_id = el.attr('data-id');
      var data_index = el.attr('data-index');

      $("#btn_touch_ubah").attr('data-id', data_id);
      $("#btn_touch_ubah").attr('data-index', data_index);
      $("#btn_touch_hapus").attr('data-id', data_id);
      $("#table-temp tbody tr").css({'background-color':'white','border':'0px'});
      $('.rowBarangT_'+data_id).css({'background-color':'#90dcff','border':'1px solid #03a9f4'});
    }

    $(".tr-touch-barang").click(function(e){
      e.stopImmediatePropagation();
      touchbarangselected($(this));
      touchBtn(total);
      var id_orders_temp = $(this).attr('data-id');
      $('body').bind('keydown',function(e) {
        if(e.keyCode == 46){
          $.ajax({
              url: '<?php echo base_url() ?>outlet/penjualan_retail/delete_orders_temp/'+id_orders_temp,
              type: 'post',
              success: function() {
                  $('.rowBarangT_'+id_orders_temp).remove();
                  loadTemp();
              }
          });
        }
      });
    });

    $(".tr-touch-barang").dblclick(function(e){
      e.stopImmediatePropagation();
      touchbarangselected($(this));
      touchBtn(total);
      $("#btn_touch_ubah").click();
    });

    $("#btn_touch_ubah").click(function(e){
      e.stopImmediatePropagation();
      var index = $(this).attr('data-index');
      var data_id = $(this).attr('data-id');

      modalActionUbah(data_id,index);
    });

    var modalActionUbah = function(data_id,index){
      console.log(index)
      var dataubah = data_touch_ubah[index];
      $("#mdl_touch_ubah_nama").val(dataubah.nama_produk);
      $("#mdl_touch_ubah_kuantitas").val(dataubah.jumlah);
      $("#mdl_touch_ubah_harga").val(number_format(dataubah.harga*1,0,',','.'));
      $("#mdl_touch_ubah_pot_persen").val(dataubah.potongan_persen);
      $("#mdl_touch_ubah_pot").val(number_format(dataubah.potongan*1,0,',','.'));
      $("#mdl_touch_ubah_total").val(number_format(dataubah.total*1,0,',','.'));
      $("#myModal").modal('show');
      function hitung() {
        loadTemp();
      }
      $("#mdl_touch_ubah_kuantitas").on('change', function(e){
        e.stopImmediatePropagation();
        hitung();
      });
      $("#mdl_touch_ubah_pot_persen").on('change', function(e){
        e.stopImmediatePropagation();
        var pp = $(this).val().replace(/\./g,'')*1;
        var k = $("#mdl_touch_ubah_kuantitas").val()*1;
        var h = $("#mdl_touch_ubah_harga").val().replace(/\./g,'')*1;
        var pot = h*pp/100;
        var p = $("#mdl_touch_ubah_pot").val(number_format(pot,0,',','.'));
        hitung();
        loadTemp();
      });
      $("#mdl_touch_ubah_pot").on('change', function(e){
        e.stopImmediatePropagation();
        var p     = $(this).val().replace(/\./g,'')*1;
        var pp    = $('#mdl_touch_ubah_pot_persen').val();
        var k = $("#mdl_touch_ubah_kuantitas").val()*1;
        var h = $("#mdl_touch_ubah_harga").val().replace(/\./g,'')*1;
        var persen =  (p/h)*100;
        var pp = $("#mdl_touch_ubah_pot_persen").val(persen);
        $(this).val(number_format(p*1,0,',','.'));
        hitung();
        loadTemp();
      });
      $("#mdl_btn_submit").on('click', function(e){
        e.stopImmediatePropagation();
        var Kuantitas = $("#mdl_touch_ubah_kuantitas").val()*1;
        var pot_persen = $("#mdl_touch_ubah_pot_persen").val()*1;
        // var pot = $("#mdl_touch_ubah_pot").val().replace(/\./g,'')*1;
        var data_id = $('#btn_touch_ubah').attr('data-id');
        $.ajax({
            url: '<?php echo base_url() ?>outlet/penjualan_retail/update_temp',
            type: 'post',
            data: {"field":"jumlah",id_orders_temp:data_id,value:Kuantitas},
            success: function(response){
                $("#myModal").modal('hide');
                $('#btn_touch_ubah').removeAttr('data-id');
                $('#btn_touch_hapus').removeAttr('data-id');
                loadTemp();
            }
        });
      });
    }

    $("#btn_touch_hapus").click(function(e){
      e.stopImmediatePropagation();
      var data_id = $(this).attr('data-id');
      $.ajax({
          url: '<?php echo base_url() ?>outlet/penjualan_retail/delete_orders_temp/'+data_id,
          type: 'post',
          success: function() {
              $('.rowBarangT_'+data_id).remove();
              loadTemp();
          }
      });
    });
  }
</script>