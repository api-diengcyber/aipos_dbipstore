
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Penjualan Supplier</li>
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
                Penjualan Supplier
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4"></div>
                </div>
                <div class="row">
                  <form action="" method="post" class="form-horizontal">
                  <div class="col-md-4">
                    <div class="infobox infobox-green infobox-large infobox-dark" style="cursor:pointer;width:100%;margin-bottom:10px">
                      <div class="infobox-icon" style="margin-top:5px;">
                        <i class="ace-icon fa fa-money"></i>
                      </div>
                      <div class="infobox-data">
                        <div class="infobox-content" style="max-width:100%;">
                          <h5>
                            Penjualan <br>
                            Berdasarkan Supplier
                          </h5>
                        </div>
                      </div>
                    </div>
                    <select name="id_principal" class="form-control" onchange="this.form.submit()" style="margin-bottom:20px;">
                      <option value="">SEMUA</option>
                      <?php foreach ($data_principal as $key): ?>
                      <option value="<?php echo $key->id_supplier ?>" <?php echo $id_principal==$key->id_supplier ? "selected" : "" ?>><?php echo $key->nama_supplier ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <div class="infobox infobox-blue infobox-large infobox-dark" style="cursor:pointer;width:100%;margin-bottom:10px;">
                      <div class="infobox-icon" style="margin-top:5px">
                        <i class="ace-icon fa fa-money"></i>
                      </div>
                      <div class="infobox-data" >
                        <div class="infobox-content" style="max-width:none">
                          <h5>
                            Penjualan <br>
                            Berdasarkan Produk
                          </h5>
                        </div>
                      </div>
                    </div>
                    <select name="id_produk" class="form-control" onchange="this.form.submit()" style="margin-bottom:20px;">
                      <option value="">SEMUA</option>
                      <?php foreach ($data_produk as $key): ?>
                      <option value="<?php echo $key->id_produk_2 ?>" <?php echo $key->id_produk_2==$id_produk ? "selected" : "" ?>><?php echo $key->nama_produk ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <div class="infobox infobox-orange infobox-large infobox-dark" style="cursor:pointer;width:100%;margin-bottom:10px;visibility:visible;">
                      <div class="infobox-icon" style="margin-top:5px">
                        <i class="ace-icon fa fa-calendar"></i>
                      </div>
                      <div class="infobox-data" >
                        <div class="infobox-content" style="max-width:none">
                          <h4>
                            Periode
                          </h4>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="start_periode" id="start_periode" value="<?php echo $start_periode ?>">
                    <input type="hidden" name="end_periode" id="end_periode" value="<?php echo $end_periode ?>">
                    <input type="text" class="form-control" name="periode" id="periode" autocomplete="off" style="margin-bottom:20px;">
                  </div>
                  </form>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-xs-12">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="myTable">
                        <thead>
                          <tr>
                            <th width="5">No</th>
                            <th width="350">Principal</th>
                            <th width="400">Produk</th>
                            <th width="80" class="text-center">Dibeli</th>
                            <th width="200" class="text-center">Nominal</th>
                            <th width="100" class="text-center">%</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $total = 0; 
                          foreach ($data_produk_jual as $key):
                            $total += $key->total;
                          endforeach;
                          $no = 1;  
                          $terjual = 0;
                          $total_persen = 0; 
                          foreach ($data_produk_jual as $key):
                            $persen = ($key->total/$total)*100;
                            $total_persen += $persen;
                          ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $key->nama_kategori ?></td>
                            <td><a href="<?php echo base_url() ?>principal/detail_produk/<?php echo $key->id_produk_2 ?>/<?php echo $start_periode ?>/<?php echo $end_periode ?>"><?php echo $key->nama_produk ?></a></td>
                            <td class="text-center"><?php echo $key->terjual ?></td>
                            <td class="text-right"><?php echo number_format($key->total,0,'.',',') ?></td>
                            <td class="text-right"><?php echo number_format($persen,2,',','.') ?> %</td>
                          </tr>
                          <?php $no++; $terjual+=$key->terjual; endforeach; ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th class="text-right" colspan="3">TOTAL</th>
                            <th class="text-center"><?php echo $terjual ?></th>
                            <th class="text-right"><?php echo number_format($total,0,'.',',') ?></th>
                            <th class="text-center"><?php echo number_format($total_persen,2,',','.') ?> %</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div>

            <div class="hr hr10 hr-double"></div>

          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->
<script>
$(document).ready(function(){
  $("#myTable").dataTable();
  $('input[id="periode"]').daterangepicker({
      'applyClass' : 'btn-sm btn-success',
      'cancelClass' : 'btn-sm btn-default',
      locale: {
        applyLabel: 'Apply',
        cancelLabel: 'Cancel',
        format: 'DD-MM-YYYY',
      },
      startDate:'<?php echo $start_periode ?>',
      endDate:'<?php echo $end_periode ?>',
  },
  function(start, end, label){
      $("#start_periode").val(start.format("DD-MM-YYYY"));
      $("#end_periode").val(end.format("DD-MM-YYYY"));
      $("form").submit();
  })
  .prev().on(ace.click_event, function(){
      $(this).next().focus();
  });
});
</script>