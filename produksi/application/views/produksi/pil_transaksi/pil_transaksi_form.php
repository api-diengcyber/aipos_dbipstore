
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Jurnal</li>
              <li class="active">Pilihan Transaksi</li>
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
                Pilihan Transaksi
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form action="<?php echo $action; ?>" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="varchar">Kode Transaksi <?php echo form_error('kode_transaksi') ?></label>
                          <input type="text" class="form-control" name="kode_transaksi" id="kode_transaksi" placeholder="Kode Transaksi" value="<?php echo $kode_transaksi; ?>" />
                      </div>
                      <div class="form-group">
                          <label for="varchar">Nama Transaksi <?php echo form_error('nama_transaksi') ?></label>
                          <input type="text" class="form-control" name="nama_transaksi" id="nama_transaksi" placeholder="Nama Transaksi" value="<?php echo $nama_transaksi; ?>" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="int">Debet <?php echo form_error('id_debet') ?></label>
                          <select name="id_debet" id="id_debet" class="form-control">
                          <?php foreach ($data_akun as $key): ?>
                              <option value="<?php echo $key->id ?>" <?php echo $key->id==$id_debet ? "selected" : "" ?>><?php echo $key->kode ?> --- <?php echo $key->akun ?></option>
                          <?php endforeach ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="int">Kredit <?php echo form_error('id_kredit') ?></label>
                          <select name="id_kredit" id="id_kredit" class="form-control">
                          <?php foreach ($data_akun as $key): ?>
                              <option value="<?php echo $key->id ?>" <?php echo $key->id==$id_kredit ? "selected" : "" ?>><?php echo $key->kode ?> --- <?php echo $key->akun ?></option>
                          <?php endforeach ?>
                          </select>
                      </div>
                    </div>
                  </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('produksi/pil_transaksi') ?>" class="btn btn-default">Cancel</a>
                </form>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->