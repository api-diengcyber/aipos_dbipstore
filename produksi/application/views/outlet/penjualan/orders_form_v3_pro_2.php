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
    </style>
    <!-- jQuery.NumPad -->

    <style type="text/css">
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
            </div><!-- /.nav-search -->
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
              <span class="pull-right">
                <label class="pull-right inline">
                  <small class="muted smaller-90">Touchscreen : </small>
                  <input type="checkbox" class="ace ace-switch ace-switch-5" id="touchToggle" />
                  <span class="lbl middle"></span>
                </label>
              </span><!-- /.col -->
            <div class="row" id="keyboard">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <?php if ($r_transaksi) { ?>
                
                <div id="showDone" class="alert alert-success" style="position:fixed;z-index:10000000;top:10px;display:none;">
                    <b><span id="showFaktur"></span> Berhasil Tersimpan</b>
                </div>
                <div id="showAdded" class="alert alert-success" style="position:fixed;z-index:10000000;top:10px;left:10px;border-radius: 100px;display:none;">
                    <b><span id="showFaktur"></span> Berhasil Ditambahkan</b>
                </div>

                <div class="row">
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="varchar">Tgl Order <?php echo form_error('tgl_order') ?></label>
                                <input type="text" class="form-control" id="tampil_tgl_order" placeholder="Tgl Order" value="<?php echo $tgl_order; ?>" readonly />
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="varchar">No Faktur <?php echo form_error('no_faktur') ?></label>
                                <input type="text" class="form-control" id="tampil_no_faktur" placeholder="No Faktur" value="<?php echo $no_faktur; ?>" readonly />
                            </div>
                        </div>
                        <div id="drt">
                        <?php if ($id_modul == '3') { // BASIC ?>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <select class="form-control status_member" id="status_member">
                                    <option value="1">BUKAN MEMBER</option>
                                    <option value="2">MEMBER</option>
                                </select>
                            </div>
                        </div>
                        <?php } ?>
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
                            <div id="panelDeposit" class="form-group" style="display:none;">
                                <div class="input-icon">
                                  <input type="number" style="text-align:right;color:black;" class="form-control" id="deposit" placeholder="0" value="" maxlength="20" readonly />
                                  <i class="ace-icon fa fa-rupiah black">Rp</i>
                                </div>
                                <div class="input-icon">
                                  <input type="number" style="text-align:right;color:black;" class="form-control" id="deposit_pakai" placeholder="0" value="" tabindex="5" maxlength="20" />
                                  <i class="ace-icon fa fa-rupiah black">Rp</i>
                                </div>
                                <div id="showErrorDeposit"></div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xs-12">
                          <div class="row">
                            <form id="formBarcode" method="post">
                                <div class="form-group col-md-2">
                                  <select class="form-control status_barcode" id="status_barcode">
                                      <option value="1">BARCODE</option>
                                      <option value="2">NAMA BARANG</option>
                                  </select>
                                  <script>
                                    
                                  </script>
                                </div>
                                <div class="form-group col-md-10">
                                    <input type="hidden" class="form-control" name="barcode" id="barcode" />
                                    <input type="text" class="form-control" name="barang" id="barang" placeholder="Barcode / Nama Barang" value="" autofocus />
                                    <?php echo form_error('barcode') ?>
                                </div>
                            </form>
                          </div>
                            <div id="keterangan" style="position:fixed;top:10px;z-index:100000;"></div>
                        </div>
                      </div>
                    </div>
                    <div id="ss" class="col-md-4">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="form-group">
                              <h3 style="color:red;font-weight:50;"><b>GRAND TOTAL</b></h3>
                              <h1 style="color:black;font-weight:bold;font-family:impact;">Rp <span style="float:right;"> <span id="panelTotal2">0</span>,- </span></h1>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                      <div class="row">
                        <div class="col-xs-12">
                            <form id='formBarang'>
                              <div class="table-responsive" style="height:55vh;overflow-y:scroll;">
                                <div id="panelBarang"></div>
                              </div>
                            </form>
                            <div class="padding-8 center">
                              <div class="row">
                                <div class="col-md-12"><button type="button" id="id-btn-dialog2" class="id-btn-dialog2 btn btn-primary btn-block">Selesai</button></div>
                              </div>
                              
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                    <div id="dialog-confirm" class="hide">
                        <form id="formPenjualan" action="<?php echo $action; ?>" method="post" autocomplete="off">
                            <input type="hidden" class="form-control" name="tgl_order" id="tgl_order" placeholder="Tgl Order" value="<?php echo $tgl_order; ?>" />
                            <input type="hidden" class="form-control" name="no_faktur" id="no_faktur" placeholder="No Faktur" value="<?php echo $no_faktur; ?>" />
                            <input type="hidden" class="form-control" name="id_toko" id="id_toko" placeholder="Id Toko" value="<?php echo $id_toko; ?>" />
                            <input type="hidden" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $id_users; ?>" />
                            <input type="hidden" class="form-control" name="status_member" id="status_member2" value="1" />
                            <input type="hidden" class="form-control" name="nama_bukan_member" id="nama_bukan_member" />
                            <input type="hidden" class="form-control" name="alamat_bukan_member" id="alamat_bukan_member" />
                            <input type="hidden" class="form-control" name="id_pembeli" id="id_pembeli" />
                            <input type="hidden" class="form-control" name="pembeli" id="pembeli2" />
                            <input type="hidden" class="form-control" name="diskon" id="diskon_member">
                            <input type="hidden" class="form-control pembayaran2" name="pembayaran" id="pembayaran2" value="1" />
                            <input type="hidden" class="form-control deadline2" name="deadline" id="deadline2" />
                            <input type="hidden" class="form-control" name="deposit" id="deposit2" />
                            <input type="hidden" class="form-control" name="deposit_pakai" id="deposit_pakai2" />
                            <input type="hidden" class="form-control" name="dm" id="dm">
                            <div class="alert alert-info" style="background-color:black;">
                              <h3 style="color:red;"><b>GRAND TOTAL</b></h3>
                              <h2 style="color:white;font-family:impact;">Rp <span style="float:right;"> <span id="panelTotal">0</span>,- </span></h2>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="total" id="total" value="0">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="int">Bayar</label>
                                <div class="input-icon">
                                  <div class="input-group">
                                    <input type="text" style="text-align:right;color:black;border-top-right-radius:0px!important;text-align:right;color:black;border-bottom-right-radius:0px!important" class="form-control" name="bayar" id="bayar" placeholder="0" value="" tabindex="6" maxlength="20" />
                                    <div class="input-group-addon numpad-bayar numpad"><i class="fa fa-table"></i></div>
                                  </div>
                                  <i class="ace-icon fa fa-rupiah black">Rp</i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="double" id="label-sisa">Sisa</label>
                                <div class="input-icon">
                                  <input type="hidden" name="statBayar" id="statBayar">
                                  <input type="text" style="text-align:right;color:black;" class="form-control" name="sisa" id="sisa" placeholder="0" value="" tabindex="7" maxlength="20" readonly />
                                  <i class="ace-icon fa fa-rupiah black">Rp</i>
                                </div>
                                <div class="checkbox" id="cbDeposit" style="display:none;">
                                  <label>
                                    <input name="cb_deposit" type="checkbox" class="ace" checked />
                                    <span class="lbl"> masukkan ke deposit</span>
                                  </label>
                                </div>
                            </div>
                        </form>
                    </div><!-- #dialog-confirm -->

                  <?php } else { ?>

                      <div class="widget-box" id="widget-box-1">
                        <div class="widget-body">
                          <div class="widget-main">
                            <p class="alert alert-danger">
                              Maaf, Transaksi tidak dapat dilanjukan, batas per hari maksimal <?php echo $max_transaksi ?> transaksi. 
                                Silahkan Upgrade 
                            </p>
                          </div>
                        </div>
                      </div>

                  <?php } ?>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
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
                              <input type="text" class="form-control btn-round w-98 pembeli" id="nama_pembeli" placeholder="Nama pembeli">
                              <div id="statPembeli" class="statPembeli"></div>
                              </div>
                            </div>
                            <div class="form-group col-xs-4 p-0" style="margin-bottom:0px">
                              <div class="default_pembayaran" id="default_pembayaran">
                              <select class="form-control btn-round w-98 pembayaran" id="pembayaran" tabindex="4" />
                                <option value="1">TUNAI</option>
                              </select>
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
                          <form id="formTouchBarang">
                          <div class="panel panel-body p-0 border-blue" style="margin-bottom:0px" id="tableTemp">
                            <table class="table">
                              <thead>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Jumlah</th>
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
          </div><!-- /.page-content -->
      </div><!-- /.main-content -->
<script src="<?php echo base_url('assets/js/jquery.numpad.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.event.swipe.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.hotkeys.js');?>"></script>
<!-- JQUERY -->
<script type="text/javascript">
  $('#bayar').on('keydown', function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                $('#btnSubmit').click();
            }
  });
  $(window).on('load', function() {
    $('.dialog-confirm').appendTo('body');
    $('#myModal').appendTo('body');
    $('#modal-mekanik').appendTo('body');
    $("#showAdded").appendTo('body');
    $(".kc_fab_main_btn").attr('style','display:none!important');
  });

  // Set NumPad defaults for jQuery mobile. 
  // These defaults will be applied to all NumPads within this document!
  $.fn.numpad.defaults.gridTpl = '<table class="table modal-content"></table>';
  $.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in"></div>';
  $.fn.numpad.defaults.displayTpl = '<input type="text" class="form-control" />';
  $.fn.numpad.defaults.buttonNumberTpl =  '<button type="button" class="btn btn-primary"></button>';
  $.fn.numpad.defaults.buttonFunctionTpl = '<button type="button" class="btn" style="width: 100%;"></button>';
  $.fn.numpad.defaults.onKeypadCreate = function() {$(this).find('.done').addClass('btn-primary');};
</script>
<?php if ($r_transaksi) { ?>
<script type="text/javascript">
    // add/remove checked class
    $(".image-checkbox").each(function() {
        if($(this).find('input[type="checkbox"]').first().attr("checked")){
            $(this).addClass('image-checkbox-checked');
        }else{
            $(this).removeClass('image-checkbox-checked');
        }
    });
    // sync the input state
    $(".image-checkbox").on("click", function(e){
        $(this).toggleClass('image-checkbox-checked');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked",!$checkbox.prop("checked"));
      
        e.preventDefault();
    });
    /*
harga_jual = potongan/diskon)*100 
subtotal = harga_jual - (harga_jual * (diskon/100))*/
    jQuery(function($){
        var opsi_popup = '<?php echo (!empty($opsi_popup) ? $opsi_popup->opsi : 0 ) ?>';
        tableTemp();
        $('#katToggle').click(function(e){
            $('.kat_product_touch').toggleClass('d-none');
            $('.kat_product_touch').toggleClass('open-kat');
        });
        function showOption() {
          $('#option').addClass('d-block');
        }
        // DELETE BARANG TOUCH MODE//
        var addFuncDeleteBarangT = function() {
              var ccount = $('tr[id*=rowBarangT').length;
              for(var i = 1; i <= ccount; i++){
                $('#removeBarangT_'+i).click(function() {
                      var id_orders_temp = $(this).val();
                      $.ajax({
                          url: '<?php echo base_url() ?>penjualan_retail/delete_orders_temp/'+id_orders_temp,
                          type: 'post',
                          success: function() {
                              $('#rowBarangT_'+id_orders_temp).remove();
                              tableTemp();
                              panelBarang();
                          }
                      });
                  });
              };
        }
        // DELETE BARANG //
        var data_touch_ubah = {};
        function tableTemp() {
          var mB_sT = $('#member_status').val();
          var id_member = $('#id_pembeli').val();
          $.ajax({
              url : '<?php echo base_url() ?>penjualan_retail/tableTemp',
              type: 'post',
              data: 'member='+mB_sT+'&id_member='+id_member,
              success: function(response){
                  var parsed_data = JSON.parse(response);
                  $("#tableTemp").html(parsed_data.panelBarang);
                  $("#total-display").html(parsed_data.panelTotal);
                  $("#panelTotal").html(parsed_data.panelTotal);
                  $("#panelTotal2").html(parsed_data.panelTotal);
                  $("#total").val(parsed_data.panelTotal);
                  addFuncDeleteBarangT();
                  addFuncTouchBarang(parsed_data.panelTotal.replace(/\./g,''));
                  data_touch_ubah = parsed_data.data;
                  $("#dm").val($("#d_m").val());
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
        // TOUCH BARANG ACTION //

        var addFuncTouchBarang = function(total){
          touchBtn(total);
          function touchbarangselected(el) {
            var data_id = el.attr('data-id');
            $("#btn_touch_ubah").attr('data-id', data_id);
            $("#btn_touch_hapus").attr('data-id', data_id);
            $("#dynamic-table tbody tr").css({'background-color':'white','border':'0px'});
            el.css({'background-color':'#90dcff','border':'1px solid #03a9f4'});
          }
          $(".tr-touch-barang").click(function(e){
            e.stopImmediatePropagation();
            touchbarangselected($(this));
            touchBtn(total);
            var id_orders_temp = $(this).attr('data-id');
            $('body').bind('keydown','del',function() {
              $.ajax({
                  url: '<?php echo base_url() ?>penjualan_retail/delete_orders_temp/'+id_orders_temp,
                  type: 'post',
                  success: function() {
                      $('#rowBarangT_'+id_orders_temp).remove();
                      tableTemp();
                      panelBarang();
                  }
              });
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
            modalActionUbah(data_id);
          });
          $(document).on('click','#btn_ubah',function(e){
            e.stopImmediatePropagation();
            var data_id = $(this).attr('data-id');
            $('#btn_touch_ubah').attr('data-id',data_id);
            modalActionUbah(data_id);
          });
          var modalActionUbah = function(data_id){
            var dataubah = data_touch_ubah[data_id];
            $("#mdl_touch_ubah_nama").val(dataubah.nama_produk);
            $("#mdl_touch_ubah_kuantitas").val(dataubah.jumlah);
            $("#mdl_touch_ubah_harga").val(number_format(dataubah.harga*1,0,',','.'));
            $("#mdl_touch_ubah_pot_persen").val(dataubah.potongan_persen);
            $("#mdl_touch_ubah_pot").val(number_format(dataubah.potongan*1,0,',','.'));
            $("#mdl_touch_ubah_total").val(number_format(dataubah.total*1,0,',','.'));
            $("#myModal").modal('show');
            function hitung() {
              var k = $("#mdl_touch_ubah_kuantitas").val()*1;
              var h = $("#mdl_touch_ubah_harga").val().replace(/\./g,'')*1;
              var p = $("#mdl_touch_ubah_pot").val().replace(/\./g,'')*1;
              var subtotal = (k*h)-(p*k);
              $("#mdl_touch_ubah_total").val(number_format(subtotal*1,0,',','.'));
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
              tableTemp();
              panelBarang();
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
              tableTemp();
              panelBarang();
            });
            $("#mdl_btn_submit").on('click', function(e){
              e.stopImmediatePropagation();
              var k = $("#mdl_touch_ubah_kuantitas").val()*1;
              var pot_persen = $("#mdl_touch_ubah_pot_persen").val()*1;
              var pot = $("#mdl_touch_ubah_pot").val().replace(/\./g,'')*1;
              var data_id = $('#btn_touch_ubah').attr('data-id');
              $.ajax({
                  url: '<?php echo base_url() ?>penjualan_retail/update_orders_temp/'+data_id,
                  type: 'post',
                  data: 'k='+k+'&pot_persen='+pot_persen+'&pot='+pot,
                  success: function(response){
                      $("#myModal").modal('hide');
                      $('#btn_touch_ubah').removeAttr('data-id');
                      $('#btn_touch_hapus').removeAttr('data-id');
                      tableTemp();
                      panelBarang();
                  }
              });
            });
          }
          $("#btn_touch_hapus").click(function(e){
            e.stopImmediatePropagation();
            var data_id = $(this).attr('data-id');
            $.ajax({
                url: '<?php echo base_url() ?>penjualan_retail/delete_orders_temp/'+data_id,
                type: 'post',
                success: function() {
                    $('#rowBarangT_'+data_id).remove();
                    tableTemp();
                    panelBarang();
                }
            });
          });
        }

        //START TOUCHSCREEN FUNCTION
        function dk(start){
            $.ajax({
                url : '<?php echo base_url("penjualan_retail/data_kategori");?>',
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
                url : '<?php echo base_url("penjualan_retail/data_produk_by_kat");?>',
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
          $.ajax({
              url: '<?php echo base_url() ?>penjualan_retail/insert_barang_temp_by_id/<?php echo date("Y-m-d") ?>',
              type: 'post',
              data: 'barcode ='+barcode+'&&barang='+id_barang,
              success: function(data){
                  tableTemp();
                  panelBarang();
                  addFuncDeleteBarangT();
              }
          });
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
        $('.numpad').click(function() {
          //$('.modal-backdrop').appendTo('body');
        });
        $("#navbar").hide();
        $("#sidebar").hide();
        $(".page-header").hide();
        $(".footer").hide();
        $("div").removeClass('main-container');
        $("div").removeClass('main-content');
        $(".aside-trigger").click();
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

        //TOUCHSCREEN TOGGLE
        var toggle = $('#touchToggle');
        toggle.change(function() {
          $('#keyboard').toggleClass('d-none');
          $('.page-content').toggleClass('bgc-blue');
          $('#touchscreen').toggleClass('d-block');
          /*
          if(toggle.val('true')){
            alert('active');
          }else{
            alert('close');
          }*/
        });
        //END TOUCH TOGGLE
        //MEMBER TOGGLE
        $('#memberToggle').change(function(e){
          e.preventDefault();
          //opsi pilihan member
          var opsi_pilihan = '<?php echo $opsi_pilihan->opsi;?>';
          //end 
          var mt = $(this).is(':checked');
          if (mt) {
            statusMember(opsi_pilihan);
          } else {
            statusBukanMember(opsi_pilihan);
            $("#member_status").val('false');
          }
        });

        $(document).on('change','#typePembayaran',function() {
          if($(this).val()==2){
            $('.kredit').html('\
              <input type="date" style="width:100%">\
            ');
          }else{
            $('.kredit').html('');
          }
        });
        var opsi_pilihan = '<?php echo $opsi_pilihan->opsi;?>';
        if(opsi_pilihan == 1){
          $(document).on('change','#pembeli',function(e){
              e.preventDefault();
              if($(this).val() != ''){
                addOptionPembayaran();
                $.ajax({
                  url: '<?php echo base_url("penjualan_retail/getMemberById");?>',
                  type: 'post',
                  data: 'id='+$(this).val(),
                  success:function(response){
                    var data = JSON.parse(response);
                      $("#id_pembeli").val(data.id_member);
                     // $(".pembeli").val(data.nama);
                      $("#pembeli2").val(data.nama);
                      $("#deposit").val(data.deposit);
                      $("#deposit2").val(data.deposit);
                      $("#member_status").val('true');
                      //$("#deposit_pakai").val(data.deposit);
                      $("#deposit_pakai2").val(data.deposit);
                      $(".statPembeli").show();
                      $(".statPembeli").html("<div class='' style='padding:0px;'>"+data.deposit+"</span>");
                      tableTemp();
                      panelBarang();
                  }
                });
              }
              else{
                $("#id_pembeli").val('');
               // $(".pembeli").val(data.nama);
                $("#pembeli2").val('');
                $("#deposit").val('');
                $("#deposit2").val('');
                $("#member_status").val('true');
                //$("#deposit_pakai").val('');
                $("#deposit_pakai2").val('');
                $(".statPembeli").show();
                $(".statPembeli").html("");
                $("#member_status").val('false');
                removeOptionPembayaran();
                $(".panelDeadline").hide();
                tableTemp();
                panelBarang();

              }
          });
        }
        //END MEMBER TOGGLE
        if (opsi_popup==1) {
          $("#id-btn-dialog2").on('click', function(e) {
            e.preventDefault();
            var total = $("#total").val().replace(/\./g,'');
            var pembayaran = $(".pembayaran").val();
            if(total > 0){
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
                addKeterangan("Belum ada barang yang dipilih!");
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
                  addKeterangan("Belum ada barang yang dipilih!");
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
                addKeterangan("Belum ada barang yang dipilih!");
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
                addKeterangan("Belum ada barang yang dipilih!");
              }
            } else {
              $("#modal-mekanik").modal('show');
            }
          });
        }
        /* POPUP DIALOG */

        $('.cancel').click(function() {
          $('.modal-backdrop').hide();
        });
        
        // FULLSCREEN //


        // TAMBAH KETERANGAN //
        var addKeterangan = function(text, stat = 'error'){
            var text = text.toString();
            var t;
            if(stat == 'danger' || stat == 'error'){
              t = 'danger';
            } else if(stat == 'info') {
              t = 'info';
            } else if(stat == 'success') {
              t = 'success';
            } else {
              t = 'info';
            }
            $("#keterangan").html("<div class='alert alert-"+t+"'>"+text+"<div>");
        }
        // TAMBAH KETERANGAN //

        // HAPUS KETERANGAN //
        var clearKeterangan = function(text){
            $("#keterangan").html("");
        }
        // HAPUS KETERANGAN //

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
                          //addKeterangan("No Faktur Berubah menjadi : "+no_faktur_baru, 'success');
                        }
                    }
                }
            });
        }
        // CEK NO FAKTUR //


        // MODUL 2 //

        $(".status_member").change(function() {
            var sm = $(this).val();
            $(".status_member2").val(sm);
        });

        function statusBukanMember(i) {
            $(".status_member").find('option[value="1"]').prop('selected', true);
            $("#memberToggle").prop('checked', false);
            $(".default_pembeli").html('<input type="text" class="form-control btn-round w-98 bukan_member" id="bukan_member" placeholder="Nama Pembeli" /></div>');
            $(".default_pembayaran").html('<input type="text" class="form-control btn-round w-98 alamat_pembeli" id="alamat_pembeli" placeholder="Alamat Pembeli" /><input type="hidden" class="form-control btn-round w-98 pembayaran" id="pembayaran" value="1" />');
            $(".status_member").find("option[value='1']").attr('selected', 'selected');
            $("input[id*=bukan_member]").on('keyup', function(e){
                 var bm = $(this).val();
                 $("#nama_bukan_member").val(bm);
            });
            $("input[id*=alamat_pembeli]").on('keyup', function(e){
                 var ap = $(this).val();
                 $("#alamat_bukan_member").val(ap);
            });
            $("#id_pembeli").val('');
            $("#pembeli2").val('');
            $(".pembayaran2").val('1');
            $(".panelDeadline").hide();
            $('#diskon_member').val(' ');
        }

        function statusMember(i) {
            $(".status_member").find('option[value="2"]').prop('selected', true);
            $("#memberToggle").prop('checked', true);
            if(i == 1){
              $.ajax({
                url : '<?php echo base_url("penjualan_retail/datamember");?>',
                type: 'post',
                success : function(response){
                  $(".default_pembeli").html(response);
                } 
              });
            }else{
              $(".default_pembeli").html('<input type="text" class="form-control btn-round w-98 pembeli" id="pembeli" placeholder="Nama Pembeli" value="<?php echo $pembeli; ?>" /><div id="statPembeli" class="statPembeli"></div>');
            }
            $(".default_pembayaran").html('<select class="form-control btn-round w-98 pembayaran" id="pembayaran"><option value="1">TUNAI</option></select>');
            $(".status_member").find("option[value='2']").attr('selected', 'selected');
            defPembeli();
        }
        $(".status_member").change(function() {
            var id_status_member = $(this).val();
            if (id_status_member == '1') { // BUKAN MEMBER
                statusBukanMember();
            } else if (id_status_member == '2') {
                statusMember();
            }
        });
        statusBukanMember(); // SET DEFAULT

        // MODUL 2 //


        /* 
          SUBMIT
          FORM
          PENJUALAN 
        */
        var refreshTouch = function() {
            tableTemp();
            panelBarang();
            $("#total-display").html("");
        }
        var refresh = function() {
            $("#barcode").val("");
            $("#barang").val("");
            $("#id_pembeli").val("");
            $(".pembeli").val("");
            $("#pembeli2").val("");
            $("#bukan_member").val("");
            $("#alamat_pembeli").val("");
            $("#nama_bukan_member").val("");
            $("#alamat_bukan_member").val("");
            $(".pembayaran option[value='2']").remove();
            $(".pembayaran option[value='3']").remove();
            $(".pembayaran2").val("1");
            $(".deadline").val("");
            $(".deadline2").val("");
            $("#deposit").val("");
            $("#deposit2").val("");
            $("#deposit_pakai").val("");
            $("#deposit_pakai2").val("");
            $("#total").val("0");
            $("#bayar").val("");
            $("#kurang").val("");
            $("#sisa").val("");
            $("#statBayar").val("0");
            $("#keterangan").html("");
            $("#panelTotal").val("0");
            $("#panelTotal2").val("0");
            $("#panelDeposit").hide();
            $(".panelDeadline").hide();
            $("#showErrorDeposit").hide();
            $("#cbDeposit").hide();
            $(".statPembeli").hide();
        }


        $("#formPenjualan").submit(function(e){
            e.preventDefault();
            $("#btnSubmit").attr("disabled","disabled");
            cekFaktur("1");
            var data = $("#formPenjualan,#formMekanik").serialize();
            var id_pembeli = $("#id_pembeli").val();
            var statBayar = $("#statBayar").val();
            var total = $("#total").val().replace(/\./g,'');
            if(total > 0){
                if(id_pembeli>0){
                    // ada member //
                    var pembayaran = $(".pembayaran").val();
                    if(pembayaran=="1"){
                        // tunai //
                        if(statBayar=="1"){
                            prosesSubmit(data);
                        } else if(statBayar=="2"){
                            prosesSubmit(data);
                        } else if(statBayar=="3"){
                            addKeterangan("Pembayaran Masih Kurang!");
                            $("#btnSubmit").removeAttr("disabled");
                        }
                    } else if(pembayaran=="2"){
                        // kredit //
                        prosesSubmit(data);
                    } else if(pembayaran=="3"){
                        // deposit //
                        if(statBayar=="1"){
                            prosesSubmit(data);
                        } else if(statBayar=="2"){
                            prosesSubmit(data);
                        } else if(statBayar=="3"){
                            addKeterangan("Pembayaran Masih Kurang!");
                            $("#btnSubmit").removeAttr("disabled");
                        }
                    }
                } else {
                    // tidak ada member //
                    if(statBayar=="1"){
                        prosesSubmit(data);
                    } else if(statBayar=="2"){
                        prosesSubmit(data);
                    } else if(statBayar=="3"){
                        addKeterangan("Pembayaran Masih Kurang!");
                        $("#btnSubmit").removeAttr("disabled");
                    }
                }
            } else {
                addKeterangan("Belum memilih barang!");
                $("#btnSubmit").removeAttr("disabled");
            }

        });

        function popupform(windowname)
        {
          if (!window.focus)
            return true;
            window.open(windowname, windowname, 'directories=no,location=no,menubar=no,resizable=no,status=no,toolbar=no');
            return true;
        }

        var prosesSubmit = function(data){
            $("#btnSubmit").attr("disabled", "disabled");
            var no_faktur = $("#no_faktur").val();
            $.ajax({
                url: '<?php echo base_url() ?>penjualan_retail/create_action',
                type: 'post',
                async: false,
                data: data,
                success: function(response){
                    addKeterangan(response);
                    var bayar = $("#bayar").val().replace(/\./g,'');
                    cekFaktur();
                    var parsed_data = JSON.parse(response);
                    if (typeof(parsed_data.no_faktur)!=='undefined'){
                      no_faktur = parsed_data.no_faktur;
                    }
                    $("#btnSubmit").removeAttr("disabled");
                    $("#showFaktur").html(no_faktur);
                    $("#showDone").show().delay(1000).fadeOut();
                    $("#btnSubmit").removeAttr("disabled");
                    var myWindow = window.open("<?php echo base_url() ?>penjualan_retail/cetak_nota_penjualan/"+no_faktur, "MsgWindow", "width=300,height=400");
                    $('#btnBatal').click();
                    refresh();
                    refreshTouch();
                },
                error: function(err){
                    addKeterangan("Masalah Submit Form Penjualan!");
                    $("#btnSubmit").removeAttr("disabled");
                }
            });
        }
        /* 
          SUBMIT
          FORM
          PENJUALAN 
        */

        // PEMBAYARAN //
        var pembayaran = function() {
            var cb = $(".pembayaran").val();
            var deposit = parseFloat($("#deposit").val().replace(/\./g,''));
            var deposit_pakai = parseFloat($("#deposit_pakai").val().replace(/\./g,''));
            var bayar = $("#bayar").val().replace(/\./g,'');
            var total = $("#total").val().replace(/\./g,'');
            if(cb=="3"){
                var sisa = total - bayar - deposit_pakai;
                if(deposit_pakai > deposit){
                  deposit_pakai = deposit;
                  $("#showErrorDeposit").show();
                  $("#showErrorDeposit").html("<div class='alert alert-danger'>Pemaikaian Deposit tidak boleh lebih dari Rp "+number_format(deposit*1,0,',','.')+",-</div>");
                } else {
                  $("#showErrorDeposit").hide();
                }
                if(isNaN(deposit_pakai)){
                  deposit_pakai = "0";
                }
            } else {
                var sisa = total - bayar;
            }

            var statBayar = 0;
            if(sisa == 0){
              // pas //
              $("#label-sisa").html("Pas");
              sisatopositif = sisa;
              statBayar = 1;
            } else if(sisa < 0){
              // ada sisa / kembalian //
              $("#label-sisa").html("Kembali");
              sisatopositif = sisa * -1;
              statBayar = 2; 
            } else {
              // bayar kurang //
              $("#label-sisa").html("Kurang");
              sisatopositif = sisa;
              statBayar = 3;
            }

            $("#deposit_pakai").val(number_format(deposit_pakai*1,0,',','.'));
            $("#deposit_pakai2").val(number_format(deposit_pakai*1,0,',','.'));
            $("#bayar").val(number_format(bayar*1,0,',','.'));
            $("#sisa").val(number_format(sisatopositif*1,0,',','.'));
            $("#statBayar").val(statBayar);
        };

        $("#bayar").on("keyup", function() {
            pembayaran();
        });

        $("#deposit_pakai").on("keyup", function() {
            pembayaran();
        });

        var emptyDepositPakai = function() {
          $("#deposit_pakai").val(0);
          $("#deposit_pakai2").val(0);
        }

        var valDepositPakai = function() {
          var deposit = $("#deposit").val().replace(/\./g,'');
          $("#deposit_pakai").val(number_format(deposit*1,0,',','.'));
          $("#deposit_pakai2").val(number_format(deposit*1,0,',','.'));
        }
        // PEMBAYARAN //


        // TAMPIL BARANG TEMP //
        var panelBarang = function() {
          var mB_sT = $('#member_status').val();
          var id_member = $('#id_pembeli').val();
          $.ajax({
            url: '<?php echo base_url() ?>penjualan_retail/panelPenjualan',
            type : 'post',
            data: 'member='+mB_sT+'&&id_member='+id_member,
            success: function(response) {
              var parsed_data = JSON.parse(response);
              $("#panelBarang").html(parsed_data.panelBarang);
              $("#panelTotal").html(parsed_data.panelTotal);
              $("#panelTotal2").html(parsed_data.panelTotal);
              $("#total").val(parsed_data.panelTotal);
              data_touch_ubah = parsed_data.data;
              addFuncDeleteBarang();
              pembayaran();
            }
          });
        }
        panelBarang();
        // TAMPIL BARANG TEMP //


        // DELETE BARANG //
        var addFuncDeleteBarang = function() {
              var ccount = $('tr[id*=rowBarang').length; 
              for(var i = 1; i <= ccount; i++) {
                  $('#removeBarang_'+i).click(function(event) {
                      var id_kategori_2 = $('#kat-temp').val();
                      dp(0, id_kategori_2);
                      var id_orders_temp = $(this).val();
                      $.ajax({
                          url: '<?php echo base_url() ?>penjualan_retail/delete_orders_temp/'+id_orders_temp,
                          type: 'post',
                          success: function() {
                              $('#rowBarang_'+id_orders_temp).remove();
                              panelBarang();
                              tableTemp();
                          }
                      });
                  });
              };
        }
        // DELETE BARANG //


        // SUBMIT BARCODE //
        var submitForm = function() {
            var cari = $("#barang").val();
            var barcode = $("#barcode").val();
            var test = cari + "" + barcode;
            if(test == "") {
            } else {
              $.ajax({
                url: '<?php echo base_url() ?>penjualan_retail/insert_barang_temp/<?php echo date("Y-m-d") ?>',
                type: 'post',
                data: $("#formBarcode").serialize(),
                success: function(data) {
                  var parsed_data = JSON.parse(data);
                  var response = parsed_data.response;
                  var barang = parsed_data.data_barang;
                  if(response[0]=="0"){
                    // barang tidak tersedia //
                    addKeterangan('"'+cari+'" Barang Tidak Tersedia!');
                    $("#barcode").val("");
                    $("#barang").val("");
                    panelBarang();
                    tableTemp();
                  } else if(response[0]=="1") {
                    // berhasil //
                    $("#barcode").val("");
                    $("#barang").val("");
                    panelBarang();
                    tableTemp();
                    clearKeterangan();
                  } else if(response[0]=="2") {
                    // stok barang habis //
                    cari = barang;
                    addKeterangan('"'+cari+'" Barang telah Habis!');
                    $("#barcode").val("");
                    $("#barang").val("");
                    panelBarang();
                    tableTemp();
                  } else if(response[0]=="3") {
                    // barang telah kadaluarsa //
                    cari = barang;
                    addKeterangan('"'+cari+'" Barang telah kadaluarsa!');
                    $("#barcode").val("");
                    $("#barang").val("");
                    panelBarang();
                    tableTemp();
                  } else {
                    // error //
                    addKeterangan('Error! \n\n"'+response+'"');
                  }
                },
                error: function(err){
                  addKeterangan("Error Submit Form Barcode");
                }
              });
            }
        }

        $("#formBarcode").submit(function(e){
            e.preventDefault();
            submitForm();
        });
        /*
        $("#barang").change(function(e){
            e.preventDefault();
            submitForm();
        });
        */
        // SUBMIT BARCODE //


        // SUBMIT BARANG //
        var submitFormBarang = function() {
            $.ajax({
              url: '<?php echo base_url() ?>penjualan_retail/update_barang_temp',
              type: 'post',
              data: $("#formBarang").serialize(),
              success: function(response) {
                clearKeterangan();
                var parsed_data = JSON.parse(response);
                for (var i=0; i<parsed_data.length; i++) {
                  if(parsed_data[i].response=="2"){
                    addKeterangan('"'+parsed_data[i].nama_produk+'" Stok tidak tersedia');
                  }
                };
                panelBarang();
                tableTemp();
              }, error: function(e){
                alert("error");
              }
            });
        }

        $("#formBarang").submit(function(e) {
            e.preventDefault();
        });

        var submitTouchBarang = function() {
            $.ajax({
              url: '<?php echo base_url() ?>penjualan_retail/update_barang_temp',
              type: 'post',
              data: $("#formTouchBarang").serialize(),
              success: function(response){
                clearKeterangan();
                var parsed_data = JSON.parse(response);
                for (var i=0; i<parsed_data.length; i++) {
                  if(parsed_data[i].response=="2"){
                    addKeterangan('"'+parsed_data[i].nama_produk+'" Stok tidak tersedia');
                  }
                };
                tableTemp();
                panelBarang();
              }, error: function(e){
                alert("error");
              }
            });
        }

        $("#formTouchBarang").submit(function(e){
            e.preventDefault();
        });

        $(document).on('change',function() {
            submitFormBarang();
            submitTouchBarang();
        });
        // SUBMIT BARANG //

        // AUTO COMPLETE BARCODE //
        var input_barcode = function() {
          $("#status_barcode").val(1);
          $("#status_barcode option[value=1]").prop('selected', true);
          $("#barang").val('');
          $("#barang").attr('placeholder', 'Barcode');
          $("#barang").autocomplete({
              source: function (request, response) {
              },
              minLength: 1,
              delay: 0,
              autoFocus: true
          });
        }
        var input_nama_barang = function() {
          $("#status_barcode").val(2);
          $("#status_barcode option[value=2]").prop('selected', true);
          $("#barang").val('');
          $("#barang").attr('placeholder', 'Nama Barang');
          $("#barang").autocomplete({
              source: function (request, response) {
                  $.ajax({
                    url: '<?php echo base_url() ?>penjualan_retail/json_produk',
                    type: 'post',
                    data: 'term='+request.term+'&tgl=<?php echo date("Y-m-d") ?>',
                    success: function(data){
                      response($.map(data, function (value, key) {
                          return {
                              value: value.value,
                              label: value.label,
                          };
                      }));
                    }
                  });
              },
              minLength: 1,
              delay: 0,
              autoFocus: true,
              select: function(event, ui){
                  $("#barcode").val(ui.item.value);
                  $("#barang").val(ui.item.nama_produk);
                  submitForm();
                  return false;
              }
          });
        }
        $("select[id*=status_barcode]").on('change', function(e){
          e.stopImmediatePropagation();
          var s = $(this).val();
          if (s == '1') {
            input_barcode();
          } else {
            input_nama_barang();
          }
        });
        input_barcode();
        // AUTO COMPLETE BARCODE //

        // DEADLINE //
        $(".deadline").keyup(function() {
          var n = $(this).val();
          $(".deadline2").val(n);
        });
        var emptyDeadline = function() {
          $(".deadline").val("");
          $(".deadline2").val("");
        }
        var valDeadline = function() {
          var hr = "30";
          $(".deadline").val(hr);
          $(".deadline2").val(hr);
        }
        // DEADLINE //

        // DEPOSIT //
        var addOptionPembayaran = function() {
            $(".pembayaran option[value='2']").remove();
            $(".pembayaran option[value='3']").remove();
            $('.pembayaran').append($('<option>', {
                value: 2,
                text: 'KREDIT'
            }));
            changePembayaran();
        }

        var removeOptionPembayaran = function() {
            $(".pembayaran option[value='2']").remove();
            $(".pembayaran option[value='3']").remove();
            $(".panelDeadline").hide();
            $("#panelDeposit").hide();
        }

        function changePembayaran() {
            $(".pembayaran").change(function() {
                var cb = $(this).val();
                $(".pembayaran2").val(cb);
                var statBayar = $("#statBayar").val();
                if(cb=="3"){
                  $("#panelDeposit").show();
                  $(".panelDeadline").hide();
                  $("#cbDeposit").show();
                  emptyDeadline();
                  valDepositPakai();
                } else if(cb=="2"){
                  $("#panelDeposit").hide();
                  $(".panelDeadline").show();
                  $("#cbDeposit").hide();
                  valDeadline();
                  emptyDepositPakai();
                } else{
                  $("#panelDeposit").hide();
                  $(".panelDeadline").hide();
                  $("#cbDeposit").hide();
                  emptyDeadline();
                  emptyDepositPakai();
                }
                pembayaran();
            });
        }
        <?php if ($id_modul!='2') { ?>
          changePembayaran();
        <?php } ?>
        // DEPOSIT //

        // AUTO COMPLETE PEMBELI //
        var data_pembeli = [
            <?php foreach ($data_pembeli as $key): ?>
                {value:<?php echo $key->id_member ?>, label:"<?php echo $key->nama ?>", "deposit":"<?php echo number_format($key->deposit,0,',','.') ?>", "alamat":"<?php echo $key->alamat ?>"},
            <?php endforeach ?>
        ];

        function defPembeli() {
            $("#nama_bukan_member").val("");
            $("#alamat_bukan_member").val("");

            $(".pembeli").autocomplete({
                source: data_pembeli,
                delay: 0,
                autoFocus: true,
                select: function(event, ui){
                    $("#id_pembeli").val(ui.item.value);
                    $(".pembeli").val(ui.item.label);
                    $("#pembeli2").val(ui.item.label);
                    $("#deposit").val(ui.item.deposit);
                    $("#deposit2").val(ui.item.deposit);
                    $("#deposit_pakai").val(ui.item.deposit);
                    $("#deposit_pakai2").val(ui.item.deposit);
                    $("#member_status").val('true');
                    $(".statPembeli").show();
                    $("#pembeli").attr('data-id',ui.item.id_member);
                    $(".statPembeli").html("<div class='' style='padding:0px;'>"+ui.item.alamat+"</span>");
                    addOptionPembayaran();
                    return false;
                }
            });

            $(".pembeli").change(function() {
                var pembeli = $(this).val();
                if (pembeli.length > 0) {
                    cariPembeli();
                } else {
                    $("#id_pembeli").val('');
                    $("#deposit").val('');
                    $("#deposit2").val('');
                    $("#deposit_pakai").val('');
                    $("#deposit_pakai2").val('');
                }
            });

            function cariPembeli() {
                var pembeli = $(".pembeli").val();
                var id_hasil = '';
                var deposit_hasil = '0';
                for (var i = 0;  i < data_pembeli.length; i++) {
                    if(pembeli == data_pembeli[i].label){
                      id_hasil = data_pembeli[i].value;
                      deposit_hasil = data_pembeli[i].deposit;
                      $(".statPembeli").html("<div class='label label-primary label-addr'>"+data_pembeli[i].alamat+"</span>");
                    }
                };
                $("#id_pembeli").val(id_hasil);
                $("#deposit").val(deposit_hasil);
                $("#deposit2").val(deposit_hasil);
                $("#deposit_pakai").val(deposit_hasil);
                $("#deposit_pakai2").val(deposit_hasil);
                if(id_hasil!=''){
                  $(".statPembeli").show();
                  addOptionPembayaran();
                } else {
                  $(".statPembeli").show();
                  $(".statPembeli").html("<div class='alert alert-danger'>Belum menjadi Member</div>");
                  removeOptionPembayaran();
                }
            }
        }
        // AUTO COMPLETE PEMBELI //


        /* KEYBOARD ACTION */
        var tampilPopUp = function() {
          $("#id-btn-dialog2").click();
        }

        var keyDelete = function(e){
          closePopUp();
          $.ajax({
            url: '<?php echo base_url() ?>penjualan_retail/delete_orders_temp_oto',
            type: 'post',
            data: '',
            success: function(data){
              panelBarang();
              tableTemp();
            }
          });
        }

        var keyInsert = function() {
          closePopUp();
          $("#barang").focus();
        }

        var keyEnd = function() {
          var b = $("#barang:focus").val();
          var bcd = $("#barcode").val();
          if(typeof(b) == 'undefined') {
            //alert("Tidak fokus");
            tampilPopUp();
          } else {
            //alert("focus");
            if(bcd == ""){
              //alert("Kosong");
              tampilPopUp();
            } else {
              //alert("isi");
            }
          }
        }
        $('body').bind('keydown','end',function(e){
          e.stopImmediatePropagation();
          $('#id-btn-dialog3').click();
        });
        $('body').bind('keydown','enter',function(e){
          e.stopImmediatePropagation();
          $('#id-btn-dialog3').click();
        });
        var keyEnter = function() {
          var lng = $("[id*=jumlah_input]:focus").length;
          if(lng < 1){
            var b = $("#barang:focus").val();
            var bcd = $("#barcode").val();
            var bayar = $("#bayar").val().replace(/\./g,'');
            if(typeof(b) == 'undefined') {
              // alert("Tidak fokus");
              if(bayar > 0){
                $("#btnSubmit").click();
              } else {
                tampilPopUp();
              }
            } else {
              //alert("focus");
              if(bcd == ""){
                //alert("Kosong");
                if(bayar > 0){
                  $("#btnSubmit").click();
                } else {
                  tampilPopUp();
                }
              } else {
                //alert("isi");
              }
            }
          }
        }

        function closePopUp() {
          $("#btnBatal").click();
        }

        /* KEYBOARD ACTION */


        // FULLSCREEN //
      
        var fs = function() {
          
            var docElm = document.documentElement;
            if (docElm.requestFullscreen) {
                docElm.requestFullscreen();
            }
            else if (docElm.mozRequestFullScreen) {
                docElm.mozRequestFullScreen();
            }
            else if (docElm.webkitRequestFullScreen) {
                docElm.webkitRequestFullScreen();
            }
            else if (docElm.msRequestFullscreen) {
                docElm.msRequestFullscreen();
            }
            
            /*
            var elem = document.getElementById("cihtml");
            if (elem.requestFullscreen) {
              elem.requestFullscreen();
            } else if (elem.msRequestFullscreen) {
              elem.msRequestFullscreen();
            } else if (elem.mozRequestFullScreen) {
              elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) {
              elem.webkitRequestFullscreen();
            }
            */

            $("#closeFullscreen").show();
            
        }
        

        //if(isMobileDevice() == true){
        $("body").click(function() {
            fs();
        });
        
        $(document).on('change, keyup',function() {
            fs();
        });
        //}
      
        $(document).ready(function() {
          $("#btnCloseFullscreen").on("click",function() {
              if (document.exitFullscreen) {
                document.exitFullscreen();
              } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
              } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
              } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
              }
          });
        });

    });

</script>
<!-- JQUERY -->

<?php } ?>