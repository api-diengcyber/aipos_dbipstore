
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
                Produk Retail
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12" style="margin-bottom:10px">
                  <?php
                  if(!empty($tampil_gambar)){
                    if(file_exists($tampil_gambar)) {
                  ?>
                  <img src="<?php echo base_url().$tampil_gambar ?>" width="300px" style="border:3px solid grey;">
                  <?php }; }; ?>
              </div>
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
			        <table class="table">
    					    <tr><td width="150">Barcode</td><td><?php echo $barcode; ?></td></tr>
    					    <tr><td>Kategori</td><td><?php echo $id_kategori; ?></td></tr>
    					    <tr><td>Nama Produk</td><td><?php echo $nama_produk; ?></td></tr>
                  <tr><td>Stok</td><td><?php echo $stok ?></td></tr>
    					    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
                  <tr><td>Harga Umum</td><td><?php echo number_format($harga_1,0,',','.'); ?></td></tr>
                  <tr><td>Harga Grosir 1</td><td><?php echo number_format($harga_2,0,',','.'); ?></td></tr>
                  <tr><td>Harga Grosir 2</td><td><?php echo number_format($harga_3,0,',','.'); ?></td></tr>
                  <tr><td>Harga Rita</td><td><?php echo number_format($harga_4,0,',','.'); ?></td></tr>
    					    <tr><td>Harga Rita Grosir</td><td><?php echo number_format($harga_5,0,',','.'); ?></td></tr>
    					    <tr><td>Satuan</td><td><?php echo $satuan; ?></td></tr>
    					    <tr><td>Berat</td><td><?php echo $berat; ?></td></tr>
    					    <tr><td>Minimal Grosir</td><td><?php echo $mingros; ?></td></tr>
    					    <tr><td>Diskon</td><td><?php echo $diskon; ?></td></tr>
    					    <tr><td>Rak</td><td><?php echo $rak; ?></td></tr>
    					    <tr><td></td><td></td></tr>
    					</table>

              <a href="<?php echo site_url('produksi/produk_retail') ?>" class="btn btn-default">Cancel</a>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->
