<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mig extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Tampilan_retail_model');
        $this->load->model('Pengaturan_transaksi_model');
        $this->data_login = $this->Tampilan_retail_model->cek_login();
	}

	public function index()
	{
	}

	public function jurnal_jual_to_nonppn()
	{
		$res_j = $this->db->select('j.*, a.akun')
						  ->from('jurnal_asli j')
						  ->join('akun_asli a', 'j.id_akun=a.id')
						  ->where('j.id_toko', $this->data_login['id_toko'])
						  ->where('j.id_akun', 67) // KAS BESAR
						  ->where('j.debet > 0') // HANYA DEBET
						  ->get()->result();
		foreach ($res_j as $key) {
			$row_ppn = $this->db->select('*')
								->from('jurnal_asli')
								->where('id_toko', $this->data_login['id_toko'])
								->where('kode', $key->kode)
								->where('id_akun', 160) // PPN Masukkan
								->get()->row();
			if ($row_ppn) {
				$debet_nonppn = round((100/110) * $key->debet);
				echo 'KODE : '.$key->kode.'<br>';
				echo 'AKUN : '.$key->akun.'<br>';
				echo 'DEBET : '.$key->debet.' (dengan ppn)<br>';
				echo 'DEBET : '.$debet_nonppn.' (tanpa ppn)<br>';
				echo '<hr>';

				$data_update = array(
					'debet' => $debet_nonppn,
				);
				$this->db->where('id', $key->id);
				$this->db->update('jurnal_asli', $data_update);
				$this->db->reset_query();
				$this->db->where('id', $row_ppn->id);
				$this->db->delete('jurnal_asli');
			}
		}
	}

	public function jurnal_beli_to_nonppn()
	{
		$res_j = $this->db->select('j.*, a.akun')
						  ->from('jurnal_asli j')
						  ->join('akun_asli a', 'j.id_akun=a.id')
						  ->where('j.id_toko', $this->data_login['id_toko'])
						  ->where('j.id_akun', 67) // KAS BESAR
						  ->where('j.kredit > 0') // HANYA KREDIT
						  ->get()->result();
		foreach ($res_j as $key) {
			$row_ppn = $this->db->select('*')
								->from('jurnal_asli')
								->where('id_toko', $this->data_login['id_toko'])
								->where('kode', $key->kode)
								->where('id_akun', 59) // PPN Keluaran
								->get()->row();
			if ($row_ppn) {
				$kredit_nonppn = round((100/110) * $key->kredit);
				echo 'KODE : '.$key->kode.'<br>';
				echo 'AKUN : '.$key->akun.'<br>';
				echo 'KREDIT : '.$key->kredit.' (dengan ppn)<br>';
				echo 'KREDIT : '.$kredit_nonppn.' (tanpa ppn)<br>';
				echo '<hr>';

				$data_update = array(
					'kredit' => $kredit_nonppn,
				);
				$this->db->where('id', $key->id);
				$this->db->update('jurnal_asli', $data_update);
				$this->db->reset_query();
				$this->db->where('id', $row_ppn->id);
				$this->db->delete('jurnal_asli');
			}
		}
	}

	public function hpp_pembelian()
	{
		$res_fr = $this->db->select('fr.*')
						   ->from('faktur_retail fr')
						   ->where('fr.id_toko', $this->data_login['id_toko'])
						   ->where('fr.mig', 1)
						   // ->limit(1)
						   ->get()->result();
		foreach ($res_fr as $key_fr) :
			$res_p = $this->db->select('p.*')
							  ->from('pembelian p')
							  ->where('p.id_toko', $this->data_login['id_toko'])
							  ->where('p.id_faktur', $key_fr->id_faktur)
							  ->get()->result();
			echo $key_fr->no_faktur."<br>";
			$i2 = 0;
			$total = 0;
			$total_ppn = 0;
			$total_total_ppn = 0;
			foreach ($res_p as $key_p) {
				$i2++;
				if ($key_p->mig=="1") {
					$hpp_ppn = $key_p->harga_satuan_2;
					$hpp_tanpa_ppn = (100/110) * $hpp_ppn;
				} else {
					$hpp_tanpa_ppn = $key_p->harga_satuan_2;
					$hpp_ppn = ((10/100) * $hpp_tanpa_ppn) + $hpp_tanpa_ppn;
				}
				$ppn = $hpp_ppn - $hpp_tanpa_ppn;
				$subtotal = $hpp_tanpa_ppn * $key_p->jumlah;
				$diskon = $key_p->diskon>0 ? ($key_p->diskon/100)*$subtotal : 0;
				$subtotal_diskon = $subtotal - $diskon;
				$ppn_sub = (10/100) * $subtotal_diskon;
				$subtotal_ppn = $subtotal_diskon + $ppn_sub;
				$total += $subtotal;
				$total_ppn += $ppn_sub;
				$total_total_ppn += $subtotal + $ppn_sub;
				echo $i2."__SATUAN HPP PPN : ".$hpp_ppn."<br>";
				echo $i2."__SATUAN PPN : ".$ppn."<br>";
				echo $i2."__SATUAN HPP TANPA PPN : ".$hpp_tanpa_ppn."<br>";
				echo $i2."__SUBTOTAL : ".$subtotal."<br>";
				echo $i2."__DISKON : ".$diskon."<br>";
				echo $i2."__SUBTOTAL - DISKON : ".$subtotal_diskon."<br>";
				echo $i2."__PPN : ".$ppn_sub."<br>";
				echo $i2."__SUBTOTAL - DISKON + PPN : ".$subtotal_ppn."<br>";
				echo "<br>";

				$data_update = array(
					'harga_satuan' => $hpp_tanpa_ppn,
					'total_bayar' => $subtotal_diskon,
					'ppn' => $ppn_sub,
				);
				$this->db->where('id_toko', $key_p->id_toko);
				$this->db->where('id_pembelian', $key_p->id_pembelian);
				$this->db->update('pembelian', $data_update);

			}
			echo "TOTAL : ".$total."<br>";
			echo "PPN : ".$total_ppn."<br>";
			echo "TOTAL + PPN : ".$total_total_ppn."<br>";
			echo "<hr>";

			$data_update = array(
				'total' => $total,
				'ppn_nominal' => $total_ppn,
				'total_ppn' => $total_total_ppn,
			);
			$this->db->where('id_toko', $key_fr->id_toko);
			$this->db->where('id_faktur', $key_fr->id_faktur);
			$this->db->update('faktur_retail', $data_update);
		endforeach;
	}

	public function hpp_penjualan()
	{
		$res_o = $this->db->select('o.*')
						  ->from('orders o')
						  ->where('o.id_toko', $this->data_login['id_toko'])
						  ->get()->result();
		foreach ($res_o as $key_o) :
			$extgl = explode("-", $key_o->tgl_order);
			$stgl_order = $extgl[2]."-".$extgl[1]."-".$extgl[0];
			$res_od = $this->db->select('od.*')
							   ->from('orders_detail od')
							   ->where('od.id_toko', $key_o->id_toko)
							   ->where('od.id_orders_2', $key_o->id_orders_2)
							   ->get()->result();
			echo "<b>".$key_o->no_faktur." - ".$key_o->tgl_order."</b><br>";
			$total_laba = 0;
			foreach ($res_od as $key_od) {
				$row_that_last_p = $this->db->select('p.*')
											->from('pembelian p')
											->where('p.id_toko', $key_od->id_toko)
											->where('p.id_produk', $key_od->id_produk)
											->where('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) <= ', $stgl_order)
											->order_by('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) DESC')
											->order_by('p.id_pembelian DESC')
											->get()->row();
				if (!$row_that_last_p) {
					$row_that_last_p = $this->db->select('p.*')
												->from('pembelian p')
												->where('p.id_toko', $key_od->id_toko)
												->where('p.id_produk', $key_od->id_produk)
												->order_by('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) DESC')
												->order_by('p.id_pembelian DESC')
												->get()->row();
				}
				$hpp = 0;
				if ($row_that_last_p) {
					$hpp = ($row_that_last_p->total_bayar/$row_that_last_p->jumlah);
				}
				if ($hpp < 1) {
					$hpp = $key_od->harga_satuan_2;
				}
				$hpp_sub = $hpp * $key_od->jumlah;
				$laba_sub = $key_od->subtotal - $hpp_sub;
				$total_laba += $laba_sub;
				echo "__HPP : ".$hpp." (".$key_od->harga_satuan_2.")<br>";
				echo "__HPP TOTAL : ".$hpp_sub." (x".$key_od->jumlah.")<br>";
				echo "__SUBTOTAL - DISKON : ".$key_od->subtotal."<br>";
				echo "__LABA : ".$laba_sub."<br>";
				echo "<br>";

				$data_update = array(
					'harga_satuan' => $hpp,
				);
				$this->db->where('id_toko', $key_od->id_toko);
				$this->db->where('id_orders', $key_od->id_orders);
				$this->db->update('orders_detail', $data_update);

			}
			echo "TOTAL LABA : ".$total_laba."<br>";
			echo "<hr>";

			$data_update = array(
				'laba_bersih' => $total_laba,
			);
			$this->db->where('id_toko', $key_o->id_toko);
			$this->db->where('id_orders_2', $key_o->id_orders_2);
			$this->db->update('orders', $data_update);

		endforeach;
	}

	public function orders()
	{
		set_time_limit(10000);
		//-- orders dan piutang --
		$res_orders = $this->db->select('o.*, p.id_piutang, p.jumlah_hutang, p.jumlah_bayar, p.sisa')
							   ->from('orders o')
							   ->join('piutang p', 'o.no_faktur=p.no_faktur AND o.id_toko=p.id_toko AND o.pembayaran=2', 'left')
							   ->where('o.id_toko', $this->data_login['id_toko'])
							   ->order_by('o.id_orders_2', 'asc')
							   ->get()->result();
		foreach ($res_orders as $key) {
			$res_od = $this->db->select('od.*')
							   ->from('orders_detail od')
							   ->where('od.id_toko', $key->id_toko)
							   ->where('od.id_orders_2', $key->id_orders_2)
							   ->get()->result();
			$sub_total = 0;
			$sub_diskon = 0;
			$sub_hpp = 0;
			foreach ($res_od as $key_od) {
				$subtotal = $key_od->harga_jual * $key_od->jumlah;
				$diskon = $key_od->subtotal - $subtotal;
				$sub_total += $subtotal;
				$sub_diskon += $diskon;
				$sub_hpp += $key_od->harga_satuan * $key_od->jumlah;
			}
			$subtotal_diskon = $sub_total + $sub_diskon;
			$subtotal_ppn = $subtotal_diskon + $key->ppn_nominal;
			echo $key->no_faktur."<br>";
			echo $key->tgl_order." ".$key->jam_order."<br>";
			echo "__SUBTOTAL : ".$sub_total."<br>";
			echo "__DISKON : ".$diskon."<br>";
			echo "__SUBTOTAL + DISKON : ".$subtotal_diskon."<br>";
			echo "__PPN_NOMINAL : ".$key->ppn_nominal."<br>";
			echo "__SUBTOTAL + DISKON + PPN : ".$subtotal_ppn."<br>";
			echo "<br>";
			echo "---------- PERSEDIAAN ----------<br>";
			echo "__TOTAL_HPP : ".$sub_hpp."<br>";

			$this->Pengaturan_transaksi_model->tgl = $key->tgl_order;
			$this->Pengaturan_transaksi_model->nofaktur = $key->no_faktur;
			$this->Pengaturan_transaksi_model->idproses = $key->id_orders_2;

			if ($key->pembayaran == "2") {
				$bayar_hutang = $key->jumlah_bayar;
				if ($key->jumlah_bayar == $key->jumlah_hutang) {
					$bayar_hutang = $subtotal_ppn;
				}
				$data_update = array(
					'jumlah_hutang' => $subtotal_ppn,
					'jumlah_bayar' => $bayar_hutang,
					'sisa' => $subtotal_ppn - $bayar_hutang,
				);
				$this->db->where('id_toko', $key->id_toko);
				$this->db->where('id_piutang', $key->id_piutang);
				$this->db->update('piutang', $data_update);
				echo "<br>";
				echo "---------- PIUTANG ----------<br>";
				echo "__NOMINAL : ".$key->jumlah_hutang."<br>";
				echo "__BAYAR : ".$key->jumlah_bayar."<br>";
				echo "__SISA : ".$key->sisa."<br>";

				$this->Pengaturan_transaksi_model->gen_kode = "";
				$this->Pengaturan_transaksi_model->kodejurnal = "PENJUALAN-KREDIT";
				$this->Pengaturan_transaksi_model->idpiutang = $key->id_piutang;
				$this->Pengaturan_transaksi_model->proses_debet("1.01.02.01", $subtotal_ppn);
				$this->Pengaturan_transaksi_model->proses_debet("4.03", $sub_hpp);
				$this->Pengaturan_transaksi_model->proses_debet("1.01.03.05", $sub_diskon*-1);
				$this->Pengaturan_transaksi_model->proses_kredit("3.03.01", $sub_total);
				$this->Pengaturan_transaksi_model->proses_kredit("1.01.04", $sub_hpp);
				$this->Pengaturan_transaksi_model->proses_kredit("1.01.02.02", $key->ppn_nominal);

			} else {

				$this->Pengaturan_transaksi_model->gen_kode = "";
				$this->Pengaturan_transaksi_model->kodejurnal = "PENJUALAN-TUNAI";
				$this->Pengaturan_transaksi_model->idpiutang = "";
				$this->Pengaturan_transaksi_model->proses_debet("1.01.03.02", $subtotal_ppn);
				$this->Pengaturan_transaksi_model->proses_debet("4.03", $sub_hpp);
				$this->Pengaturan_transaksi_model->proses_debet("1.01.03.05", $sub_diskon*-1);
				$this->Pengaturan_transaksi_model->proses_kredit("3.03.01", $sub_total);
				$this->Pengaturan_transaksi_model->proses_kredit("1.01.04", $sub_hpp);
				$this->Pengaturan_transaksi_model->proses_kredit("1.01.02.02", $key->ppn_nominal);
			}
			echo "<hr>";
		}
	}

	public function piutang_bayar()
	{
		set_time_limit(10000);
		$res_piutang = $this->db->select('p.*')
								->from('piutang p')
								->where('p.id_toko', $this->data_login['id_toko'])
								->where('p.jumlah_bayar > 0')
								->order_by('p.id_piutang', 'asc')
								->get()->result();
		foreach ($res_piutang as $key) :
			$res_pb = $this->db->select('pb.*')
							   ->from('piutang_bayar pb')
							   ->where('pb.id_toko', $key->id_toko)
							   ->where('pb.id_piutang', $key->id_piutang)
							   ->get()->result();
			if (count($res_pb) == 0) {
				$data_insert = array(
					'id_toko' => $key->id_toko,
					'id_piutang' => $key->id_piutang,
					'tgl' => $key->tanggal,
					'bayar' => $key->jumlah_bayar,
					'sisa' => $key->jumlah_hutang - $key->jumlah_bayar,
				);
				$this->db->insert('piutang_bayar', $data_insert);

				$this->Pengaturan_transaksi_model->tgl = $key->tanggal;
				$this->Pengaturan_transaksi_model->nofaktur = $key->no_faktur;
				$this->Pengaturan_transaksi_model->idproses = $key->id_piutang;
				$this->Pengaturan_transaksi_model->idpiutang = $key->id_piutang;
				$this->Pengaturan_transaksi_model->gen_kode = "";
				$this->Pengaturan_transaksi_model->kodejurnal = "PIUTANG-BAYAR";
				$this->Pengaturan_transaksi_model->proses_debet("1.01.03.02", $key->jumlah_bayar);
				$this->Pengaturan_transaksi_model->proses_kredit("1.01.02.01", $key->jumlah_bayar);
				
			}
			echo $key->no_faktur."<br>";
			echo "__TGL : ".$key->tanggal." ";
			echo "__JATUH TEMPO : ".$key->deadline."<br>";
			echo "__HUTANG : ".$key->jumlah_hutang."<br>";
			echo "__BAYAR : ".$key->jumlah_bayar."<br>";
			echo "<hr>";
		endforeach;
	}

	public function pembelian()
	{
		set_time_limit(10000);
		$res_fr = $this->db->select('fr.*, h.hutang')
						   ->from('faktur_retail fr')
						   ->join('hutang h', 'fr.id_faktur=h.id_faktur AND fr.id_toko=h.id_toko', 'left')
						   ->where('fr.id_toko', $this->data_login['id_toko'])
						   ->get()->result();
		foreach ($res_fr as $key) :
			$res_pembelian = $this->db->select('p.*')
									  ->from('pembelian p')
									  ->where('p.id_toko', $key->id_toko)
									  ->where('p.id_faktur', $key->id_faktur)
									  ->order_by('p.id_pembelian', 'asc')
									  ->get()->result();
			$t_subtotal = 0;
			$t_diskon = 0;
			$t_ppn = 0;
			$t_subtotal_ppn = 0;
			foreach ($res_pembelian as $key_p) :
				$subtotal = $key_p->harga_satuan * $key_p->jumlah;
				$diskon = $key_p->total_bayar - $subtotal;
				$subtotal_diskon = $subtotal - $diskon;
				$ppn = (10/100) * $subtotal_diskon;
				$subtotal_ppn = $subtotal_diskon + $ppn;

				$t_subtotal += $subtotal;
				$t_diskon += $diskon;
				$t_ppn += $ppn;
				$t_subtotal_ppn += $subtotal_ppn;
			endforeach;
			echo $key->no_faktur."<br>";
			echo $key->tgl."<br>";
			echo "__SUBTOTAL : ".$t_subtotal."<br>";
			echo "__DISKON : ".$t_diskon."<br>";
			echo "__PPN : ".$t_ppn."<br>";
			echo "__SUBTOTAL - DISKON + PPN : ".$t_subtotal_ppn."<br>";
			echo "<hr>";

			$this->Pengaturan_transaksi_model->gen_kode = "";
			$this->Pengaturan_transaksi_model->tgl = $key->tgl;
			$this->Pengaturan_transaksi_model->nofaktur = $key->no_faktur;
			$this->Pengaturan_transaksi_model->idproses = $key->id_faktur;
			$this->Pengaturan_transaksi_model->kodejurnal = "PEMBELIAN-TUNAI";
			$this->Pengaturan_transaksi_model->proses_debet("1.01.04", $t_subtotal);
			$this->Pengaturan_transaksi_model->proses_debet("2.04", $t_ppn);
			$this->Pengaturan_transaksi_model->proses_kredit("1.01.03.02", $t_subtotal_ppn);
			$this->Pengaturan_transaksi_model->proses_kredit("1.01.03.05", $t_diskon);

		endforeach;
	}

	public function laporan_hpp($tahun = 2019)
	{
		$res_produk = $this->db->select('pr.*')
							   ->from('produk_retail pr')
							   ->where('pr.id_toko', $this->data_login['id_toko'])
							   ->order_by('pr.barcode', 'asc')
							   ->order_by('pr.nama_produk', 'asc')
							   ->get()->result();
		$html_th = '';
		for ($i = 1; $i <= 12; $i++) {
			$html_th .= '<th>'.sprintf('%02d', $i).'-'.$tahun.'</th>';
		}
		$tahun_lalu = $tahun-1;
		echo '
		<h1>HPP TAHUN '.$tahun.'</h1>
		<table border="1">
			<tr>
				<th>No</th>
				<th>Barcode</th>
				<th>Produk</th>
				<th style="background-color:yellow;">'.$tahun_lalu.'</th>
				'.$html_th.'
			</tr>';
		$no = 1;
		foreach ($res_produk as $key_p) :
			$row_last_pembelian = $this->db->select('p.*')
										   ->from('pembelian p')
										   ->where('p.id_toko', $key_p->id_toko)
										   ->where('p.id_produk', $key_p->id_produk_2)
										   ->where('SUBSTRING(p.tgl_masuk,7,4) =', $tahun)
										   ->order_by('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) DESC')
										   ->order_by('p.id_pembelian', 'desc')
										   ->get()->row();
			$hpp_last = 0;
			if ($row_last_pembelian) {
				$hpp_last = $row_last_pembelian->harga_satuan;
			}
			$html_td = '';
			for ($i = 1; $i <= 12; $i++) {
				$row_pembelian = $this->db->select('p.*')
											   ->from('pembelian p')
											   ->where('p.id_toko', $key_p->id_toko)
											   ->where('p.id_produk', $key_p->id_produk_2)
											   ->where('SUBSTRING(p.tgl_masuk,4,2) =', sprintf('%02d', $i))
											   ->where('SUBSTRING(p.tgl_masuk,7,4) =', $tahun)
											   ->order_by('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) DESC')
											   ->order_by('p.id_pembelian', 'desc')
											   ->get()->row();
				$hpp = 0;
				if ($row_pembelian) {
					$hpp = $row_pembelian->harga_satuan;
				}
				$html_td .= '<td>'.$hpp.'</td>';
			}
			echo '<tr>
				<td>'.$no.'</td>
				<td>'.$key_p->barcode.'</td>
				<td>'.$key_p->nama_produk.'</td>
				<td style="background-color:yellow;">'.$hpp_last.'</td>
				'.$html_td.'
			</tr>';
			$no++; 
		endforeach;
		echo '</table>';
	}

	public function laporan_beli()
	{
		$res_fr = $this->db->select('fr.*, h.hutang')
						   ->from('faktur_retail fr')
						   ->join('hutang h', 'fr.id_faktur=h.id_faktur AND fr.id_toko=h.id_toko', 'left')
						   ->where('fr.id_toko', $this->data_login['id_toko'])
						   ->get()->result();
		$no = 0;
		echo '<table border="1">';
		echo '<tr>
			<th>No</th>
			<th>No Faktur</th>
			<th>Tgl</th>
			<th>Barcode</th>
			<th>Nama Produk</th>
			<th>Kategori</th>
			<th>Harga Satuan</th>
			<th>Jumlah</th>
			<th>Diskon</th>
			<th>Subtotal</th>
			<th>PPN(10%)</th>
		</tr>';
		foreach ($res_fr as $key_fr):
			$res_pembelian = $this->db->select('p.*, pr.barcode, pr.nama_produk, kp.nama_kategori')
									  ->from('pembelian p')
									  ->join('produk_retail pr', 'p.id_produk=pr.id_produk_2 AND p.id_toko=pr.id_toko')
									  ->join('kategori_produk kp', 'pr.id_kategori=kp.id_kategori_2 AND pr.id_toko=kp.id_toko')
									  ->where('p.id_toko', $key_fr->id_toko)
									  ->where('p.id_faktur', $key_fr->id_faktur)
									  ->order_by('p.id_pembelian', 'asc')
									  ->get()->result();
			foreach ($res_pembelian as $key_p) :
				$no++;
				echo '<tr>
					<td>'.$no.'</td>
					<td>'.$key_fr->no_faktur.'</td>
					<td>'.$key_fr->tgl.'</td>
					<td>'.$key_p->barcode.'</td>
					<td>'.$key_p->nama_produk.'</td>
					<td>'.$key_p->nama_kategori.'</td>
					<td>'.$key_p->harga_satuan.'</td>
					<td>'.$key_p->jumlah.'</td>
					<td>'.$key_p->diskon.' %</td>
					<td>'.$key_p->total_bayar.'</td>
					<td>'.$key_p->ppn.'</td>
				</tr>';
			endforeach;
		endforeach;
		echo '</table>';
	}

}

/* End of file Mig.php */
/* Location: ./application/controllers/Mig.php */