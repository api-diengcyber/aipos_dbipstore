<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun_retail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Akun_retail_model');
        $this->load->library('form_validation');
	    $this->load->library('datatables');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_admin();
        $this->userdata = $this->Login_model->get_data();
    }

    public function index()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_akun' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $data['id'] = set_value("id");
        $data['id_toko'] = $this->userdata->id_toko;
        $data['parent'] = set_value("parent");
        $data['kode_parent'] = set_value("kode_parent");
        $data['kode_akun'] = set_value("kode_akun");
        $data['nama_akun'] = set_value("nama_akun");
        $data['akun_level_1'] = $this->db->select('*')
                        ->from('akun')
                        ->where('id_toko', $this->userdata->id_toko)
                        ->not_like('kode','.','BOTH')
                        ->group_by('kode')
                        ->or_where('id_toko', 0)
                        ->not_like('kode','.','BOTH')
                        ->group_by('kode')
                        ->get()->result();
        $data['akun_level_2'] = $this->db->select('*')
                        ->from('akun')
                        ->where('id_toko', $this->userdata->id_toko)
                        ->where('LENGTH(kode)', '4')
                        ->or_where('id_toko', 0)
                        ->where('LENGTH(kode)', '4')
                        ->group_by('SUBSTRING(kode,1,4)')
                        ->get()->result();
        $data['akun_level_3'] = $this->db->select('*')
                        ->from('akun')
                        ->where('id_toko', $this->userdata->id_toko)
                        ->where('LENGTH(kode)', '7')
                        ->or_where('id_toko', 0)
                        ->where('LENGTH(kode)', '7')
                        ->group_by('SUBSTRING(kode,1,7)')
                        ->get()->result();
        $data['akun_level_4'] = $this->db->select('*')
                        ->from('akun')
                        ->where('id_toko', $this->userdata->id_toko)
                        ->where('LENGTH(kode)', '10')
                        ->or_where('id_toko', 0)
                        ->where('LENGTH(kode)', '10')
                        ->group_by('SUBSTRING(kode,1,10)')
                        ->get()->result();
        $data['akun_level_5'] = $this->db->select('*')
                        ->from('akun')
                        ->where('id_toko', $this->userdata->id_toko)
                        ->where('LENGTH(kode)', '13')
                        ->or_where('id_toko', 0)
                        ->where('LENGTH(kode)', '13')
                        ->group_by('SUBSTRING(kode,1,13)')
                        ->get()->result();
        $data['action'] = site_url('admin/akun_retail/create_action');
        $this->view->render_admin('akun/akun_list', $data);
    }

    public function kode_baru()
    {
        $kode_parent = $this->input->post('parent');
        $row = $this->Akun_retail_model->get_sub_kode_baru($this->userdata->id_toko, $kode_parent);
        $data = array();
        if($row){
            $data['kode'] = sprintf("%02d", $row->kode+1);
        } else {
            $data['kode'] = sprintf("%02d", 1);
        }
        echo json_encode($data);
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Akun_retail_model->json($this->userdata->id_toko);
    }

    public function read($id) 
    {
        $row = $this->Akun_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_akun' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'kode' => $row->kode,
                'akun' => $row->akun,
            );
            $this->view->render_admin('akun/akun_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/akun_retail'));
        }
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id_toko = $this->input->post('id_toko');
            $parent = $this->input->post('parent');
            $kode_parent = $this->input->post('kode_parent');
            $kode_akun = $this->input->post('kode_akun');
            $nama_akun = $this->input->post('nama_akun');
            $kode = $kode_parent.".".$kode_akun;
            $data = array(
                'id_toko' => $id_toko,
                'kode' => $kode,
                'akun' => $nama_akun,
            );
            $this->Akun_retail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/akun_retail'));
        }
    }

    public function aksi_baru()
    {
        $akun = $this->input->post('akun');
        echo $akun;
    }
    
    public function update($id) 
    {
        $row = $this->Akun_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_akun' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Simpan',
                'action' => site_url('admin/akun_retail/update_action'),
        		'id' => set_value('id', $row->id),
        		'id_toko' => set_value('id_toko', $row->id_toko),
        		'kode' => set_value('kode', $row->kode),
        		'akun' => set_value('akun', $row->akun),
    	    );
            $this->view->render_admin('akun/akun_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/akun_retail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        		'id_toko' => $this->input->post('id_toko',TRUE),
        		'kode' => $this->input->post('kode',TRUE),
        		'akun' => $this->input->post('akun',TRUE),
    	    );
            $this->Akun_retail_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/akun_retail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Akun_retail_model->get_by_id($id);
        if ($row) {
            $this->Akun_retail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/akun_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/akun_retail'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
        $this->form_validation->set_rules('parent', 'parent', 'trim|required');
    	$this->form_validation->set_rules('kode_parent', 'kode_parent', 'trim|required');
        $this->form_validation->set_rules('kode_akun', 'kode_akun', 'trim|required');
    	$this->form_validation->set_rules('nama_akun', 'nama_akun', 'trim|required');
    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Akun_retail.php */
/* Location: ./application/controllers/Akun_retail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-12 04:14:04 */
/* http://harviacode.com */