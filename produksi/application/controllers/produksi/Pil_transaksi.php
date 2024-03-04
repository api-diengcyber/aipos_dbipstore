<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pil_transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pil_transaksi_model');
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
            'active_pil_transaksi' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_produksi('pil_transaksi/pil_transaksi_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pil_transaksi_model->json_produksi();
    }

    public function read($id) 
    {
        $row = $this->Pil_transaksi_model->get_by_id($id);
        if ($row) {
            $row_debet = $this->db->where('id', $row->id_debet)->get('akun')->row();
            $row_kredit = $this->db->where('id', $row->id_kredit)->get('akun')->row();
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_pil_transaksi' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'id' => $row->id,
                'id_toko' => $row->id_toko,
                'kode_transaksi' => $row->kode_transaksi,
                'nama_transaksi' => $row->nama_transaksi,
                'akun_debet' => ($row_debet) ? $row_debet->akun : "",
                'akun_kredit' => ($row_kredit) ? $row_kredit->akun : "",
            );
            $this->view->render_produksi('pil_transaksi/pil_transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/pil_transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produksi/pil_transaksi/create_action'),
    	    'id' => set_value('id'),
    	    'kode_transaksi' => set_value('kode_transaksi'),
    	    'nama_transaksi' => set_value('nama_transaksi'),
    	    'id_debet' => set_value('id_debet'),
    	    'id_kredit' => set_value('id_kredit'),
            'data_akun' => $this->db->order_by('kode', 'asc')->get('akun')->result(),
    	);
        $this->Tampilan_retail_model->tampilan('admin', $this->active, 'retail/pil_transaksi/pil_transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
        		'id_users' => $this->userdata->id_users,
        		'kode_transaksi' => $this->input->post('kode_transaksi',TRUE),
        		'nama_transaksi' => $this->input->post('nama_transaksi',TRUE),
        		'id_debet' => $this->input->post('id_debet',TRUE),
        		'id_kredit' => $this->input->post('id_kredit',TRUE),
    	    );
            $this->Pil_transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produksi/pil_transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pil_transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produksi/pil_transaksi/update_action'),
        		'id' => set_value('id', $row->id),
        		'kode_transaksi' => set_value('kode_transaksi', $row->kode_transaksi),
        		'nama_transaksi' => set_value('nama_transaksi', $row->nama_transaksi),
        		'id_debet' => set_value('id_debet', $row->id_debet),
        		'id_kredit' => set_value('id_kredit', $row->id_kredit),
                'data_akun' => $this->db->order_by('kode', 'asc')->get('akun')->result(),
    	    );
            $this->Tampilan_retail_model->tampilan('admin', $this->active, 'retail/pil_transaksi/pil_transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/pil_transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        		'kode_transaksi' => $this->input->post('kode_transaksi',TRUE),
        		'nama_transaksi' => $this->input->post('nama_transaksi',TRUE),
        		'id_debet' => $this->input->post('id_debet',TRUE),
        		'id_kredit' => $this->input->post('id_kredit',TRUE),
    	    );
            $this->Pil_transaksi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produksi/pil_transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pil_transaksi_model->get_by_id($id);
        if ($row) {
            $this->Pil_transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produksi/pil_transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/pil_transaksi'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('kode_transaksi', 'kode transaksi', 'trim|required');
    	$this->form_validation->set_rules('nama_transaksi', 'nama transaksi', 'trim|required');
    	$this->form_validation->set_rules('id_debet', 'id debet', 'trim|required');
    	$this->form_validation->set_rules('id_kredit', 'id kredit', 'trim|required');
    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pil_transaksi.php */
/* Location: ./application/controllers/Pil_transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-03 04:14:42 */
/* http://harviacode.com */