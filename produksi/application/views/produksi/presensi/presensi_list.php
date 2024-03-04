<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="#">Home</a>
        </li>
        <li>Manajemen Karyawan</li>
        <li class="active">Presensi</li>
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
          Presensi
        </h1>
      </div><!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->

          <style>
            .list-users {
              margin-bottom: 3px;
            }
          </style>

          <div class="row">
            <div class="col-xs-12">
              <form action="" method="post" style="margin-bottom: 20px;">
                <div class="row">
                  <div class="col-xs-4">
                    <div class="form-group">
                      <input type="text" class="form-control" name="tgl" id="datepicker1" value="<?php echo $tgl ?>" />
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <button type="submit" class="btn btn-primary">Proses</button>
                  </div>
                </div>
              </form>
              <?php foreach ($data_karyawan as $key) : ?>
                <div class="list-users">
                  <div class="row">
                    <div class="col-xs-2">
                      <h4><?php echo $key->first_name ?></h4>
                    </div>
                    <div class="col-xs-2" style="padding-left:0px;">
                      <button type="button" class="btn btn-success btn-block btn-masuk" data-id="<?php echo $key->id_users ?>" data-action="masuk" <?php echo !empty($key->jam_masuk) || $key->tidak_masuk > 0 ? "disabled" : "" ?>>Masuk</button>
                      <div class="sbox-masuk" data-id="<?php echo $key->id_users ?>">
                        <?php if (!empty($key->jam_masuk) && $key->tidak_masuk == 0) { ?>
                          <input type="text" class="form-control input_jam_masuk" name="jm_masuk[]" value="<?php echo $key->jam_masuk ?>" data-id="<?php echo $key->id_users ?>" />
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col-xs-2" style="padding-left:0px;">
                      <button type="button" class="btn <?php echo !empty($key->jam_pulang) && $key->tidak_masuk == 0 ? "btn-warning" : "btn-danger" ?> btn-block btn-pulang" data-id="<?php echo $key->id_users ?>" data-action="pulang" <?php echo $key->tidak_masuk > 0 ? "disabled" : "" ?>>Pulang</button>
                      <div class="sbox-pulang" data-id="<?php echo $key->id_users ?>">
                        <?php if (!empty($key->jam_pulang) && $key->tidak_masuk == 0) { ?>
                          <input type="text" class="form-control input_jam_pulang" name="jm_pulang[]" value="<?php echo $key->jam_pulang ?>" data-id="<?php echo $key->id_users ?>" />
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col-xs-2" style="padding-left:0px;">
                      <div class="form-group">
                        <select class="select-tidak-masuk" data-id="<?php echo $key->id_users ?>" data-action="tidak_masuk" style="width:100%;height:42px;">
                          <option value="">-- Ket. Tidak masuk --</option>
                          <option value="1" <?php echo $key->tidak_masuk == 1 ? "selected" : "" ?>>Sakit</option>
                          <option value="2" <?php echo $key->tidak_masuk == 2 ? "selected" : "" ?>>Ijin</option>
                          <option value="3" <?php echo $key->tidak_masuk == 3 ? "selected" : "" ?>>Tanpa Keterangan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-4" style="padding-left:0px;">
                      <div class="form-group">
                        <input type="text" class="form-control keterangan" placeholder="Keterangan" value="<?php echo $key->keterangan ?>" data-id="<?php echo $key->id_users ?>" data-action="keterangan" style="height:42px;">
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>

          <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.page-content -->
  </div>
</div><!-- /.main-content -->

<script>
  $(document).ready(function() {
    function onSubmit(id, act, r, e) {
      $.ajax({
        url: '<?php echo base_url() ?>produksi/presensi/submit',
        type: 'post',
        data: 'id=' + id + '&act=' + act + '&tgl=<?php echo $tgl ?>',
        success: function(response) {
          r(response);
        },
        error: function(xhr, status, throwError) {
          e(xhr);
        }
      });
    }
    $(".btn-masuk").on("click", function(e) {
      e.stopImmediatePropagation();
      var that = $(this);
      var id = that.attr('data-id');
      var act = that.attr('data-action');
      onSubmit(id, act, function(res) {
        if (res.status == "ok") {
          that.attr("disabled", "disabled");
          $('.btn-pulang[data-id="' + id + '"]').removeAttr("disabled");
          $('.sbox-masuk[data-id="' + id + '"]').html('<input type="text" class="form-control input_jam_masuk" name="jm_masuk[]" value="' +
            res.jam + '" data-id="' + id + '" />');
          updateInputMasuk();
        }
      });
    });
    updateInputMasuk();
    updateInputPulang();
    $(".btn-pulang").on("click", function(e) {
      e.stopImmediatePropagation();
      var that = $(this);
      var id = that.attr('data-id');
      var act = that.attr('data-action');
      onSubmit(id, act, function(res) {
        if (res.status == "ok") {
          that.removeClass("btn-danger");
          that.removeClass("btn-warning");
          that.addClass("btn-warning");
          $('.sbox-pulang[data-id="' + id + '"]').html('<input type="text" class="form-control input_jam_pulang" name="jm_pulang[]" value="' +
            res.jam + '" data-id="' + id + '" />');
          updateInputPulang();
        }
      });
    });
    $(".select-tidak-masuk").on("change", function(e) {
      e.stopImmediatePropagation();
      var that = $(this);
      var id = that.attr('data-id');
      var act = that.attr('data-action');
      onSubmit(id + '&val=' + that.val(), act, function(res) {
        if (that.val() * 1 == 0) {
          window.location.reload();
        }
        if (res.status == "ok") {
          $('.btn-masuk[data-id="' + id + '"]').attr("disabled", "disabled");
          $('.btn-pulang[data-id="' + id + '"]').removeClass("btn-danger");
          $('.btn-pulang[data-id="' + id + '"]').removeClass("btn-warning");
          $('.btn-pulang[data-id="' + id + '"]').addClass("btn-danger");
          $('.btn-pulang[data-id="' + id + '"]').attr("disabled", "disabled");
          $('.sbox-masuk[data-id="' + id + '"]').text('');
          $('.sbox-pulang[data-id="' + id + '"]').text('');
        }
      });
    });
    $(".keterangan").on("change", function(e) {
      e.stopImmediatePropagation();
      var that = $(this);
      var id = that.attr('data-id');
      var act = that.attr('data-action');
      that.attr("disabled", "disabled");
      onSubmit(id + '&val=' + that.val(), act, function(res) {
        that.removeAttr("disabled");
      });
    });

    function updateInputMasuk() {
      refreshTimeWidget($('.input_jam_masuk'));
      $(".input_jam_masuk").on("change", function(e) {
        e.stopImmediatePropagation();
        $(".input_jam_masuk").attr("disabled", "disabled");
        var that = $(this);
        var val = that.val();
        var id = that.attr('data-id');
        $('.btn-masuk[data-id="' + id + '"]').attr("disabled", "disabled");
        onSubmit(id + '&val=' + that.val(), 'jam_masuk', function(res) {
          $(".input_jam_masuk").removeAttr("disabled");
          // $('.btn-masuk[data-id="' + id + '"]').removeAttr("disabled");
          refreshTimeWidget($('.input_jam_masuk'));
        });
      });
    }

    function updateInputPulang() {
      refreshTimeWidget($('.input_jam_pulang'));
      $(".input_jam_pulang").on("change", function(e) {
        e.stopImmediatePropagation();
        $(".input_jam_pulang").attr("disabled", "disabled");
        var that = $(this);
        var val = that.val();
        var id = that.attr('data-id');
        $('.btn-pulang[data-id="' + id + '"]').attr("disabled", "disabled");
        onSubmit(id + '&val=' + that.val(), 'jam_pulang', function(res) {
          $(".input_jam_pulang").removeAttr("disabled");
          $('.btn-pulang[data-id="' + id + '"]').removeAttr("disabled");
          refreshTimeWidget($('.input_jam_pulang'));
        });
      });
    }

    function refreshTimeWidget(el) {
      el.timepicker({
        minuteStep: 1,
        showSeconds: true,
        showMeridian: false,
        disableFocus: true,
        icons: {
          up: 'fa fa-chevron-up',
          down: 'fa fa-chevron-down'
        }
      }).on('focus', function() {
        el.timepicker('showWidget');
      }).next().on(ace.click_event, function() {
        $(this).prev().focus();
      });
    }
  });
</script>