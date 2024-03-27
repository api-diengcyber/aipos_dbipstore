
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active"><?php echo $heading ?></li>
            </ul><!-- /.breadcrumb -->

            <div class="loading d-none">Loading&#8230;</div>
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
                <?php echo $heading ?>
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                
                <form action="" method="post">
                  <div class="row">
                      <div class="col-md-8">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="varchar">No Faktur</label>
                                      <input type="text" class="form-control" name="no_faktur" id="no_faktur" value="<?php echo $no_faktur ?>" readonly />
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="varchar">Tanggal</label>
                                      <input type="text" class="form-control" name="tgl" id="datepicker1" value="<?php echo $tgl ?>" />
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="varchar">Bahan</label>
                              <input type="text" class="form-control" name="bahan" id="bahan" placeholder="Cari Nama Bahan disini..." autocomplete="off" />
                          </div>
                          <div>
                            <table class="table table-bordered" id="table_temp">
                              <thead>
                                <tr>
                                  <th width="200">Bahan</th>
                                  <th width="10">Jumlah</th>
                                  <th width="100">Expire</th>
                                  <th width="100">Harga Satuan</th>
                                  <th width="80">Diskon (%)</th>
                                  <th width="150">Subtotal</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody></tbody>
                            </table>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="varchar">Total Harga</label>
                                  <input type="text" class="form-control text-right" name="total_harga" id="total_harga" placeholder="0,-" value="<?php echo $total_harga ?>" readonly />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="varchar">Diskon Tambahan (%)</label>
                                  <input type="text" class="form-control text-right" name="diskon" id="diskon" placeholder="0" value="<?php echo $diskon ?>" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="varchar">Potongan</label>
                                  <input type="text" class="form-control text-right" name="pot" id="pot" placeholder="0" value="<?php echo $pot ?>" />
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                              <label for="varchar">Keterangan</label>
                              <textarea class="form-control" name="ket" id="ket" placeholder="Tulis keterangan disini..." rows="4"><?php echo $ket ?></textarea>
                          </div>
                      </div>
                      <style>
                      .harga-display {
                        background: linear-gradient(to right, #0ca7d6, #60bfff);
                        border: solid 2px #ffffff;
                        border-radius: 10px;
                        padding: 20px;
                        margin-top: 22px;
                        margin-bottom: 10px;
                      }
                      </style>
                      <div class="col-md-4">
                        <div class="harga-display">
                          <h3 style="color:white;margin:0px;"><b>TOTAL BAYAR </b></h3>
                          <h1 style="color:black;font-weight:bold;font-family:impact;margin:10px 0px 0px 0px;">Rp <span style="float:right;" class="total">0,-</span></h1>
                          <input type="hidden" name="total_bayar" id="total_bayar" value="<?php echo $total_bayar ?>">
                        </div>
                        <div class="form-group">
                          <label for="varchar">Pembayaran</label>
                          <select class="form-control" name="pembayaran" id="pembayaran">
                            <option value="1" <?php echo $pembayaran=="1" ? "selected" : "" ?>>TUNAI</option>
                            <option value="2" <?php echo $pembayaran=="2" ? "selected" : "" ?>>KREDIT</option>
                          </select>
                        </div>
                        <div class="form-group panelDP" style="display:none;">
                          <label for="varchar">DP</label>
                          <input type="text" class="form-control text-right" name="dp" id="dp" placeholder="0" value="<?php echo $dp ?>" />
                        </div>
                        <div class="form-group panelDP" style="display:none;">
                          <label for="varchar">Kurang</label>
                          <input type="text" class="form-control text-right" name="kurang" id="kurang" placeholder="0" readonly value="<?php echo $kurang ?>" />
                        </div>
                        <div id="show_notify"></div>
                      </div>
                  </div>
                  <br>
                  <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                  <?php if (!empty($id_pembelian)) : ?>
                  <input type="hidden" name="id_pembelian" value="<?php echo $id_pembelian; ?>" /> 
                  <?php endif; ?>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> 
                  <a href="<?php echo site_url('admin/pembelian') ?>" class="btn btn-default">Kembali</a>

                </form>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<style>
@keyframes highlight {
  0% {
    background-color: #ffff99; /* lovely yellow colour */
  }
  100% {
    background-color: none;
  }
}
.highlight {
    animation: highlight 2s;
}
/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 9999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
    background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 150ms infinite linear;
  -moz-animation: spinner 150ms infinite linear;
  -ms-animation: spinner 150ms infinite linear;
  -o-animation: spinner 150ms infinite linear;
  animation: spinner 150ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
.d-none{
  display:none;
}
</style>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/select2.min.css">
<script src="<?php echo base_url() ?>assets/js/select2.min.js" type="text/javascript"></script>
<script>
const numberWithCommas = (x) => {
  var parts = x.toString().split(".");
  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  return parts.join(",");
}
function jNumber(nums) {
  if (typeof(nums)!=='undefined') {
    return nums.toString().split(' ').join('').split('.').join('').split(',').join('.');
  } else {
    return 0;
  }
}
<?php
$array_temp = array();
foreach ($data_temp as $key => $value) {
  $array_temp[$value->id_bahan] = $value;
}
?>
$(document).ready(function(){
  var dbt_temp = <?php echo json_encode((Object) $array_temp) ?>;
  var dbtf_total_harga = 0;
  var dbtf_total_bayar = 0;
  var current_uid = 0;
  function ajax(b,c,a){$.ajax({url:b,type:'POST',processData:!1,contentType:!1,data:c,success:function(b){a(b);},error:function(b,d,c){a(b.status),console.log(b.status+' > '+c);}});}
  function axon(el, response) {
    $(el).autocomplete({
      source: function (request, response) {
        var formData = new FormData();
        formData.append('term', request.term);
        <?php if (!empty($id_pembelian)) : ?>
        formData.append('id_pembelian', <?php echo $id_pembelian*1 ?>);
        <?php endif; ?>
        ajax('<?php echo $action_bahan_term ?>', formData, function(data){
          response($.map(data, function (value, key) {
            return { value: value.value, label: value.label+" ("+value.satuan+")" };
          }));
        });
      }, minLength: 1, delay: 0, autoFocus: true,
      select: function(event, ui){
        response(ui);
        return false;
      }
    });
  }
  axon("#bahan", function(ui) {
    $("#bahan").val(ui.item.label);
    // alert(ui.item);
    // console.log("ini: "+ui.item.satuan);
    var formData = new FormData();
    formData.append("id_bahan", ui.item.value);
    <?php if (!empty($id_pembelian)) : ?>
    formData.append('id_pembelian', <?php echo $id_pembelian*1 ?>);
    <?php endif; ?>
    ajax('<?php echo $action_submit_bahan ?>', formData, function(data){
      // $("#bahan").val('');
      if (data.status=="ok") {
        $('.loading').removeClass('d-none');
                  setTimeout(function(){
                          location.reload();
                      }, 100);
        dbt_temp[data.data.id_bahan] = data.data;
        current_uid = data.data.id_bahan;
        load_temp();
      }
    });
  });
  $("#diskon, #pot").on("keyup change", function(){
    var that = $(this);
    var name = that.attr("name");
    var val = jNumber(that.val());
    $(this).val(numberWithCommas(val));
    var pot = 0;
    if (dbtf_total_harga > 0) {
      if (name=="diskon") {
        pot = val*1 > 0 ? (val*1/100) * dbtf_total_harga : 0;
        $("#pot").val(numberWithCommas(pot));
      } else {
        pot = val;
        var diskon = pot > 0 ? (pot/dbtf_total_harga)*100 : 0;
        $("#diskon").val(numberWithCommas(diskon));
      }
    }
    dbtf_total_bayar = dbtf_total_harga-pot;
    $(".total").html(numberWithCommas(dbtf_total_bayar));
    $("#total_bayar").val(numberWithCommas(dbtf_total_bayar));
    $("#dp").trigger("change");
  });
  function load_temp() {
    dbtf_total_harga = 0;
    var html = '';
    var html_notify = '';
    for (var item in dbt_temp) {
      var classHL = '';
      // console.log('nama:'+ dbt_temp[item].nama);
      // console.log('id_bahan: '+ dbt_temp[item].id_bahan);
      // console.log('id_toko: '+ dbt_temp[item].id_toko);
      if (current_uid==item) {
        classHL = 'highlight';
      }
      if (dbt_temp[item].stok_used=="1") {
        html_notify += '<div class="alert alert-danger"><b>Peringatan!</b><br>'+dbt_temp[item].nama+' ('+dbt_temp[item].satuan+') Stok sudah digunakan <br> <b>'+numberWithCommas(dbt_temp[item].stok)+'</b> stok tersisa</div>';
      }
      html += '<tr>\
        <td class="'+classHL+'">'+dbt_temp[item].nama+' ('+dbt_temp[item].satuan+')</td>\
        <td class="'+classHL+'" style="padding:0px;vertical-align:middle;"><input type="text" class="form-control text-center input-update" style="border:none;outline:none;" data-name="jumlah" data-uid="'+item+'" value="'+numberWithCommas(dbt_temp[item].jumlah)+'" /></td>\
        <td class="'+classHL+'" style="padding:0px;vertical-align:middle;"><input type="text" class="form-control text-center input-update" style="border:none;outline:none;" data-name="tgl_expire" data-uid="'+item+'" value="'+dbt_temp[item].tgl_expire+'" /></td>\
        <td class="'+classHL+'" style="padding:0px;vertical-align:middle;"><input type="text" class="form-control text-right input-update" style="border:none;outline:none;" data-name="harga_satuan" data-uid="'+item+'" value="'+numberWithCommas(dbt_temp[item].harga_satuan)+'" /></td>\
        <td class="'+classHL+'" style="padding:0px;vertical-align:middle;"><input type="text" class="form-control text-right input-update" style="border:none;outline:none;" data-name="diskon" data-uid="'+item+'" value="'+numberWithCommas(dbt_temp[item].diskon)+'" /></td>\
        <td class="text-right '+classHL+'">'+numberWithCommas(dbt_temp[item].subtotal)+'</td>\
        <td><button type="button" class="btn btn-danger btn-sm delete-btn" data-uid="'+dbt_temp[item].id_bahan+'"><i class="fa fa-trash"></i></button></td>\
      </tr>';
      dbtf_total_harga += dbt_temp[item].subtotal*1;
    }




    current_uid = 0;
    $("#table_temp tbody").html(html);
    $("#show_notify").html(html_notify);
    setTimeout(function(){
      $("td").removeClass("highlight");
    }, 1000);
    if (dbtf_total_harga > 0) {
      $("#pot").removeAttr("readonly").css({'border':'1px solid #D5D5D5'});
      $("#diskon").removeAttr("readonly").css({'border':'1px solid #D5D5D5'});
    } else {
      $("#pot").val(0);
      $("#diskon").val(0);
      $("#pot").attr("readonly", "readonly").css({'border':'1px solid red'});
      $("#diskon").attr("readonly", "readonly").css({'border':'1px solid red'});
    }
    $("#total_harga").val(numberWithCommas(dbtf_total_harga));
    $("#diskon").trigger("keyup");
    $(".input-update").on("keyup", function(){
      var that = $(this);
      var name = that.attr("data-name");
      if (name=="tgl_expire") {
        $(this).val(that.val());
      } else {
        var val = jNumber(that.val());
        $(this).val(numberWithCommas(val));
      }
    });
    $(".input-update").on("change", function(){
      var that = $(this);
      var val = jNumber(that.val());
      var formData = new FormData();
      formData.append("name", that.attr("data-name"));
      formData.append("uid", that.attr("data-uid"));
      formData.append("value", val);
      <?php if (!empty($id_pembelian)) : ?>
      formData.append('id_pembelian', <?php echo $id_pembelian*1 ?>);
      <?php endif; ?>
      ajax('<?php echo $action_update ?>', formData, function(data){
        if (data.status=="ok") {
          
          for (var item in data.data) {
            dbt_temp[data.id_bahan][item] = data.data[item];
            current_uid = data.id_bahan;
          }
        } else {
          alert("ERROR");
        }
        load_temp();
      });
    });
  }
  load_temp();
  // Tambahkan event listener untuk tombol delete
  $('.delete-btn').on("click", function(e){
      e.preventDefault(); // Tambahkan baris ini
     
      var uid = $(this).data('uid');
        var id = $(this).data('id');

        // Kirim permintaan Ajax ke server untuk menghapus data
        $.ajax({
            url: '<?=base_url("/admin/pembelian/delete_temp/")?>' + uid,

             // Sesuaikan dengan path ke metode delete pada controller Anda
            type: 'DELETE',
            dataType: 'json',
            success: function(response) {
                // Tanggapan dari server (berhasil atau gagal)
                if (response.success) {
                  $('.loading').removeClass('d-none');
                  setTimeout(function(){
                          location.reload();
                      }, 100);
                    // Lakukan tindakan setelah penghapusan berhasil
                    // alert('Item with UID ' + uid + ' deleted successfully'+response.message);
                } else {
                    // Handle kegagalan penghapusan (jika diperlukan)
                    alert('Failed to delete item');
                }
            },
            error: function() {
                // Tanggapan dari server tidak dapat diterima
                alert('Error communicating with the server');
            }
        });
      
  });



  $("#pembayaran").on("change", function(){
    var val = $(this).val()*1;
    if (val==2) {
      $(".panelDP").show();
    } else {
      $("#dp").val(0);
      $("#dp").trigger("change");
      $(".panelDP").hide();
    }
  });
  $("#pembayaran").trigger("change");
  $("#dp").on("keyup change", function(){
    var val = jNumber($(this).val());
    $(this).val(numberWithCommas(val));
    var kurang = dbtf_total_bayar-val*1;
    $("#kurang").val(numberWithCommas(kurang));
  });
  $("#dp").trigger("change");
  $("form").submit(function(e){
    $('button[type="submit"]').attr("disabled","disabled");
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    ajax('<?php echo $action ?>', formData, function(data){
      var html = "";
      if (data.status=="ok") {
        html = '<div class="alert alert-info"><?php echo $heading ?> Berhasil!</div>';
      } else {
        html = '<div class="alert alert-danger"><?php echo $heading ?> Gagal!</div>';
      }
      $("form").html(html);
      setTimeout(function(){
        //window.location.reload();
      }, 1000);
    });
  });
});
</script>