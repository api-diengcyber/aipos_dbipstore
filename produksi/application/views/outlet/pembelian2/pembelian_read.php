
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Manajemen Data</li>
              <li class="active">Pembelian</li>
              <li class="active">Lihat Transaksi</li>
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
                Pembelian Barang
              </h1>
              <div style="margin-top:10px;padding-left:10px;">
                <table>
                  <tr>
                    <td width="70">No Faktur</td>
                    <td width="5">:</td>
                    <td><?php echo $no_faktur ?></td>
                  </tr>
                  <tr>
                    <td width="70">Tgl Masuk</td>
                    <td width="5">:</td>
                    <td><?php echo $data->tgl ?></td>
                  </tr>
                  <tr>
                    <td width="70">Supplier</td>
                    <td width="5">:</td>
                    <td><?php echo $data->nama_supplier ?></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <table class="table table-bordered table-striped" id="mytable">
                  <thead>
                    <tr>
                      <th width="60">No</th>
                      <th>Produk</th>
                      <th width="170">Tgl Expire</th>
                      <th width="150" class="text-center">Harga Satuan</th>
                      <th width="150" class="text-center">Jumlah</th>
                      <th width="150" class="text-center">Total Bayar</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th colspan="5" class="text-right">Total</th>
                      <th class="text-right total"><?php echo number_format($data->total,0,',','.') ?></th>
                    </tr>
                    <tr>
                      <th colspan="5" class="text-right">PPN</th>
                      <th class="text-right ppn-nominal"><?php echo number_format($data->ppn_nominal,0,',','.') ?></th>
                    </tr>
                    <tr>
                      <th colspan="5" class="text-right">Total + PPN</th>
                      <th class="text-right total-ppn"><?php echo number_format($data->total_ppn,0,',','.') ?></th>
                    </tr>
                  </tfoot>
                </table>
                <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                <script type="text/javascript">
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
                        var total = 0, ppn_nominal = 0, total_ppn = 0;
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
                            ajax: {"url": "<?php echo base_url() ?>outlet/pembelian/json/<?php echo $id_faktur ?>", "type": "POST"},
                            columns: [
                                {
                                    "data": "id",
                                    "orderable": false
                                },{"data": "nama_produk"},{"data": "tgl_expire"},{"data": "harga_satuan"},{"data": "jumlah"},{"data": "total_bayar"}
                            ],
                            order: [[0, 'desc']],
                            rowCallback: function(row, data, iDisplayIndex) {
                                var info = this.fnPagingInfo();
                                var page = info.iPage;
                                var length = info.iLength;
                                var index = page * length + (iDisplayIndex + 1);
                                $('td:eq(0)', row).html(index);
                                $('td:eq(3), td:eq(4), td:eq(5)', row).addClass('text-right');
                                $('td:eq(3)', row).html(tandaPemisahTitik(data.harga_satuan*1));
                                $('td:eq(5)', row).html(tandaPemisahTitik(data.total_bayar*1));
                                total += data.total_bayar*1;
                                ppn_nominal += (10/100)*(data.total_bayar*1);
                                total_ppn = total+ppn_nominal;
                                if (<?php echo $data->total*1 ?> == 0) {
                                  $(".total").html(numberWithCommas(total.toString()));
                                }
                                if (<?php echo $data->ppn_nominal*1 ?> == 0) {
                                  $(".ppn-nominal").html(numberWithCommas(ppn_nominal.toString()));
                                }
                                if (<?php echo $data->total_ppn*1 ?> == 0) {
                                  $(".total-ppn").html(numberWithCommas(total_ppn.toString()));
                                }
                            }
                        });
                    });
                </script>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->