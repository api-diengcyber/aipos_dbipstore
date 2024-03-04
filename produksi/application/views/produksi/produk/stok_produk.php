
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Manajemen Produk</li>
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
                Stok Produk
              </h1>
            </div><!-- /.page-header -->


            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form action="" method="post">

                <div class="row">
                  <div class="col-xs-12">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="2px">No</th>
                                <th>Barcode</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Harga Satuan Beli</th>
                                <th>Stok</th>
                                <th>Tambah Stok</th>
                                <th>Satuan</th>
                                <th>Mingros</th>
                                <th></th>
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
                                ajax: {"url": "<?php echo base_url() ?>produksi/produk_retail/json_basic", "type": "POST"},
                                columns: [
                                    {
                                        "data": "id_produk_2",
                                        "orderable": false
                                    },{"data": "barcode"},{"data": "nama_kategori"},{"data": "nama_produk"},{"data": "input_harga_beli"},{"data": "<?php if ($id_modul=='1' || $id_modul=='2') { echo 'input_stok'; } else { echo 'stok'; } ?>"},{"data": "tambah_stok"},{"data": "satuan"},{"data": "mingros"},{"data": "btn_update"},
                                ],
                                order: [[0, 'desc']],
                                rowCallback: function(row, data, iDisplayIndex) {
                                    var info = this.fnPagingInfo();
                                    var page = info.iPage;
                                    var length = info.iLength;
                                    var index = page * length + (iDisplayIndex + 1);
                                    $('td:eq(0)', row).html(index+""+data.hidden_id);
                                }

                            });

                            $('#mytable').on('draw.dt', function(){
                                activity();
                            });

                            var activity = function(){
                              $('input[id*=tambah_stok]').ace_spinner({value:0,min:-100,max:1000,step:1, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
                              $('input[id*=harga_beli]').click(function(){
                                $('input[id*=harga_beli]').attr("readonly", "readonly");
                                var n = $(this);
                                n.removeAttr("readonly");
                              });

                              $('input[id*=harga_beli]').keyup(function(){
                                var n = $(this).val().replace(/\./g,'');
                                $(this).val(tandaPemisahTitik(n));
                              });

                              $('button[id*=btn_update]').removeAttr("disabled");
                              $('button[id*=btn_update]').click(function(){
                                var n = $(this);
                                var id_produk = n.attr("data-id");
                                var tambah_stok = $('input[id=tambah_stok][data-id='+id_produk+']').val();
                                var harga_beli = $('input[id=harga_beli][data-id='+id_produk+']').val().replace(/\./g,'');
                                $.ajax({
                                  url: '<?php echo $action ?>',
                                  type: 'post',
                                  data: 'id_produk='+id_produk+'&tambah_stok='+tambah_stok+'&harga_beli='+harga_beli,
                                  success: function(response){
                                    var parsed_data = JSON.parse(response);
                                    var stok_baru = parsed_data.stok;
                                    $('input[id=tambah_stok][data-id='+id_produk+']').val(0);
                                    $('input[id=tambah_stok][data-id='+id_produk+']').ace_spinner({value:0});
                                    $('input[id=stok][data-id='+id_produk+']').val(stok_baru);
                                    $('input[id=harga_beli][data-id='+id_produk+']').attr("readonly","readonly");
                                  }
                                });
                              });

                              $("input[id*=switch_us]").click(function(){
                                var us = $(this).val();
                                alert(us);
                              });

                            }
                            //setTimeout(function(){activity()}, 1000);
                        });
                    </script>
                    </form>

                    </div>
                  </div>
                </div>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->
