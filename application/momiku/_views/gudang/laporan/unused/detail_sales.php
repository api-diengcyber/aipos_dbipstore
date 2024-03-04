
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Detail Sales Harian</li>
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

            <div class="page-header" style="padding-bottom: 8px;">
              <h1>
                  <?php echo $nama_sales ?>
              </h1>
              <h5 style="margin-bottom:0px;margin-left:5px;"><?php echo $t_tgl ?></h5>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php if (count($data_od) == 0) { ?>
                <div class="alert alert-info">
                  <i class="fa fa-info-circle"></i> Data tidak ada
                </div>
                <?php } ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5">No</th>
                                <th>Toko</th>
                                <th>Nama Produk</th>
                                <th width="120" class="text-center">Harga</th>
                                <th width="90" class="text-center">Qty</th>
                                <th width="90" class="text-center">Qty Bonus</th>
                                <th width="120" class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1; 
                        $jml_harga = 0;
                        $jml_qty = 0;
                        $jml_qty_bonus = 0;
                        $jml_subtotal = 0;
                        foreach ($data_od as $key) : 
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $key->nama ?><br><?php echo $key->alamat ?></td>
                                <td><?php echo $key->nama_produk ?></td>
                                <td class="text-right"><?php echo number_format($key->harga_jual,0,',','.') ?></td>
                                <td class="text-center"><?php echo $key->jumlah ?></td>
                                <td class="text-center"><?php echo $key->jumlah_bonus ?></td>
                                <td class="text-right"><?php echo number_format($key->subtotal,0,',','.') ?></td>
                            </tr>
                        <?php 
                        $no++; 
                        $jml_harga += $key->harga_jual;
                        $jml_qty += $key->jumlah;
                        $jml_qty_bonus += $key->jumlah_bonus;
                        $jml_subtotal += $key->subtotal;
                        endforeach;
                        ?>
                        </tbody>
                        <tfoot>
                            <tr style="background-color: yellow;">
                                <th colspan="3" class="text-right">TOTAL</th>
                                <th class="text-right"><?php echo number_format($jml_harga,0,',','.') ?></th>
                                <th class="text-center"><?php echo $jml_qty ?></th>
                                <th class="text-center"><?php echo $jml_qty_bonus ?></th>
                                <th class="text-right"><?php echo number_format($jml_subtotal,0,',','.') ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<script>
$(document).ready(function(){
  $('.table').dataTable();
});
</script>