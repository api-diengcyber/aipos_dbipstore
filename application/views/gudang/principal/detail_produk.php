
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Principal Detail Produk</li>
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
                Detail Pembeli Produk
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <h4><?php echo $data_produk->nama_produk ?></h4>
                <p>Periode <?php echo $start_periode ?> - <?php echo $end_periode ?></p>
                
                <div class="row">
                  <div class="col-xs-12">
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th width="60">No</th>
                          <th>Nama</th>
                          <th width="110">Jumlah</th>
                          <th width="200">Nominal</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $jml = 0; $total = 0; $no = 1; foreach ($data_detail as $key): ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $key->nama ?><br><?php echo $key->alamat ?><br><?php echo $key->telp ?><br><i><?php echo $key->first_name ?></i></td>
                          <td class="text-center"><?php echo $key->jumlah+$key->jumlah_bonus ?></td>
                          <td class="text-center"><?php echo number_format($key->total,0,'.',',') ?></td>
                        </tr>
                      <?php $jml+=$key->jumlah+$key->jumlah_bonus; $total+=$key->total; $no++; endforeach ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="2" class="text-right">TOTAL</th>
                          <th class="text-center"><?php echo $jml ?></th>
                          <th class="text-center"><?php echo number_format($total,0,'.',',') ?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>  
                </div>
                <br><br>
                <a href="<?php echo base_url() ?>principal" class="btn btn-primary"><< Kembali</a>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div>

          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->
<script>
$(document).ready(function(){
  $("#myTable").dataTable();
});
</script>