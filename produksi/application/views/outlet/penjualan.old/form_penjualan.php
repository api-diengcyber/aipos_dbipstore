<style>

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
      color:black;
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
    <div class="row" id="keyboard">
      <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="varchar"><b>Tgl Order</b> <?php echo form_error('tgl_order') ?></label>
                  <input type="text" class="form-control tgl_penjualan" id="datepicker1" placeholder="Tgl Order" value="<?php echo $tgl_order; ?>" />
                </div>
              </div>
              <div class="col-xs-6" style="padding-left:0px;">
                <div class="form-group">
                  <label for="varchar"><b>No Faktur</b> <?php echo form_error('no_faktur') ?></label>
                  <input type="text" class="form-control" id="tampil_no_faktur" placeholder="No Faktur" value="<?php echo $no_faktur; ?>" readonly />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
                <div class="form-group">
                  <select class="status_member" style="width:100%;">
                      <option value="1">BUKAN MEMBER</option>
                      <option value="2">MEMBER</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-4" style="padding-left:0px;">
                <div class="form-group">
                  <input type="text" class="form-control nama_pembeli" autocomplete="off" placeholder="Nama Pembeli"/>
                </div>
              </div>
              <div class="col-xs-5" style="padding-left:0px;">
                <div class="form-group">
                  <input type="text" class="form-control alamat_pembeli" autocomplete="off" placeholder="Alamat Pembeli"/>
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
              <!-- <div class="col-md-4 panelSales hide">
                <div class="form-group">
                  <select name="id_sales" class="form-control">
                    <option value="">-- Pilih Sales --</option>
                  </select>
                </div>
              </div> -->
              <div class="col-md-3 panelDeadline hide" style="padding-left:0px;">
                <div class="form-group">
                  <input type="text" class="form-control deadline" placeholder="Hari" maxlength="11" />
                </div>
              </div>
            </div>
            <div class="row panelPembayaranLainnya hide">
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" name="nominal_tunai" id="nominal_tunai" class="form-control text-right numbering" placeholder="Nominal Tunai" />
                </div>
              </div>
              <div class="col-md-3" style="padding-left:0px;">
                <div class="form-group">
                  <input type="text" name="nominal_transfer" id="nominal_transfer" class="form-control text-right numbering" placeholder="Nominal Transfer" />
                </div>
              </div>
              <div class="col-md-2" style="padding-left:0px;">
                <div class="form-group">
                  <select name="akun_transfer" id="akun_transfer" class="" style="width:100%;">
                    <?php foreach ($data_akun_transfer as $key): ?>
                    <option value="<?php echo $key->kode ?>"><?php echo $key->akun ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3" style="padding-left:0px;">
                <div class="form-group">
                  <input type="text" name="nominal_hutang" id="nominal_hutang" class="form-control text-right numbering" placeholder="Nominal Hutang" readonly />
                </div>
              </div>
              <div class="col-md-1" style="padding-left:0px;">
                <div class="form-group">
                  <input type="text" class="form-control deadline2" placeholder="Hari" value="30" maxlength="11" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <select class="status_barcode" style="width:100%;">
                    <option value="1">BARCODE</option>
                    <option value="2" selected>NAMA BARANG</option>
                  </select>
                </div>
              </div>
              <div class="col-md-8" style="padding-left:0px;">
                <div class="form-group">
                  <form action="#" class="form_barang" method="post">
                    <input type="text" class="form-control nama_barang" name="nama_barang" placeholder="Barcode / Nama Barang" autocomplete="off" autofocus />
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Ongkos Kirim</label>
              <input type="text" class="form-control text-right" id="ongkos_kirim"></input>
            </div>
            <div class="form-group">
              <h3 style="color:red;font-weight:50;"><b>GRAND TOTAL</b></h3>
              <h4 class="total_asli hide" style="color:black;font-weight:bold;font-family:sans-serif;margin-bottom:0px;"><span class="diskon_member">10%</span> <span style="float:right;text-decoration:line-through;"><span class="total_asli total_asli_value" style="text-decoration:line-through;">0</span>,- </span></h4>
              <h2 style="color:black;font-weight:bold;font-family:impact;margin-top:0px;">&nbsp;<span style="float:right;"><span class="total">0</span>,- </span></h2>
              <!-- <h2 style="color:black;font-weight:bold;font-family:impact;margin-top:0px;">&nbsp;<span style="float:right;"><span>PPN 10 %</span></span></h2>
              <h1 style="color:black;font-weight:bold;font-family:impact;margin-top:0px;">Rp <span style="float:right;"><span class="total_ppn">0</span>,- </span></h1> -->
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

<?php $id_member = $this->input->get('id_member', true); ?>
<script type="text/javascript">
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

  statusMember();
  $(".status_member").on('change', function() {
    statusMember();
  });

  // $(".status_member").on('change.select2', function() {
  //   alert("A");
  // });
  // $(".status_member").html('<option value="1">A</option>');
  // $(".status_member").trigger('change');
  // $(".status_member").trigger('change.select2');

  // var datac = [{"id":1,"text":"black"}, {"id":2,"text":"blue"}];
  // $(".status_member").select2({
  //   data:  datac[0]
  // });  

  function refresh() {
    $(".status_member").val(1);
    $(".status_member").trigger("change");
    // $(".status_member").trigger("change.select2");
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
    // statusMember();
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
    var status_member = $(".status_member").find(":selected").val();
    var var_data_pembeli = [];
    if (status_member=="1") { // BUKAN MEMBER
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
  
  $("#ongkos_kirim").on("keyup", function(){
    var val = $(this).val();
    loadTemp();
  });

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
    $.ajax({
      url: '<?php echo base_url() ?>outlet/penjualan_retail/load_temp',
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
          var html_pil_harga = '<select class="pil_harga" data-id="'+temp[item].id_orders_temp+'" style="border-width:0px;">';
          for (var item_p in pil_harga) {
            var selected = "";
            if (item_p==temp[item].pil_harga) {
              selected = "selected";
            }
            html_pil_harga += '<option value="'+item_p+'" '+selected+'>'+pil_harga[item_p]+'</option>';
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
                      <th class="text-right">'+tandaPemisahTitik(Math.round(temp[item].sub_total*1))+'</th>\
                      <th class="text-center"><button type="button" class="btn btn-xs btn-danger no-border btn-delete" data-id="'+temp[item].id_orders_temp+'" data-stok="'+temp[item].stok+'" style="padding-top:0px;padding-bottom:0px;"><i class="fa fa-remove"></i></button></th>\
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
      }
    });
  }

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
</script>