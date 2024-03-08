
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Data Stok</li>
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
                Data Stok Produk
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                    <!-- <div class="row" style="margin-bottom: 10px;">
                      <div class="col-md-4">
                        <a href="<?php echo base_url() ?>laporan_retail/cetak_stok_produk" target="_blank" class="btn btn-primary">Cetak</a>
                      </div>
                    </div> -->

                    <form method="post" id="formPeriode" class="form-horizontal" action="">
                      <div class="form-group">
                        <div class="col-sm-6">
                          <?php // echo $id_users ?>
                        </div>
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-3">
                          <?php if ($level == '1') { ?>
                          <div class="form-group">
                            <label class="control-label no-padding-right col-md-3">Kasir : </label>
                            <div class="col-md-9">
                              <select class="form-control input-lg" name="id_users" id="id_users" onchange="this.form.submit()">
                                <option value="">-- Semua --</option>
                              <?php foreach ($data_user as $val) : ?>
                                <option value="<?php echo $val->id_users ?>" <?php echo $val->id_users==$id_users?"selected":"" ?>><?php echo $val->first_name." ".$val->last_name ?></option>
                              <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </form>

                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="mytable">
                        <thead>
                          <tr>
                            <th width="2" class="center">No</th>
                            <th>Barcode</th>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Sub Satuan</th>
                            <th>Harga 1</th>
                            <th>Harga 2</th>
                            <th>Harga 3</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <td colspan="3" class="text-right">JUMLAH</td>
                            <td><center><?php echo number_format(0,0,',','.') ?></center></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tfoot>
                      </table>
                      <script>
                        $(document).ready(function() {
                            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                            {
                                return {
                                    "iStart": oSettings._iDisplayStart,
                                    "iEnd": oSettings.fnDisplayEnd(),
                                    "iLength": oSettings._iDisplayLength,
                                    "iTotal": oSettings.fnRecordsTotal(),
                                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                                };
                            };

                            var t = $("#mytable").dataTable({
                                initComplete: function() {
                                    var api = this.api();
                                    $('#mytable_filter input')
                                            .off('.DT')
                                            .on('keyup.DT', function(e) {
                                                if (e.keyCode == 13) {
                                                    api.search(this.value).draw();
                                        }
                                    });
                                },
                                oLanguage: {
                                    sProcessing: "loading..."
                                },
                                processing: true,
                                serverSide: true,
                                ajax: {"url": "<?php echo base_url() ?>mutasi_stok/json2/<?php echo $id_users ?>", "type": "POST"},
                                columns: [
                                    {
                                        "data": "id_produk_2",
                                        "orderable": false
                                    },{"data": "barcode"},{"data": "nama_produk"},{"data": "stok", searchable: false},{"data": "satuan_produk", searchable: false},{"data": "satuan_produk", searchable: false},{"data": "harga_1"},{"data": "harga_2"},{"data": "harga_3"}
                                ],
                                order: [[0, 'asc']],
                                rowCallback: function(row, data, iDisplayIndex) {
                                    var info = this.fnPagingInfo();
                                  var page = info.iPage;
                                  var length = info.iLength;
                                  var index = page * length + (iDisplayIndex + 1);
                                  $('td:eq(0)', row).html(index);
                                  $('td:eq(6)', row).html(numberWithCommas(data.harga_1)).addClass('text-right');
                                  $('td:eq(7)', row).html(numberWithCommas(data.harga_2)).addClass('text-right');
                                  $('td:eq(8)', row).html(numberWithCommas(data.harga_3)).addClass('text-right');
                                }
                            });
                        });
                      </script>
                    </div>

                            <!-- $res_sub_satuan = $this->db->select('*')
                                                       ->from('satuan_sub_produk')
                                                       ->where('id_toko', $key->id_toko)
                                                       ->where('id_satuan_child', $key->satuan)
                                                       ->get()->result();
                            $str_sub_sat = '';
                            foreach ($res_sub_satuan as $key_sub) {
                              $sub_satuan = $key_sub->id_satuan_parent;
                              $nilai_sub = $key_sub->nilai;
                              if ($nilai_sub > 0) {
                                $stok_sub = $key->stok/$nilai_sub;
                              } else {
                                $stok_sub = 0;
                              }
                              $sub_sat = '('.number_format($stok_sub,2,',','.').') '.$sub_satuan;
                              $str_sub_sat .= $sub_sat."<br>";
                            }
                          <tr>
                            <td class="center"><?php echo $no ?></td>
                            <td><?php echo $key->barcode ?></td>
                            <td><?php echo $key->nama_produk ?></td>
                            <td class="center"><?php echo $key->stok ?></td>
                            <td><?php echo $key->satuan_produk ?></td>
                            <td><?php echo $str_sub_sat ?></td>
                            <td>Rp <span style="float:right;"><?php echo number_format($key->harga_1,0,',','.') ?></span></td>
                            <td>Rp <span style="float:right;"><?php echo number_format($key->harga_2,0,',','.') ?></span></td>
                            <td>Rp <span style="float:right;"><?php echo number_format($key->harga_3,0,',','.') ?></span></td>
                          </tr> -->
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->