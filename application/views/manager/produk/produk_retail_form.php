<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="#">Home</a>
        </li>
        <li class="">Manajemen Produk</li>
        <li class="active">Produk</li>
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
              <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar"
                autocomplete="off" />
              <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar"
                autocomplete="off" />
              <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs"
                autocomplete="off" />
              <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
              <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container"
                autocomplete="off" />
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
          Produk Retail
        </h1>
      </div><!-- /.page-header -->

      <?php
      $jml_kategori = count($data_kategori->result());
      $jml_satuan = count($data_satuan);
      if ($jml_kategori > 0 && $jml_satuan > 0) {
        ?>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="row">
            <div class="col-md-6">
              <!-- PAGE CONTENT BEGINS -->

              <input type="hidden" class="form-control" name="id_toko" id="id_toko" placeholder="Id Toko"
                value="<?php echo $id_toko; ?>" readonly />
              <div class="form-group">
                <label for="">Suplier
                  <?= $data_supplier_select ?>
                  <?php echo form_error('suplier') ?>
                </label>

                <select class="form-control" name="supplier" id="supplier">
                  <option value="" selected disabled>-- Pilih Supplier --</option>
                  <?php foreach ($data_supplier as $key): ?>
                    <option value="<?php echo $key->id_supplier ?>" <?php if ($key->id_supplier == $data_supplier_select) {
                         echo "selected";
                       } ?>>
                      <?php echo $key->nama_supplier ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <?php
                if ($parent == null) { ?>
                  <label for="bigint">IMEI
                    <?php echo form_error('barcode') ?>
                    <!-- <a href="<?php echo base_url('admin/produk_retail/create?id_barcode=1'); ?>">(Buat Barcode)</a> -->
                  </label>
                  <input type="text" class="form-control" name="barcode" id="barcode" placeholder="IMEI"
                    value="<?php echo $barcode; ?>" />
                  <?php
                } else { ?>
                  <label for="bigint">IMEI
                    <?php echo form_error('barcode') ?>
                  </label>
                  <input type="text" class="form-control" name="barcode" id="barcode" placeholder="IMEI"
                    value="<?php echo $parent->barcode; ?>" />
                  <?php
                }
                ?>

              </div>
              <?php
              if ($parent != null) { ?>
                <div class="form-group">
                  <label for="">Produk Induk</label>
                  <input type="text" class="form-control" name="parent_id" id="barcode" placeholder="Barcode"
                    value="<?php echo $parent->nama_produk; ?>" readonly />
                  <input type="hidden" name="id_parent" id="" value="<?= $parent->id_produk_2 ?>">
                  <input type="hidden" name="nama_parent" id="" value="<?= $parent->nama_produk ?>">
                </div>
                <?php
              } else {

              }
              ?>
              <?php if ($parent != null) { ?>
                <div class="form-group">
                  <label for="int">Kategori
                    <?php echo form_error('kategori') ?>
                  </label>
                  <select class="form-control" name="kategori" id="kategori" />
                  <option value="" disabled>-- Pilih Kategori --</option>
                  <?php
                  foreach ($data_kategori->result() as $key):
                    if ($key->id_kategori_2 == $parent->id_kategori) {
                      ?>
                      <option selected value="<?php echo $key->id_kategori_2 ?>">
                        <?php echo " - " . $key->nama_kategori ?>
                      </option>
                    <?php } else { ?>
                      <option value="<?php echo $key->id_kategori_2 ?>">
                        <?php echo " - " . $key->nama_kategori ?>
                      </option>
                    <?php } ?>
                  <?php endforeach ?>

                  </select>
                </div>
              <?php } else { ?>
                <div class="form-group">
                  <label for="int">Kategori
                    <?php echo form_error('kategori') ?>
                  </label>
                  <select class="form-control" name="kategori" id="kategori" />
                  <option value="">-- Pilih Kategori --</option>

                  <?php

                  foreach ($data_kategori->result() as $key):
                    if ($key->id_kategori_2 == $kategori) {
                      ?>
                      <option selected value="<?php echo $key->id_kategori_2 ?>">
                        <?php echo " - " . $key->nama_kategori ?>
                      </option>
                    <?php } else { ?>
                      <option value="<?php echo $key->id_kategori_2 ?>">
                        <?php echo " - " . $key->nama_kategori ?>
                      </option>
                    <?php } ?>
                  <?php endforeach ?>

                  </select>
                </div>
              <?php } ?>
              <div class="form-group">
                <label for="int">Satuan
                  <?php echo form_error('satuan') ?>
                </label>
                <select name="satuan" id="satuan" class="form-control">
                  <option value="">-- Pilih Satuan --</option>
                  <?php
                  foreach ($data_satuan as $key_satuan) {
                    if ($satuan == $key_satuan->id_satuan) {
                      echo "<option value='" . $key_satuan->id_satuan . "' selected >" . $key_satuan->satuan . "</option>";
                    } else {
                      echo "<option value='" . $key_satuan->id_satuan . "' >" . $key_satuan->satuan . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <!-- <div class="form-group">
                        <label for="varchar">Kode Produk <?php echo form_error('kode_produk') ?></label>
                        <input type="text" class="form-control" name="kode_produk" id="kode_produk" placeholder="Kode Produk" value="<?php echo $kode_produk; ?>" />
                    </div> -->
              <div class="form-group">
                <label for="varchar">Nama Produk
                  <?php echo form_error('nama_produk') ?>
                </label>
                <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk"
                  value="<?php echo $nama_produk; ?>" />
              </div>
              <div class="form-group">
                <label for="int">Harga Beli
                  <?php echo form_error('harga_beli') ?>
                </label>
                <input type="text" class="form-control" name="harga_beli" id="harga_beli" style="text-align: right;"
                  maxlength="20" placeholder="0" value="<?php echo $harga_beli; ?>" />
              </div>
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="int">Harga Jual
                  <?php echo form_error('harga_1') ?>
                </label>
                <input type="text" class="form-control" name="harga_1" id="harga_1" style="text-align: right;"
                  maxlength="20" placeholder="0" value="<?php echo $harga_1; ?>" />
              </div>
              <div class="form-group">
                <label for="int">Harga Grosir
                  <?php echo form_error('harga_2') ?>
                </label>
                <input type="text" class="form-control" name="harga_2" id="harga_2" style="text-align: right;"
                  maxlength="20" placeholder="0" value="<?php echo $harga_2; ?>" />
              </div>
              <div class="form-group">
                <label for="int">Harga Member
                  <?php echo form_error('harga_3') ?>
                </label>
                <input type="text" class="form-control" name="harga_3" id="harga_3" style="text-align: right;"
                  maxlength="20" placeholder="0" value="<?php echo $harga_3; ?>" />
              </div>
              <!-- <div class="form-group">
                        <label for="int">Harga 4 <?php // echo form_error('harga_4')                                            ?></label>
                        <input type="text" class="form-control" name="harga_4" id="harga_4" style="text-align: right;" maxlength="20" placeholder="0" value="<?php // echo $harga_4;                                            ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Harga 5 <?php // echo form_error('harga_5')                                            ?></label>
                        <input type="text" class="form-control" name="harga_5" id="harga_5" style="text-align: right;" maxlength="20" placeholder="0" value="<?php // echo $harga_5;                                            ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Harga 6 <?php // echo form_error('harga_6')                                            ?></label>
                        <input type="text" class="form-control" name="harga_6" id="harga_6" style="text-align: right;" maxlength="20" placeholder="0" value="<?php // echo $harga_6;                                            ?>" />
                    </div> -->
              <div class="form-group">
                <label for="deskripsi">Deskripsi
                  <?php echo form_error('deskripsi') ?>
                </label>
                <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi"
                  placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
              </div>
              <!-- <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Pembayaran</label>
                    <select class="form-control" name="pembayaran" id="pembayaran">
                      <option value="1">TUNAI</option>
                      <option value="2">HUTANG / KREDIT</option>
                      <option value="3">TRANSFER</option>
                    </select>
                  </div>
                </div>
                <div class="col-xs-6" id="panel-jatuh-tempo" style="display: none;">
                  <label>Jatuh Tempo
                    <?php echo form_error('') ?>
                  </label>
                  <div class="form-group">
                    <input type="text" class="form-control" name="deadline" id="datepicker2" placeholder="dd-mm-yyyy"
                      value="<?php echo date('d-m-Y') ?>">
                  </div>
                </div>
                <div class="col-xs-6 hide" id="panel-bank">
                  <div class="form-group">
                    <label>Bank
                      <?php echo form_error('bank') ?>
                    </label>
                    <select class="form-control" name="id_bank" id="bank">
                      <option value="">-- Pilih Bank --</option>
                      <?php
                      foreach ($data_bank as $key): ?>
                        <option value="<?php echo $key->id ?>">
                          <?php echo $key->bank ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div> -->
              <!-- <div class="form-group">
                <label for="">Mutasi Langsung?</label>
                <select name="" id="mutasi_langsung" style="border-color:transparent">
                  <option value="1">Tidak</option>
                  <option value="2">Ya</option>
                </select>
              </div>
              <div class="form-group hide input_mutasi">
                <label for="int">Mutasi Ke
                  <?php echo form_error('id_users_tujuan') ?>
                </label>
                <input type="text" class="form-control" name="nama_users_tujuan" id="nama_users_tujuan"
                  placeholder="Tujuan" value="" />
                <input type="hidden" name="id_users_tujuan" id="id_users_tujuan"
                  value="<?php echo $id_users_tujuan; ?>" />
              </div> -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="space"></div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="varchar">Berat
                  <?php echo form_error('berat') ?>
                </label>
                <input type="number" class="form-control" name="berat" id="berat" placeholder="Berat"
                  value="<?php echo $berat; ?>" />
              </div>
              <div class="form-group">
                <label for="int">Penjualan minimal grosir (Qty)
                  <?php echo form_error('mingros') ?>
                </label>
                <input type="number" class="form-control" name="mingros" id="mingros" placeholder="Mingros"
                  value="<?php echo $mingros; ?>" />
              </div>
              <div class="form-group">
                Ket: <br>
                - Minimal Grosir hanya berlaku untuk Harga admin saja. <br>
                - Jika Jumlah melebihi mingros yang ditentukan, Harga admin akan otomatis menjadi Harga Reseller Kecil.
                <br>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="varchar">Diskon ( % )
                  <?php echo form_error('diskon') ?>
                </label>
                <input type="number" class="form-control" name="diskon" id="diskon" placeholder="Diskon"
                  value="<?php echo $diskon; ?>" />
              </div>
              <div class="form-group">
                <label for="int">Rak
                  <?php echo form_error('rak') ?>
                </label>
                <input type="text" class="form-control" name="rak" id="rak" placeholder="Rak"
                  value="<?php echo $rak; ?>" />
              </div>
            </div>
            <div class="col-md-4">
              <?php
              if (!empty($tampil_gambar)) {
                if (file_exists($tampil_gambar)) {
                  ?><br><br>
                  <img src="<?php echo base_url() . $tampil_gambar ?>" width="130" style="border:3px solid grey;">
                <?php }
                ;
              }
              ; ?>
              <div class="form-group">
                <label for="varchar">Gambar
                  <?php echo form_error('gambar') ?>
                </label>
                <?php if ($id_modul != '1' && $id_modul != '5') { ?>
                  <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Gambar"
                    value="<?php echo $gambar; ?>" />
                <?php } else { ?>
                  <br>
                  Anda tidak dapat mengganti gambar
                  <input type="hidden" name="gambar" value="">
                <?php }
                ; ?>
              </div>
            </div>
          </div>
          <div class="space"></div>

          <?php
          if (!empty($allow_awal) && $allow_awal == true) {
            ?>

            <div class="row">
              <!-- <div class="col-md-6">
                <div class="form-group"> -->
              <!-- <label for="varchar">Stok Awal</label> -->
              <input type="hidden" class="form-control" name="stok" id="stok" placeholder="Stok Awal" value="1" />
              <!-- </div> -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <!-- <label for="varchar">HPP Awal</label> -->
                <input type="hidden" class="form-control" name="hpp" id="hpp" placeholder="HPP Awal"
                  value="<?php echo $hpp_awal ?>" />
              </div>
            </div>
        </div>

      <?php } ?>

      <div class="space"></div>
      <div class="row">
        <div class="col-md-12">
          <center>
            <input type='hidden' name="gambarlama" value="<?php echo $gambarlama ?>" />
            <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>" />
            <button type="submit" class="btn btn-primary">
              <?php echo $button ?>
            </button>
            <a href="<?php echo site_url('admin/produk_retail') ?>" class="btn btn-default">Cancel</a>
          </center>
        </div>
      </div>
      </form>
    <?php } else { ?>
      <?php if ($jml_kategori < 1) { ?>
        <h4>Data Kategori Masih Kosong </h4>
        <a href="<?php echo base_url() ?>admin/kategori_produk_retail/create" class="btn btn-primary">Tambah Kategori</a>
      <?php } ?>
      <hr />
      <?php if ($jml_satuan < 1) { ?>
        <h4>Data Satuan Masih Kosong </h4>
        <a href="<?php echo base_url() ?>admin/satuan_produk/create" class="btn btn-primary">Tambah Satuan</a>
      <?php } ?>
    <?php }
      ; ?>
  </div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<!-- JQUERY -->
<script>
  jQuery(function ($) {
    $("#harga_beli, #harga_1, #harga_2, #harga_3, #harga_4, #harga_5, #harga_6, #hpp").keyup(function () {
      var n = $(this).val().replace(/\./g, '');
      $(this).val(tandaPemisahTitik(n));
    });
    $("form").submit(function (e) {
      if ($("#barcode").is(':focus')) {
        e.preventDefault();
      }
    });
  });


</script>
<script>
  $(document).ready(function () {

    $("#pembayaran").on("change", function (e) {
      var val = $(this).val();
      if (val * 1 == 2) {
        $("#panel-jatuh-tempo").show();
      } else {
        $("#panel-jatuh-tempo").hide();
      }
      if (val * 1 == 3) {
        $("#panel-bank").removeClass('hide');
      } else {
        $("#panel-bank").addClass('hide');
      }
    });

    $("#mutasi_langsung").change(function () {
      var selectedMutasi = $(this).val();
      // alert(selectedMutasi);
      if (selectedMutasi == 1) {
        $('.input_mutasi').addClass('hide');
      } else {
        $('.input_mutasi').removeClass('hide');
      }
    });



    $("#nama_users_tujuan").autocomplete({
      source: function (request, response) {
        $('input[name="nama_users_tujuan"]').css({
          'border-color': '#bbb'
        });
        $('input[name="id_users_tujuan"]').val('');
        $.ajax({
          url: '<?php echo base_url() ?>admin/produk_retail_mutasi/get_user_cabang_no_admin',
          type: 'post',
          data: {
            'term': request.term,
            'not_id_users': $('input[name="id_users_asal"]').val(),
          },
          success: function (data) {
            response($.map(data, function (value, key) {
              return {
                value: value.id_users,
                label: value.first_name + " " + value.last_name,
                data: value,
              };
            }));

          }
        });
      },
      minLength: 1,
      delay: 0,
      autoFocus: true,
      select: function (event, ui) {
        $('input[name="nama_users_tujuan"]').val(ui.item.label);
        $('input[name="id_users_tujuan"]').val(ui.item.value);
        $('input[name="nama_users_tujuan"]').css({
          'border-color': 'green'
        });
        return false;
      }
    });
  });
</script>
<!-- JQUERY -->