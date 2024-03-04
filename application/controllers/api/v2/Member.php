<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    
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
        
        $query = $this->input->post('query');
		
		$this->db->select('*');
        $this->db->from('member');
        $this->db->where('id_toko', $this->xjson->post('id_toko'));

        if(!empty($query)){
            $this->db->where('nama LIKE "%'.$query.'%"');
        }

		$data = $this->db->get()->result();

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
    }

    public function generate_kode() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $id_toko = $this->input->post('id_toko');

        $res_member = $this->db->where('id_toko', $id_toko)->get('member')->result();
        $c = (count($res_member)*1) + 1;
        $data = date('Ymd').$id_toko.$c;

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
    }

    public function save() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $data = array(
            // 'id_member' => $id_member,
            'id_toko' => $this->input->post('id_toko',TRUE),
            'kode' => $this->input->post('kode',TRUE).$this->input->post('custom_kode',TRUE),
            'nama' => $this->input->post('nama',TRUE),
            'alamat' => $this->input->post('alamat',TRUE),
            'telp' => $this->input->post('telp',TRUE),
            'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
            'diskon' => $this->input->post('diskon',TRUE),
        );

        $id_member = $this->input->post('id_member');
        
        $output = [];
        if(!empty($id_member)){
            $this->db->where('id_member', $id_member);
            $this->db->update('member', $data);

            $output = $this->db->where('id_member',$id_member)->get('member')->row();
        }else{
            $row_last_member = $this->db->select('id_member')
                                    ->from('member')
                                    ->where('id_toko', $this->input->post('id_toko'))
                                    ->order_by('id_member', 'desc')
                                    ->get()->row();
            $id_member = 1;
            if ($row_last_member) {
                $id_member = $row_last_member->id_member+1;
            }

            $data['id_member'] = $id_member;
            $this->db->insert('member', $data);

            $id = $this->db->insert_id();
            $output = $this->db->where('id',$id)->get('member')->row();
            
        }

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $output);
		$this->xjson->result();
    }

    public function delete() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $id_toko = $this->input->post('id_toko');
        $id_member = $this->input->post('id_member');

        $this->db->where('id_member', $id_member);
        $this->db->where('id_toko', $id_toko);
        $this->db->delete('member');

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $id_member);
		$this->xjson->result();
    }

}

/* End of file Member.php */
