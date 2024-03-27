<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="#">Home</a>
        </li>
        <li class="">Laporan</li>
        <li class="active">Pembelian</li>
      </ul><!-- /.breadcrumb -->

      <div class="nav-search" id="nav-search">
        <form class="form-search">
          <span class="input-icon">
            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
              autocomplete="off" />
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
          Laporan Pembelian

        </h1>
      </div><!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->

          <form method="post" id="formPeriode" class="form-horizontal" action="">
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right">Periode</label>
              <div class="col-sm-3">
                <div class="pos-rel">
                  <input type="hidden" id="awal_periode" name="awal_periode" value="<?php echo $awal_periode ?>">
                  <input type="hidden" id="akhir_periode" name="akhir_periode" value="<?php echo $akhir_periode ?>">
                  <input class="form-control" type="text" name="periode" id="id-date-range-picker-1" value="0" />
                </div>
              </div>
            </div>
          </form>

          <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
          </div>
          <div class="table-header">
          </div>

          <!-- div.table-responsive -->

          <!-- div.dataTables_borderWrap -->
          <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th width="2" class="center">No</th>
                  <th>Tanggal</th>
                  <th>Nama Barang</th>
                  <th>Supplier</th>
                  <th>User</th>
                  <th>Level</th>
                  <th>Harga Satuan</th>
                  <th>Jumlah</th>
                  <th>Total Bayar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $total_harga = 0;
                $total_jumlah = 0;
                $total_bayar = 0;
                foreach ($contents as $key):
                  ?>
                  <tr>
                    <td class="center">
                      <?php echo $no ?>
                    </td>
                    <td>
                      <?php echo $key->tgl_masuk ?>
                    </td>
                    <td>
                      <?php echo $key->nama_produk ?>
                    </td>
                    <td>
                      <?php echo $key->nama_supplier ?>
                    </td>
                    <td>
                      <?php echo $key->first_name . " " . $key->last_name ?>
                    </td>
                    <td>
                      <?php echo $key->level ?>
                    </td>
                    <td>Rp <span style='float:right;'>
                        <?php echo number_format($key->harga_satuan, 0, ',', '.') ?>
                      </span></td>
                    <td>
                      <?php echo $key->jumlah ?>
                    </td>
                    <td>Rp <span style='float:right;'>
                        <?php echo number_format($key->total_bayar, 0, ',', '.') ?>
                      </span></td>
                  </tr>
                  <?php
                  $total_harga += $key->harga_satuan;
                  $total_jumlah += $key->jumlah;
                  $total_bayar += $key->total_bayar;
                  $no++;
                endforeach;
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="6" class="text-right">JUMLAH</th>
                  <th>Rp <span style='float:right;'>
                      <?php echo number_format($total_harga, 0, ',', '.') ?>
                    </span></th>
                  <th>
                    <?php echo $total_jumlah ?>
                  </th>
                  <th>Rp <span style='float:right;'>
                      <?php echo number_format($total_bayar, 0, ',', '.') ?>
                    </span></th>
                </tr>
              </tfoot>
            </table>
          </div>

          <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.page-content -->
  </div>
</div><!-- /.main-content -->


<!-- JQUERY -->
<script>
  jQuery(function ($) {
    $('input[id=id-date-range-picker-1]').daterangepicker({
      'applyClass': 'btn-sm btn-success',
      'cancelClass': 'btn-sm btn-default',
      locale: {
        applyLabel: 'Apply',
        cancelLabel: 'Cancel',
        format: 'YYYY-MM-DD',
      },
      startDate: '<?php echo $awal_periode ?>',
      endDate: '<?php echo $akhir_periode ?>',
    },
      function (start, end, label) {
        $("#awal_periode").val(start.format('YYYY-MM-DD'));
        $("#akhir_periode").val(end.format('YYYY-MM-DD'));
        $("#formPeriode").submit();
      })
      .prev().on(ace.click_event, function () {
        $(this).next().focus();
      });
  });
</script>
<!-- JQUERY -->