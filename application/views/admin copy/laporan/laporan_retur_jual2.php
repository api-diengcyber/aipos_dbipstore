<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="#">Home</a>
        </li>
        <li>Laporan</li>
        <li class="active">Retur Penjualan</li>
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
          Retur Penjualan
        </h1>
        <?php if (!empty($message)) { ?>
          <?php echo $message; ?>
        <?php } ?>
      </div><!-- /.page-header -->

      <style>
        .alert-yellow {
          background-color: yellow !important;
          color: #000;
        }
      </style>

      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <form action="" method="post">
            <div class="alert alert-info">
              <h4>FILTER</h4>
              <div class="row" style="margin-bottom: 10px">
                <div class="col-md-2">
                  <h6>No Return</h6>
                  <input type="text" name="no_return" id="no_return" value="<?php echo $no_return; ?>">
                </div>
                <div class="col-md-2">
                  <h6>Return
                  </h6>
                  <select name="jenis_retur" id="jenis_retur" class="form-control">
                    <option value="">--</option>
                    <option value="1" <?php if ($jenis_retur == 1) {
                      echo "selected";
                    } ?>>BARANG</option>
                    <option value="2" <?php if ($jenis_retur == 2) {
                      echo "selected";
                    } ?>>UANG</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <h6>Dari Tanggal</h6>
                  <input type="text" name="dari" id="datepicker1" value="<?php echo $dari; ?>" autocomplete="off">
                </div>
                <div class="col-md-2">
                  <h6>Sampai Tanggal</h6>
                  <input type="text" name="sampai" id="datepicker2" value="<?php echo $sampai; ?>" autocomplete="off">
                </div>
                <div class="col-md-2">
                  <h6>Penerima</h6>
                  <select name="user" class="form-control">
                    <option value="0">-- Semua --</option>
                    <?php
                    foreach ($users as $u) { ?>
                      <option value="<?= $u->id_users ?>" <?php if ($user == $u->id_users) {
                        echo "selected";
                      } ?>>
                        <?= $u->first_name . " " . $u->last_name ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-2">
                  <h6>&nbsp;</h6>
                  <button class="btn btn-primary btn-sm">PROSES FILTER</button>
                </div>
              </div>
            </div>
          </form>

          <table class="table table-bordered table-striped" id="my-table">
            <thead>
              <tr>
                <th>NO</th>
                <th>NO FAKTUR RETUR <br> TANGGAL</th>
                <!-- <th width="100">INFO CS</th> -->
                <th>INFO PENERIMA</th>
                <th>DETAIL</th>
                <th>KETERANGAN</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $no = 1;

              foreach ($data_return as $r) { ?>
                <tr>
                  <td>
                    <?= $no++ ?>
                  </td>
                  <td>
                    <?= $r->no_retur ?>
                    <p></p>
                    <?= date('d-m-Y', strtotime($r->tgl)) ?>

                  </td>
                  <td>
                    <?= $r->first_name . " " . $r->last_name ?>
                  </td>
                  <td>
                    <p>
                      IMEI / NAMA PRODUK
                    </p>
                    <p>
                      <?= $r->barcode . " / " . $r->nama_produk ?>
                    </p>
                    <p>
                      RETUR
                    </p>
                    <p>
                      <?php if ($r->retur == 1) {
                        echo "BARANG";
                      } else {
                        echo "UANG\n";
                        echo "Rp " . number_format($r->total);
                      }
                      ?>
                    </p>
                  </td>
                  <td>
                    <?= $r->ket ?>
                  </td>
                </tr>
              <?php } ?>

              </td>
              </tr>
            </tbody>
          </table>



          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <form method="post" action="<?php echo base_url() ?>admin/order_sales/konfirmasi_delete">
                  <!-- <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modal Header</h4>
                        </div> -->
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password" />
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_order" />
                    <button type="submit" class="btn btn-primary">Hapus</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
          <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
          <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

          <script>

            $(document).ready(function () {
              $('#mytable').DataTable({
                "paging": false,
                "info": false,
              });

              $(".btn-delete-mdl").on("click", function () {
                var id_order = $(this).attr('data-id');
                $('input[name="id_order"]').val(id_order);
                $("#myModal").modal("show");
              });

              $(".btn-verifikasi-bayar").on("click", function () {
                $(this).attr("disabled", "disabled");
              });
            });
          </script>

          <div class="hr hr32 hr-dotted"></div>

          <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.page-content -->
  </div>
</div><!-- /.main-content -->