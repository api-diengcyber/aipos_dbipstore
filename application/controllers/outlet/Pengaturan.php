<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
		$this->models('Pengaturan_opsi_model');
	}

	public function index()
	{
		redirect(site_url());
	}

	public function lain_lain() {
		$row_ucapan = $this->db->where('id_toko', $this->userdata->id_toko)->get('ucapan')->row();
		$ucapan = 'Terimakasih dan Selamat Belanja Kembali';
		if (!empty($row_ucapan->ucapan)) {
			$ucapan = $row_ucapan->ucapan;
		}
		$bg_kartu = "";
		// $row_t = $this->db->where('id_toko', $this->userdata->id_toko)->get('tampilan')->row();
		// if ($row_t) {
		// 	$bg_kartu = $row_t->bg_kartu;
		// }
		$data['active_lain_lain'] = 'active';
		$data['opsi_stok']    = $this->Pengaturan_opsi_model->get_opsi_stok($this->userdata->id_toko);
		$data['opsi_diskon']  = $this->Pengaturan_opsi_model->get_opsi_diskon($this->userdata->id_toko);
		$data['opsi_pilihan'] = $this->Pengaturan_opsi_model->get_opsi_pilihan($this->userdata->id_toko);
		$data['opsi_tproduk'] = $this->Pengaturan_opsi_model->get_opsi_tProduk($this->userdata->id_toko);
		$data['opsi_popup'] = $this->Pengaturan_opsi_model->get_opsi_popup($this->userdata->id_toko);
		// $data['opsi_rekomendasi'] = $this->Pengaturan_opsi_model->get_opsi_rekomendasi($this->userdata->id_toko);
		$data['bg_kartu'] = $bg_kartu;
		$data['ucapan'] = $ucapan;
		$this->view('produk/opsi_lain_lain', $data);
	}
	
	public function opsi_stok_change(){
		$opsi = $this->input->post('opsi');
		$data = array('opsi'=>$opsi);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_opsi', 1);
		$this->db->update('opsi', $data);
	}
	public function opsi_diskon_change(){
		$opsi = $this->input->post('opsi');
		$data = array('opsi'=>$opsi);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_opsi', 2);
		$this->db->update('opsi', $data);
	}
	public function opsi_pilihan_change(){
		$opsi = $this->input->post('opsi');
		$data = array('opsi'=>$opsi);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_opsi', 3);
		$this->db->update('opsi', $data);
	}
	public function opsi_tproduk_change(){
		$opsi = $this->input->post('opsi');
		$data = array('opsi'=>$opsi);
		$this->db->where('id_toko', $this->userdata->id_toko);
		$this->db->where('id_opsi', 4);
		$this->db->update('opsi', $data);
	}
	public function opsi_popup_change(){
		$opsi = $this->input->post('opsi');
		$row = $this->db->select('*')
						->from('opsi')
						->where('id_toko', $this->userdata->id_toko)
						->where('id_opsi', 5)
						->get()->row();
		$data = array(
			'id_toko' => $this->userdata->id_toko,
			'id_opsi' => 5,
			'opsi' => $opsi
		);
		if ($row) {
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_opsi', 5);
			$this->db->update('opsi', $data);
		} else {
			$this->db->insert('opsi', $data);	
		}
	}
	public function opsi_rekomendasi_change(){
		$opsi = $this->input->post('opsi');
		$row = $this->db->select('*')
						->from('opsi')
						->where('id_toko', $this->userdata->id_toko)
						->where('id_opsi', 7)
						->get()->row();
		$data = array(
			'id_toko' => $this->userdata->id_toko,
			'id_opsi' => 7,
			'opsi' => $opsi
		);
		if ($row) {
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_opsi', 7);
			$this->db->update('opsi', $data);
		} else {
			$this->db->insert('opsi', $data);	
		}
	}
	public function ucapan_change(){
		$ucapan = $this->input->post('ucapan');
		//cek apakah sudah ada / belum
		$row_cek = $this->db->where('id_toko', $this->userdata->id_toko)->get('ucapan')->row();
		if(!empty($row_cek)){
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->update('ucapan', array('ucapan'=>$ucapan));
		}else{
			$this->db->insert('ucapan', array('id_toko'=>$this->userdata->id_toko,'ucapan'=>$ucapan));
		}
	}
	public function tanggal_change()
	{
		$tgl = $this->input->post('tgl');
		$jam = $this->input->post('jam');
		$extgl = explode('-', $tgl);
		$thn = $extgl[2];
		$bln = $extgl[1];
		$hr = $extgl[0];
		shell_exec("sudo date --set ".$thn."-".$bln."-".$hr."");
		shell_exec("sudo date --set ".$jam."");
		redirect(site_url('retail/lain_lain'),'refresh');
	}

	public function simpan_bg_kartu()
	{
		$config['upload_path'] = 'assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '2000';
		$config['max_width']  = '2724';
		$config['max_height']  = '2768';
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('bg_kartu')) {
			$data = $this->upload->data();
			$data_update = array(
				'bg_kartu' => $data['file_name']
			);
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->update('tampilan', $data_update);
		} else {
			$data = $this->upload->display_errors();
		}
        redirect(site_url('retail/lain_lain'),'refresh');
	}


	public function action_simpan_stok_produk()
	{
		$id_produk = $this->input->post('id_produk', true);
		$tambah_stok = $this->input->post('tambah_stok', true);
		$harga_beli = str_replace(".","",$this->input->post('harga_beli', true));
		$row = $this->Produk_retail_model->get_by_id($id_produk, $this->userdata->id_toko);
		$data_json = array();
		$data_json['stok'] = "";
		if($row){
			$row_stok = $this->db->select('*')
								 ->from('stok_produk')
								 ->where('id_toko', $this->userdata->id_toko)
								 ->where('id_produk', $id_produk)
								 ->get()->row();
			$row_beli = $this->db->select('*')
								 ->from('pembelian')
								 ->where('id_toko', $this->userdata->id_toko)
								 ->where('id_produk', $id_produk)
								 ->get()->row();
			$stok_baru = $row_stok->stok + $tambah_stok;
			if($stok_baru >= 0){
				$stok_baru = $stok_baru;
			} else {
				$stok_baru = 0;
			}
			$data_stok = array(
				'stok' => $stok_baru,
			);
			$this->Stok_produk_model->update($row_stok->id, $data_stok);
			$data_beli = array(
				'harga_satuan' => $harga_beli,
				'jumlah' => $stok_baru,
				'total_bayar' => $harga_beli * $stok_baru,
			);
			$this->Pembelian_retail_model->update($row_beli->id_pembelian, $data_beli);
			$data_json['stok'] = $stok_baru;
		}
		echo json_encode($data_json);
	}

}

/* End of file Retail.php */
/* Location: ./application/controllers/Retail.php */