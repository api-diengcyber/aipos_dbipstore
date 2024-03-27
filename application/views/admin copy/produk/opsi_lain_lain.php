
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Opsi Stock</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
              <form class="form-search">
                <span class="input-icon">
                  <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                  <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
              </form>
            </div><!-- /.nav-search -->
          </div>

          <div class="page-content" style="padding:0px">
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


            <div class="row" style="margin-top:40px;">
              <div class="col-md-8" style="padding:20px">
                <div class="page-header">
                  <h1>
                    Tanggal sekarang <?php echo date('d-m-Y H:i:s') ?>
                  </h1>
                </div><!-- /.page-header -->

                <div class="row">
                  <div class="col-xs-12" style="padding-left:20px">
                    <!-- PAGE CONTENT BEGINS -->

                    <form action="<?php echo base_url('admin/pengaturan/tanggal_change');?>" method="post">
                        <div class="form-group">
                            <label for="varchar">Tanggal </label>
                            <input type="text" class="form-control" name="tgl" id="datepicker2" placeholder="dd-mm-yyyy" autocomplete="off" value="<?php echo date('d-m-Y') ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Jam </label>
                            <input type="text" class="form-control" name="jam" id="timepicker1" placeholder="dd-mm-yyyy" autocomplete="off" />
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <!-- PAGE CONTENT ENDS -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
                <hr>
                <div class="page-header">
                  <h1>
                    Opsi PPN
                  </h1>
                </div><!-- /.page-header -->
                <div class="row">
                  <div class="col-xs-12">
                    <div class="col-md-12">
                        <div class="input-group">
                          <input type="text" class="form-control" name="ppn" id="ppn" placeholder="%" value="<?php echo !empty($ppn) ? $ppn->opsi : '' ?>">
                          <span id="opsiPpn" class="input-group-addon" style="cursor:pointer;background-color:#438eb9;color:white" id="basic-addon1"><i class="fa fa-check"></i></span>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="page-header">
                  <h1>
                    Opsi Stok
                  </h1>
                </div><!-- /.page-header -->
                <div class="row">
                  <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                        <div class="col-md-12">
                          <select name="opsi_stok" id="opsiStock" class="form-control">
                            <?php if($opsi_stok->opsi == 0){ ?>
                            <option value="0" selected>Batasi stok</option>
                            <option value="1">Abaikan stok</option>
                            <option value="2">Tanpa Stok</option>
                            <?php } else if($opsi_stok->opsi == 1){ ?>
                            <option value="0">Batasi stok</option>
                            <option value="1" selected>Abaikan stok</option>
                            <option value="2">Tanpa Stok</option>
                            <?php }else{ ?>
                            <option value="0">Batasi stok</option>
                            <option value="1">Abaikan stok</option>
                            <option value="2" selected>Tanpa Stok</option>
                            <?php } ?>
                          </select>
                        </div>

                    <!-- PAGE CONTENT ENDS -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="page-header">
                  <h1>
                    Opsi Pilihan Produk
                    
                  </h1>
                </div><!-- /.page-header -->
                <div class="row">
                  <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                        <div class="col-md-12">
                          <select name="opsi_tProduk" id="opsiTProduk" class="form-control">
                            <?php if($opsi_tproduk->opsi == 0){ ?>
                            <option value="0" selected>Menggunakan Gambar</option>
                            <option value="1">Menggunakan List Tulisan</option>
                            <?php } else { ?>
                            <option value="0">Menggunakan Gambar</option>
                            <option value="1" selected>Menggunakan List Tulisan</option>
                            <?php } ?>
                          </select>
                        </div>
                       <hr>

                    <!-- PAGE CONTENT ENDS -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="page-header">
                  <h1>
                    Opsi Diskon Member
                    
                  </h1>
                </div><!-- /.page-header -->
                <div class="row">
                  <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                        <div class="col-md-12">
                          <select name="opsi_diskon" id="opsiDiskon" class="form-control">
                            <?php if($opsi_diskon->opsi == 0){ ?>
                            <option value="0" selected>Menggunakan Harga Member / Harga 3</option>
                            <option value="1">Menggunakan Diskon</option>
                            <?php } else { ?>
                            <option value="0">Menggunakan Harga Member / Harga 3</option>
                            <option value="1" selected>Menggunakan Diskon</option>
                            <?php } ?>
                          </select>
                        </div>
                       <hr>

                    <!-- PAGE CONTENT ENDS -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="page-header">
                  <h1>
                    Pilihan Member
                  </h1>
                </div><!-- /.page-header -->
                <div class="row">
                  <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                        <div class="col-md-12">
                          <select name="opsi_pilihan" id="opsiPilihan" class="form-control">
                            <?php if($opsi_pilihan->opsi == 1){ ?>
                            <option value="1" selected>Select Box</option>
                            <option value="0">Input Nama</option>
                            <?php } else { ?>
                            <option value="1">Select Box</option>
                            <option value="0" selected>Input Nama</option>
                            <?php } ?>
                          </select>
                        </div>
                       <hr>

                    <!-- PAGE CONTENT ENDS -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="page-header">
                  <h1>
                    Popup Penjualan
                  </h1>
                </div><!-- /.page-header -->
                <div class="row">
                  <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                        <div class="col-md-12">
                          <select name="opsi_popup" id="opsiPopup" class="form-control">
                            <?php if($opsi_popup->opsi == 1){ ?>
                            <option value="1" selected>Tampilkan</option>
                            <option value="0">Nonaktifkan</option>
                            <?php } else { ?>
                            <option value="1">Tampilkan</option>
                            <option value="0" selected>Nonaktifkan</option>
                            <?php } ?>
                          </select>
                        </div>
                       <hr>

                    <!-- PAGE CONTENT ENDS -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="page-header">
                  <h1>
                    Ucapan Nota
                  </h1>
                </div><!-- /.page-header -->
                <div class="row">
                  <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                        <div class="col-md-12">
                          <input type="text" class="form-control" name="ucapan" id="ucapan" value="<?php echo $ucapan; ?>"><br>
                          <button class="btn btn-primary" id="opsiUcapan">Simpan</button>
                        </div>
                       <hr>

                    <!-- PAGE CONTENT ENDS -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div>
              <div class="col-md-4" style="padding-left:0px;padding-right:0px">
                <style>
                  .left-info {
                    padding-left: 10px;
                    min-height: 100vh;
                    overflow-y: scroll;
                    border-left: 1px solid #DEDEDE;
                    background-color: whitesmoke;
                    z-index: 1000000;
                  }
                </style>
                <div class="left-info">
                  <h2>Keterangan :</h2><br>
                  Keterangan : <br>
                  <b>1.Opsi stok :</b>
                  <ul>
                    <li>Batasi Stok  : Stok 0 tidak dapat dibeli.</li>
                    <li>Abaikan Stok : Stok 0 tetap dapat dibeli, stok menjadi -.</li>
                    <li>Tanpa Stok   : Tanpa menghitung stok.</li>
                  </ul>
                  <b>2.Opsi Diskon Member</b><br>
                  Keterangan : <br>
                  <ul>
                    <li>Menggunakan stok : Total bayar dikurangi %diskon yang ada di data member.</li>
                  </ul>
                  <b>3.Opsi Pilihan Member</b><br>
                  Keterangan : <br>
                  <ul>
                    <li>Select Box : Menggunakan list saat memilih daftar member.</li>
                    <li>Input Nama : Menulis manual nama member di kolom pembeli.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->
      <script>
        $(document).ready(function(){
            $('#opsiPpn').click(function(){
                var val = $('#ppn').val();
                $.ajax({
                  url : '<?php echo base_url("admin/pengaturan/opsi_ppn_change");?>',
                  type: 'post',
                  data: 'opsi='+val,
                  success:function(response){
                    alert('Perubahan Berhasil.');
                  }
                });
              });
            $('#opsiStock').change(function(){
              var val = $(this).val();
              $.ajax({
                url : '<?php echo base_url("admin/pengaturan/opsi_stok_change");?>',
                type: 'post',
                data: 'opsi='+val,
                success:function(response){
                  alert('Perubahan Berhasil.');
                }
              });
            });
            $('#opsiDiskon').change(function(){
              var val = $(this).val();
              $.ajax({
                url : '<?php echo base_url("admin/pengaturan/opsi_diskon_change");?>',
                type: 'post',
                data: 'opsi='+val,
                success:function(response){
                  alert('Perubahan Berhasil.');
                }
              });
            });
            $('#opsiPilihan').change(function(){
              var val = $(this).val();
              $.ajax({
                url : '<?php echo base_url("admin/pengaturan/opsi_pilihan_change");?>',
                type: 'post',
                data: 'opsi='+val,
                success:function(response){
                  alert('Perubahan Berhasil.');
                }
              });
            });
            $('#opsiTProduk').change(function(){
              var val = $(this).val();
              $.ajax({
                url : '<?php echo base_url("admin/pengaturan/opsi_tproduk_change");?>',
                type: 'post',
                data: 'opsi='+val,
                success:function(response){
                  alert('Perubahan Berhasil.');
                }
              });
            });
            $('#opsiPopup').change(function(){
              var val = $(this).val();
              $.ajax({
                url : '<?php echo base_url("admin/pengaturan/opsi_popup_change");?>',
                type: 'post',
                data: 'opsi='+val,
                success:function(response){
                  alert('Perubahan Berhasil.');
                }
              });
            });
            $('#opsiUcapan').click(function(){
              var val = $('#ucapan').val();
              $.ajax({
                url : '<?php echo base_url("admin/pengaturan/ucapan_change");?>',
                type: 'post',
                data: 'ucapan='+val,
                success:function(response){
                  alert('Perubahan Berhasil.');
                }
              });
            });
            /*
            $('#touchToggle').change(function(){
              var opsi = '';
              var status = $(this).attr('data-status');
              if(status == 1){ 
                $.ajax({
                  url : '<?php echo base_url("admin/pengaturan/opsi_stok_change");?>',
                  type: 'post',
                  data: 'opsi_stok=0',
                  success:function(response){
                    $('#touchToggle').attr('data-status',0);
                    alert('Perubahan Berhasil.');
                  }
                });
              }else{ 
                $.ajax({
                  url : '<?php echo base_url("admin/pengaturan/opsi_stok_change");?>',
                  type: 'post',
                  data: 'opsi_stok=1',
                  success:function(response){
                    $('#touchToggle').attr('data-status',1);
                    alert('Perubahan Berhasil.');
                  }
                });
              }
            });
            */
        });
      </script>
      <script src="<?php echo base_url() ?>assets/js/bootstrap-timepicker.min.js"></script>
      <script>

      
      
        $('#timepicker1').timepicker({
          minuteStep: 1,
          showSeconds: true,
          showMeridian: false,
          disableFocus: true,
          icons: {
            up: 'fa fa-chevron-up',
            down: 'fa fa-chevron-down'
          }
        }).on('focus', function() {
          $('#timepicker1').timepicker('showWidget');
        }).next().on(ace.click_event, function(){
          $(this).prev().focus();
        });
        
        
      
        
        if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
         //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
         icons: {
          time: 'fa fa-clock-o',
          date: 'fa fa-calendar',
          up: 'fa fa-chevron-up',
          down: 'fa fa-chevron-down',
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-arrows ',
          clear: 'fa fa-trash',
          close: 'fa fa-times'
         }
        }).next().on(ace.click_event, function(){
          $(this).prev().focus();
        });
      </script>