
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Dashboard</li>
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
                Validasi Order Ganda
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row" style="margin-bottom: 10px">
                  <div class="col-md-12">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                  </div>
                </div>

                <div class="tabbable">
                  <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                      <a data-toggle="tab" href="#namapembeli">
                        Nama Pembeli
                      </a>
                    </li>
                    <li>
                      <a data-toggle="tab" href="#jurnal">
                        Jurnal
                      </a>
                    </li>
                    <li>
                      <a data-toggle="tab" href="#invoice">
                        Invoice
                      </a>
                    </li>
                  </ul>

                  <div class="tab-content">
                    <div id="namapembeli" class="tab-pane fade in active">
                      <table class="table table-bordered table-striped" id="table_namapembeli">
                        <thead>
                          <tr>
                            <th width="80px">No</th>
                            <th>Tanggal</th>
                            <th>No Faktur</th>
                            <th>Nama CS</th>
                            <th>Pembeli</th>
                            <th>Produk</th>
                            <th>Bayar</th>
                            <th width="200px">Action</th>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div id="jurnal" class="tab-pane fade">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th width="80px" rowspan="2">No</th>
                            <th rowspan="2">Tanggal</th>
                            <th rowspan="2">Kode</th>
                            <th rowspan="2">Akun</th>
                            <th rowspan="2">Keterangan</th>
                            <th colspan="2">Nominal</th>
                          </tr>
                          <tr>
                            <th>Debet</th>
                            <th>Kredit</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 0;
                        $akhir_kode = "";
                        foreach ($data_jurnal as $key) : 
                          $tampil = true;
                          if ($key->kode != $akhir_kode) {
                            $no++;
                          } else {
                            $tampil = false;
                          }
                        ?>
                          <tr>
                            <td><?php echo $tampil?$no:"" ?></td>
                            <td><?php echo $tampil?$key->tgl:"" ?>
                            
                            </td>
                            <td><?php echo $key->kode ?>
                            <?php
                            if ($tampil) {
                              echo '<a onclick="return confirm(`Are you sure ? `)" href="'.base_url().'admin/validasi/delete_jurnal/'.$key->kode.'" class="btn-delete">Hapus</a>';
                            }
                            ?>
                            
                            </td>
                            <td><?php echo $key->akun ?></td>
                            <td><?php echo $key->keterangan ?></td>
                            <td><?php echo $key->debet ?></td>
                            <td><?php echo $key->kredit ?></td>
                          </tr>
                        <?php 
                        $akhir_kode = $key->kode;
                        endforeach;
                        ?>
                        </tbody>
                      </table>
                    </div>

                    <div id="invoice" class="tab-pane fade">
                      <table class="table table-bordered table-striped" id="table_invoice" style="width:100%;">
                        <thead>
                          <tr>
                            <th width="80px">No</th>
                            <th>Tanggal</th>
                            <th>No Faktur</th>
                            <th>Nama CS</th>
                            <th>Pembeli</th>
                            <th>Produk</th>
                            <th>Bayar</th>
                            <th width="200px">Action</th>
                          </tr>
                        </thead>
                      </table>
                    </div>

                  </div>
                </div>


                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <form method="post" action="<?php echo base_url() ?>admin/validasi/konfirmasi_delete">
                        <!-- <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modal Header</h4>
                        </div> -->
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id_order" />
                          <button type="submit" class="btn btn-primary">Hapus</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


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

                        var tNamapembeli = $("#table_namapembeli").dataTable({
                          initComplete: function() {
                            var api = this.api();
                            $('#table_namapembeli_filter input').off('.DT').on('keyup.DT', function(e) {
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
                          "paging": false,
                          ajax: {"url": "<?php echo base_url() ?>admin/validasi/json", "type": "POST"},
                          columns: [
                            {
                              "data": "id_orders",
                              "orderable": false
                              },{"data": "tgl_order"},{"data": "no_faktur"},{"data": "nama_cs"},{"data": "bukan_member"},{"data": "list_produk"},{"data": "id_orders", render: function(row,d,data){
                                var h =  "Nominal : "+data.nominal+"<br>Ongkir : "+data.ongkir;
                                if (data.media == "4") {
                                  h += "<br>Biaya COD : "+data.biaya_lain;
                                }
                                return h;
                              }
                            },
                            {
                              "data" : "action",
                              "orderable": false,
                              "className" : "text-center",
                              render: function(row,d,data) {
                                row = row.split('o.id_orders').join(data.id_orders_2);
                                return row;
                              }
                            }
                          ],
                          order: [[0, 'desc']],
                          rowCallback: function(row, data, iDisplayIndex) {
                            var info = this.fnPagingInfo();
                            var page = info.iPage;
                            var length = info.iLength;
                            var index = page * length + (iDisplayIndex + 1);
                            $('td:eq(0)', row).html(index);
                          }
                        });

                        var tInvoice = $("#table_invoice").dataTable({
                          initComplete: function() {
                            var api = this.api();
                            $('#table_invoice_filter input').off('.DT').on('keyup.DT', function(e) {
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
                          "paging": false,
                          ajax: {"url": "<?php echo base_url() ?>admin/validasi/json_invoice", "type": "POST"},
                          columns: [
                            {
                              "data": "id_orders",
                              "orderable": false
                              },{"data": "tgl_order"},{"data": "no_faktur"},{"data": "nama_cs"},{"data": "bukan_member"},{"data": "list_produk"},{"data": "id_orders", render: function(row,d,data){
                                var h =  "Nominal : "+data.nominal+"<br>Ongkir : "+data.ongkir;
                                if (data.media == "4") {
                                  h += "<br>Biaya COD : "+data.biaya_lain;
                                }
                                return h;
                              }
                            },
                            {
                              "data" : "action",
                              "orderable": false,
                              "className" : "text-center",
                              render: function(row,d,data) {
                                row = row.split('o.id_orders').join(data.id_orders_2);
                                return row;
                              }
                            }
                          ],
                          order: [[0, 'desc']],
                          rowCallback: function(row, data, iDisplayIndex) {
                            var info = this.fnPagingInfo();
                            var page = info.iPage;
                            var length = info.iLength;
                            var index = page * length + (iDisplayIndex + 1);
                            $('td:eq(0)', row).html(index);
                          }
                        });

                        function confirmDelete(id_order) {
                          $('input[name="id_order"]').val(id_order);
                          $("#myModal").modal("show");
                        }

                        $("#table_namapembeli").on('draw.dt', function(){
                          $(".btn-confirm-delete").on("click", function(){
                            var id_order = $(this).attr('data-id');
                            confirmDelete(id_order);
                          });
                        })

                        $("#table_invoice").on('draw.dt', function(){
                          $(".btn-confirm-delete").on("click", function(){
                            var id_order = $(this).attr('data-id');
                            confirmDelete(id_order);
                          });
                        })
                    });
                </script>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->