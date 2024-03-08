
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Pengaturan</li>
              <li class="active">Printer</li>
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

          <div class="page-content">
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
                Printer
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                Pilih mode printer anda : <br>
                <select name="#" id="printMethod" class="form-control" >
                  <option value="1" <?php echo ($opsi_printer=='1' ? 'selected' : '') ?>>Menggunakan Komputer</option>
                  <option value="0" <?php echo ($opsi_printer=='0' ? 'selected' : '') ?>>Menggunaan Smartphone.</option>
                  <option value="2" <?php echo ($opsi_printer=='2' ? 'selected' : '') ?>>Menggunakan Windows Print</option>
                </select><br>
                Pilih format nota : <br>
                <select name="#" id="notesFormat" class="form-control" >
                  <option value="kecil" <?php echo ($format_nota=='kecil' ? 'selected' : '') ?>>Print nota kecil</option>
                  <option value="besar" <?php echo ($format_nota=='besar' ? 'selected' : '') ?>>Print nota besar</option>
                  <option value="praktis" <?php echo ($format_nota=='praktis' ? 'selected' : '') ?>>Print nota praktis kecil</option>
                  <option value="praktis2" <?php echo ($format_nota=='praktis2' ? 'selected' : '') ?>>Print nota praktis besar</option>
                </select><br>
                <div class="tabbable">
                  <ul class="nav nav-tabs" id="myTab">
                    <li class="active" id="cmm">
                      <a data-toggle="tab" href="#home" aria-expanded="true" id="cm">
                        Pentunjuk Pengguna Komputer
                      </a>
                    </li>

                    <li class="" id="smm">
                      <a data-toggle="tab" href="#messages" aria-expanded="false" id="sm">
                        Pentunjuk Pengguna Tablet / Smartphone
                      </a>
                    </li>
                  </ul>

                  <div class="tab-content">
                    <div id="home" class="tab-pane fade active in">
                      <div style="margin-left:40px">
                      <span>Langkah Langkah install printer :</span><br>
                      <ol class="tutor-list">
                        <li>Download Recta Host : <a href="<?php echo base_url('assets/file/recta-host.zip'); ?>" download>Di sini</a></li>
                        <li>Download Zadig : <a href="<?php echo base_url('assets/file/zadig.exe') ?>" download>Di sini</a></li>
                        <li>Buka Zadig yang telah di download tadi <br>
                            <ul>
                              <li>Klik Options > List All Devices. <br>
                                  <img src="<?php echo base_url('assets/images/zadig2.png');?>" alt="">
                              </li>
                              <li>Pilih Device Printer Anda ( POS58 / POS.... ) <br>
                                  <img src="<?php echo base_url('assets/images/zadig2.png');?>" alt="">
                              </li>
                              <li>Lalu klik Install Driver / Replace Drive. <br>
                                  <img src="<?php echo base_url('assets/images/zadig3.png');?>" alt="">
                              </li>
                            </ul>
                        </li>
                        <li>Extract <b>Recta Host</b><br>
                            <ul>
                              <li>Buka file recta-host.zip yang sudah didownload tadi.</li>
                              <li>Extract file tadi , ikuti petunjuk di bawah. <br>
                                  <img src="<?php echo base_url('assets/images/recta-1.png');?>" alt=""><br><br>
                                  <img src="<?php echo base_url('assets/images/recta-2.png');?>" alt="">
                              </li>
                              <li>Setelah Extract selesai, Buka windows explorer lalu pindah ke Localdisk (C) > recta-host-win32-ia32-1.0.0</li>
                              <li>Double klik file recta-host.exe. </li>
                              <li>Ubah Printer adapter menjadi usb. <br>
                                  <img src="<?php echo base_url('assets/images/recta1.png');?>" alt="">
                              </li>
                              <li>Ubah app key menjadi : 8277275987</li>
                              <li>Centang auto start on startup</li>
                              <li>Klik save.</li>
                              <li>Klik Start untuk mengaktifkan fungsi printer.</li>
                              <li>Klik <b>Test Print</b> untuk mengecek apakah printer sudah berjalan dengan normal/belum.</li>
                            </ul>
                        </li>
                        <li>Selesai :) </li>
                      </ol>
                      <button type="button" onclick="onClick()" class="btn btn-primary"> Tes Print</button>
                      <script src="<?php echo base_url('assets/js/recta.js');?>"></script>
                      <script type="text/javascript">
                        var printer = new Recta('8277275987', '1811')

                        function onClick () {
                          alert('heloo');
                          printer.open().then(function () {
                            printer.align('center')
                              .font("B")
                              .text('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
                              .cut()
                              .print()
                          })
                        }
                      </script>
                      </div>
                    </div>
                    <div id="messages" class="tab-pane fade">
                      <ol>
                        <li>Download Aplikasi Quick Printer ESC POS <a href="<?php echo base_url('assets/file/quick-esc.apk');?>" download>di sini</a></li>
                        <li>Klik Skip</li>
                        <li>Klik icon + di bawah <br>
                            <img src="<?php echo base_url('assets/images/1.png');?>" alt="" style="width:100%">
                        </li>
                        <li>Ubah Network Printer Menjadi USB Printer<br>
                            <img src="<?php echo base_url('assets/images/2.png');?>" alt="" style="width:100%"></li>
                        <li>Klik Search Printer<br>
                            <img src="<?php echo base_url('assets/images/3.png');?>" alt="" style="width:100%"></li>
                        <li>Klik Printer yang muncul</li>
                        <li>Lalu beri nama Printer anda misal "Print ESC"</li>
                        <li>Klik Test , Jika print berhasil maka printer akan mulai mencetak test print.<br>
                            <img src="<?php echo base_url('assets/images/4.png');?>" alt="" style="width:100%"></li>
                        <li>Klik Save.</li>
                      </ol>
                    </div>
                  </div>
                </div>
                <div style="display:none">
                <form action="<?php echo $action ?>" method="POST">
                    <div class="form-group">
                        <label for="int">Port Printer <?php echo form_error('port_printer') ?></label>
                        <select class="form-control col-xs-4" name="port_printer" id="port_printer" >
                          <?php
                          for ($i=0; $i < count($default['data_printer']); $i++) { 
                            if($printer == $default['data_printer'][$i]['printer']){
                              echo "<option selected value='".$default['data_printer'][$i]['printer']."'>".$default['data_printer'][$i]['nama_printer']."</option>";
                            } else {
                              echo "<option value='".$default['data_printer'][$i]['printer']."'>".$default['data_printer'][$i]['nama_printer']."</option>";
                            }
                          }
                          ?>
                        </select>
                    </div>
                    <br><br>    
                    <button type="button" id="btnTesPrint" class="btn btn-primary"> Tes Print</button>

                    <button type="submit" class="btn btn-primary btn-small">Simpan </button>
                </form>
                </div>
                <style>
                  .tutor-list > li{
                    padding:5px;
                    font-size: 15px!important;
                  }
                  .tutor-list > li > ul > li {
                    padding: 5px;
                  }
                </style>


                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->


<script>
  jQuery(function($){
    $("#btnTesPrint").click(function(){
      var sport = $("#port_printer").val();
      $.ajax({
        url: '<?php echo base_url() ?>admin/printer_retail/print_test',
        type: 'post',
        data: 'printer='+sport,
        success: function(){
            alert(sport);
        }
      });
    });

  });

  $(document).ready(function(){
    $('#printMethod').change(function(){
      var val = $(this).val();
      $.ajax({
        url  : "<?php echo base_url('admin/printer_retail/change_print');?>",
        type : 'post',
        data : 'opsi='+val,
        success:function(resposne){
          alert('Perubahan Berhasil');
        }
      });
    });
    $('#notesFormat').change(function(){
      var val = $(this).val();
      $.ajax({
        url  : "<?php echo base_url('admin/printer_retail/change_format_nota');?>",
        type : 'post',
        data : 'format='+val,
        success:function(resposne){
          alert('Perubahan Nota Berhasil');
        }
      });
    });
    function isMobileDevice() {
        return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
    };
    if(isMobileDevice() == true){
      $('#sm').click();
    }
  })

</script>