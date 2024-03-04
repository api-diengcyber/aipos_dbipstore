<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Piutang extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Xjson');
    }
    
    public function index()
    {
        
    }

    public function get_all() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();
        
        $id_toko = $this->xjson->post('id_toko');
        $query = $this->input->post('query');
        
        // datatables
        $this->db->select('piutang.id,piutang.id_piutang,piutang.id_toko,piutang.no_faktur,piutang.id_pembeli,piutang.jumlah_hutang,piutang.jumlah_bayar,piutang.sisa,piutang.tanggal,piutang.deadline,member.nama AS pembeli');
        $this->db->from('piutang');
        $this->db->join('member', 'piutang.id_pembeli=member.id_member AND member.id_toko="'.$id_toko.'"');
        
        if(!empty($query)){
            $this->db->where("no_faktur = '".$query."' OR member.nama LIKE '%".$query."%'");
        }
        
        $this->db->where('piutang.id_toko', $id_toko);
		$data = $this->db->get()->result();

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
    }

    public function save() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $user_id = $this->input->post('user_id');
        $id_toko = $this->input->post('id_toko');
        
        $id_piutang = $this->input->post('id_piutang');
        $jumlah_hutang = $this->input->post('jumlah_hutang');
        $jumlah_bayar = $this->input->post('jumlah_bayar');
        $sisa = $this->input->post('sisa');
        $tanggal = $this->input->post('tanggal');
        $deadline = $this->input->post('deadline');
        $pembeli = $this->input->post('id-pembeli');
        $no_faktur = $this->input->post('no_faktur');
        

        $data = array(
            "jumlah_hutang"=>$jumlah_hutang,
            "jumlah_bayar"=>$jumlah_bayar,
            "sisa"=>$sisa,
            "tanggal"=>$tanggal,
            "deadline"=>$deadline,
            "id_pembeli"=>$pembeli
        );
        $this->db->where('id_toko', $id_toko);
        $this->db->where('id_piutang', $id_piutang);
        $this->db->update('piutang', $data);

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
    }

}

/* End of file Member.php */
