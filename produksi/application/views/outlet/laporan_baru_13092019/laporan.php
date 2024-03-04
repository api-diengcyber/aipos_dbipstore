
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Laporan</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
              <form class="form-search">
                <span class="input-icon">
                  <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
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
                Laporan
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <!-- <div class="row">
                  <div class="col-md-4">
                    <a target="_blank" href="<?php // echo base_url() ?>outlet/laporan_kas/harian" class="btn btn-default btn-app">Stok Produk</a>
                  </div>
                </div> -->

                <div class="row" style="margin-top:20px;">
                  <div class="col-md-4">
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_kas/harian" class="btn btn-primary btn-block">Laporan Kas Harian</a>
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_kas/bulanan" class="btn btn-primary btn-block">Laporan Kas Bulanan</a>
                  </div>
                  <div class="col-md-4">
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_pembelian/rinci_supplier" class="btn btn-danger btn-block">Laporan Pembelian Rinci per Supplier</a>
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_pembelian/rekap_supplier" class="btn btn-danger btn-block">Laporan Pembelian Rekap per Supplier</a>
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_pembelian/rinci" class="btn btn-danger btn-block">Laporan Pembelian Rinci Semua Supplier</a>
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_pembelian/rekap" class="btn btn-danger btn-block">Laporan Pembelian Rekap Semua Supplier</a>
                  </div>
                  <div class="col-md-4">
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_hutang/rekap" class="btn btn-success btn-block">Laporan Hutang Rekap</a>
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_hutang/rinci" class="btn btn-success btn-block">Laporan Hutang Rinci</a>
                  </div>
                </div>

                <div class="row" style="margin-top:20px;">
                  <div class="col-md-4">
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_penjualan/rinci_per_area" class="btn btn-warning btn-block">Laporan Penjualan Rinci</a>
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_penjualan/rekap_per_area" class="btn btn-warning btn-block">Laporan Penjualan Rekap</a>
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_penjualan/rekap" class="btn btn-warning btn-block">Laporan Penjualan Rekap Gabungan</a>
                  </div>
                  <div class="col-md-4">
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_piutang/rekap_area" class="btn btn-purple btn-block">Laporan Piutang Rekap</a>
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_piutang/rinci_area" class="btn btn-purple btn-block">Laporan Piutang Rinci per Area</a>
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_piutang/rekap" class="btn btn-purple btn-block">Laporan Piutang Rekap Gabungan</a>
                  </div>
                  <div class="col-md-4">
                    <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_persediaan" class="btn btn-inverse btn-block">Laporan Persediaan</a>
                  </div>
                </div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->
