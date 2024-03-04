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
		$tanggal = sprintf('%02d',$exp[0]).'-'.sprintf('%02d',$exp[1]).'-'.$exp[2];

		$leads = $this->xjson->post("leads");
		$totalan = $this->xjson->post("totalan");
		$closing = $this->xjson->post("closing");
		$detail = $this->input->post('produk');
	
		
		$id = $this->xjson->post("id");

		$data = array(
			"id_cs"=>$user_id,
			"tanggal"=>$tanggal,
			"leads"=>$leads,
			"totalan"=>$totalan,
			"closing"=>0,
		);

		if(empty($id)){
			$result = $this->_save_activity($data,$detail);
		}else{
			$result = $this->_update_activity($id,$data,$detail);
		}

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $result);
		$this->xjson->result();
	}
	
    public function get_available_date()
    {
        $start_date = 1;
        $end_date = date('t');
        
        $tanggalMap = [];
        for($i = $start_date;$i<=$end_date;$i++){
            $tanggalMap[] = sprintf('%02d',$i).date('-m-Y');
        }
        
    	$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		
		$result = $tanggalMap;
		
		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $result);
		$this->xjson->result();
        
    }
    
	public function get_riwayat()
	{
		$this->load->model('Sales_aktivitas_model');

		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
// 		$this->xjson->keyc();

		$user_id = $this->xjson->post('user_id');
		$media = $this->db->get('pil_media')->result();
		$result = $this->Sales_aktivitas_model->get_data_aktivitas($media,$user_id);

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $result);
		$this->xjson->result();
	}

	function get_by_id()
	{
		$this->load->model('Sales_aktivitas_model');

		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();

		$user_id = $this->xjson->post('user_id');
		$id = $this->xjson->post('id');
		$result = $this->_get_by_id($user_id,$id);

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $result);
		$this->xjson->result();
	}
	
	function test()
	{
	    $this->load->model('Sales_aktivitas_model');
	    $this->output->enable_profiler(TRUE);
	    $result = $this->Sales_aktivitas_model->get_data_aktivitas(8);
	    echo '<pre>';
	    print_r($result);
	    echo '</pre>';
	}

	function _get_by_id($id_users,$id)
	{
        $this->db->select('*');
        $this->db->from('laporan_aktivitas la'); 
        $this->db->where('la.id', $id);
        $aktivitas = $this->db->get()->row();

        $pil_media = $this->db->get('pil_media')->result();
        $n=0;
        foreach ($pil_media as $media) {
        	$this->db->select('lad.id,pr.nama_produk,lad.media,lad.jumlah as qty,lad.id_produk as id_produk_2');
        	$this->db->from('laporan_aktivitas_detail lad');
       		$this->db->where('lad.media', $media->id);
       		$this->db->where('lad.id_laporan', $id);
       		$this->db->join('produk_retail pr', 'pr.id_produk_2 = lad.id_produk');
       		$aktivitas->detail[$n]['id'] = $media->id;
       		$aktivitas->detail[$n]['produk'] = $this->db->get()->result();
       		$n++;
       	}     	 	 
       	return $aktivitas;
    }

	function get_peringkat()
	{
		$this->load->model('Sales_aktivitas_model');

		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		// $this->xjson->keyc();

		$this->load->model('Sales_aktivitas_model');

		$user_id = $this->xjson->post('user_id');
		$limit = $this->xjson->post('limit');
		$rs = $this->_get_peringkat_aktivitas($user_id,$limit);
		$rst = [];
		foreach($rs as $key => $item) {
		    $rst[$key] = (array)$item;
		    $rst[$key]['closing'] = $item->gracilli+$item->herbaskin;
		}
		
		array_multisort(array_column($rst, 'closing'), SORT_DESC, $rst);

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $rst);
		$this->xjson->result();
	}

	function _get_peringkat_aktivitas($user_id,$limit = "") {
		$params['awal_periode'] = date('Y-m-01');
		$params['akhir_periode'] = date('Y-m-t');
	    $this->db->select('gpcd.id_cs,gpc.`group`,u.first_name as nama_cs,u.last_name as last_nama_cs,
        SUM(la.leads) as leads, SUM(la.totalan) as totalan, SUM(la.closing) as closing,
        SUM(gracilli.gracilli) As gracilli, SUM(herbaskin.herbaskin) AS herbaskin,CONCAT("'.site_url('assets/images/avatars/').'",u.foto) as url_profile');
        $this->db->from('group_produk_cs gpc');
        $this->db->join('group_produk_cs_detail gpcd','gpc.id = gpcd.id_group');
        $this->db->join('users u','u.id_users = gpcd.id_cs');
    
        $this->db->join('laporan_aktivitas la','la.id_cs = gpcd.id_cs','LEFT');
        $this->db->join('(SELECT id_laporan,sum(jumlah) as herbaskin FROM laporan_aktivitas_detail WHERE id_produk = 1 GROUP BY id_laporan) as herbaskin', 'herbaskin.id_laporan = la.id', 'left');
        $this->db->join('(SELECT id_laporan,sum(jumlah) as gracilli FROM laporan_aktivitas_detail WHERE id_produk = 2 GROUP BY id_laporan) as gracilli', 'gracilli.id_laporan = la.id', 'left');
        
        $this->db->where('DATE(CONCAT(SUBSTRING(la.tanggal,7,4),"-",SUBSTRING(la.tanggal,4,2),"-",SUBSTRING(la.tanggal,1,2))) BETWEEN "'.$params['awal_periode'].'" AND "'.$params['akhir_periode'].'"');
        if(!empty($limit)){
        	$this->db->limit($limit);
        }
        $this->db->group_by('gpcd.id_cs');
        return $this->db->get()->result();
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

	private function _update_activity($id,$data,$detail)
	{
		$this->db->where('id_laporan', $id);
		$this->db->delete('laporan_aktivitas_detail');
		
		$qty = 0;
		$produk = json_decode($detail);
		if(!empty($produk)){
			$data_detail = [];
			foreach ($produk as $item) {
				if($item->jumlah > 0) {
				$data_detail[] = array(
						"id_laporan"=>$id,
						"id_produk"=>$item->id_produk,
						"media"=>$item->media,
						"jumlah"=>$item->jumlah,
					);	
				}
				$qty += $item->jumlah*1;
			}
			$this->db->insert_batch('laporan_aktivitas_detail', $data_detail);
		}

		$data['closing'] = $qty;

		$this->db->where('id',$id);
		$this->db->update('laporan_aktivitas',$data);
	}

	private function _save_activity($data,$detail)
	{
		//insert laporan activity
		
		$cek_row = $this->db->where("id_cs",$data['id_cs'])->where("tanggal",$data['tanggal'])->get("laporan_aktivitas")->row();
		
		if(empty($cek_row)){

    		$this->db->insert('laporan_aktivitas', $data);
    		$id = $this->db->insert_id();
    		
    		$qty = 0;
			$produk = json_decode($detail);
			if(!empty($produk)){
				$data_detail = [];
				foreach ($produk as $item) {
					$data_detail[] = array(
							"id_laporan"=>$id,
							"id_produk"=>$item->id_produk,
							"media"=>$item->media,
							"jumlah"=>$item->jumlah,
						);		
					$qty += $item->jumlah*1;
				}
				$this->db->insert_batch('laporan_aktivitas_detail', $data_detail);
			}

    		$this->db->where('id', $id);
    		$this->db->update('laporan_aktivitas', array("closing"=>$qty));

		} else {
		    return "Tidak disimpan data sudah ada.";
		}

	}
	
	function coba_aktivitas() 
	{
		$this->load->model('Sales_aktivitas_model');
		$result = $this->Sales_aktivitas_model->get_data_aktivitas('15');
		echo "<pre>";
		print_r($result);
		echo "</pre>";
	}

}

/* End of file Activity.php */
/* Location: ./application/controllers/api/Activity.php */