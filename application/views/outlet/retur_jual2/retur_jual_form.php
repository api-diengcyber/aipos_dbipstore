
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
                <form class="form-rtr" action="<?php echo $action ?>" method="post">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="varchar">Cari Barang/Barcode <?php echo form_error('no_retur') ?></label>
                      <input type="text" class="form-control" name="cari_barang" id="cari_barang" placeholder="Cari Barang/Barcode" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="varchar">Tanggal <?php echo form_error('tanggal') ?></label>
                      <input type="text" class="form-control" name="tanggal" id="datepicker1" value="<?php echo $tanggal ?>" placeholder="dd-mm-yyyy" autocomplete="off" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th width="10">No</th>
                            <th width="350">Nama Produk</th>
                            <th width="100" class="text-center">Qty</th>
                            <th width="100" class="text-center">Nominal</th>
                            <th width="100" class="text-center">Pilihan</th>
                            <th width="120" class="text-center">Subtotal</th>
                            <th width="30" class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                          <!-- <tr>
                            <th colspan="8" class="text-right">Total</th>
                            <th class="text-right"><span class="total">0</span></th>
                          </tr> -->
                        </tfoot>
                      </table>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="ket">Keterangan</label>
                          <textarea class="form-control" name="ket" rows="4" placeholder="Keterangan"></textarea>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="ket">Return Dengan</label>
                          <select name="return" id="return" class="form-control">
                            <option value="" selected disabled>-- Pilih --</option>
                            <option value="1">BARANG YANG SAMA</option>
                            <option value="2">UANG</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3 pillNominal hide">
                        <div class="form-group">
                          <label for="ket">Nominal</label>
                            <input type="number" name="nominal" class="form-control" placeholder="Nominal">
                        </div>
                      </div>
                    </div>


                 


                    <button type="submit" class="btn btn-primary btn-simpan" disabled>Simpan</button>
                  </div>
                </div>
                </form>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <script>

$("#return").on('change', function() {
    var val = $(this).val();
    if(val==1){
      $(".pillNominal").addClass("hide");
    }else{
      $(".pillNominal").removeClass("hide");
    }
  });


      $(document).ready(function(){
        $("#cari_barang").autocomplete({
          source: function(request, response){
            $.ajax({
              url: '<?php echo base_url() ?>admin/retur_jual2/ajax_cari_barang',
              type: 'post',
              data: 'term='+request.term,
              success: function(res) {
                if (res.status=="ok") {
                  response($.map(res.data, function (value, key) {
                    return {
                      value: value.value,
                      label: value.label,
                    };
                  }));
                } else {
                  alert("Error");
                }
              }
            });
          },
          minLength: 1,
          delay: 0,
          autoFocus: true,
          select: function(event, ui){
            $("#cari_barang").val(ui.item.label);
            insert_temp(ui.item.value);
            return false;
          }
        });
        
        function insert_temp(id) {
          $.ajax({
            url: '<?php echo base_url() ?>admin/retur_jual2/ajax_insert_temp',
            type: 'post',
            data: 'id_produk='+id,
            success: function(response) {
              $("#cari_barang").val("");
              table_temp();
            }
          });
        }

        function table_temp() {
          $.ajax({
            url: '<?php echo base_url() ?>admin/retur_jual2/ajax_table',
            type: 'get',
            success: function(response) {
              if (response.status == "ok") {
                _generate_table(response.data);
              }
            }
          });
        }
        table_temp();

        function _generate_table(data) {
          var no = 0;
          var html = '';
          for (var item in data) {
            no++;
            var subtotal = (data[item].jumlah*1)*(data[item].harga_satuan*1);
            html += `
              <tr>
                <td>`+no+`</td>
                <td>`+data[item].nama_produk+`</td>
                <td style="padding:0px;"><input type="text" class="form-control input-number stok_kembali" name="stok_kembali[`+data[item].id_produk+`]" value="`+data[item].jumlah+`" data-id="`+data[item].id+`" style="text-align:center;"></td>
                <td style="padding:0px;"><input type="text" class="form-control input-number nominal" name="nominal[`+data[item].id_produk+`]" data-id="`+data[item].id+`" value="`+numberWithCommas(data[item].harga_satuan)+`" style="background-color:#ff5722!important;color:#fff;text-align:right;" /></td>
                <td style="padding:0px;">
                  <select class="form-control select-pilihan" name="pilihan[`+data[item].id_produk+`]" data-id="`+data[item].id+`">
                    <option value="0" `+(data[item].pilihan=="0"?"selected":"")+`>STOK KEMBALI</option>
                    <option value="1" `+(data[item].pilihan=="1"?"selected":"")+`>STOK MATI</option>
                  </select>
                </td>
                <td class="text-right"><span class="text-subtotal" data-id="`+data[item].id+`">`+numberWithCommas(subtotal)+`</span></td>
                <td class="text-center" style="padding:0px;"><button type="button" class="btn btn-danger btn-xs btn-delete" data-id="`+data[item].id+`"><i class="ace-icon fa fa-trash"></i></button></td>
              </tr>
            `;
          }
          $("#mytable tbody").html(html);
          $(".input-number").on("keyup", function(e){
            e.stopImmediatePropagation();
            var val = jNumber($(this).val());
            $(this).val(numberWithCommas(val*1));
          });
          update_table();
          if (no > 0) {
            $(".btn-simpan").removeAttr("disabled");
          } else {
            $(".btn-simpan").attr("disabled", "disabled");
          }
        }

        function hitung_row(id) {
          var qty = jNumber($('.stok_kembali[data-id="'+id+'"]').val())*1;
          var nominal = jNumber($('.nominal[data-id="'+id+'"]').val())*1;
          var pilihan = jNumber($('.select-pilihan[data-id="'+id+'"]').val())*1;
          var st = qty*nominal;
          $.ajax({
            url: '<?php echo base_url() ?>admin/retur_jual2/ajax_update_temp',
            type: 'post',
            data: 'id='+id+'&qty='+qty+'&nominal='+nominal+'&pilihan='+pilihan+'&subtotal='+st,
            success: function(response) {
              $('.stok_kembali[data-id="'+id+'"]').removeAttr("disabled");
              $('.nominal[data-id="'+id+'"]').removeAttr("disabled");
              $('.select-pilihan[data-id="'+id+'"]').removeAttr("disabled");
              $('.text-subtotal[data-id="'+id+'"]').text(numberWithCommas(st.toString()));
            }
          });
        }

        function update_table() {
          $('.stok_kembali').on("change", function(){
            var id = $(this).attr("data-id");
            $(this).attr("disabled", "disabled");
            hitung_row(id);
          });
          $('.nominal').on("change", function(){
            var id = $(this).attr("data-id");
            $(this).attr("disabled", "disabled");
            hitung_row(id);
          });
          $('.select-pilihan').on("change", function(){
            var id = $(this).attr("data-id");
            $(this).attr("disabled", "disabled");
            hitung_row(id);
          });
          $('.btn-delete').on("click", function(){
            var id = $(this).attr('data-id');
            $.ajax({
              url: '<?php echo base_url() ?>admin/retur_jual2/ajax_delete_temp',
              type: 'post',
              data: 'id='+id,
              success: function() {
                table_temp();
              }
            });
          });
        }
/* 
        var is_submit = false;
        $(".btn-simpan").on("click", function(e){
          is_submit = true;
          alert("click");
        });

        $(".form-rtr").submit(function(e){
          e.preventDefault();
        }); */

      });
      </script>