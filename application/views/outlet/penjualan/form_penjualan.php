    <style>
    .sidebar {
        display:none;
    }
      ::-webkit-scrollbar {
          width: 0px;
          height: 0px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
          background: transparent; 
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
          background: transparent; 
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
          background: transparent; 
      }
      .d-none {
        display:none;
      }
      .d-block {
        display:block!important;
      }
      html {
        max-width: 100vw!important;
        max-height: 100vh!important;
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
          padding: 5px;
          width: 25px;
          height: 30px;
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
        @media screen and (min-height: 768px){
          .btn-nav {
              padding: 10px;
              width: 50px;
              height: 35px;
          }
        }
        @media screen and (min-height:500px) and (max-height: 765px){
            .harga-display {
                height:120px!important;
            }
            .logo {
                height:120px!important;
                padding:5px;
            }
            .product-list {
                min-height: 300px!important; 
                max-height: 300px!important; 
            }
            .table-info {
                margin-top:0px;
                height: 160px!important;
            }
            .btn-nav {
                width: auto;
                height: 40px;
            }
            #kat_product_touch {
                border-right: 2px solid #f6feff;
                height: 280px;
                overflow-y: scroll;
            }
            #dat_product_touch {
                min-height: auto!important;
                max-height: 300px!important;
            }
            .mobile-scroll {
              height: 280px!important;
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
        .p-0 {
          padding:0px;
        }
        .pR-0 {
          padding-right: 0px!important;
          padding-bottom:10px;
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
        @media only screen and (max-width:460px){
          .mobile-none {
            display: none;
          }
          .display-total {
            width: 100%!important;
          }
        }
        @media only screen and (max-width: 600px){
          .mobile-scroll {
            height: auto!important;
          }
          .utablet-none {
            display: none;
          }
          .logo {
            padding: 6px;
            height: 100px;
          }
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
          .xsaller-90 {
            display: none;
          }
          .table-info {
            margin-top: 0px;
            padding:0px 10px;
            height: 37vh!important;
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
        @media only screen and (min-width: 1024px){
          .lg-wrap {
            padding: 0px!important;
          }
        }
        @media only screen and (min-height: 800px) and (max-width: 600px){
          .table-info {
            height: 58vh!important;
          }
          .button-add {
            height: auto!important;
            width: auto!important;
            border-radius: 30px!important;
            padding: 10px!important;
          }
        }
        .button-add {
          height: 70px;
          width: 70px;
          border-radius: 100%;
          text-align: center;
          padding-top: 15px;
          position: fixed;
          background-color: white;
          color: #35b3ea;
          bottom: 12vh;
          right: 20px;
          z-index: 99;
          box-shadow: 0 0 1px #6b6666;
          font-size:25px;
        }
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
        top: 0px;
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
        position: sticky;
        bottom: 10px;
        margin-left: 75vw;
        height: 40px;
      }
      .mdl-footer {
        background-color: white!important;
        position: relative;
        border-top: 2px solid white!important;
        height: 60px;
      }
      .uno {
        width: 100%;
      }
      .table-info thead th:first-child {
          border-radius: 3px 0 0 0!important;
      }
      .table-info thead th:last-child {
          border-radius: 0 3px 0 0!important;
      }
      .table-info tbody tr:last-child td:first-child {
        border-radius: 0 0 0 3px!important;
      }
      .table-info tbody tr:last-child td:last-child {
        border-radius: 0 0 3px 0!important;
      }
      #t thead th{
        background: linear-gradient(to bottom , #9CEDFF, #5DBFDC);
        color: black;
      }
      #t tbody tr{
        color:black;
        font-weight: bold;
        cursor: pointer;
      }
      .main-content, body, html {
        min-height: 100%;
        overflow: auto!important;
      }
      .input-2 {
         height:35px!important;
      }
      .m-switch {
        display: none;
      }
      .m-switch-mg {
        margin-top: -30px;
      }
      .ui-autocomplete {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        list-style: none;
        font-size: 14px;
        text-align: left;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        background-clip: padding-box;
      }

      .ui-autocomplete > li > div {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: normal;
        line-height: 1.42857143;
        color: #333333;
        white-space: nowrap;
      }

      .ui-state-hover,
      .ui-state-active,
      .ui-state-focus {
        text-decoration: none;
        color: #262626;
        background-color: #f5f5f5;
        cursor: pointer;
      }

      .ui-helper-hidden-accessible {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
      }
    </style>
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/select2.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.numpad.css');?>">
    <div class="main-content">
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
        </div><!-- /.nav-search -->
      </div>
      <div class="page-content" id="fullscreen">
        <div class="page-header">
          <h1>
            Penjualan Retail
          </h1>
        </div><!-- /.page-header -->
        <span class="pull-right">
          <label class="pull-right inline">
            <small class="muted smaller-90">Touchscreen :</small>
            <input type="checkbox" class="ace ace-switch ace-switch-5" id="touchToggle" />
            <span class="lbl middle"></span>
          </label>
        </span><!-- /.col -->
        <div class="row" id="keyboard">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
              <div class="col-md-8">
                <div class="row">
                  <div class="col-xs-4">
                    <div class="form-group">
                      <label for="varchar"><b>Tgl Order</b> <?php echo form_error('tgl_order') ?></label>
                      <input type="text" name="tgl" class="form-control input-2" id="tampil_tgl_order" placeholder="Tgl Order" value="<?php echo $tgl_order; ?>" readonly />
                    </div>
                  </div>
                  <div class="col-xs-4" style="padding-left:0px;">
                    <div class="form-group">
                      <label for="varchar"><b>No Faktur</b> <?php echo form_error('no_faktur') ?></label>
                      <input type="text" class="form-control input-2" id="tampil_no_faktur" placeholder="No Faktur" value="<?php echo $no_faktur; ?>" readonly />
                    </div>
                  </div>
                  <div class="col-xs-3" style="padding-left:0px;">
                    <div class="form-group m-switch">
                      <?php 
                      $class_sales = '';
                      $disabled_sales = '';
                      if (!empty($id_sales)) {
                        $class_sales = '';
                        $disabled_sales = ' disabled';
                      }
                      ?>
                      <label for="varchar">&nbsp;</label>
                      <select name="id_sales" class="input-2 id_sales <?php echo $class_sales ?>" style="width:100%;" <?php echo $disabled_sales ?>>
                        <option value="">-- Pilih Sales --</option>
                        <?php foreach ($data_sales as $key_s) : ?>
                        <option value="<?php echo $key_s->id_users ?>" <?php echo $key_s->id_users==$id_sales?"selected":"" ?>><?php echo $key_s->first_name ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-1">
                    <div class="form-group">
                      <label style="margin-top:30px;">
                        <input name="switch-menu" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" />
                        <span class="lbl"></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row m-switch">
                  <div class="col-xs-2">
                    <div class="form-group">
                      <select class="status_member input-2" style="width:100%;">
                        <option value="1">BUKAN MEMBER</option>
                        <option value="2">MEMBER</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-3" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control nama_pembeli input-2" autocomplete="off" value="<?php echo $nama_pembeli ?>" placeholder="Nama Pembeli"/>
                    </div>
                  </div>
                  <div class="col-xs-3" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control alamat_pembeli input-2" autocomplete="off" value="<?php echo $alamat_pembeli ?>" placeholder="Alamat Pembeli"/>
                    </div>
                  </div>
                  <div class="col-xs-3" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control no_hp input-2" autocomplete="off" value="" placeholder="No HP"/>
                    </div>
                  </div>
                  <!-- <div class="col-xs-2" style="padding-left:0px;padding-top:8px">
                    <div class="form-group">
                      <label style="margin-top:-10px;">
                        <input name="wa" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" id="wa" />
                        <span class="lbl"> Kirim WA</span>
                      </label>
                    </div>
                   
                  </div> -->
                  
                </div>
              </div>
              <div class="col-md-4" >


                <div class="form-group" style="margin-top:28px;">
                  <h3 style="color:red;font-weight:50;"><b>GRAND TOTAL</b></h3>
                  <h4 class="total_asli hide" style="color:black;font-weight:bold;font-family:sans-serif;margin-bottom:0px;"><span class="diskon_member">10%</span> <span style="float:right;text-decoration:line-through;"><span class="total_asli total_asli_value" style="text-decoration:line-through;">0</span>,- </span></h4>
                  <h2 style="color:black;font-weight:bold;font-family:impact;margin-top:0px;">&nbsp;<span style="float:right;"><span class="total">0</span>,- </span></h2>
                  <!-- <h2 style="color:black;font-weight:bold;font-family:impact;margin-top:0px;">&nbsp;<span style="float:right;"><span>PPN 10 %</span></span></h2>
                  <h1 style="color:black;font-weight:bold;font-family:impact;margin-top:0px;">Rp <span style="float:right;"><span class="total_ppn">0</span>,- </span></h1> -->
                </div>
              </div>
              <div class="col-md-12 m-switch-mg switch-dropship" style="display:none;">
                <div class="row m-switch">
                  <div class="col-md-2">
                    <div class="form-group">
                      <input type="text" class="form-control input-2" id="p_nama" placeholder="Nama Pengirim" style="border-color: #0a0;" />
	          	      </div>
	          	    </div>
                  <div class="col-md-2" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control input-2" id="p_alamat" placeholder="Alamat Pengirim" style="border-color: #0a0;" />
	          	      </div>
	          	    </div>
                  <div class="col-md-2" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control input-2" id="p_hp" placeholder="No HP Pengirim" style="border-color: #0a0;" />
	          	      </div>
	          	    </div>
          	    </div>
                <div class="row m-switch">
                  <div class="col-md-2">
                    <div class="form-group">
                      <input type="text" class="form-control input-2" id="d_nama" placeholder="Nama Tujuan" style="border-color: #00a;" />
	          	      </div>
	          	    </div>
                  <div class="col-md-2" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control input-2" id="d_alamat" placeholder="Alamat Tujuan" style="border-color: #00a;" />
	          	      </div>
	          	    </div>
                  <div class="col-md-2" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control input-2" id="d_hp" placeholder="No HP Tujuan" style="border-color: #00a;" />
	          	      </div>
	          	    </div>
          	    </div>
                <hr>
          	  </div>
              <div class="col-md-12 m-switch-mg">
                <div class="row m-switch">
                  <div class="col-md-2">
                    <div class="form-group">
                      <select class="pembayaran input-2" style="width:100%;">
                        <option value="1">TUNAI</option>
                        <option value="2">KREDIT</option>
                        <option value="3">TRANSFER</option>
                        <option value="4">SPLIT PEMBAYARAN</option>
                      </select>
                    </div>
                  </div>

                  <!-- <div class="col-md-2 ">
                    <div class="form-group">
                      <input type="text" class="form-control input2" placeholder="Nominal">
                    </div>
                  </div> -->
                  <!-- <div class="col-md-2">
                    <div class="form-group">
                      <input type="text" name="" id="nominal_split" class="form-control nominalSplit input-2" placeholder="Nominal">
                    </div>
                  </div> -->
                  <div class="col-md-2 panelDeadline hide" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control deadline input-2" placeholder="Hari" maxlength="11" />
                    </div>
                  </div>
                  <div class="col-md-1 panelMedia d-none" style="padding-left:0px;">
                    <div class="form-group">
                      <select name="id_media" class="id_media input-2" placeholder="Media" style="width:100%;">
                        <option value="">-- Pilih Media --</option>
                      <?php foreach ($data_media as $key_m): ?>
                        <option value="<?php echo $key_m->id ?>" <?php echo $key_m->id==$id_media?"selected":"" ?>><?php echo $key_m->media ?></option>
                      <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 panelPembayaranLainnya hide d-none" style="padding-left:0px;">
                    <div class="form-group ">
                      <select name="akun_transfer" id="akun_transfer" class="" style="width:100%;">
                        <?php  foreach ($data_akun_transfer as $key): ?>
                        <option value="<?php  echo $key->kode ?>"><?php  echo $key->akun ?></option>
                        <?php  endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 panelCOD hide d-none" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control biayacod input-2 text-right numbering" placeholder="Biaya COD" maxlength="11" />
                    </div>
                  </div>
                  <div class="col-md-2 panelPembayaranLainnya hide" style="padding-left:0px;">
                    <div class="form-group">
                      <select name="id_bank" id="id_bank" class=" input-2" style="width:100%;">
                        <option value="">-- Pilih Bank --</option>
                        <?php foreach ($data_bank as $key_b): ?>
                        <option value="<?php echo $key_b->id ?>"><?php echo $key_b->bank ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 panelPembayaranLainnya hide" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" name="nominal_transfer" class="form-control text-right numbering input-2 nominal_transfer" placeholder="Nominal Transfer" autocomplete="off" />
                    </div>
                  </div>
                  <div class="col-md-1 d-none" style="padding-left:0px;">
                    <div class="form-group ">
                      <select name="id_expedisi" class="input-2 id_expedisi" style="width:100%;">
                        <option value="">-- Pilih Ekspedisi --</option>
                        <?php foreach ($data_expedisi as $key_e): ?>
                        <option value="<?php echo $key_e->id ?>"><?php echo $key_e->nama_expedisi ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <!-- split -->
                  <div class="col-md-2 panelSplit hide" style="padding-left:0px;">
                    <div class="form-group">
                     
                      <input type="text" name="nominal_split1" id="split_nominal" class="form-control nominal-split input-2 nominal-split1 numbering" placeholder="Nominal"  />
                    </div>
                 
                  </div>
                  <div class="col-md-2 panelSplit hide" style="padding-left:0px;">
                    <div class="form-group">
                      <select name="id_split_bayar" id="split_id" class="split input-2" style="width:100%;">
                        <option value="1">TUNAI</option>
                        <option value="2">KREDIT</option>
                        <option value="3">TRANSFER</option>
                      </select>
                    </div>  
                    <div class="form-group d-none">
                      <input type="text" name="no_resi" class="form-control input-2 no_resi" placeholder="No Resi" autocomplete="off" />
                    </div>
                  </div>





                  <div class="col-md-2 panelSplitDeadline hide"   style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control deadline input-2 deadline_split" placeholder="Hari ini" maxlength="11" />
                    </div>
                  </div>
                  <div class="col-md-2 panelSplit nominal-split2 hide">
                    <div class="form-group">
                     
                      <input type="text" name="nominal_split2" id="split_nominal" class="form-control input-2 nominal_split_2 numbering hide nominal-split2-form" placeholder="Nominal" value="0" readonly/>
                    </div>
                  </div>


                  <div class="col-md-2 panelSplitPembayaranLainnya hide" style="padding-left:0px;">
                    <div class="form-group">
                      <select name="id_bank_split" id="id_bank" class="bank_split input-2 id_bank_split" style="width:100%;">
                        <?php foreach ($data_bank as $key_b): ?>
                        <option value="<?php echo $key_b->id ?>"><?php echo $key_b->bank ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                

                  <div class="col-md-2 panelSplitPembayaranLainnya hide" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" name="nominal_split2" class="form-control text-right numbering input-2 nominal_split_2 " placeholder="Nominal Transfer" autocomplete="off" readonly/>
                    </div>
                  </div>
                  <!-- /split -->
                  <div class="col-md-2 d-none" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" name="ongkir" class="form-control text-right input-2 numbering ongkir" placeholder="Ongkir" autocomplete="off" />
                    </div>
                  </div>
                </div>
              
                <div class="row panelPembayaranLainnya hide">
                  <div class="col-md-3 d-none">
                    <div class="form-group">
                      <input type="hidden" name="nominal_tunai" id="nominal_tunai" class="form-control text-right numbering" placeholder="Nominal Tunai" />
                    </div>
                  </div>
                  <div class="col-md-3 d-none" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" name="nominal_hutang" id="nominal_hutang" class="form-control text-right numbering" placeholder="Nominal Hutang" readonly />
                    </div>
                  </div>
                  <div class="col-md-1 d-none" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control deadline2" placeholder="Hari" value="30" maxlength="11" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <select class="status_barcode" style="width:100%;">
                        <option value="1">BARCODE</option>
                        <option value="2" selected>NAMA BARANG</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6" style="padding-left:0px;">
                    <div class="form-group">
                      <form action="#" class="form_barang" method="post">
                        <input type="text" class="form-control nama_barang" name="nama_barang" placeholder="Barcode IMEI / Nama Barang" autocomplete="off" autofocus />
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <table id="t" class="table table-striped table-bordered table-hover table-temp">
                  <thead>
                    <tr>
                      <th class="center" width="2">No</th>
                      <th>Nama Barang</th>
                      <th width="40">Stok</th>
                      <th width="100">Pilihan Harga</th>
                      <th class="text-center" width="90">Qty</th>
                      <th class="text-center" width="90">Qty Bonus</th>
                      <th class="text-center" width="100">H. Sat</th>
                      <th class="text-center" width="80">Disk 1 (%)</th>
                      <th class="text-center" width="80">Disk 2 (%)</th>
                      <th class="text-center" width="80">Disk 3 (%)</th>
                      <th class="text-center" width="100">Sub Total</th>
                      <th class="text-center" width="100">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <div class="row">
                  <div class="col-xs-6">
                    <button type="button" class="btn btn-block btn-lg btn-primary btn-selesai" disabled>Selesai</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- PAGE CONTENT ENDS -->
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Touchscreen -->
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
            /*Css tablet view */
            @media only screen and (max-width:1280px){
              .img-list {
                width:92px!important;
                height: 92px!important;
              }
            }
        </style>
        <div class="row d-none" id="touchscreen">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-md-2 logo mobile-none"><img src="<?php echo base_url('assets/images/logo-lingkaran.png');?>" alt="" style="height:100px"></div>
              <div class="col-md-10 col-xs-12">
                <div class="harga-display">
                  <span style="color:white;font-weight:bold">TOTAL</span>
                  <span class="pull-right" id="total-display" style="font-size:70px;font-weight:bold;color:white">
                    <span class="total">0</span>
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
                          <span class="btn btn-primary btn-round btn-xs w-98" data-toggle="modal" data-target="#myModal2" style="padding:4px;">
                              <label class="pull-right inline">
                                <xsall class="muted xsaller-90">Tambah Detail Penjualan <i class="fa fa-angle-double-down"></i></xsall>
                                <!-- <input type="checkbox" class="ace ace-switch ace-switch-5" id="memberToggle" /> -->
                                <span class="lbl middle member"></span>
                              </label>
                              <input type="hidden" id="member_status">
                          </span>
                        </div>
                        <!-- <div class="form-group col-xs-4 p-0" style="margin-bottom:0px">
                          <div class="default_pembeli" id="default_pembeli">
                          <input type="text" class="form-control btn-round w-98 pembeli" id="nama_pembeli" placeholder="Nama pembeli">
                          <div id="statPembeli" class="statPembeli"></div>
                          </div>
                        </div> -->
                        <div class="form-group col-xs-4 p-0" style="margin-bottom:0px">
                          <div style="margin-left: 9px;margin-top: 9px;">
                          PENJUALAN TUNAI | DEFAULT
                          </div>
                        </div>
                        <!-- <div class="form-group col-xs-4 p-0" style="margin-bottom:0px">
                          <div class="default_pembayaran" id="default_pembayaran">
                          <select class="form-control btn-round w-98 pembayaran" id="pembayaran" tabindex="4" />
                            <option value="1">TUNAI</option>
                          </select>
                          </div>
                        </div> -->
                        <div class="form-group col-xs-4 p-0 pull-right" style="margin-bottom:0px">
                          <div id="panelDeadline" class="form-group btn-round w-98 panelDeadline" style="display:none;" class="mT-10">
                            <div class="input-icon">
                              <input type="text" class="form-control btn-round w-98 deadline" id="deadline" placeholder="Hari" value="" tabindex="5" maxlength="11" />
                              <i class="ace-icon fa fa-calendar red"></i>
                            </div>
                          </div>
                        </div>
                        <!--
                        <div class="col-xs-4">
                            <div class="form-group">
                                <?php echo form_error('pembeli') ?>
                                <div class="default_pembeli" id="default_pembeli">
                                <input type="text" class="form-control pembeli" id="pembeli" placeholder="Nama Pembeli" value="<?php echo $pembeli; ?>" tabindex="3" />
                                <div id="statPembeli" class="statPembeli"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <?php echo form_error('pembayaran') ?>
                                <div class="default_pembayaran" id="default_pembayaran">
                                <select class="form-control pembayaran" id="pembayaran" tabindex="4" />
                                  <option value="1">TUNAI</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div id="panelDeadline" class="form-group panelDeadline" style="display:none;">
                                <div class="input-icon">
                                  <input type="text" class="form-control deadline" id="deadline" placeholder="Hari" value="" tabindex="5" maxlength="11" />
                                  <i class="ace-icon fa fa-calendar red"></i>
                                </div>
                            </div>
                        </div>-->
                      </form>
                    </div>
                    <script>
                    </script>
                    <div class="col-xs-12 desktop-none">
                        <button type="button" class="btn btn-primary btn-produk no-border show-mobile" data-toggle="modal" data-target="#modalProduk" data-id="" id="toggleProduk"><i class="fa fa-plus"></i> Produk</button>
                    </div>
                    <div class="row table-info" style="height:400px;overflow-y:scroll;margin-bottom: 10px;">
                      <style>
                        #dynamic-table2 thead th{
                          background: linear-gradient(to bottom , #9CEDFF, #5DBFDC);
                          color:black;
                        }
                        #dynamic-table2 tbody tr{
                          color:black;
                          font-weight: bold;
                          cursor: pointer;
                        }
                      </style>
                      <form id="formTouchBarang">
                      <div class="panel panel-body p-0 border-blue" style="margin-bottom:0px" id="tableTemp">
                        <table id='dynamic-table2' class='table table-striped table-bordered table-hover'>
                          <thead>
                            <th>KETERANGAN</th>
                            <th class='text-right'>KTS</th>
                            <th class='text-right'>@HARGA</th>
                            <th class='text-right'>TOTAL</th>
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
                          <button type="button" id="id-btn-dialog3" class="id-btn-dialog3 btn-block btn btn-primary btn-round no-border ">Selesai</button>
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
                              <div class="form-group">
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
                              </div>
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

        
        <div id="myModal2" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" style="border-radius:30px">
              <div class="modal-header modal-round">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Perubahan Detail Penjualan</h4>
              </div>
              <div class="modal-body">
              
                <div class="row">
                  <div class="col-xs-3">
                    <div class="form-group">
                      <select name="id_sales" class="input-2 id_sales <?php echo $class_sales ?>" style="width:100%;" <?php echo $disabled_sales ?>>
                        <option value="">-- Pilih Sales --</option>
                        <?php foreach ($data_sales as $key_s) : ?>
                        <option value="<?php echo $key_s->id_users ?>" <?php echo $key_s->id_users==$id_sales?"selected":"" ?>><?php echo $key_s->first_name ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-3" style="padding-left:0px;">
                    <div class="form-group">
                      <select class="status_member input-2" style="width:100%;">
                          <option value="1">BUKAN MEMBER</option>
                          <option value="2">MEMBER</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-3" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control nama_pembeli2 input-2" id="nama_pembeli2" autocomplete="off" value="<?php echo $nama_pembeli ?>" placeholder="Nama Pembeli"/>
                    </div>
                  </div>
                  <div class="col-xs-3" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control alamat_pembeli input-2" autocomplete="off" value="<?php echo $alamat_pembeli ?>" placeholder="Alamat Pembeli"/>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <select class="pembayaran input-2" style="width:100%;">
                        <option value="1">TUNAI</option>
                        <option value="2">KREDIT</option>
                        <option value="3">TRANSFER</option>
                        <option value="4">SPLIT PEMBAYARAN</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 panelDeadline hide" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control deadline input-2" placeholder="Hari" maxlength="11" />
                    </div>
                  </div>
                  <div class="col-md-1 panelMedia d-none" style="padding-left:0px;">
                    <div class="form-group">
                      <select name="id_media" class="id_media input-2" placeholder="Media" style="width:100%;">
                        <option value="">-- Pilih Media --</option>
                      <?php foreach ($data_media as $key_m): ?>
                        <option value="<?php echo $key_m->id ?>" <?php echo $key_m->id==$id_media?"selected":"" ?>><?php echo $key_m->media ?></option>
                      <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 panelCOD hide d-none" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control biayacod input-2 text-right numbering" placeholder="Biaya COD" maxlength="11" />
                    </div>
                  </div>
                  <div class="col-md-2 panelPembayaranLainnya hide" style="padding-left:0px;">
                    <div class="form-group">
                      <select name="id_bank" id="id_bank" class=" input-2" style="width:100%;">
                        <option value="">-- Pilih Bank --</option>
                        <?php foreach ($data_bank as $key_b): ?>
                        <option value="<?php echo $key_b->id ?>"><?php echo $key_b->bank ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 panelPembayaranLainnya hide" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" name="nominal_transfer" class="form-control nominal_transfer text-right numbering input-2" placeholder="Nominal Transfer" autocomplete="off" />
                    </div>
                  </div>


                  <!-- split -->
               <!-- split -->
               <div class="col-md-2 panelSplit hide" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" name="nominal_split1" id="split_nominal_m" class="form-control nominal-split input-2 nominal-split1 nominal_split1 nominal-split-m numbering" placeholder="Nominal"  />
                    </div>
                 
                  </div>
                <div class="col-md-2 panelSplit hide" style="padding-left:0px;">
                <div class="form-group">
                  <select name="" id="" class="split input-2" style="width:100%;">
                    <option value="1">TUNAI</option>
                    <option value="2">KREDIT</option>
                    <option value="3">TRANSFER</option>
                  </select>
                </div>  
                <div class="form-group d-none">
                  <input type="text" name="no_resi" class="form-control input-2 no_resi" placeholder="No Resi" autocomplete="off" />
                </div>
                </div>



                <div class="col-md-2 panelSplitDeadline hide"   style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" class="form-control deadline input-2 deadline_split" placeholder="Hari ini" maxlength="11" />
                    </div>
                  </div>
                  <div class="col-md-2 panelSplit nominal-split2 hide">
                    <div class="form-group">
                      <input type="text" name="nominal_split2" id="split2_nominal_m" class="form-control input-2 nominal_split_2 number hide nominal-split2-form" placeholder="Nominal" readonly/>
                    </div>
                  </div>

                  <div class="col-md-2 panelSplitPembayaranLainnya hide" style="padding-left:0px;">
                    <div class="form-group">
                      <select name="id_bank_split" id="id_bank" class="bank_split input-2 id_bank_split" style="width:100%;">
                        <?php foreach ($data_bank as $key_b): ?>
                        <option value="<?php echo $key_b->id ?>"><?php echo $key_b->bank ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                

                  <div class="col-md-2 panelSplitPembayaranLainnya hide" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" name="nominal_split2" id="split3_nominal_m" class="form-control input-2 nominal_split_2 number hide nominal-split2-form" placeholder="Nominal Transfer" autocomplete="off" readonly/>
                    </div>
                  </div>
                  <!-- /split -->

                  <div class="col-md-1 d-none" style="padding-left:0px;">
                    <div class="form-group">
                      <select name="id_expedisi" class="input-2 id_expedisi" style="width:100%;">
                        <option value="">-- Pilih Ekspedisi --</option>
                        <?php foreach ($data_expedisi as $key_e): ?>
                        <option value="<?php //echo $key_e->id ?>"><?php //echo $key_e->nama_expedisi ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 d-none" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" name="no_resi" class="form-control input-2 no_resi" placeholder="No Resi" autocomplete="off" />
                    </div>
                  </div>
                  <div class="col-md-2 d-none" style="padding-left:0px;">
                    <div class="form-group">
                      <input type="text" name="ongkir" class="form-control text-right input-2 numbering ongkir" placeholder="Ongkir" autocomplete="off" />
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div><!-- /.page-content -->
    </div><!-- /.main-content -->
    </div>
    
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
<style>
.popup {
  z-index: 100000;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(255, 255, 255, .4);
  display: none;
}
.popup > .popup-body {
  margin: 100px auto auto auto;
  padding: 8px 15px 8px 15px;
  background: rgba(255, 255, 255, .9);
  box-shadow: 0px 0px 1px 0px #333;
  font-size: 20px;
  font-family: sans-serif;
  font-weight: bold;
  min-width: 100px;
  max-width: 200px;
  text-align: center;
  border-radius: 5px;
}
</style>
<div class="popup">
  <div class="popup-body">
  </div>
</div>

<script src="<?php echo base_url('assets/js/jquery.numpad.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.event.swipe.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.hotkeys.js');?>"></script>
<script type="text/javascript">
var pil_harga = [
  "-- Pilih Harga --", 
  "Harga Jual", 
  "Harga Grosir", 
  "Harga Member", 
  // "Harga 4", 
  // "Harga 5", 
  // "Harga 6"
];

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
  var fs = function() {
    var docElm = document.documentElement;
    if (docElm.requestFullscreen) {
      docElm.requestFullscreen();
    } else if (docElm.mozRequestFullScreen) {
      docElm.mozRequestFullScreen();
    } else if (docElm.webkitRequestFullScreen) {
      docElm.webkitRequestFullScreen();
    } else if (docElm.msRequestFullscreen) {
      docElm.msRequestFullscreen();
    }
  }
  $("body").click(function() {
    // fs();
  });
  $(document).on('change, keyup',function() {
    // fs();
  });
  $("body").hide();
  $("#navbar").remove();
  $("#sidebar").remove();
  $(".page-header").remove();
  $(".footer").remove();
  $("div").removeClass('main-container');
  $("div").removeClass('main-content');
  $(".aside-trigger").click();
  $(".m-switch").hide();
  $(".m-switch-mg").css({'margin-top': '-30px'});

  // numpad
  $.fn.numpad.defaults.gridTpl = '<table class="table modal-content"></table>';
  $.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in"></div>';
  $.fn.numpad.defaults.displayTpl = '<input type="text" class="form-control" />';
  $.fn.numpad.defaults.buttonNumberTpl =  '<button type="button" class="btn btn-primary"></button>';
  $.fn.numpad.defaults.buttonFunctionTpl = '<button type="button" class="btn" style="width: 100%;"></button>';
  $.fn.numpad.defaults.onKeypadCreate = function() {$(this).find('.done').addClass('btn-primary');};

  var id_pembeli = null;
  var pembayaran = 1;
  var ibarang = 0;
  var app_total_ppn = 0;
  var app_total_diskon = 0;
  var app_ppn_nominal = 0;
  var app_total = 0;
  var app_total_asli = 0;
  var app_diskon = 0;

  var toggle = $('#touchToggle');
  toggle.change(function() {
    $('#keyboard').toggleClass('d-none');
    $('.page-content').toggleClass('bgc-blue');
    $('#touchscreen').toggleClass('d-block');
    if ($(this).is(':checked')) {
      pembayaran = 1;
      $('.pembayaran option[value="1"]').prop('selected', true);
      pilPembayaran();
    }
  });






  $('input[name="switch-menu"]').on('click', function() {
    var check = $(this).is(':checked');
    if (check) {
      $(".m-switch").show();
      $(".m-switch-mg").css({'margin-top': '0px'});
    } else {
      pembayaran = 1;
      $('.pembayaran option[value="1"]').prop('selected', true);
      pilPembayaran();
      $(".m-switch").hide();
      $(".m-switch-mg").css({'margin-top': '-30px'});
    }
  });


// kirim wa
$('input[name="wa_kirim"]').on('click', function() {
    var check = $(this).is(':checked');
    // var check =$('input[name="wa_kirim"]').val();
    $("#waToggle").val( check);


    
    // alert(check);


    // if (check) {
    //   $(".m-switch").show();
    //   $(".m-switch-mg").css({'margin-top': '0px'});
    // } else {
    //   pembayaran = 1;
    //   $('.pembayaran option[value="1"]').prop('selected', true);
    //   pilPembayaran();
    //   $(".m-switch").hide();
    //   $(".m-switch-mg").css({'margin-top': '-30px'});
    // }
  });
// /kirim wa



  pembayaran = 1;
  $('.pembayaran option[value="1"]').prop('selected', true);
  pilPembayaran();

  statusMember(1);
  $(".status_member").on('change', function() {
    var val = $(this).val();
    // $(".status_member").find(":selected").val();
    $('.status_member option[value="'+val+'"]').prop("selected", true);
    statusMember(val);
  });
  
  function toggleDropship() {
  	var chk = $("#dropship").is(":checked");
  	if (chk) {
  		$(".switch-dropship").show();
		$("#d_nama").focus();
  	} else {
  		$(".switch-dropship").hide();
		$("#d_nama").val('');
		$("#d_alamat").val('');
		$("#d_hp").val('');
  	}
  }
  $("#dropship").on("change", function(){
  	toggleDropship();
  });
  toggleDropship();
  
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
    $("#dropship").prop("checked", false);
    toggleDropship();
    pilPembayaran();
    statusBarcode();
    loadTemp();
  }

  $(".numbering").on("keyup", function() {
    var val = jNumber($(this).val());
    $(this).val(numberWithCommas(val.toString()));
  });

  $('.id_sales').on("change", function() {
    var val = $(this).val();
    $('.id_sales option[value="'+val+'"]').prop('selected', true);
    // $('.id_sales').select2().trigger('change');
    // $('.pembayaran option[value="'+val+'"]').prop('selected', true);
  });
  $(".pembayaran").on("change", function() {
    var val = $(this).val();
   
    $('.pembayaran option[value="'+val+'"]').prop('selected', true);
  });

  $(".split").on("change", function() {
    var val = $(this).val();
   
    $('.split option[value="'+val+'"]').prop('selected', true);
  });

  $(".deadline").on("keyup", function() {
    var val = $(this).val();
    $(".deadline").val(val);
  });
  $(".id_media").on("change", function() {
    var val = $(this).val();
    $('.id_media option[value="'+val+'"]').prop('selected', true);
  });
  $(".nominal_transfer").on("keyup", function() {
    var val = $(this).val();
    $(".nominal_transfer").val(val);
  });
  $(".id_expedisi").on("change", function() {
    var val = $(this).val();
    $('.id_expedisi option[value="'+val+'"]').prop('selected', true);
  });
  $(".no_resi").on("keyup", function() {
    var val = $(this).val();
    $(".no_resi").val(val);
  });
  $(".ongkir").on("keyup", function() {
    var val = $(this).val();
    var ongkir = jNumber(val)*1;
    var ltotal = Math.round(app_total+ongkir);
    $(".total").html(numberWithCommas(ltotal));
    $('.nominal_transfer').val(ltotal);
    $(".ongkir").val(val);
  });

  function toggleCOD() {
    $('#id_bank option[value=""]').prop('selected', true);
    $('.id_expedisi option[value=""]').prop('selected', true);
    $(".no_resi").val('');
    $(".biayacod").val('');
    var val = $(".id_media").val();
    if (val == "4") {
      $(".panelCOD").removeClass("hide");
    } else {
      $(".panelCOD").addClass("hide");
    }
    return val;
  }
  $(".id_media").on("change", function(){
    // $(".id_media").val('');
    var val = toggleCOD();
    if (val == "1") {
      pembayaran = 3;
      $(".pembayaran").val('3');
      pilPembayaran();
    } else if (val == "4") {
      // pembayaran = 2;
      // $(".pembayaran").val('2');
      // pilPembayaran();
    }
  });
  $(".id_media").trigger("change");

  function statusMember(status_member) {
    id_pembeli = null;
    $(".nama_pembeli").val("<?php echo $nama_pembeli ?>");
    $(".nama_pembeli").removeAttr("readonly");
    $(".nama_pembeli2").val("<?php echo $nama_pembeli ?>");
    $(".nama_pembeli2").removeAttr("readonly");
    $(".alamat_pembeli").val("<?php echo $alamat_pembeli ?>");
    $(".no_hp").val("");
    $(".panelPembayaran").addClass("hide");
    $(".panelSales").addClass("hide");
    $(".panelSales select").html('<option value="">-- Pilih Sales --</option>');
    $(".pembayaran").val('<?php echo $pembayaran ?>');
    pilPembayaran();
    loadTemp();
    var var_data_pembeli = [];
    if (status_member=="1") { // BUKAN MEMBER
      $(".no_hp").removeAttr("readonly");
      $(".alamat_pembeli").removeAttr("readonly");
      $("#nominal_tunai").val("");
      // $(".nominal_transfer").val("");
      $("#nominal_hutang").val("");
    } else { // MEMBER
      // var_data_pembeli = data_pembeli;
      var_data_pembeli = function(request, response){
        $.ajax({
          url: '<?php echo base_url() ?>admin/penjualan_retail/json_member',
          type: 'post',
          data: 'term='+request.term,
          success: function(data) {
            response($.map(data, function (value, key) {
              return {
                value: value.value,
                label: value.label,
                alamat: value.alamat,
                id_sales: value.id_sales,
                nama_sales: value.nama_sales,
                no_hp: value.no_hp
              };
            }));
          }
        });
      }
      $(".alamat_pembeli").attr("readonly", "readonly");
      $(".no_hp").attr("readonly", "readonly");
    }
    function successAutocomplete(ui) {
      $(".nama_pembeli").val(ui.item.label);
      $(".nama_pembeli").attr("readonly", "readonly");
      $(".nama_pembeli2").val(ui.item.label);
      $(".nama_pembeli2").attr("readonly", "readonly");
      $(".alamat_pembeli").val(ui.item.alamat);
      $(".no_hp").val(ui.item.no_hp);
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
      loadTemp();
    }
    $(".nama_pembeli").autocomplete({
      source: var_data_pembeli,
      delay: 0,
      autoFocus: true,
      select: function(event, ui){
        event.preventDefault();
        successAutocomplete(ui);
      }
    });
    $(".nama_pembeli2").autocomplete({
      source: var_data_pembeli,
      delay: 0,
      autoFocus: true,
      select: function(event, ui){
        event.preventDefault();
        successAutocomplete(ui);
      }
    });
    $(".nama_pembeli").focus();
    $(".nama_pembeli2").focus();
  }

  // bukan member boleh pilih pembayaran
  <?php if (!empty($id_member)) { ?>
  $(".status_member").attr("disabled", "disabled");
  $(".alamat_pembeli").attr("readonly", "readonly");
  $(".no_hp").attr("readonly", "readonly");
  $(".nama_pembeli").attr("readonly", "readonly");
  $(".panelPembayaran").removeClass("hide");
  <?php } ?>
  // 

  <?php if (!empty($id_member)) { ?>
  // var get_id = <?php // echo $id_member ?>;
  // for (var ip in data_pembeli) {
  //   if (data_pembeli[ip].value==get_id) {
  //     $(".status_member").attr("disabled", "disabled");
  //     $(".alamat_pembeli").attr("readonly", "readonly");
  //     $(".nama_pembeli").val(data_pembeli[ip].label);
  //     $(".alamat_pembeli").val(data_pembeli[ip].alamat);
  //     $(".nama_pembeli").attr("readonly", "readonly");
  //     $(".panelPembayaran").removeClass("hide");
  //     if (typeof(data_pembeli[ip].id_sales)!=='undefined') {
  //       $(".panelSales").removeClass("hide");
  //       var html = '';
  //       html += '<option value="'+data_pembeli[ip].id_sales+'" selected>'+data_pembeli[ip].nama_sales+'</option>';
  //       html += '<option value="">-- Tidak ada sales --</option>';
  //       $(".panelSales select").html(html);
  //     }
  //     $(".pembayaran").focus();
  //     id_pembeli = data_pembeli[ip].value;
  //     loadTemp();
  //   }
  // }
  <?php } ?>

  function pilPembayaran() {
    $(".deadline").val("");
    pembayaran = $(".pembayaran").find(":selected").val()*1;
   
    if (pembayaran==2) { // KREDIT
      $(".panelSplitPembayaranLainnya").addClass("hide");
      $(".panelSplit").addClass("hide");
      $(".panelDeadline").removeClass("hide");
      $(".deadline").focus();
      $('.id_media option[value="4"]').prop('selected', true);
      // $('.split option[value="2"]').prop('disabled', true);
    } else { // TUNAI
      // $(".panelSplit").addClass("hide");
      // $(".panelSplitNominal").addClass("d-none");
      // $(".panelPembayaranLainnya").addClass("hide");
      // // $(".nominal-split").addClass("d-none");

      
      // $(".panelDeadline").addClass("hide");
      // $('.id_media option[value="4"]').prop('selected', true);
    }
    if(pembayaran==1){
        $(".panelSplit").addClass("hide");
        $(".panelSplitNominal").addClass("d-none");
        $(".panelPembayaranLainnya").addClass("hide");
        // $(".nominal-split").addClass("d-none");
        $(".panelSplitPembayaranLainnya").addClass("hide");

        
        $(".panelDeadline").addClass("hide");
        $('.id_media option[value="4"]').prop('selected', true);
    
    }
    if (pembayaran==3) {
      $(".panelDeadline").addClass("hide");
      $(".panelSplit").addClass("hide");
      $(".panelSplitPembayaranLainnya").addClass("hide");
      $(".panelPembayaranLainnya").removeClass("hide");
      // $("#nominal_tunai").val(numberWithCommas(app_total.toString()));
      $(".nominal_transfer").val(numberWithCommas(app_total.toString()));
      // $(".nominal_transfer").val('');
      hitunglainnya();
      setTimeout(function(){
        $("#nominal_tunai").focus();
      }, 80);
      // 
      $('.id_media option[value="1"]').prop('selected', true);
      // $(".id_media").change();
    } else {
      $(".panelPembayaranLainnya").addClass("hide");
    }
    if(pembayaran==4){
      $(".panelSplit").removeClass("hide");
      
      // $(".panelSplitPembayaranLainnya").removeClass("hide");
      $(".panelPembayaranLainnya").addClass("hide");
      $(".panelDeadline").addClass("hide");
      $("#nominal_tunai").val(numberWithCommas(app_total.toString()));
      $("#nominal_split").val(numberWithCommas(app_total.toString()));
      $(".panelSplitNominal").removeClass("d-none");
      $(".nominal-split2-form").removeClass("hide");
      $(".nominal-split").val(numberWithCommas(app_total.toString()));
      // $(".nominal_transfer").val('');
      hitunglainnya();
      setTimeout(function(){
        $("#nominal_tunai").focus();
      }, 80);
    }else{

    }

    toggleCOD();
  }


  pilPembayaran();

  $(".pembayaran").on('change', function(){
    pilPembayaran();
  });

  // split

   function pilSplitPembayaran() {
    // $(".deadline").val("");
    split = $(".split").find(":selected").val()*1;
    if (split==2) { // KREDIT
      $(".panelSplitDeadline").removeClass("hide");
      $(".deadline").focus();
      $('.id_media option[value="4"]').prop('selected', true);
      $(".nominal-split2").removeClass("hide");
      // $('.split option[value="2"]').prop('disabled', true);
    } else{} 
    
    if(split==1){ // TUNAI
      $(".nominal-split2").removeClass("hide");
      $(".panelSplitNominal").removeClass("d-none");
      // $(".nominal-split").addClass("d-none");
      // $(".nominal-split").val(numberWithCommas(app_total.toString()));
      $(".panelSplitDeadline").addClass("hide");
      $(".panelSplitNominal").addClass("hide");
      $('.id_media option[value="4"]').prop('selected', true);
    }
    if (split==3) {
      $(".panelSplitNominal").addClass("d-none");
      $(".panelSplitPembayaranLainnya").removeClass("hide");
      $("#nominal_tunai").val(numberWithCommas(app_total.toString()));
      $(".nominal-split2").addClass("hide");
       $(".panelSplitDeadline").addClass("hide");
      // $(".nominal_transfer").val('');
      hitunglainnya();
      setTimeout(function(){
        $("#nominal_tunai").focus();
      }, 80);
      // 
      $('.id_media option[value="1"]').prop('selected', true);
      // $(".id_media").change();
    } else {
      $(".panelSplitPembayaranLainnya").addClass("hide");
    }

   

    toggleCOD();
  }


  pilSplitPembayaran();
  
  $(".split").on('change', function(){
    pilSplitPembayaran();
  });





  $(".split").on('change', function(){
    pilSplitPembayaran();
    alert(val);
  });
  $(".split").on("change", function() {
    var val = $(this).val();
   
    $('.split option[value="'+val+'"]').prop('selected', true);
  });

  
  // /split

  var barcode = null;
  var id_barang = null;

  function statusBarcode() {
    $(".nama_barang").val("");
    var status_barcode = $(".status_barcode").find(":selected").val();
    var source_nama_barang = [];
    if (status_barcode=="1") { // BARCODE
      source_nama_barang = [];
    //   console.log('aa');
    } else { // NAMA BARANG
      source_nama_barang = function(request, response){
        $.ajax({
          url: '<?php echo base_url() ?>admin/penjualan_retail/json_produk',
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

  function insertTemp(barcode) {
    $(".nama_barang").attr("disabled","disabled");
    $.ajax({
      url: '<?php echo base_url() ?>admin/penjualan_retail/insert_barang_temp_by_id/<?php echo date("Y-m-d") ?>',
      type: 'post',
      data: 'barcode='+barcode,
      success: function(data){
        $(".nama_barang").removeAttr("disabled");
        var parsed_data = JSON.parse(data);
        var response = parsed_data.response;
        if (response[0]=="0") {
          showPopup('Barang Tidak Tersedia!');
        } else if(response[0]=="1") {
        } else if(response[0]=="2") {
          showPopup('Barang telah Habis!');
        } else if(response[0]=="3") {
          showPopup('Barang telah kadaluarsa!');
        } else {
          showPopup("Error");
        }
        loadTemp();
        $(".nama_barang").focus();
      },
      error: function(){
        // insertTemp();
      }
    });
  }

  $(".form_barang").submit(function(e){
    e.preventDefault();
    if (barcode!=null) {
    } else {
      barcode = $(".nama_barang").val();
    }
    insertTemp(barcode);
  });

  function update(data) {
    $.ajax({
      url: '<?php echo base_url() ?>admin/penjualan_retail/update_temp',
      type: 'post',
      data: data,
      success: function(response) {
        loadTemp();
      },
      error: function(){
      	setTimeout(function(){
	        update(data);
      	}, 5000);
      }
    });
  }
  
  var modalActionUbah = function(data_id) {
    // showPopup(data_id);
    // console.log(data_touch_ubah);
    var dataubah = data_touch_ubah[data_id];
    $("#mdl_touch_ubah_nama").val(dataubah.nama_produk);
    $("#mdl_touch_ubah_kuantitas").val(dataubah.jumlah);
    $("#mdl_touch_ubah_harga").val(number_format(dataubah.harga*1,0,',','.'));
    $("#mdl_touch_ubah_pot_persen").val(dataubah.diskon);
    $("#mdl_touch_ubah_pot").val(number_format(dataubah.potongan*1,0,',','.'));
    $("#mdl_touch_ubah_total").val(number_format(dataubah.sub_total*1,0,',','.'));
    $("#myModal").modal('show');
    function hitung() {
      var k = $("#mdl_touch_ubah_kuantitas").val()*1;
      var h = $("#mdl_touch_ubah_harga").val().replace(/\./g,'')*1;
      var p = $("#mdl_touch_ubah_pot").val().replace(/\./g,'')*1;
      var subtotal = (k*h)-(p*k);
      $("#mdl_touch_ubah_total").val(number_format(subtotal*1,0,',','.'));
    }
    $("#mdl_touch_ubah_kuantitas").on('keyup', function(e){
      e.stopImmediatePropagation();
      hitung();
    });
    $("#mdl_touch_ubah_pot_persen").on('keyup', function(e){
      e.stopImmediatePropagation();
      var pp = $(this).val().replace(/\./g,'')*1;
      var k = $("#mdl_touch_ubah_kuantitas").val()*1;
      var h = $("#mdl_touch_ubah_harga").val().replace(/\./g,'')*1;
      var pot = h*pp/100;
      var p = $("#mdl_touch_ubah_pot").val(number_format(pot,0,',','.'));
      hitung();
      loadTemp();
    });
    $("#mdl_touch_ubah_pot").on('keyup', function(e){
      e.stopImmediatePropagation();
      var p = $(this).val().replace(/\./g,'')*1;
      var pp = $('#mdl_touch_ubah_pot_persen').val();
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
      var k = $("#mdl_touch_ubah_kuantitas").val()*1;
      var pot_persen = $("#mdl_touch_ubah_pot_persen").val()*1;
      var pot = $("#mdl_touch_ubah_pot").val().replace(/\./g,'')*1;
      // var data_id = $('#btn_touch_ubah').attr('data-id');
      var datat_id = dataubah.id_orders_temp;
      $.ajax({
        url: '<?php echo base_url() ?>admin/penjualan_retail/update_orders_temp/'+datat_id,
        type: 'post',
        data: 'k='+k+'&pot_persen='+pot_persen+'&pot='+pot,
        success: function(response) {
          $("#myModal").modal('hide');
          // $('#btn_touch_ubah').removeAttr('data-id');
          // $('#btn_touch_hapus').removeAttr('data-id');
          loadTemp();
        }
      });
    });
  }

  // ,mobile
  // BUTTON TOUCH UBAH HAPUS //
  var touchBtn = function(total){
    if (total < 1) {
      $("#btn_touch_ubah").attr('data-id','');
      $("#btn_touch_hapus").attr('data-id','');
    }
    var data_id_ubah = $("#btn_touch_ubah").attr('data-id');
    if (data_id_ubah > 0) {
      $("#btn_touch_ubah").removeAttr('disabled');
    } else {
      $("#btn_touch_ubah").attr('disabled','disabled');
    }
    var data_id_hapus = $("#btn_touch_hapus").attr('data-id');
    if (data_id_hapus > 0) {
      $("#btn_touch_hapus").removeAttr('disabled');
    } else {
      $("#btn_touch_hapus").attr('disabled','disabled');
    }
  }

  // mobile
  var addFuncTouchBarang = function(total){
    touchBtn(total);
    function touchbarangselected(el) {
      var data_id = el.attr('data-id');
      var data_item = el.attr('data-item');
      $("#btn_touch_ubah").attr('data-id', data_id);
      $("#btn_touch_hapus").attr('data-id', data_id);
      $("#btn_touch_ubah").attr('data-item', data_item);
      $("#btn_touch_hapus").attr('data-item', data_item);
      $("#dynamic-table2 tbody tr").css({'background-color':'white','border':'0px'});
      el.css({'background-color':'#90dcff','border':'1px solid #03a9f4'});
    }
    $(".tr-touch-barang").click(function(e){
      e.stopImmediatePropagation();
      touchbarangselected($(this));
      touchBtn(total);
      var id_orders_temp = $(this).attr('data-id');
      $('body').bind('keydown','del',function() {
        deleteProduk(id_orders_temp);
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
      var data_id = $(this).attr('data-id');
      var data_item = $(this).attr('data-item');
      modalActionUbah(data_item);
    });
    $(document).on('click','#btn_ubah',function(e){
      e.stopImmediatePropagation();
      var data_id = $(this).attr('data-id');
      var data_item = $(this).attr('data-item');
      $('#btn_touch_ubah').attr('data-id',data_id);
      modalActionUbah(data_item);
    });
    $("#btn_touch_hapus").click(function(e){
      e.stopImmediatePropagation();
      var data_id = $(this).attr('data-id');
      deleteProduk(data_id);
    });
  }

  function deleteProduk(data_id) {
    $.ajax({
      url: '<?php echo base_url() ?>admin/penjualan_retail/delete_orders_temp/'+data_id,
      type: 'post',
      success: function(){
        loadTemp();
      },
      error: function(){
        loadTemp();
      }
    });
  }

  var data_touch_ubah = {};
  loadTemp();
  function loadTemp() {
    app_total = 0;
    app_total_asli = 0;
    app_diskon = 0;
    app_total_ppn = 0;
    app_ppn_nominal = 0;
    app_total_diskon = 0;
    $('input[name="nama_barang"]').val("");
    $('.btn-selesai').attr("disabled","disabled");
    console.log('ok');
    $.ajax({
      url: '<?php echo base_url() ?>admin/penjualan_retail/load_temp',
      type: 'post',
      data: 'id_member='+id_pembeli,
      success: function(data) {
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
        if (total_asli > 0 && id_pembeli!=null && diskon > 0) {
          $(".diskon_member").html("Diskon member "+diskon+"%");
          $(".total_asli").removeClass("hide");
          $(".total_asli_value").html(numberWithCommas(Math.round(total_asli)));
        } else {
          $(".diskon_member").html("");
          $(".total_asli").addClass("hide");
          $(".total_asli_value").html("0");
        }
        var temp = data.data;
        data_touch_ubah = temp;
        var ongkir = jNumber($('.ongkir').val())*1;
        var ltotal = Math.round(total+ongkir);
        $(".total").html(numberWithCommas(ltotal));
        $(".nominal-split1").val(numberWithCommas(ltotal));
        $('.nominal_transfer').val(ltotal);
        $(".total_ppn").html(numberWithCommas(Math.round(app_total_ppn)));
        $(".total_diskon_nominal").html(Math.round(app_total_diskon));
        
        var html = "";
        var html_mobile = "";
        for (var item in temp) {
          ibarang++;
          var html_pil_harga = '<select class="pil_harga" name="id_pil_harga" data-id="'+temp[item].id_orders_temp+'" style="border-width:0px;">';
          for (var item_p in pil_harga) {
            var selected = "";
            if (item_p==temp[item].pil_harga) {
              selected = "selected";
            }
            if (item_p < 4) {
              if (item_p == 1) {
                pil_harga[item_p] = 'Harga Jual';
              } else if (item_p == 2) {
                pil_harga[item_p] = 'Harga Grosir';
              } else if (item_p == 3) {
                pil_harga[item_p] = 'Harga Member';
              }
              html_pil_harga += '<option value="'+item_p+'" '+selected+'>'+pil_harga[item_p]+'</option>';
            }
            // html_pil_harga += '<option value="'+item_p+'" '+selected+'>'+pil_harga[item_p]+'</option>';
          }
          html_pil_harga += '</select>';
          html += ' <tr>\
                      <th class="center">'+temp[item].no+'</th>\
                      <th>'+temp[item].nama_produk+'</th>\
                      <th>'+temp[item].stok+'</th>\
                      <th style="padding:0px;background-color:#fff;">'+html_pil_harga+'</th>\
                      <th class="text-center" style="padding:0px;background-color:#fff;"><input style="padding:6px;border-width:0px;outline:none;width:90px;" class="text-center jumlah" value="'+temp[item].jumlah+'" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'"></th>\
                      <th class="text-center" style="padding:0px;background-color:#fff;"><input style="padding:6px;border-width:0px;outline:none;width:90px;" class="text-center jumlah_bonus" value="'+temp[item].jumlah_bonus+'" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'"></th>\
                      <th class="text-center" style="padding:0px;background-color:#fff;"><input style="padding:6px;border-width:0px;outline:none;width:90px;" class="text-center harga_jual_sat" value="'+numberWithCommas(temp[item].harga_jual)+'" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'"></th>\
                      <th class="text-center" style="padding:0px;background-color:#fff;"><input style="padding:6px;border-width:0px;outline:none;width:80px;" class="text-center diskon" value="'+temp[item].diskon+'" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'"></th>\
                      <th class="text-center" style="padding:0px;background-color:#fff;"><input style="padding:6px;border-width:0px;outline:none;width:80px;" class="text-center diskon2" value="'+temp[item].diskon2+'" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'"></th>\
                      <th class="text-center" style="padding:0px;background-color:#fff;"><input style="padding:6px;border-width:0px;outline:none;width:80px;" class="text-center diskon3" value="'+temp[item].diskon3+'" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'"></th>\
                      <th class="text-right">'+numberWithCommas(Math.round(temp[item].sub_total*1))+'</th>\
                      <th class="text-center"><button type="button" class="btn btn-xs btn-danger no-border btn-delete" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'" style="padding-top:0px;padding-bottom:0px;"><i class="fa fa-remove"></i></button></th>\
                    </tr>';
          html_mobile += `
          <tr class="tr-touch-barang" data-item="`+item+`" data-id="`+temp[item].id_orders_temp+`" id="rowBarangT_`+temp[item].id_orders_temp+`">
            <td>`+temp[item].nama_produk+`</td>
            <td class="text-center">`+temp[item].jumlah+`</td>
            <td>
              <span style='float:right;'>`+numberWithCommas(temp[item].harga_jual)+`</span>`;
              if (temp[item].diskon > 0) {
                html_mobile += `<br><span style='float:right;'>diskon `+temp[item].diskon+` %</span>`;
              }
              if (temp[item].diskon2 > 0) {
                html_mobile += `<br><span style='float:right;'>diskon 2 `+temp[item].diskon2+` %</span>`;
              }
              if (temp[item].diskon3 > 0) {
                html_mobile += `<br><span style='float:right;'>diskon 3 `+temp[item].diskon3+` %</span>`;
              }
          html_mobile += `
            </td>
            <td><span style='float:right;'>`+numberWithCommas(Math.round(temp[item].sub_total*1))+`</span></td>
          </tr>
          `;
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
          // if (new_stok <= stok) {
            update('field=jumlah&id_orders_temp='+data_id+'&value='+val);
          // } else {
          //   showPopup("Stok tidak cukup!");
          //   loadTemp();
          // }
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
            showPopup("Stok tidak cukup!");
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
          deleteProduk(data_id);
        });

        // mobile //
        $("#tableTemp tbody").html(html_mobile);
        addFuncTouchBarang(app_total);
      }
    });
  }

  $("#nominal_tunai").on("keyup", function(){
    var val = jNumber($(this).val());
    hitunglainnya();
  });
  $("#nominal_tunai").trigger("keyup");

  $(".nominal_transfer").on("keyup", function(){
    var val = jNumber($(this).val());
    hitunglainnya();
  });
  
  $(".nominal_transfer").trigger("keyup");

  function hitunglainnya() {
    var tunai = jNumber($("#nominal_tunai").val())*1;
    var transfer = jNumber($(".nominal_transfer").val())*1;
    var hutang = (app_total*1)-(tunai+transfer);
    $("#nominal_hutang").val(numberWithCommas(hutang));
  }
  $(".nominal-split1").on("keyup", function(){
   
    var val = jNumber($(this).val());
    hitunglainnya1();
  });

  
  
  $(".nominal-split1").trigger("keyup");

  
  function hitunglainnya1() {
    
    var tunai = jNumber($("#nominal_tunai").val())*1;
    var split1 = jNumber($(".nominal-split1").val())*1;
    var splitM1 = jNumber($("#split_nominal_m").val())*1;
    // var split1 = $().val();
    var hutang = (app_total*1)-(split1);
    var hutangM = (app_total*1)-(splitM1);
    $("#nominal_hutang").val(numberWithCommas(hutang));
    $(".nominal_split_2").val(numberWithCommas(hutang));

    $("#split2_nominal_m").val(numberWithCommas(hutangM));
    $("#split3_nominal_m").val(numberWithCommas(hutangM));
    // $(".nominal-split2-form").val(hutang);


  }




  $(".btn-selesai").on('click', function(){
    if (ibarang > 0) {
      $(this).attr("disabled","disabled");
      var fd = new FormData();
      <?php if (!empty($id_order)) { ?>
      fd.append("id", "<?php echo $id_order ?>");
      <?php } ?>
      var ongkir = jNumber($(".ongkir").val())*1;
      fd.append("id_pembeli", id_pembeli);
      fd.append("tgl", $('input[name="tgl"]').val());
      fd.append("id_sales", $('select[name="id_sales"]').val());
      fd.append("nama_pembeli", $(".nama_pembeli").val());
      fd.append("alamat_pembeli", $(".alamat_pembeli").val());
      fd.append("no_hp", $(".no_hp").val());
      fd.append("pembayaran", pembayaran);
      fd.append("total_asli", app_total_asli);
      fd.append("diskon_member", app_diskon);
      fd.append("total", app_total+ongkir);
      fd.append("ppn_nominal", app_ppn_nominal);
      fd.append("total_ppn", app_total_ppn);
      fd.append("total_diskon", app_total_diskon);
      fd.append("deadline", $(".deadline").val()*1);
      fd.append("nominal_tunai", jNumber($("#nominal_tunai").val())*1);
      fd.append("nominal_transfer", jNumber($(".nominal_transfer").val())*1);
      fd.append("akun_transfer", $("#akun_transfer").val());
      fd.append("nominal_hutang", jNumber($("#nominal_hutang").val())*1);
      fd.append("deadline2", $(".deadline2").val());
      fd.append("id_media", $(".id_media").val());
      fd.append("id_bank", $("#id_bank").val());
      fd.append("id_expedisi", $(".id_expedisi").val());
      fd.append("no_resi", $(".no_resi").val());
      fd.append("biaya_cod", jNumber($(".biayacod").val())*1);
      fd.append("ongkir", ongkir);
      fd.append("p_nama", $("#p_nama").val());
      fd.append("p_alamat", $("#p_alamat").val());
      fd.append("p_hp", $("#p_hp").val());
      fd.append("d_nama", $("#d_nama").val());
      fd.append("d_alamat", $("#d_alamat").val());
      fd.append("d_hp", $("#d_hp").val());
      fd.append("bayar_split_2", $(".split").val());
      fd.append("nominal_split1", jNumber($(".nominal-split1").val())*1);
      fd.append("nominal_split_2",jNumber($(".nominal_split_2").val())*1);
      fd.append("deadline_split_2", $(".deadline_split").val());
      // fd.append("bayar_split_2", $(".bank_split").val());
      fd.append("bank_split_2", $(".id_bank_split").val());

     


      let u = '<?php echo $action ?>';
      let wa = $("#wa").prop("checked");
      $.ajax({
        url: '<?php echo $action ?>',
        type: 'post',
        processData: false,
        contentType: false,
        data: fd,
        success: function(data) {
          console.log(data); 
          showPopup($(".no_resi").val());


          showPopup(JSON.stringify(data));
          if (typeof(data.next_no_faktur)!=='undefined') {
            $("#tampil_no_faktur").val(data.next_no_faktur);
          }
          if (typeof(data.no_faktur)!=='undefined') {
            if(wa==true){

              var myWindow = window.open("<?php echo base_url() ?>admin/penjualan_retail/wa_nota_penjualan/"+data.no_faktur, "MsgWindow", "width=300, height=400");
             
            }else{
              var myWindow = window.open("<?php echo base_url() ?>admin/penjualan_retail/cetak_nota_penjualan/"+data.no_faktur, "MsgWindow", "width=300, height=400");

            }
          }
          showPopup("Tersimpan");
          
          refresh();


        },
        error: function(){
          showPopup("Masalah Simpan");
          $(this).removeAttr("disabled");
        }
      });
    } else {
      showPopup("Belum ada barang!");
    }
  });

  /*
   * START TOUCHSCREEN
   * IF MOBILE IS AUTO
  */
  function dk(start){
    $.ajax({
      url : '<?php echo base_url("admin/penjualan_retail/data_kategori");?>',
      type: 'post',
      data: 'start='+start,
      success : function(response){
        $('#kat_product_touch').html(response);
        $('.kat_product_touch').html(response);
        afterResponseTouchKat();
      }
    });
  }
  function dp(start,id_kat){
    $.ajax({
      url : '<?php echo base_url("admin/penjualan_retail/data_produk_by_kat");?>',
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
  dk(0);
  function isMobileDevice() {
    return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
  };
  if(isMobileDevice() == true){
    $('#toggleProduk').click(function() {
      dp(0,1);
    });
    $('#touchToggle').attr('checked','checked');
    $('#keyboard').toggleClass('d-none');
    $('.page-content').toggleClass('bgc-blue');
    $('#touchscreen').toggleClass('d-block');
  }
  var afterResponseTouchKat = function() {
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
      dk(np);
    });
    $("li[id*=item_touch_kategori]").click(function(e){
      e.stopImmediatePropagation();
      var start = $(this).attr('data-start');
      var id_kategori_2 = $(this).attr('data-id-kategori-2');
      // hide kategori
      $('#katToggle').click();
      $('#kat-temp').val(id_kategori_2);
      dp(start, id_kategori_2);
    });
  }
  function addOrderTemp(barcode,id_barang) {
    insertTemp(barcode);
  }
  var afterResponseTouchPKat = function() {
    //SWIPE FUNCTION
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
      dp(np, id_kat);
    });
    $("li[id*=item_touch_produk]").click(function(e){
      e.preventDefault();
      var barcode = $(this).attr('data-barcode');
      var id_produk_2 = $(this).attr('data-id-produk-2');
      addOrderTemp(barcode, id_produk_2);
      $('#showAdded').html($(this).text()+'ditambahkan');
      $("#showAdded").show().delay(1000).fadeOut();
    });
    //END TOUCH SUBMIT FORM
  }
  $('.numpad-potongan2').numpad({
    target: $('#mdl_touch_ubah_pot'),
  });
  $('.numpad-potongan1').numpad({
    target: $('#mdl_touch_ubah_pot_persen'),
  });
  $('.numpad-qty').numpad({
    target: $('#mdl_touch_ubah_kuantitas'),
  });
  $('.numpad-bayar').numpad({
    target: $('#bayar'),
  });
  /* POPUP DIALOG */
  //override dialog's title function to allow for HTML titles
  $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
    _title: function(title) {
      var $title = this.options.title || '&nbsp;'
      if( ("title_html" in this.options) && this.options.title_html == true)
        title.html($title);
      else title.text($title);
    }
  }));
  // MEMBER TOGGLE
  var opsi_pilihan = '<?php echo $opsi_pilihan->opsi;?>';
  var opsi_popup = '<?php echo $opsi_popup->opsi;?>';
  // $('#memberToggle').change(function(e){
  //   e.preventDefault();
  //   var mt = $(this).is(':checked');
  //   if (mt) {
  //     statusMember(opsi_pilihan);
  //   } else {
  //     statusBukanMember(opsi_pilihan);
  //     $("#member_status").val('false');
  //   }
  // });
  $(document).on('change','#typePembayaran',function() {
    if ($(this).val() == 2) {
      $('.kredit').html(`<input type="date" style="width:100%">`);
    } else {
      $('.kredit').html('');
    }
  });
  // if (opsi_pilihan == 1) {
  //   $(document).on('change','#pembeli', function(e) {
  //     e.preventDefault();
  //     if ($(this).val() != '') {
  //       addOptionPembayaran();
  //       $.ajax({
  //         url: '<?php // echo base_url("admin/penjualan_retail/getMemberById");?>',
  //         type: 'post',
  //         data: 'id='+$(this).val(),
  //         success:function(response){
  //           var data = JSON.parse(response);
  //           $("#id_pembeli").val(data.id_member);
  //           $("#pembeli2").val(data.nama);
  //           $("#deposit").val(data.deposit);
  //           $("#deposit2").val(data.deposit);
  //           $("#member_status").val('true');
  //           $("#deposit_pakai2").val(data.deposit);
  //           $(".statPembeli").show();
  //           $(".statPembeli").html("<div class='' style='padding:0px;'>"+data.deposit+"</span>");
  //           loadTemp();
  //         }
  //       });
  //     } else {
  //       $("#id_pembeli").val('');
  //       $("#pembeli2").val('');
  //       $("#deposit").val('');
  //       $("#deposit2").val('');
  //       $("#member_status").val('true');
  //       $("#deposit_pakai2").val('');
  //       $(".statPembeli").show();
  //       $(".statPembeli").html("");
  //       $("#member_status").val('false');
  //       removeOptionPembayaran();
  //       $(".panelDeadline").hide();
  //       loadTemp();
  //     }
  //   });
  // }
  if (opsi_popup == 1) {
    $("#id-btn-dialog2").on('click', function(e) {
      e.preventDefault();
      var total = $("#total").val().replace(/\./g,'');
      var pembayaran = $(".pembayaran").val();
      if (total > 0) {
        if (pembayaran=='1' || pembayaran=='2' || pembayaran=='3') {
          $("#dialog-confirm").removeClass('hide').dialog({
            resizable: false,
            draggable: false,
            width: '320',
            modal: true,
            title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-pencil-square-o'></i> Transaksi Pembayaran</h4></div>",
            title_html: true,
            buttons: [
              {
                html: "<i class='ace-icon fa fa-download bigger-110'></i>&nbsp; Selesai",
                "class" : "btn btn-primary btn-minier",
                "id" : "btnSubmit",
                click: function() {
                  $("#formPenjualan").submit();
                }
              }
              ,
              {
                html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
                "class" : "btn btn-minier",
                "id" : "btnBatal",
                click: function() {
                  var a = $(this);
                  $("#bayar").val("");
                  $(this).dialog("close");
                }
              }
            ]
          });
          $(".ui-dialog-titlebar-close").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            closePopUp();
          });
        } else {
          $("#formPenjualan").submit();
        }
      } else {
        showPopup("Belum ada barang yang dipilih!");
      }
    });
    $("#id-btn-dialog3").on('click', function(e) {
      e.preventDefault();
      var chkArray = [];
      $(".id_mekanik:checked").each(function() {
        chkArray.push($(this).val());
      });
      var selected;
      selected = chkArray.join(',');
      if (selected.length > -1) {
        var total = $("#total").val().replace(/\./g,'');
        var pembayaran = $(".pembayaran").val();
        if(total > 0){
            if (pembayaran=='1' || pembayaran=='3') {
              $("#dialog-confirm").removeClass('hide').dialog({
                resizable: false,
                width: '320',
                modal: true,
                title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-pencil-square-o'></i> Transaksi Pembayaran</h4></div>",
                title_html: true,
                buttons: [
                  {
                    html: "<i class='ace-icon fa fa-download bigger-110'></i>&nbsp; Selesai",
                    "class" : "btn btn-primary btn-minier",
                    "id" : "btnSubmit",
                    click: function() {
                      $("#formPenjualan").submit();
                    }
                  }
                  ,
                  {
                    html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
                    "class" : "btn btn-minier",
                    "id" : "btnBatal",
                    click: function() {
                      var a = $(this);
                      $("#bayar").val("");
                      $(this).dialog("close");
                    }
                  }
                ]
              });
              $(".ui-dialog-titlebar-close").click(function(e){
                e.preventDefault();
                e.stopPropagation();
                closePopUp();
              });
            } else {
              $("#formPenjualan").submit();
            }
        } else {
            showPopup("Belum ada barang yang dipilih!");
        }
      } else {
        $("#modal-mekanik").modal('show');
      }
    });

  } else {
    $("#id-btn-dialog2").on('click', function(e) {
      e.preventDefault();
      var total = $("#total").val().replace(/\./g,'');
      var pembayaran = $(".pembayaran").val();
      if(total > 0){
          if (pembayaran=='1' || pembayaran=='2' || pembayaran=='3') {
            $("#statBayar").val(1);
            $("#bayar").val(total);
            $("#formPenjualan").submit();
          } else {
            $("#formPenjualan").submit();
          }
      } else {
          showPopup("Belum ada barang yang dipilih!");
      }
    });
    $("#id-btn-dialog3").on('click', function(e) {
      e.preventDefault();
      var chkArray = [];
      $(".id_mekanik:checked").each(function() {
        chkArray.push($(this).val());
      });
      var selected;
      selected = chkArray.join(',');
      if (selected.length > -1) {
        var total = $("#total").val().replace(/\./g,'');
        var pembayaran = $(".pembayaran").val();
        if(total > 0){
          $("#statBayar").val(1);
          $("#bayar").val(total);
          $("#formPenjualan").submit();
        } else {
          showPopup("Belum ada barang yang dipilih!");
        }
      } else {
        $("#modal-mekanik").modal('show');
      }
    });
  }
  $('.cancel').click(function() {
    $('.modal-backdrop').hide();
  });

  // CEK NO FAKTUR //
  var cekFaktur = function(k){
    var no_faktur = $("#no_faktur").val();
    $.ajax({
      url: '<?php echo base_url() ?>penjualan_retail/cek_faktur/'+no_faktur,
      success: function(response){
        var parsed_data = JSON.parse(response);
        var no_faktur_baru = parsed_data.no_faktur;
        if(no_faktur == no_faktur_baru){
            // no faktur tidak berubah //
        } else {
          // no faktur berubah //
          $("#no_faktur").val(no_faktur_baru);
          $("#tampil_no_faktur").val(no_faktur_baru);
          if(k=="1"){
            //showPopup("No Faktur Berubah menjadi : "+no_faktur_baru, 'success');
          }
        }
      }
    });
  }

  // CEK NO FAKTUR //
  // $(".status_member").change(function() {
  //   var sm = $(this).val();
  //   $(".status_member2").val(sm);
  // });

  /* IS READY */
  $("body").show();

});
</script>