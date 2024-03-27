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
          Service
        </h1>
      </div><!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <form action="<?php echo $action; ?>" method="post">
            <input type="hidden" name="id" id="" value="<?= $id ?>">
            <div class="form-group">
              <label for="varchar">Service
                <?php echo form_error('nama') ?>
              </label>
              <input type="text" class="form-control" name="nama" placeholder="Nama Service"
                value="<?php echo $nama; ?>" />
            </div>

            <div class="form-group">
              <label for="varchar">Harga
                <?php echo form_error('harga') ?>
              </label>
              <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga"
                value="<?php echo number_format(!empty ($harga) ? $harga : 0, 0, ',', '.'); ?>" />
            </div>

            <div class="form-group">
              <label for="varchar">Estimasi Waktu
                <?php echo form_error('estimasi_waktu') ?>
              </label>
              <input type="text" class="form-control" name="estimasi_waktu" placeholder="ex: satu hari"
                value="<?php echo $estimasi_waktu; ?>" />
            </div>


            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="javascript:history.back();" class="btn btn-default">Cancel</button>
          </form>

          <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.page-content -->
  </div>
</div><!-- /.main-content -->

<script>
  jQuery(function ($) {
    $("#id_kas").on('change', function () {
      var id_kas = $(this).val();
      var nama_kas = (id_kas == 1) ? 'Nama Pendapatan' : 'Nama Pengeluaran';
      $("#nama_kas").html(nama_kas);
    });
    $("#harga").on('keyup', function () {
      var nominal = $(this).val().replace(/\./g, '');
      $(this).val(number_format(nominal * 1, 0, ',', '.'));
    });
  });
</script>