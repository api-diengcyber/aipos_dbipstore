
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan</li>
              <li class="active">Penjualan</li>
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
                Detail Faktur
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-md-4">
                <!-- PAGE CONTENT BEGINS -->
                  <div class="form-group">
                      <label for="varchar">No Faktur</label>
                      <h3 style="margin:0px;"><?php echo $order->no_faktur ?></h3>
                  </div>
                  <div class="form-group">
                      <label for="deskripsi">Tanggal</label>
                      <h3 style="margin:0px;"><?php echo $order->tgl_order." ".$order->jam_order ?></h3>
                  </div>
                  <div class="form-group">
                      <label for="int">Nominal</label>
                      <h3 style="margin:0px;">Rp <?php echo number_format($order->nominal,0,',','.') ?></h3>
                  </div>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
              <div class="col-md-8">
                <!-- PAGE CONTENT BEGINS -->
                  <div class="page-header">
                    <h1>Produk</h1>
                  </div>
                  <table id="" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Produk</th>
                          <th>HPP</th>
                          <th>Jual</th>
                          <th>Jml</th>
                          <th>Total HPP</th>
                          <th>Total Bayar</th>
                          <th>Laba</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no=1;
                      foreach ($detail_order as $key):
                        if ($key->mingros > 0) {
                          if($key->jumlah >= $key->mingros){
                            $harga = $key->harga_2;
                          } else {
                            $harga = $key->harga_1;
                          }
                        } else {
                            $harga = $key->harga_1;
                        }
                        $harga_barang_awal = $harga * $key->jumlah;
                        $diskon = $harga_barang_awal*($key->diskon/100);
                        $harga_barang = $harga_barang_awal - $diskon;
                        $subtotal = $key->harga_satuan*$key->jumlah;
                        $laba = $harga_barang - $subtotal;
                    ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $key->nama_produk ?></td>
                        <td>Rp. <span class="pull-right"><?php echo number_format($key->harga_satuan,0,',','.') ?></span></td>
                        <td>Rp. <span class="pull-right"><?php echo number_format($harga,0,',','.') ?></span></td>
                        <td align="center"><?php echo $key->jumlah ?></td>
                        <td>Rp. <span class="pull-right"><?php echo number_format($subtotal,0,',','.') ?></span></td>
                        <td>Rp. <span class="pull-right"><?php echo number_format($harga_barang,0,',','.') ?></span></td>
                        <td>Rp. <span class="pull-right"><?php echo number_format($laba,0,',','.') ?></span></td>
                      </tr>
                    <?php $no++; endforeach; ?>
                    </tbody>
                  </table>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="hr hr-dotted hr12"></div>

            <div class="row">
              <div class="col-xs-6">
              <button type="button" onclick="history.back()" class="btn btn-inverse"><i class="ace-icon fa fa-arrow-left"></i> Kembali</button>
              <button type="button" id="btnCetak" class="btn btn-primary"><i class="ace-icon fa fa-print"></i> CETAK NOTA</button>
              </div>
            </div>
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->


<!-- JQUERY -->
<script>
  jQuery(function($){
    $("#btnCetak").click(function(){
      var n = $(this);
      n.attr("disabled","disabled");
      n.text("Sedang mengambil data...");
      $.ajax({
        url: '<?php echo $cetak ?>',
        type: 'post',
        data: '',
        success: function(response){
            n.removeAttr("disabled");
            n.html('<i class="ace-icon fa fa-print"></i> CETAK NOTA');
            n.removeClass("btn-warning");
            n.addClass("btn-primary");
            var myWindow = window.open("<?php echo base_url() ?>penjualan_retail/cetak_nota_penjualan/<?php echo $order->no_faktur ?>", "MsgWindow", "width=300,height=400");
        },
        error: function(xhr, ajax, throwError){
            //alert(xhr.status);
            //alert(throwError);
            n.removeAttr("disabled");
            n.html('<i class="ace-icon fa fa-print"></i> ULANGI CETAK NOTA');
            n.removeClass("btn-primary");
            n.addClass("btn-warning");
        }
      });
    });
  });
</script>
<!-- JQUERY -->