<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">Service</li>
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
							<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar"
								autocomplete="off" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar"
								autocomplete="off" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
								id="ace-settings-breadcrumbs" autocomplete="off" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl"
								autocomplete="off" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
								id="ace-settings-add-container" autocomplete="off" />
							<label class="lbl" for="ace-settings-add-container">
								Inside
								<b>.container</b>
							</label>
						</div>
					</div><!-- /.pull-left -->

					<div class="pull-left width-50">
						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover"
								autocomplete="off" />
							<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact"
								autocomplete="off" />
							<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight"
								autocomplete="off" />
							<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
						</div>
					</div><!-- /.pull-left -->
				</div><!-- /.ace-settings-box -->
			</div><!-- /.ace-settings-container -->

			<div class="page-header">
				<h1>
					Service order
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->

					<div class="row" style="margin-bottom: 10px">
						<div class="col-md-4">
							<a href="<?= base_url('admin/service_order/create') ?>" class="btn btn-primary">Tambah</a>
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
					<!--   					            <input type="text" class="input-sm form-control" id="datepicker1"  value="<?= date('d-m-Y') ?>" on>-->

					<!--				            </div>-->
					<!--				        </div>-->
					<!--				    </div>-->
					<!--				</form>-->
					<!--</div>-->

					<!-- <form method="post" id="formPeriode" class="form-horizontal" action="">
						<div class="form-group">
							<div class="col-sm-6">
								<div class="row">
									<label class="control-label no-padding-right col-md-3">Periode : </label>
									<div class="col-md-9">
										<div class="input-daterange input-group">
											<input type="text" class="input-lg form-control" id="datepicker1"
												name="awal_periode" value="<?php echo $tgl_awal ?>"
												onchange="this.form.submit()" />
											<span class="input-group-addon">
												<i class="fa fa-exchange"></i>
											</span>
											<input type="text" class="input-lg form-control" id="datepicker2"
												name="akhir_periode" value="<?php echo $tgl_akhir ?>"
												onchange="this.form.submit()" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
							</div>

						</div>
					</form> -->
					<div class="table-responsive">
						<table class="table table-bordered table-striped" id="mytable">
							<thead>
								<tr>
									<th width="7px">No</th>
									<th>No Faktur</th>
									<th>Service</th>
									<th>Tgl Masuk</th>
									<th>Nama Client</th>

									<th>No Telp</th>
									<th>Mekanik</th>
									<th>Status</th>
									<th>Biaya Service</th>
									<th>Keterangan</th>
									<th class="text-center">Aksi</th>
								</tr>


							</thead>
							<tbody>
								<?php
								$no = 1;
								$jml = 0;
								foreach ($service as $s) { ?>
									<tr>
										<td>
											<?= $no++ ?>
										</td>
										<td>
											<?= $s->no_faktur_service ?>
										</td>
										<td>
											<?= $s->nama_service ?>
										</td>
										<td>
											<?= $s->tgl_masuk ?>
										</td>
										<td>
											<?= $s->nama ?>
										</td>
										<td>
											<?= $s->alamat ?>
										</td>

										<td>
											<?= $s->nama_mekanik ?>
										</td>
										<td>
											<?php
											if ($s->status == 1) {
												echo "Belum Selesai";
											} else {
												echo "Selesai";
											}
											?>
										</td>
										<td>
											Rp.
											<?= number_format($s->harga) ?>
											<p>(Belum Termasuk Sparepart)</p>
										</td>

										<td>
											<?= $s->keterangan ?>
										</td>
										<td class="text-center">
											<a href="<?= base_url('admin/service_order/detail/' . $s->id) ?>"
												class="btn btn-sm btn-success">
												<i class="fa fa-check"></i>
											</a>
											<?php
											if ($s->status == 1) {
												?>
												<a onclick="return(confirm('Selesaikan Service?'))"
													href="<?= base_url('admin/service_order/update_status/' . $s->id) ?>"
													class="btn btn-sm btn-primary" target="_blank">
													<i class="fa fa-check"> Selesai</i>
												</a>
												<?php
											} else {
												?>

												<?php

											}
											?>

										</td>


									</tr>
									<?php
									// $jml_penjualan_masuk += $p->total_bayar;
									// $jml_laba_masuk += $p->total_laba;
								} ?>


							</tbody>

						</table>
					</div>
					<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
					<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
					<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->