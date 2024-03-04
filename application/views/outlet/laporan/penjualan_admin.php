
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan</li>
              <li class="active">Penjualan</li>
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
                Laporan Penjualan
                
              </h1>
            </div><!-- /.page-header -->
            <?php

            $chk_hari = "";
            $chk_bulan = "";

            if($per_laporan=='hari'){
              $tgl = date('d-m-Y');
              $chk_hari = "checked";

            } else if($per_laporan=='bulan') {
              $chk_bulan = "checked";

            } else {
              $tgl = date('d-m-Y');
              $chk_hari = "checked";

            }
            ?>

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                    <form method="post" id="formPeriode" class="form-horizontal" action="">
                      <div class="form-group">
          
                        <div class="col-sm-2" style="margin-top:10px;">
                          <div class="radio">
                            <label>
                              <input name="per_laporan" type="radio" class="ace" value="hari" <?php echo $chk_hari; ?> onclick='this.form.submit()' />
                              <span class="lbl"> Hari ini </span>
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input name="per_laporan" type="radio" class="ace" value="bulan" <?php echo $chk_bulan; ?> onclick='this.form.submit()' />
                              <span class="lbl"> Periode</span>
                            </label>
                          </div>
                          <br>
                          
                        </div>
                        <div class="col-sm-2 mt-5">
                     
                          <br>
                          <div class="form-group">
                            <select name="pembayaran" class="input-lg form-control" id="bayar">
                                <option value="">--SEMUA PEMBAYARAN--</option>
                                <option value="1" <?php echo $pembayaran == 1 ? 'selected' : ''; ?>>TUNAI</option>
                                <option value="2" <?php echo $pembayaran == 2 ? 'selected' : ''; ?>>KREDIT</option>
                                <option value="3" <?php echo $pembayaran == 3 ? 'selected' : ''; ?>>TRANSFER</option>
                                <option value="4" <?php echo $pembayaran == 4 ? 'selected' : ''; ?>>SPLIT</option>
                                <!-- <?php 
                                foreach ($data_kasir as $key_kasir):
                                  if($kasir == $key_kasir->id_users) {
                                ?>
                                <option selected value="<?php echo $key_kasir->id_users ?>"><?php echo $key_kasir->first_name." ".$key_kasir->last_name ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $key_kasir->id_users ?>"><?php echo $key_kasir->first_name." ".$key_kasir->last_name ?></option>
                                <?php }; ?>
                                <?php endforeach ?> -->
                              </select>
                          </div>
                          <div class="form-group bank hide">
                            <select name="bank" id="id_bank" class=" input-2" style="width:100%;" onchange="this.form.submit()">
                              <option value="">-- Pilih Bank --</option>
                              <?php foreach ($data_bank as $key_b): ?>
                              <option value="<?php echo $key_b->id ?>"<?php echo $bank == $key_b->id ? 'selected' : ''; ?>><?php echo $key_b->bank ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                        </div>
                       
                        <div class="col-sm-3">
                          <div class="pos-rel"><br>
                            <div class="row">
                              <div class="col-sm-12 col-sm-12">
                                <div class="input-daterange input-group">
                                  <input type="text" class=" form-control" id="datepicker1" name="awal_periode" value="<?php echo $awal_periode ?>" onchange="this.form.submit()" />
                                  <span class="input-group-addon">
                                    <i class="fa fa-exchange"></i>
                                  </span>
                                  <input type="text" class=" form-control" id="datepicker2" name="akhir_periode" value="<?php echo $akhir_periode ?>" onchange="this.form.submit()" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4"><br>
                          <select name="kasir" class="input-lg form-control" onchange="this.form.submit()">
                            <option value="">-- Semua kasir --</option>
                            <?php 
                            foreach ($data_kasir as $key_kasir):
                              if($kasir == $key_kasir->id_users) {
                            ?>
                            <option selected value="<?php echo $key_kasir->id_users ?>"><?php echo $key_kasir->first_name." ".$key_kasir->last_name ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $key_kasir->id_users ?>"><?php echo $key_kasir->first_name." ".$key_kasir->last_name ?></option>
                            <?php }; ?>
                            <?php endforeach ?>
                          </select>
                        </div>
                        <div class="col-sm-12">
                        <input type="text" name="no_faktur" class="form-control d-block" placeholder="Cari No Faktur.." onchange="this.form.submit()" value="<?=$no_faktur?>">
                        </div>
                      </div>
                    </form>

                    <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="table-header">
                    </div>

                    <!-- div.table-responsive -->
					
                    <?php
                      $statusMap = [
                        "1" => [
                          "total" => 0, 
                          "message" => "Menunggu"
                        ],
                        "2" => [
                          "total" => 0, 
                          "message" => "Di Verifikasi"
                        ],
                        "3" => [
                          "total" => 0, 
                          "message" => "Di Kirim"
                        ],
                        "4" => [
                          "total" => 0, 
                          "message" => "Selesai"
                        ],
                        "5" => [
                          "total" => 0, 
                          "message" => "Retur COD"
                        ],
                        "6" => [
                          "total" => 0, 
                          "message" => "Retur Garansi"
                        ]
                      ];
                    ?>
					
                    <!-- div.dataTables_borderWrap -->
                    <div class="table-responsive">
                      <table id="" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th width="2" class="center">No</th>
                            <th>No Faktur</th>
                            <?php if($id_modul!=1){?>
                            <th>Pembayaran</th>
                            <?php }; ?>
                            <th>Kasir</th>
                            <th>Tgl Order</th>
                            <th>Jam Order</th>
                            <th>Nominal</th>
                            <th>Laba Bersih</th>
                            <!-- <th>Status</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no=1;
                          $total_nominal = 0;
                          $total_laba = 0;
                          foreach ($contents as $key):
                          
                            if($key->pembayaran=="1"){
                              $pembayaran = "TUNAI";
                            } else if($key->pembayaran=="2"){
                              $pembayaran = "KREDIT";
                            } else if($key->pembayaran=="3"){
                              $pembayaran = "TRANSFER";
                            } else{
                              $pembayaran = "SPLIT";
                              
                                  

                            }

                          ?>
                          <tr>
                            <td class="center"><?php echo $no ?></td>
                            <td><a href="<?php echo base_url() ?>admin/laporan_retail/detail_faktur/<?php echo $key->no_faktur ?>"><?php echo $key->no_faktur ?></a></td>
                            <?php if($id_modul!=1){ ?>
                            <td>
                              <?php echo $pembayaran ?><?php
                                  if($key->pembayaran==4){
                                    $split = $this->db->select('*,pembayaran as s_pem')
                                    ->from('split_bayar')
                                    ->where('id_orders',$key->id_o)
                                    ->where('id_toko',$this->userdata->id_toko)
                                    ->get()
                                    ->row();
                                    // echo $split->s_pem;
                                    if($split->s_pem==1){
                                        echo " (TUNAI)";
                                      }elseif($split->s_pem==2){
                                        echo " (KREDIT)";
                                      }elseif($split->s_pem==3){
                                        echo " (TANSFER - ";
                                        $bank=$this->db->select('*')
                                              ->from('pil_bank')
                                              ->where('id',$split->id_bank)
                                              ->get()
                                              ->row();
                                              if($bank!=null){
                                                echo $bank->bank." )";
                                              }else{
                                                echo "..)";
                                              }
      
                                      }else{
      
                                      }

                                  }
                              // if(!empty($split)){
                                // if($split->s_pem==1){
                                //   echo " (TUNAI)";
                                // }elseif($split->s_pem==2){
                                //   echo " (KREDIT)";
                                // }elseif($split->s_pem==3){
                                //   echo " (TANSFER - ";
                                //   $bank=$this->db->select('*')
                                //         ->from('pil_bank')
                                //         ->where('id',$split->id_bank)
                                //         ->get()
                                //         ->row();
                                //         if($bank!=null){
                                //           echo $bank->bank." )";
                                //         }else{
                                //           echo "..)";
                                //         }

                                // }else{

                                // }

                              // } 
                                ?>
                          
                            </td>
                            <?php } ?>
                            <td><?php echo $key->first_name." ".$key->last_name ?></td>
                            <td><?php echo $key->tgl_order ?></td>
                            <td><?php echo $key->jam_order ?></td>
                            <td>Rp <span style='float:right;'><?php echo number_format($key->nominal,0,',','.') ?></span></td>
                            <td>Rp <span style='float:right;'><?php echo number_format($key->laba,0,',','.') ?></span></td>
                            <!-- <td><?php echo $statusMap[$key->pembayaran]['message']; $statusMap[$key->pembayaran]['total'] += 1; ?></td> -->
                          </tr>
                          <?php
                          $total_nominal += $key->nominal;
                          // $total_laba += $key->laba_bersih;
                          $total_laba += $key->laba;
                          $no++;
                          endforeach;
                          ?>
                        </tbody>
                        <tfoot>
                          <tr style='color:red;'>
                            <?php if($id_modul!=1){?>
                            <td colspan="6" class="text-right">JUMLAH</td>
                            <?php } else { ?>
                            <td colspan="5" class="text-right">JUMLAH</td>
                            <?php } ?>
                            <td>Rp <span style='float:right;'><?php echo number_format($total_nominal,0,',','.') ?></span></td>
                            <td>Rp <span style='float:right;'><?php echo number_format($total_laba,0,',','.') ?></span></td>
                          </tr>
                        </tfoot>
                      </table>
                      
                     <div class="row">
                     	<!-- <?php foreach($statusMap as $total):?>
                     	<div class="col-xs-2">
	                     	<div class="alert alert-info">
	                     		<?php echo $total['message'];?><br>
	                     		<?php echo $total['total'];?>
	                     	</div>
                     	</div>
                     	<?php endforeach;?> -->
                     </div>
                      
                    </div>

<!-- 
                    <div class="row">
                      <form action="<?php echo base_url() ?>admin/laporan_retail/cetak_rekap_penjualan" method="post" class="form-horizontal" target="_blank">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="control-label no-padding-right col-md-3">Pilin Bulan</label>
                            <div class="col-md-9">
                              <select class="form-control" name="bulan" class="bulan">
                                <?php foreach ($data_bulan as $key): ?>
                                <?php if (sprintf('%02d',$key->id) == date('m')) { ?>
                                  <option selected value="<?php echo $key->id ?>"><?php echo $key->bulan ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $key->id ?>"><?php echo $key->bulan ?></option>
                                <?php } ?>
                                <?php endforeach ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="control-label no-padding-right col-md-2">Tahun</label>
                            <div class="col-md-10">
                              <select class="form-control" name="tahun" class="tahun">
                                <?php for ($i=2021; $i <= 2030; $i++) { ?>
                                <?php if ($i == date('Y')) { ?>
                                <option selected value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="control-label no-padding-right col-md-2">JENIS</label>
                            <div class="col-md-10">
                              <select class="form-control" name="jenis" class="jenis">
                                <option value="0">SEMUA</option>
                                <option value="1">PRODUKSI</option>
                                <option value="2">KONSINYASI</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <button type="submit" name="submit" value="cetak" class="btn btn-inverse btn-sm"><i class="ace-icon fa fa-print"></i> Cetak Rekap</button>
                          <button type="submit" name="submit" value="excel" class="btn btn-success btn-sm"><i class="ace-icon fa fa-file-o"></i> Excel Rekap</button>
                        </div>
                      </form>
                    </div> -->


                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->


<!-- JQUERY -->
<script>

$(document).ready(function(){
    // Mengambil nilai pembayaran dari atribut data
    var pembayaran = $("#bayar").val();
        if(pembayaran==3){
        $(".bank").removeClass("hide");
      }else{
        $(".bank").addClass("hide");
      }
    // Menampilkan nilai pembayaran di console
    // console.log("Nilai pembayaran:", pembayaranValue);
});


$("#bayar").on("change", function(){
  var val = $(this).val();
  // alert(val);
  if(val==3){
    $(".bank").removeClass("hide");
  }else{
    $(".bank").addClass("hide");
    this.form.submit();
  }

  //  alert(val);
    $('#bayar option[value="'+val+'"]').prop('selected', true);

});

  onchange="this.form.submit()"


  jQuery(function($){
      $('input[id=id-date-range-picker-1]').daterangepicker({
          'applyClass' : 'btn-sm btn-success',
          'cancelClass' : 'btn-sm btn-default',
          locale: {
            applyLabel: 'Apply',
            cancelLabel: 'Cancel',
            format: 'YYYY-MM-DD',
          },
          startDate:'<?php echo $awal_periode ?>',
          endDate:'<?php echo $akhir_periode ?>',
      },
      function(start, end, label){
          $("#awal_periode").val(start.format('YYYY-MM-DD'));
          $("#akhir_periode").val(end.format('YYYY-MM-DD'));
          $("#formPeriode").submit();
      })
      .prev().on(ace.click_event, function(){
          $(this).next().focus();
      });
  });
</script>
<!-- JQUERY -->