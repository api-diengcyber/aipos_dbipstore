<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Xjson');   
    }
    
    public function index()
    {
    }

    public function format_nota() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $id_toko = $this->input->post('id_toko');
        $id_users = $this->input->post('user_id');

        $format = $this->input->post('format', true);
        $data = array(
            'id_toko' => $id_toko,
            'id_users' => $id_users,
            'format' => $format
        );
        $row = $this->db->select('*')
                        ->from('format_nota')
                        ->where('id_toko', $id_toko)
                        ->where('id_users', $id_users)
                        ->get()->row();
        if ($row) {
            $this->db->where('id', $row->id);
            $this->db->update('format_nota', $data);
        } else {
            $this->db->insert('format_nota', $data);
        }

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $format);
		$this->xjson->result();
    }

    public function retur_update_stok() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $id_toko = $this->input->post('id_toko');
        $id_users = $this->input->post('user_id');

		$jenis = $this->input->post('jenis', true);
        $update_stok = ($this->input->post('update_stok', true))?1:0;
        
		$row = $this->db->select('*')
						->from('setting_retur')
						->where('id_toko', $id_toko)
						->where('jenis', $jenis)
						->get()->row();
		if ($row) {
			$data = array(
				'update_stok' => $update_stok,
			);
			$this->db->where('id', $row->id);
			$this->db->update('setting_retur', $data);
		} else {
			$data = array(
				'id_toko' => $id_toko,
				'jenis' => $jenis,
				'update_stok' => $update_stok
			);
			$this->db->insert('setting_retur', $data);
        }
        
        $this->xjson->ok("Sukses");
		$this->xjson->add("data", []);
		$this->xjson->result();
        
    }

}

/* End of file Pengaturan.php */
