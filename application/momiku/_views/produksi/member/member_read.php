
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Manajemen Data</li>
              <li class="active">Pelanggan</li>
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
                Pelanggan
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <table class="table">
                  <tr><td width="140">Kode</td><td><?php echo $kode; ?></td></tr>
                  <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
                  <tr><td>Salesman</td><td><?php echo $nama_sales; ?></td></tr>
                  <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
                  <tr><td>Telp</td><td><?php echo $telp; ?></td></tr>
                  <tr><td>Tgl Lahir</td><td><?php echo $tgl_lahir; ?></td></tr>
                  <tr><td>Diskon</td><td><?php echo $diskon; ?></td></tr>
                  <tr><td></td><td></td></tr>
                </table>

                <form action="<?php echo base_url() ?>produksi/member_retail/proses_orders" method="post">
                  <input type="hidden" name="id_member" value="<?php echo $id ?>">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th width="5">No</th>
                        <th width="5" style="padding:7px 7px 0px 0px;"><center><div style="margin:0px;" class="checkbox"><label><input name="chk" id="chk" type="checkbox" class="ace" value="1" /><span class="lbl"></span></label></div></center></th>
                        <th width="100">Tanggal</th>
                        <th>Barang</th>
                        <th width="100" class="text-center">Qty</th>
                        <th width="100" class="text-center">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($data_order_sales as $key): 
                        $faktur = "";
                        $ket_selesai = "<span class='badge badge-danger'>Belum ada faktur</span>";
                        if ($key->selesai==1) {
                          $ket_selesai = "<span class='badge badge-primary'>Sudah ada faktur</span>";
                          $row_orders = $this->db->select('o.no_faktur')
                                                 ->from('orders_detail od')
                                                 ->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_toko="'.$key->id_toko.'"')
                                                 ->where('od.id_toko', $key->id_toko)
                                                 ->where('od.id_orders_sales', $key->id_orders_temp)
                                                 ->get()->row();
                          if ($row_orders) {
                            $faktur = "<a href='".base_url()."laporan_retail/detail_faktur/".$row_orders->no_faktur."'>".$row_orders->no_faktur."</a>";
                          } else {
                            $faktur = "[Faktur Terhapus]";
                          }
                        } else if ($key->selesai==2) {
                          $ket_selesai = "<span class='badge badge-warning'>Transaksi dibatalkan</span>";
                        }
                        if ($key->acc_admin==0) {
                          $ket_selesai = "<span class='badge badge-inverse'>Belum diproses</span>";
                        }
                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td style="padding:7px 7px 0px 0px;"><?php if ($key->acc_admin!=1 && $key->selesai!=1 || $key->selesai==2) { ?><div style="margin:0px;" class="checkbox"><label><input name="orders_sales[]" type="checkbox" class="ace" id="list" value="<?php echo $key->id_orders_temp ?>" /><span class="lbl"></span></label></div><?php } ?><?php echo $faktur ?></td>
                        <td><?php echo $key->tgl ?></td>
                        <td><?php echo $key->nama_produk ?></td>
                        <td class="text-center"><?php echo $key->jumlah ?></td>
                        <td><?php echo $ket_selesai ?></td>
                      </tr>
                      <?php $no++; endforeach ?>
                    </tbody>
                  </table>
                  <a href="<?php echo site_url('member_retail') ?>" class="btn btn-default pull-right">Kembali</a>
                  <button onclick="return confirm('Apakah anda yakin akan menghapus riwayat data penjualan sebelumnya?')" type="submit" class="btn btn-primary">Tambah ke Penjualan</button>
                </form>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<script>
$(document).ready(function(){
  function cek_chk() {
    var chk = $("#chk").is(':checked');
    return chk;
  }
  $("#chk").on('change', function(e){
    if (cek_chk()) {
      $("input[id*=list]").prop('checked', true);
    } else {
      $("input[id*=list]").prop('checked', false);
    }
  });
});
</script>