
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Penjualan</li>
              <li class="active">Retur Penjualan</li>
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
                Retur Penjualan
              </h1>
            </div><!-- /.page-header -->


            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <a href="<?php echo base_url() ?>admin/retur_jual/create" class="btn btn-primary">Tambah Retur</a>
                        <a href="<?php echo base_url() ?>admin/retur_jual/create_manual" class="btn btn-warning">Tambah Retur Manual</a>
                        <?php //echo anchor(site_url('retur_jual/create'), 'Buat Retur', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top:4px" id="message">
                           <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th width="2" class="center">No</th>
                            <th>Tgl</th>
                            <th>No Retur</th>
                            <th>Faktur Penjualan</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
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

                        var t = $("#mytable").dataTable({
                            initComplete: function() {
                                var api = this.api();
                                $('#mytable_filter input')
                                        .off('.DT')
                                        .on('keyup.DT', function(e) {
                                                api.search(this.value).draw();
                                });
                            },
                            oLanguage: {
                                sProcessing: "loading..."
                            },
                            processing: true,
                            serverSide: true,
                            ajax: {"url": "<?php echo base_url() ?>admin/retur_jual2/json", "type": "POST"},
                            columns: [
                                {
                                    "data": "id_retur",
                                    "orderable": false
                                },{"data": "tgl"},{"data": "no_retur"},{"data": "no_faktur"},{"data": "total"},
                                {
                                    "data" : "action",
                                    "orderable": false,
                                    "className" : "text-center"
                                }
                            ],
                            order: [[0, 'desc']],
                            rowCallback: function(row, data, iDisplayIndex) {
                                var info = this.fnPagingInfo();
                                var page = info.iPage;
                                var length = info.iLength;
                                var index = page * length + (iDisplayIndex + 1);
                                $('td:eq(0)', row).html(index);
                                var ket_faktur = '<b style="color:blue;">'+data.no_faktur+'</b>';
                                if (data.no_faktur==null) {
                                  ket_faktur = '<b style="color:red;"><i>Tidak ada / Manual</i></b>';
                                }
                                $('td:eq(3)', row).html(ket_faktur);
                                $('td:eq(4)', row).html('Rp. '+number_format(data.total*1,0,',','.'));
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