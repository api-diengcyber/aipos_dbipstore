
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
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="varchar">No Faktur</label>
                      <h3 style="margin:0px;"><?php echo $order->no_faktur ?></h3>
                  </div>
                  <div class="form-group">
                      <label for="deskripsi">Tanggal</label>
                      <h3 style="margin:0px;"><?php echo $order->tgl_order." ".$order->jam_order ?></h3>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="varchar">Pembeli</label>
                      <h3 style="margin:0px;"><?php echo $pembeli ?></h3>
                  </div>
                  <div class="form-group">
                      <label for="int">Nominal Bayar <i>(Termasuk diskon jika ada.)</i></label><br>
                      <h3 style="margin:0px;" id="showPPn">Rp <?php echo number_format($order->nominal,0,',','.') ?></h3>
                  </div>
              </div><!-- /.col -->
            </div>
            <div class="hr hr-dotted hr10"></div>
            <div class="row">
              <div class="col-md-12">
                  <table id="" class="table table-condensed table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="5">No</th>
                        <th width="250" >Produk</th>
                        <?php if ($data_login->level=='1') { ?>
                        <th width="150" class="text-center">HPP</th>
                        <?php } ?>
                        <th width="150" class="text-center">Jual</th>
                        <th width="150" class="text-center">Qty</th>
                        <th width="150" class="text-center">Qty Bonus</th>
                        <?php if ($data_login->level=='1') { ?>
                        <th width="150" class="text-center">Total HPP</th>
                        <?php } ?>
                        <th width="150" class="text-center">Pot.</th>
                        <th width="150" class="text-center">Total</th>
                        <?php if ($data_login->level=='1') { ?>
                        <th width="150" class="text-center">Laba</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no=1;
                      $total_harga = 0;
                      $sum_laba = 0;
                      $total_ppn = 0;
                      foreach ($detail_order as $key):
                        $total_hpp = $key->harga_satuan * $key->jumlah;
                        $pot = (($key->diskon_produk/100)*$key->harga_jual)+(($key->diskon/100)*$key->harga_jual)+(($key->diskon2/100)*$key->harga_jual)+(($key->diskon3/100)*$key->harga_jual);
                        $laba = $key->subtotal - $total_hpp;
                        $ppn = (10/100)*($key->harga_jual-$pot);
                        $total_jual_ppn = ($key->harga_jual-$pot) + $ppn;
                        $color_tr = '#fff';
                        $color = '#000';
                        if ($key->total_retur > 0) {
                          $color_tr = '#f00';
                          $color = '#fff';
                        }
                    ?>
                      <tr style="background-color:<?php echo $color_tr ?>;color:<?php echo $color ?>;">
                        <td><?php echo $no ?></td>
                        <td><?php echo $key->nama_produk ?></td>
                        <?php if ($data_login->level=='1') { ?>
                        <td>Rp. <span class="pull-right"><?php echo number_format($key->harga_satuan,0,',','.') ?></span></td>
                        <?php } ?>
                        <td>Rp. <span class="pull-right"><?php echo number_format($key->harga_jual,0,',','.') ?></span> <br> PPN <span class="pull-right"><?php echo number_format($ppn,0,',','.') ?></span></td>
                        <td align="center"><?php echo $key->jumlah-$key->jumlah_retur ?> <?php echo $key->jumlah_retur>0?'(Retur: '.$key->jumlah_retur.')':'' ?></td>
                        <td align="center"><?php echo $key->jumlah_bonus ?></td>
                        <?php if ($data_login->level=='1') { ?>
                        <td>Rp. <span class="pull-right"><?php echo number_format($total_hpp,0,',','.') ?></span></td>
                        <?php } ?>
                        <td>Rp. <span class="pull-right"><?php echo number_format($pot,0,',','.') ?></span></td>
                        <td>Rp. <span class="pull-right"><?php echo number_format($key->subtotal-$key->total_retur,0,',','.') ?></span></td>
                        <?php if ($data_login->level=='1') { ?>
                        <td>Rp. <span class="pull-right"><?php echo number_format($laba,0,',','.') ?></span></td>
                        <?php } ?>
                      </tr>
                    <?php 
                    $total_harga += $key->subtotal-$key->total_retur;
                    $total_ppn += $ppn*$key->jumlah;
                    $sum_laba += $laba;
                    $no++; endforeach; ?>
                    <?php 
                    $diskon = $total_harga*($order->diskon_member/100);
                    $total_harga = $total_harga;
                    $colspan = 5;
                    if ($data_login->level=='1') { 
                      $colspan = 9;
                    }
                    ?>
                        <tr>
                          <th colspan="<?php echo $colspan ?>" style="text-align:right">Total Harga</th>
                          <td class="text-right"><?php echo 'Rp '.number_format($total_harga,0,',','.'); ?></td>
                        </tr>
                        <!-- <tr>
                          <th colspan="<?php echo $colspan ?>" style="text-align:right">PPN</th>
                          <td class="text-right"><?php echo 'Rp '.number_format($total_ppn,0,',','.'); ?></td>
                        </tr> -->
                        <!-- <tr>
                          <th colspan="<?php echo $colspan ?>" style="text-align:right">Diskon Member</th>
                          <td class="text-right"><?php echo number_format($order->diskon_member,0,',','.'); ?>%</td>
                        </tr>
                        <tr>
                          <th colspan="<?php echo $colspan ?>" style="text-align:right">Total Harus di bayar</th>
                          <td class="text-right"><?php echo 'Rp '.number_format($total_harga+$total_ppn - $diskon,0,',','.'); ?></td>
                        </tr>
                        <?php if ($data_login->level=='1') { ?>
                        <tr>
                          <th colspan="<?php echo $colspan ?>" style="text-align:right">Laba Bersih</th>
                          <td class="text-right"><?php echo 'Rp '.number_format($order->laba_bersih,0,',','.'); ?></td>
                        </tr>
                        <?php } ?> -->
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
  var no = 1;
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
            var myWindow = window.open("<?php echo base_url() ?>penjualan_retail/cetak_nota_penjualan/<?php echo $order->no_faktur ?>", "MsgWindow"+no, "width=300,height=400");
            no++;
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