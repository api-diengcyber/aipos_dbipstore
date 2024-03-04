
<div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Beban</li>
              <li class="active">
                <?php if($type=='non_karyawan'){
                  echo "Beban Non Karyawan";
                }else{
                  echo "
                  Beban Karyawan
                  
                  ";
                }?> </li>
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
                <?php if($type=='non_karyawan'){
                  echo "Beban Non Karyawan";
                }else{
                  echo "
                  Beban Karyawan
                  
                  ";
                }?>
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-md-12">
                <!-- PAGE CONTENT BEGINS -->
                
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">

                    <?php 
                      if($type=='non_karyawan'){
                    ?>
                        <?php echo anchor(site_url('admin/pegawai_beban/create_non'), 'Tambah', 'class="btn btn-primary"'); ?>
                    <?php 
                      }else{
                    ?>
                      <?php echo anchor(site_url('admin/pegawai_beban/create'), 'Tambah', 'class="btn btn-primary"'); ?>
                    <?php 
                      } 
                      ?>

                       
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                    </div>
                </div>

                <div class="table-responsive">
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                           
                            <?php if($type=='non_karyawan'){?>
                             
                              <?php                  
                            }else{?>
                           <th>Email</th>
                            <?php 
                 
                             }?>
                            <?php if($type=='non_karyawan'){?>
                              <th>Nama</th>
                              <?php                  
                            }else{?>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Alamat</th>
                            <th>Phone</th>
                            <th>Level</th>
           
                           
                            <th>Status</th>
                            <?php 
                 
                             }?>
                            <th>Hari Aktif</th>
                            <th>Nominal</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                </table>
                </div>
                <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                <?php if($type=='non_karyawan'){?>
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
                                      ajax: {"url": "<?php echo base_url() ?>admin/pegawai_beban/json_non/admin/", "type": "POST"},
                                      columns: [
                                          {
                                              "data": "id_users",
                                              "orderable": false
                                          },
                                          // {"data": "email"},
                                          {"data": "nama"},
                                          // {"data": "last_name"},
                                          // {"data": "alamat"},
                                          // {"data": "phone"},{"data": "t_level", "searchable": false },{"data": "t_active", "searchable": false },
                                          {"data": "beban_per"},
                                          {"data": "nominal"},
                                          {
                                              "data" : "action",
                                              "orderable": false,
                                              "className" : "text-center"
                                          }
                                      ],
                                      order: [[0, 'desc']],
                                      rowCallback: function(row, data, iDisplayIndex) {
                                          var active = data.active;
                                          if(active == 0){
                                            $('td:eq(0)', row).css({'background-color':'yellow'});
                                            $('td:eq(1)', row).css({'background-color':'yellow'});
                                            $('td:eq(2)', row).css({'background-color':'yellow'});
                                            $('td:eq(3)', row).css({'background-color':'yellow'});
                                            $('td:eq(4)', row).css({'background-color':'yellow'});
                                            $('td:eq(5)', row).css({'background-color':'yellow'});
                                          }
                                          $('td:eq(3)', row).html(tandaPemisahTitik(data.nominal*1));
                                          var info = this.fnPagingInfo();
                                          var page = info.iPage;
                                          var length = info.iLength;
                                          var index = page * length + (iDisplayIndex + 1);
                                          $('td:eq(0)', row).html(index);
                                      }
                                  });
                              });
                          </script>
                              <?php                  
                            }else{ ?>
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
                                      ajax: {"url": "<?php echo base_url() ?>admin/pegawai_beban/json/admin/", "type": "POST"},
                                      columns: [
                                          {
                                              "data": "id_users",
                                              "orderable": false
                                          },
                                          {"data": "email"},
                                          {"data": "first_name"},
                                          {"data": "last_name"},
                                          {"data": "alamat"},
                                          {"data": "phone"},{"data": "t_level", "searchable": false },{"data": "t_active", "searchable": false },
                                          {"data": "beban_per"},
                                          {"data": "nominal"},
                                          {
                                              "data" : "action",
                                              "orderable": false,
                                              "className" : "text-center"
                                          }
                                      ],
                                      order: [[0, 'desc']],
                                      rowCallback: function(row, data, iDisplayIndex) {
                                          var active = data.active;
                                          if(active == 0){
                                            $('td:eq(0)', row).css({'background-color':'yellow'});
                                            $('td:eq(1)', row).css({'background-color':'yellow'});
                                            $('td:eq(2)', row).css({'background-color':'yellow'});
                                            $('td:eq(3)', row).css({'background-color':'yellow'});
                                            $('td:eq(4)', row).css({'background-color':'yellow'});
                                            $('td:eq(5)', row).css({'background-color':'yellow'});
                                            $('td:eq(6)', row).css({'background-color':'yellow'});
                                            $('td:eq(7)', row).css({'background-color':'yellow'});
                                            $('#btnActive', row).attr("class","btn btn-primary btn-xs");
                                            $('#iconActive', row).attr("class","ace-icon glyphicon glyphicon-check bigger-120");
                                          }
                                          $('td:eq(9)', row).html(tandaPemisahTitik(data.nominal*1));
                                          var info = this.fnPagingInfo();
                                          var page = info.iPage;
                                          var length = info.iLength;
                                          var index = page * length + (iDisplayIndex + 1);
                                          $('td:eq(0)', row).html(index);
                                      }
                                  });
                              });
                          </script>
                 
                           <?php  }?>

               

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->