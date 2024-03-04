
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Managemen Data</li>
              <li class="active">Penjualan</li>
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
                Penjualan Sales
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php echo !empty($this->session->userdata('message')) ? $this->session->userdata('message')."<br><br>" : "" ?>
                <a href="<?php echo base_url('home/client_get_sales_order') ?>" class="btn btn-success" style="margin-bottom: 10px;">Unduh Order Sales</a>
                <form action="<?php echo base_url() ?>produksi/penjualan_retail/orders_sales_action" method="post">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th width="5">No</th>
                        <th width="5" style="padding:7px 7px 0px 0px;"><center><div style="margin:0px;" class="checkbox"><label><input name="chk" id="chk" type="checkbox" class="ace" value="1" /><span class="lbl"></span></label></div></center></th>
                        <th width="100">Tgl</th>
                        <th>Sales</th>
                        <th>Toko</th>
                        <th>Nama Barang</th>
                        <th width="5">Jumlah</th>
                        <th width="5"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1; 
                      foreach ($data_orders_sales as $key):
                        $ket_selesai = "<span class='badge badge-danger'>Belum ada faktur</span>";
                        if ($key->selesai==1) {
                          $ket_selesai = "<span class='badge badge-primary'>Sudah ada faktur</span>";
                        } else if ($key->selesai==2) {
                          $ket_selesai = "<span class='badge badge-warning'>Transaksi dibatalkan</span>";
                        }
                        if ($key->acc_admin==0) {
                          $ket_selesai = "<span class='badge badge-inverse'>Belum diproses</span>";
                        }
                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <?php if ($key->acc_admin!=1 && $key->selesai!=1 || $key->selesai==2) { ?>
                          <td style="padding:7px 7px 0px 0px;">
                          <div style="margin:0px;" class="checkbox"><label><input name="orders_sales[]" type="checkbox" class="ace" id="list" value="<?php echo $key->id_orders_temp ?>" /><span class="lbl"></span></label></div>
                          </td>
                        <?php } else { ?>
                          <td><i class="fa fa-check-circle"></i></td>
                        <?php } ?>
                        <td><?php echo $key->tgl ?></td>
                        <td><?php echo $key->first_name." ".$key->last_name ?></td>
                        <td><?php echo $key->nama ?></td>
                        <td><?php echo $key->nama_produk ?></td>
                        <td class="text-center"><?php echo $key->jumlah ?></td>
                        <td><?php echo $ket_selesai ?></td>
                      </tr>
                      <?php $no++; endforeach ?>
                    </tbody>
                  </table>
                  <button type="submit" class="btn btn-primary">PROSES</button>
                  <button onclick="return confirm('Are you sure ? ')" type="submit" value="1" name="hapus" class="btn btn-danger">HAPUS</button>
                  <a href="<?php echo base_url() ?>produksi/penjualan_retail/orders_sales_group" class="btn btn-default">Kembali</a>
                </form>
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