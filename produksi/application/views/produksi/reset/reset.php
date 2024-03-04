
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Pengaturan</li>
              <li class="active">Reset Data</li>
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
                Reset Data
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form class="form-horizontal" method="post" action="<?php echo $action ?>">

                <div class="row">
                  <div class="col-md-3">
                      <div class="checkbox">
                        <label>
                          <input name="produk" type="checkbox" class="ace" value="1" />
                          <span class="lbl"> Data Produk</span>
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input name="kategori_produk" type="checkbox" class="ace" value="1" />
                          <span class="lbl"> Kategori Produk</span>
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input name="satuan_produk" type="checkbox" class="ace" value="1" />
                          <span class="lbl"> Satuan Produk</span>
                        </label>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="checkbox">
                        <label>
                          <input name="penjualan" type="checkbox" class="ace" value="1" />
                          <span class="lbl"> Data Penjualan</span>
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input name="pembelian" type="checkbox" class="ace" value="1" />
                          <span class="lbl"> Data Pembelian</span>
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input name="kasir" type="checkbox" class="ace" value="1" />
                          <span class="lbl"> Data Pegawai</span>
                        </label>
                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-4">
                      <label for="varchar">Password <?php echo form_error('password') ?></label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
                  </div>
                </div>
                <br>
                <center>
                <button class="btn btn-danger btn-small" onclick="return konfirmasi();">Reset Data</button>
                </center>

                </form>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<script>
function konfirmasi(){
  var a = confirm("Apaka anda ingin mereset data?");
  if(a==true){
    return true;
  } else {
    return false;
  }
}
</script>