
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Pembelian Barang</li>
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
                Faktur Pembelian
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('admin/pembelian/create'), 'Pembelian Baru', 'class="btn btn-primary "'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                    </div>
                </div>

                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th width="10">No</th>
                            <th>Tanggal</th>
                            <th>Faktur</th>
                            <th>Supplier</th>
                            <th>Pembayaran</th>
                            <th>Produk</th>
                            <th>Total</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $total= 0;
                      $no=1;
                      foreach($data_faktur as $df):
                        $total += $df->total;
                        ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $df->tgl_faktur ?></td> 
                          <td>
                            <?php echo $df->no_faktur ?>
                            <?php if (!empty($df->id_retur)) { ?>
                            <br>
                            <a href="<?php echo base_url() ?>admin/retur/read/<?php echo $df->id_retur ?>"><span class="red">Ada retur</span></a>
                            <?php } ?>
                          </td>
                          <td><?php echo $df->nama_supplier ?></td>
                          <td><?php
                                $pmb = $df->pembayaran;
                                if($pmb == 0){
                                  echo '<label for="" class="label label-primary">TUNAI</label>';
                                }else{
                                  if($df->total_hutang > 0){
                                    echo '<label for="" class="label label-danger">HUTANG</label>'.'<br>';
                                  }else{
                                    echo '<label for="" class="label label-inverse">LUNAS</label>'.'<br>';
                                  }
                                  $total_hutang = $df->total-$df->dp;
                                  if ($total_hutang < 0) {
                                    $total_hutang = 0;
                                  }
                                  echo 'Jatuh Tempo : '.$df->deadline.'<br>';
                                  echo 'DP : '.number_format($df->dp,0,',','.').'<br>';
                                  echo 'Total Hutang : '.number_format($total_hutang,0,',','.');
                                }
                              ?>
                          </td>
                          <td>
                            <label for="" class="label label-warning"><?php echo $df->jml_produk; ?> Produk</label>
                            <label for="" class="label label-primary"><?php echo $df->jml_item; ?> Pcs</label>
                          </td>
                          <td><?php echo number_format($df->total,0,',','.') ?></td>
                          <td class="text-center">
                            <a href="<?php echo base_url() ?>admin/pembelian/read/<?php echo $df->id_faktur ?>" class="btn btn-success btn-xs"><i class="ace-icon fa fa-check"></i></a> 
                            <a href="<?php echo base_url() ?>admin/pembelian/update/<?php echo $df->id_faktur ?>" class="btn btn-info btn-xs"><i class="ace-icon fa fa-pencil"></i></a>
                          </td>
                        </tr>
                      <?php $no++;endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="6" class="text-right">TOTAL</th>
                        <th class="text-right"><?php echo number_format($total,0,',','.') ?></th>
                      </tr>
                    </tfoot>
                </table>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<script>
$(document).ready(function(){
  $("#mytable").dataTable();
});
</script>