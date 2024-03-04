
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan</li>
              <li class="active">Stok Produk</li>
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
                Laporan Stok Produk
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                    <div class="row" style="margin-bottom: 10px;">
                      <div class="col-md-4">
                        <a href="<?php echo base_url() ?>admin/laporan_retail/cetak_stok_produk" target="_blank" class="btn btn-primary">Cetak</a>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="mytable">
                        <thead>
                          <tr>
                            <th width="2" class="center">No</th>
                            <th>IMEI</th>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Harga Jual</th>
                            <th>Harga Grosir</th>
                            <th>Harga Member</th>
                            <!-- <th>Harga 4</th>
                            <th>Harga 5</th>
                            <th>Harga 6</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          $total_stok = 0;
                          foreach ($contents as $key):
                          ?>
                          <tr>
                            <td class="center"><?php echo $no ?></td>
                            <td><?php echo $key->barcode ?></td>
                            <td><?php echo $key->nama_produk ?></td>
                            <td class="center">
                              <?php

$this->db->select('pr.*,pr.id_produk_2 as id2, sat.satuan AS satuan_produk, '.$this->Mutasi_stok_model->select_stok_mutasi());
$this->db->from('produk_retail pr');
$this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
$this->db->join('pembelian p', 'pr.id_produk_2=p.id_produk AND p.id_users=u.id_users AND pr.id_toko=p.id_toko', 'left');
$this->db->join('satuan_produk sat', 'pr.satuan=sat.id_satuan AND sat.id_users=u.id_users AND sat.id_toko=pr.id_toko', 'left');
$this->Mutasi_stok_model->query_stok_mutasi($this->db, $this->userdata->id_toko, null, 'pr.id_produk_2');
$this->db->where('pr.id_toko', $this->userdata->id_toko);
// $this->db->where('u.id_cabang', $this->userdata->id_cabang);
$this->db->where('pr.parent_id',$key->id2);
$this->db->order_by('pr.id_produk_2','DESC');

// $this->db->group_by('pr.parent_id');

$varian = $this->db->get()->row();

                                            if($varian!=null){
                                              echo $varian->stok+$key->stok;

                                            }else{
                                              echo $key->stok ;
                                            }
                                ?>
                            </td>
                            <td><?php echo $key->satuan_produk ?></td>
                            <td>Rp <span style="float:right;"><?php echo number_format($key->harga_1,0,',','.') ?></span></td>
                            <td>Rp <span style="float:right;"><?php echo number_format($key->harga_2,0,',','.') ?></span></td>
                            <td>Rp <span style="float:right;"><?php echo number_format($key->harga_3,0,',','.') ?></span></td>
                            <!-- <td>Rp <span style="float:right;"><?php // echo number_format($key->harga_4,0,',','.') ?></span></td>
                            <td>Rp <span style="float:right;"><?php // echo number_format($key->harga_5,0,',','.') ?></span></td>
                            <td>Rp <span style="float:right;"><?php // echo number_format($key->harga_6,0,',','.') ?></span></td> -->
                          </tr>
                          <?php
                          $total_stok += $key->stok;
                          $no++;
                          endforeach;
                          ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3" class="text-right">JUMLAH</td>
                            <td><center><?php echo number_format($total_stok,0,',','.') ?></center></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <!-- <td></td>
                            <td></td>
                            <td></td> -->
                          </tr>
                        </tfoot>
                      </table>
                      <script>
                      $(document).ready(function(){
                        var t = $("#mytable").dataTable({
                          processing: true,
                        });
                      });
                      </script>
                    </div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->