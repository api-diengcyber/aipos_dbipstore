<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->library(array('ion_auth','form_validation'));
		$this->lang->load('auth');
        $this->load->model('Produk_retail_model');
        $this->load->model('Kategori_produk_retail_model');
        $this->load->model('Member_retail_model');
        $this->load->model('Penjualan_retail_model');
        $this->load->model('Akun_retail_model');
        $this->load->model('Pengaturan_akuntansi_model');
        $this->load->model('Pembelian_retail_model');
        $this->load->model('Pegawai_retail_model');
        $this->load->model('Satuan_produk_model');
        $this->load->model('Stok_produk_model');
        $this->load->model('Pengaturan_opsi_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index()
	{
		redirect(site_url());
	}
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Produk_retail_model->json_produksi($this->userdata->id_toko);
    }

	public function stok_produk()
	{
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_stok_produk' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'action' => site_url('produksi/retail/action_simpan_stok_produk'),
            'id_modul' => $this->userdata->id_modul,
        );
        $this->view->render_produksi('produk/stok_produk', $data);
	}

	public function lain_lain() {
		$row_ucapan = $this->db->where('id_toko', $this->userdata->id_toko)->get('ucapan')->row();
		$ucapan = 'Terimakasih dan Selamat Belanja Kembali';
		if(!empty($row_ucapan->ucapan)){
			$ucapan = $row_ucapan->ucapan;
		}
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_lain_lain' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
		$data['opsi_stok']    = $this->Pengaturan_opsi_model->get_opsi_stok();
		$data['opsi_diskon']  = $this->Pengaturan_opsi_model->get_opsi_diskon();
		$data['opsi_pilihan'] = $this->Pengaturan_opsi_model->get_opsi_pilihan();
		$data['opsi_tproduk'] = $this->Pengaturan_opsi_model->get_opsi_tProduk();
		$data['opsi_popup'] = $this->Pengaturan_opsi_model->get_opsi_popup();
		$data['ppn'] = $this->Pengaturan_opsi_model->get_ppn();
		$data['ucapan'] = $ucapan;
        $this->view->render_produksi('produk/opsi_lain_lain', $data);
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
	public function opsi_ppn_change(){
		$opsi = $this->input->post('opsi', true);
		$data = array('opsi'=>$opsi);
		$row_cek = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_opsi', 6)->get('opsi')->row();
		if ($row_cek) {
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_opsi', 6);
			$this->db->update('opsi', $data);
		} else {
			$data_insert = array(
				'id_toko' => $this->userdata->id_toko,
				'id_opsi' => 6,
				'opsi' => $opsi
			);
			$this->db->insert('opsi', $data_insert);
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
        redirect(site_url('produksi/retail/lain_lain'),'refresh');
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

	public function diskon_produk()
	{
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_diskon_produk' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'contents' => $this->db->where('id_toko', $this->userdata->id_toko)->get('produk_retail', 1000),
            'action' => site_url('produksi/retail/action_simpan_diskon_produk'),
        );
        $this->view->render_produksi('produk/diskon_produk', $data);
	}

	public function action_simpan_diskon_produk()
	{
		for ($i=0; $i < count($this->input->post('id_produk')); $i++) {
			$data = array(
				'diskon' => $this->input->post('diskon')[$i],
			);
			$this->db->where('id_toko', $this->userdata->id_toko);
			$this->db->where('id_produk_2', $this->input->post('id_produk')[$i]);
			$this->db->update('produk_retail', $data);
		}
		redirect('produksi/retail/diskon_produk', 'refresh');
	}
	public function json_expire($date_expire = '')
	{
        header('Content-Type: application/json');
		echo $this->Pembelian_retail_model->json_by_expire_produksi($this->userdata->id_toko, $date_expire);
	}

	public function produk_kadaluarsa()
	{
		$opsi_expire = date('Y-m-d');
		if(!empty($this->input->post('date_expire'))){ 
			$dt = new DateTime($opsi_expire);
			$dt->modify('- '.$this->input->post('date_expire').' Month');
			$opsi_expire = $dt->format('Y-m-d');
		}
		$tgl_expire = date('Y-m-d', strtotime($opsi_expire));
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_produk_kadaluarsa' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'contents' => $this->Pembelian_retail_model->get_by_tgl_expire($tgl_expire, $this->userdata->id_toko),
			'date_expire' => $opsi_expire,
			'opsi_expire' => $this->input->post('date_expire', true),
			'tgl_expire' => $tgl_expire
        );
        $this->view->render_produksi('produk/produk_kadaluarsa', $data);
	}

	public function grafik()
	{
		$id_member = 0;
		$id_produk = 0;
		if (!empty($this->input->post('id_member', true))) {
			$id_member = $this->input->post('id_member', true);
		}
		if (!empty($this->input->post('id_produk', true))) {
			$id_produk = $this->input->post('id_produk', true);
		}
		$start_periode = date('01-m-Y');
		$end_periode = date('t-m-Y');
		if (!empty($this->input->post('start_periode', true))) {
			$start_periode = $this->input->post('start_periode', true);
		}
		if (!empty($this->input->post('end_periode', true))) {
			$end_periode = $this->input->post('end_periode', true);
		}
		$exstart = explode("-", $start_periode);
		$zstart_periode = $exstart[2].'-'.$exstart[1].'-'.$exstart[0];
		$exend = explode("-", $end_periode);
		$zend_periode = $exend[2].'-'.$exend[1].'-'.$exend[0];
		$where_member = "o.id_orders_2 > 0";
		if (!empty($id_member)) {
			$where_member .= " AND o.pembeli = '".$id_member."'";
		}
		if (!empty($id_produk)) {
			$where_member .= " AND p.id_produk_2 = '".$id_produk."'";
		}
		$data_produk_jual = $this->db->select('p.*, SUM(od.jumlah+od.jumlah_bonus) AS terjual, SUM(rjd.jumlah) AS jumlah_retur')
									->from("produk_retail p")
									->join("orders_detail od", "p.id_produk_2=od.id_produk AND od.id_toko='".$this->userdata->id_toko."'", 'left')
									->join("orders o", "o.id_orders_2=od.id_orders_2 AND o.id_toko='".$this->userdata->id_toko."'", 'left')
									->join('retur_jual_detail rjd', 'rjd.id_orders_detail=od.id_orders AND rjd.id_toko=od.id_toko', 'left')
									->where("p.id_toko", $this->userdata->id_toko)
									->where("DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),'-',SUBSTRING(o.tgl_order,4,2),'-',SUBSTRING(o.tgl_order,1,2))) BETWEEN '".$zstart_periode."' AND '".$zend_periode."'")
									->where($where_member)
									->order_by("od.jumlah", "desc")
									->order_by("p.nama_produk", "asc")
									->group_by("p.id_produk_2")
									->get()->result();
		$data_produk_jual_tgl = $this->db->select('o.tgl_order, SUM(od.jumlah+od.jumlah_bonus) AS terjual, SUM(rjd.jumlah) AS jumlah_retur')
										->from("produk_retail p")
										->join("orders_detail od", "p.id_produk_2=od.id_produk AND od.id_toko='".$this->userdata->id_toko."'", 'left')
										->join("orders o", "o.id_orders_2=od.id_orders_2 AND o.id_toko='".$this->userdata->id_toko."'", 'left')
										->join('retur_jual_detail rjd', 'rjd.id_orders_detail=od.id_orders AND rjd.id_toko=od.id_toko', 'left')
										->where("p.id_toko", $this->userdata->id_toko)
										->where("DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),'-',SUBSTRING(o.tgl_order,4,2),'-',SUBSTRING(o.tgl_order,1,2))) BETWEEN '".$zstart_periode."' AND '".$zend_periode."'")
										->where($where_member)
										->order_by("DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),'-',SUBSTRING(o.tgl_order,4,2),'-',SUBSTRING(o.tgl_order,1,2))) ASC")
										->group_by("o.tgl_order")
										->get()->result();
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_grafik' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'id_member' => $id_member,
			'id_produk' => $id_produk,
			'start_periode' => $start_periode,
			'end_periode' => $end_periode,
			'zstart_periode' => $zstart_periode,
			'zend_periode' => $zend_periode,
			'data_produk' => $this->db->where('id_toko', $this->userdata->id_toko)->order_by('nama_produk', 'asc')->get('produk_retail')->result(),
			'data_produk_jual' => $data_produk_jual,
			'data_produk_jual_tgl' => $data_produk_jual_tgl,
			'orders_hari_ini' => $this->Penjualan_retail_model->get_by_tgl($this->userdata->id_toko, date('d-m-Y'), $id_member),
			'orders_bulan_ini' => $this->Penjualan_retail_model->get_by_between_date_2($this->userdata->id_toko, date('Y-m-01'), date('Y-m-t'), $id_member),
			'produk_terlaris' => $this->Produk_retail_model->get_popular_produk(),
			'data_member' => $this->Member_retail_model->get_all()
        );
        $this->view->render_produksi('produk/grafik', $data);
	}

	function json_grafik(){
		header('Content-Type: application/json');
		$res = $this->Produk_retail_model->get_popular_produk();
		$data = array(
			"draw" => 0,
			"recordsTotal" => count($res),
			"recordsFiltered" => count($res),
			"data" => $res,
		);
		echo json_encode($data);
	}

	public function pengaturan()
	{
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_pengaturan_retail' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'id_toko' => $this->userdata->id_toko,
			'data_akun' => $this->Akun_retail_model->get_by_id_toko($this->userdata->id_toko),
			'data_level' => $this->db->get('level_pengaturan_akuntansi'),
        );
        $this->view->render_produksi('produk/retail', $data);
	}

	public function lihat_pengaturan()
	{
        $id_toko = $this->input->post('id_toko');
        $kode = $this->input->post('kode');
        $res = $this->Pengaturan_akuntansi_model->get_by_kode($id_toko, $kode);
        $array = array();
        $i = 0;
        foreach ($res as $key) {
		    $row_akun = $this->Akun_retail_model->get_by_id($key->id_akun);
		    $row_level = $this->db->where('id', $key->level)->get('level_pengaturan_akuntansi')->row();
        	if($key->debet=="1"){
		        $array[$i]['debet'] = "
				<li class='dd-item'>
				    <div class='dd-handle'>
				        <label class='label label-info'>".$row_akun->kode."</label> ".$row_akun->akun." <i>(".$row_level->level.")</i>
				        <div class='pull-right action-buttons'>
				            <a class='red' data-id='".$key->id."'>
				                <i class='ace-icon fa fa-trash-o bigger-130'></i>
				            </a>
				        </div>
				    </div>
				</li>
		        ";
	        	$i++;
        	}
        	if($key->kredit=="1"){
		        $array[$i]['kredit'] = "
				<li class='dd-item'>
				    <div class='dd-handle'>
				        <label class='label label-info'>".$row_akun->kode."</label> ".$row_akun->akun." <i>(".$row_level->level.")</i>
				        <div class='pull-right action-buttons'>
				            <a class='red' data-id='".$key->id."'>
				                <i class='ace-icon fa fa-trash-o bigger-130'></i>
				            </a>
				        </div>
				    </div>
				</li>
		        ";
	        	$i++;
        	}
        }
        $data = array(
        	'data' => $array,
        );
        echo json_encode($data);
	}

	public function simpan_pengaturan()
	{
		$id_toko = $this->input->post('id_toko');
		$kode = $this->input->post('kode');
		$akun = $this->input->post('akun');
		$bagian = $this->input->post('bagian');
		$level = $this->input->post('level');

		if($bagian == "1"){
			// insert debet //
			$data = array(
				'id_toko' => $id_toko,
				'kode' => $kode,
				'id_akun' => $akun,
				'debet' => '1',
				'level' => $level,
			);
			$this->Pengaturan_akuntansi_model->insert($data);
		}

		if($bagian == "2"){
			// insert debet //
			$data = array(
				'id_toko' => $id_toko,
				'kode' => $kode,
				'id_akun' => $akun,
				'kredit' => '1',
				'level' => $level,
			);
			$this->Pengaturan_akuntansi_model->insert($data);
		}

	}

	public function hapus_pengaturan()
	{
		$id = $this->input->post('id');
		$this->Pengaturan_akuntansi_model->delete($id);
	}

	// COBA //
	public function coba_json()
	{
		$this->load->view('produksi/htmljson');
	}

	public function data_json()
	{
        header('Content-Type: application/json');
        $html = file_get_contents(site_url('produksi/retail/coba_html'));
        $data_div = array();

        for ($i=0; $i < 1000; $i++) { 
        	$data_div[$i]['no'] = $i+1;
        }

        $data = array(
        	'data_html' => $html,
        	'data_div' => $data_div,
        );
        echo json_encode($data);
	}

	public function coba_html()
	{
		echo "<a href=''>email me</a><br>";
		echo "<a href=''>email me</a><br>";
		echo "<a href=''>email me</a><br>";
		echo "<a href=''>email me</a><br>";
		echo "<a href=''>email me</a><br>";
		echo "<a href=''>email me</a><br>";
	}

	public function mobile()
	{
		$url = 'http://localhost/cicool/api/data_tukang/all';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'X-Api-Key: CFFBE38FDCCF605284B578B15B5C791D',
		));
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$res = curl_exec($ch);

		print_r(json_decode($res));
		curl_close($ch);
	}

}

/* End of file Retail.php */
/* Location: ./application/controllers/Retail.php */