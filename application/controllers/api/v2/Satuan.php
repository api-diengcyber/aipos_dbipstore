<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Xjson');
    }
    
    public function index(){

    }

    public function get_all() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();
        
        $query = $this->input->post('query');
		
		$this->db->select('*');
        $this->db->from('satuan_produk');
        $this->db->where('id_toko', $this->xjson->post('id_toko'));

        if(!empty($query)){
            $this->db->where('satuan LIKE "%'.$query.'%"');
        }

		$data = $this->db->get()->result();

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
    }

    public function save() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();
        
        $id_toko = $this->input->post('id_toko');
        $id_satuan = $this->input->post('id_satuan');
        $satuan = $this->input->post('satuan');
        
        $data = array(
            "id_toko"=>$id_toko,
            "satuan"=>$satuan
        );

        $data_output = [];

		if(!empty($id_satuan)){
            $this->db->where('id_toko', $id_toko);
            $this->db->where('id_satuan', $id_satuan);
            $this->db->update('satuan_produk', $data);

            $data_output = $this->db->where('id_satuan', $id_satuan)->where('id_toko',$id_toko)->get('satuan_produk')->row();
        }else{
            $last_kategori = $this->db->where('id_toko', $id_toko)->order_by("id_satuan","desc")->get("satuan_produk")->row();
            
            $data["id_satuan"] = ($last_kategori->id_satuan)?$last_kategori->id_satuan + 1:1;

            $this->db->insert('satuan_produk', $data);
            $data_output = $this->db->where('id', $this->db->insert_id())->get('satuan_produk')->row();
        }

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $data_output);
		$this->xjson->result();
    }

    function delete() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $id_toko = $this->input->post('id_toko');
        $id_satuan = $this->input->post('id_satuan');

        $this->db->where('id_toko', $id_toko);
        $this->db->where('id_satuan', $id_satuan);
        $this->db->delete('satuan_produk');

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", []);
		$this->xjson->result();
    }

}

/* End of file Kategori.php */
