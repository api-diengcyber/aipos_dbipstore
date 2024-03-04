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
		$hbWA = $this->xjson->post("hbWA");
		$gcWA = $this->xjson->post("gcWA");
		$hbShopee = $this->xjson->post("hbShopee");
		$gcShopee = $this->xjson->post("gcShopee");
		$hbTokopedia = $this->xjson->post("hbTokopedia");
		$gcTokopedia = $this->xjson->post("gcTokopedia");
		$hbCod = $this->xjson->post("hbCod");
		$gcCod = $this->xjson->post("gcCod");
		
		$closingTotal = $hbWA+$gcWA+$hbShopee+$gcShopee+$hbTokopedia+$gcTokopedia+$hbCod+$gcCod; 
		
		$id = $this->xjson->post("id");

		$data = array(
			"id_cs"=>$user_id,
			"tanggal"=>$tanggal,
			"leads"=>$leads,
			"totalan"=>$totalan,
			"closing"=>$closingTotal,
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
		$result = $this->Sales_aktivitas_model->get_data_aktivitas($user_id,date('m-Y'),'','',true);

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
        $this->db->join('(SELECT jumlah as hbWA,id_laporan FROM laporan_aktivitas_detail where id_produk = 1 and media = 1) as hbWA','hbWA.id_laporan =  la.id','left');
        $this->db->join('(SELECT jumlah as gcWA,id_laporan FROM laporan_aktivitas_detail where id_produk = 2 and media = 1) as gcWA','gcWA.id_laporan =  la.id','left');
        $this->db->join('(SELECT jumlah as hbShopee,id_laporan FROM laporan_aktivitas_detail where id_produk = 1 and media = 2) as hbShopee','hbShopee.id_laporan =  la.id','left');
        $this->db->join('(SELECT jumlah as gcShopee,id_laporan FROM laporan_aktivitas_detail where id_produk = 2 and media = 2) as gcShopee','gcShopee.id_laporan =  la.id','left');
        $this->db->join('(SELECT jumlah as hbTokopedia,id_laporan FROM laporan_aktivitas_detail where id_produk = 1 and media = 3) as hbTokopedia','hbTokopedia.id_laporan =  la.id','left');
        $this->db->join('(SELECT jumlah as gcTokopedia,id_laporan FROM laporan_aktivitas_detail where id_produk = 2 and media = 3) as gcTokopedia','gcTokopedia.id_laporan =  la.id','left');
        $this->db->join('(SELECT jumlah as hbCod,id_laporan FROM laporan_aktivitas_detail where id_produk = 1 and media = 4) as hbCod','hbCod.id_laporan =  la.id','left');
        $this->db->join('(SELECT jumlah as gcCod,id_laporan FROM laporan_aktivitas_detail where id_produk = 2 and media = 4) as gcCod','gcCod.id_laporan =  la.id','left'); 
        $this->db->where('la.id', $id);
        return $this->db->get()->row();       
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
		    $rst[$key]['closing'] = $item->closing;
		    $rst[$key]['nama_cs'] = $item->nama_cs.' ('.$item->persentase.'%)';
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
        SUM(gracilli.gracilli) As gracilli, SUM(herbaskin.herbaskin) AS herbaskin,ROUND(((SUM(la.closing) / SUM(la.leads)) * 100),0) as persentase,ROUND((SUM(herbaskin.herbaskin) + SUM(gracilli.gracilli) / SUM(la.leads) * 100),0) as persentase2,CONCAT("'.site_url('assets/images/avatars/').'",u.foto) as url_profile');
        $this->db->from('group_produk_cs gpc');
        $this->db->join('group_produk_cs_detail gpcd','gpc.id = gpcd.id_group');
        $this->db->join('users u','u.id_users = gpcd.id_cs');
    
        $this->db->join('laporan_aktivitas la','la.id_cs = gpcd.id_cs','LEFT');
        $this->db->join('(SELECT id_laporan,sum(jumlah) as herbaskin FROM laporan_aktivitas_detail WHERE id_produk = 1 GROUP BY id_laporan) as herbaskin', 'herbaskin.id_laporan = la.id', 'left');
        $this->db->join('(SELECT id_laporan,sum(jumlah) as gracilli FROM laporan_aktivitas_detail WHERE id_produk = 2 GROUP BY id_laporan) as gracilli', 'gracilli.id_laporan = la.id', 'left');
		$this->db->where('u.first_name NOT Like "%fitria yuliyanti%"');
        
        /* if(!empty($params['bulan'])){
          // $this->db->where('right(tanggal,10)', $params['bulan']);
        } */
        
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
		$this->db->where('id',$id);
		$this->db->update('laporan_aktivitas',$data);
		if($detail->hbWA >= 0 && $detail->hbWA != "null" && $detail->hbWA != "undefined"){
			$this->db->where('id_laporan',$id)->where('media',1)->where('id_produk',1)->delete('laporan_aktivitas_detail');
			$data = array(
				"media"=>1,
				"id_laporan"=>$id,
				"id_produk"=>1,
				"jumlah"=>$detail->hbWA,
			);
			$this->db->insert('laporan_aktivitas_detail', $data);
		}
		if($detail->gcWA >= 0 && $detail->gcWA != "null" && $detail->gcWA != "undefined"){
			$this->db->where('id_laporan',$id)->where('media',1)->where('id_produk',2)->delete('laporan_aktivitas_detail');
			$data = array(
				"media"=>1,
				"id_laporan"=>$id,
				"id_produk"=>2,
				"jumlah"=>$detail->gcWA,
			);
			$this->db->insert('laporan_aktivitas_detail', $data);
		}
		if($detail->hbShopee >= 0 && $detail->hbShopee != "null" && $detail->hbShopee != "undefined"){
			$this->db->where('id_laporan',$id)->where('media',2)->where('id_produk',1)->delete('laporan_aktivitas_detail');
			$data = array(
				"media"=>2,
				"id_laporan"=>$id,
				"id_produk"=>1,
				"jumlah"=>$detail->hbShopee,
			);
			$this->db->insert('laporan_aktivitas_detail', $data);
		}
		if($detail->gcShopee >= 0 && $detail->gcShopee != "null" && $detail->gcShopee != "undefined"){
			$this->db->where('id_laporan',$id)->where('media',2)->where('id_produk',2)->delete('laporan_aktivitas_detail');
			$data = array(
				"media"=>2,
				"id_laporan"=>$id,
				"id_produk"=>2,
				"jumlah"=>$detail->gcShopee,
			);
			$this->db->insert('laporan_aktivitas_detail', $data);
		}
		if($detail->hbTokopedia >= 0 && $detail->hbTokopedia != "null" && $detail->hbTokopedia != "undefined"){
			$this->db->where('id_laporan',$id)->where('media',3)->where('id_produk',1)->delete('laporan_aktivitas_detail');
			$data = array(
				"media"=>3,
				"id_laporan"=>$id,
				"id_produk"=>1,
				"jumlah"=>$detail->hbTokopedia,
			);
			$this->db->insert('laporan_aktivitas_detail', $data);
		}
		if($detail->gcTokopedia >= 0 && $detail->gcTokopedia != "null" && $detail->gcTokopedia != "undefined"){
			$this->db->where('id_laporan',$id)->where('media',3)->where('id_produk',2)->delete('laporan_aktivitas_detail');
			$data = array(
				"media"=>3,
				"id_laporan"=>$id,
				"id_produk"=>2,
				"jumlah"=>$detail->gcTokopedia,
			);
			$this->db->insert('laporan_aktivitas_detail', $data);
		}
		if($detail->hbCod >= 0 && $detail->hbCod != "null" && $detail->hbCod != "undefined"){
			$this->db->where('id_laporan',$id)->where('media',4)->where('id_produk',1)->delete('laporan_aktivitas_detail');
			$data = array(
				"media"=>4,
				"id_laporan"=>$id,
				"id_produk"=>1,
				"jumlah"=>$detail->hbCod,
			);
			$this->db->insert('laporan_aktivitas_detail', $data);
		}
		if($detail->gcCod >= 0 && $detail->gcCod != "null" && $detail->gcCod != "undefined"){
			$this->db->where('id_laporan',$id)->where('media',4)->where('id_produk',2)->delete('laporan_aktivitas_detail');
			$data = array(
				"media"=>4,
				"id_laporan"=>$id,
				"id_produk"=>2,
				"jumlah"=>$detail->gcCod,
			);
			$this->db->insert('laporan_aktivitas_detail', $data);
		}
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