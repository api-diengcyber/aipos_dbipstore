
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Pengolahan Baru</li>
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
                Pengolahan Baru
              </h1>
            </div><!-- /.page-header -->

            <style>
            .editable {
              background-color: yellow!important;
              color: #000!important;
            }
            .box {
              padding: 15px 10px 15px 10px;
              border: 1px solid #000;
              margin-bottom: 5px;
            }
            .box h4 {
              margin: 0px 2px 2px 2px;
            }
            .sub-title {
              font-weight: bold;
              font-size: 17px;
            }
            </style>

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <form action="<?php echo base_url() ?>produksi/produksi/create_action" method="post">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="row">
                          <div class="col-md-3">
                            <h4>1. DATA UMUM</h4>
                            <div class="sub-title">GK-FSOP-17</div>
                            <div class="form-group" style="margin-top:8px;">
                              <label>Tanggal produksi</label>
                              <div><?php echo $tgl ?></div>
                            </div>
                          </div>
                          <div class="col-md-9">
                            <div class="form-group">
                              <label>Karyawan <?php echo form_error('karyawan') ?></label>
                              <div>
                              <?php foreach ($data_karyawan as $key): ?>
                                <b><?php echo $key->nama_users ?></b>, &nbsp;
                              <?php endforeach ?>
                              </div>
                            </div>
                            <p>Karyawan Masuk : <?php echo $karyawan_masuk ?>, Tidak Masuk : <?php echo $karyawan_tidak_masuk ?></p>
                          </div>
                        </div>
                      </div>
                      <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>2. BAHAN BAKU</h4>
                            <table id="mytable" class="table table-bordered" style="margin-top: 10px;">
                              <thead>
                                <tr>
                                  <th width="10">No</th>
                                  <th width="450">Nama Produk</th>
                                  <th width="100">Sisa kemarin</th>
                                  <th width="100">Ambil baru</th>
                                  <th width="100">Sisa</th>
                                  <th width="100">Rusak</th>
                                  <th width="100">Terpakai</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php 
                              $no = 1;
                              foreach ($data_barang as $key):
                              ?>
                                <tr>
                                  <td><?php echo $no ?></td>
                                  <td><?php echo $key->nama_produk ?></td>
                                  <td><?php echo $key->sisa_kemarin ?></td>
                                  <td><?php echo $key->ambil_baru ?></td>
                                  <td><?php echo $key->sisa ?></td>
                                  <td><?php echo $key->rusak ?></td>
                                  <td><?php echo $key->terpakai ?></td>
                                </tr>
                              <?php
                                $no++;
                              endforeach;
                              ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>3. PENGUPASAN</h4>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Mulai</label>
                                  <div><?php echo $pengupasan_mulai ?></div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Selesai</label>
                                  <div><?php echo $pengupasan_selesai ?></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>4. PENGEPRESAN</h4>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Mulai</label>
                                  <div><?php echo $pengepresan_mulai ?></div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Selesai</label>
                                  <div><?php echo $pengepresan_selesai ?></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4 style="margin-bottom:8px;">CATATAN LAIN-LAIN</h4>
                            <div><?php echo $catatan ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px;">
                    <div class="col-md-12 text-center">
                      <a href="<?php echo base_url() ?>produksi/produksi" class="btn btn-default">Kembali</a>
                    </div>
                  </div>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->