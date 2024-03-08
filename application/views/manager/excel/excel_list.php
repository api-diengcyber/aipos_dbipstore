
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Unduh Excel</li>
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
                UNDUH EXCEL
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <?php echo $this->session->userdata('message'); ?>

                <form action="<?php echo base_url() ?>packing/excel/export_action" method="post">
                  <div class="alert alert-info">
                    <h4>FILTER</h4>
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-2">
                          <h6>Dari Tanggal</h6>
                          <input type="text" name="dari" id="datepicker1" value="<?php echo $dari;?>" autocomplete="off" />
                        </div>
                        <div class="col-md-2">
                          <h6>Sampai Tanggal</h6>
                          <input type="text" name="sampai" id="datepicker2" value="<?php echo $sampai;?>" autocomplete="off" />
                        </div>
                        <div class="col-md-2">
                          <h6>Berdasarkan Status</h6>
                          <select name="status" id="status" class="form-control">
                            <option value="">-- Pilih Status --</option>
                            <option value="1" selected>Belum ada Resi</option>
                            <option value="2">Sudah ada Resi</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <h6>&nbsp;</h6>
                          <button type="submit" class="btn btn-primary btn-sm">UNDUH</button>
                        </div>
                    </div>
                  </div>
                </form>

                <form action="<?php echo base_url() ?>packing/excel/upload_action" method="post" enctype="multipart/form-data">
                  <div class="alert alert-info">
                    <h4>UPLOAD</h4>
                    <div class="row" style="margin-bottom: 5px">
                      <div class="col-md-4">
                        <h6>File Excel (.xls)</h6>
                        <input type="file" name="file" class="form-control" />
                      </div>
                      <div class="col-md-4">
                        <h6>&nbsp;</h6>
                        <button type="submit" class="btn btn-success btn-sm">KIRIM</button>
                      </div>
                    </div>
                  </div>
                </form>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->