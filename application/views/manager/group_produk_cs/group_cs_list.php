<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
            </li>
            <li class=""><?php echo $this->uri->segment(1);?></li>
            <li class="active"><?php echo $this->uri->segment(2);?></li>
        </ul><!-- /.breadcrumb -->

        
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <h2 style="margin-top:0px">Group CS</h2>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 4px"  id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-4 text-right">
                            <?php echo anchor(site_url('admin/group_produk_cs/create'), 'Create', 'class="btn btn-primary"'); ?>
                    <?php echo anchor(site_url('admin/group_produk_cs/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                    </div>
                    </div>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Nama Produk</th>
                                <th>Group</th>
                                <th>Daftar CS</th>
                                <th width="200px">Action</th>
                            </tr>
                        </thead>

                    </table>
                    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var data_cs = <?php echo json_encode($data_cs);?>;
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
                                ajax: {"url": "group_produk_cs/json", "type": "POST"},
                                columns: [
                                    {
                                        "data": "id",
                                        "orderable": false
                                    },
                                    {"data": "nama_produk"},
                                    {"data": "group"},
                                    {"data": "id",
                                    render:function(data){
                                        let html = "";
                                        for(item in data_cs){
                                            if(item == data){
                                                console.log(data_cs[item])
                                                for(cs in data_cs[item]){
                                                    html += data_cs[item][cs].first_name+"<br>";
                                                }
                                            }
                                        }
                                        return html;
                                    }},
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
                                }
                            });
                        });
                    </script>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
    </div><!-- /.main-content -->