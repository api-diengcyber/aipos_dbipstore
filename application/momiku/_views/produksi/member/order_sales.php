
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Order</li>
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
              <h1><?php echo $nama_member ?></h1>
              <h4 style="margin: 10px 10px 0px 10px"><i class="ace-icon fa fa-home"></i> <?php echo $alamat_member ?></h4>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <form action="" method="post">
                  <div class="form-group">
                    <style>
                    .select2-container {
                      font-size: 18px;
                    }
                    .select2-container--default .select2-selection--single {
                      background-color: #fff;
                      border: 1px solid #aaa;
                      border-radius: 0px;
                    }
                    </style>
                    <label for="" class="label-control">Pilih Produk</label>
                    <select name="id_produk_2" id="select2" class="form-control">
                      <option value="0">-- Pilih Produk --</option>
                      <?php foreach ($data_produk as $key): ?>
                      <option value="<?php echo $key->id_produk_2 ?>"><?php echo $key->nama_produk ?> | <?php echo $key->satuan_produk ?> | (Stok : <?php echo $key->stok*1 ?>)</option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </form>
                <div class="table-responsive" style="height:300px;overflow-y:scroll;">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="5">No.</th>
                        <th>Produk</th>
                        <th width="100">Qty</th>
                        <th width="120" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <h3>TOTAL QTY : <span class="total_qty">0</span></h3>
                <a href="<?php echo base_url() ?>produksi/member_retail/order_sales_action/<?php echo $id_member ?>" class="btn btn-primary pull-right" style="margin-bottom:20px"><i class="fa fa-shopping-cart"></i> Order</a>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div>
    </div><!-- /.main-content -->
    <style>
      .alt {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 100000000;
        overflow: hidden;
        display: none;
        background-color: rgba(250, 250, 250, .7);
      }
      .alt > .alt-body {
        border-radius: 5px;
        background-color: rgba(230, 230, 230, .7);
        margin: 150px auto auto auto;
        padding: 10px;
        width: 300px;
        text-align: center;
        font-size: 20px;
        z-index: 100000001;
      }
      @media(max-width: 800px) {
        .alt {
          margin-top: 50px;
        }
      }
    </style>
    <div class="alt">
      <div class="alt-body">
        A
      </div>
    </div>
    <link href="<?php echo base_url() ?>assets/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>
    <script>
      $(document).ready(function(){
        function showAlt(text){
          hideAlt();
          $(".alt").show();
          $(".alt > .alt-body").html(text);
          setTimeout(function(){
            hideAlt();
          }, 1000);
        }
        function hideAlt(){
          $(".alt > .alt-body").html("");
          $(".alt").hide();
        }
        function ajax(url, data, result) {
          $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function(response) {
              result(response);
            }
          });
        }
        $('#select2').select2();
        $('#select2').on('select2:select', function (e) {
          $('#select2').attr('disabled','disabled');
          var data = e.params.data;
          var id = data.id;
          ajax('<?php echo base_url() ?>produksi/member_retail/json_input_sales_temp', "id_produk_2="+id+"&id_member=<?php echo $id_member ?>", function(response){
            showAlt(response.msg);
            $('#select2').removeAttr('disabled');
            loadTemp();
          });
        });
        loadTemp();
        function loadTemp() {
          $('#select2').val("0").trigger('change');
          ajax('<?php echo base_url() ?>produksi/member_retail/json_sales_temp', "id_member=<?php echo $id_member ?>", function(data){
            var html = "";
            var no = 1;
            var total_qty = 0;
            for (var item in data) {
              var stok = data[item].stok*1;
              html += "\
              <tr>\
                <td>"+no+"</td>\
                <td>"+data[item].nama_produk+" | "+data[item].satuan_produk+" | (Total stok : "+stok+")</td>\
                <td style='background-color:white;padding:0px;margin:0px;vertical-align:middle;'><input type='number' data-id='"+data[item].id_produk+"' class='form-control input-qty' style='margin:0px;border-width:0px;' value='"+data[item].jumlah+"'></td>\
                <td width='150'><button type='button' data-id='"+data[item].id_produk+"' data-stok='"+data[item].stok+"' class='btn btn-primary btn-xs no-border btn-edit'>Simpan</button> <a href='<?php echo base_url() ?>produksi/member_retail/order_sales_delete/"+data[item].id+"' class='btn btn-danger btn-xs no-border'>Hapus</a></td>\
              </tr>\
              ";
              total_qty+=data[item].jumlah*1;
              no++;
            }
            $(".table tbody").html(html);
            $(".total_qty").html(total_qty);
            $(".btn-edit").click(function(){
              var id = $(this).attr('data-id');
              var stok = $(this).attr('data-stok')*1;
              var qty = $('input[data-id="'+id+'"]').val()*1;
              if (qty > stok) {
                showAlt("Stok tidak mencukupi");
                loadTemp();
              } else {
                ajax('<?php echo base_url() ?>produksi/member_retail/json_input_sales_temp', "id_produk_2="+id+"&id_member=<?php echo $id_member ?>&qty="+qty, function(response){
                  showAlt(response.msg);
                  loadTemp();
                });
              }
            });
          });
        }
      });
    </script>