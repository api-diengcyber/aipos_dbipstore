<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="#">Home</a>
			</li>
			<li>Manajemen Karyawan</li>
			<li class="active">Gaji Pegawai</li>
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
			Gaji Pegawai
			</h1>
		</div><!-- /.page-header -->
		<?php if(!empty($message)){?>
		<div class="alert alert-info"><?php echo $message;?></div>
		<?php } ?>
			<div class="row">
				<div class="col-xs-12" style="margin-bottom:20px">
					<div class="row">
						<div class="col-xs-6">
						<form action="" method="post">
						<div class="row">
							<div class="col-md-6">
								<label>Dari</label>
								<input type="text" name="from" value="<?php echo $data_gaji->from; ?>" id="datepicker1" class="form-control">
							</div>
							<div class="col-md-6">
								<label>Sampai</label>
								<input type="text" name="to" value="<?php echo $data_gaji->to; ?>" id="datepicker1" class="form-control">
							</div>
						</div>
						</div>
						<div class="col-xs-6">
							<div class="row">
								<div class="col-md-4">
									<label>Gaji Perjam</label>
									<input type="text" value="<?php echo $data_gaji->gaji_perjam;?>" name="gaji_perjam" id="">
								</div>
								<div class="col-md-4">
									<label>Jam Lembur</label>
									<input type="text" value="<?php echo $data_gaji->jam_lembur;?>" name="jam_lembur" id="">
								</div>
								<div class="col-md-4">
									<label>&nbsp;</label><br>
									<button class="btn btn-primary btn-block btn-sm">Proses</button>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<style>
					.list-users {
					margin-bottom: 3px;
					}
					</style>

					<div class="row">
						<div class="col-xs-12">
							<form action="<?php echo base_url("produksi/gaji_pegawai/simpan");?>" method="post">
							<input type="hidden" name="from" value="<?php echo $from;?>">
							<input type="hidden" name="to" value="<?php echo $to;?>">
							<input type="hidden" name="gaji_perjam" value="<?php echo $data_gaji->gaji_perjam;?>">
							<input type="hidden" name="jam_lembur" value="<?php echo $data_gaji->jam_lembur;?>">

							<table class="table table-bordered table-striped table-hover">
								<thead>
									<th width="20">No</th>
									<th width="140">Nama Pegawai</th>
									<th>Jam Kerja</th>
									<th width="100">Total Jam</th>
									<th width="50">Total Lembur</th>
									<th width="100">Gaji</th>
									<th width="150">Keterangan</th>
								</thead>
								<tbody>
									<?php $no = 1;foreach ($data_gaji->data as $karyawan) { ?>
									<tr>
										<td>
											<?php echo $no;?>
											<input type="hidden" name="id_users[]" value="<?php echo $karyawan->id_users;?>">
										</td>
										<td>
											<?php echo $karyawan->nama_pegawai;?>
											<input type="hidden" name="nama[]" value="<?php echo $karyawan->nama_pegawai;?>">
										</td>
										<td>
											<?php echo $karyawan->jam_kerja; ?>
											<input type="hidden" name="jam_kerja[]" value="<?php echo $karyawan->jam_kerja;?>">
										</td>
										<td>
											<?php echo $karyawan->total_jam;?>
											<input type="hidden" name="total_jam[]" value="<?php echo $karyawan->total_jam;?>">
										</td>
										<td>
											<?php echo $karyawan->total_lembur;?>
											<input type="hidden" name="total_lembur[]" value="<?php echo $karyawan->total_lembur;?>">
										</td>
										<td>
											<input type="text" name="gaji[]" id="" value="<?php echo $karyawan->gaji;?>">
										</td>
										<td><input type="text" name="keterangan[]" value="<?php echo $karyawan->keterangan;?>" id=""></td>
									</tr>
									<?php $no++; }  ?>
								</tbody>
							</table>
							<div class="pull-right">
								<input type="text" name="judul" id="" required class="form-control" placeholder="Masukan Judul atau Tanggal"><br>
								<button class="btn btn-primary btn-sm" style="padding-left:100px;padding-right:100px">Simpan</button>
							</div>
							</form>
						</div>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<script>
	$(document).ready(function(){

	});
</script>