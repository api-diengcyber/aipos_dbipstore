<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="#">Home</a>
        </li>
        <li class="active">
          <?php if ($type == 'non_karyawan') {
            echo "Beban Non Karyawan";
          } else {
            echo "
                  Beban Karyawan
                  
                  ";
          } ?>
        </li>
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
          <?php if ($type == 'non_karyawan') {
            echo "Beban Non Karyawan";
          } else {
            echo "
                  Beban Karyawan
                  
                  ";
          } ?>
        </h1>
      </div><!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->

          <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-6">
                <input type="hidden" class="form-control" name="id_toko" id="id_toko" placeholder="Id Toko"
                  value="<?php echo $id_toko; ?>" />
                <?php
                if (!empty($id_beban)) {
                  ?>
                  <input type="hidden" name="id_beban" id="" value="<?= $id_beban ?>">
                  <?php
                }
                ?>
                <?php if ($type == 'non_karyawan') { ?>
                  <div class="form-group">
                    <label for="varchar">Nama
                      <?php echo form_error('nama') ?>
                    </label>
                    <input type="text" name="nama" class="form-control" value="<?= $nama ?>" placeholder="Nama">
                  </div>
                <?php } else { ?>
                  <div class="form-group">
                    <label for="varchar">Karyawan
                      <?php echo form_error('karyawan') ?>
                    </label>
                    <select name="id_users" id="" class="form-control">



                      <option value="" selected>
                        --Pilih Karyawan--
                      </option>
                      <?php
                      foreach ($karyawan as $k) { ?>
                        <option value="<?= $k->id_users ?>" <?php if ($k->id_users == $id_user) {
                            echo "selected";
                          } ?>>

                          <?php echo $k->first_name;
                          // if ($k->level == 2) {
                          //   echo " | SALES";
                          // } elseif ($k->level = 3) {
                          //   echo " | GUDANG";
                      
                          // } elseif ($k->level = 4) {
                          //   echo " | SALES";
                          // } elseif ($k->level = 5) {
                          //   echo " | MARKETING";
                          // } else {
                          //   echo "| PRINCIPAL";
                          // }
                          ?>

                        </option>
                      <?php }
                      ?>


                    </select>
                    <!--                         
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" /> -->
                  </div>
                <?php } ?>


                <div class="form-group">
                  <label for="varchar">Bulan - Tahun
                    <?php echo form_error('bulan') ?>
                  </label>

                  <input type="text" class="form-control " name="bulan" id="datepicker4" placeholder="Bulan"
                    value="<?php echo $bulan; ?>" />
                </div>
                <div class="form-group">
                  <label for="varchar">Jumlah Hari Aktif
                    <?php echo form_error('hari_aktif') ?>
                  </label>
                  <input type="number" class="form-control" name="hari_aktif" id="hari_aktif"
                    placeholder="Jumlah Hari Aktif" value="<?php echo $hari_aktif; ?>" />
                </div>
                <div class="form-group">
                  <label for="varchar">Nominal Seluruh Hari Aktif
                    <?php echo form_error('nominal') ?>
                  </label>
                  <input type="text" class="form-control nominal" name="nominal" id="nominal"
                    placeholder="Nominal Seluruh Hari Aktif"
                    value="<?php echo number_format(!empty($nominal) ? $nominal : 0, 0, ',', '.'); ?>" />
                </div>
              </div>
              <?php if ($type == 'non_karyawan') { ?>

              <?php } else { ?>


                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="varchar">Jumlah Lembur
                      <?php echo form_error('lembur') ?>
                    </label>
                    <input type="number" class="form-control" name="lembur" id="lembur" placeholder="Jumlah Lembur"
                      value="<?php echo $lembur; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Nominal Seluruh Lembur
                      <?php echo form_error('nominal_lembur') ?>
                    </label>
                    <input type="text" class="form-control nominal" name="nominal_lembur" id="nominal_lembur"
                      placeholder="Nominal Seluruh Lembur"
                      value="<?php echo number_format(!empty($nominal_lembur) ? $nominal_lembur : 0, 0, ',', '.'); ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Jumlah Target
                      <?php echo form_error('target') ?>
                    </label>
                    <input type="number" class="form-control " name="target" id="target" placeholder="Jumlah Target"
                      value="<?php echo $target; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Nominal Seluruh Target
                      <?php echo form_error('nominal_target') ?>
                    </label>
                    <input type="text" class="form-control nominal" name="nominal_target" id="nominal_target"
                      placeholder="Nominal Seluruh Target"
                      value="<?php echo number_format(!empty($nominal_target) ? $nominal_target : 0, 0, ',', '.'); ?>" />
                  </div>
                </div>
                <?php
              }
              ?>


            </div>



            <!-- <div class="form-group">
                        <label for="int">Data Toko </label>
                        <select multiple="" class="chosen-select form-control" name="data_toko[]" id="form-field-select-4" data-placeholder="Data Toko">
                            <?php $no = 1;
                            foreach ($data_toko as $key) { ?>
                            <option value="<?php echo $key->id_member ?>" <?php echo $key->id_sales != '0' ? 'selected' : '' ?>><?php echo $key->nama ?></option>
                            <?php $no++;
                            } ?>
                        </select>
                    </div> -->
            <!-- <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <input type="hidden" name="id_users" value="<?php echo !empty($id_users) ? $id_users : 0; ?>" /> 
                    <input type="hidden" name="level" value="4" />  -->
            <button type="submit" class="btn btn-primary">
              <?php echo $button ?>
            </button>
            <a href="<?php echo site_url('admin/pegawai_beban/' . $type) ?>" class="btn btn-default">Cancel</a>
          </form>

          <div class="hr hr32 hr-dotted">
          </div>

          <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.page-content -->
  </div>
</div><!-- /.main-content -->


<script>
  $(document).ready(function () {
    if (!ace.vars['touch']) {
      $('.chosen-select').chosen({ allow_single_deselect: true });
    }
  });
</script>
<script>
  jQuery(function ($) {
    $("#id_kas").on('change', function () {
      var id_kas = $(this).val();
      var nama_kas = (id_kas == 1) ? 'Nama Pendapatan' : 'Nama Pengeluaran';
      $("#nama_kas").html(nama_kas);
    });
    $(".nominal").on('keyup', function () {
      var nominal = $(this).val().replace(/\./g, '');
      $(this).val(number_format(nominal * 1, 0, ',', '.'));
    });
  });
</script>