<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="#">Home</a>
        </li>
        <li class="active">Service</li>
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
          Service Detail
        </h1>
      </div><!-- /.page-header -->

      <div class="row">

        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->

          <table class="table">
            <tr>
              <th>No Faktur</th>
              <th>
                <?= $service->no_faktur_service ?>
              </th>
            </tr>
            <tr>
              <td>Jenis Service</td>
              <td>
                <?= $service->nama_service ?>
              </td>
            </tr>
            <tr>
              <td>Tgl Masuk</td>
              <td>
                <?= $service->tgl_masuk ?>
              </td>
            </tr>
            <tr>
              <td>Nama Pelanggan</td>
              <td>
                <?= $service->nama ?>
              </td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>
                <?= $service->alamat ?>
              </td>
            </tr>
            <tr>
              <td>No Telp/HP</td>
              <td>
                <?= $service->no_hp ?>
              </td>
            </tr>
            <tr>
              <td>Mekanik</td>
              <td>
                <?= $service->nama_mekanik ?>
              </td>
            </tr>
            <tr>
              <td>Status</td>
              <td>
                <?php
                if ($service->status == 1) {
                  echo "Belum Selesai";
                } else {
                  echo "Selesai";
                }
                ?>
              </td>
            </tr>
            <tr>
              <td>Biaya Service</td>
              <td>
                Rp.
                <?= number_format($service->harga * 1, 0, ',', '.') ?>
              </td>
            </tr>


            <tr>
              <td><b>Sparepart</b></td>
              <td>

              </td>
            </tr>
            <?php
            $no = 1;
            $subTotal = 0;
            $total = 0;
            foreach ($parts as $p) { ?>
              <tr>

                <td>

                  <?= $no++ . '. ' . $p->nama_produk ?>
                </td>
                <td>
                  x
                  <?= $p->jumlah ?>
                  Rp.
                  <?php
                  echo number_format($p->harga);
                  $subTotal += $p->harga ?>
                </td>
              </tr>
              <?php
            }
            ?>
            <tr>
              <th>Total Bayar</th>
              <td>Rp.
                <?= number_format($subTotal + $service->harga) ?>
              </td>
            </tr>
            <tr>
              <td>Keterangan</td>
              <td>
                <?= $service->keterangan ?>
              </td>
            </tr>

          </table>


          <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->

        <div class="col-xs-12">
          <table>
            <tr>
              <td>
                <?php
                if ($service->status == 1) {
                  ?>
                  <a onclick="return(confirm('Selesaikan Service?'))"
                    href="<?= base_url('admin/service_order/update_status/' . $service->id) ?>" class="btn btn-primary"
                    target="_blank">
                    <i class="fa fa-check"> Selesai</i>
                  </a>
                  <?php
                } else {
                  ?>
                  <a onclick="return(confirm('Selesaikan Service?'))"
                    href="<?= base_url('admin/service_order/cetak_faktur/' . $service->id) ?>" class="btn btn-primary"
                    target="_blank">
                    <i class="fa fa-check"> Cetak</i>
                  </a>
                  <?php

                }
                ?>

              </td>
              <td>

                <button style="margin-left: 20px;" onclick="javascript:history.back();" type="button"
                  class="btn btn-default">Cancel</button>
              </td>
            </tr>
          </table>
        </div>


      </div><!-- /.row -->
    </div><!-- /.page-content -->
  </div>
</div><!-- /.main-content -->

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.numpad.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.event.swipe.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.hotkeys.js'); ?>"></script>

<script>


  var barcode = null;
  var id_barang = null;

  function statusBarcode() {
    $(".nama_barang").val("");
    var status_barcode = $(".status_barcode").find(":selected").val();
    var source_nama_barang = [];
    if (status_barcode == "1") { // BARCODE
      source_nama_barang = [];
      //   console.log('aa');
    } else { // NAMA BARANG
      source_nama_barang = function (request, response) {
        $.ajax({
          url: '<?php echo base_url() ?>admin/penjualan_retail/json_produk',
          type: 'post',
          data: 'term=' + request.term + '&tgl=<?php echo date("Y-m-d") ?>',
          success: function (data) {
            response($.map(data, function (value, key) {
              return {
                value: value.value,
                label: value.barcode + ' / ' + value.label + ' (' + value.deskripsi + ')',
                // deskripsi: ,
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
      select: function (event, ui) {
        $('input[name="nama_barang"]').val(ui.item.nama_produk);
        barcode = ui.item.value;
        $(".form_barang").submit();
      }
    });
  }
  statusBarcode();
  $(".status_barcode").on('change', function () {
    statusBarcode();
  });
</script>