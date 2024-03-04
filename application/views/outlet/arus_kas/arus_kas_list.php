<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">Arus Kas</li>
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
					Arus Kas
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->

					<div class="row" style="margin-bottom: 10px">
						<div class="col-md-4">
						</div>
						<div class="col-md-4 text-center">
							<div style="margin-top: 4px" id="message">
								<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
							</div>
						</div>
						<div class="col-md-4 text-right">
						</div>
					</div>  
					<!--<div class="row" style="margin-bottom: 10px">-->
					    
    	<!--				<form>-->
    	<!--				    <div class="form-group">-->
    	<!--				        <div class="col-sm-3">-->
    	<!--				            <div class="row">-->
     <!--   					            <label>Tanggal</label>-->
     <!--   					            <input type="text" class="input-sm form-control" id="datepicker1"  value="<?=date('d-m-Y')?>" on>-->
    					                
    	<!--				            </div>-->
    	<!--				        </div>-->
    	<!--				    </div>-->
    	<!--				</form>-->
					<!--</div>-->

					 <form method="post" id="formPeriode" class="form-horizontal" action="">
						<div class="form-group">
							<div class="col-sm-6">
								<div class="row">
									<label class="control-label no-padding-right col-md-3">Periode : </label>
									<div class="col-md-9">
										<div class="input-daterange input-group">
											<input type="text" class="input-lg form-control" id="datepicker1" name="awal_periode" value="<?php echo $tgl_awal ?>" onchange="this.form.submit()" />
											<span class="input-group-addon">
												<i class="fa fa-exchange"></i>
											</span>
											<input type="text" class="input-lg form-control" id="datepicker2" name="akhir_periode" value="<?php echo $tgl_akhir ?>" onchange="this.form.submit()" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
							</div>
							
						</div>
					</form> 
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="mytable">
							<thead>
								<tr>
									<th width="80px">No</th>
									<th>Tanggal</th>
									<th>Nama Akun</th>
									<th>Keterangan</th>
									<th>Pemasukkan</th>
									<th>Pengeluaran</th>
								</tr>

								
							</thead>
							<tbody>
							<?php 
							$no=1;
							$jml_laba_masuk=0;
							$jml_beban_keluar=0;
							$jml_masuk=0;
							$jml_keluar=0;
							        foreach($penjualan as $p){?>
							            <tr>
							                <td>
							                    <?=$no++?>
							                </td>
							                <td>
							                    <?=$p->tgl_order?>
							                </td>
							                <td>
                                                -
							                </td>
							                <td>
                                               Laba Penjualan
							                </td>
							                <td>
                                                 <?=number_format($p->total)?>
							                </td>
							                <td>
							                    -
							                </td>
							            </tr>
							              <?php $jml_laba_masuk=$p->total ;?>
							        <?php 
							            
							        } 
							        
							        foreach($beban as $b){?>
							            <tr>
							                 <td>
							                    <?=$no++?>
							                </td>
							                <td>
							                    -
							                </td>
							                <td>
							                   -
							                </td>
							                <td>
							                   Beban Karyawan
							                   <?php 
							                   $nama_karyawan= $this->db->select('u.*')
							                 ->from('users u')
							                 ->where('u.id_users',$b->id_users)
							                 ->where('u.id_toko',$this->userdata->id_toko)
							                        ->get()
							                        ->row();
							                        if($nama_karyawan!=null){
							                            echo $nama_karyawan->first_name;
							                        }else{
							                            echo $b->nama;
							                        }
							                   
							                   ?>
							                </td>
							                <td>
							                   -
							                </td>
							                <td>
							                    <?=number_format($b->nominal/$b->beban_per)?>
							                </td>
							            </tr>
							        
							        <?php
							            $jml_beban_keluar+=($b->nominal/$b->beban_per);
							        }
							        
							        
							        
							        ?>
							            
							                  
							                
							        <?php
							
									foreach($kas as $k){?>
										<tr>
											<td>
												<?=$no++?>
											</td>
											<td>
												<?=$k->tgl?>
											</td>
											<td>
												<?=$k->akun?>
											</td>
											<td>
												<?=$k->ket?>
											</td>
											<?php if ($k->id_kas==1){
												$jml_masuk=$jml_masuk+=$k->nominal;
												?>
												<td>
												<?=number_format($k->nominal)?>
												</td>
												<?php }else{?>
														<td>
															-
														</td>
													<?php
													
												} ?>
											
											<?php if ($k->id_kas==2){ 
												$jml_keluar=$jml_keluar+=$k->nominal;
												?>
												<td>
												<?=number_format($k->nominal)?>
												</td>
												<?php }else{?>
														<td>
															-
														</td>
													<?php
													
												} ?>
										</tr>
										<?php 
									
										
										
										
									}
								?>
							</tbody>
							<tfoot>
								<tr>
									<th class="text-right" colspan="4">JUMLAH</th>
									<th class="text-right"><span id="jumlah_pemasukkan"></span> <?= number_format($jml_masuk+ $jml_laba_masuk)?></th>
									<th class="text-right"><span id="jumlah_pengeluaran"></span>  <?= number_format($jml_keluar+ $jml_beban_keluar)?></th>
								</tr>
								<tr>
									<th class="text-right" colspan="4">TOTAL</th>
									<th class="text-right" colspan="2"><span id="total"><?= number_format(($jml_masuk+ $jml_laba_masuk)-($jml_keluar+ $jml_beban_keluar))?></span></th>
								</tr>
							</tfoot>
						</table>
					</div>
					<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
					<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
					<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
					<!-- <script type="text/javascript">
						<?php
						$total_nominal = 0;
						$total_laba = 0;
						$data_penjualan = array();
						foreach ($content as $key) {
							if ($key->pembayaran == "1") {
								$pembayaran = "TUNAI";
							} else if ($key->pembayaran == "2") {
								$pembayaran = "KREDIT";
							} else if ($key->pembayaran == "3") {
								$pembayaran = "DEPOSIT";
							} else {
								$pembayaran = "";
							}
							$total_nominal += $key->nominal;
							$data_penjualan[] = ['id_kas' => 1, 'id_arus_kas' => "1", "tgl" => $key->tgl_order, "nm_akun" => 'Hasil Penjualan (Auto)', "ket" => '', "nominal" => number_format($key->jml_nominal * 1, 0, ',', '.'), "nominal2" => 0];
						}
						$jumlah_total_pembelian = 0;
						$data_pembelian = array();
						foreach ($content2 as $key) {
							$data_pembelian[] = ['id_kas' => 2, 'id_arus_kas' => "2", "tgl" => $key->tgl, "nm_akun" => 'Pembelian (Auto)', "ket" => $key->nama_supplier, "nominal" => 0, "nominal2" => number_format($key->total * 1, 0, ',', '.')];
							$jumlah_total_pembelian += $key->total;
						}

						?>
						$(document).ready(function() {
							$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
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
							var jumlah_pemasukkan = 0;
							var jumlah_pengeluaran = <?php echo $jumlah_total_pembelian * 1 ?>;
							var t = $("#mytable").dataTable({
								initComplete: function() {

									jumlah_pemasukkan = 0;
									//jumlah_pengeluaran = 0;
									var api = this.api();
									api.rows.add(<?php echo json_encode($data_penjualan) ?>);
									api.rows.add(<?php echo json_encode($data_pembelian) ?>).draw();
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
								paging: false,
								info: false,
								searching: false,
								processing: true,
								serverSide: true,
								ajax: {
									"url": "<?php echo base_url() ?>arus_kas/json_periode/<?php echo $tgl_awal ?>/<?php echo $tgl_akhir ?>/<?php echo $id_users ?>",
									"type": "POST"
								},
								columns: [{
										"data": "id_arus_kas",
										"orderable": false
									},
									{
										"data": "tgl"
									}, {
										"data": "nm_akun"
									}, {
										"data": "ket"
									}, {
										"data": "nominal"
									}, {
										"data": "nominal2"
									},
								],

								order: [
									[0, 'desc']
								],
								rowCallback: function(row, data, iDisplayIndex) {

									var info = this.fnPagingInfo();
									var page = info.iPage;
									var length = info.iLength;
									var index = page * length + (iDisplayIndex + 1);
									console.log(data.id_kas);
									//console.log(data.nominal);
									console.log(data.nominal2);
									$('td:eq(0)', row).html(index);
									var nominal_m = 0;
									var nominal_k = 0;
									if (data.id_kas == 1) {
										nominal_m = data.nominal.replace('.', '').replace('.', '').replace('.', '').replace('.', '').replace('.', '').replace('.', '') * 1;
										jumlah_pemasukkan += nominal_m * 1;
									}
									if (data.id_kas == 2) {
										nominal_k = data.nominal.toString().replace('.', '').replace('.', '').replace('.', '').replace('.', '').replace('.', '').replace('.', '') * 1;
										jumlah_pengeluaran += nominal_k * 1;
									}
									$('td:eq(4)', row).addClass('text-right');
									if (data['nm_akun'] != "Hasil Penjualan (Auto)" && data['nm_akun'] != "Pembelian (Auto)") {
										$('td:eq(4)', row).html(number_format(nominal_m * 1, 0, ',', '.'));
										$('td:eq(5)', row).html(number_format(nominal_k * 1, 0, ',', '.'));
									}
									$('td:eq(5)', row).addClass('text-right');
								}
							});

							$("#mytable").on('draw.dt', function() {
								$("#jumlah_pemasukkan").html(number_format(jumlah_pemasukkan * 1, 0, ',', '.'));
								$("#jumlah_pengeluaran").html(number_format(jumlah_pengeluaran * 1, 0, ',', '.'));
								var total = jumlah_pemasukkan - jumlah_pengeluaran;
								$("#total").html(number_format(total * 1, 0, ',', '.'));
							});

						});
					</script> -->

					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->