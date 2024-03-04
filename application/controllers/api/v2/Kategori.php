<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

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
        $this->db->from('kategori_produk');
        $this->db->where('id_toko', $this->xjson->post('id_toko'));

        if(!empty($query)){
            $this->db->where('nama_kategori LIKE "%'.$query.'%"');
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
        $id_kategori_2 = $this->input->post('id_kategori_2');
        $nama_kategori = $this->input->post('nama_kategori');
        
        $data = array(
            "id_toko"=>$id_toko,
            "nama_kategori"=>$nama_kategori
        );

        $data_output = [];

		if(!empty($id_kategori_2)){
            $this->db->where('id_toko', $id_toko);
            $this->db->where('id_kategori_2', $id_kategori_2);
            $this->db->update('kategori_produk', $data);

            $data_output = $this->db->where('id_kategori_2', $id_kategori_2)->where('id_toko',$id_toko)->get('kategori_produk')->row();
        }else{
            $last_kategori = $this->db->where('id_toko', $id_toko)->order_by("id_kategori_2","desc")->get("kategori_produk")->row();
            
            $data["id_kategori_2"] = ($last_kategori->id_kategori_2)?$last_kategori->id_kategori_2 + 1:1;

            $this->db->insert('kategori_produk', $data);
            $data_output = $this->db->where('id_kategori', $this->db->insert_id())->get('kategori_produk')->row();
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
        $id_kategori_2 = $this->input->post('id_kategori_2');

        $this->db->where('id_toko', $id_toko);
        $this->db->where('id_kategori_2', $id_kategori_2);
        $this->db->delete('kategori_produk');

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", []);
		$this->xjson->result();
    }

}

/* End of file Kategori.php */
