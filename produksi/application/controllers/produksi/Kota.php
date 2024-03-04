<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kota_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
    }

    public function index()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_kota' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_produksi('kota/kota_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kota_model->json_produksi();
    }

    public function read($id) 
    {
        $row = $this->Kota_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_kota' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'id' => $row->id,
                'nama_kota' => $row->nama_kota,
            );
            $this->view->render_produksi('kota/kota_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/kota'));
        }
    }

    public function create() 
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_kota' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'button' => 'Create',
            'action' => site_url('produksi/kota/create_action'),
            'id' => set_value('id'),
            'nama_kota' => set_value('nama_kota'),
        );
        $this->view->render_produksi('kota/kota_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'nama_kota' => $this->input->post('nama_kota',TRUE),
    	    );
            $this->Kota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produksi/kota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kota_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_kota' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Update',
                'action' => site_url('produksi/kota/update_action'),
                'id' => set_value('id', $row->id),
                'nama_kota' => set_value('nama_kota', $row->nama_kota),
            );
            $this->view->render_produksi('kota/kota_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/kota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        		'nama_kota' => $this->input->post('nama_kota',TRUE),
    	    );
            $this->Kota_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produksi/kota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kota_model->get_by_id($id);
        if ($row) {
            $this->Kota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produksi/kota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/kota'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('nama_kota', 'nama kota', 'trim|required');
    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-08 04:48:03 */
/* http://harviacode.com */