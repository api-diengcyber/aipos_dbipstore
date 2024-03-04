<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Kategori_produk_retail_model');
        $this->load->model('Member_retail_model');
        $this->load->model('Penjualan_retail_model');
        $this->load->model('Pembelian_retail_model');
        $this->load->model('Pegawai_retail_model');
        $this->load->model('Piutang_retail_model');
        $this->load->model('Faktur_retail_model');
        $this->load->model('Cabang_toko_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_gudang();
        $this->userdata = $this->Login_model->get_data();
    }

	public function index()
	{
        $id_cabang = $this->userdata->id_toko;

	      $data = array(
            'id_toko' => $this->userdata->id_toko,
	          'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
	          'active_home' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        
        $id_cabang = $this->userdata->id_toko;
        $where_join_produk_retail = 'produk_retail.id_toko="'.$this->userdata->id_toko.'"';
        $where_join_orders = 'orders.id_toko="'.$this->userdata->id_toko.'"';
        $where = "orders_detail.id_toko = '".$this->userdata->id_toko."'";
        $where_id_toko = "id_toko = ".$this->userdata->id_toko;
        $where_stok = 'sp.id_toko = '.$this->userdata->id_toko;
        $where_join_stock = $this->userdata->id_toko;
        
        $data['pembelian'] = $this->db->where('tgl_masuk', date('d-m-Y'))->where($where_id_toko)->get('pembelian')->result();
        $data['total_stok'] = $this->db->select('SUM(sp.stok) AS jml_stok')
                                      ->from('stok_produk sp')
                                      ->where($where_stok)
                                      ->get()->row();               
        $data['produk'] = $this->db->query('SELECT COUNT(id_produk) AS jml FROM produk_retail WHERE '.$where_id_toko)->row();
        $data['modul'] = $this->db->where('id', $this->userdata->id_modul)->get('pil_modul')->row();

        $data['data_stok_bulan_ini'] = [];

        $date = date('Y-m-d');
        $last_day_this_month = date('Y-m-d',strtotime($date));

        $data['produk_expired'] = $this->Pembelian_retail_model->get_by_tgl_expire($last_day_this_month,$this->userdata->id_toko,5,'tgl_expire');
        $this->view->render_gudang('home', $data);
  }
  
  function _total_karyawan($state)
  {
    $this->db->select('u.id,u.first_name as nama,jk.id');
    $this->db->from('users u');
    $this->db->join('jam_kerja jk', 'jk.id_pegawai = u.id','left');
    $this->db->where('u.level', 4);
    $this->db->where('jk.tgl', date('d-m-Y'));
    if($state == 'masuk'){
    $this->db->where('jk.status <> 0');
    return $this->db->get()->num_rows();
    }else if($state == 'tidak-masuk'){
    $this->db->where('jk.id is null');
    return $this->db->get()->result();
    }
  }

  function _stok_bahan($id)
  {
    $this->db->select('sum(stok) as stok');
    $this->db->from('produk_retail pr');
    $this->db->join('stok_produk sp', 'sp.id_produk = pr.id_produk_2');
    $this->db->where('pr.id_produk_2', $id);
    $row = $this->db->get()->row();
    if($row){
      return $row->stok;
    }else{
      return 'Kosong';
    }
  }

  function _karyawan_tidak_masuk()
  {
    $output = '';
    $res_karyawan = $this->db->where('level', 4)->get('users')->result();
    foreach ($res_karyawan as $karyawan) {
      $row = $this->db->where('id_pegawai', $karyawan->id_users)->where('tgl',date('d-m-Y'))->get('jam_kerja')->row();
      if(empty($row)){
        $output .= $karyawan->first_name.',';
      }
    }
    return $output;
  }

  function _produksi_hari_ini()
  {
    $this->db->select('pr.nama_produk,pb.sisa_kemarin,pb.ambil_baru');
    $this->db->from('produksi p');
    $this->db->join('produksi_barang pb', 'pb.id_produksi = p.id');
    $this->db->join('produk_retail pr', 'pr.id_produk = pb.id_produk');
    $this->db->where('tgl', date('d-m-Y'));
    $this->db->order_by('p.id', 'DESC');
    return $this->db->get()->result();
  }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */