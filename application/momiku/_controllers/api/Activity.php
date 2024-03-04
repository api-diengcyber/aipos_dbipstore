<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Xjson');
	}

	public function save_activity()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();

		$user_id = $this->xjson->post("user_id");

		$tanggal = $this->xjson->post("tanggal");
		$exp = explode('-',$tanggal);
		$tanggal = $exp[0].'-'.sprintf('%02d',$exp[1]).'-'.$exp[2];

		$leads = $this->xjson->post("leads");
		$totalan = $this->xjson->post("totalan");
		$closing = $this->xjson->post("closing");
		$hbWA = $this->xjson->post("hbWA");
		$gcWA = $this->xjson->post("gcWA");
		$hbShopee = $this->xjson->post("hbShopee");
		$gcShopee = $this->xjson->post("gcShopee");
		$hbTokopedia = $this->xjson->post("hbTokopedia");
		$gcTokopedia = $this->xjson->post("gcTokopedia");
		$hbCod = $this->xjson->post("hbCod");
		$gcCod = $this->xjson->post("gcCod");

		$data = array(
			"id_cs"=>$user_id,
			"tanggal"=>$tanggal,
			"leads"=>$leads,
			"totalan"=>$totalan,
			"closing"=>$closing,
		);

		$detail = (object)array(
			"hbWA"=>$hbWA,
			"gcWA"=>$gcWA,
			"hbShopee"=>$hbShopee,
			"gcShopee"=>$gcShopee,
			"hbTokopedia"=>$hbTokopedia,
			"gcTokopedia"=>$gcTokopedia,
			"hbCod"=>$hbCod,
			"gcCod"=>$gcCod
		);

		$result = $this->_save_activity($data,$detail);

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $result);
		$this->xjson->result();
	}

	public function get_riwayat()
	{
		$this->load->model('Sales_aktivitas_model');

		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();

		$this->load->model('Sales_aktivitas_model');

		$user_id = $this->xjson->post('user_id');
		$result = $this->Sales_aktivitas_model->get_data_aktivitas($user_id);

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $result);
		$this->xjson->result();
	}

	public function get_peringkat()
	{
		$this->load->model('Sales_aktivitas_model');

		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();

		$this->load->model('Sales_aktivitas_model');

		$user_id = $this->xjson->post('user_id');
		$result = $this->Sales_aktivitas_model->get_peringkat_aktivitas($user_id);

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $result);
		$this->xjson->result();
	}

	public function testing_data()
	{
		// $this->output->enable_profiler(TRUE);
		$this->load->model('Sales_aktivitas_model');
		$result = $this->Sales_aktivitas_model->get_data_aktivitas(2);
		echo "<pre>";
		print_r ($result);
		echo "</pre>";
	}

	private function _save_activity($data,$detail)
	{
		//insert laporan activity
		
		$cek_row = $this->db->where("id_cs",$data['id_cs'])->where("tanggal",$data['tanggal'])->get("laporan_aktivitas")->row();
		
		if(empty($cek_row)){
    		$this->db->insert('laporan_aktivitas', $data);
    		$id = $this->db->insert_id();
    
    		if(!empty($detail->hbWA)){
    			$data = array(
    				"media"=>1,
    				"id_laporan"=>$id,
    				"id_produk"=>1,
    				"jumlah"=>$detail->hbWA,
    			);
    			$this->db->insert('laporan_aktivitas_detail', $data);
    		}
    		if(!empty($detail->gcWA)){
    			$data = array(
    				"media"=>1,
    				"id_laporan"=>$id,
    				"id_produk"=>2,
    				"jumlah"=>$detail->gcWA,
    			);
    			$this->db->insert('laporan_aktivitas_detail', $data);
    		}
    		if(!empty($detail->hbShopee)){
    			$data = array(
    				"media"=>2,
    				"id_laporan"=>$id,
    				"id_produk"=>1,
    				"jumlah"=>$detail->hbShopee,
    			);
    			$this->db->insert('laporan_aktivitas_detail', $data);
    		}
    		if(!empty($detail->gcShopee)){
    			$data = array(
    				"media"=>2,
    				"id_laporan"=>$id,
    				"id_produk"=>2,
    				"jumlah"=>$detail->gcShopee,
    			);
    			$this->db->insert('laporan_aktivitas_detail', $data);
    		}
    		if(!empty($detail->hbTokopedia)){
    			$data = array(
    				"media"=>3,
    				"id_laporan"=>$id,
    				"id_produk"=>1,
    				"jumlah"=>$detail->hbTokopedia,
    			);
    			$this->db->insert('laporan_aktivitas_detail', $data);
    		}
    		if(!empty($detail->gcTokopedia)){
    			$data = array(
    				"media"=>3,
    				"id_laporan"=>$id,
    				"id_produk"=>2,
    				"jumlah"=>$detail->gcTokopedia,
    			);
    			$this->db->insert('laporan_aktivitas_detail', $data);
    		}
    		if(!empty($detail->hbCod)){
    			$data = array(
    				"media"=>4,
    				"id_laporan"=>$id,
    				"id_produk"=>1,
    				"jumlah"=>$detail->hbCod,
    			);
    			$this->db->insert('laporan_aktivitas_detail', $data);
    		}
    		if(!empty($detail->gcCod)){
    			$data = array(
    				"media"=>4,
    				"id_laporan"=>$id,
    				"id_produk"=>2,
    				"jumlah"=>$detail->gcCod,
    			);
    			$this->db->insert('laporan_aktivitas_detail', $data);
    		}
		} else {
		    return "Tidak disimpan data sudah ada.";
		}

	}

}

/* End of file Activity.php */
/* Location: ./application/controllers/api/Activity.php */