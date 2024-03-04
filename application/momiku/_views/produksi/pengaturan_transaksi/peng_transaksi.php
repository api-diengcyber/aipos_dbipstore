
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Jurnal</li>
              <li class="active">Pengaturan Transaksi</li>
            </ul><!-- /.breadcrumb -->

            
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
                Pengaturan Transaksi
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                  <style>
                    h3.judul {
                      margin-top: 0px;
                      color: #555;
                    }
                    .clicker {
                      cursor: pointer;
                    }
                    .clicker:hover {
                      color: #fff;
                      background-color: #777;
                    }
                    textarea {
                      width: 100%;
                      font-family: monospace;
                      color: #FFF;
                      background-color: #000;
                      outline: #000;
                      font-weight: bold;
                      padding: 10px;
                      caret-color: #fffffffe;
                      letter-spacing: 0.07em;
                      line-height: 1.1em;
                    }
                    textarea:focus {
                      width: 100%;
                      font-family: monospace;
                      color: #FFF;
                      background-color: #000;
                      outline: #000;
                      font-weight: bold;
                      padding: 10px;
                      caret-color: #fffffffe;
                      letter-spacing: 0.07em;
                      line-height: 1.1em;
                    }
                    textarea::-moz-selection { /* Code for Firefox */
                      color: #333;
                      background-color: #fffffffe;
                    }
                    textarea::selection {
                      color: #333; 
                      background-color: #fffffffe;
                    }
                  </style>

                  <?php
                  $tbl_other = '<tr style="background-color:#ffff5f;">
                                    <td width="100" class="clicker" name="[MENUPROSES]">@KODEJURNAL:</td>
                                    <td>set variable; kode jurnal</td>
                                  </tr>
                                  <tr style="background-color:#ffff5f;">
                                    <td width="100" class="clicker" name="[MENUPROSES]">@TANGGAL:</td>
                                    <td>set variable; jika tidak diisi akan otomatis hari ini</td>
                                  </tr>
                                  <tr style="background-color:#ffff5f;">
                                    <td width="100" class="clicker" name="[MENUPROSES]">@NOFAKTUR:</td>
                                    <td>set variable; dari NO_FAKTUR</td>
                                  </tr>
                                  <tr style="background-color:#ffff5f;">
                                    <td width="100" class="clicker" name="[MENUPROSES]">@IDPROSES:</td>
                                    <td>set variable; perlu diisi dari id hasil proses jika ada</td>
                                  </tr>
                                  <tr style="background-color:#ffff5f;">
                                    <td width="100" class="clicker" name="[MENUPROSES]">@IDPIUTANG:</td>
                                    <td>set variable; dari ID_PIUTANG</td>
                                  </tr>
                                  <tr style="background-color:#ffff5f;">
                                    <td width="100" class="clicker" name="[MENUPROSES]">@IDHUTANG:</td>
                                    <td>set variable; dari ID_HUTANG</td>
                                  </tr>
                                  <tr style="background-color:#ffff5f;">
                                    <td width="100" class="clicker" name="[MENUPROSES]">@DEBET:(<i>kode_akun</i>, <i>nominal</i>)</td>
                                    <td>proses; masuk ke jurnal debet</td>
                                  </tr>
                                  <tr style="background-color:#ffff5f;">
                                    <td width="100" class="clicker" name="[MENUPROSES]">@KREDIT:(<i>kode_akun</i>, <i>nominal</i>)</td>
                                    <td>proses; masuk ke jurnal kredit</td>
                                  </tr>';
                  ?>
                
                  <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                      <li class="active">
                        <a data-toggle="tab" href="#penjualan">Tambah Penjualan</a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#piutang">Pembayaran Piutang</a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#buatreturjual">Buat Retur Penjualan</a>
                      </li>
                      <!-- <li>
                        <a data-toggle="tab" href="#fakturpembelian">Tambah Faktur Pembelian</a>
                      </li> -->
                      <li>
                        <a data-toggle="tab" href="#pembelian">Tambah Pembelian</a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#hutang">Pembayaran Hutang</a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#buatretur">Buat Retur Pembelian</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div id="penjualan" class="tab-pane fade in active">
                        <form action="<?php echo base_url() ?>produksi/pengaturan_transaksi/create_action" method="post">
                          <input type="hidden" name="jenis" value="penjualan">
                          <div class="row">
                            <div class="col-xs-4">
                              <h3 class="judul">Kode</h3>
                              <table class="table table-bordered">
                                <tbody>
                                  <?php echo str_replace("[MENUPROSES]", "penjualan", $tbl_other) ?>
                                  <?php foreach ($data_kode_penjualan as $key): ?>
                                  <tr>
                                    <td width="100" class="clicker" name="penjualan">@<?php echo $key->kode ?>:</td>
                                    <td><?php echo $key->ket ?></td>
                                  </tr>
                                  <?php endforeach ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-xs-8">
                              <h3 class="judul">Tuliskan Proses</h3>
                              <?php
                              $tpenjualan = "";
                              if ($data_transaksi_penjualan) {
                                $tpenjualan = $data_transaksi_penjualan->kode;
                              }
                              ?>
                              <textarea name="text" id="textarea-penjualan" cols="30" rows="10" spellcheck="false"><?php echo $tpenjualan ?></textarea>
                              <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- <div id="fakturpembelian" class="tab-pane fade">
                        <form action="<?php echo base_url() ?>produksi/pengaturan_transaksi/create_action" method="post">
                          <input type="hidden" name="jenis" value="fakturpembelian">
                          <div class="row">
                            <div class="col-xs-4">
                              <h3 class="judul">Kode</h3>
                              <table class="table table-bordered">
                                <tbody>
                                  <?php echo str_replace("[MENUPROSES]", "fakturpembelian", $tbl_other) ?>
                                  <?php // foreach ($data_kode_fakturpembelian as $key): ?>
                                  <tr>
                                    <td width="100" class="clicker" name="fakturpembelian">@<?php echo $key->kode ?>:</td>
                                    <td><?php echo $key->ket ?></td>
                                  </tr>
                                  <?php // endforeach ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-xs-8">
                              <h3 class="judul">Tuliskan Proses</h3>
                              <?php
                              // $tfakturpembelian = "";
                              // if ($data_transaksi_fakturpembelian) {
                                // $tfakturpembelian = $data_transaksi_fakturpembelian->kode;
                              // }
                              ?>
                              <textarea name="text" id="textarea-fakturpembelian" cols="30" rows="10" spellcheck="false"><?php echo $tfakturpembelian ?></textarea>
                              <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                          </div>
                        </form>
                      </div> -->
                      <div id="piutang" class="tab-pane fade">
                        <form action="<?php echo base_url() ?>produksi/pengaturan_transaksi/create_action" method="post">
                          <input type="hidden" name="jenis" value="piutang">
                          <div class="row">
                            <div class="col-xs-4">
                              <h3 class="judul">Kode</h3>
                              <table class="table table-bordered">
                                <tbody>
                                  <?php echo str_replace("[MENUPROSES]", "piutang", $tbl_other) ?>
                                  <?php foreach ($data_kode_piutang as $key): ?>
                                  <tr>
                                    <td width="100" class="clicker" name="piutang">@<?php echo $key->kode ?>:</td>
                                    <td><?php echo $key->ket ?></td>
                                  </tr>
                                  <?php endforeach ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-xs-8">
                              <h3 class="judul">Tuliskan Proses</h3>
                              <?php
                              $tpiutang = "";
                              if ($data_transaksi_piutang) {
                                $tpiutang = $data_transaksi_piutang->kode;
                              }
                              ?>
                              <textarea name="text" id="textarea-piutang" cols="30" rows="10" spellcheck="false"><?php echo $tpiutang ?></textarea>
                              <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div id="buatreturjual" class="tab-pane fade">
                        <form action="<?php echo base_url() ?>produksi/pengaturan_transaksi/create_action" method="post">
                          <input type="hidden" name="jenis" value="buatreturjual">
                          <div class="row">
                            <div class="col-xs-4">
                              <h3 class="judul">Kode</h3>
                              <table class="table table-bordered">
                                <tbody>
                                  <?php echo str_replace("[MENUPROSES]", "buatreturjual", $tbl_other) ?>
                                  <?php foreach ($data_kode_buatreturjual as $key): ?>
                                  <tr>
                                    <td width="100" class="clicker" name="buatreturjual">@<?php echo $key->kode ?>:</td>
                                    <td><?php echo $key->ket ?></td>
                                  </tr>
                                  <?php endforeach ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-xs-8">
                              <h3 class="judul">Tuliskan Proses</h3>
                              <?php
                              $tbuatreturjual = "";
                              if ($data_transaksi_buatreturjual) {
                                $tbuatreturjual = $data_transaksi_buatreturjual->kode;
                              }
                              ?>
                              <textarea name="text" id="textarea-buatreturjual" cols="30" rows="10" spellcheck="false"><?php echo $tbuatreturjual ?></textarea>
                              <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div id="pembelian" class="tab-pane fade">
                        <form action="<?php echo base_url() ?>produksi/pengaturan_transaksi/create_action" method="post">
                          <input type="hidden" name="jenis" value="pembelian">
                          <div class="row">
                            <div class="col-xs-4">
                              <h3 class="judul">Kode</h3>
                              <table class="table table-bordered">
                                <tbody>
                                  <?php echo str_replace("[MENUPROSES]", "pembelian", $tbl_other) ?>
                                  <?php foreach ($data_kode_pembelian as $key): ?>
                                  <tr>
                                    <td width="100" class="clicker" name="pembelian">@<?php echo $key->kode ?>:</td>
                                    <td><?php echo $key->ket ?></td>
                                  </tr>
                                  <?php endforeach ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-xs-8">
                              <h3 class="judul">Tuliskan Proses</h3>
                              <?php
                              $tpembelian = "";
                              if ($data_transaksi_pembelian) {
                                $tpembelian = $data_transaksi_pembelian->kode;
                              }
                              ?>
                              <textarea name="text" id="textarea-pembelian" cols="30" rows="10" spellcheck="false"><?php echo $tpembelian ?></textarea>
                              <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div id="hutang" class="tab-pane fade">
                        <form action="<?php echo base_url() ?>produksi/pengaturan_transaksi/create_action" method="post">
                          <input type="hidden" name="jenis" value="hutang">
                          <div class="row">
                            <div class="col-xs-4">
                              <h3 class="judul">Kode</h3>
                              <table class="table table-bordered">
                                <tbody>
                                  <?php echo str_replace("[MENUPROSES]", "hutang", $tbl_other) ?>
                                  <?php foreach ($data_kode_hutang as $key): ?>
                                  <tr>
                                    <td width="100" class="clicker" name="hutang">@<?php echo $key->kode ?>:</td>
                                    <td><?php echo $key->ket ?></td>
                                  </tr>
                                  <?php endforeach ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-xs-8">
                              <h3 class="judul">Tuliskan Proses</h3>
                              <?php
                              $thutang = "";
                              if ($data_transaksi_hutang) {
                                $thutang = $data_transaksi_hutang->kode;
                              }
                              ?>
                              <textarea name="text" id="textarea-hutang" cols="30" rows="10" spellcheck="false"><?php echo $thutang ?></textarea>
                              <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div id="buatretur" class="tab-pane fade">
                        <form action="<?php echo base_url() ?>produksi/pengaturan_transaksi/create_action" method="post">
                          <input type="hidden" name="jenis" value="buatretur">
                          <div class="row">
                            <div class="col-xs-4">
                              <h3 class="judul">Kode</h3>
                              <table class="table table-bordered">
                                <tbody>
                                  <?php echo str_replace("[MENUPROSES]", "buatretur", $tbl_other) ?>
                                  <?php foreach ($data_kode_buatretur as $key): ?>
                                  <tr>
                                    <td width="100" class="clicker" name="buatretur">@<?php echo $key->kode ?>:</td>
                                    <td><?php echo $key->ket ?></td>
                                  </tr>
                                  <?php endforeach ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-xs-8">
                              <h3 class="judul">Tuliskan Proses</h3>
                              <?php
                              $tbuatretur = "";
                              if ($data_transaksi_buatretur) {
                                $tbuatretur = $data_transaksi_buatretur->kode;
                              }
                              ?>
                              <textarea name="text" id="textarea-buatretur" cols="30" rows="10" spellcheck="false"><?php echo $tbuatretur ?></textarea>
                              <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <script>
      $(document).ready(function(){
        autosize(document.querySelector("#textarea-penjualan"));
        // autosize(document.querySelector("#textarea-fakturpembelian"));
        // autosize(document.querySelector("#textarea-pembelian"));
        // autosize(document.querySelector("#textarea-piutang"));
        // autosize(document.querySelector("#textarea-hutang"));
        // autosize(document.querySelector("#textarea-buatretur"));
        /*$("#myTab>li").on("click", function(){
          var tabname = $(".tab-pane.active").attr('id');
          alert(tabname);
        });*/
        $('#myTab a[data-toggle="tab"]').bind('click', function (e) {
          var tabname = $(this).attr('href').replace('#', '');
          autosize(document.querySelector("#textarea-"+tabname));
        });
        $('.clicker').on('click', function() {
          var name = $(this).attr("name");
          var ta = "#textarea-"+name;
          var cursorPos = $(ta).prop('selectionStart');
          var v = $(ta).val();
          var textBefore = v.substring(0,  cursorPos);
          var textAfter  = v.substring(cursorPos, v.length);
          $(ta).val(textBefore + $(this).text() + textAfter);
        });
        $("form").submit(function(e){
          e.preventDefault();
          var that = $(this);
          var action = that.attr("action");
          var method = that.attr("method");
          $.ajax({
            url: action,
            type: method,
            data: that.serialize(),
            success: function(response){
              if (response.status=="ok") {
                alert("Data berhasil disimpan");
              } else {
                alert("Gagal disimpan");
              }
            },
            error: function(){
              alert("Gagal disimpan");
            }
          });
        });
      });
      </script>