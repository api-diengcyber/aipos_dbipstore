
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Retur Pembelian</li>
            </ul><!-- /.breadcrumb -->

            
          </div>

          <div class="page-content">

            <div class="page-header">
              <h1>
                Retur Pembelian
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <form action="<?php echo $action; ?>" method="post">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="varchar">Tanggal <?php echo form_error('tgl') ?></label>
                          <input type="text" class="form-control" name="tgl" id="datepicker2" placeholder="dd-mm-yyyy" value="<?php echo $tgl; ?>" autocomplete="off" />
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                          <label for="varchar">Faktur Pembelian <?php echo form_error('id_faktur') ?></label>
                          <select class="chosen-select form-control" name="id_faktur" id="id_faktur">
                            <option value="">-- Pilih Faktur --</option>
                            <?php foreach ($data_faktur as $key): ?>
                            <option value="<?php echo $key->id_faktur ?>" data-pembayaran="<?php echo $key->pembayaran ?>" data-hutang="<?php echo $key->hutang ?>" data-deadline="<?php echo $key->deadline ?>" data-kurang="<?php echo $key->kurang ?>" <?php echo $id_faktur==$key->id_faktur?"selected":"";?>><?php echo $key->no_faktur." - ".$key->nama_supplier ?></option>
                            <?php endforeach ?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row panel-other">
                    <div class="col-md-12">
                      <div class="form-group">
                        <span class="panel-pembayaran"></span>&nbsp;&nbsp;<span class="panel-ket"></span>
                      </div>
                    </div>
                    <!-- <div class="col-md-10">
                      <div class="form-group panel-ket">
                      </div>
                    </div> -->
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="table-responseive">
                        <table class="table table-bordered" id="mytable">
                          <thead>
                            <tr>
                              <th width="10">No</th>
                              <th width="400">Nama Produk</th>
                              <th width="150" class="text-center">Harga Satuan Beli</th>
                              <th width="100" class="text-center">Jumlah Tersedia</th>
                              <th width="100" class="text-center">Jumlah Retur</th>
                              <th width="150" class="text-center">Subtotal</th>
                            </tr>
                          </thead>
                          <tbody></tbody>
                          <tfoot>
                            <tr>
                              <th colspan="5" class="text-right">Total</th>
                              <th class="text-right"><span class="total"></span></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <!-- <div class="form-group">
                          <label for="varchar">Produk <?php // echo form_error('id_produk') ?></label>
                          <select class="form-control" name="id_produk" id="id_produk">
                            <option value="">-- Pilih Produk --</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="varchar">Jumlah <?php // echo form_error('jumlah') ?></label>
                          <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php // echo $jumlah; ?>" />
                      </div>
                      <div class="form-group">
                          <label for="varchar">Alasan <?php // echo form_error('alasan') ?></label>
                          <input type="text" class="form-control" name="alasan" id="alasan" placeholder="Alasan" value="<?php // echo $alasan; ?>" />
                      </div> -->
                    </div>
                  </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="submit" class="btn btn-primary" disabled>Simpan</button>
                </form>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <script type="text/javascript">
        function loadquery() {
          $(".jumlah").on("keyup", function(e){
            e.stopImmediatePropagation();
            var val = jNumber($(this).val())*1;
            $(this).val(numberWithCommas(val.toString()));
            $('button[type="submit"]').attr("disabled", "disabled");
          });
          $(".jumlah").on("change", function(e){
            e.stopImmediatePropagation();
            var val = jNumber($(this).val())*1;
            var id = $(this).attr("data-id");
            var harga_satuan = jNumber($('.harga_satuan[data-id="'+id+'"]').text())*1;
            var stok_sisa = jNumber($('.stok_sisa[data-id="'+id+'"]').text())*1;
            if (val>stok_sisa) {
              val = stok_sisa;
              $(this).val(numberWithCommas(val.toString()));
            }
            var subtotal = val*harga_satuan;
            $('.subtotal[data-id="'+id+'"]').text(numberWithCommas(subtotal.toString()));
            hitungtotal();
          });
          hitungtotal();
        }
        function hitungtotal() {
          var total = 0;
          $(".subtotal").each(function(){
            var val = jNumber($(this).text())*1;
            total += val;
          });
          $(".total").text(numberWithCommas(total.toString()));
          if (total>0) {
            $('button[type="submit"]').removeAttr("disabled");
          } else {
            $('button[type="submit"]').attr("disabled", "disabled");
          }
        }
        var id_produk = '<?php echo $id_produk ?>';
        var get_produk = function(id_faktur){
          $('button[type="submit"]').attr("disabled", "disabled");
          $.ajax({
            url: '<?php echo base_url() ?>outlet/retur/produk_ajax/'+id_faktur,
            type: 'GET',
            success: function(response){
              $('button[type="submit"]').removeAttr("disabled");
              var ghtml = "";
              if (response.status=="ok") {
                ghtml = response.data;
              }
              $("#mytable>tbody").html(ghtml);
              loadquery();
              // for (var i = 0; i < response.length; i++) {
              //   if (response[i].id_produk_2 == id_produk) {
              //   data_produk.push('<option selected value="'+response[i].id_produk_2+'">'+response[i].nama_produk+'</option>');
              //   } else {
              //   data_produk.push('<option value="'+response[i].id_produk_2+'">'+response[i].nama_produk+'</option>');
              //   }
              // }
              // $("#id_produk").html(data_produk);
            },
            error: function(){
              // $('button[type="submit"]').removeAttr("disabled");
            }
          });
        }
        <?php if (!empty($id_faktur)) { ?>get_produk('<?php echo $id_faktur ?>');<?php } ?>
        jQuery(function($){
          $("#id_faktur").on("change", function(){
            var id_faktur = $(this).val();
            var html_pembayaran = "";
            var html_ket = "";
            if (id_faktur!=null && id_faktur!="") {
              $(".panel-other").show();
              var pembayaran = $(this).find(':selected').attr("data-pembayaran");
              var hutang = $(this).find(':selected').attr("data-hutang");
              var deadline = $(this).find(':selected').attr("data-deadline");
              var kurang = $(this).find(':selected').attr("data-kurang");
              if (pembayaran*1==1) {
                html_pembayaran = '<span class="badge badge-danger">Hutang</span>';
                html_ket = 'Jatuh Tempo: <b>'+deadline+'</b>, Total Hutang: <b>'+numberWithCommas(hutang.toString())+'</b>, Kurang: <b>'+numberWithCommas(kurang.toString())+'</b>';
              } else {
                html_pembayaran = '<span class="badge badge-primary">Tunai</span>';
              }
              get_produk(id_faktur);
            } else {
              $(".panel-other").hide();
            }
            $(".panel-pembayaran").html(html_pembayaran);
            $(".panel-ket").html(html_ket);
          });
          $("#id_faktur").trigger("change");
        });
      </script>