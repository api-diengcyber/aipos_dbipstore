
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
            <!-- <div id="google_translate_element"></div>
            <script>
              function googleTranslateElementInit() {
                new google.translate.TranslateElement({pagelanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE }, 'google_translate_element');
              }
            </script>
             <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>  -->
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
              <div class="row">
                <div class="col-md-4">
                  <h1>
                    Dashboard
                  </h1> 
                </div>
                <div class="col-md-4">
                  <?php if($is_pusat){ ?>
                  <form action="" method="post">
                    <select name="cabang" id="cabang" class="form-control" onchange="this.form.submit()">
                       <option value="<?php echo $id_toko_pusat ?>">-- Pusat --</option>
                       <?php foreach ($data_cabang as $dc): ?>
                          <option value="<?php echo $dc->id_cabang ?>" <?php if($this->session->userdata('id_toko') == $dc->id_cabang){ echo 'selected'; } ?>><?php echo $dc->nama_toko ?></option>
                       <?php endforeach ?>
                    </select>
                  </form>
                  <?php } ?>
                </div>
              </div>
            </div><!-- /.page-header -->

            <div class="widget-box widget-color-dark" id="recent-box" >
              <div class="widget-header">
                <h4 class="widget-title bigger lighter smaller">
                  <i class="ace-icon fa fa-signal"></i>Laporan Advertising
                </h4>
                <div class="widget-toolbar no-border">
                  <ul class="nav nav-tabs" id="recent-tab">
                    <li class="active">
                      <a href="<?php echo base_url('advertiser/laporan_adv/per_group');?>" onclick="return confirm('Export excel bulan ini?')">EXPORT PER GROUP</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="widget-body">
                <div class="widget-main padding-4">
                    <table class="table table-bordered table-striped" id="mytable">
                      <thead>
                          <tr>
                              <th rowspan="2">NO</th>
                              <th rowspan="2">TANGGAL</th>
                              <th rowspan="2">GROUP</th>
                              <th rowspan="2">Leads</th>
                              <th rowspan="2">Konversi</th>
                              <th rowspan="2">%Leads</th>
                              <th rowspan="2">Per WA</th>
                              <th rowspan="2">ANGGARAN</th>
                              <th rowspan="2">DASHBOARD</th>
                              <th colspan="4" style="text-align:center">DATA</th>
                          </tr>
                          <tr>
                              <th>klik</th>
                              <th>view</th>
                              <th>% View</th>
                              <th>% Konversi</th>
                          </tr>
                      </thead>
                    </table>
                </div><!-- /.widget-main -->
              </div><!-- /.widget-body -->
            </div><!-- /.widget-box -->
          </div>
        </div>
      </div><!-- /.main-content -->
    <style>
      .data-label-1{
        font-size: 10px;
        padding: 2px;
        background: rgba(90, 200, 90, .4);
        color:black;
      }
      .data-label-1:hover{
        font-size: 13px;
        background-color: #44EE44;
        z-index: 1000;
      }
      .data-label-2{
        font-size: 10px;
        padding: 2px;
        background: rgba(230, 30, 30, .4);
      }
      .data-label-2:hover{
        font-size: 13px;
        background-color: #EE5555;
        color: white;
        z-index: 1000;
      }
    </style>

    <!--[if lte IE 8]>
      <script src="<?php echo base_url()?>assets/js/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url()?>assets/js/chart.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.easypiechart.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.sparkline.index.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.flot.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.flot.resize.min.js"></script>
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
            ajax: {"url": "<?php echo base_url('advertiser/');?>laporan_adv/json", "type": "POST"},
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
                }}
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
