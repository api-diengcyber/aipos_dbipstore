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
                            <h2 style="margin-top:0px">Laporan Advertising</h2>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 4px"  id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-4 text-right">
                            <?php echo anchor(site_url('advertiser/laporan_adv/create'), 'Create', 'class="btn btn-primary"'); ?>
                            <!-- <?php echo anchor(site_url('advertiser/laporan_adv/excel'), 'Excel', 'class="btn btn-primary"'); ?> -->
                        </div>
                    </div>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th rowspan="2">NO</th>
                                <th rowspan="2">TANGGAL</th>
                                <th rowspan="2">Group</th>
                                <th rowspan="2">Leads</th>
                                <th rowspan="2">Konversi</th>
                                <th rowspan="2">%Leads</th>
                                <th rowspan="2">Per WA</th>
                                <th rowspan="2">ANGGARAN</th>
                                <th rowspan="2">DASHBOARD</th>
                                <th colspan="4" style="text-align:center">DATA</th>
                                <th rowspan="2">ACTION</th>
                            </tr>
                            <tr>
                                <th>klik</th>
                                <th>view</th>
                                <th>% View</th>
                                <th>% Konversi</th>
                            </tr>
                        </thead>

                    </table>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

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
            ajax: {"url": "laporan_adv/json", "type": "POST"},
            columns: [
                {
                    "data": "id",
                    "orderable": false
                },
                {"data": "tanggal"},
                {"data": "group"},
                {"data": "leads"},
                {"data": "konversi"},
                {"data": "leads",render:function(data,type,row){
                    return (data / row['konversi'] * 100).toFixed(2)+' %';
                }},
                {"data": "anggaran",render:function(data,type,row){
                    return (data / row['leads']).toFixed(2);
                }},
                {"data": "anggaran"},
                {"data": "anggaran",render:function(data,type,row){
                    return (data / row['konversi']).toFixed(2);
                }},
                {"data": "klik"},
                {"data": "view"},
                {"data": "view",render:function(data,type,row){
                    return (data / row['klik']).toFixed(2)+' %';
                }},
                {"data": "view",render:function(data,type,row){
                    return (data / row['konversi']).toFixed(2)+' %';
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

